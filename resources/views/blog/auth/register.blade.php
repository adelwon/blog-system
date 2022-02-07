@extends('blog.layouts.main')
@section('content')
    <main class="page-auth">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <section class="auth-wrapper">
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-md-0">
                                <h2 class="auth-section-title">{{ __('Register') }} <sup>*</sup></h2>
                                <p class="auth-section-subtitle">Create your account to continue.</p>
                                <form action="{{ route('registerUser') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <sup>*</sup></label>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }} <sup>*</sup></label>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">{{ __('Password') }} <sup>*</sup></label>
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback"
                                              role="alert"><strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">{{ __('Confirm Password') }} <sup>*</sup></label>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                    <button class="btn btn-primary btn-auth-submit"
                                            type="submit"> {{ __('Register') }}</button>
                                </form>
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <img src="{{asset('assets/images/Register.png')}}" alt="register" class="img-fluid">
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
