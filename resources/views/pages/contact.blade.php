<x-layouts.app>
    <x-page-hero
        title="Contact Us"
        subtitle="We are happy to help. Share a few details below and our team will get back to you shortly."
    />

    <section class="py-14 sm:py-16 lg:py-20" aria-label="Contact form">
        <div class="mx-auto max-w-[1000px] px-4 sm:px-6">
            <form
                id="contact-form"
                method="POST"
                action="{{ route('contact.store') }}"
                class="relative grid scroll-mt-8 gap-x-5 gap-y-5 sm:grid-cols-2"
                novalidate
            >
                @csrf
                <x-form.honeypot />

                @if (session('status'))
                    <x-alert class="sm:col-span-2">{{ session('status') }}</x-alert>
                @endif

                @if (session('error'))
                    <x-alert type="error" class="sm:col-span-2">{{ session('error') }}</x-alert>
                @endif

                <x-form.input name="first_name" label="First Name" placeholder="First Name" autocomplete="given-name" hide-label required />
                <x-form.input name="last_name" label="Last Name" placeholder="Last Name" autocomplete="family-name" hide-label required />

                <div class="sm:col-span-2">
                    <x-form.input
                        name="email"
                        type="email"
                        label="Email Address"
                        placeholder="Email Address"
                        autocomplete="email"
                        hide-label
                        required
                    />
                </div>

                <x-form.input
                    name="pin_code"
                    label="PIN Code"
                    placeholder="PIN Code"
                    inputmode="numeric"
                    maxlength="6"
                    autocomplete="postal-code"
                    hide-label
                    required
                />
                <x-form.input
                    name="phone"
                    type="tel"
                    label="Phone Number"
                    placeholder="Phone Number"
                    autocomplete="tel"
                    hide-label
                    required
                />

                <div class="sm:col-span-2">
                    <x-form.input
                        name="child_date_of_birth"
                        type="date"
                        label="What is your child's date of birth?"
                        :max="now()->toDateString()"
                        required
                    />
                </div>

                <x-form.select
                    name="start_month"
                    label="We'd like to start in..."
                    placeholder="Within a month"
                    :options="$startMonths"
                    required
                />
                <x-form.input
                    name="visit_date"
                    type="date"
                    label="When would you like to visit?"
                    :min="now()->toDateString()"
                    required
                />

                <div class="sm:col-span-2">
                    <x-form.textarea
                        name="message"
                        label="Questions"
                        placeholder="Questions? Anything you'd like us to know about your family?"
                        hide-label
                    />
                </div>

                <div class="sm:col-span-2">
                    <x-form.checkbox name="privacy_consent" required>
                        By submitting this form, you agree to the {{ config('site.name') }} privacy notice.
                    </x-form.checkbox>
                </div>

                <div class="sm:col-span-2">
                    <x-button type="submit">Submit my information</x-button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>
