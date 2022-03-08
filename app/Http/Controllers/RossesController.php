<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use Image;
use PDF;
use DB;
use Mail;
use App\User;
use App\Ref_result;
use App\Result;
use App\Phone;
use App\Email;
use App\Admin;
use App\Student;
use App\Payment;
use App\Subject;
use App\Invoice;
use App\Scorecard;
use App\Proctordate;
use App\Mail\SendMailable2;
use App\Mail\SendBooking;
use App\Mail\SendInvoice;
use App\Mail\SendPayment;
use App\Mail\ExamResult;
use App\Mail\SendExemptExam;

use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RossesController extends Controller
{
    public function __construct(){
       // $this->middleware('auth:admin');
       $this->middleware('auth');
    }
 /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function openexam(Request $request,$id){
        $proctordate =  DB::table('proctordate')->where('id',$id)->first();
        $student_id = $proctordate->user_id;
        $usr = DB::table('users')->where('student_id',$proctordate->user_id)->first();
        $ref_result = DB::table('ref_result')->where('student_id',$student_id)->where('proctor_id',$id)->first();
        $count_results = DB::table('result')->where('attempno',$ref_result->id)->where('givenmarks', Null)->count();
if($count_results < 1 ){
    $ref_results1 = DB::table('ref_result')->where('student_id',$student_id)->where('proctor_id',$id)->first();

    $attempno = $ref_results1->id;

    $ref_result = DB::table('ref_result')->where('id',$attempno)->first();
    $attemp = DB::table('ref_result')->where('id',$attempno)->first();
    $id = $ref_result->id;        
    $examcode = $ref_result->examcode;
    $memberid= Auth::user()->student_id;
    $today = date('Y-m-d');
    $NewDate=Date('Y-m-d', strtotime('-13 days'));
    $pro =  DB::table('proctordate')->get();
       DB::table('proctordate')->where('subject_id',$examcode)
        ->where('procrordate',$today)->where('user_id',$memberid)->update(['procrordate'=> $NewDate]);

    DB::table('proctordate')->where('subject_id',$examcode)->where('procrordate',$today)->where('user_id',$memberid)->update(['open'=> 2]);
    DB::table('ref_result')->where('id',$attempno)->update(['pass'=> 'In progress']);
    DB::table('proctordate')->where('id',$attemp->proctor_id)->update(['open'=> 0]);


    $id =  $ref_results1->id;
    $timeing = $request->timeing;
    $selected_option = $request->selected_option;
    $attempno =  $ref_results1->id;
    $lastresult=  $ref_results1->id;
    $count = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->count();
    if($count < 1){
        DB::table('ref_result')->where('id',$attempno)->update(['pass'=> 'In progress']);

       // $attempno = $request->attempno;
        $id4 =  $ref_results1->id;
        $result = DB::table('result')->where('attempno',$id4)->first();
        $ref_result = DB::table('ref_result')->where('id',$attempno)->first();

        $attempno =  $ref_results1->id;
            $id = $ref_result->id;        
            $id4 = $ref_result->examcode;

        $lastresult = DB::table('ref_result')->where('id',$id)->first();
        $memberid=$lastresult->student_id;
        $member1 = DB::table('users')->where('student_id',$memberid)->first();
        $examcode = $ref_result->examcode;
        $exam = DB::table('exam')->where('examcode',$examcode)->first();
        $resultq = DB::table('result')->where('attempno',$id)->get();
        $exam_question = DB::table('exam_question')->where('examcode',$id4)->first();
        $tot_mark = 0;
        $tot_correct=0;
    
        //DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
        $today = date('Y-m-d');
          $pro =  DB::table('proctordate')->get();
             DB::table('proctordate')->where('subject_id',$id4)
          ->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);
      
           if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
           $result = Ref_result::find($id);
           foreach($resultq as $res_q){
               $tot_mark =  $res_q->givenmarks+$tot_mark;
    
               } 
               if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
                $tot_correct = $tot_mark/$totQ;
           //$lastresult =  DB::table('ref_result')->where('id',$id)->first();
           //$lastresult['tot_mark'] = $tot_mark;
    
    
           $member = array(
               'name' => $member1->name,
               'phone' => $member1->phone,
               'email' => $member1->email,
               'totQ' => $totQ,
               'examname' => $exam->examtitle,
               'tot_mark' => $tot_mark,
               'tot_correct' => $tot_correct,
               'attempno' => $attempno,
               
           );
    if($lastresult->mailing == 0){  $email = $member1->email;
            //Mail::to($($email)->send(new ExamResult($lastresult));
           // //Mail::to($('seralkhatem123@gmail.com')->send(new ExamResult($lastresult));
            //Mail::to($('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
            //Mail::to($('info@acpaglobal.net')->send(new ExamResult($lastresult));
           DB::table('ref_result')->where('id',$id)->update(['mailing' => 1,'pass' => $status ]);
    
       }
    //--------------------------------------------CALCULATE LEVEL STARTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    $student_id=$lastresult->student_id;
    $GAT = 0;$AAT = 0;$ACPA = 0;$ACCEA = 0;$ACA = 0; $FCPA = 0;$FCCEA = 0;$gat_count = 0;$aat_count = 0;$acpa_count = 0;$accea_count = 0;$fcpa_count = 0;$fccea_count = 0;
    $pass = 'Pass';$Exempt = 'Exempt';   $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
    //FCPA----------------------------------------------------------LEVEL 1 FCPA------------------------------------------------------------
    foreach($exams as $exam){ $ref_result = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', $exam->examcode], ['student_id', '=', $student_id],])->count();
    if($exam->examcode<5){if($ref_result> 0){ $GAT = $GAT+1;  }}}
    //FCPA-----------------------------------------------------------LEVEL 2 FCPA-------------------------------------------------FCPA-------------------------------------------------FCPA-------------------------------------------------------
    foreach($exams as $exam){$ref_result = DB::table('ref_result')->where([['pass', '<>', 'Fail'],  ['examcode', '=', $exam->examcode],['student_id', '=', $student_id],])->count();
    if(($exam->examcode>4) and ($exam->examcode<9)){if($ref_result> 0){$AAT = $AAT+1; }}}
    //FCPA-----------------------------------------------------------LEVEL 3 FCPA-------------------------------------------------FCPA-------------------------------------------------FCPA-------------------------------------------------------
    foreach($exams as $exam){$ref_result = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', $exam->examcode],['student_id', '=', $student_id],])->count();
       if(($exam->examcode>8) && ($exam->examcode<13)){if($ref_result> 0){ $ACPA = $ACPA+1;  } }}
    //********************************************************EXAm NO 9*********************************************************** */
    $ref_result9 = DB::table('ref_result')->where([ ['pass', '<>', 'Fail'], ['examcode', '=', 9], ['student_id', '=', $student_id],])->count(); if($ref_result9>0){  $ACCEA = $ACCEA+1;}
    //FCPA-----------------------------------------------------------LEVEL 4 FCPA-------------------------------------------------FCPA-------------------------------------------------FCPA-------------------------------------------------------
    foreach($exams as $exam){$ref_result = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', $exam->examcode],['student_id', '=', $student_id],])->count();
    if(($exam->examcode>9) && ($exam->examcode>12) and ($exam->examcode<16)){  if($ref_result> 0) { $ACCEA = $ACCEA+1;  }  } }
    //FCPA-----------------------------------------------------------LEVEL 5 FCPA-------------------------------------------------FCPA-------------------------------------------------FCPA-------------------------------------------------------
    foreach($exams as $exam){$ref_result = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', $exam->examcode],    ['student_id', '=', $student_id],])->count();
    if(($exam->examcode>15) and ($exam->examcode<19)){if($ref_result> 0){$ACA = $ACA+1; }}}
    //******************************************************************************************************************* */
    /**/if(($ACA >= 3)and($ACPA >= 4)){$FCPA = 4; }else{$FCPA = 3; }
    if(($ACA >= 3)and($ACCEA >= 4)){$FCCEA = 4; }else{$FCCEA = 3; }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($GAT < 4){ DB::table('memberlevel')->where([['student_id',$student_id],['levelname','GAT']])->delete();
    }else{ if($GAT >= 4){  $gat_count=DB::table('memberlevel')->where([['student_id',$student_id],['levelname','GAT']])->count();
           if($gat_count == 0){  DB::table('memberlevel')->insert(['levelname' => 'GAT', 'student_id' => $student_id,] ); }  }   } 
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($AAT < 4){ DB::table('memberlevel')->where([['student_id',$student_id],['levelname','AAT']])->delete();
           }else{ if($AAT >= 4){  $aat_count=DB::table('memberlevel')->where([['student_id',$student_id],['levelname','AAT']])->count();
                   if($aat_count == 0){  DB::table('memberlevel')->insert(['levelname' => 'AAT', 'student_id' => $student_id,] );}}}  
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($ACPA < 4){ DB::table('memberlevel')->where([['student_id',$student_id],['levelname','ACPA']])->delete();
           }else{ if($ACPA >= 4){  $acpa_count=DB::table('memberlevel')->where([['student_id',$student_id],['levelname','ACPA']])->count();
                   if($acpa_count == 0){  DB::table('memberlevel')->insert(['levelname' => 'ACPA', 'student_id' => $student_id,]);}}} 
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($ACCEA < 4){ DB::table('memberlevel')->where([['student_id',$student_id],['levelname','ACCEA']])->delete();
    }else{ if($ACCEA >= 4){  $accea_count=DB::table('memberlevel')->where([['student_id',$student_id],['levelname','ACCEA']])->count();
           if($accea_count == 0){  DB::table('memberlevel')->insert(['levelname' => 'ACCEA', 'student_id' => $student_id,]);}}} 
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($ACA<3){  DB::table('memberlevel')->where([['student_id',$student_id],['levelname','FCCEA']])->delete();}
    else{  $fccea_count=DB::table('memberlevel')->where([['student_id',$student_id],['levelname','FCCEA']])->count();
           if($fccea_count==0){DB::table('memberlevel')->insert(['levelname' => 'FCCEA', 'student_id' => $student_id,] ); } }
    /////////FCPA-------------------------------------------------FCPA------------------------------------------------------------------
    if($ACA<3){  DB::table('memberlevel')->where([['student_id',$student_id],['levelname','FCPA']])->delete();
    }else{  $fcpa_count=DB::table('memberlevel')->where([['student_id',$student_id],['levelname','FCPA']])->count(); 
       if($fcpa_count==0){DB::table('memberlevel')->insert(['levelname' => 'FCPA', 'student_id' => $student_id,] ); } }
    //--------------------------------------------CALCULATE LEVEL FINISH CALCULATE LEVELLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
  
          
    $ref_result = DB::table('ref_result')->where('id',$attempno)->first();
    $s_id1= Auth::user()->student_id;
    $s_id2 = $ref_result->student_id;
    if($s_id1 != $s_id2){
        return redirect('/');
    }
    return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult'));
    
    }


}

            //return $id.'<br>'.$ref_result->id;
        $Today=date('Y-m-d');
        DB::table('proctordate')
            ->where('id', $id)
            ->update(['procrordate' => $Today,'open' => 1]);
            DB::table('proctordate')
            ->where('id', $id)
            ->update(['procrordate' => $Today,'open' => 1]);
            DB::table('ref_result')->where('id', $ref_result->id)->update(['pass' => 'Open']);
            $pro_date=DB::table('proctordate')->where('id', $id)->first();
            $q = $proctordate->user_id;
            $id =$proctordate->user_id;
            $user = DB::table('users')->where('student_id',$student_id)->first();
            $accounts = DB::table('users')->where('student_id',$student_id)->first();
            $id1 = $user->student_id;
         return view('ross.proctorq1')->with('pro_date',$pro_date)->with('user',$user)->with('id',$id)->with('id1',$id1)->with('accounts',$accounts)->with('usr',$usr);
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    /*public function printPDF()
    {
      // This  $data array will be passed to our PDF blade
        $data = [ 'title' => 'First PDF for Medium', 'heading' => 'Hello from 99Points.info',
        'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took
        a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
         but also the leap into electronic typesetting, remaining essentially unchanged.'
        ];

        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('medium.pdf');
    }*/


    public function ross(){
        return view('ross.ross');
    }
    public function proctor(){
        $users = User::all();
        return view('ross.proctor')->with('users', $users);
    }
    public function profiles(){
        $users = User::all();
        $members = DB::table('users')->where('is_admin',2)->orderBy('student_id', 'DESC')->get();
        return view('ross.profiles',compact('members','users'));
    }
    public function registerations(){
        $users = User::all()->where('is_admin',0);
        return view('ross.registerations')->with('users', $users);
    }
    public function showreceipts(){
        $users = User::all();
        return view('ross.showreceipts')->with('users', $users);
    }
    public function receipts(){
        $members = User::all();
        return view('ross.receipts')->with('members', $members);
    }
    public function receipts2(){
        $members = User::all();
        return view('ross.receipts')->with('members', $members);
    }
    public function members(){
        $members = User::all();
        return view('ross.members')->with('members', $members);
        }
    public function schloarship(){
        $members = User::all();
        return view('ross.schloarship')->with('members', $members);
    }
    public function selectscholarship($id){
        $member = User::find($id);
        DB::table('users')->where('id', $member->id)->update(['scholarship' => 1]);
        $members = User::all();
        return view('ross.schloarship')->with('members', $members);
    }
    
    public function showmembers(){
        $users = User::all();
        return view('ross.showmembers')->with('users', $users);
    }
    
                    //DB::table('users')->where('id', $id)->update(['schloarship' => 1]);

//-------------------------------Proctor Query----------------------------------------------------------------------------
public function proctorq(Request $request){
    $q = $request->input('q');
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
    }
    $user1 = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
    $user = DB::table('users')->where([['student_id','=',$user1->student_id],['is_admin','>', 0]])->first();

    $members= User::all();
    $subjects= Subject::all();
    if(count($user) > 0)

    return view('ross.proctorq')->with('user',$user)->with('members',$members)->with('subjects',$subjects);
    else
    $users= User::all();
    return view ('ross.proctor')->withMessage('No Details found. Try to search again !')->with('users',$users);
}
///////////////////////////////////////////////////////////////////////////////////////////////////
///-------------------------------Proctor1 Query----------------------------------------------------------------------------
    public function proctorq1(Request $request){
        $q = $request->input('q');
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
     }
    $usr = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    $members= User::all();
    $users = User::all();
    if($count == 0)
    return view ('ross.proctor')->withMessage('No Details found. Try to search again !')->with('users',$users);
    else
        return view('ross.proctorq1')->with('usr',$usr)->with('members',$members) ;

    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////
    public function receiptsq(Request $request){
        $q = $request->input('q');
        $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
        if($count < 1){
        return  redirect()->back();
    }

        $id = $request->input('q');
        $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
        $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
       // $account = DB::table('users')->Where('student_id',$q)->first();
         $id1 = $account->student_id;
         $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();

        if($count > 0)
        return view('ross.receiptsq')->with('user',$user)->with('id',$id)->with('id1',$id1);
        else
        $members= User::all();
        $subjects= Subject::all();
        $users= User::all();
        return view ('ross.receipts')->withMessage('No Details found. Try to search again !')->with('users',$users)->with('members',$members)->with('subjects',$subjects);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function exambookingsystemq(Request $request){
        $q = $request->input('q');
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
    }

        $id = $request->input('q');
        $user =DB::table('users')->where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
        $accounts = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
        $id1 = $user->student_id;

        if($count > 0){
                    return view('ross.exambookingsystemq')->with('user',$user)->with('id',$id)->with('id1',$id1)->with('accounts',$accounts);

        }
        else{
             $members= User::all();
        $subjects= Subject::all();
        $users= User::all();
        return view ('ross.exambookingsystem')->withMessage('No Details found. Try to search again !')->with('users',$users)->with('members',$members)->with('subjects',$subjects);

        }
    }
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
public function exambookingsystemdate(Request $request){
    $q = $request->input('student_id');
    $student_id = $request->input('student_id');
    $user = DB::table('users')->where('student_id',$student_id)->first();
    $count = DB::table('users')->where('student_id',$student_id)->count();
    if($count < 1){
    return redirect()->back()->whth('error','Error Entered Data....?');
    } 
    $examcode = $request->input('subject');
    $student_id = $request->input('student_id');
    $user = DB::table('users')->where('student_id',$student_id)->first();
    $student_id = $user->student_id;
    $q = $user->student_id;
    $admin_id = $user->admin_id;
    $data = [
        'admin_id' => $admin_id,
        'examcode'   => $examcode
    ];
    $data1 = [
        'owner_id' => $admin_id,
        'examcode'   => $examcode
    ];

        $id = $request->input('student_id');
        $user = DB::table('users')->where('student_id', $q)->first();
        $proctordate = new Proctordate;
        $proctordate->user_id = $request->input('student_id');
        $proctordate->subject_id = $request->input('subject');
        $proctordate->procrordate = $request->input('examdate');
        $proctordate->open = 0;
        $proctordate->save();
        $proctor_id = DB::table('proctordate')->max('id');
 $proctordate1 = Proctordate::find($proctor_id);
//dd($proctordate1);
        $ref_result = new Ref_result;
        $ref_result->pass = 'Open' ;
        $ref_result->student_id =$request->input('student_id');
        $ref_result->examcode = $request->input('subject');
        $ref_result->mailing = 0;
        $ref_result->proctor_id = $proctor_id;
        $ref_result->save();
        $ref_max = DB::table('ref_result')->where( 'student_id', $student_id)->where('examcode', $examcode)->max('id');
    $ref_result2 = Ref_result::find($ref_max);
    //dd($ref_result2);
 $attemno = $ref_max;
        $subject = DB::table('exam_subject')->where($data)->get();


        $examcode = $request->input('subject');
       // dd($examcode);

        if($examcode == 66){
            $questions = DB::table('exam_question')->inRandomOrder()->where($data1)->limit(10)->get();
            $timing = '30.00';

            $i =1;
            foreach($questions as $q){
                $student_id = $request->input('student_id');
 
                $result = new Result;
                $result->student_id = $student_id;
                $result->ques_id = $q->id;
                $result->selected_option = Null;
                $result->attempno = $attemno;
                $result->givenmarks = Null;
                $result->timing = $timing;
                $result->serial = $i;
                $result->save();
         
            $i = $i +1;
            }    

        }else{
            $questions = DB::table('exam_question')->inRandomOrder()->where($data1)->limit(40)->get(); 
            //dd($questions);
            $timing = '120.00';

            $i =1;
            foreach($questions as $q){
                $student_id = $request->input('student_id');
    
                $result = new Result;
                $result->student_id = $student_id;
                $result->ques_id = $q->id;
                $result->selected_option = Null;
                $result->attempno = $attemno;
                $result->givenmarks = Null;
                $result->timing = $timing;
                $result->serial = $i;
                $result->save();
        
                $i = $i +1;
            } 
        }

        //WHAT IS THis
        $max_result = DB::table('result')->max('id');
        $id= $max_result;
        $reult = DB::table('result')->where('attempno',$attemno)->get();
      //  dd($reult);


        if($user->scholarship == 1){
            $invoice = new Invoice;
            $invoice->amount = 10;
            $invoice->student_id = $request->input('student_id');
            $invoice->subject_id = $request->input('subject');
            $invoice->description = $request->input('subject');
            $invoice->save();
//------------------------------------------------------------------Send New Invoice ---------------------------------------------------------
$student_id = $request->input('student_id');

        $max_inv = DB::table('invoices')->where('student_id',$student_id)->max('id');
        $invoice = DB::table('invoices')->where('id',$max_inv)->first();
        $booking = DB::table('invoices')->where('id',$max_inv)->first();

        $id1= $ref_result->student_id;
        $user1 = DB::table('users')->where('student_id',$id1)->first();
            
            $email=$user1->email;
             //Mail::to($($email)->send(new Sendbooking($booking));
             //Mail::to($('seralkhatem123@gmail.com')->send(new Sendbooking($booking));
             //Mail::to($('info@acpaglobal.net')->send(new Sendbooking($booking));
            $q = $request->input('student_id');

           // $user =DB::table('users')->where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
           // $accounts = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
           $user = DB::table('users')->where('student_id',$student_id)->first();
           $accounts = DB::table('users')->where('student_id',$student_id)->first();
            $id1 = $user->student_id;

            if($count > 0)
        return view('ross.exambookingsystemq')->with('user',$user)->with('id',$id)->with('id1',$id1)->with('accounts',$accounts);
            else
            $members= User::all();
            $subjects= Subject::all();
            $users= User::all();
            return view ('ross.exambookingsystem')->withMessage('No Details found. Try to search again !')->with('users',$users)->with('members',$members)->with('subjects',$subjects);
}

        $invoice = new Invoice;
        $invoice->amount = 23;
        $invoice->student_id = $request->input('student_id');
        $invoice->subject_id = $request->input('subject');
        $invoice->description = $request->input('subject');
        $invoice->save();
//------------------------------------------------------------------Send New Invoice ---------------------------------------------------------
$id1 = $user->student_id;

        $max_inv= DB::table('invoices')->where('student_id',$id1)->max('id');
        $invoice=DB::table('invoices')->where('id',$max_inv)->first();
        $booking=DB::table('invoices')->where('id',$max_inv)->first();

        $id1= $ref_result->student_id;
        $user1 = DB::table('users')->where('student_id',$id1)->first();
        $email=$user1->email;
         //Mail::to($($email)->send(new Sendbooking($booking));
         //Mail::to($('seralkhatem123@gmail.com')->send(new Sendbooking($booking));
         //Mail::to($('info@acpaglobal.net')->send(new Sendbooking($booking));
        $user = DB::table('users')->where('student_id',$student_id)->first();
           $accounts = DB::table('users')->where('student_id',$student_id)->first();
           

          $id1 = $user->student_id;

        if($count > 0)
        return view('ross.exambookingsystemq')->with('user',$user)->with('id',$id)->with('id1',$id1)->with('accounts',$accounts);
        else
        $members= User::all();
        $subjects= Subject::all();
        $users= User::all();
        return view ('ross.exambookingsystem')->withMessage('No Details found. Try to search again !')->with('users',$users)->with('members',$members)->with('subjects',$subjects);
    }
 public function insertPay1(Request $request , $id){

        $payment = new Payment;
        $payment->user_id = $request->input('user_id');
        $payment->payment = $request->input('payment');
        $payment->save();

        $maxpay = DB::table('payments')->max('id');
        $max_pay = Payment::find($maxpay);
        $id1= $max_pay->user_id;
        $user1 = DB::table('users')->where('student_id',$id1)->get()->first();
        if($id1 > 10000){
            $user = DB::table('users')->where('student_id',$id1)->get()->first();
        $email= $user->email;
        $user = Payment::find($maxpay);
         //Mail::to($($email)->send(new SendPayment($user));
         //Mail::to($('seralkhatem123@gmail.com')->send(new SendPayment($user));
         //Mail::to($('info@acpaglobal.net')->send(new SendPayment($user));


    }

        $subjects= Subject::all();
        $NetBalance=0;
        $totInvoice=0;
        $account = DB::table('users')->where('student_id',$id)->first();
        $user = DB::table('users')->where('student_id',$id)->first();
        /* $invoices=Invoice::select('*')->where('id','LIKE',$id)->join('users','users.id','=','invoices.student_id')
                                ->select('users.id as id', 'invoices.invoice as invoice','invoices.created_at as created_at')
                                ->get();*/
            $invoices = DB::table('invoices')->where('student_id', '=', $id)->get();
            $payments=DB::table('payments')->where('user_id','=', $id)->get();
            return view('ross.receiptsq')->with('user',$user)
            ->with('subjects',$subjects)
            ->with(['account'=>$account,'invoices' => $invoices ,'payments' => $payments,'NetBalance'=>$NetBalance,'totInvoice'=>$totInvoice]);
            }

    public function showprofile($id){

                //$payment = Payment::find($user_id);

                $subjects= Subject::all();
                $NetBalance=0;
                $totInvoice=0;
                $account = User::find($id);
                $user = User::find($id);
                $members=User::all();
                $score=Scorecard::find($id);
                if($score->faccount == 'Exempted')
                $bcolor='yellow';
                else
                $bcolor='light';

        /* $invoices=Invoice::select('*')->where('id','LIKE',$id)->join('users','users.id','=','invoices.student_id')
                                ->select('users.id as id', 'invoices.invoice as invoice','invoices.created_at as created_at')
                                ->get();*/
            $invoices = DB::table('invoices')->where('student_id', '=', $id)->get();
            $payments=DB::table('payments')->where('user_id','=', $id)->get();
            return view('ross.showprofile')->with('user',$user)
            ->with('subjects',$subjects)->with('score',$score)->with('bcolor',$bcolor)
            ->with(['members'=>$members,'id'=> $id,'account'=>$account,'invoices' => $invoices ,'payments' => $payments,'NetBalance'=>$NetBalance,'totInvoice'=>$totInvoice]);
            }

           public function showmembersq($id){
                $u = User::find($id);
                $id =$u->student_id;
                //$payment = Payment::find($user_id);

                $subjects= Subject::all();
                $NetBalance=0;
                $totInvoice=0;
                $account = User::find($id);
                $user = User::find($id);

                $members=User::all();
                $score=Scorecard::find($id);
                if($score->faccount == 'Exempted')
                $bcolor='yellow';
                else
                $bcolor='light'; 
            $invoices = DB::table('invoices')->where('student_id', '=', $id)->get();
            $payments=DB::table('payments')->where('user_id','=', $id)->get();
            return view('ross.membersq3')->with('user',$user)
            ->with('subjects',$subjects)->with('score',$score)->with('bcolor',$bcolor)
            ->with(['members'=>$members,'id'=> $id,'account'=>$account,'invoices' => $invoices ,'payments' => $payments,'NetBalance'=>$NetBalance,'totInvoice'=>$totInvoice]);
            }
 
public function receiptsq1(Request $request){

            $student_id= $request->input('user_id');
            $subjectinput = $request->input('subject_id') ;
            $user= DB::table('users')->where('student_id',$student_id)->first();;
$fee = $user->fee;
            //$payment = Payment::find($user_id);
            $payment = new Payment;
            $payment->user_id = $request->input('user_id');
            $payment->subject_id = $request->input('subject_id');
            $payment->payment = $request->input('payment');
            $payment->save();
            $fee = $fee+ $request->input('payment');
            DB::table('users')->where('student_id', $student_id)->update(['fee' => $fee]);



            $account = DB::table('users')->where('student_id',$student_id)->first();
            $user= DB::table('users')->where('student_id',$student_id)->first();;
          
            $invoices = DB::table('invoices')->where('student_id', '=', $student_id)->get();
            $payments=DB::table('payments')->where('user_id','=', $student_id)->get();
            $members= User::all();
            $q = $request->input('user_id');
            $id = $request->input('user_id');
            $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
            $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
            $maxpay = DB::table('payments')->max('id');
            $max_pay = Payment::find($maxpay);
            $id1= $max_pay->user_id;
            $user1 = DB::table('users')->where('student_id',$id1)->get()->first();
            if($id1 > 10000){
                $user = DB::table('users')->where('student_id',$id1)->get()->first();
            $email= $user->email;
            $user = Payment::find($maxpay);
             //Mail::to($($email)->send(new SendPayment($user));
             //Mail::to($('seralkhatem123@gmail.com')->send(new SendPayment($user));
             //Mail::to($('info@acpaglobal.net')->send(new SendPayment($user));
            


            if($id1 > 10000){
            $user = DB::table('users')->where('student_id',$id1)->get()->first();
           // return  redirect()->back();

            return view('ross.receiptsq')->with('user',$user)->with('id1',$id1);

        }
           // return  redirect()->back();
           return redirect('/receiptsq');
           //return redirect()->route('/receiptsq', [$id]);
            }
        }
        public function takescholarship(Request $request){
            $student_id= $request->input('user_id');
            $scholarsip = $request->input('scholarsip') ;
                 DB::table('users')->where('student_id', $student_id)->update(['scholarship' => 1]);
                 $user= DB::table('users')->where('student_id',$student_id)->first();;
                $id = $request->input('user_id');
                $id1 = $request->input('user_id');
                return view('ross.receiptsq')->with('user',$user)->with('id1',$id1);
            }
public function proctordate(Request $request){
            $id= $request->input('user_id');
            $user = DB::table('users')->where('student_id',$id)->first();
            if($user->scholarship == 1){
                $pay=10;
            }else{
                $pay=23;

            }
            //$payment = Payment::find($user_id);
            /*$proctordate = new Proctordate;
            $proctordate->user_id = $request->input('user_id');
            $proctordate->subject_id = $request->input('subject_id');
            $proctordate->procrordate = $request->input('procrordate');
            $proctordate->save();*/
            $invoice = new Invoice;
            $invoice->amount = $pay;
            $invoice->student_id = $request->input('user_id');
            $invoice->subject_id = $request->input('subject_id');
            $invoice->description = $request->input('subject_id');
            $invoice->save();
//------------------------------------------------------------------Send New Invoice ---------------------------------------------------------
            $max_inv= DB::table('invoices')->max('id');
            $user=DB::table('invoices')->where('id',$max_inv)->first();
            $id1=$user->student_id;
            $user1 = DB::table('users')->where('student_id',$id1)->first();
            $email=$user1->email;
             //Mail::to($($email)->send(new SendInvoice($user));
             //Mail::to($('seralkhatem123@gmail.com')->send(new SendInvoice($user));
             //Mail::to($('info@acpaglobal.net')->send(new SendInvoice($user));


//------------------------------------------------------------------End Send New Invoice ---------------------------------------------------------
            $q = $request->input('user_id');
            $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
            $members= User::all();
            $subjects= Subject::all();
            return view('ross.proctorq')->with('user',$user)->with('members',$members)->with('subjects',$subjects);
           // return  redirect()->back();


          }

          public function savenewphone(Request $request){
            $student_id = $request->student_id;
            $phone = $request->phone;
            $phonetype = $request->phonetype;
            $phone = new Phone;
            $phone->phone = $request->phone;
            $phone->phonetype = $request->phonetype;
            $phone->student_id = $request->student_id;
            $phone->save();
            $account = DB::table('users')->where('student_id','=', $student_id)->first();
            $user = DB::table('users')->where('student_id','=', $student_id)->get();
            $members = User::all();
            $request->student_id;
             //$id = $user->id;
        //    DB::table('users')->where('id', $user->id)->update(['is_admin' => 2]);
             //return view('ross.membersq')->with('student_id',$student_id)->with('user',$user);
             //return redirect()->back();
             return redirect('/membersq');
            // return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account);
            // 
            }
            public function getsavenewphone(){
                return view('ross.getsavenewphone');
            }

            public function savenewemail(Request $request){
                $student_id = $request->student_id;
                $email = $request->email;
                $emailtype = $request->emailtype;
                $email = new Email;
                $email->email = $request->email;
                $email->emailtype = $request->emailtype;
                $email->student_id = $request->student_id;
                $email->save();
                $account = DB::table('users')->where('student_id','=', $student_id)->first();
                $user = DB::table('users')->where('student_id','=', $student_id)->get();
                $members = User::all();
                $request->student_id;
                 //$id = $user->id;
            //    DB::table('users')->where('id', $user->id)->update(['is_admin' => 2]);
                 //return view('ross.membersq')->with('student_id',$student_id)->with('user',$user);
                 //return redirect()->back();
                 return redirect('/membersq');
                // return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account);
                // 
                }
                public function getsavenewemail(){
                    return view('ross.getsavenewemail');
                }
                public function exemptselect(Request $request){
             $q = $request->input('student_id');
         $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
if($count < 1){
return redirect()->back()->whth('error','Error Entered Data....?');
}

/////////////////////////////////////////////////////////////////////
$date = date('2020-01-01');
$id = $student_id;
$user = DB::table('users')->where('student_id', $q)->first();
$proctordate = new Proctordate;
$proctordate->user_id = $user->student_id;
$proctordate->subject_id = $e;
$proctordate->procrordate =  $date;
$proctordate->open = 0;
$proctordate->save();
$proctor_id = DB::table('proctordate')->max('id');

$ref_result =new Ref_result;
$ref_result->student_id = $user->student_id;
$ref_result->examcode = $e;
$ref_result->pass = "Exempt";
$ref_result->proctor_id = $proctor_id;
$ref_result->save();
/////////////////////////////////////////////////////////////////////////////
            $q = $request->input('student_id');
            //if($q != null)
            $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
            $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
            // $id=$user->id;
            $members= User::all();
            //$account= User::find(1);
    
            if(count($user) > 0)
                //return view('ross.membersq')->with('user',$user)->with('members',$members);
                return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account);
            else
            $members= User::all();
            return view ('ross.members')->withMessage('No Details found. Try to search again !')->with('members',$members);
        }


public function undoexempt(Request $request){
             $q = $request->input('student_id');
         $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return redirect()->back()->whth('error','Error Entered Data....?');
                    }
                    $id= $request->input('id');
                    DB::table('ref_result')->where('id',$id)->delete(); 


                    $q = $request->input('student_id');
                    //if($q != null)
                    $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
                    $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
                   // $id=$user->id;
                    $members= User::all();
                    //$account= User::find(1);
                
                    if(count($user) > 0)
                        //return view('ross.membersq')->with('user',$user)->with('members',$members);
                        return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account);
                    else
                    $members= User::all();
                    return view ('ross.members')->withMessage('No Details found. Try to search again !')->with('members',$members);
                }

    public  function selectexempt($id,$student_id){
        $q = $student_id;
        $student_id = $student_id;
        $e = $id;
 $date = date('2020-01-01');
        $id = $student_id;
        $user = DB::table('users')->where('student_id', $q)->first();
        $proctordate = new Proctordate;
        $proctordate->user_id = $student_id;
        $proctordate->subject_id = $e;
        $proctordate->procrordate =  $date;
        $proctordate->open = 10;
        $proctordate->save();
        $proctor_id = DB::table('proctordate')->max('id');

        $ref_result =new Ref_result;
        $ref_result->student_id = $q;
        $ref_result->examcode = $e;
        $ref_result->pass = "Exempt";
        $ref_result->proctor_id = $proctor_id;
        $ref_result->save();
        
        $ref_id = DB::table('ref_result')->max('id');
        $memberid=$student_id;
        $member1 = DB::table('users')->where('student_id',$memberid)->first();
        $lastresult = DB::table('ref_result')->where('id',$ref_id)->first();
             
        if($member1->scholarship == 1){
            $invoice = new Invoice;
                $invoice->amount = 10;
                $invoice->student_id = $student_id;
                $invoice->subject_id = $e;
                $invoice->description = $e;
                $invoice->save();
        }else{
            $invoice = new Invoice;
                $invoice->amount = 23;
                $invoice->student_id = $student_id;
                $invoice->subject_id = $e;
                $invoice->description = $e;
                $invoice->save();
        }
 
//send exempt result---------------------------------------------------
        if($lastresult->mailing == 0){  $email = $member1->email;
            $status = "Exempt";
            DB::table('ref_result')->where('id',$ref_id)->update(['pass' => $status ]);
            $mailing_new =1;
            DB::table('ref_result')->where('id',$ref_id)->update(['mailing' => $mailing_new ]);
           // dd($ref_id);
            $max_inv = DB::table('invoices')->max('id');
             $lastresult = DB::table('invoices')->where('id',$max_inv)->first();

            $id1= $ref_result->student_id;
            $user1 = DB::table('users')->where('student_id',$id1)->first();
                
                $email=$user1->email;
                 //Mail::to($($email)->send(new SendExemptExam($lastresult));
                 //Mail::to($('seralkhatem123@gmail.com')->send(new SendExemptExam($lastresult));
                 //Mail::to($('info@acpaglobal.net')->send(new SendExemptExam($lastresult));


            // //Mail::to($($email)->send(new SendExemptExam($lastresult));
            
            }

//--------------------------------------------CALCULATE LEVEL STARTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
$student_id=$user1->student_id;
$GAT = 0;$AAT = 0;$ACPA = 0;$ACCEA = 0;$ACA = 0; $FCPA = 0;$FCCEA = 0;$gat_count = 0;$aat_count = 0;$acpa_count = 0;$accea_count = 0;$fcpa_count = 0;$fccea_count = 0;
$pass = 'Pass';$Exempt = 'Exempt';  $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
$count1 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 1], ['student_id', '=', $student_id],])->count();
$count2 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 2], ['student_id', '=', $student_id],])->count();
$count3 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 3], ['student_id', '=', $student_id],])->count();
$count4 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 4], ['student_id', '=', $student_id],])->count();
$count5 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 5], ['student_id', '=', $student_id],])->count();
$count6 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 6], ['student_id', '=', $student_id],])->count();
$count7 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 7], ['student_id', '=', $student_id],])->count();
$count8 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 8], ['student_id', '=', $student_id],])->count();
$count9 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 9], ['student_id', '=', $student_id],])->count();
$count10 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 10], ['student_id', '=', $student_id],])->count();
$count11 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 11], ['student_id', '=', $student_id],])->count();
$count12 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 12], ['student_id', '=', $student_id],])->count();
$count13 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 13], ['student_id', '=', $student_id],])->count();
$count14 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 14], ['student_id', '=', $student_id],])->count();
$count15 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 15], ['student_id', '=', $student_id],])->count();
$count16 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 16], ['student_id', '=', $student_id],])->count();
$count17 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 17], ['student_id', '=', $student_id],])->count();
$count18 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 18], ['student_id', '=', $student_id],])->count();
$count19 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 19], ['student_id', '=', $student_id],])->count();
$count20 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 20], ['student_id', '=', $student_id],])->count();

if(($count10 > 0) && ($count12 > 0 )){
    $CPMcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'CPM'])->count();
    if($CPMcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'CPM', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'CPM', 'student_id' => $student_id,] )->delete();
} 
if(($count1 > 0) && ($count2 > 0 )&&($count3 > 0) &&($count4 > 0 )){
    $GATcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'GAT'])->count();
    if($GATcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'GAT', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'GAT', 'student_id' => $student_id,] )->delete();
} 

if(($count5 > 0) && ($count6 > 0 )&&($count7 > 0) &&($count8 > 0 )){
    $AATcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'AAT'])->count();
    if($AATcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'AAT', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'AAT', 'student_id' => $student_id,] )->delete();
} 

if(($count9 > 0) && ($count10 > 0 )&&($count12 > 0) &&($count14 > 0 )){
    $ACPAount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACPA'])->count();
    if($ACPAount < 1){
DB::table('memberlevel')->insert(['levelname' => 'ACPA', 'student_id' => $student_id,] );
     DB::table('memberlevel')->where(['levelname' => 'FCPA', 'student_id' => $student_id,] )->delete();    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'ACPA', 'student_id' => $student_id,] )->delete();
    DB::table('memberlevel')->where(['levelname' => 'FCPA', 'student_id' => $student_id,] )->delete();
} 

if(($count15 > 0) && ($count16 > 0 )&&($count17 > 0) &&($count9 > 0 )){
    $ACCEAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACCEA'])->count();
    if($ACCEAcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'ACCEA', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'ACCEA', 'student_id' => $student_id,] )->delete();
} 

if(($count18 > 0) && ($count19 > 0 )&&($count20 > 0)){

    $ACPAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACPA'])->count();
    $FCPAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'FCPA'])->count();
    if(($FCPAcount < 1)&&($ACPAcount > 0 )){
     DB::table('memberlevel')->insert(['levelname' => 'FCPA', 'student_id' => $student_id,] );
    } 
}else{
    DB::table('memberlevel')->where(['levelname' => 'FCPA', 'student_id' => $student_id,] )->delete();
} 

if(($count18 > 0) && ($count19 > 0 )&&($count20 > 0)){
$ACCEAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACCEA'])->count();
$FCCEAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'FCCEA'])->count();
    if(($FCCEAcount < 1)&&($ACCEAcount > 0 )){
        DB::table('memberlevel')->insert(['levelname' => 'FCCEA', 'student_id' => $student_id,] );
    } 
   // DB::table('memberlevel')->where(['levelname' => 'FCPA', 'student_id' => $student_id,] )->delete();
}
else{
    //DB::table('memberlevel')->where(['levelname' => 'FCCEA', 'student_id' => $student_id,] )->delete();
    DB::table('memberlevel')->where(['levelname' => 'FCCEA', 'student_id' => $student_id,] )->delete();
} 
//--------------------------------------------CALCULATE LEVEL FINISH CALCULATE LEVELLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
        //if($q != null)
    $user =     DB::table('users')->where(['student_id' => $student_id,] )->first();

    $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
    // $id=$user->id;
    $members= User::all();
    //$account= User::find(1);

    if($user->student_id > 9999)
        //return view('ross.membersq')->with('user',$user)->with('members',$members); 
        return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account)->with('lastresult',$lastresult)->with('ref_id',$ref_id);
    else
    $members= User::all();
    return view ('ross.members')->withMessage('No Details found. Try to search again !')->with('members',$members)->with('ref_id',$ref_id);
    }
//----------------------------------------------------Undo Exempt Exam ---------------------------------------------------------------------------------                   
 public function undoexemptid($id){
    $ref = Ref_result::find($id);
    $q = $ref->student_id;
            DB::table('ref_result')->where('id',$id)->delete(); 
                            

//--------------------------------------------CALCULATE LEVEL STARTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
$student_id=$q;$GAT = 0;$AAT = 0;$ACPA = 0;$ACCEA = 0;$ACA = 0; $FCPA = 0;$FCCEA = 0;$gat_count = 0;$aat_count = 0;$acpa_count = 0;$accea_count = 0;$fcpa_count = 0;$fccea_count = 0;
$pass = 'Pass';$Exempt = 'Exempt';  $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
$count1 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 1], ['student_id', '=', $student_id],])->count();
$count2 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 2], ['student_id', '=', $student_id],])->count();
$count3 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 3], ['student_id', '=', $student_id],])->count();
$count4 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 4], ['student_id', '=', $student_id],])->count();
$count5 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 5], ['student_id', '=', $student_id],])->count();
$count6 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 6], ['student_id', '=', $student_id],])->count();
$count7 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 7], ['student_id', '=', $student_id],])->count();
$count8 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 8], ['student_id', '=', $student_id],])->count();
$count9 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 9], ['student_id', '=', $student_id],])->count();
$count10 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 10], ['student_id', '=', $student_id],])->count();
$count11 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 11], ['student_id', '=', $student_id],])->count();
$count12 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 12], ['student_id', '=', $student_id],])->count();
$count13 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 13], ['student_id', '=', $student_id],])->count();
$count14 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 14], ['student_id', '=', $student_id],])->count();
$count15 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 15], ['student_id', '=', $student_id],])->count();
$count16 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 16], ['student_id', '=', $student_id],])->count();
$count17 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 17], ['student_id', '=', $student_id],])->count();
$count18 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 18], ['student_id', '=', $student_id],])->count();
$count19 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 19], ['student_id', '=', $student_id],])->count();
$count20 = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', 20], ['student_id', '=', $student_id],])->count();

if(($count10 > 0) && ($count12 > 0 )){
    $CPMcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'CPM'])->count();
    if($CPMcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'CPM', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'CPM', 'student_id' => $student_id,] )->delete();
} 
if(($count1 > 0) && ($count2 > 0 )&&($count3 > 0) &&($count4 > 0 )){
    $GATcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'GAT'])->count();
    if($GATcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'GAT', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'GAT', 'student_id' => $student_id,] )->delete();
} 

if(($count5 > 0) && ($count6 > 0 )&&($count7 > 0) &&($count8 > 0 )){
    $AATcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'AAT'])->count();
    if($AATcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'AAT', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'AAT', 'student_id' => $student_id,] )->delete();
} 

if(($count9 > 0) && ($count10 > 0 )&&($count12 > 0) &&($count14 > 0 )){
    $ACPAount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACPA'])->count();
    if($ACPAount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'ACPA', 'student_id' => $student_id,] );

    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'ACPA', 'student_id' => $student_id,] )->delete();
    DB::table('memberlevel')->where(['levelname' => 'FCPA', 'student_id' => $student_id,] )->delete();

} 

if(($count15 > 0) && ($count16 > 0 )&&($count17 > 0) &&($count9 > 0 )){
    $ACCEAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACCEA'])->count();
    if($ACCEAcount < 1){
     DB::table('memberlevel')->insert(['levelname' => 'ACCEA', 'student_id' => $student_id,] );
    }
}else{
    DB::table('memberlevel')->where(['levelname' => 'ACCEA', 'student_id' => $student_id,] )->delete();
} 

if(($count18 > 0) && ($count19 > 0 )&&($count20 > 0)){

    $ACPAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACPA'])->count();
    $FCPAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'FCPA'])->count();
    if(($FCPAcount < 1)&&($ACPAcount > 0 )){
     DB::table('memberlevel')->insert(['levelname' => 'FCPA', 'student_id' => $student_id,] );
    } 
}else{
    //DB::table('memberlevel')->where(['levelname' => 'FCCEA', 'student_id' => $student_id,] )->delete();
    DB::table('memberlevel')->where(['levelname' => 'FCPA', 'student_id' => $student_id,] )->delete();
} 

if(($count18 > 0) && ($count19 > 0 )&&($count20 > 0)){
$ACCEAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'ACCEA'])->count();
$FCCEAcount = DB::table('memberlevel')->where(['student_id' => $student_id,'levelname' => 'FCCEA'])->count();
    if(($FCCEAcount < 1)&&($ACCEAcount > 0 )){
        DB::table('memberlevel')->insert(['levelname' => 'FCCEA', 'student_id' => $student_id,] );
    } 
   // DB::table('memberlevel')->where(['levelname' => 'FCPA', 'student_id' => $student_id,] )->delete();
}
else{
    //DB::table('memberlevel')->where(['levelname' => 'FCCEA', 'student_id' => $student_id,] )->delete();
    DB::table('memberlevel')->where(['levelname' => 'FCCEA', 'student_id' => $student_id,] )->delete();
} 
//--------------------------------------------CALCULATE LEVEL FINISH CALCULATE LEVELLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLLL
             $user =  DB::table('users')->where('student_id',$q)->first();
            $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
            $members= User::all();
         
            //return view('ross.membersq')->with('user',$user)->with('members',$members);
        return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account);
    }


}
