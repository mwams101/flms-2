<?php

namespace App\Http\Controllers\auth;
use App\Models\User;
use App\Models\UserInformation;
use App\Http\Controllers\Controller;
//use http\Client\Curl\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class ChangePasswordController extends Controller

{
    public function __construct(){

        $this->middleware('auth');
    }
    public function index(){

        return view('auth.passwords.change');
    }

    public function changePassword(Request $request)
    {
        //validation rules
        $rules = [
            'old_password' => 'required|min:8|max:25',
            'new_password' => 'required|min:8|max:25',
            'password_confirmation' => 'required|same:new_password'
        ];

        //validate request against validation rules
        $validate = Validator::make($request->all(), $rules);

        if($validate->fails()) { //if validation fails
            //redirect back with error messages
            return redirect()->back()
                ->withErrors($validate->errors()->messages());
        } else {

            //get authenticated user
            $user = Auth::user();

            //validate current password with old password provided
            if(Hash::check($request->get('old_password'),
                $user->password)) { //if old password equals current password
                //update user password using new password
                $user->update($request->only(['new_password']));

                //redirect to home with success message
                return redirect()->route('home')
                    ->with('success', 'Password successfully updated');
            }

            //redirect back with error message
            return redirect()->back()
                ->with('error', 'Password provided doesn\'t match current password');
        }
    }
}
