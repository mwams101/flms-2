@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stats Table</h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>club</th>
                                <th>played</th>
                                <th>won</th>
                                <th>drawn</th>
                                <th>lost</th>
                                <th>GS</th>
                                <th>GC</th>
                                <th>GD</th>
                                <th>points</th>
                                <th>edit</th>
                                <th>delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($table as $item)
                                <tr>
                                    <td>{{ $item->club_id }}</td>
                                    <td>{{ $item->matches_played }}</td>
                                    <td>{{ $item->won }}</td>
                                    <td>{{ $item->drawn }}</td>
                                    <td>{{ $item->lost }}</td>
                                    <td>{{ $item->goals_scored }}</td>
                                    <td>{{ $item->goals_conceded }}</td>
                                    <td>{{ $item->goal_difference }}</td>
                                    <td>{{ $item->points }}</td>

                                    <td>
                                        <a href="{{ url('edit-table/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        {!!Form::open(['action' => ['App\Http\Controllers\TableController@destroy', $item->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
