
    <div class="col-md-3">
        <label>College</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <select name="college_id" class="form-control">
                <option selected disabled>Select College</option>
                @foreach(App\Models\User::where('role_id',2)->where('is_verified',1)->where('is_active',1)->get() as $college)
                <option value="{{$college->id}}">{{$college->name}}</option>
                @endforeach
            </select>
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Student Phone</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('phone')}}" placeholder="Student Phone" name="phone">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Student Father Name</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('fathers_name')}}" placeholder="Student Father Name" name="fathers_name">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Student Mother Name</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('mother_name')}}" placeholder="Student Mother Name" name="mother_name">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Student Blood Group</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('blood_group')}}" placeholder="Student Blood Group" name="blood_group">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Student Date of Birth</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="date" class="form-control" value="{{old('date_of_birth')}}" placeholder="Student Blood Group" name="date_of_birth">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Student Nationality</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('nationality')}}" placeholder="Student Nationality" name="nationality">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Student gender</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="radio" name="gender"  value="Male" class=""> Male 
            <input type="radio" name="gender" value="Female" class=""> Female 
            <input type="radio" name="gender" value="Sehmale" class=""> Sehmale 
        </div>
    </div>
    <div class="col-md-12">
        <p>Temparory Address</p>
    </div>
    <input type="hidden" name="type[]" value="Temparory">
    <div class="col-md-3">
        <label>Address</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('address')}}" placeholder="Address" name="address[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>  
    <div class="col-md-3">
        <label>Country</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('country')}}" placeholder="Country" name="country[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>State</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('state')}}" placeholder="State" name="state[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Landmark</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('landmark')}}" placeholder="Landmark" name="landmark[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>City</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('city')}}" placeholder="City" name="city[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Town</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('town')}}" placeholder="Town" name="town[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Pin</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('pin')}}" placeholder="Pin" name="pin[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Lane</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('lane')}}" placeholder="Lan" name="lane[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <p>Permenant Address</p>
    </div>
    <input type="hidden" name="type[]" value="Permenant">
    <div class="col-md-3">
        <label>Address</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('address')}}" placeholder="Address" name="address[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>  
    <div class="col-md-3">
        <label>Country</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('country')}}" placeholder="Country" name="country[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>State</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('state')}}" placeholder="State" name="state[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Landmark</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('landmark')}}" placeholder="Landmark" name="landmark[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>City</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('city')}}" placeholder="City" name="city[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Town</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('town')}}" placeholder="Town" name="town[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Pin</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('pin')}}" placeholder="Pin" name="pin[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <label>Lane</label>
        <div class="form-group form-group-feedback form-group-feedback-left">
            <input type="text" class="form-control" value="{{old('lane')}}" placeholder="Lan" name="lane[]">
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>
    </div>
