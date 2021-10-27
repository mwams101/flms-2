<?php

namespace App\Http\Controllers;

use App\Models\Table;

use Illuminate\Http\Request;


class TableController extends Controller
{
    //
    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {
        $table = new Table;
        $table->table_id = $request->input('table_id');
        $table->club_id = $request->input('club_id');
        $table->matches_played = $request->input('matches_played');
        $table->won = $request->input('won');
        $table->drawn = $request->input('drawn');
        $table->lost = $request->input('lost');
        $table->goals_scored = $request->input('goals_scored');
        $table->goals_conceded = $request->input('goals_conceded');
        $table->goal_difference = $request->input('goal_difference');
        $table->points = $request->input('points');



        $table->save();
        return redirect()->back()->with('status','league Table Added Successfully');
    }
    public function index()
    {
        $table = Table::all();
        return view('tables.view', compact('table'));
    }

    public function edit($id)
    {
        $table = Table::find($id);
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, $id)
    {
        $table = Table::find($id);
        $table->matches_played = $request->input('matches_played');
        $table->won = $request->input('won');
        $table->drawn = $request->input('drawn');
        $table->lost = $request->input('lost');
        $table->goals_scored = $request->input('goals_scored');
        $table->goals_conceded = $request->input('goals_conceded');
        $table->goal_difference = $request->input('goal_difference');
        $table->points = $request->input('points');

        $table->update();
        return redirect()->back()->with('status','Table Updated Successfully');
    }
    public function destroy($id)
    {
        $Table = Table::find($id);
        $Table->delete();
        return redirect()->back()->with('status','League Deleted Successfully');
    }
}
