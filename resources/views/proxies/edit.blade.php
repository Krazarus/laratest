@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

                <h1>Edit Proxy</h1>
                <hr>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::model($proxy, ['method' => 'PATCH', 'route' => ['proxies.update', $proxy->id]]) !!}

                @include('proxies.partials.form', ['buttonText' => 'Update Status Proxy'])

                {!! Form::close() !!}

            </div>


        </div>
    </div>
@endsection
