<?php

namespace App\View\Components\Home;

use App\Repositories\BlogPostRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

/**
 * Homepage section showing the newest blog posts.
 */
class LatestPosts extends Component
{
    private const POST_LIMIT = 3;

    /** @var Collection<int, array<string, string>> */
    public Collection $posts;

    public function __construct(BlogPostRepository $repository)
    {
        $this->posts = $repository->latest(self::POST_LIMIT);
    }

    public function render(): View
    {
        return view('components.home.latest-posts');
    }
}
