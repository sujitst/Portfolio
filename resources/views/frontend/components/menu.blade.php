<!--=====|| START:- MENU BAR ||=====-->
<aside id="sidebar" class="sidebar" role="dialog" aria-modal="true" aria-label="Site menu">

    <!--=====|| TOGALE MENU BUTTON ||=====-->
    <div class="sidebar_header">
        <h3>{{ __('common.menu') }}</h3>
        <button id="closeBtn" class="close-btn" aria-label="Close menu"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>

    <!--=====|| MENU BAR ||=====-->
    <nav class="menu-nav" aria-label="Main navigation">
        <ul class="menu_list">
            <li><a href="#home"><i class="fa fa-home" aria-hidden="true"></i>{{ __('common.home') }}</a></li>
            <li><a href="#about"><i class="fa fa-user-circle" aria-hidden="true"></i>{{ __('common.about') }}</a></li>
            <li><a href="#experience"><i class="fa fa-briefcase" aria-hidden="true"></i>{{ __('common.experience') }}</a></li>
            <li><a href="#gallery"><i class="fa fa-file-image-o" aria-hidden="true"></i>{{ __('common.gallery') }}</a></li>
            <li><a href="#service"><i class="fa fa-cogs" aria-hidden="true"></i>{{ __('common.services') }}</a></li>
            <li><a href="#work"><i class="fa fa-folder-open" aria-hidden="true"></i>{{ __('common.my_works') }}</a></li>
            <li><a href="#testimonial"><i class="fa fa-comments" aria-hidden="true"></i>{{ __('common.testimonial') }}</a></li>
            <li><a href="#blog"><i class="fa fa-pencil" aria-hidden="true"></i>{{ __('common.blog') }}</a></li>
            <li><a href="#faq"><i class="fa fa-question-circle" aria-hidden="true"></i>{{ __('common.faqs') }}</a></li>
            <li><a href="#contact"><i class="fa fa-envelope" aria-hidden="true"></i>{{ __('common.contact') }}</a></li>
            
            <!--=====|| LOGIN / DASHBOARD ||=====-->
            @if (Route::has('login'))
                <li class="nav-item">
                    @guest
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="fa fa-sign-in" aria-hidden="true"></i> {{ __('common.login') }}
                        </a>
                    @else
                        <a class="nav-link" href="{{ Auth::user()->utype === 'adm' ? route('admin.dashboard') : route('user.dashboard') }}">
                            <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }}
                        </a>
                    @endguest  
                </li>
            @endif
        </ul>
    </nav>

    <!--=====|| SOCIAL MEDIA ||=====-->
    <div class="social_links">
        <h4>{{ __('common.follow_us') }}</h4>
        <ul>
            @foreach ($medias->take(5) as $media)
                <li><a href="{{ $media->link }}" target="_blank"><img src="{{ asset('upload/media/' . $media->image) }}" alt="Social Media"></a></li>
            @endforeach
        </ul>
    </div>

    <!--=====|| FOOTER  ||=====-->
    <div class="menu_footer"> © {{ date($siteseting->year) }} 
        <a href="{{ $siteseting->link ?? '#' }}" target="_blank" rel="noopener noreferrer">{{ $siteseting->copyright_name ?? 'Your Company' }}</a>
    </div>

</aside>
<!--=====|| END:- MENU BAR ||=====-->