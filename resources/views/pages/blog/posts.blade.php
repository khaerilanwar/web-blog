@php
    use Carbon\Carbon;
@endphp

@extends('layouts.main')

@php
    function highlightKeyword($content, $keyword, $length = 120)
    {
        $position = stripos($content, $keyword);

        if ($position !== false) {
            // Tentukan awal dan akhir teks yang akan diambil
            $start = max(0, $position - 30); // 30 karakter sebelum keyword
            $preview = substr($content, $start, $length);

            // Highlight keyword
            $highlightedKeyword = "<span class='highlight'>{$keyword}</span>";
            $preview = preg_replace('/(' . preg_quote($keyword, '/') . ')/i', $highlightedKeyword, $preview);

            return $preview . '...';
        }

        // Fallback jika keyword tidak ditemukan
        return false;
        // return substr($content, 0, $length) . '...';
    }

    function getFirstParagraph($string)
    {
        preg_match('/<p>(.*?)<\/p>/', $string, $matches);
        $firstParagraph = $matches[1] ?? null;
        return $firstParagraph;
    }
@endphp

@section('content')
    <!-- Page Title -->
    <div class="page-title position-relative">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">{{ isset($category) ? "Blog $category->name" : 'Hasil Pencarian' }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.html">Home</a></li>
                    <li class="current">Categories</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Posts Section -->
                <section id="blog-posts" class="blog-posts section">

                    <div class="container">
                        <div class="row gy-4">

                            @if (!isset($category) && Request::query('search') && $posts->isEmpty())
                                <div class="col-lg-12">
                                    <div class="alert alert-warning" role="alert">
                                        Tidak ada hasil yang ditemukan untuk pencarian
                                        "<strong>{{ Request::query('search') }}</strong>"
                                    </div>
                                </div>
                            @else
                                @foreach ($posts as $post)
                                    <div class="col-lg-6">
                                        <article class="position-relative h-100">

                                            <div class="post-img position-relative overflow-hidden">
                                                <img src="assets/img/blog/{{ $post->image }}" class="img-fluid"
                                                    alt="">
                                                <span
                                                    class="post-date">{{ $carbon->parse($post->published_at)->isoFormat('DD MMMM') }}</span>
                                            </div>

                                            <div class="post-content d-flex flex-column">

                                                <h3 class="post-title">{{ Str::limit($post->title, 60, '...') }}</h3>

                                                <div class="meta d-flex align-items-center">
                                                    <div class="d-flex align-items-center">
                                                        <i class="bi bi-folder2"></i> <span
                                                            class="ps-2">{{ $post->category->name }}</span>
                                                    </div>
                                                </div>

                                                @if (Request::query('search'))
                                                    <p>
                                                        {!! highlightKeyword($post->content, Request::query('search')) !!}
                                                    </p>
                                                @else
                                                    <p>
                                                        {{ Str::limit(getFirstParagraph($post->content), 120, '...') }}
                                                    </p>
                                                @endif


                                                <hr>

                                                <a href="{{ $post->category->slug . '/' . $post->slug }}"
                                                    class="readmore stretched-link"><span>Baca
                                                        Selengkapnya</span><i class="bi bi-arrow-right"></i></a>

                                            </div>

                                        </article>
                                    </div><!-- End post list item -->
                                @endforeach
                            @endif

                        </div>
                    </div>

                </section><!-- /Blog Posts Section -->

                {{ $posts->onEachSide(1)->links('pagination::blog-posts') }}

            </div>

            <div class="col-lg-4 sidebar">

                <div class="widgets-container">

                    @include('partials.blog.recent-posts')

                    @include('partials.blog.tags-widget')

                </div>

            </div>

        </div>
    </div>
@endsection
