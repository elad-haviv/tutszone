<header>
    @section('header')
        <nav class="uk-navbar-container">
            <div
                uk-sticky="start: 200; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky uk-background-muted;">
                <div uk-navbar class="uk-container uk-container-expand">
                    <div class="uk-navbar-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ url('images/logo.svg') }}" title="Icon" alt="Icon" id="brand-logo"
                                width="48" />
                        </a>
                    </div>
                    <div class="uk-navbar-right">
                        <ul class="uk-navbar-nav">
                            <li class="uk-navbar-item">
                                <a href="#" title="{{ __('home') }}"><span uk-icon="home"></span></a>
                            </li>
                            <li class="uk-navbar-item">
                                <a href="#">{{ __('browse') }}</a>
                                <div class="uk-navbar-dropdown"
                                    uk-dropdown="stretch: true; animation: slide-top; animate-out: true">
                                    <p>Course Catalogue Placeholder</p>
                                </div>
                            </li>
                            <li class="uk-navbar-item">
                                <div class="uk-margin">
                                    <form class="uk-search uk-search-default">
                                        <input class="uk-search-input uk-border-pill" type="search"
                                            placeholder="{{ __('search') }}" aria-label="{{ __('search') }}">
                                        <span uk-search-icon></span>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="uk-navbar-left">
                        <ul class="uk-navbar-nav">
                            @auth
                                <li>
                                    <a href="#">{{ __('my-learning') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('notifications') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ __('account') }}</a>
                                    <div class="uk-navbar-dropdown">
                                        <ul class="uk-nav uk-navbar-dropdown-nav">
                                            <li class="uk-active"><a href="#">Active</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li class="uk-nav-header">Header</li>
                                            <li><a href="#">Item</a></li>
                                            <li><a href="#">Item</a></li>
                                            <li class="uk-nav-divider"></li>
                                            <li><a href="#">Item</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('register') }}" title="{{ __('login') }}">
                                        <span uk-sign-in-icon></span>
                                        {{ __('login') }}</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!--
                            <nav class="uk-navbar uk-navbar-attached" id="top-nav">
                                <div class="uk-container uk-container-center" id="navbar-container">
                                    <a href="{{ route('home') }}" title="TutsZone" class="uk-navbar-brand brand-name" id="brand">
                                        <img src="{{ url('images/logo.svg') }}" title="Icon" alt="Icon" id="brand-logo" width="24" />
                                        <span id="brand-name">
                                            <span>Tuts</span><span>Zone</span>
                                        </span>
                                    </a>
                                    <div class="uk-navbar-flip">
                                        <ul class="uk-navbar-nav uk-hidden-small">
                                            @include('layout.nav-menu-large')
                                        </ul>
                                        <ul class="uk-navbar-nav uk-visible-small">
                                            <li>
                                                <a href="#offcanvas-menu" data-uk-offcanvas="" title="{{ trans('nav.menu') }}">
                                                    <span class="fa fa-bars"></span>
                                                </a>
                                            </li>
                                        </ul>
                                        <div id="offcanvas-menu" class="uk-offcanvas">
                                            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip">
                                                <ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav>
                                                    @include('layout.nav-menu')
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        -->
    @show
</header>
