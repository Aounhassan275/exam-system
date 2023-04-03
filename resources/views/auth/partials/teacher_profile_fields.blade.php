
<div class="col-md-3">
    <label>College</label>
    <div class="form-group form-group-feedback form-group-feedback-left">
        <select  name="teacher_college_id"  class="form-control select-search" data-fouc>
            <option selected disabled>Select College</option>
            @foreach(App\Models\User::where('role_id',2)->where('is_verified',1)->where('is_active',1)->get() as $college)
            <option value="{{$college->id}}">{{$college->name}}</option>
            @endforeach
        </select>
    </div>
</div>