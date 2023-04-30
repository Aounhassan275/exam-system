
<form id="studentAddressCreateForm" action="{{route('prospect.dashboard.student_address_create')}}" method="POST">
    @csrf
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Gender</label>
                    <br>
                    <input type="radio" @if(Auth::user()->studentProfile->gender == "Male") checked @endif name="gender"  value="Male" class=""> Male 
                    <input type="radio" @if(Auth::user()->studentProfile->gender == "Female") checked @endif  name="gender" value="Female" class=""> Female 
                    <input type="radio" @if(Auth::user()->studentProfile->gender == "Sehmale") checked @endif  name="gender" value="Sehmale" class=""> Sehmale 
                
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Caste</label>
                    <br>
                    <input type="radio" name="caste" @if(Auth::user()->studentProfile->caste == "General") checked @endif  value="General" class=""> General 
                    <input type="radio" name="caste" @if(Auth::user()->studentProfile->caste == "SC") checked @endif value="SC" class=""> SC 
                    <input type="radio" name="caste" @if(Auth::user()->studentProfile->caste == "ST") checked @endif value="ST" class=""> ST 
                    <input type="radio" name="caste" @if(Auth::user()->studentProfile->caste == "OBC") checked @endif value="OBC" class=""> OBC 
                    <input type="radio" name="caste" @if(Auth::user()->studentProfile->caste == "SEBC") checked @endif value="SEBC" class=""> SEBC 
                    <input type="radio" name="caste" @if(Auth::user()->studentProfile->caste == "EWS") checked @endif value="EWS" class=""> EWS 
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Persons With Disability</label>
                    <br>
                    <input type="radio" @if(Auth::user()->studentProfile->persons_with_disability == 1) checked @endif  name="persons_with_disability" value="1" class=""> Yes 
                    <input type="radio" @if(Auth::user()->studentProfile->persons_with_disability != 1) checked @endif name="persons_with_disability" value="0" class=""> No 
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ex-service Man</label>
                    <br>
                    <input type="radio" @if(Auth::user()->studentProfile->ex_service_man == 1) checked @endif name="ex_service_man" value="1" class=""> Yes 
                    <input type="radio" @if(Auth::user()->studentProfile->ex_service_man != 1) checked @endif  name="ex_service_man" value="0" class=""> No 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Religion</label>
                    <br>
                    <input type="radio" name="religion" @if(Auth::user()->studentProfile->religion == 'Hindu') checked @endif value="Hindu" class=""> Hindu  
                    <input type="radio" name="religion" @if(Auth::user()->studentProfile->religion == 'Muslim') checked @endif value="Muslim" class=""> Muslim 
                    <input type="radio" name="religion" @if(Auth::user()->studentProfile->religion == 'Christian') checked @endif value="Christian" class=""> Christian 
                    <input type="radio" name="religion" @if(Auth::user()->studentProfile->religion == 'Sikh') checked @endif value="Sikh" class=""> Sikh 
                    <input type="radio" name="religion" @if(Auth::user()->studentProfile->religion == 'Others') checked @endif value="Others" class=""> Others 
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Nationality</label>
                    <br>
                    <input type="radio" name="nationality" checked value="Indian" @if(Auth::user()->studentProfile->nationality == 'Indian') checked @endif  class=""> Indian  
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Other Nationality 1</label>
                    <input type="text" value="{{Auth::user()->studentProfile->other_nationality_1}}" name="other_nationality_1" class="form-control" placeholder="Other Nationality" class="">  
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Other Nationality 2</label>
                    <input type="text" name="other_nationality_2"  value="{{Auth::user()->studentProfile->other_nationality_2}}"class="form-control" placeholder="Other Nationality 2" class="">  
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label>Mother Tongue</label>
                    <input type="text" name="mother_tongue"  value="{{Auth::user()->studentProfile->mother_tongue}}"class="form-control" placeholder="Mother Tongue" class="">  
                </div>
            </div>
        </div>
        <p>Present Address /  Address For Correspondence</p>
        <div class="row">
            <div class="col-md-4">
                <input type="hidden" name="type[]" value="Temparory">
                <div class="form-group">
                    <label>Holding No. / Premise's Name</label>
                    <input type="text" value="" name="premise_name[]" id="temporary_premise_name" class="form-control" placeholder="Holding No. / Premise's Name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Plot No.</label>
                    <input type="text" name="plot_no[]" value="" id="temporary_plot_no" class="form-control" placeholder="Plot No.">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Locality <small style="color:red;">*</small></label>
                    <input type="text" name="locality[]" value="" id="temporary_locality" class="form-control" placeholder="Locality">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Sub Locality</label>
                    <input type="text" name="sub_locality[]" value="" id="temporary_sub_locality" class="form-control" placeholder="Sub Locality">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Land Mark</label>
                    <input type="text" name="landmark[]" value="" id="temparory_land_mark"  class="form-control" placeholder="Land Mark">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Village</label>
                    <input type="text" name="village[]"  value="" id="temparory_village"  class="form-control" placeholder="Village">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Post Office <small style="color:red;">*</small></label>
                    <input type="text" name="post_office[]" value=""  id="temparory_post_office"  class="form-control" placeholder="Post Office">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Police Station <small style="color:red;">*</small></label>
                    <select  name="police_station_id[]" id="temparory_police_station_id"  class="form-control select-search" data-fouc>
                        <option selected disabled>Select Police Station</option>
                        @foreach(App\Models\PoliceStation::all() as $police_station)
                        <option value="{{$police_station->id}}">{{$police_station->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Country <small style="color:red;">*</small></label>
                    <select  name="country_id[]" id="temparory_country_id"  class="form-control select-search" data-fouc>
                        <option selected disabled>Select Country</option>
                        @foreach(App\Models\Country::all() as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>State <small style="color:red;">*</small></label>
                    <select  name="state_id[]" id="temparory_state_id"  class="form-control select-search" data-fouc>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Pin Code<small style="color:red;">*</small></label>
                    <input type="text" name="pin[]" value="" id="temparory_pin" class="form-control" placeholder="Pin Code">
                </div>
            </div>
        </div>
        <p><h5>Permenant Address :</h5></p>
        <div class="row col-md-12">
            <input type="checkbox" name="same_as_temparory" id="same_as_temparory"> Same as Temparory
        </div>
        <div class="row permenant_fields">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="type[]" value="Permenant">
                    <label>Holding No. / Premise's Name</label>
                    <input type="text" name="premise_name[]" value="" id="permenant_premise_name" class="form-control" placeholder="Holding No. / Premise's Name">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Plot No.</label>
                    <input type="text" name="plot_no[]" value="" id="permenant_plot_no" class="form-control" placeholder="Plot No.">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Locality <small style="color:red;">*</small></label>
                    <input type="text" name="locality[]" value="" id="permenant_locality" class="form-control" placeholder="Locality">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Sub Locality</label>
                    <input type="text" name="sub_locality[]" value="" id="permenant_sub_locality" class="form-control" placeholder="Sub Locality">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Land Mark</label>
                    <input type="text" name="landmark[]"  value="" id="permenant_land_mark"  class="form-control" placeholder="Land Mark">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Village</label>
                    <input type="text" name="village[]"  value="" id="permenant_village"  class="form-control" placeholder="Village">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Post Office <small style="color:red;">*</small></label>
                    <input type="text" name="post_office[]" value=""  id="permenant_post_office"  class="form-control" placeholder="Post Office">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Police Station <small style="color:red;">*</small></label>
                    <select  name="police_station_id[]" id="permenant_police_station_id"  class="form-control select-search" data-fouc>
                        <option selected disabled>Select Police Station</option>
                        @foreach(App\Models\PoliceStation::all() as $police_station)
                        <option value="{{$police_station->id}}">{{$police_station->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Country <small style="color:red;">*</small></label>
                    <select  name="country_id[]" id="permenant_country_id"  class="form-control select-search" data-fouc>
                        <option selected disabled>Select Country</option>
                        @foreach(App\Models\Country::all() as $country)
                        <option value="{{$country->id}}">{{$country->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>State <small style="color:red;">*</small></label>
                    <select  name="state_id[]" id="permenant_state_id"  class="form-control select-search" data-fouc>
                        <option selected value="" >Select State</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Pin Code<small style="color:red;">*</small></label>
                    <input type="text" name="pin[]" value="" id="permenant_pin" class="form-control" placeholder="Pin Code">
                </div>
            </div>
        </div>
        <div class="text-right" style="margin-top:10px;">
            <button type="button" id="student-address-create-button" class="btn btn-primary">Next <i class="icon-paperplane ml-2"></i></button>
        </div> 
    </form>