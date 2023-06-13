<nav class="uk-navbar-container">
    <div uk-sticky="start: 200; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky uk-background-muted;">
        <div uk-navbar class="uk-container uk-container-expand">
            <div class="uk-navbar-center">
                <a class="uk-navbar-item uk-logo" href="#">
                    <img src="{{ url('images/logo.svg') }}" alt="{{ config('app.name') }}" width="48">
                </a>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    @auth
                        <li>
                            <a href="#">My Learning</a>
                        </li>
                        <li>
                            <a href="#">Notifications</a>
                        </li>
                        <li>
                            <a href="#">Account</a>
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
                            <a href="#">Login</a>
                            <div class="uk-navbar-dropdown uk-border-rounded">
                                <p>Login form Here</p>
                            </div>
                        </li>
                        <li>
                            <a href="#">Register</a>
                            <div class="uk-navbar-dropdown uk-border-rounded">
                                <p>Register form Here</p>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="uk-navbar-item" dir="ltr">
                        <div class="uk-margin">
                            <form class="uk-search uk-search-default">
                                <span class="uk-search-icon-flip" uk-search-icon></span>
                                <input class="uk-search-input uk-border-pill" type="search" placeholder="Search" aria-label="Search">
                            </form>
                        </div>
                    </li>
                    <li class="uk-navbar-item" dir="ltr">
                        <a href="#">BROWSE</a>
                        <div class="uk-navbar-dropdown" uk-dropdown="stretch: true; animation: slide-top; animate-out: true">
                            <p>Course Catalogue Here</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
