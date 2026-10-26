@extends("layout.master")

@section("title")
    @parent - Edit member
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <h1 class="uk-panel-title uk-text-center">Edit member: {{ $member->name }}</h1>
        <form class="uk-form uk-form-horizontal uk-container" method="post" action="{{ route('admin:member:post.edit') }}">
            {!! csrf_field() !!}
            <input type="hidden" name="id" value="{{ $member->id }}" />
            @if (count($errors) > 0)
                <ul class="uk-alert uk-alert-danger uk-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <div class="uk-form-row">
                <label class="uk-form-label" for="email">Email</label>
                <div class="uk-form-controls">
                    <input id="email" name="email" type="email" class="uk-width-1-1" value="{{ $member->email }}" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="password">New password (leave empty to keep)</label>
                <div class="uk-form-controls">
                    <input id="password" name="password" type="password" class="uk-width-1-1" />
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="group">Admin</label>
                <div class="uk-form-controls">
                    <select id="group" name="group" class="uk-width-1-1">
                        <option value="0" {{ $member->group == 1 ? '' : 'selected="selected"' }}>No</option>
                        <option value="1" {{ $member->group == 1 ? 'selected="selected"' : '' }}>Yes</option>
                    </select>
                </div>
            </div>
            <div class="uk-modal-footer uk-text-right">
                <button class="uk-button uk-button-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
