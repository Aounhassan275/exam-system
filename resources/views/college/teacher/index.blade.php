@extends('college.layout.index')

@section('title')
    Teachers
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
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($teachers  as $key => $teacher)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$teacher->teacher->name}}</td>
                    <td>{{$teacher->teacher->email}}</td>
                    <td>{{@$teacher->college->name}}</td>
                    <td>
                        @if($teacher->teacher->is_verified)
                            <span class="badge badge-success">Verified</span>
                        @else
                            <span class="badge badge-danger">Not Verified</span>
                        @endif
                    </td>
                    <td>
                        @if($teacher->teacher->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        @if($teacher->teacher->is_active)
                            <a href="{{route('college.student.in_active',$teacher->teacher->id)}}" class="btn btn-warning btn-sm">In Active</a>
                        @else 
                            <a href="{{route('college.student.active',$teacher->teacher->id)}}" class="btn btn-success btn-sm">Active</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('college.teacher_profile.show',$teacher->id)}}" class="btn btn-primary btn-sm">Show</a>
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
