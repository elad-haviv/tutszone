@extends('layout.master')

@section('title')
    @parent - {{ trans('nav.categories') }}
@endsection

@section('content')
    <section id="categories-list" class="uk-margin-top">
        <h1 class="uk-margin-large-top uk-text-center">{{ trans('nav.categories') }}</h1>
        <div class="uk-grid" data-uk-grid-match="{target:'.uk-panel'}">
            @if (Auth::check())
                @if (Auth::user()->group == 1)
                    <div class="uk-width-medium-1-3 uk-margin-top">
                        <a href="#add-category-form" data-uk-modal="{center:true}">
                            <div
                                class="uk-panel uk-panel-box tz-category-card uk-flex uk-flex-center uk-flex-middle uk-text-center">
                                <span class="fa fa-plus-circle tz-text-xl"></span>
                            </div>
                        </a>
                        @include('admin.add_category', [
                            'show' => 'modal',
                            'id' => 'add-category-form',
                            'defaultPicture' => 'resources/assets/images/default-category.png',
                        ])
                    </div>
                @endif
            @endif
            @foreach ($categories as $category)
                <div class="uk-width-medium-1-3 uk-margin-top uk-position-relative">
                    <a href="{{ route('category:show', ['name' => $category->name]) }}">
                        <div class="uk-panel uk-panel-box tz-category-card">
                            <div class="uk-margin-bottom">
                                <img src="{{ url($category->picture !== null ? $category->picture : 'images/default-category.png') }}"
                                    alt="thumbnail" title="thumbnail" class="uk-border-circle" />
                            </div>
                            <h1 class="uk-panel-title uk-text-center">{{ $category->title }}</h1>
                            <p class="uk-text-justify">{{ $category->description }}</p>
                        </div>
                    </a>
                    @if (Auth::check())
                        @if (Auth::user()->group == 1)
                            <div class="uk-position-top-right">
                                <a href="#" data-delete-category="{{ $category->id }}"
                                    class="uk-button uk-button-danger tz-radius-sm"><span class="fa fa-trash"></span></a>
                                <a href="{{ route('admin:category:edit', ['id' => $category->id]) }}"
                                    class="uk-button uk-button-success tz-radius-sm"><span class="fa fa-pencil"></span></a>
                            </div>
                        @endif
                    @endif
                </div>
            @endforeach
        </div>
    </section>
    <div class="uk-container uk-container-center uk-margin-large">
        {{ $categories->links() }}
    </div>
@endsection

@section('scripts')
    @parent

    @if (Auth::check())
        @if (Auth::user()->group === 1)
            @include('admin.add_category', ['show' => 'script'])
            <script>
                $(document).ready(function() {
                    $('[data-delete-category]').click(function() {
                        if (confirm("{{ trans('admin.category.delete-confirm') }}") == true) {
                            window.location = "{{ route('admin:category:delete', ['id' => null]) }}/" + $(this)
                                .attr(
                                    'data-delete-category');
                        }
                    });
                });
            </script>
        @endif
    @endif
@endsection
