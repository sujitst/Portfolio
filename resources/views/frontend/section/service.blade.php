<div class="layout_section_service" id="service">
    <div class="service_part">
        
        <!-- =====|| START:- SERVICE HEADING ||===== -->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about">
                    <h6>{{ __('common.our_expertise') }}</h6>
                    <div class="service_info">
                        <h2>{{ __('common.services') }}</h2>
                        <p>{{ __('common.services_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- =====|| END:- SERVICE HEADING ||===== -->

        <!-- =====|| START:- SERVICE CONTENT ||===== -->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    @foreach($services as $service)
                        <div class="col-12 col-md-12 col-lg-6 col-xl-6">
                            <div class="my_services_section">
                                <div class="service_img_cart">
                                    <div class="service_img">
                                        <img src="{{ asset('upload/services/' . $service->image) }}" alt="{{ $service->name }}">
                                    </div>
                                    <i class="fa fa-caret-right" aria-hidden="true"></i>
                                </div>
                                <div class="service_point">
                                    <h5>{{ $service->name }}</h5>
                                    <ul>
                                        @foreach(explode("\n", trim($service->description)) as $point)
                                            <li>{{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- =====|| END:- SERVICE CONTENT ||===== -->

    </div>
</div>