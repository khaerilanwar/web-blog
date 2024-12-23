<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            {{-- <img src="{{ asset('assets/img/logo.jpg') }}" alt="logo" style="border-radius: .7em"> --}}
            <h1 class="sitename">ZenBlog</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <form class="d-flex mx-3 my-4 d-xl-none" role="search" action="/">
                    <input class="form-control me-2" value="{{ Request::query('search') }}" name="search"
                        type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <li><a href="/" class="active">Beranda</a></li>

                @foreach ($categories as $category)
                    <li><a href="/{{ $category->slug }}">{{ $category->name }}</a></li>
                @endforeach

                {{-- <li class="dropdown"><a href="#"><span>Categories</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="category.html">Category 1</a></li>
                        <li><a href="category.html">Category 2</a></li>
                        <li><a href="category.html">Category 3</a></li>
                        <li><a href="category.html">Category 4</a></li>
                    </ul>
                </li> --}}
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <form class="d-none d-xl-flex" role="search" action="/">
            <input class="form-control me-2" value="{{ Request::query('search') }}" type="search" name="search"
                placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

    </div>
</header>
