<header>
    @section('header')
        <nav class="uk-navbar uk-navbar-attached" id="top-nav">
            <div class="uk-container uk-container-center" id="navbar-container">
                <a href="{{ route('home') }}" title="TutsZone" class="uk-navbar-brand brand-name" id="brand">
                    <img src="{{ url('images/logo.svg') }}" title="Icon" alt="Icon" id="brand-logo" />
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
    @show
</header>
