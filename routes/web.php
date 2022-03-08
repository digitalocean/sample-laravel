<?php
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\User;
use App\Mail\ExamResult;
use App\Admin;
use App\Student;
use App\Payment;
use App\Subject;
use App\Ref_result;
use App\Invoice;
use App\Scorecard;
use App\Level;
use App\Phone;
use App\AttachPDF;
use App\Excell;
use App\Proctordate;
use App\Question;
use App\Result;
use App\Exam;
use App\Teacher;
use App\Explain;
use App\Parts_Videos;
use App\Lecture;
 
use App\Comment;
use App\Email;
use App\Notifications\InvoicePaid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');*/
    //https://www.opera.com/download
    // Route::any('errorborowsername',function(){
    //     return view('errorborowsername')->middleware('auth:admin');
    // }); 
    // Route::any('borowsername3',function(){
    //     return view('borowsername3')->middleware('auth:admin');
    // }); 
    // Route::any('borowsername',function(){
    //     return view('borowsername')->middleware('auth:admin');
    // }); 
    // Route::any('borowsername2',function(){
    //     return view('borowsername2')->middleware('auth:admin');
    // });
    // Route::any('announcement',function(){
    //     return view('pages.announcement')->middleware('auth:admin');
    // });
    Route::get('selectexamx2',function(){
        $disable =0;
        $examcode = 0;
        $attempno =0;
        $student_id = Auth::user()->student_id;
        $ref_results = DB::table('ref_result')->where('student_id',$student_id)->get();
        $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
        return view('exam.selectexam2',compact('student_id','ref_results','exams','disable','examcode','attempno'));
    });
    
////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::any('selectexam3',function(Request $request){
    $student_id = Auth::user()->student_id;
    $memberid = Auth::user()->student_id;
    $examcode = $request->examcode;
    if($examcode == 66){
        $date = date('Y-m-d');
            $id = $request->input('student_id');
        $user = DB::table('users')->where('student_id', $student_id)->first();
        $proctordate = new Proctordate;
        $proctordate->user_id = $student_id;
        $proctordate->subject_id = 66;
        $proctordate->procrordate = $date;
        $proctordate->open = 0;
        $proctordate->save();
            $proctor_id = DB::table('proctordate')->max('id');
        $ref_result = new Ref_result;
        $ref_result->pass = 'Open' ;
        $ref_result->student_id =$student_id;
        $ref_result->examcode = 66;
        $ref_result->mailing = 0;
       // $proctor_id = DB::table('proctordate')->max('id');
        $ref_result->proctor_id = $proctor_id;
        $ref_result->save();
        
    $ref_max = DB::table('ref_result')->where( 'student_id', $student_id)->where('examcode', $examcode)->max('id');

    $attempno = $ref_max;

        $questions = DB::table('exam_question')->inRandomOrder()->where('examcode', 66)->limit(10)->get();
        $timing = '30:00';

        $i =1;
                foreach($questions as $q){
                    $student_id = Auth::user()->student_id;

                    $result = new Result;
                    $result->student_id = $student_id;
                    $result->ques_id = $q->id;
                    $result->selected_option = Null;
                    $result->attempno = $attempno;
                    $result->givenmarks = null;
                    $result->timing = "30.0";
                    $result->serial = $i;
                    $result->save();
            
                $i = $i +1;
                }    
        $ref_results =  DB::table('ref_result')->where('student_id',$student_id)->get();
        $attempno = DB::table('ref_result')->where('student_id',$student_id)->where('examcode',66)->max('id');
        $exams = Exam::all();
        $examcode = 66;
        return view('exam.selectexam3',compact('student_id','ref_results','exams','examcode','attempno'));
    }
    //******End If For Mook Exam */


    
    $status = 'Open';
$account = DB::table('ref_result')->where('student_id',$student_id)->where('examcode',$examcode)
    ->where('pass',$status)->count();
if($account < 1){
    return redirect('selectexamx2');

}


$max_id_ref_result =  DB::table('ref_result')->where('student_id',$student_id)->where('examcode',$examcode)
    ->where('pass',$status)->max('id');

    $date = date('Y-m-d');
   
    $count_proctordate = DB::table('proctordate')->where('procrordate',$date)
                         ->where('used',0)->where('open',1)->count();
    if(($count_proctordate < 1)||($max_id_ref_result < 1)){
        return redirect('selectexamx2');
        }else{
          $exam22 = DB::table('ref_result')->where('student_id',$student_id)->where('examcode',$examcode)
            ->where('pass',$status)->max('id');
        $ref_results =  DB::table('ref_result')->where('student_id',$student_id)->get();
        $exams = Exam::all();
        $disable = -1;

        
    $status = 'Open';
    $account = DB::table('ref_result')->where('student_id',$student_id)->where('examcode',$examcode)->where('examcode','<>',66)
        ->where('pass',$status)->count();

    $MAX_REF_RESULT = DB::table('ref_result')->where('student_id',$student_id)->where('examcode',$examcode)
                    ->where('examcode','<>',66)
                    ->where('pass',$status)
                    ->max('id');

        $attempno = $MAX_REF_RESULT;
      //  dd($MAX_REF_RESULT);
      $REF22 =         DB::table('ref_result')->where('id',$MAX_REF_RESULT)->first();
      $RESULT22 =         DB::table('result')->where('attempno',$MAX_REF_RESULT)->get();
       // dd($RESULT22);

        $today = date('Y-m-d');
        $NewDate=Date('Y-m-d', strtotime('-13 days'));
        $pro =  DB::table('proctordate')->get();
           DB::table('proctordate')->where('subject_id',$examcode)
            ->where('procrordate',$today)->where('user_id',$memberid)->update(['procrordate'=> $NewDate]);
            $attemp = DB::table('ref_result')->where('id',$attempno)->first();

        DB::table('proctordate')->where('subject_id',$examcode)->where('procrordate',$today)->where('user_id',$memberid)->update(['open'=> 2]);
        DB::table('ref_result')->where('id',$attempno)->update(['pass'=> 'In progress']);
        DB::table('proctordate')->where('id',$attemp->proctor_id)->update(['open'=> 0]);
    


            return view('exam.selectexam3',compact('student_id','ref_results','exams','disable','examcode','attempno'));


    }

//------------------------------------------------------------------------------------------------------------------------------------///






    $student_id = Auth::user()->student_id;

    $ref_results = DB::table('ref_result')->where('student_id',$student_id)->get();


    $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
    $exam = DB::table('exam')->where('examcode',$examcode)->first();
    $count =  DB::table('ref_result')->where('examcode',$examcode)
                                    ->where('student_id',$student_id)->where('mailing',0)->where('proctor_id','>',0)->count(); 

    $ref_results_1_max_id = DB::table('ref_result')->where('examcode',$examcode)->where('student_id',$student_id)
                                                    ->where('mailing',0)->max('id');
   
   $date = date('Y-m-d');
   
   $count_proctordate = DB::table('proctordate')->where('procrordate',$date)
                        ->where('used',0)->where('open',1)->count();
   if(($count_proctordate < 1)||($count < 1)){
        $disable = -1;
        $attempno = -1;
        return view('exam.selectexam3',compact('student_id','ref_results','exams','disable','examcode','attempno'));

       
    }    


    $attempno = $ref_results1;
//dd($attempno);
    $ref_result = DB::table('ref_result')->where('id',$attempno)->first(); 
    $result = DB::table('result')->where('attempno',$attempno)->where('givenmarks',Null)->first(); 
    $count = DB::table('result')->where('attempno',$attempno)->where('givenmarks',Null)->count(); 
    if($count < 1){
        
    $ref_results1 = DB::table('ref_result')->where('examcode',$examcode)->where('student_id',$student_id)
        ->where('mailing',0)->max('id'); 
        //dd($ref_results1->id);

    $attempno = $ref_results1;

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


    $id =  $ref_results1;
    $timeing = $request->timeing;
    $selected_option = $request->selected_option;
    $attempno =  $ref_results1;
    $lastresult=  $ref_results1;
    $count = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->count();
    if($count < 1){
        DB::table('ref_result')->where('id',$attempno)->update(['pass'=> 'In progress']);

       // $attempno = $request->attempno;
        $id4 =  $ref_results1;
        $result = DB::table('result')->where('attempno',$id4)->first();
        $ref_result = DB::table('ref_result')->where('id',$attempno)->first();

        $attempno =  $ref_results1;
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
           //Mail::to($email)->send(new ExamResult($lastresult));
       //     Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
       //    Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
        return redirect()->back();
    }
    
    echo   $result= $result->timing;
    $disable = $ref_results1;

    return view('exam.selectexam3',compact('student_id','ref_results','exams','disable','examcode','attempno'));
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////////////


Route::get('insertvideoparts', function(){
    $videos = Parts_Videos::all();
    return view('ross.insertvideoparts',compact('videos'))->middleware('auth');
});
    Route::any('uploadvideo',function(Request $request){
        //  dd($request->file('filename'));
          
          
          //->store('lectures');
          if ($request->file('filename') == null) {
              return 'Null';
           $file = "";
       }else{
        
       //----------------------------------------------------
             // cache the file
           $file = $request->file('filename');
       
           // generate a new filename. getClientOriginalExtension() for the file extension
           $filename = 'Video-file-' . time() . '.' . $file->getClientOriginalExtension();
       
           // save to storage/app/photos as the new $filename
           $path = $file->storeAs('videos', $filename);
       
           //dd($path);
       //-----------------------------------------------------------
          $file = $request->file('filename')->store('filename');  
       }
           $lecture = new Parts_Videos;
           $lecture->name= $request->name;
           $lecture->part= $request->part;
           $lecture->file= $filename;
           $lecture->session= $request->session;
           $lecture->sub= $request->sub;
           $lecture->page= $request->page;
           $lecture->save();

           return redirect('insertvideoparts');
           $image = $request->file('file');
       $destinationPathImg = '/your_path/';
       
       if (!$image->move($destinationPathImg, $image->getClientOriginalName())) {
           return 'Error saving the file.';
       }
       
           return view('exam.insertlectures');
       });   

    Route::any('registerstpesform3',function(){
        return view('exam.registerstpesform3');

    });

    Route::any('registerstpesform',function(){
        return view('exam.registerstpesform');

    });

    Route::any('registerstpesform2',function(){
        return view('exam.registerstpesform2');

    });

    Route::get('/check', 'UserController@userOnlineStatus')->middleware('auth:admin');
    
    Route::any('deleteattemp/{id}',function(Request $request,$id){
        $ref =  Ref_result::find($id);
        $res =  Result::where('attempno',$id)->get();
     //   DB::table('ref_result')->where('id',$id)->update(['pass' =>'In progress']);
        foreach( $res as $result){

        DB::table('result')->where('id',$result->id)->delete();

        }
        DB::table('ref_result')->where('id',$id)->delete();
       // dd($res);

       return redirect('allbookmarks')->middleware('auth:admin');
        return view('map.home')->middleware('auth:admin');
    
    });   
    Route::any('updateattemp/{id}',function(Request $request,$id){
        $ref =  Ref_result::find($id);
        $res =  Result::where('attempno',$id)->get();
      //  DB::table('ref_result')->where('id',$id)->update(['pass' =>'In progress']);
        foreach( $res as $result){

       // DB::table('result')->where('id',$result->id)->delete();

        }
  //      DB::table('ref_result')->where('id',$id)->delete();
       // dd($res);

       return redirect('allbookmarks')->middleware('auth:admin');
        return view('map.home')->middleware('auth:admin');
    
    });    
    Route::any('allusers',function(Request $request){
        return view('ross.allusers')->middleware('auth:admin');
    
    });    
    Route::any('timersubmit',function(Request $request){
        return view('exam.timersubmit')->middleware('auth:admin');
    
    });
    Route::any('createfee',function(Request $request){
            return view('exam.fees');
    
    });

    Route::any('comments',function(Request $request){
        $comments = DB::table('comments')->get();
            return view('ross.comments',compact('comments'))->middleware('auth:admin');
    
    });
    Route::any('commentsonline/{id}',function(Request $request,$id){
        $comments = DB::table('comments')->get();

        $comment = DB::table('comments',compact('comments'))->where('id',$id)->first();
        DB::table('comments',compact('comments'))->where('id',$id)->update(['online' => 1]);
        return redirect('/comments');
        return view('ross.comments',compact('comments'));

    });
    Route::any('commentsoffline/{id}',function(Request $request,$id){
        $comments = DB::table('comments')->get();

        $comment = DB::table('comments',compact('comments'))->where('id',$id)->first();
        DB::table('comments',compact('comments'))->where('id',$id)->update(['online' => 0]);
        return redirect('/comments');

        return view('ross.comments',compact('comments'));

    });

    Route::any('commentsdelete/{id}',function(Request $request,$id){
        $comments = DB::table('comments')->get();

         DB::table('comments',compact('comments'))->where('id',$id)->delete();
         return redirect('/comments');

        return view('ross.comments',compact('comments'))->middleware('auth:admin');

    });
    
    
    Route::any('answercomment',function(Request $request){
        $id= $request->id;
        $answer= $request->answer;
        
        $comments = DB::table('comments')->get();
        $comment = DB::table('comments')->where('id',$id)->first();
         //dd($answer);
        DB::table('comments')->where('id',$id)->update(['answer' => $answer]);
         return redirect('/comments');

        return view('ross.comments',compact('comments'))->middleware('auth:admin');

    });

Route::any('createfeeq',function(Request $request){
    $student_id = $request->student_id;
    /*
    $fees =  Explain::all();
    foreach($fees as $fee){
        $id = $fee->id;
        $fees =  Explain::find($id)->delete();

    }*/
    $explain_fee = DB::table('explains')->where('student_id',$student_id)->orderBy('subject_id')->get();

    return view('exam.feesq',compact('explain_fee','student_id'))->middleware('auth:admin');

});
Route::any('insertexplainfee',function(Request $request){
    $student_id = $request->student_id;
    $subject_id  = $request->subject_id;

    $fee = new Explain;
    $fee->student_id = $request->student_id;
    $fee->subject_id = $request->subject_id;
    $fee->fee = $request->fee;
    $fee->save();

    $explain_fee = DB::table('explains')->where('student_id',$student_id)->orderBy('subject_id')->get();
    return view('exam.feesq',compact('explain_fee','student_id'))->with('Success','Successfully..!')->middleware('auth:admin');

});
Route::any('downloadxx',function(Request $request){
///Download this file https://acpaglobal.net/storage/app/uploads/Lecture-file-1606075275.pdf
$filename = $request->filename;
//dd($filename);
$lecture = DB::table('lectures')->where('file',$filename)->first();
$fees = 0;
$student_id = Auth::user()->student_id;
$subject_id = $lecture->subject_id;
//  $teacher_id = $request->teacher_id;
$subject_fee = DB::table('subjects')->where('id',$subject_id)->first();
$explain_fee = DB::table('explains')->where('student_id',$student_id)->where('subject_id',$subject_id)->get();
$count1 = DB::table('explains')->where('student_id',$student_id)->where('subject_id',$subject_id)->count();
if($count1 > 0){
           
   foreach($explain_fee as  $explain)
   {
   $fees= $explain->fee + $fees;
   }
   if($fees >= $subject_fee->fee){

    $filename = $request->filename;

//$filename = 'Lecture-file-1606075275.pdf';
return Storage::download('/uploads/'.$filename);
   }
}
//$url = Storage::url('file.jpg');


$student_id = Auth::user()->student_id;
return view('exam.explainsubject', compact('subject_id','subject_fee'));

return redirect()->back();      
})->middleware('auth'); 

Route::any('insertlectures',function(){
    return view('exam.insertlectures');
});  

Route::any('uploadlectures',function(Request $request){
 //  dd($request->file('filename'));
   
   
   //->store('lectures');
   if ($request->file('filename') == null) {
       return 'Null';
    $file = "";
}else{
 
//----------------------------------------------------
      // cache the file
    $file = $request->file('filename');

    // generate a new filename. getClientOriginalExtension() for the file extension
    $filename = 'Lecture-file-' . time() . '.' . $file->getClientOriginalExtension();

    // save to storage/app/photos as the new $filename
    $path = $file->storeAs('uploads', $filename);

    //dd($path);
//-----------------------------------------------------------
   $file = $request->file('filename')->store('filename');  
}
    $lecture = new Lecture;
    $lecture->name= $request->name;
    $lecture->subject_id= $request->subject_id;
    $lecture->file= $filename;
    $lecture->comment= $request->comment;
    $lecture->save();
    return redirect('insertlectures');
    $image = $request->file('file');
$destinationPathImg = '/your_path/';

if (!$image->move($destinationPathImg, $image->getClientOriginalName())) {
    return 'Error saving the file.';
}

    return view('exam.insertlectures');
});   
 Route::any('explain',function(Request $request) {
     $fees = 0;
     $student_id = Auth::user()->student_id;
     $subject_id = $request->subject_id;
   //  $teacher_id = $request->teacher_id;
     $subject_fee = DB::table('subjects')->where('id',$subject_id)->first();
     $explain_fee = DB::table('explains')->where('student_id',$student_id)->where('subject_id',$subject_id)->get();
     $count1 = DB::table('explains')->where('student_id',$student_id)->where('subject_id',$subject_id)->count();
     if($count1 > 0){
                
        foreach($explain_fee as  $explain)
        {
        $fees= $explain->fee + $fees;
        }
        if($fees >= $subject_fee->fee){
            return view('exam.explainsubject',  compact('subject_id','subject_fee'));
        }
     } 
     return view('exam.explainsubject', compact('subject_id','subject_fee'));
   // return redirect()->back()->with('You must pay this course ... ') ;
 })->middleware('auth');
//});  
 Route::get('/insertcourse',function() {
    return view('exam.insertcourse');
 })->middleware('auth:admin'); 
 
 Route::get('/deletecourse',function($id) {
    Subject::find($id)->delete();

   return view('exam.insertcourse');
})->middleware('auth:admin'); 

Route::get('/editcourse',function($id) {

    Subject::find($id);

   return view('exam.editcourse')->with('Success','Delete Successfully...');
})->middleware('auth:admin'); 

Route::post('/updatecourse',function($id) {

    $course = Subject::find($id);

    Subject::find($id);
    Subject::find($id)->update(['coursename' => $request->coursename]);
    Subject::find($id)->update(['fee' => $request->fee]);
    Subject::find($id)->update(['teacher' => $request->teacher]);
    Subject::find($id)->update(['comment' => $request->comment]);
     
   return view('exam.editcourse');
})->middleware('auth:admin'); 

 Route::get('/insertcourse',function() {
    return view('exam.insertcourse');
 })->middleware('auth:admin'); 

Route::post('/postinsertcourse',function(Request $request) {
    $subject = new Subject;
    $subject->name =$request->name;
    $subject->teacher_id =$request->teacher_id;
    $subject->fee =$request->fee;
    $subject->comment =$request->comment;
    $subject->save();
     
    return view('exam.insertcourse')->with('success','Subject Added Succcessfully.!');
 
  })->middleware('auth:admin');
  Route::get('/deletecourse/{id}',function($id) {
      DB::table('subjects')->where('id',$id)->delete();
     return view('exam.insertcourse')->with('success','Subject deletes Succcessfully.!');
  })->middleware('auth:admin');

  Route::get('/deletelecture/{id}',function($id) {
    DB::table('lectures')->where('id',$id)->delete();
   return view('exam.insertlectures')->with('success','Subject deletes Succcessfully.!');
})->middleware('auth:admin');

Route::any('/editlecture/{id}',function(Request $request,$id) {
    $lecture =  DB::table('lectures')->where('id',$id);
  //  dd($lecture);
    return view('exam.editlecture',compact('lecture','id'))->with('success','Subject deletes Succcessfully.!');
 })->middleware('auth:admin');

 Route::any('/editlecture/updatelecture/{id}',function(Request $request,$id) {
    $lecture =  DB::table('lectures')->where('id',$id);
    
   //->store('lectures');
   if ($request->file('filename') == null) {
    return 'Null';
 $file = "";
}else{

//----------------------------------------------------
   // cache the file
 $file = $request->file('filename');

 // generate a new filename. getClientOriginalExtension() for the file extension
 $filename = 'Lecture-file-' . time() . '.' . $file->getClientOriginalExtension();

 // save to storage/app/photos as the new $filename
 $path = $file->storeAs('uploads', $filename);

 //dd($path);
//-----------------------------------------------------------
$file = $request->file('filename')->store('filename');  
}

     DB::table('lectures')->where("id",$id)->update(['id'=> $request->id]);
     DB::table('lectures')->where("id",$id)->update(['name'=> $request->name]);
     DB::table('lectures')->where("id",$id)->update(['file'=> $request->file]);
     DB::table('lectures')->where("id",$id)->update(['comment'=> $request->comment]);
 

 
     return redirect('insertlectures');
     $image = $request->file('file');
 $destinationPathImg = '/your_path/';
 
 if (!$image->move($destinationPathImg, $image->getClientOriginalName())) {
     return 'Error saving the file.';
 }
 
     return view('exam.insertlectures')->with('success','Subject deletes Succcessfully.!');

 })->middleware('auth:admin');
  

  Route::get('/editcourse/{id}',function($id) {
    $subject  = Subject::find($id);
      return view('exam.updatecourse',compact('subject'))->with('success','course here Succcessfully.!');
})->middleware('auth:admin');
 
Route::post('/editcourse/updatecourse',function(Request $request ) {
    $id= $request->id0;
    $course = Subject::find($id);
    
    DB::table('subjects')->where("id",$id)->update(['id'=> $request->id]);
    DB::table('subjects')->where("id",$id)->update(['teacher_id'=> $request->teacher_id]);
    DB::table('subjects')->where("id",$id)->update(['fee'=> $request->fee]);
    DB::table('subjects')->where("id",$id)->update(['name'=> $request->name]);
    DB::table('subjects')->where("id",$id)->update(['comment'=> $request->comment]);

return redirect('insertcourse')->with('Success','Update Successfully');
 })->middleware('auth:admin');
 Route::get('/insertteachers',function() {
    return view('exam.insertteachers');
 })->middleware('auth:admin');
 Route::get('/deleteteacher/{id}',function($id) {
     DB::table('teachers')->where('id',$id)->delete();
    return view('exam.insertteachers')->with('success','teacher deletes Succcessfully.!');
 })->middleware('auth:admin');
 Route::get('/editteacher/{id}',function($id) {
     $teacher = Teacher::find($id);
       return view('exam.updateteachers',compact('teacher'))->with('success','teacher deletes Succcessfully.!');
 })->middleware('auth:admin');
 Route::post('/editteacher/updateteacher',function(Request $request ) {
     $id= $request->id0;
     $teacher = Teacher::find($id);
     
    DB::table('teachers')->where("id",$id)->update(['id'=> $request->id]);
    DB::table('teachers')->where("id",$id)->update(['name'=> $request->name]);
    DB::table('teachers')->where("id",$id)->update(['comment'=> $request->comment]);

return redirect('insertteachers')->with('Success','Update Successfully');
     return view('exam.updateteachers',compact('teacher'))->with('success','teacher deletes Succcessfully.!');
 })->middleware('auth:admin');
 Route::get('/admin',function() {
    return view('admin.index');
 })->middleware('auth:admin');
//});

Route::post('/postinsertteachers',function(Request $request) {
    $teacher = new Teacher;
    $teacher->name =$request->name;
    $teacher->comment =$request->comment;
    $teacher->save();
     
    return view('exam.insertteachers')->with('success','teacher Added Succcessfully.!');
 
  })->middleware('auth:admin');

Route::get('addexam123',function(){
    $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
    return view('pems.addexam',compact('exams'))->middleware('auth:admin');
});/*
Route::post('postaddexam',function(Request $request){

    $examcode = $request->examcode;
    $realcode = $request->realcode;
    $examtitle = $request->examtitle;
     
    DB::table('exam')->insert(['examcode' => $examcode,'examtitle' => $examtitle]);
    $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
    return view('pems.addexam',compact('exams'))->with('Success','Your Exam Added Successfully');
});*/
/*
Route::any('/updateallattemps',function(){
    $allattemps = DB::table('ref_result')->get();
    foreach($allattemps as $at)
    $i = -1;
    {
        DB::table('ref_result')->update(['proctor_id' => $i]);
        $i = $i - 1;
    }
    return view('exam.fullscreen');
});*/
Route::any('/deletemember',function(Request $request){
    $id = $request->member_id;
    $user = DB::table('users')->where('id',$id)->first();
    //dd($user);
    DB::table('users')->where('id',$id)->delete();
    return redirect('/profiles')->with('Success','Member Deleted Successfully..!');
})->middleware('auth:admin');
Route::any('/fullscreen',function(){
    return view('exam.fullscreen');
});
Route::get('/insertsubjects',function(){
    return view('exam.insertsubjects');
});
Route::post('/insertsubjects',function(Request $request){
    $Subject_name = $request->name;
    $Subject_fee = $request->fee;
    $Subject_teacher = $request->teacher_id;
    $Subject_comment = $request->comment;
    return  $Subject_name.'.....'.$Subject_fee.'...'.$Subject_teacher.'..'.$Subject_comment;
    return view('exam.insertsubjects');
}); 
Route::any('/selectexam2xxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',function(){
    return view('pass.insertexplainfee');
});
Route::any('/time',function(){
    return view('exam.time');
});/*
Route::any('pass/home2',function(){
    return view('pass.index');
})->middleware('Auth');*/
Route::any('selectexam2',function(){
    return view('pass.index');
})->middleware('auth');
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('bookmark',function(Request $request){

$serial0 =  $request->serial0;
$attempno = $request->attempno;
$id = $request->attempno;
    ///-------TIME--------------------------------
        $timeing = $request->timeing;
        $timeArr = explode(':', $timeing);
        $decTime = ($timeArr[0]) + ($timeArr[1]/60);
        $timeing = $decTime; 
    ///-------TIME--------------------------------  
$all = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->orderBy('order','asc')->get();
foreach($all as $att){
    DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])->update(['timing' => $timeing ]);
}
$resultUpdate = DB::table('result')->where([['serial',$serial0],['attempno',$attempno]])->first();

$newserial = $serial0 + 40 + $resultUpdate->order ;
DB::table('result')->where([['serial',$serial0],['attempno',$attempno]])->update( ['order' => $newserial] );
//**********************************Fke data .............. */
$x=33*$serial0 + 7/85555555858;
//**********************************Fke data .............. */
$attempdata = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->orderBy('order','asc')->first();
 $resultdata = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->orderBy('order','asc')->first();
 
$ques_id = $resultdata->ques_id;
$question = DB::table('exam_question')->where('id',$ques_id)->first();
return view('exam.firstquestion',compact('attempno','attempdata','resultdata','timeing'))->with('Success','Sussessfully Bookmarking this question');
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('selectthisquestion',function(Request $request){

$attempno = $request->attempno;
$timeing = $request->timeing;
$att11 = DB::table('result')->where('attempno',$attempno)->get(); 
 
//dd($att11);
$timestamp = strtotime($timeing);
$hours =  date('h', $timestamp);
$Minutes =  date('i', $timestamp);
$Seconds =  date('s', $timestamp);
$sum = $Minutes + $Seconds; 
        if($sum < 0)   // if($timeing < 0.02)

        {

        $attempno = $request->attempno;
        $id4 = $request->attempno;
        $result = DB::table('result')->where('attempno',$id4)->first();
        $ref_result = DB::table('ref_result')->where('id',$id4)->first();
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

        // DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
        $today = date('Y-m-d');
        $pro =  DB::table('proctordate')->get();
        
        DB::table('proctordate')->where('subject_id',$id4)->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);

        if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
        $result = Ref_result::find($id);
        foreach($resultq as $res_q){
            $tot_mark =  $res_q->givenmarks+$tot_mark;

            } 
            if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
                $tot_correct = $tot_mark/$totQ;
   
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
        //Mail::to($email)->send(new ExamResult($lastresult));
      //   Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
      //  Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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

        return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult'));


        }
    $id0 =  $request->id0;
    $attempno = $request->attempno;
    $timeing = $request->timeing;
    $id = $request->attempno;
        ///-------TIME--------------------------------
            $timeing = $request->timeing;
            $timeArr = explode(':', $timeing);
            $decTime = ($timeArr[0]) + ($timeArr[1]/60);
            $timeing = $decTime; 
        ///-------TIME--------------------------------
    $all = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->orderBy('order','asc')->get();
    foreach($all as $att){
        DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])->update(['timing' => $timeing ]);
    }
   //  $x=33*$id0 + 7/85555555858;
    
   $serial0 =  $request->id0;
   $id0 =  $request->id0;

//return $id0;
   //return $id0;
    $attempno = $request->attempno;
    $id = $request->attempno;
    $timeing = $request->timeing;


    $selected_option = $request->selected_option;
    $mini = DB::table('result')->where('attempno',$attempno)->where('id', $id0)->first();
    $count = DB::table('result')->where('attempno',$attempno)->where('id', $id0)->count();
    //$count = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->count();
    $serial = $mini->serial;
    if($serial > 1){

        $timeing = $request->timeing;
       // return $timeing;
    }

    $timeArr = explode(':', $timeing);
    
        $timeArr = explode(':', $timeing);
        $decTime = ($timeArr[0]) + ($timeArr[1]/60);
        $timeing = $decTime; 
    
        
    $attempdata = DB::table('result')->where('attempno',$attempno)->where('id', $id0)->first();
    $resultdata = DB::table('result')->where('attempno',$attempno)->where('id', $id0)->first();

    $ques_id = $resultdata->ques_id;
    $question = DB::table('exam_question')->where('id',$ques_id)->first();
    return view('exam.firstquestion',compact('attempno','attempdata','resultdata','timeing'));
    });
    ///////////////////////////////////////////////////////////
    
    /////////////////////////////FINISH Exam //////////////////////////////////////////
    Route::get('finishexam/{id}',function(Request $request,$id){
        $attempno = $id;
        //$timeing = $request->timeing;
        $id4 =  $id;
    
        $attempno = $id;
        $id4 = $id;
     //  $result = DB::table('result')->where('attempno',$id4)->first();
       $ref_result = DB::table('ref_result')->where('id',$id4)->first();
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

       
       $result = Ref_result::find($id);
foreach($resultq as $res_q){
    $tot_mark =  $res_q->givenmarks+$tot_mark;

    } 
    if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
    DB::table('ref_result')->where('id',$id)->update(['pass' => $status]);
    $st =DB::table('ref_result')->where('id',$id)->first();
    $s = $st->pass;

    
if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
$result = Ref_result::find($id);
foreach($resultq as $res_q){
    $tot_mark =  $res_q->givenmarks+$tot_mark;

    }    
    // dd($tot_mark);

    if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
     $tot_correct = $tot_mark/$totQ;
      // DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
       $today = date('Y-m-d');
      $pro =  DB::table('proctordate')->get();
      
      DB::table('proctordate')->where('subject_id',$id4)->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);
  
       if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
       $result = Ref_result::find($id);
       foreach($resultq as $res_q){
           $tot_mark =  $res_q->givenmarks+$tot_mark;

           } 
           if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
            DB::table('ref_result')->where('id',$id)->update(['pass' => $status]);


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
        //Mail::to($email)->send(new ExamResult($lastresult));
    //     Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
   //     Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
 /*$s_id1= Auth::user()->student_id;
// $s_id2 = $ref_result->student_id;
if($s_id1 != $s_id2){
    return redirect('/');
}*/

$tot_mark = 0;
$tot_correct=0;


$result = Ref_result::find($id);
foreach($resultq as $res_q){
$tot_mark =  $res_q->givenmarks+$tot_mark;

} 
if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
DB::table('ref_result')->where('id',$id)->update(['pass' => $status]);
$st =DB::table('ref_result')->where('id',$id)->first();
$s = $st->pass;



       return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult'));
    });

     
    
//--------------///////////////////////////////FINISH Exam //////////////////////////////////////////
    Route::any('finishx',function(Request $request){
        $attempno = $request->attempno;
        $less_time =1200000000;
        //$timeing = $request->timeing;
        $id4 =  $attempno;
        $attempno = $attempno;
        $id4 = $attempno;
     //  $result = DB::table('result')->where('attempno',$id4)->first();
       $ref_result = DB::table('ref_result')->where('id',$id4)->first();
        $id = $ref_result->id;
       $lastresult = DB::table('ref_result')->where('id',$id)->first();
       $memberid=$lastresult->student_id;
       $member1 = DB::table('users')->where('student_id',$memberid)->first();
       $examcode = $ref_result->examcode;
       $exam = DB::table('exam')->where('examcode',$examcode)->first();
       $resultq = DB::table('result')->where('attempno',$id)->get();
       foreach($resultq as $lr){
        if($lr->timing < $less_time){
                   $less_time = $lr->timing;
        }
    
        }
       // dd($less_time);
        foreach($resultq as $lr){
            if($lr->timing = $less_time){
                DB::table('result')->where('id',$lr->id)->update(['timing'=>0]);
            }
       //$less_time = $lr->timing;

        }

       $exam_question = DB::table('exam_question')->where('examcode',$id4)->first();
       $tot_mark = 0;
       $tot_correct=0;

      // DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
       $today = date('Y-m-d');
      $pro =  DB::table('proctordate')->get();
      
      DB::table('proctordate')->where('subject_id',$id4)->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);
  
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
       //Mail::to($email)->send(new ExamResult($lastresult));
    //  Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
    //   Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
 /*$s_id1= Auth::user()->student_id;
// $s_id2 = $ref_result->student_id;
if($s_id1 != $s_id2){
    return redirect('/');
}*/
       return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult'));
    });

    ///////////////////////////////
    
    
    
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('subquestion',function(Request $request){
    $attempno = $request->attempno;
    $timeing = $request->timeing;
    $in_progress = 'In progress';

    DB::table('ref_result')->where('id',$attempno)->update(['pass'=> $in_progress]);
    $ref_result12 = DB::table('ref_result')->where('id',$attempno)->get();
//dd($ref_result12);

    $timestamp = strtotime($timeing);
    $hours =  date('h', $timestamp);
    $Minutes =  date('i', $timestamp);
    $Seconds =  date('s', $timestamp);
    $sum = $Minutes + $Seconds;


    $attempno = $request->attempno;


    //dd($attempno);

    //dd($sum);
    //You can then feed it into the date function:
    //return $Minutes.':'.$Seconds."Sum = ".$sum; 
    if($sum < 0)   // if($timeing < 0.02)


        {
        
        $attempno = $request->attempno;
        $id4 = $request->attempno;
       $result = DB::table('result')->where('attempno',$id4)->first();
       $ref_result = DB::table('ref_result')->where('id',$id4)->first();
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

      // DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
       $today = date('Y-m-d');
      $pro =  DB::table('proctordate')->get();
      
      DB::table('proctordate')->where('subject_id',$id4)->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);
  
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
       //Mail::to($email)->send(new ExamResult($lastresult));
     //  Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
     //  Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
 /*$s_id1= Auth::user()->student_id;
// $s_id2 = $ref_result->student_id;
if($s_id1 != $s_id2){
    return redirect('/');
}*/
       return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult'));


}else{
   
//return $attempno;
    $count = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->count();
  //  dd($count);
                if(($count < 1)||($timeing < 1)){
                    $attempno = $request->attempno;
                   // dd($attempno);

                    $id4 = $request->attempno;
                    $result = DB::table('result')->where('attempno',$id4)->first();
                    $ref_result = DB::table('ref_result')->where('id',$id4)->first();
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
                
                    // DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
                    $today = date('Y-m-d');
                    $pro =  DB::table('proctordate')->get();
                    
                    DB::table('proctordate')->where('subject_id',$id4)->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);
                
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
                    //Mail::to($email)->send(new ExamResult($lastresult));
              //       Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
              //      Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
                /*$s_id1= Auth::user()->student_id;
            // $s_id2 = $ref_result->student_id;
                if($s_id1 != $s_id2){
                    return redirect('/');
                }*/
                    return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult'));
                

                }
//.....................................TIME finish ..................................................................................................

   $serial0 =  $request->serial0;
  // dd($serial0);

   //return $serial0;
    $attempno = $request->attempno;
    $id = $request->attempno;
    $timeing = $request->timeing;
    //dd($timeing);
    $selected_option = $request->selected_option;
    //dd($selected_option);

    $mini = DB::table('result')->where('attempno',$attempno)->where('serial', $serial0)->first();
    $count = DB::table('result')->where('attempno',$attempno)->where('serial', $serial0)->count();
    //$count = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->count();
    $serial = $mini->serial;
    if($serial > 1){

        $timeing = $request->timeing;
       // return $timeing;
    }

    $timeArr = explode(':', $timeing);
    
        $timeArr = explode(':', $timeing);
        $decTime = ($timeArr[0]) + ($timeArr[1]/60);
        $timeing = $decTime; 
      //  dd($timeArr);
       // dd($decTime);

 
    $ques_id = $mini->ques_id;
    $question = DB::table('exam_question')->where('id',$ques_id)->first();
 //return $serial;$selected_option = $request->selected_option;
if($selected_option == $question->correct_option){
    $givenmarks = $question->marks;
       // dd($givenmarks);


}else{
    $givenmarks = 0;
}
DB::table('result')->where([['serial',$serial],['attempno',$attempno]])->update( ['timing' => $timeing] );
DB::table('result')->where([['serial',$serial],['attempno',$attempno]])->update( ['givenmarks' => $givenmarks] );
DB::table('result')->where([['serial',$serial],['attempno',$attempno]])->update( ['selected_option' => $selected_option] );
/*----------------------------------------------After Update ------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
$countx = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->count();
if($countx < 1){

       $attempno = $request->attempno;
       $id4 = $request->attempno;
       $result = DB::table('result')->where('attempno',$id4)->first();
       $ref_result = DB::table('ref_result')->where('id',$id4)->first();
       $attempno = $result->attempno;
       $id = $ref_result->id;
       $lastresult = DB::table('ref_result')->where('id',$id)->first();
      // dd($lastresult);
       $memberid=$lastresult->student_id;
       $member1 = DB::table('users')->where('student_id',$memberid)->first();
       $examcode = $ref_result->examcode;
       $exam = DB::table('exam')->where('examcode',$examcode)->first();
       $resultq = DB::table('result')->where('attempno',$id)->get();
       $exam_question = DB::table('exam_question')->where('examcode',$id4)->first();
       $tot_mark = 0;
       $tot_correct=0;
    
      // DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
       $today = date('Y-m-d');
      $pro =  DB::table('proctordate')->get();
      
      DB::table('proctordate')->where('subject_id',$id4)->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);
    
                if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
       $result = Ref_result::find($id);
                foreach($resultq as $res_q){
                    $tot_mark =  $res_q->givenmarks+$tot_mark;
                
                    } 
                if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
            $tot_correct = $tot_mark/$totQ;
     
       $member = array( 'name' => $member1->name,'phone' => $member1->phone,'email' => $member1->email,'totQ' => $totQ,'examname' => $exam->examtitle,'tot_mark' => $tot_mark,'tot_correct' => $tot_correct,'attempno' => $attempno, );
    if($lastresult->mailing == 0){  $email = $member1->email;
       //Mail::to($email)->send(new ExamResult($lastresult));
    //    Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
    //  Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
                    return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult')); 
                
                
                /*---------------------------------------------------------------------------------------------------------*/
     
}

if (DB::table('result')->where('attempno',$attempno)->exists()) {
    $res = DB::table('result')->where('attempno',$attempno)->get();
    DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])->update( ['timing' => $timeing] );
    
    $attempdata =   DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])
    ->orderBy('order','asc')
    ->first();
    //dd($attempdata);
    
    $resultdata = DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])
    ->orderBy('order','asc')
    ->first();

    return view('exam.firstquestion',compact('attempno','attempdata','resultdata','timeing'));

    //dd($res);
}
    $resulttime= DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])->get();

//dd($resulttime);
    foreach($resulttime as $r){
        DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])->update( ['timing' => $timeing] );
    }
//dd($attempno);

    $attempdata =   DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])->where('givenmarks', Null)
    ->orderBy('order','asc')
    ->first();
    //dd($attempdata);

    $resultdata = DB::table('result')->where([['attempno',$attempno],['givenmarks', Null]])
    ->orderBy('order','asc')
    ->first();
    return view('exam.firstquestion',compact('attempno','attempdata','resultdata','timeing'));

    }


});


//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------//--------------------------------------


Route::post('firstquestion',function(Request $request){ 



//---------------------- CORRECTION -------------------------------------------------------------------------//
    $results11 = DB::table('ref_result')->where([['examcode','!=',66],['pass','!=','Exempt'],['pass','!=','In progress'],['pass','!=','Open'],['pass','!=','Fail'],['percetage','<', 64]])->get(); 
    $fail = "Fail";
    $pass = "Pass";
    foreach ($results11 as $r11){
        $attempno = $r11->id;
        $tot_mark = 0;
        $resultq  = DB::table('result')->where('attempno',$r11->id)->get();
                foreach($resultq as $res_q){ $tot_mark =  $res_q->givenmarks+$tot_mark;}//end foreach($resultq
                            
                             DB::table('ref_result')->where('id',$attempno)->update(['percetage'=> $tot_mark]);

                             if($tot_mark < 65){ DB::table('ref_result')->where('id',$attempno)->update(['pass'=> $fail]); }
                             else{DB::table('ref_result')->where('id',$attempno)->update(['pass'=> $pass]);}
                   
        }//end foreach ($results11
 //---------------------- CORRECTION -------------------------------------------------------------------------//


    $timeing = $request->timeing;

    $timestamp = strtotime($timeing);
        $hours =  date('h', $timestamp);
        $Minutes =  date('i', $timestamp);
        $Seconds =  date('s', $timestamp);
        $sum = $Minutes + $Seconds;
        //You can then feed it into the date function:
        //return $Minutes.':'.$Seconds."Sum = ".$sum; 
        if($sum < 0)   // if($timeing < 0.02)


            {
            
            $attempno = $request->attempno;
            $id4 = $request->attempno;
            $result = DB::table('result')->where('attempno',$id4)->first();
            $ref_result = DB::table('ref_result')->where('id',$id4)->first();
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

      // DB::table('ref_result')->where('pass','In progress' )->where('examcode',$id4)->where('student_id',$memberid)->delete();
      $today = date('Y-m-d');
      $pro =  DB::table('proctordate')->get();
      
      DB::table('proctordate')->where('subject_id',$id4)->where('procrordate',$today)->where('user_id',$memberid)->update(['used'=>1]);
      $in_progress = 'In progress';
      DB::table('ref_result')->where('id',$attempno)->update(['pass'=> $in_progress]);
  
       if($exam->examtitle === 'Mook Exam'){$totQ=10;}else{$totQ=40;}
       $result = Ref_result::find($id);
       foreach($resultq as $res_q){
           $tot_mark =  $res_q->givenmarks+$tot_mark;
           } 
           if($tot_mark < 65){$status='Fail';}else{$status = 'Pass';} 
            $tot_correct = $tot_mark/$totQ;

      DB::table('ref_result')->where('id',$attempno)->update(['pass'=> $status]);


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
       //Mail::to($email)->send(new ExamResult($lastresult));
     //   Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
     //  Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
 /*$s_id1= Auth::user()->student_id;
// $s_id2 = $ref_result->student_id;
if($s_id1 != $s_id2){
    return redirect('/');
}*/
       return view('pass.showlastresult2',compact('result','pro','attempno','id4','lastresult'));


}

    
    $attempno = $request->attempno;
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


    $id = $request->attempno;
    $timeing = $request->timeing;
    $selected_option = $request->selected_option;
    $attempno = $request->attempno;
    $lastresult= $request->attempno;
    $count = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->count();
    if($count < 1){
        DB::table('ref_result')->where('id',$attempno)->update(['pass'=> 'In progress']);

        $attempno = $request->attempno;
        $id4 = $request->attempno;
        $result = DB::table('result')->where('attempno',$id4)->first();
        $ref_result = DB::table('ref_result')->where('id',$attempno)->first();

        $attempno = $result->attempno;
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
           //Mail::to($email)->send(new ExamResult($lastresult));
         //   Mail::to('seralkhatem332211@gmail.com')->send(new ExamResult($lastresult));
         //  Mail::to('info@acpaglobal.net')->send(new ExamResult($lastresult));
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
  
      
   $resultdata = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->orderBy('order','asc')->first();
   $attempdata =   DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->orderBy('order','asc')->first();
   $resultdata = DB::table('result')->where('attempno',$attempno)->where('givenmarks', Null)->orderBy('order','asc')->first();
   $question = DB::table('exam_question')->where('id',$resultdata->ques_id)->first();

   $timeing = $resultdata->timing;
   //$timeing = $timing.':00';

return view('exam.firstquestion',compact('attempno','attempdata','resultdata','timeing'));
});




//******************* *///******************* *///******************* *///******************* *///******************* *///******************* */
Route::post('instruction',function(Request $request){
    $attempno = $request->attempno;
    $timeings  = DB::table('result')->where('givenmarks', Null)
                                    ->orderBy('order','asc')->where('attempno', $attempno)->first();
    $timeing = $timeings->timing;
    if($attempno < 1){
        return redirect()->back();
    }
    $examcode = $request->examcode;
    $id = $request->attempno;

   $attempdata = DB::table('ref_result')->where('id',$attempno)->first();
   $resultdata = DB::table('result')->where('attempno',$attempno)->get();
    $exam = DB::table('exam')->where('examcode',$examcode)->first();
     
return view('exam.instruction',compact('attempno','attempdata','resultdata','timeing','exam'));
});

Route::post('selectattemp',function(Request $request){
   $attempno = $request->attempno;
   $id = $request->attempno;
   $attempdata = DB::table('ref_result')->where('id',$attempno)->first();
   $resultdata = DB::table('result')->where('attempno',$attempno)->get();
   return view('exam.selectattemp',compact('attempno','attempdata','resultdata'));
});

Route::any('examhall',function(Request $request){
    $examcode = $request->examcode;
    $student_id = Auth::user()->student_id;
    $ref_results = DB::table('ref_result')->where('student_id',$student_id)->get();
    $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
    $exam = DB::table('exam')->where('examcode',$examcode)->get();
    $ref_results1 = DB::table('ref_result')->where('examcode',$examcode)->where('student_id',$student_id)->where('mailing',0)->max('id'); 
    $disable = $ref_results1;
    $attempno = $ref_results1;
    return view('exam.selectexam3',compact('student_id','ref_results','exams','disable','examcode','attempno'));
});

Route::get('testexam',function(){
   return view('exam.exam');
});
Route::get('allbookmarks',function(){
    $student_id = Auth::user()->student_id;
    $ref_results = DB::table('ref_result')->where('student_id',$student_id)->orderBy('examcode')->get();//, 'DESC'
    $results = DB::table('result')
                        ->where('student_id',$student_id)
                        ->orderBy('id', 'DESC')->get();
   return view('exam.allbookmarks',compact('results','ref_results'));
});
Route::any('allbookmarks2',function(Request $request){
    //$student_id = Auth::user()->student_id;
    $q = $request->input('q');
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
    }
    $user1 = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->first();
    $student_id = $user1->student_id;
    $user = DB::table('users')->where([['student_id','=',$student_id],['is_admin','>', 0]])->first();

    $members= User::all();
    $subjects= Subject::all();
    if($count > 0){
            $ref_results = DB::table('ref_result')->where('student_id',$student_id)->orderBy('examcode')->get();//, 'DESC'
            $results = DB::table('result')->where('student_id',$student_id)->orderBy('id', 'DESC')->get();
            return view('exam.allbookmarks2',compact('results','ref_results','user'));
        }

  //  return view('ross.proctorq')->with('user',$user)->with('members',$members)->with('subjects',$subjects);
    else
    $users= User::all();
    return view ('ross.bookmarks')->withMessage('No Details found. Try to search again !')->with('users',$users);


});
Route::get('testexam2',function(){
    return view('exam.exam2');
});
Route::any('addprecetage',function(Request $request){
    $results = DB::table('ref_result')->get();
    foreach($results as $result){
        if($result->pass == "Exempt"){
            $id = $result->id;
            DB::table('ref_result')->where('id',$id)->update( ['percetage' => 65] );

        }elseif($result->pass == "Pass"){
            $total_degree = 0;
             $id = $result->id;

            $results1 = DB::table('result')->where('attempno',$id)->get();
                    foreach($results1 as $result1){
                        $total_degree = $result1->givenmarks + $total_degree;
                    }
            $precentage = $total_degree;

              /*   if($result->id < 65){
                    $precentage = $total_degree;
                }else{
                    $precentage = $total_degree;
                }*/
 //return $precentage.'  '.$total_degree.'  '.$id ;
            DB::table('ref_result')->where('id',$id)->update( ['percetage' => $precentage] );
 
        }
    }
})->middleware('auth:admin');
//---------------------------------------------------------------------------------------------------------------------------------------
Route::any('editlevelname',function(Request $request){
    $id = $request->id;
    $levelcode = $request->levelcode;
    $level = $request->level;
    $certificate = $request->certificate;
    $certificate2 = $request->certificate2;


    DB::table('levels')->where('id',$id)->update( ['level' => $level] );
    DB::table('levels')->where('id',$id)->update( ['certificate' => $certificate] );
    DB::table('levels')->where('id',$id)->update( ['levelcode' => $levelcode] );
    DB::table('levels')->where('id',$id)->update( ['certificate2' => $certificate2] );


    $levels = DB::table('levels')->get();
    return view('editlevels',compact('levels'));
})->middleware('auth:admin');
//---------------------------------------------------------------------------------------------------------------------------------------
/*
Route::any('updatequestionup100101',function(Request $request){
    $questions = DB::table('exam_question')->where('id','>',100101)->get();
    $count = DB::table('exam_question')->where('id','>',100101)->count();
    $count2 = DB::table('exam_question')->where('id','>',0)->count();
foreach($questions as $question){

    $id = $question->id;
    $examcode = $question->examcode;
    $examcode2 = $examcode +20;
    
    DB::table('exam_question')->where('id',$id)->update(['examcode'=> $examcode2]);
}
return $count.'Success '.$count2;
    $examcoe = 1;
    $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
    return view('pems.allexams',compact('exams'));
})->middleware('auth:admin');*/
//---------------------------------------------------------------------------------------------------------------------------------------
Route::any('allexams',function(Request $request){
    $exams = DB::table('exam')->where('examtitle','!=','Empty')->get();
    return view('pems.allexams',compact('exams'));
})->middleware('auth:admin');
//---------------------------------------------------------------------------------------------------------------------------------------
Route::any('pems/editexamquestion/{examcode}',function(Request $request,$examcode){
    $examcode = $request->examcode;
    $questions = DB::table('exam_question')->where('examcode',$examcode)->get();
    return view('pems.editexamquestion',compact('questions'));
})->middleware('auth:admin');
Route::any('pems/deletequestion/{id}/{examcode}',function(Request $request,$id,$examcode){
    $questions = DB::table('exam_question')->where('examcode',$examcode)->get();
   
   $question = Question::find($id);

   $question =Question::where('id',$id)->first();

   if($question->id != 0) {
       $question->delete();
       return redirect()->back()->with('questions',$questions)->with(['success'=> 'Successfully deleted!!']);
   }
return "error".$id;
   return redirect()->back()->with('questions',$questions)->with(['error'=> ' Wrong ID!!']);
   })->middleware('auth:admin');
//---------------------------------------------------------------------------------------------------------------------------------------
  Route::any('pems/changequrrecroption',function(Request $request){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;

    if(($correct_option == 'A')&&($select_option == 'A')){
        return redurect()->back();}
elseif(($correct_option == 'A')&&($select_option == 'B')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
        DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'B']);  
        
    DB::table('exam_question')->where('id',$id)->update(['option_B'=> $option_A]);  
    DB::table('exam_question')->where('id',$id)->update(['option_A'=> $option_B]);  
}elseif(($correct_option == 'A')&&($select_option == 'C')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'C']);  
    
    DB::table('exam_question')->where('id',$id)->update(['option_C'=> $option_A]);  
    DB::table('exam_question')->where('id',$id)->update(['option_A'=> $option_C]);  
}elseif(($correct_option == 'A')&&($select_option == 'D')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'D']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_D'=> $option_A]);  
    DB::table('exam_question')->where('id',$id)->update(['option_A'=> $option_D]);  
} 
elseif(($correct_option == 'B')&&($select_option == 'A')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'A']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_B'=> $option_A]);  
    DB::table('exam_question')->where('id',$id)->update(['option_A'=> $option_B]);  }
elseif(($correct_option == 'B')&&($select_option == 'C')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'C']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_B'=> $option_C]);  
    DB::table('exam_question')->where('id',$id)->update(['option_C'=> $option_B]);  
 } 
elseif(($correct_option == 'B')&&($select_option == 'D')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'D']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_B'=> $option_D]);  
    DB::table('exam_question')->where('id',$id)->update(['option_D'=> $option_B]);
  } 
elseif(($correct_option == 'C')&&($select_option == 'A')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'A']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_A'=> $option_C]);  
    DB::table('exam_question')->where('id',$id)->update(['option_C'=> $option_A]);  
} 
elseif(($correct_option == 'C')&&($select_option == 'B')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'B']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_B'=> $option_C]);  
    DB::table('exam_question')->where('id',$id)->update(['option_C'=> $option_B]);  
 } 
elseif(($correct_option == 'C')&&($select_option == 'D')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'D']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_D'=> $option_C]);  
    DB::table('exam_question')->where('id',$id)->update(['option_C'=> $option_D]);  
 }  
elseif(($correct_option == 'D')&&($select_option == 'A')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'A']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_D'=> $option_A]);  
    DB::table('exam_question')->where('id',$id)->update(['option_A'=> $option_D]);  
 }   
elseif(($correct_option == 'D')&&($select_option == 'B')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;
    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'B']);  
    DB::table('exam_question')->where('id',$id)->update(['option_D'=> $option_B]);  
    DB::table('exam_question')->where('id',$id)->update(['option_B'=> $option_D]);  
}  
elseif(($correct_option == 'D')&&($select_option == 'C')){
    $id = $request->id;
    $select_option = $request->select_option;
    $question = Question::find($id);
    $examcode = $question->examcode;
    $correct_option = $question->correct_option;
    $option_A = $question->option_A;
    $option_B = $question->option_B;
    $option_C = $question->option_C;
    $option_D = $question->option_D;

    DB::table('exam_question')->where('id',$id)->update(['correct_option'=> 'C']); 
    
    DB::table('exam_question')->where('id',$id)->update(['option_D'=> $option_C]);  
    DB::table('exam_question')->where('id',$id)->update(['option_C'=> $option_D]);  
} 

      $questions = DB::table('exam_question')->where('examcode',$examcode)->get();
     
     $question = Question::find($id);
  
     $question =Question::where('id',$id)->first();
  
     if($question->id != 0) {
         //$question->delete();
         return redirect()->back()->with('questions',$questions)->with(['success'=> '<br><br><br><br><br><br><br><br><br><Successfully Updated!!']);
     }
  return "error".$id;
     return redirect()->back()->with('questions',$questions)->with(['error'=> '<br><br><br><br><br><br><br><br><br><br>Wrong ID!!']);
   
   
    })->middleware('auth:admin');
//---------------------------------------------------------------------------------------------------------------------------------------
Route::any('editlevels',function(Request $request){
    $levels = DB::table('levels')->get();
    return view('editlevels',compact('levels'));
})->middleware('auth:admin');
//---------------------------------------------------------------------------------------------------------------------------------------
Route::any('converttoonline',function(Request $request){
    $examq2 = DB::table('exam_question')->where('online','<',1)->get();
    foreach($examq2 as $examq){
        if($examq->online == 0){
             $id = $examq->id;
        DB::table('exam_question')->where('id',$id)->update(['online'=> 1]); 
        }
    }
    return 'Finish';
})->middleware('auth:admin');
//---------------------------------------------------------------------------------------------------------------------------------------
Route::any('examq',function(Request $request){
    $examq2 = DB::table('exam_question2')->get();
    $cexamq2 = DB::table('exam_question2')->count();
     foreach($examq2 as $examq){
         $id = $examq->id;
        $examcode = $examq->examcode;
        $question = $examq->question;
        $option_A =  $examq->option_A;
        $option_B = $examq->option_B;
        $option_C = $examq->option_C;
        $option_D = $examq->option_D;
        $correct_option = $examq->correct_option;

        $question = New Question;
        // $question->owner_id=$request->online;
        $question->id=$examq->id;
        $question->examcode= $examq->examcode;
        $question->question=$examq->question;
         $question->option_A=$examq->option_A;
         $question->option_B=$examq->option_B;
         $question->option_C=$examq->option_C;
         $question->option_D=$examq->option_D;
         $question->pageno= $examq->pageno;
         $question->marks= $examq->marks;
        $question->correct_option=$examq->correct_option;
          
         $question->save();


/*

    $question = New Question;
    $question->id=$id;
    $question->examcode=$examcode;
    $question->question=$question;
        $question->option_A=$option_A;
        $question->option_B=$option_B;
        $question->option_C=$option_C;
        $question->option_D=$option_D;
        $question->correct_option=$correct_option;
        $question->save();*/
    }
    return 'SUccess Copy Questions'.$cexamq2;
 
    })->middleware('auth:admin');



Route::any('pems/uploadpdf',function(Request $request){
   if($request->file('file')) 
         {
          $file = $request->file('file');
            $filename = time() . '.' . $request->file('file')->extension();
            $filePath = public_path() . '/uploads';
            $file->move($filePath, $filename);

            $attach = new AttachPDF;
            $attach->pdfname = $filename;
            $attach->save();
            $attachname = $filename;
            return redirect()->back()->with('attach',$attachname)->with('success', 'File uploaded successfully.');

       }
       $attachname = 'Theres No Attach File';

        return redirect()->back()->with('attach',$attachname)->with('error', 'File not uploaded.');
   
    
    
    
});
Route::get('examQedit/editexam/{examcode}',function($examcode)
{
    /*$exam = DB::table('exam')->where('examcode',$examcode)->first();
    if($examcode == 20){
        $max = DB::table('exam')->where('examcode',$examcode)->max('examcode');
        $newexamcode = $max+101;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($exam->examcode == 19){
        $max = DB::table('exam')->where('examcode',$examcode)->max('examcode');
        $newexamcode = $max+1001;
         DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($examcode == 18){
        $newexamcode = 20;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($examcode == 17){
        $newexamcode = 19;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($examcode == 16){
        $newexamcode = 18;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($examcode == 15){
        $newexamcode = 17;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($examcode == 14){
        $newexamcode = 16;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($examcode == 13){
        $newexamcode = 15;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    
    elseif($examcode == 12){
        $newexamcode = 14;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }
    elseif($examcode == 11){
        $newexamcode = 12;
        DB::table('exam')->where('examcode',$examcode)->update(['examcode'=>$newexamcode]);

    }else{
        echo 'No Update';
    }
     DB::table('exam')->update(['examcode'=>$newexamcode]);*/
     return redirect()->back();
});



Route::get('/public/videos/p1s1v2.mp4',function()
{
    return 'No Download';
    return view('register1');
});
Route::get('/public/videos/{name}',function($name)
{
    return 'No Download';
    return view('register1');
});
Route::get('import_excell','BasicController@comments')->middleware('auth:admin');
Route::post('import_excell/import','BasicController@import')->middleware('auth:admin');
Route::get('export', 'BasicController@export')->name('export')->middleware('auth:admin');
Route::get('importExportView', 'BasicController@importExportView')->middleware('auth:admin');
Route::post('import', 'BasicController@import')->name('import')->middleware('auth:admin');

//------TUTorialPOINT
Route::get('/foo/bar','UriController@index');
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');
Route::get('/register1',function()
{
    return view('register1');
});


//--------------------------Regiestration Sysytem-------------------------------------------------------------------------------------------------

Route::get('/loginexam', function(){  return view('auth.loginexam'); });
Route::get('/resetpass', function(){  return view('passwordrequest'); });
Route::get('/register2', function(){    return view('pages.register'); });
Route::POST('postregister2','MapController@postregister2');
Route::get('/handleregister',function(){return view ('handleregister');});
Route::get('/completeregister1/{id}', 'MapController@completeregister1');
Route::post('postpendinglogin','MapController@postpendinglogin');
Route::get('pendinglogin','MapController@pendinglogin');
//--------------------------Regiestration Sysytem-------------------------------------------------------------------------------------------------
//--------------------------Templates-------------------------------------------------------------------------------------------------
Route::get('/modern-business',function(){    return view('modern-business.index');});
Route::get('/template1',function(){    return view('template1.index');});
//--------------------------Templates-------------------------------------------------------------------------------------------------
Route::get('testTheme',function(){  return view('map.testTheme'); });
Route::get('/layout', function(){   return view('layout.layout'); });
Route::get('/copyright', function(){ return view('pages.copyright'); });
Route::get('/termsandconditions', function(){  return view('pages.termsandconditions'); });

Route::any('/', function(){ 
/*
    $users = DB::table('users')->get();
    foreach($users as $user){
    $student_id=$user->student_id;
    $ref_results = DB::table('ref_result')->where('student_id',$student_id)->get();
    dd($ref_results);
    froeach($ref_results as $res){
        if()
    }
//dd ($users);

    }*/
//--------------------------------------------CALCULATE LEVEL STARTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT
    /*$GAT = 0;$AAT = 0;$ACPA = 0;$ACCEA = 0;$ACA = 0; $FCPA = 0;$FCCEA = 0;$gat_count = 0;$aat_count = 0;$acpa_count = 0;$accea_count = 0;$fcpa_count = 0;$fccea_count = 0;
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
   /* $ref_result9 = DB::table('ref_result')->where([ ['pass', '<>', 'Fail'], ['examcode', '=', 9], ['student_id', '=', $student_id],])->count(); if($ref_result9>0){  $ACCEA = $ACCEA+1;}
    //FCPA-----------------------------------------------------------LEVEL 4 FCPA-------------------------------------------------FCPA-------------------------------------------------FCPA-------------------------------------------------------
    foreach($exams as $exam){$ref_result = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', $exam->examcode],['student_id', '=', $student_id],])->count();
    if(($exam->examcode>9) && ($exam->examcode>12) and ($exam->examcode<16)){  if($ref_result> 0) { $ACCEA = $ACCEA+1;  }  } }
    //FCPA-----------------------------------------------------------LEVEL 5 FCPA-------------------------------------------------FCPA-------------------------------------------------FCPA-------------------------------------------------------
    foreach($exams as $exam){$ref_result = DB::table('ref_result')->where([['pass', '<>', 'Fail'],['examcode', '=', $exam->examcode],    ['student_id', '=', $student_id],])->count();
    if(($exam->examcode>15) and ($exam->examcode<19)){if($ref_result> 0){$ACA = $ACA+1; }}}
    //******************************************************************************************************************* */
    /**//*if(($ACA >= 3)and($ACPA >= 4)){$FCPA = 4; }else{$FCPA = 3; }
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
  

*/

 return view('pages.index');    });
/*--------------------------------------------------------- ----------------------------------------------*/
Route::get('map/login', 'Auth\LoginController@showLoginForm');
Route::get('/admin/login', 'Admin\LoginController@showLoginForm');
Route::post('adminlogin', 'Admin\LoginController@login')->name('adminlogin');
Route::post('admin-logout','Admin\LoginController@logout')->name('admin-logout');
Route::any('adminlogout','Admin\LoginController@logout')->name('adminlogout');
Route::get('logout','Auth\LoginController@logout')->name('logout');
//---------------------------------------------------------------------------------------------------------*/
Route::get('/allinvoicepayment',function(){     return view ('ross.allinvoicepayment');})->middleware('auth:admin');
Route::get('/deleteinvoice/{id}',function($id){ Invoice::find($id)->delete();     return   redirect('/allinvoicepayment');})->middleware('auth:admin');
Route::get('/deletepayment/{id}',function($id){  Payment::find($id)->delete();     return redirect('/allinvoicepayment');})->middleware('auth:admin');
Route::get('/deleteexampt/{id}',function($id){  Ref_result::find($id)->delete();     return redirect('/allinvoicepayment');})->middleware('auth:admin');
Route::any('/sendcomment',function(Request $request){
    $comment = new Comment;
    $comment->name = $request->name;
    $comment->email = $request->email;
    $comment->subject =  $request->subject;
    $comment->message =  $request->message;
    $comment->created_at = date('Y-m-d');
    $comment->save();
    return view('pages.index')->with('Success','Your Comment is sent !');
});
Route::any('/checkmembership',function(Request $request){
    $student_id = $request->id;
    if($student_id < 10000){
        return redirect('/')->with('error','There is no membership for this id...');
    }else{
        $count = DB::table('memberlevel')->where('student_id',$student_id)->count();
            if($count < 1 ){
                return redirect('/')->with('error','There is no Certificate for this id...');
            }  
    $user = DB::table('users')->where('student_id',$student_id)->first();
    $levels = DB::table('memberlevel')->where('student_id',$student_id)->get();
   // dd($user);
    return view ('pages.memberlevels',compact('levels','user'));
    }   
     
});
Route::get('/test3',function(){return view ('test3');});
Route::get('/theme1',function(){return view ('theme');});
Route::get('/player', function () {
    $video = "video/telawa.mp4";
    $mime = "video/mp4";
    $title = "Os Simpsons";
    return view('map.home')->with(compact('video', 'mime', 'title'));
});
Route::get('/video/{filename}', function ($filename) {
    // Pasta dos videos.
    $videosDir = base_path('resources/assets/videos');
    if (file_exists($filePath = $videosDir."/".$filename)) {
        $stream = new \App\Http\VideoStream($filePath);
        return response()->stream(function() use ($stream) {
            $stream->start();
        });
    }
    return response("File doesn't exists", 404);
});
//----------------------------------PDF Important --------------------------------------------------------
Route::get('student/pdfexport/3', 'StudentController@pdfexport');
Route::get('/customers/pdf','MailController@export_pdf');
Route::get('student/pdfexport/', 'MapController@pdfexport');
Route::get('sendregisterationdatapdf/{id}','MapController@sendregisterationdatapdf');
Route::get('/sendbookingpdf/{inv_id}', 'DynamicPDFController@sendbookingpdf');
Route::get('/sendexamptepdf/{ref_id}/{exam_id}/{member_id}', 'DynamicPDFController@exemptpdf');
Route::get('/dynamic_pdf', 'DynamicPDFController@index');
Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');
Route::any('/dynamic_pdf/pdf2', 'DynamicPDFController@pdf2');
Route::any('/export', 'DynamicPDFController@export')->name('export.pdf');
Route::any('/export2', 'DynamicPDFController@export2')->name('export2.pdf');
Route::any('/qualificationcertificates', 'DynamicPDFController@qualificationcertificates')->name('QualificationCertificates.pdf');
Route::any('/membershipicertificate', 'DynamicPDFController@membershipicertificate')->name('membershipicertificate.pdf');
Route::any('/transcriptsectioncertificate', 'DynamicPDFController@transcriptsectioncertificate')->name('transcriptsectioncertificate.pdf');
Route::any('/pdf', 'DynamicPDFController@invoice');
//-------------------------------------------------------------------------------------------
Route::get('/about-nbc', function(){return view('pages.about-nbc'); });
Route::get('/bscnbc', function(){return view('pages.bscnbc'); });
Route::get('/qualifications_overview', function(){return view('pages.qualifications_overview'); }); 
Route::get('/fundamentallevel', function(){return view('pages.fundamentallevel'); }); 
Route::get('/advancedlevel', function(){return view('pages.advancedlevel'); });
Route::get('/professionallevel', function(){return view('pages.professionallevel'); });
Route::get('/strategiclevel', function(){return view('pages.strategiclevel'); });
Route::get('/projectmanagment', function(){return view('pages.projectmanagment'); });
Route::get('/informationtechnology', function(){return view('pages.informationtechnology'); });
Route::get('/bookstore', function(){return view('pages.bookstore'); });
//Route::get('/map/myaccount', function(){return view('map.myaccount'); });
//Route::get('/map/myaddresses', function(){return view('map.myaddresses');});
Route::get('/map/mycertificates', function(){
    $student_id= Auth::user()->student_id;
    $memberlevel = DB::table('memberlevel')->where('student_id',$student_id)->get();
    $level_count =  DB::table('memberlevel')->where('student_id',$student_id)->count();
    return view('map.mycertificates',compact('memberlevel'));})->middleware('auth');
//Route::get('/map/mysqcpd', function(){return view('map.mysqcpd');});
Route::get('/map/myemail', function(){return view('map.myemail');});
Route::get('/map/mypassword', function(){return view('map.mypassword');});
Route::resource('posts', 'PostsController');
Route::get('/create', 'PostsController@create' );
Route::get('/store', 'PostsController@store' );

Route::get('/startexam/{id}/{title}/{tname}/{cat}/{time}', 'ExamController@startexam');

//-------------------------Rosses------------------------------------------------------------------------------------------------------
Route::get('/ross/login', function(){return view('admin.login'); });
Route::get('/pems', function(){return view('admin.login'); });
Route::group(['middleware' =>['auth:admin' ]], function () {

Route::get('/ross', 'RossesController@ross')->name('ross')->middleware('auth:admin');
Route::get('admin/home', 'RossesController@ross')->name('ross');

Route::get('/proctor', 'RossesController@proctor')->name('proctor')->middleware('auth:admin');
Route::any('/showmembers','RossesController@showmembers')->middleware('auth:admin');
Route::any('/members','RossesController@members')->middleware('auth:admin');
Route::any('/receipts2','RossesController@receipts2')->middleware('auth:admin');
Route::any('/receipts','RossesController@receipts')->middleware('auth:admin');
Route::any('/showreceipts','RossesController@showreceipts')->middleware('auth:admin');
Route::any('/registerations','RossesController@registerations')->middleware('auth:admin');
Route::any('/profiles','RossesController@profiles')->middleware('auth:admin');
Route::any('/bookmarks','RossesController@profiles')->middleware('auth:admin');
Route::get('/bookmarks', function(){
    
    $members= User::all();
    $subjects= Subject::all();
    
    
    return view('ross.bookmarks',compact('members','subjects')); });



//Route::any('/proctorq','RossesController@proctorq')->middleware('auth:admin');
Route::any('/proctorq','RossesController@proctorq1')->middleware('auth:admin');
Route::any('/receiptsq/{id}','RossesController@receiptsq')->name('/receiptsq/{id}')->middleware('auth:admin');
Route::any('/ross/showprofile/{id}','RossesController@showprofile')->name('/ross/showprofile/{id}')->middleware('auth:admin');
Route::any('/ross/membersq/{id}','RossesController@showmembersq')->name('/ross/membersq/{id}')->middleware('auth:admin');
Route::any('/ross/membersqid/{id}','RossesController@membersqid')->name('/ross/membersq/{id}')->middleware('auth:admin');
Route::post('/savenewphone2', 'RossesController@savenewphone')->name('/savenewphone2')->middleware('auth:admin');
Route::get('/savenewphone', 'RossesController@getsavenewphone')->name('/savenewphone')->middleware('auth:admin');
Route::post('/savenewemail2', 'RossesController@savenewemail')->name('/savenewemail2')->middleware('auth:admin');
Route::get('/savenewemail', 'RossesController@getsavenewemail')->name('/savenewemail')->middleware('auth:admin');
Route::any('/exambookingsystemq', 'RossesController@exambookingsystemq')->name('/exambookingsystemq')->middleware('auth:admin');
Route::post('/bookdate', 'RossesController@exambookingsystemdate')->name('/bookdate')->middleware('auth:admin');
Route::any('/openexam/{id}', 'RossesController@openexam')->name('/openexam/{id}')->middleware('auth:admin');
Route::any('ross/Proctor/date', 'RossesController@openexam')->name('ross/Proctor/date')->middleware('auth:admin');


//Route::post('/exemptselect', 'RossesController@exemptselect')->name('/exemptselect')->middleware('auth:admin');
//Route::post('/undoexempt', 'RossesController@undoexempt')->name('/undoexempt')->middleware('auth:admin'); 
Route::get('/undoexempt/{id}', 'RossesController@undoexemptid')->name('/undoexempt/{id}')->middleware('auth:admin'); 
Route::get('/selectexempt/{id}/{student_id}', 'RossesController@selectexempt')->name('/selectexempt/{id}/{student_id}')->middleware('auth:admin');
//--------------------Update Users Status --------------------------------------------------------------------------------------------
Route::any('/takescholarship', 'RossesController@takescholarship')->name('takescholarship')->middleware('auth:admin');
Route::post('/receiptsq1', 'RossesController@receiptsq1')->name('receiptsq1')->middleware('auth:admin');
Route::any('/receiptsq', 'RossesController@receiptsq')->name('receiptsq')->middleware('auth:admin');
//------------------------------------------------------------------------------------------------------------------------------------
Route::post('/insertPay1', 'RossesController@insertPay1')->middleware('auth:admin');
Route::post('/proctordate', 'RossesController@proctordate')->name('proctordate')->middleware('auth:admin');
Route::get('/home5', 'HomeController@index5')->name('home5');
Route::post('file/upload', 'FileController@store')->name('file.upload');


//------------------------XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX------------------------------------------------
Route::get('/employees','EmployeesController@index')->middleware('auth:admin');
Route::post('/employees/getEmployees/','EmployeesController@getEmployees')->name('employees.getEmployees')->middleware('auth:admin');
Route::post('/employees','EmployeesController@employees2')->middleware('auth:admin');
Route::post('/employees2','EmployeesController@employees2')->middleware('auth:admin');

//--------------------------XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX--------------------------------------------------------------------------------
Route::get('session/get','SessionController@accessSessionData');
Route::get('session/set','SessionController@storeSessionData');
Route::get('session/remove','SessionController@deleteSessionData');
Route::get('allinvoice','MapController@allinvoice')->middleware('auth:admin');
Route::get('allpayment','MapController@allpayment')->middleware('auth:admin');
//------------------------------------PEMS-----------------------------------------------------------------------------------------------
Route::get('pems/home','PemsController@home')->middleware('auth:admin');
Route::get('pems','PemsController@home')->name('pems')->middleware('auth:admin');

Route::any('pems/addadmin','PemsController@addadmin')->middleware('auth:admin');
Route::any('/pems/deleteadmin','PemsController@deleteadmin')->middleware('auth:admin');
Route::any('/pems/editadmin','PemsController@editadmin')->middleware('auth:admin');
Route::any('/pems/posteditadmin','PemsController@posteditadmin')->middleware('auth:admin');
Route::get('pems/','PemsController@home')->middleware('auth:admin');
Route::get('pems/certificate','PemsController@certificate')->middleware('auth:admin');
Route::any('pems/certificateq','PemsController@certificateq')->middleware('auth:admin');
Route::any('pems/updateexamresult','PemsController@updateexamresult')->middleware('auth:admin');
Route::get('pems/certificate2','PemsController@certificate2')->middleware('auth:admin');
Route::get('pems/exams','PemsController@exams')->middleware('auth:admin');
Route::get('pems/startexam','PemsController@startexam')->middleware('auth:admin');
Route::post('/pems/examsedit','PemsController@examsedit')->name('/pems/examedit')->middleware('auth:admin');
Route::get('/examsedit/{examcode}','PemsController@examsedit')->name('/examedit/{examcode}')->middleware('auth:admin'); 
Route::post('/examsedit2/{examcode}','PemsController@examsedit2')->name('/examsedit2/{examcode}')->middleware('auth:admin'); 
Route::any('/examQedit/{examcode}','PemsController@examQedit')->name('/examsedit2/{examcode}')->middleware('auth:admin'); 
Route::any('/exameditquestion/{examcode}','PemsController@exameditquestion')->name('/exameditquestion/{examcode}')->middleware('auth:admin'); 
Route::post('/exameditquestionoffline/{examcode}','PemsController@exameditquestionoffline')->name('/exameditquestionoffline/{examcode}')->middleware('auth:admin'); 
//-----------------------------------Add New Question ---------------------------------------------------------------------------------------//
Route::any('/pems/addnewquestion1',function(Request $request)
    { $examcode = $request->examcode;    
        return view('pems.addnewquestion1',compact('examcode'));})->middleware('auth:admin');
 
//-----------------------------------------------------------------------------------------------------------------------------------------//
Route::post('/addnewquestion/{examcode}','PemsController@addnewquestion1')->name('/addnewquestion/{examcode}')->middleware('auth:admin'); 
Route::post('/addnewquestion2','PemsController@addnewquestion2')->name('/addnewquestion2')->middleware('auth:admin'); 
Route::post('/addnewquestionoffline/{examcode}','PemsController@addnewquestionoffline')->name('/addnewquestionoffline/{examcode}')->middleware('auth:admin'); 
Route::post('/findresult','PemsController@findresult')->name('/findresult')->middleware('auth:admin');
Route::post('/findcertificates','PemsController@findcertificates')->name('/findcertificates')->middleware('auth:admin');
Route::get('/showquestion','PemsController@showquestion')->name('/showquestion')->middleware('auth:admin');
Route::post('/qandalive/{examcode}/showonlinequestions/{qid}/showonlinequestion','PemsController@showonlinequestions')->name('/qandalive/{examcode}/showonlinequestions/{qid}/showonlinequestion')->middleware('auth:admin');
Route::get('/selectquestion','PemsController@selectquestion')->name('/selectquestion')->middleware('auth:admin');
Route::post('/selectexam','PemsController@selectexam')->name('/selectexam')->middleware('auth:admin');
Route::post('/selectexamoffline','PemsController@selectexamoffline')->name('/selectexamoffline')->middleware('auth:admin');
Route::post('/selectexamquestionno','PemsController@selectexamquestionno')->name('/selectexamquestionno')->middleware('auth:admin');
Route::post('/selectexamquestionnooffline','PemsController@selectexamquestionnooffline')->name('/selectexamquestionnooffline')->middleware('auth:admin');
Route::get('/journal','PemsController@journal')->name('/journal')->middleware('auth:admin');
Route::get('/pems/journal','PemsController@journal')->name('/pems/journal')->middleware('auth:admin');
Route::post('/pems/getmemberjournal','PemsController@getmemberjournal')->name('/pems/getmemberjournal')->middleware('auth:admin');
Route::any('/pems/journal/{memberid}/showjournal/{resultid}/show','PemsController@getmemberjournalresult')->middleware('auth:admin');

Route::any('/pems/memberadmin','PemsController@showmemberadmin')->name('/pems/memberadmin')->middleware('auth:admin');
Route::any('/pems/memberadminq','PemsController@showmemberadminq')->name('/pems/memberadminq')->middleware('auth:admin');
Route::any('/pems/savenewphone','PemsController@savenewphone')->name('/pems/savenewphone')->middleware('auth:admin');
Route::any('/pems/savenewemail','PemsController@savenewemail')->name('/pems/savenewemail')->middleware('auth:admin');
Route::any('/pems/deleteemail','PemsController@deleteemail')->name('/pems/deleteemail')->middleware('auth:admin');
Route::any('/pems/deletephone','PemsController@deletephone')->name('/pems/deletephone')->middleware('auth:admin');
Route::any('/pems/updateaddress','PemsController@updateaddress')->name('/pems/updateaddress')->middleware('auth:admin');
Route::any('/pems/updateinformation','PemsController@updateinformation')->name('/pems/updateinformation')->middleware('auth:admin');
Route::any('/pems/deletependingmembers','PemsController@deletependingmembers')->name('/pems/deletependingmembers')->middleware('auth:admin');

Route::any('/pems/memberstatus','PemsController@memberstatus')->name('/pems/memberstatus')->middleware('auth:admin');
Route::any('/pems/memberstatusq','PemsController@memberstatusq')->name('/pems/memberstatusq')->middleware('auth:admin');
Route::get('/pems/pendingmembers','PemsController@pendingmembers')->name('/pems/pendingmembers')->middleware('auth:admin');
Route::get('/pems/bulkemail','PemsController@bulkemail')->name('/pems/bulkemail')->middleware('auth:admin');
Route::any('/pems/sendbulkemail','PemsController@sendbulkemail')->name('/pems/sendbulkemail')->middleware('auth:admin');
Route::any('/pems/allresultq','PemsController@allresultq')->name('/pems/allresultq')->middleware('auth:admin');
Route::any('/pems/downloadresult/{id}','PemsController@downloadresult')->name('/pems/downloadresult/{id}')->middleware('auth:admin');
///////////////--------------------------UPLOAD VIDEO-----------------------------------------------------------------
Route::get('/uploadfile','PemsController@showuploadvideo')->middleware('auth:admin');
Route::post('/uploadfile','PemsController@showUploadFile')->middleware('auth:admin');

//Route::get('/pems/qandalive','PemsController@qandalive')->name('/pems/qandalive')->middleware('auth:admin');
Route::get('/pems/qandalive','PemsController@selectquestion')->name('/pems/qandalive')->middleware('auth:admin');
Route::get('/pems/qandaoffline','PemsController@qandaoffline')->name('/pems/qandaoffline')->middleware('auth:admin');
Route::get('/pems/invoicing','PemsController@invoicing')->name('/pems/invoicing')->middleware('auth:admin');
Route::any('/pems/certificate','PemsController@certificate')->name('/pems/certificate')->middleware('auth:admin');
Route::get('/pems/rossusers','PemsController@rossusers')->name('/pems/rossusers')->middleware('auth:admin');
Route::get('/pems/allresult','PemsController@allresult')->name('/pems/allresult')->middleware('auth:admin');


Route::get('pems/questions','PemsController@questions')->middleware('auth:admin');
Route::get('pems/results','PemsController@results')->middleware('auth:admin');
Route::get('pems/certificates','PemsController@certificates')->middleware('auth:admin');
Route::get('pems/mails','PemsController@mails')->middleware('auth:admin');
});


Route::post('/payinvoice', 'MapController@payinvoice')->name('/payinvoice')->middleware('auth:admin');
Route::post('/undopayinvoice', 'MapController@undopayinvoice')->name('/undopayinvoice')->middleware('auth:admin');
Route::post('/payinvoice2', 'MapController@payinvoice2')->name('/payinvoice2')->middleware('auth:admin');
Route::post('/undopayinvoice2', 'MapController@undopayinvoice2')->name('/undopayinvoice2')->middleware('auth:admin');



//-----------------------------End admin Auth------------------------------

Route::get('invoice/{id}','MapController@invoice');
Route::get('payment/{id}','MapController@payment');

 Route::get('/pass/enterexam/21', function(){return view('pass.enterexam.21');});
Route::get('/pass/exam', function(){return view('pass.exam');});
Route::get('/pass', function(){return redirect('https://exam.acpaglobal.net/login'); });
Route::post('/signinpass','LoginExamsController@loginpass')->name('/signinpass');


//---------------------------------------------------------------------------------------------------------------
Route::get('/adminhome','UserController@index');
Route::get('/uc/{id}','UserController@show');
Route::get('/uc/{id}/edit','UserController@edit')->where('id','[0-9]+');
Route::PATCH('/uc/{id}','UserController@update')->where('id','[0-9]+');
Route::DELETE('/uc/{id}','UserController@destroy')->where('id','[0-9]+');
Route::post('/coursePictureUpload', 'CourseActivitesController@coursePictureUpload')->name('coursePictureUpload');
Route::post('/coursePictureUpload2', 'CourseActivitesController@coursePictureUpload2')->name('coursePictureUpload2');
Route::get('/page', 'PagesController@index'); // localhost:8000/
Route::get('/page/{id}', 'PagesController@index');
Route::post('/page/save', 'PagesController@save');
Route::get('/page/deleteUser/{id}', 'PagesController@deleteUser');


Route::get('/profilepicture', 'ProfileController@getProfileAvatar')->name('profileavatar');
Route::post('/profilepicture', 'ProfileController@profilePictureUpload')->name('profileavatar');

Route::get('/changepassword', 'ProfileController@changePasswordForm')->name('changepassword');
Route::post('/changepassword', 'ProfileController@changePassword')->name('changepassword');
Route::post('/user/credentials','ProfileController@postCredentials');


 Route::get('/profile', 'ProfileController@profile')->name('Profile');

 Route::post('/profileUpdate', 'ProfileController@profileUpdate')->name('profileUpdate');
 //Route::resource('/dashboard1', 'DashboardController');

 Route::get('contact', 'PagesController@getContact')->name('contact');
 Route::post('contact', 'PagesController@postContact')->name('contact');



Route::get('/map/login', function(){return view('map.login'); });

//Route::get('/map/myaccount', 'InvoiceController@myaccount')->name('map/myaccount');
Route::get('/sendExam', 'ExamController@sendExam');
Route::get('/sendExam/{id}', 'ExamController@sendExam');
Route::get('/sendInv', 'InvoiceController@sendInv');
Route::get('/sendProfile', 'ProfileController@sendProfile');
Route::get('/about', 'PagesController@about')->name('about');

Route::get('/services', 'PagesController@services')->name('services');
Route::get('/chairman', function(){return view('pages.chairman'); });
Route::get('/bcsnbc', function(){return view('pages.bcsnbc'); });
Route::get('/overview_and_fees', function(){return view('pages.overview_and_fees'); });
Route::get('/prospectus', function(){  

      //PDF file is stored under project/public/download/info.pdf
      $file= public_path(). "/Membership-Prospectus.pdf";

      $headers = array(
                'Content-Type: application/pdf',
              );
  
      return Response::download($file, 'Membership-Prospectus.pdf', $headers);

   /* $pdf = PDF::loadView('student.pdf',['student' => $student,'invoice' => $invoice])->setPaper('a4','potrait');
    $fileName = time().$student->name;
    return $pdf->stream($fileName.'.pdf');*/
    $pdf = 'Membership-Prospectus.pdf';
    return stream('Membership-Prospectus.pdf'); });

Route::get('/set','HomeController@storeDataSession')->middleware('auth');
Route::get('/get','HomeController@getSession')->middleware('auth');
Route::get('/remove','HomeController@deleteSessionData')->middleware('auth');
Route::get('/session','HomeController@session')->middleware('auth');

//---ORIGINAL ACPA PASSPORT resultpdf
Route::any('showlastresult/{id4}','PassController@showlastresult')->middleware('auth');
Route::any('showlastresult3','PassController@showlastresult3')->middleware('auth');
Route::get('resultpdf/{id}','PassController@resultpdf')->middleware('auth');

Route::get('/pass/examhall', 'MapController@map')->name('map/home')->middleware('auth');
Route::get('/home', 'MapController@map')->name('map/home')->middleware('auth');

//Route::any('/pass/examhall', 'MapController@passexamhall')->middleware('auth');
//Route::any('/home', 'MapController@passexamhall')->middleware('auth');
//Route::any('/home', 'MapController@map')->middleware('auth');
Route::any('/pass/selectpassexamhall', 'PassController@selectpassexamhall')->middleware('auth');
Route::any('/pass/startexam', 'MapController@passstartexam')->middleware('auth');

Route::any('/postpasslogin', function(Request $request){
    $student_id2 = Auth::user()->student_id;
    $student_id = $request->student_id;
    $pass = $request->password;
    $name = $request->name;
    $user = DB::table('users')->where('student_id',$student_id2)->first();

    if(($pass == $user->password2)&&($student_id == $student_id2)){
        return redirect('/selectexam2');
    }
    return view('pass.login'); })->middleware('auth');

Route::get('/pass/login', function(){return view('pass.login'); })->middleware('auth');
//------------------------------------Pass-----------------------------------------------------------------------------------------------
Route::get('pass/home','PassController@home')->middleware('auth');
//-----------------------------------------------------------------------------------------------------------------
Route::get('/userresult1/{exid}','ExamController@userresults1')->middleware('auth');
Route::get('userresult1','ExamController@userresults')->middleware('auth');
//----------------------------------------------------------------------------------------------------------------------
////////////////////////////////////////////// Course Picture           ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/coursesactivites/createcourseimg','MapController@createcourseimg')->where('id','[0-9]+')->middleware('auth');
//Route::PATCH('/map/coursesactivites/storecourseimg','MapController@storecourseimg')->where('id','[0-9]+');
Route::post('/storecourseimg','MapController@storecourseimg')->where('id','[0-9]+')->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/coursesactivites/data','CourseActivitesController@index')->middleware('auth');
Route::get('/coursesactivites/create','CourseActivitesController@create')->middleware('auth');
Route::post('/create1','MapController@postcouresactivity')->middleware('auth');
Route::get('/coursesactivites/data/{id}','CourseActivitesController@show')->middleware('auth');
Route::get('/coursesactivites/data/{id}/edit','CourseActivitesController@edit')->where('id','[0-9]+')->middleware('auth');
Route::PATCH('/coursesactivites/data/{id}','CourseActivitesController@update')->where('id','[0-9]+')->middleware('auth');
Route::DELETE('/coursesactivites/data/{id}','CourseActivitesController@destroy')->where('id','[0-9]+')->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/address/data','AddressController@index')->middleware('auth');
Route::get('/address/data/{id}','AddressController@show')->middleware('auth');
Route::get('/address/data/{id}/edit','AddressController@edit')->where('id','[0-9]+')->middleware('auth');
Route::get('/address/editaddamail/{id}/edit','AddressController@editaddamail')->where('id','[0-9]+')->middleware('auth');
Route::PATCH('/address/data/{id}','AddressController@update')->where('id','[0-9]+')->middleware('auth');
Route::PATCH('/address/dataaddmail/{id}','AddressController@updateaddmail')->where('id','[0-9]+')->middleware('auth');
//////////////////////////////////////////////   Reset Password    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/address/datapass/{id}/edit','AddressController@editpass')->where('id','[0-9]+')->middleware('auth');
Route::PATCH('/address/datapass/{id}','AddressController@updatepass')->where('id','[0-9]+')->middleware('auth');
////////////////////////////////////////////// Reset Mail          ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/address/datamail/{id}/edit','AddressController@editmail')->where('id','[0-9]+')->middleware('auth');
Route::PATCH('/address/datamail/{id}','AddressController@updatemail')->where('id','[0-9]+')->middleware('auth');
Route::DELETE('/address/data/{id}','AddressController@destroy')->where('id','[0-9]+')->middleware('auth');
/////////////////////////////////////////////////////////////////////////////////////////


/////map post refrences------------------------------------------

//Route::get('/createref', 'MapController@createref' );
Route::resource('myreferences', 'MyrefController')->middleware('auth');
//Route::resource('addresses', 'AddressController');
//Route::resource('myaddress', 'myaddressController');
Route::any('updateref','MyrefController@updateRef2');
Route::get('/map/mysqcpd', 'MapController@mysqcpd')->name('map.mysqcpd')->middleware('auth');
Route::get('/map/myreferences', 'MapController@storeref')->name('map.myreferences')->middleware('auth');
//Route::get('/map/myaddresses/', 'MapController@putmyaddress');
Route::put('/map/myaddresses/{id}/edit', 'MapController@updatemyaddress')->middleware('auth');
Route::get('/map/myaddresses/', 'MapController@putmyaddress')->middleware('auth');
Route::post('/map/myreferences', 'MapController@createRef')->middleware('auth');
Route::any('/map/myreferences/3/editmyreferences', 'MapController@updateRef')->middleware('auth');
Route::any('/myreferences/{id}/edit', 'MapController@updateRef2')->middleware('auth');
Route::any('/map/ref/{id}/delete', 'MapController@delRef')->middleware('auth');
Route::any('/map/myreferences/editmyreferences', 'MapController@updateRef2')->middleware('auth');
Route::get('/map/myaccount','MapController@myaccount')->middleware('auth');
Route::get('/map/myqualifications','MapController@myqualifications')->middleware('auth');
Route::get('/map/home', 'MapController@map')->name('map/home')->middleware('auth');
//Route::get('/home', 'MapController@map')->name('map/home')->middleware('auth');

Route::get('map', 'MapController@map')->name('map')->middleware('auth');
Route::get('/home1', 'ProfileController@profile')->name('home1');

Route::get('/myprofile', 'MapController@map123')->name('myprofile')->middleware('auth')->middleware('auth');
Route::get('/resetpassword2', 'MapController@resetpassword2')->name('resetpassword2');
Route::post('/resetpassword3', 'MapController@resetpassword3')->name('resetpassword3');

Route::post('/changefullname', 'MapController@changefullname')->middleware('auth');
Route::get('/videos1', 'MapController@videos1')->name('videos1')->middleware('auth');
Route::get('/videos/part1/session1', 'MapController@part1session1')->name('videos.part1.session1')->middleware('auth');
Route::get('/videos/part1/session2', 'MapController@part1session2')->name('videos.part1.session2')->middleware('auth');
Route::get('/videos/part1/session3', 'MapController@part1session3')->name('videos.part1.session3')->middleware('auth');
Route::get('/videos/part1/session4', 'MapController@part1session4')->name('videos.part1.session4')->middleware('auth');
Route::get('/videos/part1/session5', 'MapController@part1session5')->name('videos.part1.session5')->middleware('auth');



Route::get('/videos2', 'MapController@videos2')->name('videos2')->middleware('auth');
Route::get('/videos/part2/session1', 'MapController@part2session1')->name('videos.part2.session1')->middleware('auth');
Route::get('/videos/part2/session2', 'MapController@part2session2')->name('videos.part2.session2')->middleware('auth');
Route::get('/videos/part2/session3', 'MapController@part2session3')->name('videos.part2.session3')->middleware('auth');
Route::get('/videos/part2/session4', 'MapController@part2session4')->name('videos.part2.session4')->middleware('auth');
Route::get('/videos/part2/session5', 'MapController@part2session5')->name('videos.part2.session5')->middleware('auth');
Route::get('/videos/part2/session6', 'MapController@part2session6')->name('videos.part2.session6')->middleware('auth');
Route::get('/videos/part2/session7', 'MapController@part2session7')->name('videos.part2.session7')->middleware('auth');
Route::get('/videos/part2/session8', 'MapController@part2session8')->name('videos.part2.session8')->middleware('auth');
Route::get('/videos/part2/session9', 'MapController@part2session9')->name('videos.part2.session9')->middleware('auth');

Route::get('/videos3', 'MapController@videos3')->name('videos3')->middleware('auth');

Route::get('/videos/part3/session1', 'MapController@part3session1')->name('videos.part3.session1')->middleware('auth');
Route::get('/videos/part3/session2', 'MapController@part3session2')->name('videos.part3.session2')->middleware('auth');
Route::get('/videos/part3/session3', 'MapController@part3session3')->name('videos.part3.session3')->middleware('auth');
Route::get('/videos/part3/session4', 'MapController@part3session4')->name('videos.part3.session4')->middleware('auth');
Route::get('/videos4', 'MapController@videos4')->name('videos4')->middleware('auth');

Route::get('/videos/part4/session1', 'MapController@part4session1')->name('videos.part4.session1')->middleware('auth');
Route::get('/videos/part4/session2', 'MapController@part4session2')->name('videos.part4.session2')->middleware('auth');
Route::get('/videos/part4/session3', 'MapController@part4session3')->name('videos.part4.session3')->middleware('auth');
Route::get('/videos/part4/session4', 'MapController@part4session4')->name('videos.part4.session4')->middleware('auth');

Route::get('/videos5', 'MapController@videos5')->name('videos5')->middleware('auth');
Route::get('/videos/part5/session1', 'MapController@part5session1')->name('videos.part5.session1')->middleware('auth');
Route::get('/videos/part5/session2', 'MapController@part5session2')->name('videos.part5.session2')->middleware('auth');
Route::get('/videos/part5/session3', 'MapController@part5session3')->name('videos.part5.session3')->middleware('auth');
Route::get('/videos/part5/session4', 'MapController@part5session4')->name('videos.part5.session4')->middleware('auth');
 
//------------------------------------------------------------------------------------------------------------------------------------
Route::get('/membersq/{id}', function($id){ 
    $user = User::find($id);
    $members= User::all();

    return redirect('membersq')->with('status', 'Your Data is Updated')->with('user',$user)->with('members',$members);
});
//------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ross/membersqid/{id}', function($id){
    $user = User::find($id);
    $members= User::all()->where('is_admin',2);

    return redirect('membersq')->with('status', 'Your Data is Updated')->with('user',$user)->with('members',$members);
});
//------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ExamBookingSystem', function(){
    $user = User::all();
    $members= User::all()->where('is_admin',2);

    return view('ross.exambookingsystem')->with('status', 'Your Data is Updated')->with('user',$user)->with('members',$members);
});
//------------------------------------------------------------------------------------------------------------------------------------
Route::get('/ExamBookingSystemID', function(){
    $user = User::all();
    $members= User::all()->where('is_admin',2);

    return view('ross.exambookingsystemID')->with('status', 'Your Data is Updated')->with('user',$user)->with('members',$members);
});

//--------------------Update Users Status --------------------------------------------------------------------------------------------
Route::get('/registerations/{id}', function(Request $request , $id){
    $users = User::find($id);
    //$users->status = $request->input('status');
    if($users->is_admin == 0){

    $maxid = DB::table('users')->max('student_id');
    $member_id = $maxid + 1;

            $user = User::find($id);
            $user->student_id = $member_id;
            $user->is_admin = 2;
            $user->type = ('Affliate Member (AM)');
            $user->update();

            $invoice = new Invoice;
            $invoice->invoice = 23;
            $invoice->amount = 23;
            $invoice->student_id = $id;
            $invoice->subject_id = ('Registeration');
            $invoice->description = ('Registeration');
            $invoice->save();
}
    else
    $users->type = ('pending');
    $users->is_admin = 0;

    $users->update();

    return redirect('registerations')->with('status', 'Your Data is Updated');
});
//--------------------Update Users exempt11 --------------------------------------------------------------------------------------------
Route::get('/ross/membersq2/{user_id}', function(Request $request , $user_id){
    $score = Scorecard::find($user_id);
    //$users->status = $request->input('status');
    if($score->faccount=='Exempted')
    $score->faccount = ('Avilable');
    else{
        $invoice = new Invoice;
                $invoice->invoice = 23;
                $invoice->student_id = $user_id;
                $invoice->subject_id = ('Finentian Accounting');
                $invoice->description =  ('Finentian Accounting Exempted');
                $invoice->save();
                $score->faccount = ('Exempted');}
    $score->update();
    $q = $user_id;
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
     }
    //if($q != null)
    $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
    $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
   // $id=$user->id;
    $members= User::all();
    return  redirect()->back()->with('user',$user)->with('members',$members)->with('account',$account);

   // return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account);
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  
//--------------------Update Users exempt11 --------------------------------------------------------------------------------------------
Route::get('/ross/showprofile5/{user_id}', function(Request $request , $user_id){

    $score = Scorecard::find($user_id);
    //$score = DB::table('scorecard')->where('user_id','=',$user_id)->get();
    //$users->status = $request->input('status');
    if($score->economics =='Exempted')
    $score->economics = ('Avilable');
    else
    $score->economics = ('Exempted');

    $score->update();

    return redirect('/ross/showprofile/'.$user_id)->with('status', 'Your Data is Updated')->with('score',$score);
});

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/ross/showprofile6/{user_id}', function(Request $request , $user_id){
    $score = Scorecard::find($user_id);
    //$users->status = $request->input('status');
    if($score->it=='Exempted')
    $score->it = ('Avilable');
    else
    $score->it = ('Exempted');

    $score->update();

    return redirect('/ross/showprofile/'.$user_id)->with('status', 'Your Data is Updated')->with('score',$score);
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('/membersq',function(Request $request){

    $q = $request->input('q');
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
     }else{

//if($q != null)
    $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->first();
    $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->first();
   // $id=$user->id;
    $members= User::all();
    //$account= User::find(1);

    if($count > 0)
        //return view('ross.membersq')->with('user',$user)->with('members',$members);
        return view('ross.membersq')->with('user',$user)->with('members',$members)->with('account',$account);
    else
    $members= User::all();
    return view ('ross.members')->withMessage('No Details found. Try to search again !')->with('members',$members);

     }
    
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('/profilesq',function(Request $request){

    $q = $request->input('q');
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
     }
    //if($q != null)
    $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->first();
    $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->first();
    $members = DB::table('users')->where('is_admin',2)->orderBy('student_id', 'DESC')->get();
    $q= $user->student_id;
    $phone = new Phone;
    $phone->student_id = $q;
    $phone->save();
    $email = new Email;
    $email->student_id = $q;
    $email->save();

    $phones = DB::table('phones')->where('student_id',$q)->get();
    $phones_count = DB::table('phones')->where('student_id',$q)->count();
    if($phones_count >1){
        //$deletedRows = App\Phone::where('phone', 0)->delete();        
    }
    $emails = DB::table('emails')->where('student_id',$q)->get();
    $emails_count = DB::table('emails')->where('student_id',$q)->count();
    
    if($emails_count >1){
        //$deletedRows = App\Email::where('email', 0)->delete();        

    }
    $courseactivites = DB::table('courseactivites')->where('user_id',$user->student_id)->get();
    $course_count = DB::table('courseactivites')->where('user_id',$user->student_id)->count();
    $references = DB::table('references')->where('user_id',$user->id)->get();
    $ref_count =  DB::table('references')->where('user_id',$user->id)->count();
    $memberlevel = DB::table('memberlevel')->where('student_id',$user->student_id)->get();
    $level_count =  DB::table('memberlevel')->where('student_id',$user->student_id)->count();
     if($user->student_id > 9999)
        //return view('ross.membersq')->with('user',$user)->with('members',$members);
        return view('ross.profilesq',compact('memberlevel','level_count','phones','courseactivites','emails_count','members','references','account','course_count','ref_count','phones_count','emails','user'));
    else
    $members = DB::table('users')->where('is_admin',2)->orderBy('student_id', 'DESC')->get();
    return view ('ross.profiles')->withMessage('No Details found. Try to search again !')->with('members',$members);
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('/profilesq/{id}',function(Request $request, $id){

    $q = $id;
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
     }
     //if($q != null)
    $user = User::find($id);
    $account = User::find($id);
    $members= User::all();
   /// $q= $user->student_id;
    $phone = new Phone;
    $phone->student_id = $q;
    $phone->save();
    $email = new Email;
    $email->student_id = $q;
    $email->save();

    $phones = DB::table('phones')->where('student_id',$q)->get();
    $phones_count = DB::table('phones')->where('student_id',$q)->count();
    if($phones_count >1){
        $deletedRows = App\Phone::where('phone', 0)->delete();        
    }
    $emails = DB::table('emails')->where('student_id',$q)->get();
    $emails_count = DB::table('emails')->where('student_id',$q)->count();
    
    if($emails_count >1){
        $deletedRows = App\Email::where('email', 0)->delete();        

    }
    $courseactivites = DB::table('courseactivites')->where('user_id',$user->id)->get();
    $course_count = DB::table('courseactivites')->where('user_id',$user->id)->count();
    $references = DB::table('references')->where('user_id',$user->id)->get();
    $ref_count =  DB::table('references')->where('user_id',$user->id)->count();
    $memberlevel = DB::table('memberlevel')->where('student_id',$user->student_id)->get();
    $level_count =  DB::table('memberlevel')->where('student_id',$user->student_id)->count();
     if($user->student_id > 9999)
        //return view('ross.membersq')->with('user',$user)->with('members',$members);
        return view('ross.profilesq',compact('memberlevel','level_count','phones','courseactivites','emails_count','members','references','account','course_count','ref_count','phones_count','emails','user'));
    else
    $members= User::all();
    return view ('ross.members')->withMessage('No Details found. Try to search again !')->with('members',$members);
});
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::any('/ross/membersq/{user_id}',function(Request $request,$user_id){

    $q = $request->input('q');
    $count = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->count();
    if($count < 1){
        return  redirect()->back();
     }
    //if($q != null)
    $user = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
    $account = User::where([['name','LIKE','%'.$q.'%'],['is_admin','>',0]])->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->get();
   // $id=$user->id;
    $members= User::all();
    //$account= User::find(1);

    if($count > 0)
        //return view('ross.membersq')->with('user',$user)->with('members',$members);
        return  redirect()->back()->with('user',$user)->with('members',$members)->with('account',$account);
        //return view('ross.membersq3s')->with('user',$user)->with('members',$members)->with('account',$account);
    else
    $members= User::all();
    return view ('ross.membersq')->withMessage('No Details found. Try to search again !')->with('members',$members);
});

Route::post('/user/register1',array('uses'=>'UserRegistration@postRegister'));
Route::get('/cookie/set','CookieController@setCookie');
Route::get('/cookie/get','CookieController@getCookie');
 
Route::get('/form1',function() { return view('form1'); });

Route::get('/register-edit', function(){  $users = User::all();  return view('admin.register-edit')->with('users', $users);
    });
    //  Route::get('admin/register-edit/{id}', 'admin/DashboardController@register-edit');

    
Route::get('/InvioceLasat', 'RandomController@InvioceLasat');
 
 
 
Auth::routes();

Route::get('/home6', 'HomeController@index')->name('home6');

 ;

/*

Route::get('testeditor',function() {  return view('testeditor');}); 
Route::get('index2',function() {  return view('multi.index2');}); 
Route::get('index3',function() {  return view('multi.index3');}); 
Route::get('e001',function() {    return view('exams.e001');});    
Route::get('e002',function() {    return view('exams.e002');});    
Route::get('e003',function() {    return view('exams.e003');});     
Route::get('e004',function() {     return view('exams.e004'); });      
Route::get('e005',function() {     return view('exams.e005'); });     
Route::get('e006',function() {     return view('exams.e006'); });    
Route::get('e007',function() {     return view('exams.e007'); });    
Route::get('e008',function() {     return view('exams.e008');});  
Route::get('e009',function() {     return view('exams.e009'); }); 
Route::get('e010',function() {     return view('exams.e010'); });  
Route::get('e011',function() {     return view('exams.e011'); }); 
Route::get('e012',function() {     return view('exams.e012'); });
Route::get('e013',function() {     return view('exams.e013'); });
Route::get('e014',function() {     return view('exams.e014'); });  
Route::get('e081',function() {     return view('exams.e081'); });  
Route::get('e082',function() {     return view('exams.e082'); });  
//-------------------------------Q Questionsfiles -----------------------------------------------------------------  
Route::get('q1',function() {    return view('pems.Questionsfiles.q1'); }); 
Route::get('q2',function() {    return view('pems.Questionsfiles.q2'); }); 
Route::get('q3',function() {    return view('pems.Questionsfiles.q3'); }); 
Route::get('q4',function() {    return view('pems.Questionsfiles.q4'); }); 
Route::get('q5',function() {    return view('pems.Questionsfiles.q5');}); 
Route::get('q6',function() {    return view('pems.Questionsfiles.q6');}); 
Route::get('q7',function() {    return view('pems.Questionsfiles.q7');}); 

Route::get('q8',function() {    return view('pems.Questionsfiles.q8');}); 
Route::get('q9',function() {    return view('pems.Questionsfiles.q9');});  
Route::get('q10',function() {   return view('pems.Questionsfiles.q10');});  
Route::get('q11',function() {   return view('pems.Questionsfiles.q11');});  
Route::get('q12',function() {   return view('pems.Questionsfiles.q12');});  
Route::get('q13',function() {   return view('pems.Questionsfiles.q13');});  
Route::get('q14',function() {   return view('pems.Questionsfiles.q14');});  
Route::get('q15',function() {   return view('pems.Questionsfiles.q15'); });  
Route::get('q16',function() {   return view('pems.Questionsfiles.q16'); });  
Route::get('q17',function() {   return view('pems.Questionsfiles.q17'); });  
Route::get('q18',function() {   return view('pems.Questionsfiles.q18'); });  
Route::get('q19',function() {   return view('pems.Questionsfiles.q19'); }); */
//-------------------------------End Q Questionsfiles -----------------------------------------------------------------  
//------------------------------------Start admin lte -----------------------------------------------------------------
/* Route::get('/adminbnc',function() {
return view('admin.indexbnc');
 });
Route::post('/showuserlevel','PagesController@showuserlevel');

Route::get('/AdminLTE',function() {
    return view('AdminLTE.index');
 });

 Route::get('/1',function() {
     return view('test.1');
  });
Route::get('/2',function() {
    return view('test.2');
 });
*/
 
/*
Route::resource('students', 'StudentController');
*/
/*Route::get('/admin', function(){
    return view('admin.dashboard');
});
*/