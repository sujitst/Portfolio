@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('admin.account') }}">{{ __('common.my_account') }}</a></li>
                    <li><a href="{{ route('admin.password.change') }}">{{ __('common.change_password') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->
         
            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="main_card">
                <div class="main_card_header pr-3 pl-3">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i> {{ __('common.change_password') }}</h3>
                    <a href="{{ route('admin.account') }}"><i class="fa fa-user" aria-hidden="true"></i> {{ __('common.my_account') }}</a>
                </div>

                <div class="card_body">
                    <div class="group_form">
                        <form action="{{ route('password.change') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="input_form">
                                        <label>{{ __('common.current_password') }}</label>
                                        <input type="password" name="current_password" placeholder="{{ __('common.current_password_p') }}" required>
                                        @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="input_form">
                                        <label>{{ __('common.confirm_new_password') }}</label>
                                        <input type="password" name="password_confirmation" placeholder="{{ __('common.confirm_new_password_p') }}" required>
                                        @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                    <div class="input_form">
                                        <label>{{ __('common.new_password') }}</label>
                                        <input type="password" name="password" placeholder="{{ __('common.new_password_placeholder') }}" required>
                                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit"><i class="fa fa-save"></i> {{ __('common.update_password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--=====|| END:- MAIN CONTENT ||=====-->
            
        </div>   
    </div>
@endsection