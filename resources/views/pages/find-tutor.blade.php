<x-layouts.app>
    <x-page-hero
        title="Find a Tutor"
        subtitle="Tell us what you need help with and we will match you with the right tutor."
    />

    <section class="py-14 sm:py-16 lg:py-20" aria-label="Find a tutor form">
        <div class="mx-auto max-w-[1000px] px-4 sm:px-6">
            <form
                id="find-tutor-form"
                data-animate="fade-up"
                data-ajax-form
                method="POST"
                action="{{ route('find-tutor.store') }}"
                class="relative grid scroll-mt-8 gap-5 sm:grid-cols-2"
                novalidate
            >
                @csrf
                <x-form.honeypot />

                @if (session('status'))
                    <x-alert class="sm:col-span-2" data-auto-dismiss="5000">{{ session('status') }}</x-alert>
                @endif

                @if (session('error'))
                    <x-alert type="error" class="sm:col-span-2">{{ session('error') }}</x-alert>
                @endif

                <x-form.input name="first_name" label="First Name" placeholder="First Name" autocomplete="given-name" hide-label required />
                <x-form.input name="last_name" label="Last Name" placeholder="Last Name" autocomplete="family-name" hide-label required />

                <x-form.input
                    name="email"
                    type="email"
                    label="Email"
                    placeholder="Email"
                    autocomplete="email"
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
                        name="class_or_course"
                        label="Which class or course do you need help with?"
                        placeholder="e.g. Class 10 (CBSE), Class 12, B.Tech"
                        required
                    />
                </div>

                <div class="sm:col-span-2">
                    <x-form.input
                        name="subject"
                        label="Which subject do you need help with?"
                        placeholder="e.g. Mathematics, Science, Physics, English"
                        required
                    />
                </div>

                <div class="sm:col-span-2">
                    <x-button type="submit">Submit my information</x-button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>
