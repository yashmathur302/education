<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

/**
 * Renders the title, description, canonical and Open Graph tags for a page.
 *
 * Values come from config('site.seo') for the current route; any prop
 * passed to the component overrides the configured value.
 */
class SeoMeta extends Component
{
    public string $title;

    public string $description;

    public string $canonicalUrl;

    public string $imageUrl;

    public string $siteName;

    public function __construct(
        ?string $title = null,
        ?string $description = null,
        ?string $image = null,
    ) {
        $pageSeo = config('site.seo.' . Route::currentRouteName(), []);

        $this->siteName = config('site.name');
        $this->title = $this->formatTitle($title ?? $pageSeo['title'] ?? null);
        $this->description = $description ?? $pageSeo['description'] ?? '';
        $this->canonicalUrl = url()->current();
        $this->imageUrl = asset($image ?? $pageSeo['image'] ?? config('site.default_og_image'));
    }

    public function render(): View
    {
        return view('components.seo-meta');
    }

    private function formatTitle(?string $pageTitle): string
    {
        if ($pageTitle === null || $pageTitle === '') {
            return $this->siteName;
        }

        return $pageTitle . ' | ' . $this->siteName;
    }
}
