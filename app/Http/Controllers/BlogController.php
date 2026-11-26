<?php

namespace App\Http\Controllers;

use App\Repositories\BlogPostRepository;
use App\Services\BlogPostRenderer;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    private const POSTS_PER_PAGE = 9;

    private const RECENT_POSTS_IN_ARTICLE = 5;

    private const SUGGESTED_POSTS = 3;

    public function __construct(private readonly BlogPostRepository $posts)
    {
    }

    public function index(): View
    {
        return view('pages.blog', [
            'posts' => $this->posts->paginate(self::POSTS_PER_PAGE),
        ]);
    }

    public function show(string $slug, BlogPostRenderer $renderer): View
    {
        $post = $this->posts->findBySlug($slug);

        abort_if($post === null, 404);

        return view('pages.blog-post', [
            'post' => $post,
            'bodyHtml' => $renderer->toHtml($post, $this->posts->relatedTo($slug, self::RECENT_POSTS_IN_ARTICLE)),
            'readingMinutes' => $renderer->readingMinutes($slug),
            'neighbours' => $this->posts->neighbours($slug),
            'suggestedPosts' => $this->posts->relatedTo($slug, self::SUGGESTED_POSTS),
        ]);
    }
}
