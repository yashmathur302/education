<?php

/*
|--------------------------------------------------------------------------
| About Content
|--------------------------------------------------------------------------
|
| "home" is the About section on the homepage; "page" is the same section on
| the About Us page, which tells the longer story. Mission and vision blocks
| appear on the About Us page. Mission/vision images live in
| public/images/about; replace the placeholder SVGs with real photos
| (WebP, about 1260x670).
|
*/

return [

    'home' => [
        'eyebrow' => null,
        'heading' => 'About Us',
        'paragraphs' => [
            'At GyanDoorStep, we are committed to making quality education accessible to every student through personalized learning and expert guidance. Our mission is to bridge the gap between students and the right educators by connecting families with verified, qualified, and experienced tutors. We bring trusted academic support right to your doorstep, creating a learning environment where every student can grow, build confidence, and achieve their academic goals.',
        ],
    ],

    'page' => [
        'eyebrow' => 'About GyanDoorStep',
        'heading' => 'Making Quality Education Accessible, Personalised and Convenient',
        'paragraphs' => [
            "At GyanDoorStep, we believe that every child has unique abilities, learning needs, and the potential to achieve great things. The right guidance, individual attention, and a supportive learning environment can make a significant difference in a student's academic journey.",
            'With this belief at our core, GyanDoorStep was established to make quality education more accessible and convenient for students and parents. We bring learning closer to home by connecting students with verified, qualified, and experienced tutors who are dedicated to helping them succeed.',
            "Whether you are looking for personalised home tuition or interactive online classes, we make it easier to find the right educator to support your child's learning journey.",
        ],
    ],

    'mission_and_vision' => [
        [
            'slug' => 'our-mission',
            'title' => 'Our Mission',
            'image' => 'images/about/mission.svg',
            'image_alt' => 'Student working with a tutor',
            'description' => 'At GyanDoorStep, our mission is to make quality education accessible, personalized, and convenient for every student. We strive to connect students with skilled, verified, and passionate educators who understand their individual learning needs. Through dedicated guidance and a student-focused approach, we aim to build confidence, strengthen academic foundations, and help every child achieve their full potential.',
        ],
        [
            'slug' => 'our-vision',
            'title' => 'Our Vision',
            'image' => 'images/about/vision.svg',
            'image_alt' => 'Group of happy students',
            'description' => 'Our vision is to become a trusted name in personalized education by transforming the way students learn. We aspire to create a future where every child has access to the right tutor, quality guidance, and equal opportunities to succeed, whether through online learning or personalized home tuition. We aim to make learning more accessible, effective, and inspiring for every family.',
        ],
    ],

];
