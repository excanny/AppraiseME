<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>AppraiseME | Employee Dashboard</title>
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="{{ asset('assets2/fonts/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets2/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets2/fonts/material-design-icons/material-icon.css')}}" rel="stylesheet" type="text/css" />
	<!--bootstrap -->
	<link href="{{ asset('assets2/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets2/plugins/summernote/summernote.css')}}" rel="stylesheet">
	<!-- Material Design Lite CSS -->
	<link rel="stylesheet" href="{{ asset('assets2/plugins/material/material.min.css')}}">
	<link rel="stylesheet" href="{{ asset('assets2/css/material_style.css')}}">
	<!-- inbox style -->
	<link href="{{ asset('assets2/css/pages/inbox.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- Theme Styles -->
	<link href="{{ asset('assets2/css/theme/light/theme_style.css')}}" rel="stylesheet" id="rt_style_components" type="text/css" />
	<link href="{{ asset('assets2/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets2/css/theme/light/style.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets2/css/responsive.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets2/css/theme/light/theme-color.css')}}" rel="stylesheet" type="text/css" />


	<!-- data tables -->
	<link href="{{ asset('assets2/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

	<link rel="stylesheet" href="/resources/demos/style.css">

	<style>
		


	</style>

</head>
<!-- END HEAD -->

<body
	class="page-header-fixed sidemenu-closed-hidelogo page-content-white page-md header-white white-sidebar-color logo-indigo">
	<div class="page-wrapper">
		<!-- start header -->
		<div class="page-header navbar navbar-fixed-top">
			<div class="page-header-inner ">
				<!-- logo start -->
				<div class="page-logo">
					<a href="{{url('/employee-dashboard')}}">
					
						<span class="logo-default">AppraiseME</span> </a>
				</div>
				<!-- logo end -->
				<ul class="nav navbar-nav navbar-left in">
					<li><a href="#" class="menu-toggler sidebar-toggler"><i class="icon-menu"></i></a></li>
				</ul>
			
				<!-- start mobile menu -->
				<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span></span>
				</a>
				<!-- end mobile menu -->
				<!-- start header menu -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						
						<!-- end message dropdown -->
						<!-- start manage user dropdown -->
						<li class="dropdown dropdown-user">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
								data-close-others="true">
								<i class="fa fa-angle-down"></i>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								
								<li>
									<a href="{{ url('/employeelogout')}}" onclick="return confirm('Are you sure you want to logout?')">
										<i class="icon-logout"></i> Log Out </a>
								</li>
							</ul>
						</li>
						<!-- end manage user dropdown -->
						
					</ul>
				</div>
			</div>
		</div>
		<!-- end header -->
		<!-- start color quick setting -->

		<!-- end color quick setting -->
		<!-- start page container -->
		<div class="page-container">
			<!-- start sidebar menu -->
			<div class="sidebar-container">
				<div class="sidemenu-container navbar-collapse collapse fixed-menu">
					<div id="remove-scroll" class="left-sidemenu">
						<ul class="sidemenu  page-header-fixed slimscroll-style" data-keep-expanded="false"
							data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
							<li class="sidebar-toggler-wrapper hide">
								<div class="sidebar-toggler">
									<span></span>
								</div>
							</li>
							
							<li class="nav-item start active open">
								<a href="{{ url('/employee-dashboard')}}" class="nav-link nav-toggle">
									<i class="material-icons">dashboard</i>
									<span class="title">Dashboard</span>
									<span class="selected"></span>
								</a>
							</li>
							<li class="nav-item">
								<a href="{{ url('/employee-appraisal')}}" class="nav-link nav-toggle"> <i class="material-icons">settings</i>
									<span class="title">Appraisal Module</span>
								</a>
							</li>


							{{-- <li class="nav-item">
								<a href="#" class="nav-link nav-toggle"> <i class="material-icons">supervisor_account</i>
									<span class="title">Account Officers</span> <span class="arrow"></span>
								</a>
								<ul class="sub-menu">
								
									<li class="nav-item">
										<a href="{{ url('/admin/dashboard/account/officers/')}}" class="nav-link "> <span class="title">List</span>
										</a>
									</li>
									
								</ul>
							</li> --}}
	

							

							
						
						</ul>
					</div>
				</div>
			</div>
			<!-- end sidebar menu -->
            <!-- start page content -->
            

			{{-- Dynamic Content --}}


			@yield('content')


			{{-- Dynamic Content --}}
			
		
		<!-- end page container -->
		<!-- start footer -->
		<div class="page-footer">
			<div class="page-footer-inner"> 2020 &copy; 3 Brothers
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- end footer -->
	</div>
	<!-- start js include path -->
	<script src="{{ asset('assets2/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('assets2/plugins/popper/popper.js')}}"></script>
	<script src="{{ asset('assets2/plugins/jquery-blockui/jquery.blockui.min.js')}}"></script>
	<script src="{{ asset('assets2/plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets2/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets2/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
	<script src="{{ asset('assets2/plugins/sparkline/jquery.sparkline.js')}}"></script>
	<script src="{{ asset('assets2/js/pages/sparkline/sparkline-data.js')}}"></script>
	<!-- Common js-->
	<script src="{{ asset('assets2/js/app.js')}}"></script>
	<script src="{{ asset('assets2/js/layout.js')}}"></script>
	<script src="{{ asset('assets2/js/theme-color.js')}}"></script>
	<!-- material -->
	<script src="{{ asset('assets2/plugins/material/material.min.js')}}"></script>
	<!-- chart js -->
	<script src="{{ asset('assets2/plugins/chart-js/Chart.bundle.js')}}"></script>
	<script src="{{ asset('assets2/plugins/chart-js/utils.js')}}"></script>
	<script src="{{ asset('assets2/js/pages/chart/chartjs/home-data.js')}}"></script>
	<!-- summernote -->
	<script src="{{ asset('assets2/plugins/summernote/summernote.js')}}"></script>
	<script src="{{ asset('assets2/js/pages/summernote/summernote-data.js')}}"></script>
	<!-- end js include path -->

	<!-- data tables -->
	<script src="{{ asset('assets2/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('assets2/plugins/datatables/plugins/bootstrap/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{ asset('assets2/js/pages/table/table_data.js')}}"></script>


	<!-- morris chart -->
	{{-- <script src="{{ asset('assets2/plugins/morris/morris.min.js')}}"></script> --}}
	
	{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script> --}}
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	{{-- <script src="http://cdn.oesmith.co.uk/morris-0.5.1.min.js"></script> --}}
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



	<script>

		$(document).ready( function () {
		   $('.datatable').DataTable({
   
		   });
		});
	</script>


	<script>

	$('.mdl-menu__item').click(function (e) { 
		e.preventDefault();

		var loan_type_name = $(this).data('loan_type_name');
		//alert(loan_type_name);

		$('#list2').val(loan_type_name);
		
	});

	</script>

<script>
	$('#savings_number').keyup(function(){
			var savings_number = $('#savings_number').val();
            //alert(savings_number);
            
			if(savings_number != '')
			{
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
				});
				//alert("Hi");
				$.ajax({
					url:"{{ url('/checksavingsnumber')}}",
					method:"POST",
                    data:{savings_number:savings_number},
                    dataType: "json",
					success:function(response)
					{
                        //$('#lga').html(data);
                        if(response.success == true)
                        {
                            //alert("Yes");
                            $("#acc_no_warning").hide();
                            $("#submit").prop("disabled",false);
                        }
                        else
                        {
                            //alert("No");
                            $("#acc_no_warning").show();
                            $("#submit").prop("disabled",true);
                        }
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execute
						//alert(xhr.responseText);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
				});
				
			}
			else
			{
				// $('#state').html('<option value="">Select State</option>');
				// $('#city').html('<option value="">Select City</option>');
			}
		});
</script>


<script>

$('#customer_name').change(function(){
			var customer_id = $('#customer_name').val();
			//alert(customer_name);
			 if(customer_id != '')
			 {
				 //alert("Hi");

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
				$.ajax({
					url:"{{ url('/getcustomeraccountnumber')}}",
					method:"POST",
					data:{customer_id:customer_id},
					dataType: 'JSON',
					success:function(data)
					{
				
						//alert(data.facc_no);
						if(data == "No Account Number Found")
						{
							//alert("yeaye");
							$('#loan_submit_acc').prop("disabled",true);
						}
						else
						{
							$('#loan_submit_acc').prop("disabled",false);
						}

						$('#account_number').val(data);
						
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execut
					   //alert(xhr.responseText);
                       //alert(errorThrown);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
                });
				
			 }
			else
			{
				//$('#areaname').html('<option value="">Select Area</option>');
			}

		});

</script>

<script>

$('#loan_type_name').change(function(){
	var loan_type_name = $('#loan_type_name').val();
	//alert(loan_type_name);
	 if(loan_type_name != '')
	 {
		 //alert("Hi");

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url:"{{ url('/getloantype_nameamounts')}}",
			method:"POST",
			data:{loan_type_name:loan_type_name},
			dataType: 'JSON',
			success:function(data)
			{
		
				//alert(data);
				$('#loan_amount').html(data);
			   //$('#image').val(data);
			   // for (var index in data) {
				  // // Show value in alert dialog:
				  // alert( data[index] );
				// }
			
			},
			error: function(xhr, textStatus, errorThrown) {
			//code to execut
			   //alert(xhr.responseText);
			   //alert(errorThrown);
			//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
			},
		});
		
	 }
	else
	{
		//$('#areaname').html('<option value="">Select Area</option>');
	}

});

</script>


<script>

	$('#loan_amount').change(function(){
	
		var loan_id = $('#loan_amount').val();
	
		//alert(loan_id);
	
		 if(loan_id != '')
		 {
			 //alert("Hi");
			 $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
	
			$.ajax({
				url:"{{ url('/getloandetails')}}",
				method:"POST",
				data:{loan_id:loan_id},
				dataType: 'JSON',
				success:function(data)
				{
					//alert(data);
				

					$('#loan_schedule_id').val(loan_id);
					$('#loan_tenor').val(data.loan_tenor);
					$('#collection_fee').html('('+data.collection_fee+')%');
					$('#collection_fee_amount').val(data.collection_fee_amount);
					$('#saving_component').val(data.saving_component);
					$('#interest_amount').val(data.interest_amount);
					$('#interest_rate').html('('+data.interest_rate+')%');
					$('#interest_rate2').val(data.interest_rate);
					$('#total_repayment').val(data.total_repayment);
					$('#true_bi_weekly_repayment').val(data.true_biweekly_repayment);
				
				},
				error: function(xhr, textStatus, errorThrown) {
				//code to execut
				   alert(xhr.responseText);
				   //alert(errorThrown);
				//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
				},
			});
			
		}
		
	
	});
	
	
	</script>


<script>

	$('#group_loan_amount').change(function(){
	
		var loan_id = $('#group_loan_amount').val();
		$('#group_loan_schedule_id').val(loan_id);
	
		//alert(loan_id);
	
		 if(loan_id != '')
		 {
			 //alert("Hi");
			 $.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
			});
	
			$.ajax({
				url:"{{ url('/getgrouploandetails')}}",
				method:"POST",
				data:{loan_id:loan_id},
				dataType: 'JSON',
				success:function(data)
				{
					//alert(data);
				

					
					$('#group_loan_tenor').val(data.loan_tenor);
					$('#group_initial_deposit').val(data.initial_deposit);
					$('#group_upfront_amount').val(data.upfront_amount);
					$('#group_saving_component').val(data.saving_component);
					$('#group_interest_amount').val(data.interest_amount);
					$('#group_interest_rate').html('('+data.interest_rate+')%');
					$('#group_interest_rate2').val(data.interest_rate);
					$('#group_total_repayment').val(data.total_repayment);
					$('#group_true_bi_weekly_repayment').val(data.true_biweekly_repayment);
				
				},
				error: function(xhr, textStatus, errorThrown) {
				//code to execut
				   alert(xhr.responseText);
				   //alert(errorThrown);
				//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
				},
			});
			
		}
		
	});
	
	
	</script>


	<script>

		    $('#loan_submit').click(function() {
			checked = $("input[type=checkbox]:checked").length;

			if(checked < 2) {
				alert("You must check at least 2 checkboxes.");
				return false;
			}

    });
	</script>



	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>


	<script>
		new Morris.Line({
		// ID of the element in which to draw the chart.
		element: 'line-example',
		// Chart data records -- each entry in this array corresponds to a point on
		// the chart.
		data: [
			{ year: '2008', value: 20 },
			{ year: '2009', value: 10 },
			{ year: '2010', value: 5 },
			{ year: '2011', value: 5 },
			{ year: '2012', value: 20 },
			{ year: '2013', value: 20 },
			{ year: '2014', value: 20 },
			{ year: '2015', value: 20 },
			{ year: '2016', value: 20 },
			{ year: '2017', value: 20 },
		],
		// The name of the data record attribute that contains x-values.
		xkey: 'year',
		// A list of names of data record attributes that contain y-values.
		ykeys: ['value'],
		// Labels for the ykeys -- will be displayed when you hover over the
		// chart.
		labels: ['Value']
		});
	</script>



<script>

$(".year").val(new Date().getFullYear());

</script>


<script>
	$('#state').change(function(){
			var state = $('#state').val();
			//alert(state);
			if(state != '')
			{
				$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
				});
				//alert("Hi");
				$.ajax({
					url:"{{ url('/getAllLGAs')}}",
					method:"POST",
					data:{state:state},
					success:function(data)
					{
						//alert(data);
						$('#lga').html(data);
					},
					error: function(xhr, textStatus, errorThrown) {
					//code to execute
						//alert(xhr.responseText);
					//$('#request-result2').html('Error occurred! Try again').delay(4000).fadeOut();
					},
				});
				
			}
			else
			{
				// $('#state').html('<option value="">Select State</option>');
				// $('#city').html('<option value="">Select City</option>');
			}
		});
</script>
  


</body>



</html>