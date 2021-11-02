<?php


namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Application;
use Illuminate\Http\Request;
;


class TableController extends Controller
{

    /**
     * Return a listing of all tables
     **/
    public function manage()
    {
        //get all tables from database ordered in ascending alphabetical order
        $table = Table::orderBy('points', 'asc')->get();

        //return view
        return view('tables.manage', compact('table'));
    }

    //
    public function create()
    {
        return view('tables.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'season_id'=>'required|integer|min:1|exists:seasons,id',
            'club_id'=>'required|integer|min:1|exists:clubs,id',
            'matches_played'=>'required|integer|min:0',
            'won'=>'required|integer|min:0|lte:matches_played',
            'drawn'=>'required|integer|min:0|lte:matches_played',
            'lost'=>'required|integer|min:0|lte:matches_played',
            'goals_scored'=>'required|integer|min:0',
            'goals_conceded'=>'required|integer|min:0',
            'goal_difference'=>'required|integer',
            'points'=>'required|integer|min:0'
        ];

        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            //create and store table in database
            $table = Table::create($request->all());

            //redirect to show table route with success message
            return redirect()->route('tables.show', [$table])
                ->with('success', "Statistics {$table->season_id} Successfully Created");
        }
    }

    /**
     * Show a specific table in storage
     * @param Table $season
     **/
    public function show(Table $season)
    {
        //return view
        return view('season.view', compact('season'));
    }

    public function edit($id)
    {
        $table = Table::find($id);
        return view('tables.edit', compact('table'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'season_id'=>'required|integer|min:1|exists:seasons,id',
            'club_id'=>'required|integer|min:1|exists:clubs,id',
            'matches_played'=>'required|integer|min:0',
            'won'=>'required|integer|min:0|lte:matches_played',
            'drawn'=>'required|integer|min:0|lte:matches_played',
            'lost'=>'required|integer|min:0|lte:matches_played',
            'goals_scored'=>'required|integer|min:0',
            'goals_conceded'=>'required|integer|min:0',
            'goal_difference'=>'required|integer',
            'points'=>'required|integer|min:0'
        ];

        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            $table = Table::find($id);
            $table->season_id = $request->input('season_id');
            $table->club_id = $request->input('club_id');
            $table->matches_played = $request->input('matches_played');
            $table->won = $request->input('won');;
            $table->lost = $request->input('lost');
            $table->drawn = $request->input('drawn');
            $table->goals_scored = $request->input('goal_scored');
            $table->goals_conceded = $request->input('goals_conceded');
            $table->goal_difference = $request->input('goal_difference');
            $table->points = $request->input('points');
            $table->update();
            return redirect()->back()->with('status','Club Updated Successfully');




        }
    }

    public function destroy($id)
    {
        $table = Table::find($id);
        $table->delete();
        return redirect()->back()->with('status','Table Deleted Successfully');
    }
}
