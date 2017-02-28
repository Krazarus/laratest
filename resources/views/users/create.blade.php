@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <h1>Create new user</h1>
                <hr>

                {!! Form::open(['route' => 'users.store']) !!}

                    @include('users.partials.form', ['buttonText' => 'Create new user'])

                {!! Form::close() !!}

            </div>


        </div>
    </div>
@endsection
