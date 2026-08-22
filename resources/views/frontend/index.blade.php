<!--=====|| START:- EXTENDING THE LAYOUT ||=====-->
@extends('layouts.master') 

@section('content')
    <div class="layout_container ripple_area">

        <!--=====|| START:- CONFIGURATION, MENU OR PROFILE CARD ||=====-->
        <div class="layout_sidebar" id="bgTarget">
            @include('frontend.components.configuration') 
            @include('frontend.components.menu') 
            @include('frontend.components.profile_card') 
        </div>
        <!--=====|| END:- CONFIGURATION, MENU OR PROFILE CARD ||=====-->

        <!--=====|| START:- MAIN CONTENT ||=====-->
        <div class="layout_content" style="overflow-y:auto; height:100vh; position:relative;">
            <button id="menuToggle" class="navBars" aria-label="Open menu" aria-controls="sidebar" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <!--=====|| PROFILE SECTION ||=====-->
            @include('frontend.components.profile') 

            <!--=====|| HOME SECTION ||=====-->
            @include('frontend.section.home')
            
            <!--=====|| ABOUT SECTION ||=====-->
            @include('frontend.section.about')

            <!--=====|| EXPERIENCE SECTION ||=====-->
            @include('frontend.section.experiences')


            <!--=====|| EXPERIENCE SECTION ||=====-->
            @include('frontend.section.gallery')


            <!--=====|| SERVICES SECTION ||=====-->
            @include('frontend.section.service')


            <!--=====|| MY WORKS SECTION ||=====-->
            @include('frontend.section.works')


            <!--=====|| TESTIMONIAL SECTION ||=====-->
            @include('frontend.section.testimonial')


            <!--=====|| BLOG SECTION ||=====-->
            @include('frontend.section.blog')


            <!--=====|| FAQS SECTION ||=====-->
            @include('frontend.section.faqs')


            <!--=====|| CONTACT SECTION ||=====-->
            @include('frontend.section.contact')


            <!--=====|| SCROLL TO TOP BUTTON ||=====-->
            <button id="btnGoTop" class="goTopButton" title="Go to top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>
        </div>
        <!--=====|| END:- MAIN CONTENT ||=====-->

    </div>
@endsection
<!--=====|| END:- EXTENDING THE LAYOUT ||=====-->