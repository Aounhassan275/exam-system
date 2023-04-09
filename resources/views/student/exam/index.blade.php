@extends('student.layout.index')

@section('title')
    Exams
@endsection

@section('content')

<div class="card">
    
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Exams</h5>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table datatable-save-state">
        <thead>
            <tr>
                <th>#</th>
                <th>Exam Name</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Exam Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exams  as $key => $exam)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$exam->name}}</td>
                <td>{{@$exam->course->name}}</td>
                <td>{{@$exam->semester->name}}</td>
                <td>{{@$exam->date->format('d M, Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('scripts')
@endsection
