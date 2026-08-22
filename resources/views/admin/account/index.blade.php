@extends('admin.layouts.master')

@section('admin_content')
    <div class="app-main__outer">
        <div class="app-main__inner">

            <!--=====|| START:- PAGE CONTENT / BREADCRUMB ||=====-->
            <div class="page_heading_brudcumbs">
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}">{{ __('common.dashboard') }}</a></li>
                    <li><a href="{{ route('admin.account') }}">{{ __('common.my_account') }}</a></li>
                </ul>
            </div>
            <!--=====|| END:- PAGE CONTENT / BREADCRUMB ||=====-->

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!--=====|| START:- MAIN CONTENT ||=====-->
            <div class="table_custom_card">
                <div class="main_card_header">
                    <h3><i class="fa fa-file-text-o" aria-hidden="true"></i>{{ __('common.my_account_page') }}</h3>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="person_info">
                            <img src="{{ $user->photo ? asset('upload/my_account/' . $user->photo) : asset('assets/images/jpg/person.jpg') }}" alt="{{ $user->name ?? 'Profile Image' }}">
                            <span class="fa fa-circle" aria-hidden="true"></span>
                            <p>{{ $user->address }}, {{ $user->city }}, {{ $user->country }}</p>
                        </div>
                        <div class="personal_info">
                            <h3><i class="fa fa-user" aria-hidden="true"></i> {{ __('common.personal_information') }}</h3>
                            <ul>
                                <li>
                                    <span>{{ __('common.first_name') }}</span>
                                    <span>{{ $user->name }}</span>
                                </li>
                                <li>
                                    <span>{{ __('common.date_of_birth') }}</span>
                                    <span>{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('d-m-Y') : '' }}</span>
                                </li>
                                <li>
                                    <span>{{ __('common.phone_number') }}</span>
                                    <span>{{ $user->phone }}</span>
                                </li>
                                <li>
                                    <span>{{ __('common.email_address') }}</span>
                                    <span>{{ $user->email }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="card_body">
                            <div class="group_form">
                                <h3><i class="fa fa-pencil-square-o" aria-hidden="true"></i> {{ __('common.update_admin_profile') }}</h3>
                                <form action="{{ route('account.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input_form">
                                                <label for="name">{{ __('common.name') }}</label>
                                                <input type="text" name="name" value="{{ $user->name }}" placeholder="{{ __('common.enter_name') }}">
                                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="input_form">
                                                <label for="phone">{{ __('common.phone_number') }}</label>
                                                <input type="text" name="phone"  value="{{ $user->phone }}" placeholder="{{ __('common.enter_number') }}">
                                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="input_form">
                                                <label for="country">{{ __('common.country') }}</label>
                                                <input type="text" name="country" value="{{ $user->country }}" placeholder="{{ __('common.enter_country') }}">
                                                @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="input_form">
                                                <label for="zip_code">{{ __('common.postal_code') }}</label>
                                                <input type="number" name="zip_code" value="{{ $user->zip_code }}" placeholder="{{ __('common.enter_zip_code') }}">
                                                @error('zip_code') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="input_form">
                                                <label for="address">{{ __('common.address') }}</label>
                                                <input type="text" name="address" value="{{ $user->address }}" placeholder="{{ __('common.enter_address') }}">
                                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                                            <div class="input_form">
                                                <label for="dob">{{ __('common.date_of_birth') }}</label>
                                                <input type="date" name="dob" value="{{ $user->dob ? \Carbon\Carbon::parse($user->dob)->format('Y-m-d') : '' }}" placeholder="DD-MM-YYYY">
                                                @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="input_form">
                                                <label for="email">{{ __('common.email_address') }}</label>
                                                <input type="email" name="email" value="{{ $user->email }}" placeholder="{{ __('common.enter_address') }}">
                                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="input_form">
                                                <label for="city">{{ __('common.city') }}</label>
                                                <input type="text" name="city" value="{{ $user->city }}" placeholder="{{ __('common.enter_city') }}">
                                                @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="input_form">
                                                <label for="photo">{{ __('common.profile_photo') }}</label>
                                                <input type="file" id="imageField" name="photo">
                                                <img src="{{ $user->photo ? asset('upload/my_account/' . $user->photo) : asset('assets/images/jpg/person.jpg') }}"  id="imagePreview" class="preview_pic" alt="Profile Image">
                                                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <script>
                                                const imageField = document.getElementById('imageField');
                                                const imagePreview = document.getElementById('imagePreview');

                                                imageField.addEventListener('change', function () {
                                                    const file = this.files[0];
                                                    if (file) {
                                                        const reader = new FileReader();
                                                        reader.onload = function (e) {
                                                            imagePreview.src = e.target.result;
                                                        };
                                                        reader.readAsDataURL(file);
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <button type="submit"> <i class="fa fa-save"></i> Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--=====|| END:- MAIN CONTENT ||=====-->
            
        </div>   
    </div>
@endsection