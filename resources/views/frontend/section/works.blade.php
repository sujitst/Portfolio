<section id="work"class="layout_section_work">
    <div class="work_part">

        <!--=====|| START:- WORK HEADING ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about {{ session('text_dir', 'ltr') }}">
                    <h6>{{ __('common.my_works') }}</h6>
                    <div class="work_info">
                        <h2>{{ __('common.my_projects') }}</h2>
                        <p>{{ __('common.projects_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END:- WORK HEADING ||=====--> 

        <!--=====|| START:- PRODUCT OR WORK CARD ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="product_layout">
                    @include('frontend.components.product') 
                </div>
            </div>
        </div>
        <!--=====|| END:-  PRODUCT OR WORK CARD ||=====-->

    </div>
</section>