<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Student;
use App\Mail\StudentExam;
use Illuminate\Support\Facades\Auth;
use DB;

class ExamController extends Controller
{
    public function sendExam(){
        $student = Student::find(1);
       // Mail::to($student->email)->send(new StudentExam($student));
       // Mail::to('seralkhatem123@gmail.com')->send(new StudentExam($student));
       // Mail::to('info@acpaglobal.net')->send(new StudentExam($student));
        echo 'send Exam Successfully';

    }
    public function userresults(){
        $id = Auth::user()->id;
        $result= DB::table('result')->where('student_id', $id)->get();
        $ref_result= DB::table('ref_result')->where('student_id', $id)->get();
        return view('exams.userresults' , compact ('result', 'ref_result'));

    }
    public function userresults1($exid){
        $ref_id = $exid;
        $id = Auth::user()->id;
        $result= DB::table('result')->where('attempno',$ref_id)->get();
        $ref_result= DB::table('ref_result')->where('student_id', $id)->get();
        return view('exams.userresults1' , compact ('result', 'ref_result','exid'));

    }

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $created_yr = Carbon::parse(Auth::user()->created_at)->format('Y');
          $created_d = Carbon::parse(Auth::user()->created_at)->format('d');
          $created_m = Carbon::parse(Auth::user()->created_at)->format('m');

          $validity_yr = Carbon::parse(Auth::user()->validity)->format('Y');
          $validity_d = Carbon::parse(Auth::user()->validity)->format('d');
          $validity_m = Carbon::parse(Auth::user()->validity)->format('m');

          $created_dt = Carbon::create($created_yr, $created_m, $created_d, 0, 0, 0);
          $validity_dt = Carbon::create($validity_yr, $validity_m, $validity_d, 0, 0, 0);
          
      //    $question = DB::table('users')->where('examcode',$id) //where('admin_id',Auth::user()->id && 'examcode',$id);
          //    ->limit(500)
      //        ->get();
       //   $exam = DB::table('exam')->get();
       $data = [
            'publish'  => 'Publish',
            'admin_id' => Auth::user()->admin_id
   //         'examtitle'   => 'SSC 2'
        ];

        $exam = DB::table('exam')->where($data)->whereIn('category', json_decode(Auth::user()->category))->get();
      
        if($created_dt->diffInDays($validity_dt, false) > 0 && Auth::user()->validity != null) {
            return view('home',compact('exam'));
        }
        else{
            return redirect('/order');
        }
     
    }

    public function ResultList()
    {
    
        $result = DB::table('ref_result')
        ->Join('exam', 'ref_result.examcode', '=', 'exam.examcode')
        ->select('ref_result.*', 'exam.*')
        ->where('ref_result.student_id', '=', Auth::user()->student_id)
        ->get();
     
        return view('Resultlist',compact('result'));
    }


    public function Updateresultlist(Request $req){
        $data = [
    //        'publish'  => 'Publish',
            'ref_result.student_id' => Auth::user()->student_id,
            'category'   => $req->val
        ];

        $result = DB::table('ref_result')
        ->Join('exam', 'ref_result.examcode', '=', 'exam.examcode')
        ->select('ref_result.*', 'exam.*')
        ->where($data)
        ->get();
        return response()->json(array('exam' => $result)); 
    }


    public function Get_Single_Result(Request $req){
        
        $result = DB::table('result')
        ->join('exam_question', 'result.ques_id', '=', 'exam_question.id')
        ->join('users', 'users.student_id', '=', 'result.student_id')
        ->join('ref_result', 'ref_result.id', '=', 'result.attempno')
        ->select('result.student_id' , 'users.name' ,'result.givenmarks', 'exam_question.subject','result.attempno')->limit(10)
        ->where(['exam_question.examcode'  => $req->examcode])//->sum('result.givenmarks');
        ->get();

        $cat = DB::table('exam_subject')->where('examcode',$req->examcode)->get();

        return response()->json(array('result' => $result, 'cat' => $cat)); 
    }

    public function Get_Detail_Result(Request $req){
        
        $question = DB::table('exam_question')
        ->where(['examcode'  => $req->examcode])//->sum('result.givenmarks');
        ->get();

        $result = DB::table('exam_question')
        ->leftJoin('result', 'result.ques_id', '=', 'exam_question.id')
        ->join('ref_result', 'ref_result.id', '=', 'result.attempno')
        ->select('result.*')
        ->where(['exam_question.examcode' => $req->examcode , 'result.student_id' => Auth::user()->student_id ])
        ->get();
       
        return response()->json(array('result' => $result, 'question' => $question)); 
    }

    public function Updateexamlist(Request $req){
        $data = [
            'publish'  => 'Publish',
            'admin_id' => Auth::user()->admin_id,
            'category'   => $req->val
        ];

        $exam = DB::table('exam')->where($data)->get();
    //    dump($exam);
    //    return response()->json($exam); 
        return response()->json(array('exam' => $exam)); 
     //   dump($req);
    }
     public function Adduserresponse(Request $req) {
        $id = Auth::user()->student_id;
     /*   $auctions = Auctions::selectRaw('max(price) as price')
        ->where('user_id', $id)
         ->get();*/

        //$attempno = Result::selectRaw('max(attempno) as attempno')->where('student_id',$id)->get();
        $attempno = DB::table('result')->max('attempno');
        $newattempno =  $attempno +1;
        $newattempno = DB::table('ref_result')->where('student_id',$id)->max('id');

        $data = [
             'id'  => $req->ques_id,
            'student_id' => Auth::user()->student_id,
        ];
        $result = new Result;
        $result->ques_id = $req->ques_id;
        $result->student_id = $id;
        $result->selected_option = $req->selected_option;
        $result->givenmarks = $req->givenmarks;
        $result->attempno = $newattempno;
        $result->save();
        /*
        $result = result::updateOrCreate(
            ['ques_id' => $req->ques_id, 'student_id' => Auth::user()->student_id],
            ['selected_option' => $req->selected_option, 'givenmarks' => $req->givenmarks, 'attempno'=> $newattempno 
            ]
        );*/
       
        return response()->json($result);
    }

    public function AttemptNewExam(Request $req){
        
        $ref_result = new ref_result;

     /*   $ref_result = ref_result::updateOrCreate(
            ['student_id' => Auth::user()->student_id, 'examcode' => $req->examcode]
        );*/
        $ref_result->student_id = Auth::user()->student_id;
        $ref_result->examcode = $req->examcode;
        $ref_result->save();
        return response()->json($ref_result);
    }
    public function startexam($id, $title, $tname, $cat, $time) {

        $data = [
            //'admin_id' => Auth::user()->admin_id,
            'examcode'   => $id
        ];
        $data1 = [
           // 'owner_id' => Auth::user()->admin_id,
            'examcode'   => $id
        ];

        $subject = DB::table('exam_subject')->where($data)->get();
        if($id == 66){
            $question = DB::table('exam_question')->inRandomOrder()->where($data1)->limit(10)->get();
        }else{
            $question = DB::table('exam_question')->inRandomOrder()->where($data1)->limit(40)->get();
        }
    
    //    $question = response()->json(array('question' => $exam)); 
        return view('Startexam',compact('question','subject','time','id'));
    }

    public function thankyou(request $request){
        
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/'.$request->payment_request_id.'/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:XXXXXXXXXXXXXXXXXXXXXXXXXXXX",
                        "X-Auth-Token:XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX"));
        $response = curl_exec($ch);
        curl_close($ch); 
        $data =  json_decode($response, true);

        if($data['success']) 
        {
            $carbon = new Carbon(); 
            $carbon = $carbon->addYears(1);
            $student = Student::find(Auth::user()->id);
            $student->fee = $data['payment_request']['amount'];
            $student->validity = $carbon->toDateTimeString();
            $student->payment_request_id = $request->payment_request_id;
            $student->save();
        } 
            

        dump($data);
        return view('payment/thankyou',compact('data'));
       // return $request->payment_id;
    }
    public function Order(){
//////-------------------------------Elsirrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr------------------------

          $created_yr = Carbon::parse(Auth::user()->created_at)->format('Y');
          $created_d = Carbon::parse(Auth::user()->created_at)->format('d');
          $created_m = Carbon::parse(Auth::user()->created_at)->format('m');

          $validity_yr = Carbon::parse(Auth::user()->validity)->format('Y');
          $validity_d = Carbon::parse(Auth::user()->validity)->format('d');
          $validity_m = Carbon::parse(Auth::user()->validity)->format('m');

          $created_dt = Carbon::create($created_yr, $created_m, $created_d, 0, 0, 0);
          $validity_dt = Carbon::create($validity_yr, $validity_m, $validity_d, 0, 0, 0);
          
      //    $question = DB::table('users')->where('examcode',$id) //where('admin_id',Auth::user()->id && 'examcode',$id);
          //    ->limit(500)
      //        ->get();
       //   $exam = DB::table('exam')->get();
       $data = [
            'publish'  => 'Publish',
            'admin_id' => Auth::user()->admin_id
   //         'examtitle'   => 'SSC 2'
        ];

        $exam = DB::table('exam')->where($data)->whereIn('category', json_decode(Auth::user()->category))->get();
//////-------------------------------Elsirrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr------------------------

        $admin = DB::table('admins')->where('id',Auth::user()->admin_id)->get();
     //  dump($admin);
        $prd_name = "Test Series";
        $price = $admin[0]->student_fee;
    
        if($price == NULL) {
            $price = 23;
        }
        // Price calculation with tax and fee
        $fee = 3 +($price*.02);
        $tax = 0;
        $prd_price = $fee + $tax + $price;	
        //return view('payment/order',compact('admin','prd_name','price','fee','tax', 'prd_price'));
        return view('home',compact('exam'));
    }
    /*
    public function pay(){
        $admin = DB::table('admins')->where('id',Auth::user()->admin_id)->get();
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
                    array("X-Api-Key:XXXXXXXXXXXXXXXXXXXXXXXXXXXX",
                          "X-Auth-Token:XXXXXXXXXXXXXXXXXXXXXXXXXXXX"));

         $price = $admin[0]->student_fee;
    
        // Price calculation with tax and fee
        $fee = 3 +($price*.02);
        $tax = 0;
        $prd_price = $fee + $tax + $price;

        $payload = Array(
            'purpose' => 'Test Series',
            'amount' => $prd_price,
            'phone' => Auth::user()->contact,
            'buyer_name' => Auth::user()->name,
            'redirect_url' => url('/payment/thankyou'),
            'send_email' => true,
            'webhook' => url('/payment/webhook/'),
            'send_sms' => true,
            'email' => 'sunny6142@gmail.com',
            'allow_repeated_payments' => false
        );
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
        $response = curl_exec($ch);
        curl_close($ch); 
        
        $data =  json_decode($response, true);
        //dump($data['payment_request']['longurl']);
        if($data['payment_request']['longurl'] != null)
            return redirect($data['payment_request']['longurl']);
        else{
            dump("Internet Connection Not Found!!");
        }
    }
*/
    public function Logout(){

        $admin_id = Auth::user()->admin_id;

        auth()->logout();
    
        session()->flash('message', 'goodbye');
    
        if($admin_id) 
        return redirect('/StudentLogin/'.$admin_id);
        return redirect('/login');
    }
}
