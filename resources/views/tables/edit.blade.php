@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @include('inc.messages')

                <div class="card">
                    <div class="card-header">
                        <h4>Edit & Update League tables
                            <a href="{{ route('tables.show', $table->id) }}" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('tables.update', $table->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="">season Id</label>
                                <input type="number" name="season_id" value="{{$table->season_id}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">club id</label>
                                <input type="number" name="club_id" value="{{$table->club_id}}" class="form-control">
                            </div>

                            <div class="form-group mb-3">
                                <label for="">matches played</label>
                                <input type="number" name="matches_played" value="{{$table->matches_played}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">won</label>
                                <input type="number" name="won" value="{{$table->won}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">drawn</label>
                                <input type="number" name="drawn" value="{{$table->drawn}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">lost</label>
                                <input type="number" name="lost" value="{{$table->lost}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">goals scored</label>
                                <input type="number" name="goals_scored" value="{{$table->goals_scored}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">goals conceded</label>
                                <input type="number" name="goals conceded" value="{{$table->goals_conceded}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">goal difference</label>
                                <input type="number" name="goal_difference" value="{{$table->goal_difference}}" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="">points</label>
                                <input type="number" name="points" value="{{$table->points}}" class="form-control">
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
