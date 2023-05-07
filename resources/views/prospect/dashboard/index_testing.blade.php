
@extends('prospect.layout.index')

@section('title')
    Dashboard
@endsection

@section('content')


<div class="row">
    <div class="col-md-12">
            <div class="card card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h6 class="font-weight-semibold mb-0 text-center">
                            Welcome To Prospect Panel!
                        </h6>
                    </div>
                </div>
            </div>
            
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        
        <div class="card">
            @if(Auth::user()->studentProfile)
            <div class="card-body">
                <div class="media mb-0">
                    <div class="media-body">
                        <h6 class="font-weight-semibold mb-0 text-center">
                            Your application is submitted!
                        </h6>
                        <a href="{{route('prospect.dashboard.generate_pdf')}}" class="btn btn-primary text-right">Download PDF</a>
                    </div>
                </div>
            </div>
            @else
            <form id="studentApplicationData"  enctype="multipart/form-data"  class="wizard-form steps-validation" method="post" action="{{route('prospect.dashboard.student_profile_create')}}" data-fouc>
                @csrf
                <h6>Registration</h6>
                <fieldset>
                    @include('prospect.dashboard.partials.new_registration')
                </fieldset>
                <h6>Basic Information</h6>
                <fieldset>
                    @include('prospect.dashboard.partials.new_basic_information')
                </fieldset>
                <h6>Academic Qualification</h6>
                <fieldset>
                    @include('prospect.dashboard.partials.academic_qualification')
                </fieldset>
                <h6>Documents Uploaded</h6>
                <fieldset>
                    @include('prospect.dashboard.partials.documents_uploaded')
                </fieldset>
                <h6>Payment Of Fees</h6>
                <fieldset>
                    @include('prospect.dashboard.partials.payment_of_fees')
                </fieldset>
            </form>
            @endif
        </div>
    </div>
</div>
@endsection
@section('scripts')
@include('prospect.dashboard.partials.js')
@endsection