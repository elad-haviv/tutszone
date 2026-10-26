@extends("layout.master")

@section("title")
    @parent - Members
@endsection

@section("content")
    <div class="uk-block uk-block-muted uk-margin-large-top">
        <div class="uk-container uk-container-center">
            <h1>Members</h1>

            <table class="uk-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Admin</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($members as $member)
                        <tr>
                            <td>{{ $member->id }}</td>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->group == 1 ? 'Yes' : '' }}</td>
                            <td>
                                <a href="{{ route('admin:member:edit', ['id' => $member->id]) }}">Edit</a>
                                &nbsp;
                                <a href="{{ route('admin:member:delete', ['id' => $member->id]) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="{{ route('admin:member:add') }}">Add member</a>
        </div>
    </div>
@endsection
