<article class="uk-article">
    <div class="uk-text-center">
        <img class="uk-border-circle" src="{{ url($course->picture ? $course->picture : "resources/assets/images/icons/icon-128.png") }}" />
    </div>
    <h1 class="uk-article-title uk-text-center">{{ $course->title }}</h1>
    <p class="uk-article-meta uk-text-center">
        {{ trans('lesson.written-by') }}
        {{ $author->name }}
    </p>
    <p class="uk-article-lead">{{ $course->description }}</p>
    <div id="lesson-content">
        @if(count($lessons) > 0)
            <h2 class="uk-margin-large-top">{{ trans("nav.lessons") }}</h2>
            <dl class="uk-description-list-line" id="lessons-list">
                @foreach($lessons as $lesson)
                    <dt>
                        <a href="{{ route("course:show", ["name" => $course->name, "lesson" => $lesson->name]) }}">
                            {{ $lesson->title }}
                        </a>
                    </dt>
                    <dd>{{ $lesson->lead }}</dd>
                @endforeach
            </ol>
        @endif
    </div>
</article>