@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('inc.messages')

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update league
                            <a href="{{ route('leagues.show', $league->id) }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('leagues.update', $league->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-3">
                                <label for="">league Name</label>
                                <input type="text" name="league_name" value="{{$league->league_name}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">League Description</label>
                                <input type="text" name="description" value="{{$league->description}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update league</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
