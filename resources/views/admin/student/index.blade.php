@extends('admin.layout.index')

@section('title')
    Students
@endsection

@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>College Name</th>
                    <th>Father Name</th>
                    <th>Mother Name</th>
                    <th>Gender</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($students  as $key => $student)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{@$student->studentProfile->college->name}}</td>
                    <td>{{@$student->studentProfile->fathers_name}}</td>
                    <td>{{@$student->studentProfile->mother_name}}</td>
                    <td>{{@$student->studentProfile->gender}}</td>
                    <td>
                        @if($student->is_verified)
                            <span class="badge badge-success">Verified</span>
                        @else
                            <span class="badge badge-danger">Not Verified</span>
                        @endif
                    </td>
                    <td>
                        @if($student->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($student->is_active)
                            <a href="{{route('admin.user.in_active',$student->id)}}" class="btn btn-warning btn-sm">In Active</a>
                        @else 
                            <a href="{{route('admin.user.active',$student->id)}}" class="btn btn-success btn-sm">Active</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.student.show',$student->id)}}" class="btn btn-primary btn-sm">Show</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table> 

    </div>
</div>
@endsection
@section('scripts')
@endsection
