<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Application;


class LeagueController extends Controller
{

    /**
     * Return a listing of all leagues
     **/
    public function manage()
    {
        //get all leagues from database ordered in ascending alphabetical order
        $league = League::orderBy('points', 'desc')->get();

        //return view
        return view('leagues.manage', compact('league'));
    }

    //
    public function create()
    {
        return view('leagues.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'league_name' => 'required|unique:leagues,league_name|max:25',
            'description' => 'nullable|max:100'
        ];

        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            //create and store club in database
            $league = League::create($request->all());

            //redirect to show club route with success message
            return redirect()->route('leagues.show', [$league])
                ->with('success', "League {$league->name} Successfully Created");
        }
    }

    public function show(League $league)
    {
        //return view
        return view('leagues.view', compact('league'));
    }

    public function edit($id)
    {
        $league = League::find($id);
        return view('leagues.edit', compact('league'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $rules = [
            'league_name' => 'required|max:25',
            'description' => 'nullable|max:100'
        ];

        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            $league = League::find($id);
            $league->league_name = $request->input('league_name');
            $league->description = $request->input('description');
            $league->update();
            return redirect()->back()->with('status','League Updated Successfully');
        }


    }

    public function destroy($id)
    {
        $league = League::find($id);
        $league->delete();
        return redirect()->back()->with('status','League Deleted Successfully');
    }
}
