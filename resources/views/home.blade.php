@extends('layout.master')

@section('content')
    <div class="uk-block uk-block-muted hero-section">
        <div class="uk-container uk-container-center padded">
            <h1 class="uk-text-center">{{ trans('main.welcome') }}</h1>
            <p class="uk-text-center uk-text-large padded">{!! trans('main.description') !!}</p>
        </div>
    </div>
    @if (count($newTuts) > 0)
        <div class="uk-container uk-container-center uk-margin-top">
            <h2>
                {{ trans('main.new-tutorials') }}
                <small class="uk-float-right uk-hidden-small">
                    <a href="{{ route('category:home') }}">{{ trans('main.show-topics') }} <span
                            class="fa fa-chevron-left"></span></a>
                </small>
            </h2>
            <ul class="uk-grid uk-grid-width-medium-1-3 uk-grid-width-small-1-1" data-uk-grid-match="{target:'.uk-panel'}">
                @foreach ($newTuts as $tut)
                    <li class="uk-margin-small-bottom">
                        <a href="{{ route('course:show', ['name' => $tut->name]) }}">
                            <div class="uk-panel uk-panel-box tz-category-card">
                                <div class="uk-margin-bottom">
                                    <img src="{{ url($tut->picture !== null ? $tut->picture : 'resources/assets/images/default.png') }}"
                                        alt="thumbnail" title="thumbnail" class="uk-border-circle" />
                                </div>
                                <h1 class="uk-panel-title uk-text-center">{{ $tut->title }}</h1>
                                <p class="uk-text-justify">{{ $tut->description }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (count($featuredTuts) > 0)
        <div class="uk-container uk-container-center uk-margin-top">
            <h2>
                {{ trans('main.featured-tutorials') }}
                <small class="uk-float-right uk-hidden-small">
                    <a href="{{ route('category:home') }}">{{ trans('main.show-topics') }} <span
                            class="fa fa-chevron-left"></span></a>
                </small>
            </h2>
            <ul class="uk-grid uk-grid-width-medium-1-3 uk-grid-width-small-1-1" data-uk-grid-match="{target:'.uk-panel'}">
                @foreach ($featuredTuts as $tut)
                    <li class="uk-margin-small-bottom">
                        <a href="{{ route('course:show', ['name' => $tut->name]) }}">
                            <div class="uk-panel uk-panel-box tz-category-card">
                                <div class="uk-margin-bottom">
                                    <img src="{{ url($tut->picture !== null ? $tut->picture : 'resources/assets/images/default.png') }}"
                                        alt="thumbnail" title="thumbnail" class="uk-border-circle" />
                                </div>
                                <h1 class="uk-panel-title uk-text-center">{{ $tut->title }}</h1>
                                <p class="uk-text-justify">{{ $tut->description }}</p>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
