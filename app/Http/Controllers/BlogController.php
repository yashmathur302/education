<?php

namespace App\Http\Controllers;

use App\Repositories\BlogPostRepository;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    private const POSTS_PER_PAGE = 9;

    public function __construct(private readonly BlogPostRepository $posts)
    {
    }

    public function index(): View
    {
        return view('pages.blog', [
            'posts' => $this->posts->paginate(self::POSTS_PER_PAGE),
        ]);
    }
}
