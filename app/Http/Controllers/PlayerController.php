<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    //
    public function create()
    {
        return view('players.create');
    }

    public function store(Request $request)
    {
        $player = new Player;
        $player->first_name = $request->input('first_name');
        $player->last_name = $request->input('last_name');
        $player->age = $request->input('age');
        $player->nationality = $request->input('nationality');
        $player->club_id = $request->input('club_id');

        $player->save();
        return redirect()->back()->with('status','Player Added Successfully');


    }
    public function index()
    {
        $player = Player::all();
        return view('players.view', compact('player'));
    }

    public function edit($id)
    {
        $player = Player::find($id);
        return view('players.edit', compact('player'));
    }

    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        $player->first_name = $request->input('first_name');
        $player->last_name->input('last_name');
        $player->age = $request->input('age');
        $player->nationality->input('nationality');
        $player->club_id->input('club_id');
        $player->update();
        return redirect()->back()->with('status','Player Updated Successfully');
    }

    public function destroy($id)
    {
        $player = Player::find($id);
        $player->delete();
        return redirect()->back()->with('status','League Deleted Successfully');
    }
}
