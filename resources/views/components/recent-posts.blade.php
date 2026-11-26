{{-- Box listing recent posts, placed inside an article where [recent-posts] appears. --}}
@props(['posts'])

@if ($posts->isNotEmpty())
    <aside class="recent-posts-box" aria-labelledby="recent-posts-heading">
        <h2 id="recent-posts-heading">Recent Posts</h2>

        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('blog.show', $post['slug']) }}">{{ $post['title'] }}</a></li>
            @endforeach
        </ul>
    </aside>
@endif
