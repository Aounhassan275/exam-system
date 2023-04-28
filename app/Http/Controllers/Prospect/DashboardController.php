<?php

namespace App\Http\Controllers\Prospect;

use App\Http\Controllers\Controller;
use App\Models\DocumentCategory;
use App\Models\StudentDocument;
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
        return view('prospect.dashboard.index',compact('active_tab'));
    }
    public function studentProfileUpdate(Request $request)
    {
        $studentProfile = Auth::user()->studentProfile;
        $studentProfile->update($request->all());
        toastr()->success('Student Profile Updated successfully');
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
    public function studentDocumentUpdate(Request $request)
    {
        try{
            $this->validate($request,[
                'document' => 'required|mimes:pdf|max:30000',
                'user_id' => 'required',
                'document_category_id' => 'required'
            ]);
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
}
