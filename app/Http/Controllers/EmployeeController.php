<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\DepartmentalKPI;
use App\Models\EmployeeAppraisal;
use Illuminate\Support\Facades\Session;
use Auth;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('employee.dashboard.index');
    }

    public function employeeappraisal()
    {
        $employee_details = Employee::where('employee_id',Session::get('employee_id'))->first();
        //return  $employee_details;
        $department_name2 = Department::where('department_id', $employee_details->department_id)->first();
        $department_name = $department_name2->name;
        $department_kpis = DepartmentalKPI::where('department_id', $employee_details->department_id)->get();
        return view('employee.dashboard.appraisal', compact('employee_details', 'department_kpis', 'department_name'));
    }

    public function selfappraisalaction(Request $request)
    {

        if($request->hasfile('support_docs')) 
        {

            $support_docs = $request->file('support_docs');

            $data = [];
            $i = 0;
            foreach($support_docs as $image)
            {
        
                $doc_name = time().uniqid().'.'.$image->extension();
                //$image->storeAs('supportdocs', $doc_name, 'public');
                $image->move(public_path('supportdocs'), $doc_name);


                $data[] = [
                    // 'appraisal_id' => $appraisal_id,
                    'employee_id' => $request->employee_id,
                    'kpi_id' => $request->kpi_id[$i],
                    'score' => $request->score[$i],
                    'support_doc_name' =>  $doc_name,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ];

                $i++;
            }

            //var_dump($data);

            $inserted = EmployeeAppraisal::insert($data);


            if($inserted > 0)
            {  
            
                Session::flash('success', 'Self Appraisal and Support Docs submitted successfully.');
                return redirect('/employee-appraisal');
    
            }
            else
            {
                Session::flash('error', 'Error occured! Try again.');
                return redirect('/employee-appraisal');
            }
        }
        else
        {
            $data2 = [];
            $i = 0;
            foreach($request->score as $score)
            {


                $data2[] = [
                    // 'appraisal_id' => $appraisal_id,
                    'employee_id' => $request->employee_id,
                    'kpi_id' => $request->kpi_id[$i],
                    'score' => $request->score[$i],
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                ];

                $i++;
            }

            //var_dump($data2);

            $inserted = EmployeeAppraisal::insert($data2);

            if($inserted > 0)
            {  
            
                Session::flash('success', 'Self Appraisal submitted successfully.');
                return redirect('/employee-appraisal');
    
            }
            else
            {
                Session::flash('error', 'Error occured! Try again.');
                return redirect('/employee-appraisal');
            }
        }
    }

    public function logout()
    {
     
        Auth::logout();     
        
        return redirect('/employee/login');
    }
}
