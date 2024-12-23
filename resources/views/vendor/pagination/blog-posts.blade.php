@if ($paginator->hasPages())

    <nav role="navigation" aria-label="Pagination Navigation" class="d-sm-none mx-3">
        <ul class="pagination d-flex justify-content-between">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" style="color: #465367">{!! __('pagination.previous') !!}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" style="color: #465367" href="{{ $paginator->previousPageUrl() }}"
                        rel="prev">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" style="color: #465367" href="{{ $paginator->nextPageUrl() }}"
                        rel="next">{!! __('pagination.next') !!}</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" style="color: #465367">{!! __('pagination.next') !!}</span>
                </li>
            @endif
        </ul>
    </nav>

    <!-- Blog Pagination Section -->
    <section id="blog-pagination" class="blog-pagination section d-none d-sm-block">

        <div class="container">
            <div class="d-flex justify-content-center">
                <ul>
                    {{-- Previouse Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li><a onclick="return false;" style="background: none"><i class="bi bi-chevron-left"></i></a>
                        </li>
                    @else
                        <li><a href="{{ $paginator->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a></li>
                    @endif

                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <li>{{ $element }}</li>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li><a href="#" class="active">{{ $page }}</a></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li><a href="{{ $paginator->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a></li>
                    @else
                        <li><a onclick="return false;" style="background: none"><i class="bi bi-chevron-right"></i></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

    </section><!-- /Blog Pagination Section -->
@endif
