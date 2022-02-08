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

<x-footer/>
<script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>
