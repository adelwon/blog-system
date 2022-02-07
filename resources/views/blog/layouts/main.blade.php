<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog System</title>
    <link rel="stylesheet" href="{{asset('assets/vendors/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
<header class="foi-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light foi-navbar">
            <a class="navbar-brand" href="{{ route('blog') }}">
                <img src="{{asset('assets/images/logo-bs.svg')}}" alt="Blog-System">
            </a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                    data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <x-menu/>
                <ul class="navbar-nav mt-2 mt-lg-0">
                    @if(!auth()->user())
                        <li class="nav-item mr-2 mb-3 mb-lg-0">
                            <a class="btn btn-secondary" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-secondary"
                               href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-secondary" href="{{ route('account') }}">{{ __('Account') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</header>

@yield('content')

<footer class="foi-footer text-white">
    <div class="container">
        <div class="row footer-content">
            <div class="col-xl-6 col-lg-7 col-md-8">
                <h2 class="mb-0">Do you want to know more or just have a question? write to us.</h2>
            </div>
            <div class="col-md-4 col-lg-5 col-xl-6 py-3 py-md-0 d-md-flex align-items-center justify-content-end">
                <a href="contact.html" class="btn btn-danger btn-lg">Contact form</a>
            </div>
        </div>
        <div class="row footer-widget-area">
            <div class="col-md-3">
                <div class="py-3">
                    <img src="{{asset('assets/images/logo-white')}}.svg" alt="FOI">
                </div>
                <p class="font-os font-weight-semibold mb3">Get our mobile app</p>
                <div>
                    <button class="btn btn-app-download mr-2"><img src="{{asset('assets/images/ios.svg')}}"
                                                                   alt="App store"></button>
                    <button class="btn btn-app-download"><img src="{{asset('assets/images/android.svg')}}"
                                                              alt="play store"></button>
                </div>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Account</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">My tasks</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Edit profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Activity</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <nav>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="#!" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Careers <span class="badge badge-pill badge-secondary ml-3">Hiring</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">Shop with us</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-3 mt-3 mt-md-0">
                <p>
                    &copy; foi. 2020 <a href="https://www.bootstrapdash.com" target="_blank" rel="noopener noreferrer"
                                        class="text-reset">BootstrapDash</a>.
                </p>
                <p>All rights reserved.</p>
                <nav class="social-menu">
                    <a href="#!"><img src="{{asset('assets/images/facebook.svg')}}" alt="facebook"></a>
                    <a href="#!"><img src="{{asset('assets/images/instagram.svg')}}" alt="instagram"></a>
                    <a href="#!"><img src="{{asset('assets/images/twitter.svg')}}" alt="twitter"></a>
                    <a href="#!"><img src="{{asset('assets/images/youtube.svg')}}" alt="youtube"></a>
                </nav>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>
