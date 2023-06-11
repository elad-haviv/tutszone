<ul>
    @php
        dd($courses);
    @endphp
    @foreach ($courses as $course)
        <x-course-card :course="$course" />
    @endforeach
</ul>
