@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 style="color: white">Leagues Table</h4>
                    </div>
                    <div class="card-body">

                        <div class="mt-2 mb-3">
                            <a type="button" class="btn btn-success" href="{{ route('leagues.create') }}">
                                Create League
                            </a>
                        </div>

                        <table id="clubs-table" class="table table-striped table-dark">
                            <thead>
                            <tr>

                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($league->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center"> No Clubs Available</td>
                                </tr>
                            @else
                                @foreach ($league as $leagues)
                                    <tr>
                                        <td>{{ $leagues->league_name }}</td>
                                        <td>{{ $leagues->description }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a type="button" href="{{ route('leagues.show', $leagues->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a type="button" href="{{ route('leagues.edit', $leagues->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid d-md-block">
                                                <a>
                                                    {!!Form::open(['action' => ['App\Http\Controllers\LeagueController@destroy', $leagues->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
