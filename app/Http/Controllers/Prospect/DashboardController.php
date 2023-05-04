<?php

namespace App\Http\Controllers\Prospect;

use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use App\Models\StudentAcademicQualification;
use App\Models\StudentDocument;
use App\Models\StudentProfile;
use App\Models\StudentProfileAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $active_tab = 'registration';
        return view('prospect.dashboard.index_testing',compact('active_tab'));
    }
    public function studentProfileUpdate(Request $request)
    {
        $studentProfile = Auth::user()->studentProfile;
        $studentProfile->update($request->all());
        toastr()->success('Student Profile Updated successfully');
        return redirect()->back(); 
    }
    public function studentProfileCreate(Request $request)
    {
        $studentProfile =StudentProfile::create($request->all());
        
        foreach($request->premise_name as $key => $premise_name)
        {
            if($request->same_as_temparory && $key == 1)
            {
                $country_id = $request->country_id[0];
                $state_id = $request->state_id[0];
            }else{
                $country_id = $request->country_id[$key];
                $state_id = $request->state_id[$key];
            }
            StudentProfileAddress::create([
                'premise_name' => @$premise_name,
                'plot_no' => @$request->plot_no[$key],
                'type' => @$request->type[$key],
                'locality' => @$request->locality[$key],
                'sub_locality' => @$request->sub_locality[$key],
                'landmark' => @$request->landmark[$key],
                'village' => @$request->village[$key],
                'post_office' => @$request->post_office[$key],
                'police_station' => @$request->police_station[$key],
                'country_id' => @$country_id,
                'state_id' => @$state_id,
                'pin' => @$request->pin[$key],
                'student_profile_id' => @$studentProfile->id,
                'user_id' => Auth::user()->id,
            ]);
        }
        foreach($request->name_of_exam as $index => $name_of_exam)
        {
            StudentAcademicQualification::create([
                'premise_name' => @$name_of_exam,
                'name_of_board' => @$request->name_of_board[$index],
                'name_of_board' => @$request->name_of_board[$index],
                'attended_school' => @$request->attended_school[$index],
                'passing_year' => @$request->passing_year[$index],
                'total_marks' => @$request->total_marks[$index],
                'marks' => @$request->marks[$index],
                'percentage' => @$request->percentage[$index],
                'user_id' => Auth::user()->id,
            ]);
        }
        foreach($request->document_category_id as $category_index => $document_category_id)
        {
            if($request->file[$category_index] != null)
            {
                // StudentDocument::create([
                //     'document_category_id' => @$document_category_id,
                //     'document' => @$request->file[$category_index],
                //     'user_id' => Auth::user()->id,
                // ]);
            }
        }
        toastr()->success('Student Application Store successfully');
        return redirect()->back(); 
    }
    public function studentAddressUpdate(Request $request)
    {
        $studentProfile = Auth::user()->studentProfile;
        $studentProfile->update($request->all());
        foreach($request->address_id as $key => $address_id)
        {
            $studentAddress = StudentProfileAddress::find($address_id);
            $studentAddress->update([
                'premise_name' => @$request->premise_name[$key],
                'plot_no' => @$request->plot_no[$key],
                'locality' => @$request->locality[$key],
                'sub_locality' => @$request->sub_locality[$key],
                'landmark' => @$request->landmark[$key],
                'village' => @$request->village[$key],
                'post_office' => @$request->post_office[$key],
                'police_station_id' => @$request->police_station_id[$key],
                'country_id' => @$request->country_id[$key],
                'state_id' => @$request->state_id[$key],
                'pin' => @$request->pin[$key],
            ]);
        }
        toastr()->success('Student Profile Address Updated successfully');
        return redirect()->back(); 
    }
    public function studentAddressCreate(Request $request)
    {
        $studentProfile = Auth::user()->studentProfile;
        $studentProfile->update($request->all());
        foreach($request->premise_name as $key => $premise_name)
        {
            if($request->same_as_temparory && $key == 1)
            {
                $country_id = $request->country_id[0];
                $state_id = $request->state_id[0];
            }else{
                $country_id = $request->country_id[$key];
                $state_id = $request->state_id[$key];
            }
            StudentProfileAddress::create([
                'premise_name' => @$premise_name,
                'plot_no' => @$request->plot_no[$key],
                'type' => @$request->type[$key],
                'locality' => @$request->locality[$key],
                'sub_locality' => @$request->sub_locality[$key],
                'landmark' => @$request->landmark[$key],
                'village' => @$request->village[$key],
                'post_office' => @$request->post_office[$key],
                'police_station' => @$request->police_station[$key],
                'country_id' => @$country_id,
                'state_id' => @$state_id,
                'pin' => @$request->pin[$key],
                'student_profile_id' => @$studentProfile->id,
                'user_id' => Auth::user()->id,
            ]);
        }
        toastr()->success('Student Profile Address Stored successfully');
        return redirect()->back(); 
    }
    public function studentDocumentUpdate(Request $request)
    {
        try{
            if($request->document_category_id == '1' || $request->document_category_id == '2' || $request->document_category_id == '3' )
            {
                $this->validate($request,[
                    'document' => 'required|image',
                    'user_id' => 'required',
                    'document_category_id' => 'required'
                ]);

            }else{
                $this->validate($request,[
                    'document' => 'required|mimes:pdf|max:30000',
                    'user_id' => 'required',
                    'document_category_id' => 'required'
                ]);

            }
            $category = DocumentCategory::find($request->document_category_id);
            if($category->document())
            {
                $document = $category->document();
                $document->update($request->all());
            }else{
                StudentDocument::create($request->all());
            }
            toastr()->success('Information Added Successfully');
            return redirect()->back();
        }catch (Exception $e)
        {
            toastr()->error($e->getMessage());
            return redirect()->back();
        }
    }
    public function downloadFile($id)
    {
        $document = StudentDocument::find($id);
        $files = public_path(). "$document->document";
        return Response::download($files);
    }
    public function getQualificationFields(Request $request)
    {
        $key = $request->key;
        $html = view('prospect.dashboard.partials.academic_qualification_fields', compact('key'))->render();
        return response([
            'html' => $html,
        ], 200);
    }
}
