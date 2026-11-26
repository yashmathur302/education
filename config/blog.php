<?php

/*
|--------------------------------------------------------------------------
| Blog Posts
|--------------------------------------------------------------------------
|
| The site has no admin panel, so posts are listed here. They are shown
| newest first, by published_at (YYYY-MM-DD). To add a post:
|
|   1. Add an entry below with a unique slug (used in the URL /blog/{slug}).
|   2. Put its image in public/images/blog.
|   3. Write the article in resources/content/blog/{slug}.md (Markdown).
|      A line containing only [recent-posts] shows the Recent Posts box there.
|
*/

return [

    'posts' => [
        [
            'slug' => 'study-habits-that-help-children-learn-at-home',
            'title' => 'Simple study habits that help children learn better at home',
            'category' => 'Tips',
            'image' => 'images/blog/study-habits.svg',
            'excerpt' => 'Small daily routines make a big difference. Here are simple study habits that help children focus, remember more and enjoy learning at home.',
            'author' => 'Editorial Team',
            'tags' => ['Study tips', 'Parents', 'Home learning'],
            'published_at' => '2026-11-15',
        ],
        [
            'slug' => 'prepare-for-board-exams-without-stress',
            'title' => 'How to prepare your child for board exams without the stress',
            'category' => 'Exams',
            'image' => 'images/blog/board-exams.svg',
            'excerpt' => 'Board exams do not have to mean sleepless nights. A clear plan, regular revision and the right support help students stay calm and confident.',
            'author' => 'Editorial Team',
            'tags' => ['Board exams', 'CBSE', 'Revision'],
            'published_at' => '2026-11-08',
        ],
        [
            'slug' => 'online-or-home-tuition',
            'title' => 'Online or home tuition: choosing the right option for your child',
            'category' => 'Parents',
            'image' => 'images/blog/online-or-home.svg',
            'excerpt' => 'Both online classes and home tuition work well, for different children. Compare the two to decide which suits your child and your family.',
            'author' => 'Editorial Team',
            'tags' => ['Online classes', 'Home tuition', 'Parents'],
            'published_at' => '2026-11-01',
        ],
    ],

];
