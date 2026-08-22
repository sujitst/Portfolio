<div class="layout_section_experience" id="experience">

    <div class="experience_part">
        <!--=====|| START:- EXPERIENCE HEADING ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about">
                    <h6>{{ __('common.heres_my') }}</h6>
                    <div class="experience_info">
                        <h2>{{ __('common.experience') }}</h2>
                        <p>{{ __('common.education_work_skills') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END:- EXPERIENCE HEADING ||=====-->

        <!--=====|| START:- EXPERIENCE CONTENT ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                @include('frontend.components.experiences')
            </div>
            <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                @include('frontend.components.progress_bar')
            </div>
        </div>
        <!--=====|| END:- EXPERIENCE CONTENT ||=====-->
    </div>

</div>