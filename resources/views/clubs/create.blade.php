@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        @include('inc.messages')

        <div class="card" style="border-radius: 10px;">

            <div class="card-body">

                <div class="row">

                    <div class="col" style="padding: 25px;">
                        <div>
                            <img src="{{ asset('img/club.png') }}" height="200px" width="200px" class="img-responsive center-block d-block mx-auto">
                        </div><br><br>

                        <h3 class="card-title">Create Club</h3>
                        <p class="card-text" style="font-weight: 500;">Once created, the club will be added to the system.</p>
                        <a href="#" class="text-center">Learn more</a>

                    </div>

                    <div class="col">

                        <form action="{{ route('clubs.store') }}" method="post" id='create-club-form' class="form-group w-75 mt-50" style="margin-left: 50px; padding: 25px;" >
                            @csrf

                            <h3 class="text-center">Insert Club information</h3><br>
                            <p style="font-weight: 500;">Enter Club you want added to the system</p>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="Club Name" name="name" required autocomplete="name" autofocus>
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="Country" name="country" required autocomplete="country" autofocus>
                            </div>

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="number" class="form-control" placeholder="Founded" name="founded" required autocomplete="founded" autofocus>
                            </div>

                            <div class="mb-2">
                                <label class="form-group" for="description"></label>
                                <textarea type="text" class="form-control" rows="5" id="description" placeholder="Club description" name="description"></textarea>
                            </div>

                            <div class="modal-footer mt-2 mb-3 form-check" style="border-top: 0px">
                                <button type="submit" value="Add Club" class="btn btn-primary btn-center col-md-4" style="font-weight: 500;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
