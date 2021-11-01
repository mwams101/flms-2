<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PharIo\Manifest\Application;

class PlayerController extends Controller
{
    /**
     * Return a listing of all Players
     **/
    public function manage()
    {
        //get all Players from database ordered in ascending alphabetical order
        $players = Player::orderBy('first_name', 'asc')->get();

        //return view
        return view('players.manage', compact('players'));
    }

    //
    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:25|string',
            'first_name' => 'required|max:25|string',
            'age' => 'required|max:45|integer',
            'nationality' => 'required|string',
            'club_id' => 'required|integer|min:1|exists:clubs,id'
        ];


        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            //create and store player in database
            $player = Player::create($request->all());

            //redirect to show player route with success message
            return redirect()->route('players.show', [$player])
                ->with('success', "Player {$player->first_name} Successfully Created");
        }
    }


    /**
     * Show a specific club in storage
     * @param Club $player
     **/
    public function show(Player $player)
    {
        //return view
        return view('players.view', compact('player'));
    }


    public function edit($id)
    {
        $player = Player::find($id);
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'first_name' => 'required|max:25|string',
            'last_name' => 'required|max:25|string',
            'age' => 'required|max:45|integer',
            'nationality' => 'required|string',
            'club_id' => 'required|integer|min:1|exists:clubs,id'
        ];


        //validate inputs from request
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) { //if validation fails
            //return back with validation error messages
            return redirect()->back()->withErrors($validator->errors());
        } else { //if validation is successful

            $player = Player::find($id);
            $player->club_id = $request->input('club_id');
            $player->first_name = $request->input('first_name');
            $player->last_name = $request->input('last_name');
            $player->nationality = $request->input('nationality');
            $player->age = $request->input('age');
            $player->update();
            return redirect()->back()->with('status','Club Updated Successfully');
        }

//
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect()->back()->with('status','Player Successfully Deleted');
    }
}
