@extends("layout.master")

@section("title")
    @parent - {{ trans("admin.course.add") }}
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <h1 class="uk-panel-title uk-text-center">{{trans('admin.lesson.add-to')}} &quot;{{$course->title}}&quot;</h1>
        <form class="uk-form uk-form-horizontal uk-container" method="post" action="{{ route("admin:lesson:post.add") }}">
            {!! csrf_field() !!}
            @if (count($errors) > 0)
                <ul class="uk-alert uk-alert-danger uk-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="hidden" id="course" name="course" value="{{$course->id}}" />
            <div class="uk-form-row">
                <label class="uk-form-label" for="title">{{ trans('admin.lesson.title') }}</label>
                <div class="uk-form-controls">
                    <input id="title" name="title" type="text" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="name">{{ trans('admin.lesson.name') }}</label>
                <div class="uk-form-controls">
                    <input id="name" name="name" type="text" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="addons">{{ trans('admin.lesson.addons') }}</label>
                <div class="uk-form-controls">
                    <input id="addons" name="addons" type="text" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="picture">{{ trans('admin.lesson.picture') }}</label>
                <div class="uk-form-controls uk-grid">
                    <input id="picture" name="picture" type="text" class="uk-width-7-10" />
                    <button data-uk-modal="{target:'#upload-modal'}"
                            class="uk-button uk-button-success uk-width-1-10"
                            id="picture-file-button"
                            type="button"
                            title="From File">
                        <span class="fa fa-file"></span>
                    </button>
                    <button data-uk-modal="{target:'#browse-modal'}"
                            class="uk-button uk-button-success uk-width-1-10"
                            id="picture-browse-button"
                            type="button"
                            title="Browse">
                        <span class="fa fa-folder-open"></span>
                    </button>
                    <button class="uk-button uk-button-success uk-width-1-10"
                            id="picture-default-button"
                            type="button"
                            title="Default Picture"
                            onclick="$('#picture').val('resources/assets/images/default-category.png')">
                        <span class="fa fa-magic"></span>
                    </button>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="lead">{{ trans('admin.lesson.lead') }}</label>
                <div class="uk-form-controls">
                    <textarea id="lead" name="lead" class="uk-width-1-1 disable-resize" style="height: 150px;"></textarea>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="lesson-content">{{ trans('admin.lesson.content') }}</label>
            </div>
            <div class="uk-form-row">
                <textarea id="lesson-content" name="content" class="uk-width-1-1 disable-resize" style="height: 150px;"></textarea>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-primary" type="submit">{{ trans('admin.lesson.add') }}</button>
            </div>
        </form>
    </div>
    <div class="uk-modal" id="upload-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            @include('admin.upload',['show'=>'input'])
        </div>
    </div>
    <div class="uk-modal" id="browse-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            @include('admin.browse_pictures',['dir'=>'category','target'=>'picture'])
        </div>
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

        $("#upload-result").on('tz-upload-response', function() {
            $("#picture").val($("#upload-result").text());
        });
    </script>

    <script src="{{url('resources/assets/js/vendor/prism.js')}}"></script>
    <script src="{{url('resources/assets/js/vendor/ckeditor/ckeditor.js')}}"></script>
    <script src="{{url('resources/assets/js/vendor/mathjax/MathJax.js?config=TeX-AMS_HTML')}}"></script>
    @include('admin.upload',['show'=>'script','action'=>route('upload'),'token'=>csrf_token()])
    <script>

        $("#title").on('input', function(){
            var p1 = /[^A-Za-z0-9א-ת\-\_\.\']/g;
            $("#name").val($(this).val().toLowerCase().replace(p1,'-').replace(/[-]{2,}/g,'-'));
        });

        $("#upload-result").on('tz-upload-response', function() {
            $("#picture").val($("#upload-result").text());
        });
        CKEDITOR.replace('lesson-content', {
            mathJaxLib: '{{url('resources/assets/js/vendor/mathjax/MathJax.js?config=TeX-AMS_HTML')}}'
        });
    </script>
@endsection