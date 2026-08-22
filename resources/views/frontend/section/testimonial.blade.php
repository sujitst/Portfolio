<section id="testimonial"class="layout_section_testimonial">
    <div class="testimonial_part">

        <!--=====|| START:- TESTIMONIAL HEADING ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about">
                    <h6>{{ __('common.testimonial') }}</h6>
                    <div class="testimonial_info">
                        <h2>{{ __('common.what_clients_say') }}</h2>
                        <p>{{ __('common.testimonial_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END:- TESTIMONIAL HEADING ||=====--> 

        <!--=====|| START:- TESTIMONIAL LAYOUT ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="testimonial_layout">
                    @include('frontend.components.testimonial') 
                </div>
            </div>
        </div>
        <!--=====|| END:- TESTIMONIAL LAYOUT ||=====-->

    </div>
</section>