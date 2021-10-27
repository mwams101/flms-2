<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;


class SeasonController extends Controller
{
    //
    public function create()
    {
        return view('season.create');
    }

    public function store(Request $request)
    {
        $season = new Season;
        $season->league_id = $request->input('league_id');
        $season->name = $request->input('name');
        $season->start_date = $request->input('start_date');
        $season->end_date = $request->input('end_date');

        $season->save();
        return redirect()->back()->with('status','Season Added Successfully');


    }
    public function index()
    {
        $season = Season::all();
        return view('season.view', compact('season'));
    }

    public function edit($id)
    {
        $season = Season::find($id);
        return view('season.edit', compact('season'));
    }

    public function update(Request $request, $id)
    {
        $season = Season::find($id);
        $season->league_id = $request->input('league_id');
        $season->name->input('name');
        $season->start_date = $request->input('start_date');
        $season->end_date->input('end_date');
        $season->update();
        return redirect()->back()->with('status','Season Updated Successfully');
    }

    public function destroy($id)
    {
        $season = Season::find($id);
        $season->delete();
        return redirect()->back()->with('status','League Deleted Successfully');
    }
}
