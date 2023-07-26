@extends("layout.normal")

@section("title")
    @parent - Home
@endsection

@section("content")

    @if (Auth::check())
        <section class="gradient-1">
            User Hero Section
        </section>
        <section>
            <h2>{{ __("continue-learning") }}</h2>
            <ul>
                @foreach (App\Models\Course::getLastEnrolled() as $enrollment)
                    <x-course-card :course="$enrollment->course" />
                @endforeach
            </ul>
        </section>
        <section>
            <h2>{{ __("recommended-courses") }}</h2>
            <x-course-list :courses="App\Models\Course::getRecommended()" />
        </section>
        @else
        <section class="gradient-1 uk-text-center uk-padding-large">
            <h1 class="uk-heading-large uk-padding-large">{{ __("hero.title", ["name" => config("app.name")]) }}</h1>
            <p class="uk-text-lead">{{ __("hero.text") }}</p>
        </section>
    @endif
    <section>
        <h2>{{ __("bestseller-courses") }}</h2>
        @foreach (App\Models\Course::getBestsellers() as $enrollment)
            <x-course-card :course="$enrollment->course()->first()" />
        @endforeach
    </section>
    <section>
        <h2>{{ __("categories") }}</h2>
        <x-category-list :categories="App\Models\Category::getTopLevel()" />
    </section>
@endsection
