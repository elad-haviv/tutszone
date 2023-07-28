@extends("layout.master")

@section("title")
    @parent - {{ $page->title }}
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <h1>{{ $page->title }}</h1>
            <div id="page-content">
                {!! $page->content !!}
            </div>
        </div>
    </div>
@endsection