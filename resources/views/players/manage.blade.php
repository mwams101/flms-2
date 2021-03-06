@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h4 style="color: white">Players Table</h4>
                    </div>
                    <div class="card-body">

                        <div class="mt-2 mb-3">
                            <a type="button" class="btn btn-success" href="{{ route('players.create') }}">
                                Create Player
                            </a>
                        </div>

                        <table id="players-table" id="players-table" class="table table-striped table-dark table-sm">
                            <thead>
                            <tr>

                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Nationality</th>
                                <th>Actions</th>
                                <th>Delete</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($players->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center"> No players Available</td>
                                </tr>
                            @else
                                @foreach ($players as $player)
                                    <tr>
                                        <td>{{ $player->first_name }}</td>
                                        <td>{{ $player->last_name }}</td>
                                        <td>{{ $player->age }}</td>
                                        <td>{{ $player->nationality }}</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a type="button" href="{{ route('players.show', $player->id) }}" class="btn btn-primary btn-sm">View</a>
                                                <a type="button" href="{{ route('players.edit', $player->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                                <a>
                                                    {!!Form::open(['action' => ['App\Http\Controllers\PlayerController@destroy', $player->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
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
