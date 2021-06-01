@extends('layouts.master')

@section('content')


<!-- /#message-popup -->


	<div class="main-content">	

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

		<div class="row small-spacing">
			
			<!-- /.col-xl-6 col-12 -->
			<div class="col-xl-12 col-12">
				<div class="box-content">
					<h4 class="box-title">Employees <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#boostrapModal-1">Add New</a></h4>
					<!-- /.box-title -->
		
					<!-- /.dropdown js__dropdown -->
					<div class="table-responsive table-purchases">
						<table class="table table-striped margin-bottom-10">
							<thead>
								<tr>
									<th>Full Name</th>
									
									<th>Department</th>
									<th>Email</th>
									<th>Password</th>
                                    <th>Action</th>
								</tr>
							</thead>
							<tbody>

                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->first_name . ' '. $employee->last_name }}</td>
                                        <td>{{ $employee->department}}</td>
                                        <td >{{ $employee->email}}</td>
                                        <td >{{ $employee->hash}}</td>
                                        <td>
                                            <a href="{{ url('employee/'. $employee->employee_id)}}"  data-toggle="tooltip" data-placement="bottom" title="View">
                                                <i class="fa fa-eye fa-lg text-success"></i>
                                            </a>

                                            {{-- <i class="fa fa-eye text-success"></i>
                                            <i class="fa fa-edit text-warning"></i>
                                            <i class="fa fa-trash text-danger"></i> --}}

                                            {{-- <form method="POST" action="">
                                                @csrf
                                                <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this record?')">
                                                    <i class="fa fa-trash "></i>
                                                </button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
							</tbody>
						</table>
						<!-- /.table -->
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xl-6 col-12 -->
		</div>
	
	</div>
	<!-- /.main-content -->


    <div class="modal fade" id="boostrapModal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Employee Details</h4>
                </div>
                <div class="modal-body">
                    <form action="/addemployee" method="POST" id="form1">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">First Name</label>
                                    <input type="text" class="form-control" name="first_name" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>
                            <div class="col">
                                <label for="exampleInputEmail1">Department</label>
                                    <div class="form-group">
                                        <select class="form-control" name="department_id" required>
                                            <option value="">Select one</option>
                                            @foreach ($departments as $department)
                                                    <option value="{{$department->department_id}}">{{$department->name}}</option>
                                             @endforeach
                                        </select>
                                    </div>
                            </div>
                        </div>
                      
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-default btn-sm waves-effect waves-light" form="form1" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" form="form1">Save</button>
                </div>
            </div>
        </div>
    </div>
