@extends('layout.master')

@section('title')
    @parent - {{ isset($current) ? $current->title : $course->title }}
@endsection

@if (isset($addons))
    @section('stylesheets')
        @parent
        @foreach ($addons as $addon)
            @foreach ($addon->styles as $style)
                <link rel="stylesheet" type="text/css" href="{{ url($style) }}" />
            @endforeach
        @endforeach
    @endsection
    @section('scripts')
        @parent
        @foreach ($addons as $addon)
            @foreach ($addon->scripts as $script)
                <script type="text/javascript" src="{{ url($script) }}"></script>
            @endforeach
        @endforeach
    @endsection
@endif


@section('content')
    <section id="course-view">
        <div class="uk-grid uk-grid-collapse">
            <aside class="uk-width-medium-1-3" id="side-nav">
                <div class="uk-panel uk-panel-box">
                    @if ($category !== null)
                        <a href="{{ route('category:show', ['name' => $category->name]) }}">
                            <span class="fa fa-chevron-right fa-fw"></span>
                            {{ $category->title }}
                        </a>
                    @else
                        <a href="{{ route('category:home') }}">
                            <span class="fa fa-chevron-right fa-fw"></span>
                            {{ trans('nav.back-to-categories') }}
                        </a>
                    @endif
                    <h1 class="uk-margin-large-top uk-text-center">
                        <a href="{{ route('course:show', ['name' => $course->name]) }}">
                            {{ $course->title }}
                        </a>
                    </h1>
                    <p>{{ $course->description }}</p>
                    @if (count($lessons) > 0)
                        <h2 class="uk-margin-large-top">{{ trans('nav.lessons') }}</h2>
                        <ol class="uk-list uk-list-line uk-list-space" id="lessons-list">
                            @foreach ($lessons as $lesson)
                                <li @if (isset($current)) {!! $lesson->name === $current->name ? 'class="active"' : '' !!} @endif>
                                    <a
                                        href="{{ route('course:show', ['name' => $course->name, 'lesson' => $lesson->name]) }}">
                                        {{ $lesson->title }}
                                    </a>
                                    @if (Auth::check())
                                        @if (Auth::user()->group == 1)
                                            <span class="uk-float-right">
                                                <a href="#" data-delete-lesson="{{ $lesson->id }}"><span
                                                        class="fa fa-trash"></span></a>
                                                <a href="{{ route('admin:lesson:edit', ['id' => $lesson->id]) }}"><span
                                                        class="fa fa-pencil"></span></a>
                                            </span>
                                        @endif
                                    @endif
                                </li>
                            @endforeach
                        </ol>
                    @endif
                    @if (Auth::check())
                        @if (Auth::user()->group == 1)
                            <ol class="uk-list uk-list-line uk-list-space">
                                <li>
                                    <a href="{{ route('admin:lesson:add', ['data' => $course->id]) }}">
                                        <span class="fa fa-plus-circle"></span>
                                        {{ trans('admin.lesson.add') }}
                                    </a>
                                </li>
                            </ol>
                        @endif
                    @endif
                </div>
            </aside>
            <div class="uk-width-medium-2-3" id="main-content">
                @if (isset($current))
                    <article class="uk-article">
                        <h1 class="uk-article-title">{{ $current->title }}</h1>
                        <p class="uk-article-meta">
                            {{ trans('lesson.written-by') }}
                            <a href="{{ route('member:show', ['name' => urlencode($author['name'])]) }}">
                                {{ $author->name }}
                            </a>
                            {{ trans('lesson.written-on') }}
                            {{ date('d/m/Y', $current->auth_date) }}
                        </p>
                        @if ($current->lead !== null)
                            <p class="uk-article-lead">{!! $current->lead !!}</p>
                        @endif
                        <div id="lesson-content">
                            {!! $current->content !!}
                        </div>
                    </article>
                    <hr class="uk-article-divider" />
                    <div class="uk-panel uk-panel-box">
                        <form class="uk-form" action="{{ route('course:comment') }}" method="post">
                            @if (count($errors) > 0)
                                <ul class="uk-alert uk-alert-danger uk-list">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            {!! csrf_field() !!}
                            <label>
                                <span class="fa fa-comment"></span>
                                {{ trans('lesson.add-comment') }}
                                <textarea style="min-width: 100%" name="content" id="content">{{ old('content') }}</textarea>
                            </label>
                            <input type="hidden" name="lesson-id" id="lesson-id" value="{{ $current->id }}" />
                            <button
                                class="uk-button uk-button-success uk-width-1-1">{{ trans('lesson.add-comment') }}</button>
                        </form>
                        @if (!Auth::check())
                            <div
                                class="uk-position-cover uk-overlay-background uk-overlay-panel uk-flex uk-flex-center uk-flex-middle uk-text-center">
                                <div>
                                    <h3>{{ trans('lesson.cant-comment-title') }}</h3>
                                    <p>{{ trans('lesson.cant-comment') }}</p>
                                    <p class="uk-margin-top">
                                        <a href="{{ route('login') }}"
                                            class="uk-button uk-button-success">{{ trans('auth.login') }}</a>
                                        <a href="{{ route('register') }}"
                                            class="uk-button uk-button-success">{{ trans('auth.register') }}</a>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                    @if (count($comments) > 0)
                        <hr />
                        @include('comments', ['comments' => $comments])
                    @endif
                @else
                    @include('course.details', ['course' => $course, 'lessons' => $lessons])
                @endif
                @if (Auth::check())
                    @if (Auth::user()->group == 1)
                        <a href="{{ route('admin:lesson:add', ['data' => $course->id]) }}"
                            title="{{ trans('admin.course.add') }}" class="uk-button uk-button-large uk-button-success"
                            style="width:100%">
                            <span class="fa fa-plus-circle"></span>
                            {{ trans('admin.lesson.add') }}
                        </a>
                    @endif
                @endif
            </div>
        </div>
    </section>
    <a href="#" class="to-top-button" data-uk-smooth-scroll><span class="fa fa-chevron-circle-up"></span></a>
@endsection

@section('scripts')
    @parent
    <script>
        $(document).ready(function() {
            $(window).scroll(function() {
                if ($(this).scrollTop() > 150) {
                    $('.to-top-button').stop().animate({
                        bottom: '50px'
                    }, "fast");
                } else {
                    $('.to-top-button').stop().animate({
                        bottom: '-100px'
                    }, "fast");
                }
            });
            @if (Auth::check())
                @if (Auth::user()->group == 1)
                    $('[data-delete-lesson]').click(function() {
                        if (confirm("{{ trans('admin.lesson.delete-confirm') }}") == true) {
                            window.location = "{{ route('admin:lesson:delete', ['id' => null]) }}/" + $(
                                    this)
                                .attr('data-delete-lesson');
                        }
                    });
                @endif
            @endif
        });
    </script>
@endsection
