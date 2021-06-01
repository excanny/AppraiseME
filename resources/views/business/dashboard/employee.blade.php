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
					<h4 class="box-title">Employee Details </h4>

                   <p> <span class="font-weight-bold">Employee ID:</span> {{$employee_details->employee_id}}</p>

                    <p><span class="font-weight-bold">Employee Name:</span> {{$employee_details->first_name . ' '. $employee_details->last_name}}</p>

                    <p><span class="font-weight-bold">Employee Department:</span> {{$department_name}}</p>

                    @php
                       
                       $count = count($department_kpis);

                    @endphp


                    <form action="{{url('/appraiseemployee') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="">Appraisal</label>
                    
                            </div>
                            <div class="col">
                                <label for="">Score (Scale of 1 to 10)</label>
                                <input type="hidden" name="employee_id" value={{$employee_details->employee_id}}>
                                <input type="hidden" name="">
                            </div>
                        </div>

                        <hr>

                     @foreach ($department_kpis as $kpi)
                        
                    
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <span class="mt-3"> {{App\Http\Controllers\BusinessController::getkpiname( $kpi->kpi_id)}}</span>
                                
                            </div>
                            <div class="col-md-2">
                                <input type="hidden" name="kpi_id[]" value=" {{ $kpi->kpi_id }}">
                                <input type="number" class="form-control float-left" name="score[]" min="1" max="10" placeholder="Enter score" required>
                            </div>

                            <div class="col-md-6">
                                <input type="text" class="form-control float-left" name="comment[]" min="1" max="10" placeholder="Enter comment">
                            </div>
                        </div>
<hr>

                        @endforeach

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary float-right">Submit</button>
                        </div>
                    </form>
				
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xl-6 col-12 -->
		</div>


        <div class="row small-spacing">
			
			<!-- /.col-xl-6 col-12 -->
			<div class="col-xl-12 col-12">
				<div class="box-content">
					<h4 class="box-title">Appraisal Score Details <span class="float-right"> </span></h4>


                        <div class="table-responsive table-purchases">
                            <table class="table table-striped margin-bottom-10">
                                <thead>
                                    <tr>
                                        <th>KPI</th>
                                        <th>Score</th>
                                        <th>Comment</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
    
                                    @foreach ($business_appraisals_for_employee as $kpi)
                                        <tr>
                                            <td>{{App\Http\Controllers\BusinessController::getkpiname( $kpi->kpi_id)}}</td>
                                            <td>{{ $kpi->score}}</td>
                                            <td >{{ $kpi->comment}}</td>
                                         
                                            <td width="20%">
                                              
                                                <form method="POST" action="<?php echo url('deleteemployeeappraisal/'. $kpi->id); ?>">
                                                    @csrf
                                                    <input type="hidden" name="employee_id" value="{{$employee_details->employee_id}}">
                                                    <button class="btn btn-danger btn-xs" type="submit" data-toggle="tooltip" data-placement="bottom" title="Delete" onclick="return confirm('Are you sure you want to delete this record?')">
                                                        <i class="fa fa-trash "></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>

                    
                   <p> <span class="float-right"> <span class="font-weight-bold"> Total Score:</span> {{$appraisal_sum_for_employee}} ({{$appraisal_score_percent}}%)</span></p>
				
				</div>
				<!-- /.box-content -->
			</div>
			<!-- /.col-xl-6 col-12 -->
		</div>
	
	</div>
	<!-- /.main-content -->


   