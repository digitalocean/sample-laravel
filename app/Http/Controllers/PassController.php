<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Ref_result;

use Mail;
use PDF;
use App\Mail\PendingRegisteration;
use App\Mail\ExamResult;
use Illuminate\Support\Facades\Auth;


class PassController extends Controller
{
    
    public function home(){
        return view('pass.home');
    }

//------------------------------ ---------------------------- ---------------------------- ---------------------------- ------------------ -------------------------
public function selectpassexamhall(Request $request){
    $student_id = Auth::user()->student_id;
    $date = date('Y-m-d');
    $exam1code = $request->examcode;
    $selectedexam = DB::table('exam')->where('examcode',$exam1code)->first();
    $exam1title=  $selectedexam->examtitle;
    $exams = DB::table('exam')->get();
    if( $exam1code == 66){
        $proctor = 1;
        return view('map.passexamhall',compact('exams','exam1code','exam1title','proctor'));
    }else{
        $proctor = DB::table('proctordate')->where('subject_id',$exam1code)->where('user_id',$student_id)
        ->where('procrordate',$date)->where('open',1)->where('used',0)->count();
 
        $open = 'Open';
        $countOpen =DB::table('ref_result')->where('pass',$open )->where('examcode',$exam1code)->where('student_id',$student_id)->count();
        if($countOpen < 1){}

        DB::table('ref_result')->where('examcode',$exam1code)->where('student_id',$student_id)
        ->where('pass',$open)
        ->update(['pass' => 'In progress']);


        DB::table('proctordate')->where('subject_id',$exam1code)->where('user_id',$student_id)
        ->where('procrordate',$date)->where('open',1)->where('used',0)
        ->update(['open' => 2]);
       //$proctor =1;

       return view('pass.passexamhall',compact('exams','exam1code','exam1title','proctor','student_id'));
    }
}

public function showlastresult(Request $request, $id4){
    $attempno = $id4;
       $result = DB::table('result')->where('attempno',$id4)->first();

       $ref_result = DB::table('ref_result')->where('id',$id4)->first();
       $s_id1= Auth::user()->student_id;
       $s_id2 = $ref_result->student_id;
       if($s_id1 != $s_id2){
           return redirect('/');
       }
       $attempno = $result->attempno;
        $id = $ref_result->id;
       $lastresult = DB::table('ref_result')->where('id',$id)->first();
       $memberid=$lastresult->student_id;
       $member1 = DB::table('users')->where('student_id',$memberid)->first();
       $examcode = $ref_result->examcode;
       $exam = DB::table('exam')->where('examcode',$examcode)->first();
       $resultq = DB::table('result')->where('attempno',$id)->get();
       $exam_question = DB::table('exam_question')->where('examcode',$id4)->first();
       $tot_mark = 0;
       $tot_correct=0;

       DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)
       ->where('student_id',$memberid)->delete();
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
$pass = 'Pass';$Exempt = 'Exempt';   $exams = DB::table('exam')->get();
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

       return view('pass.showlastresult2',compact('result','pro','attempno'));

   }


   public function showlastresult3(Request $request){
    $attempno = $request->attempno;
    $id4 = $request->attempno;
       $result = DB::table('result')->where('attempno',$id4)->first();

       $count = DB::table('ref_result')->where('id',$attempno)->count();
       if($count < 1){

           return $id4."No Attemp";
       }
       $ref_result = DB::table('ref_result')->where('id',$id4)->first();
       $s_id1= Auth::user()->student_id;
       $s_id2 = $ref_result->student_id;
       if($s_id1 != $s_id2){
           return redirect('/');
       }
       $attempno = $result->attempno;
        $id = $ref_result->id;
       $lastresult = DB::table('ref_result')->where('id',$id)->first();
       $memberid=$lastresult->student_id;
       $member1 = DB::table('users')->where('student_id',$memberid)->first();
       $examcode = $ref_result->examcode;
       $exam = DB::table('exam')->where('examcode',$examcode)->first();
       $resultq = DB::table('result')->where('attempno',$id)->get();
       $exam_question = DB::table('exam_question')->where('examcode',$id4)->first();
       $tot_mark = 0;
       $tot_correct=0;

       DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)
       ->where('student_id',$memberid)->delete();
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
$pass = 'Pass';$Exempt = 'Exempt';   $exams = DB::table('exam')->get();
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

       return view('pass.showlastresult2',compact('result','pro','attempno'));

   }

public function showlastresult2(Request $request){
        $attempno = $request->attempno;
    return '<br><h1>'.$attempno.'</h1>';
    $student_id = Auth::user()->student_id;
    $id = DB::table('ref_result')->where('student_id',$student_id)->max('id');

    $lastresult = DB::table('ref_result')->where('id',$attempno)->first();    
    $examcode = $lastresult->examcode;

    $member1 = DB::table('users')->where('student_id',$student_id)->first();
    $exam = DB::table('exam')->where('examcode',$examcode)->first();
    $resultq = DB::table('result')->where('attempno',$attempno)->get();
    $exam_question = DB::table('exam_question')->where('examcode',$examcode)->first();
    $tot_mark = 0;
    $tot_correct=0;
/*
    DB::table('ref_result')->where('pass','In progress' )->where('examcode',$examcode)
    ->where('student_id',$student_id)->delete();*/
    $today = date('Y-m-d');
    $pro =  DB::table('proctordate')->get();
    
    DB::table('proctordate')->where('subject_id',$examcode)
    ->where('procrordate',$today)->where('user_id',$student_id)->update(['used'=>1]);

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
$pass = 'Pass';$Exempt = 'Exempt';   $exams = DB::table('exam')->get();
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
 
        return view('pass.showlastresult2')->with('$result',$result)->with('pro',$pro);

    }

    public function resultpdf($id){
        $ref_result = Ref_result::find($id);
        $id= $ref_result->student_id;
        $student = DB::table('users')->where('student_id',$id)->get()->first();
        $student_id = $ref_result->student_id;
        $exam = DB::table('exam')->where('examcode',$ref_result->examcode)->first();
        //$invoice = DB::table('invoices')->where('student_id', $student_id)->get();
        
        $pdf = PDF::loadView('student.ref_result',['student' => $student,'exam' => $exam,'ref_result' => $ref_result])->setPaper('a4','potrait');
        $fileName = 'Result-'.$ref_result->id.'-'.$ref_result->student_id;
        return $pdf->stream($fileName.'.pdf');
    }

}
