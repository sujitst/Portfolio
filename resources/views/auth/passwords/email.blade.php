@extends('layouts.master')

@section('content')
    <div class="layout_container">
        <div class="layout_sidebar">
            @include('Frontend.Components.configuration') 
            @include('Frontend.Components.profile_card') 
        </div>

        <div class="layout_auth">
            <h3>{{ __('common.reset_password') }}</h3>
            @if (Route::has('register'))
            <p><span>{{ __('common.or') }} <a href="{{ route('login') }}">{{ __('common.sign_in') }}</a></span></p>
            @endif

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form_fild">
                    <input id="email" type="email" placeholder="Enter your mail" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form_fild_btn">
                    <button type="submit">
                        {{ __('common.send_password_reset_link') }}
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection