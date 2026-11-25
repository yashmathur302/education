/**
 * Sends forms marked with data-ajax-form in the background with fetch.
 *
 * - Validation errors (HTTP 422) appear under each field without a reload.
 * - On success the server returns a redirect URL; the page reloads there
 *   and shows the success message.
 * - Any other problem is shown as an alert at the top of the form.
 *
 * Without JavaScript the form still posts normally, so nothing breaks.
 */

const ERROR_CLASSES = 'mt-1.5 text-sm text-red-600';
const ALERT_CLASSES = 'rounded border px-4 py-3 text-sm border-red-200 bg-red-50 text-red-800 sm:col-span-2';
const SENDING_LABEL = 'Sending...';
const GENERIC_ERROR = 'Something went wrong. Please check your connection and try again.';
const TOO_MANY_ATTEMPTS = 'Too many attempts. Please wait a minute and try again.';

export function initAjaxForms() {
    document.querySelectorAll('form[data-ajax-form]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            submitForm(form);
        });

        form.addEventListener('input', (event) => clearFieldError(form, event.target.name));
    });
}

async function submitForm(form) {
    const button = form.querySelector('[type="submit"]');

    clearAllErrors(form);
    setSending(button, true);

    try {
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            body: new FormData(form),
        });

        const data = await response.json().catch(() => ({}));

        if (response.ok && data.redirect) {
            reloadAt(data.redirect);
            return;
        }

        if (response.status === 422 && data.errors) {
            showFieldErrors(form, data.errors);
        } else if (response.status === 429) {
            showFormAlert(form, TOO_MANY_ATTEMPTS);
        } else {
            showFormAlert(form, data.message || GENERIC_ERROR);
        }
    } catch {
        showFormAlert(form, GENERIC_ERROR);
    }

    setSending(button, false);
}

function showFieldErrors(form, errors) {
    let firstInvalidField = null;

    Object.entries(errors).forEach(([name, messages]) => {
        const field = form.elements.namedItem(name);

        // Errors for fields people cannot see (such as the spam trap) go in the alert.
        if (!field || field.type === 'hidden' || field.closest('[aria-hidden="true"]')) {
            showFormAlert(form, messages[0]);
            return;
        }

        const message = document.createElement('p');
        message.id = `${name}-error`;
        message.className = ERROR_CLASSES;
        message.textContent = messages[0];
        message.dataset.fieldError = name;

        field.setAttribute('aria-invalid', 'true');
        field.setAttribute('aria-describedby', message.id);
        field.parentElement.append(message);

        firstInvalidField ??= field;
    });

    firstInvalidField?.focus();
}

function clearFieldError(form, name) {
    if (!name) {
        return;
    }

    const field = form.elements.namedItem(name);

    if (field instanceof HTMLElement) {
        field.removeAttribute('aria-invalid');
        field.removeAttribute('aria-describedby');
    }

    form.querySelector(`#${CSS.escape(name)}-error`)?.remove();
}

function clearAllErrors(form) {
    form.querySelectorAll('[id$="-error"], [data-form-alert]').forEach((element) => element.remove());
    form.querySelectorAll('[aria-invalid]').forEach((field) => {
        field.removeAttribute('aria-invalid');
        field.removeAttribute('aria-describedby');
    });
}

function showFormAlert(form, text) {
    const alert = document.createElement('div');
    alert.setAttribute('role', 'alert');
    alert.dataset.formAlert = '';
    alert.className = ALERT_CLASSES;
    alert.textContent = text;

    form.querySelector('[data-form-alert]')?.remove();
    form.prepend(alert);
    alert.scrollIntoView({ block: 'nearest', behavior: 'smooth' });
}

function setSending(button, isSending) {
    if (!button) {
        return;
    }

    button.dataset.label ??= button.textContent.trim();
    button.disabled = isSending;
    button.setAttribute('aria-busy', String(isSending));
    button.textContent = isSending ? SENDING_LABEL : button.dataset.label;
    button.classList.toggle('opacity-70', isSending);
}

/**
 * Loads the given URL. When it is the current page with a different #hash,
 * the browser would only scroll, so force a real reload to show the message.
 */
function reloadAt(url) {
    const target = new URL(url, window.location.href);

    if (target.pathname === window.location.pathname) {
        window.history.replaceState(null, '', target);
        window.location.reload();
        return;
    }

    window.location.assign(target);
}
