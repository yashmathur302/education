<?php

/*
|--------------------------------------------------------------------------
| About Us Page
|--------------------------------------------------------------------------
|
| Mission and vision blocks shown on the About Us page. Images live in
| public/images/about; replace the placeholder SVGs with real photos
| (WebP, about 1260x670).
|
*/

return [

    'mission_and_vision' => [
        [
            'slug' => 'our-mission',
            'title' => 'Our Mission',
            'image' => 'images/about/mission.svg',
            'image_alt' => 'Student working with a tutor',
            'paragraphs' => [
                'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
                'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            ],
        ],
        [
            'slug' => 'our-vision',
            'title' => 'Our Vision',
            'image' => 'images/about/vision.svg',
            'image_alt' => 'Group of happy students',
            'paragraphs' => [
                'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.',
                'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.',
            ],
        ],
    ],

];
