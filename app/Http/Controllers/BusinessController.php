<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendToken;
use App\Models\Employee;
use App\Models\Department;
use App\Models\DepartmentalKPI;
use App\Models\BusinessAppraisal;
use App\Models\KPI;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AppraisalExport;

class BusinessController extends Controller
{
    public function dashboard()
    {
        return view('business.dashboard.index');
    }

    public function employees()
    {
        $employees = Employee::orderBy('first_name','asc')->get();
        $departments = Department::orderBy('name','asc')->get();
        return view('business.dashboard.employees', compact('employees', 'departments'));
    }

    public function employee($id)
    {
        $employee_details = Employee::where('employee_id', $id)->first();
        $department_name2 = Department::where('department_id', $employee_details->department_id)->first();
        $department_name = $department_name2->name;
        $department_kpis = DepartmentalKPI::where('department_id', $employee_details->department_id)->get();
        $business_appraisals_for_employee = BusinessAppraisal::where('employee_id', $id)->get();
        $appraisal_sum_for_employee = BusinessAppraisal::where('employee_id', $id)->sum('score');
        $appraisal_count_for_employee = BusinessAppraisal::where('employee_id', $id)->count();
        if($appraisal_count_for_employee > 0)
        {
            $appraisal_score_percent = ($appraisal_sum_for_employee/($appraisal_count_for_employee * 10)) * 100;
        }
        else
        {
            $appraisal_score_percent = 0;
        }
       
        //return $appraisal_score;
        return view('business.dashboard.employee', compact('employee_details', 'department_name', 'department_kpis', 'business_appraisals_for_employee', 'appraisal_sum_for_employee', 'appraisal_score_percent'));
    }

    public function addemployee(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email|required|unique:employees',
            'department_id' => 'required',
            
            ]);

        $token2 = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token2);
        $email = $request->email;

        $employee = new Employee;
        $employee->employee_id = 'EMP'.time();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $email;
        $employee->password = Hash::make($token);
        $employee->hash = $token;
        $employee->department_id = $request->department_id;
        $inserted = $employee->save();

        if($inserted > 0)
        {  
        
            Session::flash('success', 'Employee created successfully.');
            return redirect('/employees');

            $details = [
                            'title' => 'Mail from AppraiseMe',
                            'body' => 'Username: 12345667',
                        ];
                    
            Mail::to($email)->send(new SendPassword($details));

        }
        else
        {
            Session::flash('error', 'Error occured! Try again.');
            return redirect('/employees');
        }
    }

    public function departments()
    {
        $departments = Department::orderBy('name','asc')->get();
        $kpis = KPI::orderBy('name','asc')->get();
        return view('business.dashboard.departments', compact('departments', 'kpis'));
    }

    public function adddepartment(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:departments',
            'description' => 'required',
            
            ]);

        $token2 = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token2);

         

            $result = DB::transaction(function() use ($request)
            {
                $department_id = 'DEP'.time();
               
                $department = new Department;
                $department->department_id = $department_id;
                $department->name = $request->name;
                $department->description = $request->description;
                $inserted = $department->save();


                for($i=0; $i<count($request->department_kpi); $i++)
                {
                   
                    $data[]=array(
                        'department_id' => $department_id,
                        'kpi_id' => $request->department_kpi[$i],
                        'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                        'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    );
                }

                return DepartmentalKPI::insert($data);

            });


        //var_dump($result);


            if($result)
            {  
            
                Session::flash('success', 'Department created successfully.');
                return redirect('/departments');

            }
            else
            {
                Session::flash('error', 'Error occured! Try again.');
                return redirect('/departments');
            }
    }

    public function kpis()
    {
        $kpis = KPI::orderBy('name','asc')->get();
        return view('business.dashboard.kpis', compact('kpis'));
    }

    public function addkpi(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:kpis',
            'description' => 'required',
            
            ]);


        $kpi = new KPI;
        $kpi->kpi_id = 'KPI'.time();
        $kpi->name = $request->name;
        $kpi->description = $request->description;
        $inserted = $kpi->save();

        if($inserted > 0)
        {  
        
            Session::flash('success', 'KPI created successfully.');
            return redirect('/kpis');

        }
        else
        {
            Session::flash('error', 'Error occured! Try again.');
            return redirect('/kpis');
        }
    }


    public function appraiseemployee(Request $request)
    {
        //var_dump($request->all());
       
        $validatedData = $request->validate([
            'employee_id' => 'required',
            'kpi_id' => 'required',
            'score' => 'required',
        ]);

        for($i=0; $i<count($request->score); $i++)
        {
            $appraisal_id = 'APR'.time();

            $data[]=array(
                'appraisal_id' => $appraisal_id,
                'employee_id' => $request->employee_id,
                'kpi_id' => $request->kpi_id[$i],
                'score' => $request->score[$i],
                'comment' => $request->comment[$i],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),

            );
        }

        //var_dump($data);

         $inserted = BusinessAppraisal::insert($data);


        if($inserted > 0)
        {  
        
            Session::flash('success', 'Appraisal created successfully.');
            return redirect('/employees');

        }
        else
        {
            Session::flash('error', 'Error occured! Try again.');
            return redirect('/employees');
        }

    }

    public function deleteemployeeappraisal(Request $request, $id)
    {
        //var_dump($request->all());

        $employee_id = $request->employee_id;

        $deleted = BusinessAppraisal::where('id', $id)->delete();

        if($deleted > 0)
        {  
            
            Session::flash('success', 'Appraisal deleted successfully.');
            return redirect('employee/'.$employee_id);
        }
        else
        {
            Session::flash('error', 'Error occured! Try again.');
            return redirect('employee/'.$employee_id);
        }

    }

    public static function getkpiname($id) 
    {
        $kpi = KPI::where('kpi_id', $id)->first();
        echo $kpi->name;
    }


    public function export() 
    {
        return Excel::download(new AppraisalExport, 'appraisal.xlsx');
    }

    public function logout()
    {
     
        Auth::logout();     
        
        return redirect('/login');
    }

}
