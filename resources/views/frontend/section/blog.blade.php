<section id="blog"class="layout_section_blog"> 
    <div class="blog_part">

        <!--=====|| START :- BLOG HEADING ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="my_about">
                    <h6>{{ __('common.blog') }}</h6>
                    <div class="blog_info">
                        <h2>{{ __('common.latest_articles') }}</h2>
                        <p>{{ __('common.blog_desc') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END :- BLOG HEADING ||=====--> 

        <!--=====|| START :- BLOG CARDS ||=====-->
        <div class="row m-0">
            <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                <div class="blog_layout">
                    <div class="owl-carousel owl-theme" id="blogcarcual">
                        @foreach ($blogs as $blog)
                            <div class="item">
                                @php $images = json_decode($blog->image, true); @endphp
                                <div class="blog_card">
                                    <a href="{{ route('blog', $blog->id) }}">
                                        @if (!empty($images) && isset($images[0]))
                                            <img src="{{ asset('upload/blog/' . $images[0]) }}" alt="{{ $blog->title }}">
                                        @endif
                                        <h4>{{ $blog->title }}</h4>
                                        <p class="titlear">{{ \Illuminate\Support\Str::limit(strip_tags($blog->description), 230, ' . . .') }}</p>
                                        <a href="{{ route('blog', $blog->id) }}" class="blog_button">{{ __('common.read_more') }} <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                        <div class="blog_card_data">{{ $blog->created_at->format('d F Y') }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--=====|| END :- BLOG CARDS ||=====-->

    </div>
</section>