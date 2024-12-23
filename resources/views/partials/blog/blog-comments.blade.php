<!-- Blog Comments Section -->
<section id="blog-comments" class="blog-comments section">

    <div class="container">

        <h4 class="comments-count">{{ count($comments) }} Komentar</h4>

        @foreach ($comments as $comment)
            <div class="comment">
                <div class="d-flex">
                    <div class="comment-img"><img src="{{ Avatar::create($comment->name)->toBase64() }}"
                            alt="{{ $comment->name }}">
                    </div>
                    <div>
                        <h5><a href="">{{ $comment->name }}</a></h5>
                        <time
                            datetime="{{ $carbon->parse($comment->created_at)->format('Y-m-d') }}">{{ $carbon->parse($comment->created_at)->isoFormat('DD MMM, G') }}</time>
                        <p>
                            {{ $comment->comment }}
                        </p>
                    </div>
                </div>
            </div><!-- End comment #1 -->
        @endforeach

    </div>

</section><!-- /Blog Comments Section -->
