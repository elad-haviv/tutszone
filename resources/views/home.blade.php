@extends("layout.normal")

@section("title")
    @parent - Home
@endsection

@section("content")

    @if (Auth::check())
        <section>
            User Hero Section
        </section>
        <section>
            <h2>Continue Learning</h2>
            <ul>
                @foreach (App\Models\Course::getLastEnrolled() as $enrollment)
                    <x-course-card :course="$enrollment->course" />
                @endforeach
            </ul>
        </section>
        <section>
            <h2>Recommended for You</h2>
            <x-course-list :courses="App\Models\Course::getRecommended()" />
        </section>
        @else
        <section>
            Guest Hero Section
        </section>
    @endif
    <section>
        <h2>Bestsellers</h2>
        @foreach (App\Models\Course::getBestsellers() as $enrollment)
            <x-course-card :course="$enrollment->course()->first()" />
        @endforeach
    </section>
    <section>
        <h2>Categories</h2>
        <x-category-list :categories="App\Models\Category::getTopLevel()" />
    </section>
@endsection
