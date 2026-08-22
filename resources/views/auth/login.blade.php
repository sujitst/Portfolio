@extends('layouts.master')

@section('content')
    <div class="layout_container">

        <!--=====|| CONFIGURATION OR PROFILE CARD ||=====-->
        <div class="layout_sidebar">
            @include('frontend.components.configuration') 
            @include('frontend.components.profile_card') 
        </div>

        <!--=====|| SIGN IN ||=====-->
        <div class="layout_auth">
            <h3>{{ __('common.sign_in') }}</h3>
            @if (Route::has('register'))
            <p>
                <span>{{ __('common.or') }} 
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">{{ __('common.forgot_your_password') }}</a>
                    @endif
                </span>
            </p>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form_fild">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('common.enter_email') }}">
                    @error('email')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form_fild">
                    <input type="password" name="password" placeholder="{{ __('common.enter_password') }}">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form_fild_rember"> 
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label" for="remember">{{ __('common.remember_me') }}</label>
                </div>
                <div class="form_fild_btn">
                    <button type="submit">
                        {{ __('common.sign_in') }}
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </form>
            <div class="social_media_login">
                <h4>{{ __('common.or') }}</h4>
                <div class="social_icons">
                    <a href="#" class="social_btn"><img src="{{ asset('assets/images/social_media/google.png') }}" alt="Google Login"></a>
                    <a href="#" class="social_btn"><img src="{{ asset('assets/images/social_media/apple.png') }}" alt="Apple Login"></a>
                    <a href="#" class="social_btn"><img src="{{ asset('assets/images/social_media/facebook.png') }}" alt="Facebook Login"></a>
                </div>
            </div>
        </div>

        <!--=====|| COMPANY NAME ||=====-->
        <h4 class="login_ombit_name"><a href="#">Ombit</a></h4>
        
    </div>
@endsection
