@extends("layout.master")

@section("title")
    @parent - {{ trans("admin.course.add") }}
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <h1 class="uk-panel-title uk-text-center">{{trans('admin.course.add')}}</h1>
        <form class="uk-form uk-form-horizontal uk-container" method="post" action="{{ route("admin:course:post.add") }}">
            {!! csrf_field() !!}
            @if (count($errors) > 0)
                <ul class="uk-alert uk-alert-danger uk-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <input type="hidden" id="author_id" name="author_id" value="{{Auth::user()->id}}" />
            <div class="uk-form-row">
                <label class="uk-form-label" for="title">{{ trans('admin.course.title') }}</label>
                <div class="uk-form-controls">
                    <input id="title" name="title" type="text" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="name">{{ trans('admin.course.name') }}</label>
                <div class="uk-form-controls">
                    <input id="name" name="name" type="text" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="category">{{ trans('admin.course.category') }}</label>
                <div class="uk-form-controls">
                    <select id="category" name="category" class="uk-width-1-1">
                        {!! $categorySelector !!}
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="description">{{ trans('admin.category.description') }}</label>
                <div class="uk-form-controls">
                    <textarea id="description" name="description" class="uk-width-1-1 disable-resize" style="height: 150px;"></textarea>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="picture">{{ trans('admin.course.picture') }}</label>
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
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-primary" type="submit">{{ trans('admin.course.add') }}</button>
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
@endsection