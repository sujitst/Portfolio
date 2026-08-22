<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>    
    
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">



                <!--=====|| DASHBOARDS ||=====-->
                <li class="app-sidebar__heading">{{ __('common.dashboard') }}</li> 
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="active">
                        <i class="fa fa-tachometer metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.dashboard') }}</span>
                    </a>
                </li>
                <li class="{{ Route::is('admin.account*','admin.password.*') ? 'mm-active' : '' }}">
                    <a href="#">
                        <i class="fa fa-cog metismenu-icon"></i> 
                        <span>{{ __('common.account_setting') }}</span>
                        <i class="fa fa-angle-down metismenu-state-icon"></i>
                    </a>
                    <ul class="{{ Route::is('admin.account*','admin.password.*') ? 'mm-show' : '' }}">
                        <li>
                            <a href="{{ route('admin.account') }}" class="{{ Route::is('admin.account') ? 'active' : '' }}"> 
                                {{ __('common.my_account') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.password.change') }}" class="{{ Route::is('admin.password.change') ? 'active' : '' }}"> 
                                {{ __('common.change_password') }}
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-cogs metismenu-icon" aria-hidden="true">
                        </i><span>{{ __('common.site_setting') }}</span>
                        <i class="fa fa-angle-down metismenu-state-icon" aria-hidden="true"></i>
                    </a>
                    <ul class="{{ Route::is('site-setting.*') ? 'mm-show' : '' }}">
                        <li>
                            <a href="{{ route('site-setting.index') }}" class="{{ Route::is('site-setting.index') ? 'active' : '' }}"></i>
                                {{ __('common.setting') }}
                            </a>
                        </li>
                    </ul>
                </li>



                <!--=====|| USER MANAGEMENT ||=====-->
                <li class="app-sidebar__heading">{{ __('common.user_management') }}</li>
                <li>
                    <a href="{{ route('user.contact') }}" class="{{ Route::is('user.contact') ? 'active' : '' }}">
                        <i class="fa fa-commenting-o metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.contact_message') }}</span>
                    </a>
                </li>



                <!--=====|| RRONTEND VIEW ||=====-->
                <li class="app-sidebar__heading">{{ __('common.frontend_view') }}</li>
                <li>
                    <a href="#">
                        <i class="fa fa-home metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.home') }}</span>
                        <i class="fa fa-angle-down metismenu-state-icon" aria-hidden="true"></i>
                    </a>
                    <ul class="{{ Route::is('info.*','works.*') ? 'mm-show' : '' }}">
                        <li>
                            <a href="{{ route('info.index') }}" class="{{ Route::is('info.index') ? 'active' : '' }}">
                                <p>{{ __('common.my_information') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('works.index') }}" class="{{ Route::is('works.index') ? 'active' : '' }}">
                                <p>{{ __('common.my_works') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('about.index') }}" class="{{ Route::is('about.index') ? 'active' : '' }}">
                        <i class="fa fa-user metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.about') }}</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-suitcase metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.career') }}</span>
                        <i class="fa fa-angle-down metismenu-state-icon" aria-hidden="true"></i>
                    </a>
                    <ul class="{{ Route::is('experience.*') || Route::is('skills.*') ? 'mm-show' : '' }}">
                        <li>
                            <a href="{{ route('experience.index') }}" class="{{ Route::is('experience.index') ? 'active' : '' }}">
                                <p>{{ __('common.experience') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('skills.index') }}" class="{{ Route::is('skills.index') ? 'active' : '' }}">
                                <p>{{ __('common.skills') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-file-image-o metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.gallery') }}</span>
                        <i class="fa fa-angle-down metismenu-state-icon" aria-hidden="true"></i>
                    </a>
                    <ul class="{{ Route::is('category.*') || Route::is('image.*') ? 'mm-show' : '' }}">
                        <li>
                            <a href="{{ route('category.index') }}" class="{{ Route::is('category.index') ? 'active' : '' }}">
                                <p>{{ __('common.category') }}</p>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('image.index') }}" class="{{ Route::is('image.index') ? 'active' : '' }}">
                                <p>{{ __('common.images') }}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('service.index') }}" class="{{ Route::is('service.index') ? 'active' : '' }}">
                        <i class="fa fa-cogs metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.service') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('project.index') }}" class="{{ Route::is('project.index') ? 'active' : '' }}">
                        <i class="fa fa-briefcase metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.my_project') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('testimonial.index') }}" class="{{ Route::is('testimonial.index') ? 'active' : '' }}">
                        <i class="fa fa-comments metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.testimonial') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('blog.index') }}" class="{{ Route::is('blog.index') ? 'active' : '' }}">
                        <i class="fa fa-clipboard metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.blog') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('faq.index') }}" class="{{ Route::is('faq.index') ? 'active' : '' }}">
                        <i class="fa fa-question-circle-o metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.faqs') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('social-media.index') }}" class="{{ Route::is('social-media.index') ? 'active' : '' }}">
                        <i class="fa fa-share-square-o metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.social_media') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('my-contact.index') }}" class="{{ Route::is('my-contact.index') ? 'active' : '' }}">
                        <i class="fa fa-phone metismenu-icon" aria-hidden="true"></i>
                        <span>{{ __('common.my_contact') }}</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div> 