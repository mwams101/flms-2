@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $clubs->count() }} </h3>
                        <p class="card-body"> Total Clubs </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $players->count() }} </h3>
                        <p class="card-body"> Total Players </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $leagues->count() }} </h3>
                        <p class="card-body"> Total leagues </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card ">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $seasons->count() }} </h3>
                        <p class="card-body"> Total Seasons </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- tabs menu --}}

    <div class="container mt-5">

        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" >

            <li class="nav-item col-md-4" >
                <a style="text-align: center; color: black;" class="nav-link" id="pills-players-tab" data-toggle="pill" href="#pills-players" role="tab" aria-controls="pills-players" aria-selected="true">Players</a>
            </li>
            <li class="nav-item col-md-4">
                <a style="text-align: center; color: black;" class="nav-link" id="pills-clubs-tab" data-toggle="pill" href="#pills-clubs" role="tab" aria-controls="pills-clubs" aria-selected="false">Clubs</a>
            </li>
            <li class="nav-item col-md-4">
                <a style="text-align: center; color: black;" class="nav-link" id="pills-leagues-tab" data-toggle="pill" href="#pills-leagues" role="tab" aria-controls="pills-leagues" aria-selected="false">leagues</a>
            </li>

        </ul>

        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-players" role="tabpanel" aria-labelledby="pills-players-tab">

                <table id="players-table" class="table table-striped table-dark">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Nationality</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if($players->count() == 0)
                        <tr>
                            <td colspan="4" class="text-center"> No Players Available</td>
                        </tr>
                    @else
                        @foreach ($players as $player)
                            <tr>
                                <td>{{ $player->first_name }}</td>
                                <td>{{ $player->last_name }}</td>
                                <td>{{ $player->age }}</td>
                                <td>{{ $player->nationality }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="pills-clubs" role="tabpanel" aria-labelledby="pills-clubs-tab">

                <table id="clubs-table"  class="table table-striped table-dark">
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Description</th>
                        <th>Country</th>
                        <th>Founded</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($clubs->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center"> No Clubs Available</td>
                        </tr>
                    @else
                        @foreach ($clubs as $club)
                            <tr>
                                <td>{{ $club->name }}</td>
                                <td>{{ $club->description }}</td>
                                <td>{{ $club->country }}</td>
                                <td>{{ $club->founded }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="pills-leagues" role="tabpanel" aria-labelledby="pills-leagues-tab">

                <table id="clubs-table" class="table table-striped table-dark">
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Description</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if($leagues->count() == 0)
                        <tr>
                            <td colspan="5" class="text-center"> No Clubs Available</td>
                        </tr>
                    @else
                        @foreach ($leagues as $league)
                            <tr>
                                <td>{{ $league->league_name }}</td>
                                <td>{{ $league->description }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>

            </div>
        </div>
    </div>



@endsection



