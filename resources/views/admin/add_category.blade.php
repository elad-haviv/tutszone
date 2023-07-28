@if($show === 'modal')
    <div class="uk-modal" id="{{ $id }}">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            <form class="uk-form uk-form-horizontal" method="post" action="{{ route("admin:category:post.add") }}">
                {!! csrf_field() !!}
                <input id="parent" name="parent" type="hidden" class="uk-width-1-1" value="{{ isset($parent)?$parent:0 }}" />
                <div class="uk-modal-header">
                    <h1>{{ trans('admin.category.add') }}</h1>
                </div>
                @if (count($errors) > 0)
                    <ul class="uk-alert uk-alert-danger uk-list">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="uk-form-row">
                    <label class="uk-form-label" for="title">{{ trans('admin.category.title') }}</label>
                    <div class="uk-form-controls">
                        <input id="title" name="title" type="text" class="uk-width-1-1" />
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="name">{{ trans('admin.category.name') }}</label>
                    <div class="uk-form-controls">
                        <input id="name" name="name" type="text" class="uk-width-1-1" />
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="description">{{ trans('admin.category.description') }}</label>
                    <div class="uk-form-controls">
                        <textarea id="description" name="description" class="uk-width-1-1 disable-resize"></textarea>
                    </div>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label" for="picture">{{ trans('admin.category.picture') }}</label>
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
                                onclick="$('#picture').val('{{$defaultPicture}}')">
                            <span class="fa fa-magic"></span>
                        </button>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button class="uk-button uk-button-primary" type="submit">{{ trans('admin.category.add') }}</button>
                </div>
            </form>
        </div>
    </div>
    <div class="uk-modal" id="upload-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close"></a>
            @include('admin.upload',['show'=>'input'])
        </div>
    </div>
    <div class="uk-modal" id="browse-modal">
        <div class="uk-modal-dialog">
            <a class="uk-modal-close uk-close" data-target=""></a>
            @include('admin.browse_pictures',['dir'=>'category','target'=>'picture','targetModal'=>$id])
        </div>
    </div>
@elseif($show === 'script')
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
@endif