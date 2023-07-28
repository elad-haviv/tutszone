<li class="uk-nav-header">
    {{ trans("ucp.welcome") }} {{ Auth::check()?Auth::user()->name:trans("auth.guest") }}
</li>
@if(Auth::check())
    <li>
        <a href="{{ route("auth:logout") }}">
            <span class="fa fa-sign-out"></span>
            {{ trans("auth.logout") }}
        </a>
    </li>
@else
    <li>
        <a href="{{ route("auth:login") }}">
            <span class="fa fa-sign-in"></span>
            {{ trans("auth.login") }}
        </a>
    </li>
    <li>
        <a href="{{ route("auth:register") }}">
            <span class="fa fa-user-plus"></span>
            {{ trans("auth.register") }}
        </a>
    </li>
@endif
<li class="uk-nav-header">
    {{ trans("nav.main-menu") }}
</li>
<li>
    <a href="{{ route("home") }}" title="{{ trans("nav.home") }}">
        <span class="fa fa-home"></span>
        {{ trans("nav.home") }}
    </a>
</li>
<li>
    <a href="{{ route("category:home") }}" title="{{ trans("nav.categories") }}">
        <span class="fa fa-bars"></span>
        {{ trans("nav.categories") }}
    </a>
</li>
<li>
    <a href="{{ route("contact") }}" title="{{ trans("nav.contact") }}">
        <span class="fa fa-envelope"></span>
        {{ trans("nav.contact") }}
    </a>
</li>
@if(count($pages) > 0)
    <li class="uk-nav-header">
        {{ trans("nav.content-pages") }}
    </li>
    @foreach($pages as $page)
        <li>
            <a href="{{route("page", ["name" => $page->name])}}" title="{{$page->title}}">{{$page->title}}</a>
        </li>
    @endforeach
@endif
@if(count($partners) > 0)
    <li class="uk-nav-header">
        {{ trans("nav.partners") }}
    </li>
    @foreach($partners as $partner)
        <li>
            <a href="{{$partner['url']}}" title="{{$partner['name']}}">{{$partner['name']}}</a>
        </li>
    @endforeach
@endif