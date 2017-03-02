@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Proxy list</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>Proxy IP</th>
                    <th>Google status</th>
                    <th>Youtube status</th>
                    <th>Pravda status</th>
                    <th>Final status</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $checks as $check )
                    <tr>
                        <td>{{ $check->proxy->ip }}</td>
                        <td>{{ $check->google_status }}</td>
                        <td>{{ $check->youtube_status }}</td>
                        <td>{{ $check->pravda_status }}</td>
                        <td>{{ $check->final_status }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
