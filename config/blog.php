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
| title       Heading on the card and the post page.
| category    Small tag on the card and above the post title.
| meta_title  Browser tab and Google title (optional; defaults to the title).
| excerpt     Google and social media description.
| tags        Shown at the end of the post.
|
*/

return [

    'posts' => [
        [
            'slug' => 'top-10-qualities-of-a-good-home-tutor',
            'title' => 'Top 10 Qualities Every Good Home Tutor Should Have',
            'meta_title' => 'Top 10 Qualities of a Good Home Tutor',
            'category' => 'Tutor Tips',
            'image' => 'images/blog/study-habits.svg',
            'excerpt' => 'Discover the top 10 qualities of a good home tutor, including subject knowledge, patience, communication skills and personalised teaching methods.',
            'author' => 'GyanDoorStep Team',
            'tags' => ['Qualities of a good home tutor', 'Home tuition', 'Parents'],
            'published_at' => '2026-11-27',
        ],
        [
            'slug' => 'home-tutor-vs-coaching-institute',
            'title' => "Home Tutor vs Coaching Institute: Which Is Better for Your Child's Success?",
            'meta_title' => 'Home Tutor vs Coaching Institute: Which Is Better?',
            'category' => 'Parents Guide',
            'image' => 'images/blog/board-exams.svg',
            'excerpt' => "Home tutor vs coaching institute: Compare teaching methods, personal attention, fees, flexibility and learning environments to choose what's best for your child.",
            'author' => 'GyanDoorStep Team',
            'tags' => ['Home tutor vs coaching institute', 'Coaching classes', 'Parents'],
            'published_at' => '2026-11-26',
        ],
        [
            'slug' => 'best-home-tutor-providers-in-delhi-ncr',
            'title' => 'Best Home Tutor Providers in Delhi NCR – Why Gyandoorstep Is Your Smart Choice',
            'meta_title' => 'Best Home Tutor Providers in Delhi NCR | Gyandoorstep',
            'category' => 'Delhi NCR',
            'image' => 'images/blog/online-or-home.svg',
            'excerpt' => 'Looking for the best home tutor providers in Delhi NCR? Discover how Gyandoorstep helps parents find suitable tutors for personalized learning.',
            'author' => 'GyanDoorStep Team',
            'tags' => ['Best home tutor providers in Delhi NCR', 'Home tuition', 'Gyandoorstep'],
            'published_at' => '2026-11-25',
        ],
    ],

];
