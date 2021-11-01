<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Application;


class ClubController extends Controller
{
    /**
     * Return a listing of all clubs
    **/
    public function manage()
    {
        //get all clubs from database ordered in ascending alphabetical order
        $clubs = Club::orderBy('name', 'asc')->get();

        //return view
        return view('clubs.manage', compact('clubs'));
    }


    /**
     * Show the form for creating a new club
     **/
    public function create()
    {
        //return view
        return view('clubs.create');
    }

    /**
     * Store a newly created club in storage
     **/
    public function store(Request $request)
    {
        //set request rules
        $rules = [
            'name' => 'required|unique:clubs,name|max:50',
            'description' => 'nullable|max:100',
            'country' => 'required|max:50',
            'founded' => 'required|integer|between:1850,2021'
        ];

        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            //create and store club in database
            $club = Club::create($request->all());

            //redirect to show club route with success message
            return redirect()->route('clubs.show', [$club])
                ->with('success', "Club {$club->name} Successfully Created");
        }
    }

    /**
     * Show a specific club in storage
     * @param Club $club
    **/
    public function show(Club $club)
    {
        //return view
        return view('clubs.view', compact('club'));
    }

    public function edit($id)
    {
        $club = Club::find($id);
        return view('clubs.edit', compact('club'));
    }

    public function update(Request $request, $id)
    {
        $club = Club::find($id);
        $club->name = $request->input('name');
        $club->description = $request->input('club_description');
        $club->country = $request->input('country');
        $club->founded = $request->input('founded');
        $club->update();
        return redirect()->back()->with('status','Club Updated Successfully');
    }

    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return redirect()->back()->with('status','League Deleted Successfully');
    }
}
