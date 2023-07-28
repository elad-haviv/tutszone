@extends("layout.master")

@section("title")
    @parent - {{ trans("admin.page.add") }}
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <h1 class="uk-panel-title uk-text-center">{{trans('admin.page.edit')}} &quot;{{$page->title}}&quot;</h1>
        <form class="uk-form uk-form-horizontal uk-container" method="post" action="{{ route("admin:page:post.edit") }}">
            {!! csrf_field() !!}
            @if (count($errors) > 0)
                <ul class="uk-alert uk-alert-danger uk-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="hidden" name="id" id="id" value="{{ $page->id }}" />
            <div class="uk-form-row">
                <label class="uk-form-label" for="title">{{ trans('admin.page.title') }}</label>
                <div class="uk-form-controls">
                    <input id="title" name="title" type="text" class="uk-width-1-1" value="{{ $page->title }}" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="name">{{ trans('admin.page.name') }}</label>
                <div class="uk-form-controls">
                    <input id="name" name="name" type="text" class="uk-width-1-1" value="{{ $page->name }}" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="show">{{ trans('admin.page.show') }}</label>
                <div class="uk-form-controls">
                    <select id="show" name="show" class="uk-width-1-1">
                        <option value="1" {!! $page->show ? 'selected="selected"':'' !!}>{{trans('admin.yes')}}</option>
                        <option value="0" {!! $page->show ? '':'selected="selected"' !!}>{{trans('admin.no')}}</option>
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="lesson-content">{{ trans('admin.page.content') }}</label>
            </div>
            <div class="uk-form-row">
                <textarea id="lesson-content" name="content" class="uk-width-1-1 disable-resize" style="height: 150px;">{{ $page->content }}</textarea>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-primary" type="submit">{{ trans('admin.page.edit') }}</button>
            </div>
        </form>
    </div>
@endsection

@section("stylesheets")
    @parent
    <link rel="stylesheet" type="text/css" href="{{url('resources/assets/css/prism.css')}}" />
@endsection

@section("scripts")
    @parent

    @include('admin.upload',['show'=>'script','action'=>route('upload'),'token'=>csrf_token()])
    <script>
        $("#title").on('input', function(){
            var p1 = /[^A-Za-z0-9א-ת\-\_\.\']/g;
            $("#name").val($(this).val().toLowerCase().replace(p1,'-').replace(/[-]{2,}/g,'-'));
        });
    </script>
    <script src="{{url('resources/assets/js/vendor/ckeditor/ckeditor.js')}}"></script>
    <script>

        $("#title").on('input', function(){
            var p1 = /[^A-Za-z0-9א-ת\-\_\.\']/g;
            $("#name").val($(this).val().toLowerCase().replace(p1,'-').replace(/[-]{2,}/g,'-'));
        });

        CKEDITOR.replace('lesson-content', {
            mathJaxLib: '{{url('resources/assets/js/vendor/mathjax/MathJax.js?config=TeX-AMS_HTML')}}'
        });
    </script>
@endsection