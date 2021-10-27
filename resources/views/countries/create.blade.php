@extends('layouts.app')

@section('content')
    <div class="container" style="font-family: 'Crete Round', serif; ">

        <div class="card" style="border-radius: 10px;">

            <div class="card-body">

                <div class="row">

                    <div class="col" style="padding: 25px;">
                        <div>
                            <img src="{{ asset('img/zed_icon.png') }}" height="200px" width="200px" class="img-responsive center-block d-block mx-auto">
                        </div><br><br>

                        <h3 class="card-title">Country</h3>
                        <p class="card-text" style="font-weight: 500;">Once created, the country will be added to the system allowing for a categorized search on leagues, clubs or players that are in that country.</p>
                        <a href="#" class="text-center">Learn more</a>

                    </div>

                    <div class="col">

                        <form action="/create" method="post" class="form-group w-75 mt-50" style="margin-left: 50px; padding: 25px;" action="/action_page.php" >


                            <h3 class="text-center">Create A Country</h3><br>
                            <p style="font-weight: 500;">Enter details of a country you want added to the system</p>

                            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

                            <div class="mb-2">
                                <label class="form-group"></label>
                                <input type="text" class="form-control" placeholder="country name" name="country_name">
                            </div>

                            <div class="mb-3">
                                <label class="form-group"></label>

                                <select class="form-control" name="continent">

                                    <option value="Asia">Asia</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Africa">Africa</option>
                                    <option value="South America">South America</option>
                                    <option value="North America">North America</option>
                                    <option value="Europe">Europe</option>
                                    <option value="Antarctica">Antarctica</option>

                                </select>
                            </div>

                            <div class="mb-3 form-check">

                                <button type="submit" value="Add Country" class="btn btn-primary btn-center" style="font-weight: 500;">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
