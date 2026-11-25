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
        'display' => '+91-9898989898',
        'dial' => '+919898989898',
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

    // Placeholder contact details: replace with the real ones before launch.
    'email' => 'info@example.com',

    'address' => [
        'lines' => ['Your Street Address', 'City, State'],
        'map_url' => 'https://maps.google.com/',
        // Contact Us map. Set GOOGLE_MAP_EMBED_URL in .env to the "src" link from Google Maps
        // (Share > Embed a map). Until then the map searches for GOOGLE_MAP_QUERY.
        'map_embed_url' => env('GOOGLE_MAP_EMBED_URL'),
        'map_query' => env('GOOGLE_MAP_QUERY') ?: 'Jaipur, Rajasthan, India',
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
            'title' => 'Blog',
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
