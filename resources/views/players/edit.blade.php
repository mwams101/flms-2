@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('inc.messages')

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Players Information
                            <a href="{{ route('players.show', $player->id) }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('players.update', $player->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" value="{{$player->first_name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="Last name">Last Name</label>
                                <input type="text" name="last_name" value="{{$player->last_name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Age</label>
                                <input type="text" name="age" value="{{$player->age}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nationality</label>
                                <input type="text" name="nationality" value="{{$player->nationality}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">club_id</label>
                                <input type="number" name="club_id" value="{{$player->club_id}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update player</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
