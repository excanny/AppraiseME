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
					<h4 class="box-title">Departments <a href="#" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#boostrapModal-1">Add New</a></h4>
					<!-- /.box-title -->
		
					<!-- /.dropdown js__dropdown -->
					<div class="table-responsive table-purchases">
						<table class="table table-striped margin-bottom-10">
							<thead>
								<tr>
									<th>Department Name</th>
									<th>Description</th>
                                    {{-- <th>Action</th> --}}
								</tr>
							</thead>
							<tbody>

                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ $department->name }}</td>
                                        <td>{{ $department->description}}</td>
                                        {{-- <td>
                                            <i class="fa fa-eye text-success"></i>
                                            <i class="fa fa-edit text-warning"></i>
                                            <i class="fa fa-trash text-danger"></i>
                                        </td> --}}
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
                    <h4 class="modal-title" id="myModalLabel">Department Details</h4>
                </div>
                <div class="modal-body">
                    <form action="/adddepartment" method="POST" id="form1">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <textarea class="form-control" name="description" required></textarea>
                                </div>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col">
                                
                                    <label for="exampleInputEmail1">Add Department KPI(s) <a href="/kpis" class="float-right">Add new KPI</a></label>
                                    <br>
                                    <select class="category form-control" name="department_kpi[]" multiple style="width: 100%" required>
                                        @foreach ($kpis as $kpi)
                                            <option value="{{$kpi->kpi_id}}">{{$kpi->name}}</option>
                                        @endforeach
                                    </select>
                                
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
