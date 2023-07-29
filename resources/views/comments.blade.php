<ul class="uk-comment-list">
    @foreach ($comments as $comment)
        <li>
            <article class="uk-comment uk-panel uk-panel-box">
                <header class="uk-comment-header">
                    <h4 class="uk-comment-title">
                        {{-- <a href="{{route("member:show", ["name" => urlencode($comment->authorDetails['name'])])}}"> --}}
                        {{ $comment->user->name }}
                        {{-- </a> --}}
                    </h4>
                    <div class="uk-comment-meta">
                        {{ trans('lesson.written-on') }}
                        {{ date('d/m/Y, H:i', $comment->auth_date) }}
                    </div>
                </header>
                <p class="uk-comment-body">
                    {!! $comment->content !!}
                </p>
            </article>
        </li>
    @endforeach
</ul>
{{ $comments->links() }}
