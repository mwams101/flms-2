@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        @include('inc.messages')

        <div class="card" style="border-radius: 10px; max-width: 75%; margin: auto;">

            <div class="card-body">

                <div class="row">

                    <div class="col-sm-6" style="padding: 25px;">
                        <div>
                            <img src="{{ asset('img/League.png') }}" height="200px" width="200px" class="img-responsive center-block d-block mx-auto">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-lg-12">
                                <h3 class="text-center">league information</h3><br>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>League Name : </strong> {{ $league->league_name }}</div>
                                </div>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>League ID : </strong> {{ $league->id }}</div>
                                </div>

                                <div class="mb-2">
                                    <div class="col-sm-12"><strong>League Description : </strong> {{ $league->description }}</div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
@endsection
