<?php

namespace App\Http\Controllers;

use App\Models\CollegeProfile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request){
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        //Checking User Registeration Code Start
        $user = User::where('email',$request->email)->first();
        if(!$user)
        {
            toastr()->error('User is Not Registered.');
            return redirect()->back();
        }
        //Checking User Registeration Code End
        //User Authentication Code Start
        if(Auth::guard('user')->attempt($creds))
        {
            if($user->role->name == 'Admin')
            {
                toastr()->success('You Login Successfully');
                return redirect()->intended(route('admin.dashboard.index'));
            }
            else  if($user->is_verified && $user->is_active)
            {
                toastr()->success('You Login Successfully');
                if($user->role->name == 'Student')
                    return redirect()->intended(route('student.dashboard.index'));
                else if($user->role->name == 'College')
                    return redirect()->intended(route('college.dashboard.index'));
                else
                    return redirect()->intended(route('teacher.dashboard.index'));
            }
            else{
                Auth::logout();
                toastr()->error('User is In Active or Not Verified Yet By Admin.');
                return redirect()->back();

            }
        } else {
            toastr()->error('Wrong Password.');
            return redirect()->back();
        }
        //User Authentication Code End
    }
    
    public function logout()
    {        
        Auth::logout();
        toastr()->success('You Logout Successfully');
        return redirect('/');
    }
    public function register(Request $request)
    {
        if($request->password != $request->confirm_password)
        {
            toastr()->error('Password do not match');
            return redirect()->back();
        }
        $validator = Validator::make($request->all(),[
            'email' => 'required|unique:users'
        ]);
        if($validator->fails()){
            toastr()->error('Email already exists');
            return redirect()->back();
        }
        $user = User::create($request->all());
        if($request->role_id == 2)
        {
            CollegeProfile::create(['user_id' => $user->id]+ $request->all());
        }
        toastr()->success('Your Account Has Been successfully Created, Please Login and See Next Step Guides.');
        return redirect(url('/'));
    
    }
    
}
