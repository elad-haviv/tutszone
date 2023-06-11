@extends("layout.master")

@section("body")
    <header>
        <x-layout.navbar />
    </header>
    <main>
        @section("content")
            Content!
        @show
    </main>
    <x-layout.footer />
@endsection
