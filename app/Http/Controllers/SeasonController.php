<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Application;


class SeasonController extends Controller
{

    /**
     * Return a listing of all season
     **/
    public function manage()
    {
        //get all season from database ordered in ascending alphabetical order
        $season = Season::orderBy('name', 'asc')->get();

        //return view
        return view('season.manage', compact('season'));
    }

    //
    public function create()
    {
        return view('season.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'league_id' => 'required|integer|min:1',
            'name' => 'required|string|max:50',
            'start_date' => 'required|date_format:Y/m/d',
            'end_date' => 'required|date_format:Y/m/d|after_or_equal:start_date'
        ];

        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            //create and store season in database
            $season = Season::create($request->all());

            //redirect to show season route with success message
            return redirect()->route('season.show', [$season])
                ->with('success', "Season {$season->name} Successfully Created");
        }


    }

    public function show(Season $season)
    {
        //return view

        return view('season.view', compact('season'));
    }

    public function edit($id)
    {
        $season = Season::find($id);
        return view('season.edit', compact('season'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'league_id' => 'required|integer|min:1',
            'name' => 'required|string|max:50',
            'start_date' => 'required|date_format:Y/m/d',
            'end_date' => 'required|date_format:Y/m/d|After_or_equal:start_date'
        ];

        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            //create and store season in database
            $season = Season::create($request->all());

            //redirect to show season route with success message
            return redirect()->route('season.show', [$season])
                ->with('success', "Season {$season->name} Successfully Updated");
        }
    }

    public function destroy($id)
    {
        $club = Season::find($id);
        $club->delete();
        return redirect()->back()->with('status','Season Deleted Successfully');
    }

}
