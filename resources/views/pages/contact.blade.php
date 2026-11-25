<x-layouts.app>
    <x-page-hero
        title="Contact Us"
        subtitle="We are happy to help. Share a few details below and our team will get back to you shortly."
    />

    <section class="py-14 sm:py-16 lg:py-20" aria-labelledby="contact-form-heading">
        <div class="mx-auto grid max-w-[1200px] gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:gap-12">
            <x-google-map
                :embed-url="config('site.address.map_embed_url')"
                :query="config('site.address.map_query')"
                class="order-last h-[320px] sm:h-[400px] lg:order-first lg:h-auto lg:min-h-[520px]"
            />

            <div>
                <h2 id="contact-form-heading" class="font-display text-3xl font-extrabold text-ink sm:text-4xl">
                    Send Us a Message
                </h2>

                <form
                    id="contact-form"
                    data-ajax-form
                    method="POST"
                    action="{{ route('contact.store') }}"
                    class="relative mt-6 grid scroll-mt-8 gap-5 sm:grid-cols-2"
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

                    <div class="sm:col-span-2">
                        <x-form.input
                            name="email"
                            type="email"
                            label="Email"
                            placeholder="Email"
                            autocomplete="email"
                            hide-label
                            required
                        />
                    </div>

                    <div class="sm:col-span-2">
                        <x-form.input
                            name="phone"
                            type="tel"
                            label="Phone Number"
                            placeholder="Phone Number"
                            autocomplete="tel"
                            hide-label
                            required
                        />
                    </div>

                    <div class="sm:col-span-2">
                        <x-form.textarea
                            name="message"
                            label="Message"
                            placeholder="How can we help you?"
                            rows="5"
                            hide-label
                            required
                        />
                    </div>

                    <div class="sm:col-span-2">
                        <x-button type="submit">Submit my information</x-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.app>
