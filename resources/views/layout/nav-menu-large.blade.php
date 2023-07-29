<li>
    <a href="{{ route('home') }}" title="{{ trans('nav.home') }}" class="uk-navbar-nav-subtitle uk-text-center">
        <span class="fa fa-home"></span>
        <div>{{ trans('nav.home') }}</div>
    </a>
</li>
<li>
    <a href="{{ route('category:home') }}" title="{{ trans('nav.categories') }}"
        class="uk-navbar-nav-subtitle uk-text-center">
        <span class="fa fa-th-large"></span>
        <div>{{ trans('nav.categories') }}</div>
    </a>
</li>
<li>
    <a href="{{ route('contact') }}" title="{{ trans('nav.contact') }}" class="uk-navbar-nav-subtitle uk-text-center">
        <span class="fa fa-envelope"></span>
        <div>{{ trans('nav.contact') }}</div>
    </a>
</li>
@if ($showPages)
    <li class="uk-parent" data-uk-dropdown>
        <a href="#" class="uk-navbar-nav-subtitle uk-text-center">
            <span class="fa fa-file-text"></span>
            <div>{{ trans('nav.content-pages') }}</div>
        </a>
        <div class="uk-dropdown uk-dropdown-navbar">
            <ul class="uk-nav uk-nav-navbar">
                @foreach ($pages as $page)
                    <li>
                        @if (Auth::check())
                            @if (Auth::user()->group == 1)
                                <span class="uk-float-right" style="padding: 5px;">
                                    <a style="color: inherit;" href="#"
                                        data-delete-page="{{ $page->id }}"><span class="fa fa-trash"></span></a>
                                    <a style="color: inherit;"
                                        href="{{ route('admin:page:edit', ['id' => $page->id]) }}"><span
                                            class="fa fa-pencil"></span></a>
                                </span>
                            @endif
                        @endif
                        <a @if ($page->show == 0) class="uk-text-muted" @endif
                            href="{{ route('page', ['name' => $page->name]) }}"
                            title="{{ $page->title }}">{{ $page->title }}</a>
                    </li>
                @endforeach
                @if (Auth::check())
                    @if (Auth::user()->group == 1)
                        <li>
                            <a href="{{ route('admin:page:add') }}" title="{{ trans('admin.page.add') }}">
                                <span class="fa fa-plus"></span>
                                {{ trans('admin.page.add') }}
                            </a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </li>
@endif
@if (count($partners) > 0)
    <li class="uk-parent" data-uk-dropdown>
        <a href="#" class="uk-navbar-nav-subtitle uk-text-center">
            <span class="fa fa-group"></span>
            <div>{{ trans('nav.partners') }}</div>
        </a>
        <div class="uk-dropdown uk-dropdown-navbar">
            <ul class="uk-nav uk-nav-navbar">
                @foreach ($partners as $partner)
                    <li>
                        <a href="{{ $partner['url'] }}" title="{{ $partner['name'] }}">{{ $partner['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </li>
@endif
<li class="uk-parent" data-uk-dropdown>
    <a href="#" class="uk-navbar-nav-subtitle uk-text-center">
        <span class="fa fa-user"></span>
        <div>{{ Auth::check() ? Auth::user()->name : trans('auth.guest') }}</div>
    </a>
    <div class="uk-dropdown uk-dropdown-navbar">
        <ul class="uk-nav uk-nav-navbar">
            <li class="uk-nav-header">
                {{ trans('ucp.welcome') }} {{ Auth::check() ? Auth::user()->name : trans('auth.guest') }}
            </li>
            @if (Auth::check())
                <li>
                    <a href="{{ route('logout') }}">
                        <span class="fa fa-sign-out"></span>
                        {{ trans('auth.logout') }}
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}">
                        <span class="fa fa-sign-in"></span>
                        {{ trans('auth.login') }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}">
                        <span class="fa fa-user-plus"></span>
                        {{ trans('auth.register') }}
                    </a>
                </li>
            @endif
        </ul>
    </div>
</li>

@section('scripts')
    @parent

    @if (Auth::check())
        @if (Auth::user()->group === 1)
            <script>
                $(document).ready(function() {
                    $('[data-delete-page]').click(function() {
                        if (confirm("{{ trans('admin.page.delete-confirm') }}") == true) {
                            window.location = "{{ route('admin:page:delete', ['id' => null]) }}/" + $(this).attr(
                                'data-delete-page');
                        }
                    });
                });
            </script>
        @endif
    @endif
@endsection
