<section id="home" class="layout_section_home">

    @include('frontend.components.side_menu')

    <div class="home_part">

        <!--=====|| START :- PROFILE SECTION ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_description">
                    <h6>{{ $info->title }}</h6>
                    <div class="profile_intro">
                        <h2>{{ __('common.hi_im') }} {{ $info->name }}</h2>
                        <div class="profile-dynamic-text">{{ __('common.a') }} <span id="profile-dynamic"></span></div>
                        <p>{{ $info->description }}</p>
                        <button class="download_btn" id="downloadCv"> {{ __('common.download_cv') }} <i class="fa fa-cloud-download"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END :- PROFILE SECTION ||=====-->


        <!--=====|| START :- SERVICE CARDS ||=====-->
        <div class="row m-0">
            @foreach ($works as $work)
                <div class="col-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="my_card">
                        <img src="{{ asset('upload/works/'. $work->picture) }}">
                        <h3>{{ $work->name }}</h3>
                        <p>{{ $work->number }} {{ __('common.projects') }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <!--=====|| END :- SERVICE CARDS ||=====-->
    </div>
    
</section>