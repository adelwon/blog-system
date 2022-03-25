<footer class="foi-footer text-white">
    <div class="container">
        <div class="row footer-content">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <h2 class="mb-0">Can't find your post? Use the search.</h2>
            </div>
            <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                    <form class="d-flex" action="{{ route('search') }}" method="GET">
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search"  name="search" required>
                            <button class="btn btn-danger" type="submit">Search</button>
                    </form>
            </div>
        </div>
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <div class="py-3">
                    <img src="{{ asset('assets/images/logo-bs-white.svg') }}" alt="FOI">
                </div>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        @foreach($categories as $category)
                            @if($category['hidden'] === true)
                        <li class="nav-item">
                            <a href="{{ route('showCategory', $category->path) }}" class="nav-link">{{ $category->name }}</a>
                        </li>
                            @endif
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <p>
                    &copy; blog-system. 2022
                </p>
                <p>All rights reserved.</p>
                <nav class="social-menu">
                    <a href="#!"><img src="{{ asset('assets/images/facebook.svg') }}" alt="facebook"></a>
                    <a href="#!"><img src="{{ asset('assets/images/instagram.svg') }}" alt="instagram"></a>
                    <a href="#!"><img src="{{ asset('assets/images/twitter.svg') }}" alt="twitter"></a>
                    <a href="#!"><img src="{{ asset('assets/images/youtube.svg') }}" alt="youtube"></a>
                </nav>
            </div>
        </div>
    </div>
</footer>
