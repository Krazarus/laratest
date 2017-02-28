@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h1>Users</h1>
            </div>
            <div class="col-md-3">
                <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">Create New
                    User</a>
            </div>

            <table class="table">
                <thead>
                <tr>
                    <th>name</th>
                    <th>email</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                    </td>

                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
