<?php

namespace App\Http\Controllers\College;

use App\Http\Controllers\Controller;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = StudentProfile::where('college_id',Auth::user()->id)->get();
        return view('college.student.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $studentProfile = StudentProfile::find($id);
        $student = $studentProfile->student;
        return view('college.student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentProfile $studentProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $studentProfile = StudentProfile::find($id);
        $studentProfile->update($request->all());
        toastr()->success('Student Profile Updated successfully');
        return redirect()->back(); 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentProfile  $studentProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentProfile $studentProfile)
    {
        //
    }
    public function verified($id)
    {
        $user = StudentProfile::find($id);
        $user->update([
            'is_verified' => true
        ]);
        toastr()->success('User Verified Successfully');
        return redirect()->back();
    }
    public function revert_verification($id)
    {
        $user = StudentProfile::find($id);
        $user->update([
            'is_verified' => false
        ]);
        toastr()->success('User is Not Verified Now!');
        return redirect()->back();
    }
    public function active($id)
    {
        $user = StudentProfile::find($id);
        $user->update([
            'is_active' => true
        ]);
        toastr()->success('User Active Successfully');
        return redirect()->back();
    }
    public function in_active($id)
    {
        $user = StudentProfile::find($id);
        $user->update([
            'is_active' => false
        ]);
        toastr()->success('User is In Active Now!');
        return redirect()->back();
    }
}
