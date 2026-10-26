@extends("layout.master")

@section("title")
    @parent - {{ $member->name }}
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <h1>{{ $member->name }}</h1>
            <p>Member since {{ $member->created_at ? $member->created_at->format('d/m/Y') : '—' }}.</p>
        </div>
    </div>
@endsection
