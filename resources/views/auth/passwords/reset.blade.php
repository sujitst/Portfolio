@extends('layouts.master')

@section('content')
    <div class="layout_container">

        <!--=====|| CONFIGURATION OR PROFILE CARD ||=====-->
        <div class="layout_sidebar">
            @include('frontend.components.configuration') 
            @include('frontend.components.profile_card') 
        </div>

        <!--=====|| RESET PASSWORD ||=====-->
        <div class="layout_auth">
            <h3>Reset Password</h3>
            <p><span>Create your new password</span></p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="form_fild">
                    <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" placeholder="Email Address">
                    @error('email')<span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form_fild">
                    <input id="password" type="password" name="password" placeholder="New Password">
                    @error('password')<span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form_fild">
                    <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>

                <div class="form_fild_btn">
                    <button type="submit">
                        Reset Password
                        <span></span><span></span><span></span><span></span>
                    </button>
                </div>
            </form>
        </div>

        <!--=====|| COMPANY NAME ||=====-->
        <h4 class="login_ombit_name"><a href="#">Ombit</a></h4>

    </div>
@endsection
