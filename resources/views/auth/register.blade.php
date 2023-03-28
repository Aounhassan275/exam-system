<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>REGISTER | EXAM SYSTEM </title>

	<!-- Global stylesheets -->
    <link rel="shortcut icon" type="image/png" href="{{asset('front/image/favicon.png')}}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/global_assets/css/icons/icomoon/styles.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/bootstrap_limitless.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/layout.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('user_asset/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
    <link href="{{asset('user_asset/assets/css/toastr.css')}}" rel="stylesheet" type="text/css">

	<!-- Core JS files -->
	<script src="{{asset('user_asset/global_assets/js/main/jquery.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/main/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/plugins/loaders/blockui.min.js')}}"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset('user_asset/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

	<script src="{{asset('user_asset/assets/js/app.js')}}"></script>
	<script src="{{asset('user_asset/global_assets/js/demo_pages/login.js')}}"></script>
	<!-- /theme JS files -->
	<style>
		.error_message{
			color:red;
		}
		.success_message{
			color:green;
		}
	</style>
</head>

<body class="bg-slate-800">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="flex-fill" method="POST" action="{{route('register')}}" enctype="multipart/form-data">
                    @csrf
					
					<div class="row">
						<div class="col-lg-8 offset-lg-2">
							<div class="card mb-0">
								<div class="card-body">
									<div class="text-center mb-3">
										<i class="icon-plus3 icon-2x text-success border-success border-3 rounded-round p-3 mb-3 mt-1"></i>
										<h5 class="mb-0">Register Yourself</h5>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>User Name</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" id="name" class="form-control" value="{{old('name')}}" placeholder="username" name="name" required>
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Email Address</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" id="email" class="form-control"  value="{{old('email')}}" placeholder="Enter your email" name="email" required>
												<div class="form-control-feedback">
													<i class="icon-mail5 text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Your Image</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input class="form-control" type="file" name="image" placeholder="Enter password" required>
												<div class="form-control-feedback">
													<i class="icon-file-picture text-muted"></i>
												</div>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-4">
											<label>Password</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input id="pwd" minlength="4" class="form-control" value="{{old('password')}}" onkeyup="validatePassword(this.value);" type="password" name="password" placeholder="Enter password" required>
												<div class="form-control-feedback">
													<i class="icon-lock2 text-muted"></i>
												</div>
												<span id="msg"></span>
											</div>
										</div>
										<div class="col-md-4">
											<label>Confirm Password</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input id="confirmpwd" minlength="4" class="form-control" value="{{old('confirm_password')}}" onkeyup="confirmPassword(this.value);" type="password" name="confirm_password" placeholder="Enter confirm password" required>
												<div class="form-control-feedback">
													<i class="icon-lock2 text-muted"></i>
												</div>
												<span id="confirmmsg"></span>
											</div>
										</div>
										<div class="col-md-4">
											<label>Role</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<select name="role_id" class="form-control" id="role_id" required>
													<option>Select</option>
													@foreach(App\Models\Role::where('name','!=','Admin')->get() as $role)
													<option value="{{$role->id}}">{{$role->name}}</option>
													@endforeach
												</select>
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>

									</div>
									<div class="row all_college_fields" {{old('role_id')?old('role_id') == 2:'hidden'}}>
										<div class="col-md-3">
											<label>College Name</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" id="college_name" class="form-control" value="{{old('college_name')}}" placeholder="College Name" name="college_name">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<label>Principal Name</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="{{old('principal_name')}}" placeholder="Principal Name" name="principal_name">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<label>Affillicate Document</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="file" class="form-control"  placeholder="Principal Name" name="document">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<label>State</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="{{old('state')}}" placeholder="State" name="state">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<label>District</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="{{old('district')}}" placeholder="District" name="district">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<label>City</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="{{old('city')}}" placeholder="City" name="city">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<label>Year of Establishment</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="{{old('year_of_establishment')}}" placeholder="Year of Establishment" name="year_of_establishment">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<label>Address</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="{{old('address')}}" placeholder="Address" name="address">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Course 1</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="" placeholder="Course Name 1" name="course_names[]">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Course 1 Seats</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="number" class="form-control" value="" placeholder="Course Seats" name="course_seats[]">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Course 2</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="" placeholder="Course Name 2" name="course_names[]">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Course 2 Seats</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="number" class="form-control" value="" placeholder="Course Seats" name="course_seats[]">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Course 3</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="text" class="form-control" value="" placeholder="Course Name 3" name="course_names[]">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<label>Course 3 Seats</label>
											<div class="form-group form-group-feedback form-group-feedback-left">
												<input type="number" class="form-control" value="" placeholder="Course Seats" name="course_seats[]">
												<div class="form-control-feedback">
													<i class="icon-user text-muted"></i>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input class="" type="checkbox" name="terms_condiition" required> I accept <a href="{{url('terms_&_condition')}}"> terms and condition policy </a>of Exam System.
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-block">Sign Up <i class="icon-circle-right2 ml-2"></i></button>
									</div>
									<p  class="text-center">OR</p>
									
									<a href="{{url('/')}}"><button type="button" class="btn btn-primary btn-block">Sign In <i class="icon-circle-right2 ml-2"></i></button></a>
								</div>
							</div>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->
    <script src="{{asset('user_asset/assets/js/toastr.js')}}"></script>
	@toastr_render
    <script>
        function validatePassword(password) {
            
            // Do not show anything when the length of password is zero.
            if (password.length === 0) {
                document.getElementById("msg").innerHTML = "";
                return;
            }
            // Create an array and push all possible values that you want in password
            var matchedCase = new Array();
            matchedCase.push("[$@$!%*#?&]"); // Special Charector
            matchedCase.push("[A-Z]");      // Uppercase Alpabates
            matchedCase.push("[0-9]");      // Numbers
            matchedCase.push("[a-z]");     // Lowercase Alphabates

            // Check the conditions
            var ctr = 0;
            for (var i = 0; i < matchedCase.length; i++) {
                if (new RegExp(matchedCase[i]).test(password)) {
                    ctr++;
                }
            }
            // Display it
            var color = "";
            var strength = "";
            switch (ctr) {
                case 0:
                case 1:
                case 2:
                    strength = "Very Weak";
                    color = "red";
                    break;
                case 3:
                    strength = "Medium";
                    color = "orange";
                    break;
                case 4:
                    strength = "Strong";
                    color = "green";
                    break;
            }
            document.getElementById("msg").innerHTML = strength;
            document.getElementById("msg").style.color = color;
        }
		function confirmPassword(password) {
            
            // Do not show anything when the length of password is zero.
            if (password.length === 0) {
                document.getElementById("confirmmsg").innerHTML = "";
                return;
            }
			// new_password = document.getElementById("pwd").val();
			new_password =  $('#pwd').val();
			if(new_password == password)
			{
				var strength = "Password Matched";
				var color = "green";
			}else{
				var strength = "Password dont Matched";
				var color = "red";
			}

            document.getElementById("confirmmsg").innerHTML = strength;
            document.getElementById("confirmmsg").style.color = color;
        }
		
    </script>
	
    <script>
        $(document).on('change', '#role_id', function () {
			role_id = $(this).val();
			if(role_id == 2)
			{
				$('.all_college_fields').attr("hidden",false);
			}else{
				$('.all_college_fields').attr("hidden",true);
			}
        });
        $(document).on('change', '#new_code', function (event) {
            $('.btn').attr("disabled",true);
			new_code = $('#new_code').val();
			$('#refferral_user').html("");	
            event.preventDefault();
            $.ajax({
                url: '{{url("check_refferral_code")}}',
                type: 'POST',
				headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
				dataType: 'JSON',
                data: {
					'code': new_code,
				},
            })
			.done(function (response) {
				$('.btn').attr("disabled",false);
				if(response.status == true)
				{
					$('#refferral_user').removeClass("error_message");
					$('#refferral_user').addClass("success_message");
					$('#refferral_user').html(response.message);
				}else{
					$('#refferral_user').addClass("error_message");
					$('#refferral_user').removeClass("success_message");
					$('#refferral_user').html(response.message);	
				}
			})
        });
    </script>
</body>
</html>
