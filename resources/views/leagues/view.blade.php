@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        @include('inc.messages')

        <div class="card" style="border-radius: 10px;">

            <div class="card-body">

                <div class="row">

                    <div class="col-sm-6" style="padding: 25px;">
                        <div>
                            <img src="{{ asset('img/league.png') }}" height="200px" width="200px" class="img-responsive center-block d-block mx-auto">
                        </div><br><br>

                        <h3 class="card-title">{{ $league->league_name }}</h3>
                        <p class="card-text" style="font-weight: 500;">{{ $league->description }}</p>

                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-center">League information</h3><br>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>League Name : </strong> {{ $league->league_name }}</div>
                                    <div class="col-sm-12"><strong>Number of Clubs : </strong> {{ $league->clubs->count() }}</div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Clubs</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="mt-2 mb-3">
                                            <a type="button" class="btn btn-success" href="{{ route('clubs.create') }}">
                                                Add Clubs
                                            </a>
                                        </div>

                                        <table id="players-table" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Country</th>
                                                <th>Founded</th>

                                            </tr>
                                            </thead>

                                            <tbody>
                                            @if($league->clubs->count() == 0)
                                                <tr>
                                                    <td colspan="5" class="text-center"> No clubs Available</td>
                                                </tr>
                                            @else
{{--                                                @foreach ($league->seasons->tables->clubs as $club)--}}
{{--                                                    <tr>--}}
{{--                                                        <td>{{ $club->name }}</td>--}}
{{--                                                        <td>{{ $club->country }}</td>--}}
{{--                                                        <td>{{ $club->founded }}</td>--}}
{{--                                                        <td>--}}
{{--                                                            <a href="#" class="btn btn-primary btn-sm">Edit</a>--}}
{{--                                                            {!!Form::open(['action' => ['App\Http\Controllers\LeagueController@destroy', $club->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
{{--                                                            {{Form::hidden('_method', 'DELETE')}}--}}
{{--                                                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-sm'])}}--}}
{{--                                                            {!!Form::close()!!}--}}
{{--                                                        </td>--}}
{{--                                                    </tr>--}}
{{--                                                @endforeach--}}
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
