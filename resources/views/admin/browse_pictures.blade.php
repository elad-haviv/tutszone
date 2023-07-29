{{ $pp = public_path('images'.DIRECTORY_SEPARATOR.$dir) }}

<div id="choose-picture" class="clearfix">
    @foreach(scandir($pp) as $img)
        @if (strlen($img) > 2)
            <span style="background: #fafafa; border-color: #eee; margin: 0.1em; width: 24%; display: inline-block">
                <a href="#" onclick="selectPicture('{{$img}}')">
                    <img src="{{asset('public/images/'.$dir.'/'.$img)}}" alt="" title="" style="width: 100%; height: auto;" />
                </a>
            </span>
        @endif
    @endforeach
</div>

@section('scripts')
    @parent
    <script>
        function selectPicture(img) {
            $('#{{$target}}').val('public/images/{{$dir.'/'}}'+img);
            UIkit.modal('#browse-modal').hide();
            @if (isset($targetModal))
                UIkit.modal('#{{$targetModal}}').show();
            @endif
        }
    </script>
@endsection