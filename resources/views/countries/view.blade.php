@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center">View country Records</h2>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Country Name</th>
                <th>Continent</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>{{ $country->country_name }}</td>
                    <td>{{ $country->continent }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
