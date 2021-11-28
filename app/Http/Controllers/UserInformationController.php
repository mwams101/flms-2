<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserInformationController extends controller

{
    public function __construct(){

        $this->middleware('auth');
    }

    public function edit(){

        $user = Auth::user();
        return view('user_information.edit')->with('user', $user);
    }

    public function update(Request $request){
        //validation rules

        $request->validate([
            'first_name' =>'required|min:4|string|max:255',
            'last_name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255'
        ]);
        $user = Auth::user();
        $user->userInformation->first_name = $request->input('first_name');
        $user->userInformation->last_name = $request->input('last_name');
        $user->email = $request->input('email');

        $user->userInformation->update();
        return redirect('/home')->with('status','INFO Updated Successfully');
    }


}
