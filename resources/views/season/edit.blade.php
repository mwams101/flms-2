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
                        <h4>Edit & Update Season
                            <a href="{{ url('/season/view') }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('update-season/'.$season->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">league Name</label>
                                <input type="number" name="league_id" value="{{$season->league_id}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">League Description</label>
                                <input type="text" name="name" value="{{$season->name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">league Name</label>
                                <input type="text" name="start_date" value="{{$season->start_date}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">League Description</label>
                                <input type="text" name="end_date" value="{{$season->end_date}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update Season</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
