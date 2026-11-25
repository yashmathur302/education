@php
    $siteName = config('site.name');
    $email = config('site.email');
    $phone = config('site.phone');
    $lastUpdated = '25 November 2026';
@endphp

<x-layouts.app>
    <x-page-hero title="Privacy Policy" :subtitle="'Last updated: ' . $lastUpdated" />

    <section class="py-14 sm:py-16 lg:py-20">
        <article class="prose-content mx-auto max-w-3xl px-4 sm:px-6">
            <p>
                This Privacy Policy explains how {{ $siteName }} ("we", "us") collects, uses and protects the
                personal information you share with us when you use this website. By using the website or
                submitting a form, you agree to the practices described here.
            </p>

            <h2>Information we collect</h2>
            <p>We only collect the information you choose to give us through the forms on this website:</p>
            <ul>
                <li>Your name, email address and phone number.</li>
                <li>Any details you write in your message, such as your child's class, subjects or preferred timings.</li>
            </ul>
            <p>
                We do not ask for payment details, and we do not knowingly collect information directly from
                children. Details about a child are shared by a parent or guardian.
            </p>

            <h2>How we use your information</h2>
            <ul>
                <li>To reply to your enquiry and help you find a suitable tutor.</li>
                <li>To contact you by phone, email or WhatsApp about the service you asked for.</li>
                <li>To keep a record of our conversation so we can serve you better.</li>
            </ul>
            <p>We do not sell, rent or trade your personal information.</p>

            <h2>How your information is sent and stored</h2>
            <p>
                When you submit a form, your details are sent to our team by email. They are kept in our email
                account for as long as needed to respond to you and provide our services, after which they are deleted.
            </p>

            <h2>Sharing your information</h2>
            <p>
                We share your details only with the tutor matched to you, and only what they need to arrange
                classes. We may also disclose information if the law requires us to.
            </p>

            <h2>Cookies and third-party services</h2>
            <p>
                This website uses a small session cookie that keeps the forms secure. The map on our Contact Us
                page is provided by Google Maps, which may set its own cookies; Google's use of data is covered
                by <a href="https://policies.google.com/privacy" target="_blank" rel="noopener">Google's Privacy Policy</a>.
            </p>

            <h2>Keeping your information safe</h2>
            <p>
                We use secure connections and limit access to your details to the people who need them. No method
                of sending or storing data online is completely secure, but we take reasonable care to protect it.
            </p>

            <h2>Your choices</h2>
            <p>
                You can ask us at any time to see, correct or delete the personal information we hold about you,
                or to stop contacting you. Just email or call us using the details below.
            </p>

            <h2>Changes to this policy</h2>
            <p>
                We may update this policy from time to time. The date at the top of this page shows when it was
                last changed.
            </p>

            <h2>Contact us</h2>
            <p>
                If you have any questions about this policy, email us at
                <a href="mailto:{{ $email }}">{{ $email }}</a>, call us on
                <a href="tel:{{ $phone['dial'] }}">{{ $phone['display'] }}</a>, or use our
                <a href="{{ route('contact') }}">Contact Us</a> page.
            </p>
        </article>
    </section>
</x-layouts.app>
