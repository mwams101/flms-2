<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserInformationController extends controller
{
    public function edit(){

        $user = Auth::user();
        return view('user_information.edit')->with('user', $user);
    }

    public function update(Request $request){
        //validation rules
        $rules = [
            'first_name' =>'required|min:4|string|max:255',
            'last_name' =>'required|min:4|string|max:255',
            'email'=>'required|email|string|max:255'
        ];

        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()) {
            return redirect()->back()
                ->withErrors($validate->errors()->messages());
        } else {

            $user = Auth::user(); //get authenticated user

            //validate email
            if($this->validateEmail($user, $request->get('email'))) {
                return redirect()->back()
                    ->with('error', 'Email provided already exists');
            }

            //update user email
            $user->update([
                'email' => $request->get('email'),
            ]);

            //update user information
            $user->userInformation()->update($request->only(['first_name', 'last_name']));

            //redirect to home with success message
            return redirect()->route('home')
                ->with('success', 'User Information Successfully Updated');
        }
    }

    private function validateEmail(User $user, $email) : bool
    {
        //get current email
        $currentEmail = $user->email;

        if(strcmp($currentEmail, $email) !== 0) { //if current email is not equal to given email
            //check database if user exists with given email
            if(User::where('email', $email)->first()) { //if email exists
                return true;
            }
        }

        return false;
    }


}
