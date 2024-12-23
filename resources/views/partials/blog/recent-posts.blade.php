@php
    use Carbon\Carbon;
@endphp

<!-- Recent Posts Widget -->
<div class="recent-posts-widget widget-item">

    <h3 class="widget-title">Blog Terbaru</h3>

    @foreach ($recentPosts as $recent)
        <div class="post-item">
            <img src="{{ asset("assets/img/blog/$recent->image") }}" alt="image" class="flex-shrink-0">
            <div>
                <h4><a href="{{ $recent->category->slug . '/' . $recent->slug }}">{{ $recent->title }}</a>
                </h4>
                <time
                    datetime="{{ $carbon->parse($recent->published_at)->format('Y-m-d') }}">{{ $carbon->parse($recent->published_at)->isoFormat('DD MMM, G') }}</time>
            </div>
        </div><!-- End recent post item-->
    @endforeach

</div><!--/Recent Posts Widget -->
