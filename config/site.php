<?php

/*
|--------------------------------------------------------------------------
| Site Settings
|--------------------------------------------------------------------------
|
| Brand details, navigation and per-page SEO for the public website.
| SEO entries are keyed by route name and read by the SeoMeta component.
|
*/

return [

    'name' => env('APP_NAME', 'Education'),

    'default_og_image' => 'images/og/default.jpg',

    'phone' => [
        'display' => '+91-9582883500',
        'dial' => '+919582883500',
    ],

    // Floating WhatsApp button: number with country code (digits only) and the
    // message that is typed in for the visitor when the chat opens.
    'whatsapp' => [
        'number' => '919582883500',
        'message' => 'Hello! I would like to know more about your tutoring services.',
    ],

    // Where Contact Us enquiries are emailed. Set CONTACT_FORM_RECIPIENT in the server's .env file.
    'contact_form' => [
        'recipient' => env('CONTACT_FORM_RECIPIENT', env('MAIL_FROM_ADDRESS')),
    ],

    // Where Find a Tutor requests are emailed. Uses the Contact Us address unless
    // TUTOR_REQUEST_RECIPIENT is set in the server's .env file.
    'tutor_request' => [
        'recipient' => env('TUTOR_REQUEST_RECIPIENT') ?: env('CONTACT_FORM_RECIPIENT', env('MAIL_FROM_ADDRESS')),
    ],

    // Placeholder email: replace with the real one before launch.
    'email' => 'info@example.com',

    'address' => [
        'lines' => ['Ghalib Apartment, Gate No. 1', 'Pitampura, Delhi 110034'],
        // Contact Us map: the "src" link from Google Maps (Share > Embed a map).
        // GOOGLE_MAP_EMBED_URL in .env overrides it without changing the code.
        'map_embed_url' => env('GOOGLE_MAP_EMBED_URL') ?: 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.93268158449!2d77.1104179742961!3d28.691660281395645!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d03f03a72d279%3A0xfe4428d79a5368b!2sGhalib%20Apartment%20Pitam%20Pura%20Gate%20no%201!5e0!3m2!1sen!2sin!4v1795690851493!5m2!1sen!2sin',
        'map_query' => env('GOOGLE_MAP_QUERY') ?: 'Ghalib Apartment, Pitam Pura, Delhi',
    ],

    // Placeholder profile links: replace '#' with the real profile URLs.
    'social' => [
        ['icon' => 'facebook', 'label' => 'Facebook', 'url' => '#'],
        ['icon' => 'youtube', 'label' => 'YouTube', 'url' => '#'],
        ['icon' => 'instagram', 'label' => 'Instagram', 'url' => '#'],
    ],

    'footer' => [
        'link_columns' => [
            [
                ['route' => 'home', 'label' => 'Home'],
                ['route' => 'about', 'label' => 'About Us'],
                ['route' => 'services', 'label' => 'Services'],
            ],
            [
                ['route' => 'blog', 'label' => 'Blog'],
                ['route' => 'contact', 'label' => 'Contact Us'],
                ['route' => 'find-tutor', 'label' => 'Find Tutor'],
            ],
        ],
        'bottom_links' => [
            ['route' => 'about', 'label' => 'About Us'],
            ['route' => 'services', 'label' => 'Services'],
            ['route' => 'contact', 'label' => 'Contact Us'],
            ['route' => 'privacy-policy', 'label' => 'Privacy Policy'],
        ],
    ],

    'navigation' => [
        ['route' => 'home', 'label' => 'Home'],
        ['route' => 'about', 'label' => 'About Us'],
        ['route' => 'services', 'label' => 'Services'],
        ['route' => 'blog', 'label' => 'Blog'],
        ['route' => 'contact', 'label' => 'Contact Us'],
    ],

    'cta' => ['route' => 'find-tutor', 'label' => 'Find Tutor'],

    'seo' => [
        'home' => [
            'title' => 'Home',
            'description' => 'Find qualified home and online tutors for every class and subject.',
        ],
        'about' => [
            'title' => 'About Us',
            'description' => 'Learn who we are and how we connect students with the right tutors.',
        ],
        'services' => [
            'title' => 'Services',
            'description' => 'Explore our tutoring services for school, board and competitive exams.',
        ],
        'blog' => [
            'title' => 'Blogs',
            'description' => 'Study tips, exam guidance and learning resources for students and parents.',
        ],
        'contact' => [
            'title' => 'Contact Us',
            'description' => 'Get in touch with our team for any questions about tutoring.',
        ],
        'privacy-policy' => [
            'title' => 'Privacy Policy',
            'description' => 'How we collect, use and protect the personal information you share with us.',
        ],
        'find-tutor' => [
            'title' => 'Find a Tutor',
            'description' => 'Tell us what you need and we will match you with a suitable tutor.',
        ],
    ],

];
