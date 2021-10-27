<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;


class LeagueController extends Controller
{
    //
    public function create()
    {
        return view('leagues.create');
    }

    public function store(Request $request)
    {
        $league = new League;
        $league->league_name = $request->input('league_name');
        $league->description = $request->input('description');

        $league->save();
        return redirect()->back()->with('status','league Added Successfully');
    }

    public function index()
    {
        $league = League::all();
        return view('leagues.view', compact('league'));
    }

    public function edit($id)
    {
        $league = League::find($id);
        return view('leagues.edit', compact('league'));
    }

    public function update(Request $request, $id)
    {
        $league = League::find($id);
        $league->league_name = $request->input('league_name');
        $league->description = $request->input('description');
        $league->update();
        return redirect()->back()->with('status','League Updated Successfully');
    }
    public function destroy($id)
    {
        $league = League::find($id);
        $league->delete();
        return redirect()->back()->with('status','League Deleted Successfully');
    }
}
