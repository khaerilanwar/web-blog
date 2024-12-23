<!-- Tags Widget -->
<div class="tags-widget widget-item">

    <h3 class="widget-title">Tags</h3>
    <ul>
        @foreach ($tags as $tag)
            <li><a href="/tag/{{ Str::slug($tag) }}">{{ $tag }}</a></li>
        @endforeach
    </ul>

</div><!--/Tags Widget -->
