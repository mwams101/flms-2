@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Clubs Table</h4>
                    </div>
                    <div class="card-body">

                        <div class="mt-2 mb-3">
                            <a type="button" class="btn btn-success" href="{{ route('clubs.create') }}">
                                Create Club
                            </a>
                        </div>

                        <table id="clubs-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>

                                <th>Name</th>
                                <th>Description</th>
                                <th>Country</th>
                                <th>Founded</th>
                                <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @if($clubs->count() == 0)
                                <tr>
                                    <td colspan="5" class="text-center"> No Clubs Available</td>
                                </tr>
                            @else
                                @foreach ($clubs as $club)
                                <tr>
                                    <td>{{ $club->name }}</td>
                                    <td>{{ $club->description }}</td>
                                    <td>{{ $club->country }}</td>
                                    <td>{{ $club->founded }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <a type="button" href="{{ route('clubs.show', $club->id) }}" class="btn btn-primary btn-sm">View</a>
                                            <a class="btn btn-danger btn-sm" type="button" onclick="event.preventDefault();
                                                    document.getElementById('delete-club').submit();"> Delete</a>

                                                <form id="delete-club" action="{{ route('clubs.delete', $club->id) }}" method="DELETE" style="display: none;">
                                                    @csrf
                                                </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
