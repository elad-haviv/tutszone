<nav class="uk-navbar-container">
    <div
        uk-sticky="start: 200; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky uk-background-muted;">
        <div uk-navbar class="uk-container uk-container-expand">
            <div class="uk-navbar-center">
                <x-application-logo />
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
