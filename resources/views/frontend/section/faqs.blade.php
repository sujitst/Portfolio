<section id="faq"class="layout_section_faqs"> 
    <div class="faq_part">
        
        <!--=====|| START :- FAQS HEADING ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about">
                    <h6>{{ __('common.faqs') }}</h6>
                    <div class="faqs_info">
                        <h2>{{ __('common.frequently_asked') }}</h2>
                        <p>{{ __('common.faqs_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END :- FAQS HEADING ||=====--> 

        <!--=====|| START :- FAQS CONTENT ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="blog_layout">
                    @include('frontend.components.faqs') 
                </div>
            </div>
        </div>
        <!--=====|| END :- FAQS CONTENT ||=====-->

    </div>
</section>