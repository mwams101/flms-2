@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $clubs }} </h3>
                        <p class="card-body"> Total Clubs </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $players }} </h3>
                        <p class="card-body"> Total Players </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-money" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $leagues }} </h3>
                        <p class="card-body"> Total leagues </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card ">
                    <div class="inner">
                        <h3 class="card-header bg-dark" style="color: white"> {{ $seasons }} </h3>
                        <p class="card-body"> Total Seasons </p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



