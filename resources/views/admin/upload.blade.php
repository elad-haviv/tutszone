@if($show === 'input')
    <div id="upload-drop" class="uk-placeholder uk-text-center uk-text-large">
        <span class="fa fa-cloud-upload fa-3x"></span><br />
        {{ trans('admin.upload.info') }}
        <a class="uk-form-file">
            {{ trans('admin.upload.select-file') }}
            <input id="upload-select" type="file">
        </a>.
        <div id="upload-result" class="uk-hidden uk-alert uk-alert-warning uk-text-center"></div>
    </div>

    <div id="progressbar" class="uk-progress uk-hidden">
        <div class="uk-progress-bar" style="width: 0%;">...</div>
    </div>
@elseif($show === 'script')
    @section("scripts")
        @parent
    <script src="{{ url("resources/assets/js/components/upload.min.js") }}"></script>
    <script>
        $(function(){
            var progressbar = $("#progressbar"),
                    bar         = progressbar.find('.uk-progress-bar'),
                    settings    = {

                        action: '{{ $action }}',
                        params: {"_token": '{{ $token }}'},

                        @if (isset($allow))
                        allow : '{{ $allow }}',
                        @else
                        allow : '*.(jpg|jpeg|gif|png)',
                        @endif

                        loadstart: function() {
                            bar.css("width", "0%").text("0%");
                            progressbar.removeClass("uk-hidden");
                        },

                        progress: function(percent) {
                            percent = Math.ceil(percent);
                            bar.css("width", percent+"%").text(percent+"%");
                        },

                        allcomplete: function(response) {
                            bar.css("width", "100%").text("100%");
                            setTimeout(function(){
                                progressbar.addClass("uk-hidden");
                            }, 250);

                            @if(isset($onComplete))
                                {{$onComplete}}
                            @else
                                $("#upload-result").html(response);
                                $("#upload-result").removeClass("uk-hidden");
                                $("#upload-result").trigger("tz-upload-response");
                            @endif

                        }


                    };

            var select = UIkit.uploadSelect($("#upload-select"), settings),
                    drop   = UIkit.uploadDrop($("#upload-drop"), settings);
        });

    </script>
        @endsection
@endif