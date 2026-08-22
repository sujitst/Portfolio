<div id="about" class="layout_section_about">

    <div class="about_part">
        <!--=====|| START: ABOUT HEADING ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about">
                    <h6>{{ __('common.get_to_know_me') }}</h6>
                    <div class="about_info">
                        <h2>{{ __('common.about_me') }}</h2>
                    </div>
                    <p>{!! nl2br($about->description) !!}</p>
                </div>
            </div>
        </div>
        <!--=====|| END: ABOUT HEADING ||=====-->

        <!--=====|| START: PERSONAL INFORMATION ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <h4 class="personal_info_title">{{ __('common.personal_information') }}</h4>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <ol class="personal_info_list">
                            <li><span>{{ __('common.name') }}</span> <strong>: {{ $about->information->name }}</strong></li>
                            <li><span>{{ __('common.nationality') }}</span> <strong>: {{ $about->nationality }}</strong></li>
                            <li><span>{{ __('common.gender') }}</span> <strong>: {{ $about->gender }}</strong></li>
                            <li><span>{{ __('common.marital_status') }}</span> <strong>: {{ $about->marital_status }}</strong></li>
                        </ol>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <ol start="5" class="personal_info_list">
                            <li><span>{{ __('common.date_of_birth') }}</span> <strong>: {{ $about->dob }}</strong></li>
                            <li><span>{{ __('common.phone_number') }}</span> <strong>: {{ $about->number }}</strong></li>
                            <li><span>{{ __('common.profession') }}</span> <strong>: {{ json_decode($about->information->skills ?? '[]')[0] ?? '' }}</strong></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END: PERSONAL INFORMATION ||=====-->
    </div>

</div>