<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jun 2020 11:58:47 GMT -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="assets/styles/style.css">
<link rel="stylesheet" href="assets/styles/custom.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
	<form action="/registeraction" class="frm-single" method="POST">
        @csrf
		<div class="inside">
			<div class="title"><strong>AppraiseME</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Register</div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

			@if( Session::has("success") )
			<div class="alert alert-success alert-block text-center" role="alert">
				<button class="close" data-dismiss="alert"></button>
				{{ Session::get("success") }}
			</div>
			@endif

			@if( Session::has("error") )
			<div class="alert alert-danger alert-block text-center" role="alert">
				<button class="close" data-dismiss="alert"></button>
				{{ Session::get("error") }}
			</div>
			@endif

            <div class="frm-input"><input type="text" placeholder="Business Name" class="frm-inp" name="business_name" required><i class="fa fa-user frm-ico"></i></div>
			<!-- /.frm-title -->
			<div class="frm-input"><input type="email" placeholder="Email" class="frm-inp" name="email" required><i class="fa fa-envelope frm-ico"></i></div>
			<!-- /.frm-input -->
			
			<!-- /.frm-input -->
			<div class="frm-input"><input type="password" placeholder="Password" class="frm-inp" name="password" required><i class="fa fa-lock frm-ico"></i></div>

            <div class="frm-input"><input type="password" placeholder="Confirm Password" class="frm-inp" name="password_confirmation" required><i class="fa fa-lock frm-ico"></i></div>
			<!-- /.frm-input -->
			
			<!-- /.clearfix -->
			<button type="submit" class="frm-submit">Register<i class="fa fa-arrow-circle-right"></i></button>
	
			<!-- /.row -->
			<a href="/login" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>
			<div class="frm-footer">AppraiseME © 2021.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
	</form>
	<!-- /.frm-single -->
</div><!--/#single-wrapper -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="assets/scripts/jquery.min.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
<script src="../../../../cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
<script src="assets/scripts/mycommon.js"></script>
</body>

<!-- Mirrored from demo.ninjateam.org/html/my-admin/light/page-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Jun 2020 11:58:47 GMT -->
</html>