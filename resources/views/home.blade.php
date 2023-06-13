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
        <section class="gradient-1 uk-text-center uk-padding-large">
            <h1 class="uk-heading-large uk-padding-large">Welcome to TutsZone!</h1>
            <p class="uk-text-lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci veritatis molestias eligendi doloribus temporibus, dignissimos, unde fugit odio consequuntur dicta quia ea nobis cum ad necessitatibus perferendis, voluptatum rerum ut!</p>
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
