<?php

/*
|--------------------------------------------------------------------------
| Blog Posts
|--------------------------------------------------------------------------
|
| The site has no admin panel, so posts are kept here, newest first.
| Each post needs a unique slug. Images live in public/images/blog.
|
*/

return [

    'posts' => [
        [
            'slug' => 'study-habits-that-help-children-learn-at-home',
            'title' => 'Simple study habits that help children learn better at home',
            'category' => 'Tips',
            'image' => 'images/blog/study-habits.svg',
            'published_at' => '2026-11-15',
        ],
        [
            'slug' => 'prepare-for-board-exams-without-stress',
            'title' => 'How to prepare your child for board exams without the stress',
            'category' => 'Exams',
            'image' => 'images/blog/board-exams.svg',
            'published_at' => '2026-11-08',
        ],
        [
            'slug' => 'online-or-home-tuition',
            'title' => 'Online or home tuition: choosing the right option for your child',
            'category' => 'Parents',
            'image' => 'images/blog/online-or-home.svg',
            'published_at' => '2026-11-01',
        ],
    ],

];
