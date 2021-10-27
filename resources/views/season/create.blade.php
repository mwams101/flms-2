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

                        <h3 class="card-title">Stats table</h3>
                        <p class="card-text" style="font-weight: 500;">Once created, the season will be added to the system.</p>
                        <a href="#" class="text-center">Learn more</a>

                    </div>

                    <div class="col">

                        <form action="{{ url('add-season') }}" method="post" class="form-group w-75 mt-50" style="margin-left: 50px; padding: 25px;" >


                            <h3 class="text-center">Season Create</h3><br>
                            <p style="font-weight: 500;">Enter new season to be added to the system</p>

                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="League ID" name="league_id">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="Start Date" name="start_date">
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="End Date" name="end_date">
                            </div>

                            <div class="mb-3 form-check">

                                <button type="submit" value="Add season" class="btn btn-primary btn-center col-md-4" style="font-weight: 500;">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
