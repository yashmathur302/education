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

    // Placeholder contact details: replace with the real ones before launch.
    'email' => 'info@example.com',

    'address' => [
        'lines' => ['Your Street Address', 'City, State'],
        'map_url' => 'https://maps.google.com/',
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
        'find-tutor' => [
            'title' => 'Find a Tutor',
            'description' => 'Tell us what you need and we will match you with a suitable tutor.',
        ],
    ],

];
