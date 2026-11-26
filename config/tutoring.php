<?php

/*
|--------------------------------------------------------------------------
| Tutoring Services
|--------------------------------------------------------------------------
|
| Used by the homepage Services cards (summary, meta, theme) and by the
| Services page (paragraphs). Images live in public/images/home; replace
| the placeholder SVGs with real photos (WebP, about 1260x670).
|
*/

return [

    'services' => [
        [
            'slug' => 'online-tutor',
            'title' => 'Online Tutor',
            'summary' => 'Learn from experienced tutors in live video classes, from anywhere, at a time that suits your family.',
            'meta' => 'Live one-to-one classes · Flexible timings',
            'image' => 'images/home/service-online.svg',
            'image_alt' => 'Student attending a live online class',
            'theme' => 'blush',
            'paragraphs' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat, duis aute irure dolor in reprehenderit.',
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua; ut enim ad minim veniam.',
            ],
        ],
        [
            'slug' => 'offline-tutor',
            'title' => 'Offline Tutor',
            'summary' => "A verified tutor visits your home for focused one-to-one sessions that follow your child's syllabus.",
            'meta' => 'Home tuition · Class 1 to 12',
            'image' => 'images/home/service-offline.svg',
            'image_alt' => 'Tutor teaching a student at home',
            'theme' => 'mist',
            'paragraphs' => [
                'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum, sed ut perspiciatis unde omnis iste natus.',
                'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
            ],
        ],
    ],

    /*
    | Homepage counters. Placeholder figures: replace them with your real
    | numbers. "suffix" is optional (e.g. '+').
    */
    'counters' => [
        ['value' => 14, 'suffix' => '', 'label' => 'Expert Tutors'],
        ['value' => 11, 'suffix' => '', 'label' => 'Subjects'],
        ['value' => 5, 'suffix' => '', 'label' => 'Star Rating'],
        ['value' => 80, 'suffix' => '+', 'label' => 'Students'],
    ],

];
