<section id="contact"class="layout_section_contact">
    <div class="contact_part">

        <!--=====|| START:- CONTACT HEADING ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_contact">
                    <h6>{{ __('common.contact') }}</h6>
                    <div class="contact_info">
                        <h2>{{ __('common.get_in_touch') }}</h2>
                        <p>{{ __('common.contact_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END:- CONTACT HEADING ||=====--> 

        <!--=====|| START:- CONTACT LAYOUT ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                @include('frontend.components.contact') 
            </div>
        </div>
        <!--=====|| END:- CONTACT LAYOUT ||=====-->

    </div>

    <!--=====|| FOOTER SECTION ||=====-->
    @include('frontend.section.footer')
    <!--=====|| END:- FOOTER SECTION ||=====-->

</section>