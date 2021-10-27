@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Seasons Table</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>league_id</th>
                                <th>name</th>
                                <th>start_date</th>
                                <th>end_date</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($season as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->league_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                    <td>
                                        <a href="{{ url('edit-season/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
