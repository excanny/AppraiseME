<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home - AppraiseME</title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/styles/custom.css') }}">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="{{ asset('assets/fonts/material-design/css/materialdesignicons.css') }}">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css') }}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/sweet-alert/sweetalert.css') }}">
	
	<!-- Morris Chart -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/chart/morris/morris.css') }}">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/plugin/fullcalendar/fullcalendar.print.css') }}" media='print'>

	<!-- Select2 -->
	<link rel="stylesheet" href="{{ asset('assets/plugin/select2/css/select2.min.css') }}">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

</head>

<body>
<div class="main-menu">
	<header class="header">
		<a href="/" class="logo"><i class="ico mdi mdi-cube-outline"></i>AppraiseME</a>
	</header>
	<!-- /.header -->
	<div class="content">

		<div class="navigation">
			<h5 class="title">Navigation</h5>
			<!-- /.title -->
			<ul class="menu js__accordion">
				<li class="current">
					<a class="waves-effect" href="/business-dashboard"><i class="menu-icon mdi mdi-view-dashboard mt-3"></i><span>Dashboard</span></a>
				</li>
				
				<li>
					<a class="waves-effect" href="/kpis"><i class="menu-icon mdi mdi-calendar mt-3"></i><span>KPI Module</span></a>
				</li>

				<li>
					<a class="waves-effect" href="/departments"><i class="menu-icon mdi mdi-briefcase mt-3"></i><span>Departments Module</span></a>
				</li>
			
				<li>
					<a class="waves-effect" href="/employees"><i class="menu-icon fa fa-users fa-lg"></i><span>Employees Module</span></a>
				</li>

				<li>
					<a class="waves-effect" href="/export"><i class="menu-icon fa fa-file-excel fa-lg"></i><span>Export Appraisals</span></a>
				</li>

				
				
				
				
			</ul>
		
			<!-- /.menu js__accordion -->
		</div>
		<!-- /.navigation -->
	</div>
	<!-- /.content -->
</div>
<!-- /.main-menu -->

<div class="fixed-navbar">
	<div class="float-left">
		<button type="button" class="menu-mobile-button fas fa-bars js__menu_mobile"></button>
		<h1 class="page-title">Home</h1>
		<!-- /.page-title -->
	</div>
	<!-- /.float-left -->
	<div class="float-right">
		
		
		<a href="{{url('/logout')}}" class="ico-item mdi mdi-logout" onclick="return confirm('Are you sure you want to logout?')"></a>
	</div>
	<!-- /.float-right -->
</div>
<!-- /.fixed-navbar -->

<div id="wrapper">

    {{-- Dynamic Content --}}


    @yield('content')


    {{-- Dynamic Content --}}

</div>

<!--/#wrapper -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="assets/script/html5shiv.min.js"></script>
		<script src="assets/script/respond.min.js"></script>
	<![endif]-->
	<!-- 
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="{{ asset('assets/scripts/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/scripts/modernizr.min.js') }}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="{{ asset('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{ asset('assets/plugin/sweet-alert/sweetalert.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/waves/waves.min.js')}}"></script>

	<!-- Morris Chart -->
	<script src="{{ asset('assets/plugin/chart/morris/morris.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/chart/morris/raphael-min.js')}}"></script>
	<script src="{{ asset('assets/scripts/chart.morris.init.min.js')}}"></script>

	<!-- Flot Chart -->
	<script src="{{ asset('assets/plugin/chart/plot/jquery.flot.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/chart/plot/jquery.flot.tooltip.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/chart/plot/jquery.flot.categories.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/chart/plot/jquery.flot.pie.min.js')}}"></script>
	<script src="{{ asset('assets/plugin/chart/plot/jquery.flot.stack.min.js')}}"></script>
	<script src="{{ asset('assets/scripts/chart.flot.init.min.js')}}"></script>

	<!-- Sparkline Chart -->
	<script src="{{ asset('assets/plugin/chart/sparkline/jquery.sparkline.min.js')}}"></script>
	<script src="{{ asset('assets/scripts/chart.sparkline.init.min.js')}}"></script>

	<!-- FullCalendar -->
	<script src="{{ asset('assets/plugin/moment/moment.js')}}"></script>
	<script src="{{ asset('assets/plugin/fullcalendar/fullcalendar.min.js')}}"></script>
	<script src="{{ asset('assets/scripts/fullcalendar.init.js')}}"></script>

	<!-- Select2 -->
	<script src="{{ asset('assets/plugin/select2/js/select2.min.js')}}"></script>

	<script src="{{ asset('assets/scripts/main.min.js')}}"></script>
<script src="{{ asset('assets/scripts/mycommon.js')}}"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.category').select2();
		});
	</script>
</body>

</html>