@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        @include('inc.messages')

        <div class="card" style="border-radius: 10px;">

            <div class="card-body">

                <div class="row">

                    <div class="col-sm-6" style="padding: 25px;">
                        <div>
                            <img src="{{ asset('img/club.png') }}" height="200px" width="200px" class="img-responsive center-block d-block mx-auto">
                        </div><br><br>

                        <h3 class="card-title">{{ $club->name }}</h3>
                        <p class="card-text" style="font-weight: 500;">{{ $club->description }}</p>
                        <a href="#" class="text-center">Learn more</a>

                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-center">Club information</h3><br>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>Club Name : </strong> {{ $club->name }}</div>
                                </div>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>Club Country : </strong> {{ $club->country }}</div>
                                </div>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>Founded : </strong> {{ $club->founded }}</div>
                                </div>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>Number of Players : </strong> {{ $club->players->count() }}</div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Players</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="mt-2 mb-3">
                                            <a type="button" class="btn btn-success" href="{{ route('clubs.create') }}">
                                                Add Player
                                            </a>
                                        </div>

                                        <table id="players-table" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Age</th>
                                                <th>Nationality</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @if($club->players->count() == 0)
                                                <tr>
                                                    <td colspan="5" class="text-center"> No Players Available</td>
                                                </tr>
                                            @else
                                                @foreach ($club->players as $player)
                                                    <tr>
                                                        <td>{{ $player->first_name }}</td>
                                                        <td>{{ $player->last_name }}</td>
                                                        <td>{{ $player->age }}</td>
                                                        <td>{{ $player->nationality }}</td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                            {!!Form::open(['action' => ['App\Http\Controllers\ClubController@destroy', $player->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}
                                                            {!!Form::close()!!}
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
