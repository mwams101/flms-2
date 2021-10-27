@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>players Table</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped"">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Nationality</th>
                                <th>Club ID</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($player as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->first_name }}</td>
                                    <td>{{ $item->last_name }}</td>
                                    <td>{{ $item->age }}</td>
                                    <td>{{ $item->nationality }}</td>
                                    <td>{{ $item->club_id }}</td>
                                    <td>
                                        <a href="{{ url('edit-player/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        {!!Form::open(['action' => ['App\Http\Controllers\PlayerController@destroy', $item->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm mb'])}}
                                        {!!Form::close()!!}
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
