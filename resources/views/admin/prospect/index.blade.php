@extends('admin.layout.index')

@section('title')
Prospects
@endsection

@section('content')

<div class="card">
    <div class="table-responsive">
        <table class="table datatable-save-state">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Verified</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($prospects  as $key => $prospect)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$prospect->name}}</td>
                    <td>{{$prospect->email}}</td>
                    <td>
                        @if($prospect->is_verified)
                            <span class="badge badge-success">Verified</span>
                        @else
                            <span class="badge badge-danger">Not Verified</span>
                        @endif
                    </td>
                    <td>
                        @if($prospect->is_active)
                            <span class="badge badge-success">Active</span>
                        @else
                            <span class="badge badge-danger">Pending</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.prospect.show',$prospect->id)}}" class="btn btn-primary btn-sm">Show</a>
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
