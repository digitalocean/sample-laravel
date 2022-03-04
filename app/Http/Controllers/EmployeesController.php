<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Exam;
use DB;

class EmployeesController extends Controller
{
    public function index(){
        $employees = DB::table('exam')->get();

        return view('employees.index')->with('employees',$employees);
     }
     
  
     /*
     AJAX request
     */
     public function getEmployees(Request $request){
  
        $search = $request->search;
  
        if($search == ''){
           $employees = Exam::orderby('realcode','asc')->select('realcode','examtitle','examcode')->limit(20)->get();
        }else{
           $employees = Exam::orderby('realcode','asc')->select('realcode','examtitle','examcode')->where('examtitle', 'like', '%' .$search . '%')->limit(20)->get();
        }
      
        $response = array();

        foreach($employees as $employee){
           $response[] = array("value"=>$employee->realcode,"label"=>$employee->examtitle,'examcode'=>$employee->examtitle);
        }
  
        echo json_encode($response);
        exit;
     }
     public function employees2(){
        $employees = DB::table('exam')->get();
        return redirect()->back()->with('employees',$employees);
         }

}
