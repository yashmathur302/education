<?php

/*
|--------------------------------------------------------------------------
| Tutoring Services and Achievements
|--------------------------------------------------------------------------
|
| Services are used by the homepage Services cards and by the Services page
| (title, description, image, card colour). Images live in public/images/home;
| replace the placeholder SVGs with real photos (WebP, about 1260x670).
|
*/

return [

    'services' => [
        [
            'slug' => 'online-tutor',
            'title' => 'Online Tuition Classes',
            'description' => 'Experience convenient and engaging learning from the comfort of your home. Our online classes offer interactive live sessions, screen sharing, digital whiteboards, and real-time discussions with experienced tutors to make learning effective and enjoyable.',
            'image' => 'images/home/service-online.svg',
            'image_alt' => 'Student attending a live online class',
            'theme' => 'blush',
        ],
        [
            'slug' => 'offline-tutor',
            'title' => 'Offline Home Tuition',
            'description' => "Get personalized, face-to-face learning with experienced tutors who visit your home. Our one-on-one home tuition sessions provide individual attention, focused guidance, and a comfortable learning environment tailored to your child's academic needs.",
            'image' => 'images/home/service-offline.svg',
            'image_alt' => 'Tutor teaching a student at home',
            'theme' => 'mist',
        ],
    ],

    /*
    | Homepage "Our Achievements" counters. "suffix" is optional (e.g. '+' or '%').
    */
    'counters' => [
        ['value' => 500, 'suffix' => '+', 'label' => 'Students', 'description' => 'Successfully guided students to academic excellence'],
        ['value' => 98, 'suffix' => '%', 'label' => 'Success Rate', 'description' => 'Students showing significant improvement'],
        ['value' => 50, 'suffix' => '+', 'label' => 'Expert Tutors', 'description' => 'Qualified and experienced educators'],
        ['value' => 5, 'suffix' => '+', 'label' => 'Years', 'description' => 'Of dedicated service in education'],
    ],

];
