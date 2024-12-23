@php
    function shortNumber($number)
    {
        if ($number >= 1000000) {
            return number_format($number / 1000000, 1, ',', '') . 'jt'; // Untuk jutaan
        } elseif ($number >= 1000) {
            return number_format($number / 1000, 1, ',', '') . 'rb'; // Untuk ribuan
        }
        return $number; // Untuk angka kurang dari 1000
    }

@endphp

@extends('layouts.main')

@section('content')
    <!-- Page Title -->
    <div class="page-title">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Blog {{ $post->category->name }}</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="/">Home</a></li>
                    <li><a href="/{{ $post->category->slug }}">{{ $post->category->name }}</a></li>
                    <li class="current">Detail</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container">
        <div class="row">

            <div class="col-lg-8">

                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">

                        <article class="article">

                            <div class="post-img">
                                <img src="{{ asset("assets/img/blog/$post->image") }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $post->title }}
                            </h2>

                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-eye"></i>
                                        <span class="me-1">{{ shortNumber($post->views) . ' ' }}</span> Dilihat
                                    </li>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <time
                                            datetime="{{ $carbon->parse($post->published_at)->format('Y-m-d') }}">{{ $carbon->parse($post->published_at)->isoFormat('DD MMM, G') }}</time>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a
                                            href="#blog-comments">{{ count($post->comments) }} Komentar</a></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">

                                {!! $post->content !!}

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">{{ $post->category->name }}</a></li>
                                </ul>

                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach ($post->tags as $tag)
                                        <li><a href="/tag/{{ $tag->slug }}">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End meta bottom -->

                        </article>

                    </div>
                </section><!-- /Blog Details Section -->

                @include('partials.blog.blog-comments', ['comments' => $post->comments])

                @include('partials.blog.blog-comment-form')

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
