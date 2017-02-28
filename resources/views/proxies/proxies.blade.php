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
                <tr>
                    <td>John</td>
                    <td>Doe</td>
                    <td>john@example.com</td>
                    <td>john@example.com</td>
                    <td>john@example.com</td>
                    <td>john@example.com</td>
                    <td>john@example.com</td>
                    <td>
                        <button type="button" class="btn btn-warning">Default</button>
                        <button type="button" class="btn btn-danger">Default</button>
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
