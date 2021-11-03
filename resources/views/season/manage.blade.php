@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header bg-dark">
                        <h4 style="color: white">Seasons Table</h4>
                    </div>
                    <div class="card-body">

                        <div class="mt-2 mb-3">
                            <a type="button" class="btn btn-success" href="{{ route('season.create') }}">
                                Create Season
                            </a>
                        </div>

                        <table id="tables-table" class="table table-striped table-dark">
                            <thead>
                            <tr>

                                <th>Name</th>
                                <th>League</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Actions</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($season->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center"> No Seasons Available</td>
                                </tr>
                            @else
                                @foreach ($season as $seasons)
                                    <tr>
                                        <td>{{ $seasons->name }}</td>
                                        <td>{{ $seasons->league_id }}</td>
                                        <td>{{ $seasons->start_date }}</td>
                                        <td>{{ $seasons->end_date }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a type="button" href="{{ route('season.show', $seasons->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a type="button" href="{{ route('season.edit', $seasons->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a>
                                                    {!!Form::open(['action' => ['App\Http\Controllers\SeasonController@destroy', $seasons->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
