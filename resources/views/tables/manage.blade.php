@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4  style="color: white">Seasonal Stats Table</h4>
                    </div>
                    <div class="card-body">

                        <div class="mt-2 mb-3">
                            <a type="button" class="btn btn-success" href="{{ route('tables.create') }}">
                                Create New stats table
                            </a>
                        </div>

                        <table id="tables-table" class="table table-striped table-dark">
                            <thead>
                            <tr>
                                <th>Season</th>
                                <th>Team</th>
                                <th>played</th>
                                <th>won</th>
                                <th>drawn</th>
                                <th>lost</th>
                                <th>GS</th>
                                <th>GC</th>
                                <th>GD</th>
                                <th>points</th>
                                <th>actions</th>
                                <th>delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($table->count() == 0)
                                <tr>
                                    <td colspan="11" class="text-center"> No Seasonal tables available</td>
                                </tr>
                            @else
                                @foreach ($table as $tables)
                                    <tr>
                                        <td>{{ $tables->seasons->name }}</td>
                                        <td>{{ $tables->club_id }}</td>
                                        <td>{{ $tables->matches_played }}</td>
                                        <td>{{ $tables->won }}</td>
                                        <td>{{ $tables->drawn }}</td>
                                        <td>{{ $tables->lost }}</td>
                                        <td>{{ $tables->goals_scored }}</td>
                                        <td>{{ $tables->goals_conceded }}</td>
                                        <td>{{ $tables->goal_difference }}</td>
                                        <td>{{ $tables->points }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a type="button" href="{{ route('season.show', $tables->seasons->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a type="button" href="{{ route('tables.edit', $tables->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a>
                                                    {!!Form::open(['action' => ['App\Http\Controllers\ClubController@destroy', $tables->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                                    {!!Form::close()!!}
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
