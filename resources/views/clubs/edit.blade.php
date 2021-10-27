@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update Clubs
                            <a href="{{ url('/clubs/view') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-club/'.$club->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">league Name</label>
                                <input type="text" name="name" value="{{$club->name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">club Description</label>
                                <input type="text" name="club_description" value="{{$club->club_description}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">country</label>
                                <input type="text" name="country" value="{{$club->country}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">founded</label>
                                <input type="text" name="founded" value="{{$club->founded}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Club</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
