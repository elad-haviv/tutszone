@extends("layout.master")

@section("title")
    @parent - Add member
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <h1 class="uk-panel-title uk-text-center">Add member</h1>
        <form class="uk-form uk-form-horizontal uk-container" method="post" action="{{ route('admin:member:post.add') }}">
            {!! csrf_field() !!}
            @if (count($errors) > 0)
                <ul class="uk-alert uk-alert-danger uk-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="uk-form-row">
                <label class="uk-form-label" for="name">Name</label>
                <div class="uk-form-controls">
                    <input id="name" name="name" type="text" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="email">Email</label>
                <div class="uk-form-controls">
                    <input id="email" name="email" type="email" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="password">Password</label>
                <div class="uk-form-controls">
                    <input id="password" name="password" type="password" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="group">Admin</label>
                <div class="uk-form-controls">
                    <select id="group" name="group" class="uk-width-1-1">
                        <option value="0" selected="selected">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-primary" type="submit">Add</button>
            </div>
        </form>
    </div>
@endsection
