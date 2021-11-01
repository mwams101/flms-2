@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        @include('inc.messages')

        <div class="card" style="border-radius: 10px;">

            <div class="card-body">

                <div class="row">

                    <div class="col" style="padding: 25px;">
                        <div>
                            <img src="{{ asset('img/stats.png') }}" height="200px" width="200px" class="img-responsive center-block d-block mx-auto">
                        </div><br><br>

                        <h3 class="card-title">Create Stats table</h3>


                    </div>

                    <div class="col">

                        <form action="{{ route('season.show') }}" method="post" class="form-group w-75 mt-50" style="margin-left: 50px; padding: 25px;" >


                            <h3 class="text-center">Insert League Tables</h3><br>
                            <p style="font-weight: 500;">Enter stats of a League you want added to the system</p>

                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Season ID" name="season_id">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Club name" name="club_id">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Matches Played" name="matches_played">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Wins" name="won">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Drawn" name="drawn">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Lost" name="lost">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Goals scored" name="goals_scored">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Goals conceded" name="goals_conceded">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Goal difference" name="goal_difference">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Points" name="points">
                            </div>





                            <div class="mb-3 form-check">

                                <button type="submit" value="Add table" class="btn btn-primary btn-center col-md-4" style="font-weight: 500;">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
