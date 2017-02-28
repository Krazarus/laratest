@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <h1>Edit user</h1>
                <hr>

                {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}

                @include('users.partials.form', ['buttonText' => 'Update user'])

                {!! Form::close() !!}

            </div>


        </div>
    </div>
@endsection
