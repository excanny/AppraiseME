<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendToken;


class FrontEndController extends Controller
{
    public function register()
    {
      return view('front.register');
    }

    public function registeraction(Request $request)
    {
      
      $validatedData = $request->validate([
        'business_name' => 'required',
        'email' => 'email|required|unique:businesses',
        'password' => 'required|confirmed|min:6',
      ]);

        $business_id2 = preg_replace('/\s+/', '.', $request->business_name);

        $business_details = Business::where('business_id', strtolower($business_id2))->first();

        if(empty($business_details))
        {

            $business_id = strtolower($business_id2);

        }
        else
        {

            // //Business ID already exists. Add 4 to it
            $id = $business_details->id;
            $id2 = $id + 4;
            $business_id = $business_details->business_id . '.' . $id2;
            //echo $business_details['business_name'];

        }


        $token2 = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token2);

        $business = Business::create([
            'business_id' =>  $business_id,
            'business_name' =>  $request->business_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => $token,
        ]);

      
        if($business)
        {  
        
            Session::flash('success', 'Your registration was successful. Kindly check the verification link sent to your email to login.');
            return redirect('/business-dashboard');

        }
        else
        {
            Session::flash('error', 'Error occured! Try again.');
            return redirect('/register');
        }

    }

    public function login()
    {
      return view('front.login');
    }

    public function loginaction(Request $request)
    {
  
     
        $validatedData = $request->validate([
          'email' => 'required|email',
          'password' => 'required',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::guard('business')->attempt($credentials)) 
        {
      
            $business_details = Business::where('email', '=', $request->email)->first();
              // var_dump($user_details);

            $request->session()->put('email', $business_details->email);
            $request->session()->put('business_name', $business_details->business_name);
            
            return redirect('/business-dashboard');
        
        } 
        else
        {
            Session::flash('error', 'Email/Password wrong combination');
            return redirect('/login');
        }

      }

      public function employeelogin()
      {
        return view('front.employeelogin');
      }

      public function employeeloginaction(Request $request)
      {
    
      
          $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
          ]);


          $credentials = $request->only('email', 'password');

          if (Auth::guard('employee')->attempt($credentials)) 
          {
        
              $employee_details = Employee::where('email', '=', $request->email)->first();
                // var_dump($user_details);

              // $request->session()->put('email', $employee_details->email);
              // $request->session()->put('first_name', $employee_details->first_name);
              // $request->session()->put('employee_id', $employee_details->employee_id);

              Session::put('first_name', $employee_details->first_name);
              Session::put('employee_id', $employee_details->employee_id);
            
              
              return redirect('/employee-dashboard');
          
          } 
          else
          {
              Session::flash('error', 'Email/Password wrong combination');
              return redirect('/employee/login');
          }
        
      }

     

}
