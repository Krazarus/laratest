@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Proxy list</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>IP adress</th>
                    <th>Port</th>
                    <th>Country,City</th>
                    <th>Speed</th>
                    <th>Type</th>
                    <th>Anonymity</th>
                    <th>Last check</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $proxies as $proxy )
                <tr>
                    <td>{{ $proxy->ip }}</td>
                    <td>{{ $proxy->port }}</td>
                    <td>{{ $proxy->location }}</td>
                    <td>{{ $proxy->speed }}</td>
                    <td>{{ $proxy->type }}</td>
                    <td>{{ $proxy->anon }}</td>
                    <td>{{ $proxy->status }}</td>

                    <td>
                        <a href="{{ route('proxies.edit', $proxy->id) }}" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
