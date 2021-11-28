@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        @include('inc.messages')

        <div class="card" style="border-radius: 10px;">

            <div class="card-body">

                <div class="row">

                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-center">Season information</h3><br>

                                <div class="mb-2">

                                    <div class="col-sm-12"><strong>Season : </strong> {{ $season->name }}</div>
                                </div>
                                <div class="mb-2">

                                    <div class="col-sm-12"><strong>Season ID : </strong> {{ $season->id }}</div>
                                </div>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>Start Date : </strong> {{ $season->start_date }}</div>
                                </div>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>End Date : </strong> {{ $season->end_date }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4" style="width: 100%">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header bg-dark">
                                        <h4 style="color: white">League Table Stats</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="mt-2 mb-3">
                                            <a type="button" class="btn btn-success" href="{{ route('tables.create') }}">
                                                Update Season Stats
                                            </a>
                                        </div>

                                        <table id="stats-table" class="table table-striped table-dark">
                                            <thead>
                                            <tr>
                                                <td>club</td>
                                                <td>matches played</td>
                                                <td>won</td>
                                                <td>drawn</td>
                                                <td>lost</td>
                                                <td>goals Scored</td>
                                                <td>goals Conceded</td>
                                                <td>goal difference</td>
                                                <td>points</td>
                                                <td>Actions</td>
                                                <td>Delete</td>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @if($season->table->count() == 0)
                                                <tr>
                                                    <td colspan="10" class="text-center"> No Season stats Available</td>
                                                </tr>
                                            @else
                                                @foreach ($season->table as $tables)
                                                    <tr>
                                                        <td>{{ $tables->club->name }}</td>
                                                        <td>{{ $tables->matches_played }}</td>
                                                        <td>{{ $tables->won }}</td>
                                                        <td>{{ $tables->drawn }}</td>
                                                        <td>{{ $tables->lost }}</td>
                                                        <td>{{ $tables->goals_scored }}</td>
                                                        <td>{{ $tables->goals_conceded }}</td>
                                                        <td>{{ $tables->goal_difference }}</td>
                                                        <td>{{ $tables->points }}</td>
                                                        <td>
                                                            <a href="{{ route('tables.edit', $tables->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                                        </td>
                                                        <td>
                                                            <div class="d-grid gap-2 d-md-block">
                                                                {!!Form::open(['action' => ['App\Http\Controllers\TableController@destroy', $tables->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                                {{Form::hidden('_method', 'DELETE')}}
                                                                {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                                                {!!Form::close()!!}
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
                </div>
            </div>
        </div>
    </div>
@endsection
