@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        @if (session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif

        <div class="card" style="border-radius: 10px;">

            <div class="card-body">

                <div class="row">

                    <div class="col" style="padding: 25px;">
                        <div>
                            <img src="{{ asset('img/club.png') }}" height="200px" width="200px" class="img-responsive center-block d-block mx-auto">
                        </div><br><br>

                        <h3 class="card-title">Player Create</h3>
                        <p class="card-text" style="font-weight: 500;">Once created, the player will be added to the system.</p>
                        <a href="#" class="text-center">Learn more</a>

                    </div>

                    <div class="col">

                        <form action="{{ url('add-player') }}" method="post" class="form-group w-75 mt-50" style="margin-left: 50px; padding: 25px;" >


                            <h3 class="text-center">Player Create</h3><br>
                            <p style="font-weight: 500;">Enter new player to be added to the system</p>

                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="First Name" name="first_name">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="Last Name" name="last_name">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Age" name="age">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="Nationality" name="nationality">
                            </div>
                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Club ID" name="club_id">
                            </div>

                            <div class="mb-3 form-check">

                                <button type="submit" value="Add player" class="btn btn-primary btn-center col-md-4" style="font-weight: 500;">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
