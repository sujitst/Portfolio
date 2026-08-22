<!--=====|| START:- EXTENDING THE LAYOUT ||=====-->
@extends('layouts.master') 

@section('content')
    <div class="layout_container ripple_area">

        <!--=====|| START:- CONFIGURATION OR PROFILE CARD ||=====-->
        <div class="layout_sidebar">
            @include('frontend.components.configuration') 
            @include('frontend.components.profile_card') 
        </div>
        <!--=====|| END:- CONFIGURATION OR PROFILE CARD ||=====-->


        <!--=====|| MAIN CONTENT ||=====-->
        <div class="layout_content" style="overflow-y:auto; height:100vh; position:relative;">
            <section class="section_blog">
                @php $images = json_decode($blog->image, true) @endphp

                <!--=====|| START:- BLOG POST ||=====-->
                <div class="row m-0">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="blog_heading">
                            <h6>{{ __('common.blog_post') }}</h6>
                            <a href="{{ route('home') }}"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> {{ __('common.back_to_home') }}</a>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-12 col-md-12 col-lg-6 col-xl-8">
                        <div class="my_blog">
                            <h3>{{ $blog->title }}</h3>
                            <img src="{{ asset('upload/blog/'. $images[0]) }}" alt="image">
                        </div>
                        <div class="author_info"> 
                            <img src="{{ asset('upload/my_account/'. $blog->user->photo) }}" alt="image">
                            <h6>{{ $blog->user->name }}</h6>
                            <p>{{ $blog->created_at->format('d F Y') }}</p>
                        </div>
                        <div class="blog_content">
                            @foreach(explode(PHP_EOL, $blog->description) as $item)
                                <p>{{ $item }}</p>
                            @endforeach
                            @php $images = json_decode($blog->image, true); @endphp

                            <div class="row">
                                @if(is_array($images))
                                    @foreach($images as $img)
                                        <div class="col-12 col-md-12 col-lg-4 col-xl-4">
                                            <div class="blog_gallery">
                                                <img src="{{ asset('upload/blog/' . $img) }}" alt="image">
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                        <div class="you_may_like">
                            <h3>{{ __('common.you_may_like') }}</h3>
                            @foreach ($blogs as $item)
                            @php $pictures = json_decode($item->image, true) @endphp
                               <div class="like_post">
                                    <a href="{{ route('blog', $item->id) }}">
                                        <img src="{{ asset('upload/blog/'. $pictures[0]) }}" alt="image">
                                        <div class="blog_sort_content">
                                            <h6>{{ $item->title }}</h6>
                                            <p>{{ $item->created_at->format('d F Y') }}</p>
                                        </div>
                                    </a>
                                </div> 
                            @endforeach
                        </div>
                        <div class="blog_share">
                            <h3>{{ __('common.share_this_post') }}</h3>
                            <div class="social_links_blog">
                                <ul>
                                    <li>
                                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}">
                                            <img src="{{ asset('assets/images/social_media/facebook.png') }}" alt="Facebook">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}">
                                            <img src="{{ asset('assets/images/social_media/twitter.png') }}" alt="Twitter">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}">
                                            <img src="{{ asset('assets/images/social_media/linkedin.png') }}" alt="LinkedIn">
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="https://wa.me/?text={{ $shareTitle }}%20{{ $shareUrl }}">
                                            <img src="{{ asset('assets/images/social_media/whatsapp.png') }}" alt="WhatsApp">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--=====|| END:- BLOG POST ||=====-->
 

                <!--=====|| FOOTER SECTION ||=====-->
                @include('frontend.section.footer')

            </section>
        </div>


        <!--=====|| START:- SCROLL TO TOP BUTTON ||=====-->
        <button id="btnGoTop" class="goTopButton" title="Go to top"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>
        <!--=====|| END:- SCROLL TO TOP BUTTON ||=====-->

    </div>
@endsection
<!--=====|| END:- EXTENDING THE LAYOUT ||=====-->