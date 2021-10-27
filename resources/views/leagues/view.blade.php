@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Leagues In The System</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>League Name</th>
                                <th>League Description</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($league as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->league_name }}</td>
                                    <td>{{ $item->description }}</td>

                                    <td>
                                        <a href="{{ url('edit-league/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        {!!Form::open(['action' => ['App\Http\Controllers\LeagueController@destroy', $item->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
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
