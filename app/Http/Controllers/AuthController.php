<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CollegeCourse;
use App\Models\CollegeProfile;
use App\Models\State;
use App\Models\StudentProfile;
use App\Models\StudentProfileAddress;
use App\Models\User;
use Exception;
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
                {
                    if($user->studentProfile->is_verified && $user->studentProfile->is_active)
                    {
                        return redirect()->intended(route('student.dashboard.index'));
                    }else{
                        Auth::logout();
                        toastr()->error('User is In Active or Not Verified Yet By College.');
                        return redirect()->back();
                    }
                }
                else if($user->role->name == 'College')
                {
                    return redirect()->intended(route('college.dashboard.index'));
                }
                else
                {
                    return redirect()->intended(route('teacher.dashboard.index'));
                }
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
        try{
            $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'image' => 'required',
                'password' => 'required',
                'role_id' => 'required',
            ]);
            if($request->role_id == 2)
            {
                $this->validate($request,[
                    'college_name' => 'required',
                    'principal_name' => 'required',
                    'document' => 'required|mimes:pdf|max:30000',
                    'state_id' => 'required',
                    'district' => 'required',
                    'city_id' => 'required',
                    'year_of_establishment' => 'required',
                    'address' => 'required',
                ]);
            }else if($request->role_id == 3)
            {
                $this->validate($request,[
                    'college_id' => 'required',
                    'phone' => 'required',
                    'fathers_name' => 'required',
                    'mother_name' => 'required',
                    'blood_group' => 'required',
                    'date_of_birth' => 'required',
                    'gender' => 'required',
                    'nationality' => 'required',
                ]);

            }
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
                $profile = CollegeProfile::create(['user_id' => $user->id]+ $request->all());
                foreach($request->course_names as $key => $course_name)
                {
                    if($course_name)
                    {
                        CollegeCourse::create([
                            'user_id' => $user->id,
                            'college_profile_id' => $profile->id,
                            'course_name' => $course_name,
                            'seats' => $request->course_seats[$key],
                        ]);
                    }
                }
            }else if($request->role_id == 3)
            {

                $profile = StudentProfile::create(['user_id' => $user->id]+ $request->all());
                foreach($request->type as $key => $type)
                {
                    if($request->same_as_temparory && $key == 1)
                    {
                        $country_id = $request->country[0];
                        $state_id = $request->state[0];
                        $city_id = $request->city[0];
                    }else{
                        $country_id = $request->country[$key];
                        $state_id = $request->state[$key];
                        $city_id = $request->city[$key];
                    }
                    StudentProfileAddress::create([
                        'user_id' => $user->id,
                        'student_profile_id' => $profile->id,
                        'type' => $type,
                        'state_id' => $state_id,
                        'landmark' => $request->landmark[$key],
                        'city_id' => $city_id,
                        'lane' => $request->lane[$key],
                        'country_id' => $country_id,
                        'address' => $request->addresses[$key],
                        'town' => $request->town[$key],
                        'pin' => $request->pin[$key],
                    ]);
                }

            }
            toastr()->success('Your Account Has Been successfully Created, Please Login and See Next Step Guides.');
            return redirect(url('/'));
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return back();
        }
    
    }
    public function getCityAgainstStates(Request $request)
    {
        $cities = City::where('state_id',$request->state_id)->get();        
        return response()->json($cities);

    }
    public function getStateAgainstCountries(Request $request)
    {
        $states = State::where('country_id',$request->country_id)->get();        
        return response()->json($states);

    }
}
