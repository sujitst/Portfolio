<div class="app-header header-shadow">
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
                <span class="btn-icon-wrapper"><i class="fa fa-ellipsis-v fa-w-6"></i></span>
            </button>
        </span>
    </div>    
    <div class="app-header__content">
        <div class="app-header-left">
            <div class="search-wrapper">
                <div class="input-holder">
                    <input type="text" class="search-input" placeholder="Type to search">
                    <button class="search-icon"><span></span></button>
                </div>
                <button class="close"></button>
            </div>
            <ul class="header-menu nav">
                <li class="nav-item"><a href="{{ route('admin.dashboard') }}" class="nav-link"><i class="nav-link-icon fa fa-database"></i>{{ __('common.dashboard') }}</a></li>
                <li class="btn-group nav-item"><a href="{{ route('project.index') }}" class="nav-link"><i class="nav-link-icon fa fa-edit"></i>{{ __('common.projects') }}</a></li>
                <li class="dropdown nav-item"><a href="{{ route('admin.account') }}" class="nav-link"><i class="nav-link-icon fa fa-cog"></i>{{ __('common.settings') }}</a></li>
            </ul>        
        </div>
        <div class="app-header-right">

            <!--=====|| LANGUAGE SELECTOR ||=====-->
            <div class="custom_lang_select">
                <select name="language" class="language_select">
                    <option value="en" {{ session('lang_code') == 'en' ? 'selected' : '' }}>{{ __('common.en') }}</option>
                    <option value="bn" {{ session('lang_code') == 'bn' ? 'selected' : '' }}>{{ __('common.bn') }}</option>
                    <option value="hi" {{ session('lang_code') == 'hi' ? 'selected' : '' }}>{{ __('common.hi') }}</option>
                    <option value="sp" {{ session('lang_code') == 'sp' ? 'selected' : '' }}>{{ __('common.sp') }}</option>
                    <option value="fr" {{ session('lang_code') == 'fr' ? 'selected' : '' }}>{{ __('common.fr') }}</option>
                </select>
            </div>


            <!--=====|| USER PROFILE DROPDOWN ||=====-->
            <div class="header-btn-lg pr-0">
                <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="btn-group">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-double-down" aria-hidden="true"></i></button>
                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                    <ul class="user_menu">
                                        <li><a href="{{ route('admin.account') }}"><i class="fa fa-user-o" aria-hidden="true"></i> {{ __('common.my_account') }}</a></li>
                                        <li><a href="{{ route('admin.password.change') }}"><i class="fa fa-cog" aria-hidden="true"></i> {{ __('common.change_password') }}</a></li>
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('common.logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content-left ml-3 user_info">
                            <div class="widget-heading">{{ auth()->user()->name }}</div>
                            <div class="widget-subheading"> {{ auth()->user()->utype == 'adm' ? 'Admin' : 'User' }}</div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
        
    </div>
</div>        