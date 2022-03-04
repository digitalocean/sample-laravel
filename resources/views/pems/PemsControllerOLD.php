<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Phone;
use App\Email;
use App\Exam;
use App\Question;
use DB;
use Session;
use Hash;
use Image;
use PDF;
use Mail;
use App\Ref_result;
use App\Admin;
use App\Student;
use App\Payment;
use App\Subject;
use App\Invoice;
use App\Scorecard;
use App\Proctordate;
use App\Mail\SendMailable2;
use App\Mail\SendBulkmail;
use App\Mail\SendBooking;
use App\Mail\SendInvoice;
use App\Mail\SendPayment;
use App\Mail\SendExemptExam;
class PemsController extends Controller
{
    
public function  addadmin(Request $request){
    $reg = new User;
    $reg->name=  $request->username." " .$request->lastname;
    $reg->firstname=  $request->username;
    $reg->lastname= $request->username;
    $reg->town= 'Khartoum';
    $reg->country= 'sd';
    $reg->is_admin= 1;
    $reg->phone = 01000000000;
    $reg->country = 'Sudan';
    $reg->email = $request->email;
    $reg->gender = 'Empty';
    $email = $request->email;
    $reg->title = 'Empty';
    $reg->password2 = $request->password;
    if($request->password != 0){
    
    //$reg->password = Hash::make($request->password);
    //
    //$reg->password = md5($request->password);
    $reg->password = bcrypt($request->password);
    
    $reg->save();
    
        $name[1] = $request->username;
        $name[2] = $request->phone;
        $name[3] = $request->email;
        Mail::to($request->email)->send(new PendingRegisteration($name));
    
    $user = DB::table('users')->where('email',$request->email);
    $data = array(
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,);
     
    
    $admins = DB::table('users')->where('is_admin',1)->get();
   // $user = DB::table('users')->where('email',$request->email);
    return redirect()->back()->with('admins',$admins);
    }
}
    public function home(){
        return view('pems.home');
    }    
    public function certificate2(){
        return view('pems.certificate2');
    }   
    public function startexam(){
        return view('pems.startexam');
    }
    public function exams(){
        return view('pems.exams');
    }
    public function questions(){
        return view('pems.questions');
    }
    public function results(){
        return view('pems.results');
    }
    public function certificates(){
        return view('pems.certificates');
    }
    public function mails(){
        return view('pems.mails');
    }
    public function showquestion(){
        return view('pems.showquestion');
    }
    
    

    public function sendbulkemail(Request $request){ 
$msg['name'] = $request->message;
                $msg['email'] = $request->message;
                $msg['subject'] = $request->subject;
                $msg['body'] = $request->body;
                $msg['studebt_id'] = $request->message;
                $members= DB::table('users')->limit(3)->get();
        foreach($members as $user){
            if($user->student_id > 9999){

                $msg['receiptiont'] = $user->student_id;
                $email = $user->email; 
 
            Mail::to($user->email)->send(new SendBulkmail($msg));

            } 
            

        }
       
        return view('pems.bulkemail')->with('members',$members);
//dd($exam);
        //return redirect()->back();
        //return view('pems.examsedit')->with('exam',$exam);
    }   public function examsedit($examcode){
        //$exam = Exam::find($examcode);
        //$examcode = $request->examcode;
        //$examtitle = $request->examtitle;
        $exam= DB::table('exam')->where('examcode',$examcode)->first();
        //$exam->examtitle =$examtitle;
      //  $exam->update();
        return view('pems.examsedit')->with('exam',$exam);
//dd($exam);
        //return redirect()->back();
        //return view('pems.examsedit')->with('exam',$exam);
    }
    public function examsedit2(Request $request,$examcode){
        //$exam = Exam::find($examcode);
        //$examcode = $request->examcode;
        $examtitle = $request->input('examtitle');
        $realcode = $request->input('realcode');
        $exam= DB::table('exam')->where('examcode',$examcode)->first();
        $exam->examtitle =$examtitle;
        DB::table('exam')->where('examcode',$examcode)->update(['examtitle' => $examtitle,'realcode'=>$realcode]);

        //$exam->save();
        //return dd($exam);
        return view('pems.exams')->with('exam',$exam);

    }
    public function examQedit(Request $request,$examcode){
   
        $exam= DB::table('exam_question')->where('examcode',$examcode)->get();
        return view('pems.examquestionedit')->with('exam',$exam)->with('examcode',$examcode);
 
    } 
    public function selectquestion(){
        $qno = 0;
        $examcode = 0;
        $questions= DB::table('exam_question')->where('examcode',$examcode)->get();
        $qcount= DB::table('exam_question')->where('examcode',$examcode)->count();
        $exam= DB::table('exam')->get();
        return view('pems.selectquestion')->with('examcode',$examcode)->with('exam',$exam)->with('qcount',$qcount)->with('questions',$questions)->with('qno',$qno);
 
    }

    public function addnewquestion(Request $request,$examcode){
        //        $id=$request->id;
                $question = New Question;
               // $question->owner_id=$request->online;
                $question->examcode=$examcode;
                $question->question=$request->question;
                $question->option_A=$request->option_A;
                $question->option_B=$request->option_B;
                $question->option_C=$request->option_C;
                $question->option_D=$request->option_D;
                //$marks=$request->marks;
                $question->correct_option=$request->correct_option;
                $question->save();
        
               // DB::table('exam_question')->where('id',$id)->update(['id' => $id,'question'=>$question,'option_A'=>$option_A,'option_B'=>$option_B,'option_C'=>$option_C,'option_D'=>$option_D ,'correct_option'=>$correct_option]);
        //--------------------------------------------------------------------------------------------------
        $qno = 0;
        $examcode = $examcode;
        $questions= DB::table('exam_question')->where('examcode',$examcode)->get();
        $qcount= DB::table('exam_question')->where('examcode',$examcode)->count();
        $exam= DB::table('exam')->get();
        return view('pems.selectquestion')->with('examcode',$examcode)->with('exam',$exam)->with('qcount',$qcount)->with('questions',$questions)->with('qno',$qno);
 
            }



   
    public function selectexam(Request $request){
        $qno = 0;
        $examcode = $request->subjectid;
        $qcount= DB::table('exam_question')->where('examcode',$examcode)->count();
        $questions= DB::table('exam_question')->where('examcode',$examcode)->get();
        $exam=DB::table('exam')->get();
        $exam1=DB::table('exam')->get();
        return view('pems.selectquestion')->with('examcode',$examcode)->with('exam',$exam)->with('qno',$qno)->with('questions',$questions)->with('qcount',$qcount);
 
    }
    public function selectexamquestionno(Request $request){
       // $qno = 0;
        $examcode = $request->qno;
        $qno = $request->qno;

        $questions= DB::table('exam_question')->where('id',$qno)->get();
        $qqq= DB::table('exam_question')->where('id',$qno)->first();
        $examcode= $qqq->examcode;
        $qcount= DB::table('exam_question')->where('examcode',$examcode)->count();
        $exam= DB::table('exam')->get();
        return view('pems.selectquestion')->with('examcode',$examcode)->with('exam',$exam)->with('qqq',$qqq)->with('qcount',$qcount)->with('questions',$questions)->with('qno',$qno);
 
    }
    public function exameditquestion(Request $request,$examcode){
        $id=$request->id;
        $question=$request->question;
        $option_A=$request->option_A;
        $option_B=$request->option_B;
        $option_C=$request->option_C;
        $option_D=$request->option_D;
        $online=$request->online;
        //$marks=$request->marks;
        $correct_option=$request->correct_option;
        DB::table('exam_question')->where('id',$id)->update(['id' => $id,'question'=>$question,'option_A'=>$option_A,'option_B'=>$option_B,'option_C'=>$option_C,'option_D'=>$option_D ,'correct_option'=>$correct_option]);
//--------------------------------------------------------------------------------------------------
        $exam= DB::table('exam_question')->where('examcode',$examcode)->get();
       // return view('pems.examquestionedit')->with('exam',$exam)->with('examcode',$examcode);
       $examcode = $request->id;
      // $examcode = $request->$request->id;
        $qno = $request->id;
      // $qno = $request->$request->id;

        $questions= DB::table('exam_question')->where('id',$qno)->get();
        $qqq= DB::table('exam_question')->where('id',$qno)->first();
        $examcode= $qqq->examcode;
        $qcount= DB::table('exam_question')->where('examcode',$examcode)->count();
        $exam= DB::table('exam')->get();
        return view('pems.selectquestion')->with('examcode',$examcode)->with('exam',$exam)->with('qqq',$qqq)->with('qcount',$qcount)->with('questions',$questions)->with('qno',$qno);
 
    }
    
    
    public function showonlinequestions(Request $request,$examcode,$qid){
        //        $id=$request->id;
                $question = New Question;
               // $question->owner_id=$request->online;
               $question->id=$qid;
               $question->examcode=$examcode;
               $question->question=$request->question;
                $question->option_A=$request->ans1;
                $question->option_B=$request->ans2;
                $question->option_C=$request->correct;
                $question->option_D=$request->ans3;
                $question->pageno=$request->pageno;
                //$marks=$request->marks;
                $question->correct_option='C';
                $question->correct_answer=$request->correct;
                
                $question->save();
        
               // DB::table('exam_question')->where('id',$id)->update(['id' => $id,'question'=>$question,'option_A'=>$option_A,'option_B'=>$option_B,'option_C'=>$option_C,'option_D'=>$option_D ,'correct_option'=>$correct_option]);
        //--------------------------------------------------------------------------------------------------
                $exam= DB::table('exam_question')->where('examcode',$examcode)->get();
              //  return view('pems.examquestionedit')->with('exam',$exam)->with('examcode',$examcode);
              return redirect()->back();
         
            }

            
   
    public function findresult(Request $request){
        $q = $request->input('q');
        $id = $request->input('q');
        $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->get();
        $account = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->get();
       // $account = DB::table('users')->Where('student_id',$q)->first();
         //$id1 = $account->student_id;

        if(count($user) > 0)
        return view('pems.findresult')->with('user',$user)->with('account',$account)->with('id',$id);
        else
        $members= User::all();
        //$subjects= Subject::all();
        $users= User::all();
        return view ('pems.results')->withMessage('No Details found. Try to search again !')->with('users',$users)->with('members',$members);
    }
    
    public function findcertificates(Request $request){
        $q = $request->input('q');
        $id = $request->input('q');
        $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->get();
        $account = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','=',$q)->get();
       // $account = DB::table('users')->Where('student_id',$q)->first();
         //$id1 = $account->student_id;

        if(count($user) > 0)
        return view('pems.findcertificates')->with('user',$user)->with('account',$account)->with('id',$id);
        else
        $members= User::all();
        //$subjects= Subject::all();
        $users= User::all();
        return view ('pems.results')->withMessage('No Details found. Try to search again !')->with('users',$users)->with('members',$members);
    }
    public function journal(){
       // $memberid=0;
        $examcode=0;
        $examtitle=Null;
        $examstatus=Null;
        $memberid=Null;
        $memberid2=Null;
        $subject=Null;
        $membername = Null;
        $results = DB::table('ref_result')->where('student_id',$memberid)->get();

         return view ('pems.journal')
                        ->with('memberid',$memberid)
                        ->with('memberid2',$memberid2)
                        ->with('examtitle',$examtitle)
                        ->with('subject',$subject)
                        ->with('examstatus',$examstatus)
                        ->with('results',$results)
                        ->with('membername',$membername);

    }
    public function getmemberjournal(Request $request){
       // $memberid=0;
        $examcode=0;
        $examtitle=Null;
        $examstatus=Null;
        $memberid=Null;
        $memberid2=Null;
        $subject=Null;
        $memberid = $request->memberid;
        $member = DB::table('users')->where('student_id',$memberid)->first();
        $results = DB::table('ref_result')->where('student_id',$memberid)->get();
        $membername = $member->name;
         return view ('pems.journal')
                ->with('memberid',$memberid)
                ->with('memberid2',$memberid2)
                ->with('membername',$membername)
                ->with('examtitle',$examtitle)
                ->with('subject',$subject)
                ->with('results',$results)
                ->with('examstatus',$examstatus);
    }
    
    public function getmemberjournalresult(Request $request,$memberid,$resultid){
        // $memberid=0;
         $examcode=0;
         $examtitle=Null;
         $examstatus=Null;
         $memberid2=Null;
         $subject=Null;
         $memberid = $memberid;
         $member = DB::table('users')->where('student_id',$memberid)->first();
         $results = DB::table('ref_result')->where('student_id',$memberid)->get();
         $results2 = DB::table('ref_result')->where('id',$resultid)->first();
         $exam = DB::table('exam')->where('examcode',$results2->examcode)->first();
         $membername = $member->name;
         $examtitle=$exam->examtitle;
         $subject='Subject : '.$exam->examtitle;        
         $memberid2='Student Account ID: '.$results2->student_id;
         $examstatus='Exam-'.$results2->pass.'<br/>';

        return view ('pems.journal')
                 ->with('memberid',$memberid)
                 ->with('memberid2',$memberid2)
                 ->with('membername',$membername)
                 ->with('examtitle',$examtitle)
                 ->with('subject',$subject)
                 ->with('results',$results)
                 ->with('results2',$results2)
                 ->with('examstatus',$examstatus);
     }
     public function savenewphone(Request $request){
        $student_id = $request->student_id;
        $memberid= $request->student_id;
        $phone = $request->phone;
        $phonetype = $request->phonetype;
        $phone = new Phone;
        $phone->phone = $request->phone;
        $phone->phonetype = $request->phonetype;
        $phone->student_id = $request->student_id;
        $phone->save();
        $users = User::all();
        $member=DB::table('users')->where('student_id',$request->student_id)->first();
        $phones = DB::table('phones')->where('student_id',$member->student_id)->get();
        $emails = DB::table('emails')->where('student_id',$member->student_id)->get();
        $users = User::all();
        $membername = $member->name;
        $memberemail = $member->email;   
        return view ('pems.memberadminq')
        ->with('member',$member)->with('users',$users)->with('phones',$phones)->with('memberid',$memberid)
        ->with('membername',$membername)->with('memberemail',$memberemail)->with('emails',$emails);
        }
        
     public function deletephone(Request $request){
        $student_id = $request->student_id;
        $memberid= $request->student_id;
        $id = $request->phone_id;
        $phone = Phone::find($id);
        $phone->delete();
        $users = User::all();
        $member=DB::table('users')->where('student_id',$request->student_id)->first();
        $phones = DB::table('phones')->where('student_id',$member->student_id)->get();
        $emails = DB::table('emails')->where('student_id',$member->student_id)->get();
        $users = User::all();
        $membername = $member->name;
        $memberemail = $member->email;   
        return view ('pems.memberadminq')
        ->with('member',$member)->with('users',$users)->with('phones',$phones)->with('memberid',$memberid)
        ->with('membername',$membername)->with('memberemail',$memberemail)->with('emails',$emails);
        }
        
        public function savenewemail(Request $request){
            $student_id = $request->student_id;
            $memberid = $request->student_id;
            $email = $request->email;
            $emailtype = $request->emailtype;
            $email = new Email;
            $email->email = $request->email;
            $email->emailtype = $request->emailtype;
            $email->student_id = $request->student_id;
            $email->save();
            $users = User::all();
            $member=DB::table('users')->where('student_id',$request->student_id)->first();
            $phones = DB::table('phones')->where('student_id',$member->student_id)->get();
            $emails = DB::table('emails')->where('student_id',$member->student_id)->get();
            $users = User::all();
            $membername = $member->name;
            $memberemail = $member->email;   
            return view ('pems.memberadminq')
            ->with('member',$member)->with('users',$users)->with('phones',$phones)->with('memberid',$memberid)
            ->with('membername',$membername)->with('memberemail',$memberemail)->with('emails',$emails);
            }
            public function deleteemail(Request $request){
                $student_id = $request->student_id;
                $memberid = $request->student_id;
                $emailid = $request->email_id;
                $id = $request->email_id;
                $email = Email::find($id);
                $email->delete();
                $users = User::all();
                $member=DB::table('users')->where('student_id',$request->student_id)->first();
                $phones = DB::table('phones')->where('student_id',$member->student_id)->get();
                $emails = DB::table('emails')->where('student_id',$member->student_id)->get();
                $users = User::all();
                $membername = $member->name;
                $memberemail = $member->email;   
                return view ('pems.memberadminq')
                ->with('member',$member)->with('users',$users)->with('phones',$phones)->with('memberid',$memberid)
                ->with('membername',$membername)->with('memberemail',$memberemail)->with('emails',$emails);
                }
                public function updateaddress(Request $request){
                    $student_id = $request->student_id;
                    $memberid = $request->student_id;
                    $deliveryaddress = $request->deliveryaddress;
                    $invoiceaddress =$request->invoiceaddress ;
                    $transscriptaddress=$request->transscriptaddress ;
                    DB::table('users')
                    ->where('student_id', $student_id)
                    ->update(['deliveryaddress' => $deliveryaddress,'invoiceaddress' => $invoiceaddress,'transscriptaddress' => $transscriptaddress]);
                    $users = User::all();
                    $member=DB::table('users')->where('student_id',$request->student_id)->first();
                    $phones = DB::table('phones')->where('student_id',$member->student_id)->get();
                    $emails = DB::table('emails')->where('student_id',$member->student_id)->get();
                    $users = User::all();
                    $membername = $member->name;
                    $memberemail = $member->email;   
                    return view ('pems.memberadminq')
                    ->with('member',$member)->with('users',$users)->with('phones',$phones)->with('memberid',$memberid)
                    ->with('membername',$membername)->with('memberemail',$memberemail)->with('emails',$emails);
                    }
                    public function updateinformation(Request $request){
                        $student_id = $request->student_id;
                        $memberid = $request->student_id;
                        $address_type = $request->address_type;
                        $house =$request->house;
                        $street =$request->street;
                        $town =$request->town;
                        $ZIPcode =$request->ZIPcode;
                        DB::table('users')
                        ->where('student_id', $student_id)
                        ->update(['deliveryaddress' => $address_type,'house' => $house,'street' => $street,'town' => $town,'ZIPcode' => $ZIPcode]);
                        $users = User::all();
                        $member=DB::table('users')->where('student_id',$request->student_id)->first();
                        $phones = DB::table('phones')->where('student_id',$member->student_id)->get();
                        $emails = DB::table('emails')->where('student_id',$member->student_id)->get();
                        $users = User::all();
                        $membername = $member->name;
                        $memberemail = $member->email;   
                        return view ('pems.memberadminq')
                        ->with('member',$member)->with('users',$users)->with('phones',$phones)->with('memberid',$memberid)
                        ->with('membername',$membername)->with('memberemail',$memberemail)->with('emails',$emails);
                        }
                    
    public function showmemberadmin(Request $req){
        $memberid = NULL;
        $member=DB::table('users')->where('student_id',$req->userid)->orWhere('student_id',$req->memberid)->first();
        $users = User::all();
        $membername = 1;
        $memberemail = 1;   
        return view ('pems.memberadmin')
        ->with('member',$member)->with('users',$users)->with('memberid',$memberid)
        ->with('membername',$membername)->with('memberemail',$memberemail);
    }               
    public function showmemberadminq(Request $req){
        $memberid = $req->userid;
        $member=DB::table('users')->where('student_id',$req->userid)->orWhere('student_id',$req->memberid)->first();
        $users = User::all();
        $phones = DB::table('phones')->where('student_id',$member->student_id)->get();
        $emails = DB::table('emails')->where('student_id',$member->student_id)->get();
        $membername = $member->name;
        $memberemail = $member->email;   
        return view ('pems.memberadminq')
        ->with('member',$member)->with('users',$users)->with('memberid',$memberid)->with('emails',$emails)->with('phones',$phones)
        ->with('membername',$membername)->with('memberemail',$memberemail);
    }
    public function memberstatus(Request $req){
        $memberid = NULL;
        $member=DB::table('users')->where('student_id',$req->userid)->orWhere('student_id',$req->memberid)->first();
        $users = User::all();
        
        return view ('pems.memberstatus')
        ->with('member',$member)->with('users',$users);
    }
    public function memberstatusq(Request $req){
        $memberid = $req->userid;
        $member=DB::table('users')->where('student_id',$req->userid)->orWhere('student_id',$req->memberid)->first();
        $users = User::all();
        
        return view ('pems.memberstatusq')
        ->with('member',$member)->with('users',$users);
    }
    public function deletependingmembers(Request $req){
        $id = $req->id;
        $deluser=User::find($id);
        $deluser->delete();
        $invoices = DB::table('invoices')->where('paied',0)->get();
        $pendeingusers = DB::table('users')->where('type','Pending')->orWhere('type','Registered')->get();
        return view ('pems.pendingmembers')->with('pendeingusers',$pendeingusers)->with('invoices',$invoices);
    }
    public function pendingmembers(){
        $pendeingusers = DB::table('users')->where('type','Pending')->orWhere('type','Registered')->get();
        $invoices = DB::table('invoices')->where('paied',0)->get();
        return view ('pems.pendingmembers')->with('pendeingusers',$pendeingusers)->with('invoices',$invoices);
    }
    public function qandalive(){
        return view ('pems.qandalive');
    }
    public function qandaoffline(){
        return view ('pems.qandaoffline');
    }
    public function invoicing(){
        return view ('pems.invoicing');
    }
    public function certificate(Request $req){
        $memberid = NULL;
        $member=DB::table('users')->where('student_id',$req->userid)->orWhere('student_id',$req->memberid)->first();
          $users = User::all();
        return view ('pems.certificate')
        ->with('member',$member)->with('users',$users)->with('memberid',$memberid);
    }
    public function certificateq(Request $req){
        $memberid = $req->userid;

        $member=DB::table('users')->where('student_id',$req->userid)->first();
        $levels=DB::table('levels')->get();
          $users = User::all();
        return view ('pems.certificateq')
        ->with('member',$member)->with('users',$users)->with('levels',$levels)->with('memberid',$memberid);
    }
    public function rossusers(){
        $admins = DB::table('users')->where('is_admin',1)->get();
        return view ('pems.rossusers',compact('admins'));
    }
    public function allresult(){
        $member_id = 0;
        $users = User::all();
        return view ('pems.allresult',compact('users','member_id'));
    }
    public function allresultq(Request $req){
        $users = User::all();
        $member_id = $req->userid;
        $member=DB::table('users')->Where('student_id',$member_id)->first();
        $member_id = $member->student_id;
        return view ('pems.allresult',compact('member','users','member_id'));
    }
    public function downloadresult(Request $req,$id){
        $results = DB::table('result')->where('attempno',$id)->get();
        $ref_result = DB::table('ref_result')->where('id',$id)->first();
        $exam = DB::table('exam')->where('examcode',$ref_result->examcode)->first();
        $users = User::all();
        $member_id = $ref_result->student_id;
        $member=DB::table('users')->Where('student_id',$member_id)->first();
        $member_id = $member->student_id;

        $pdf = PDF::loadView('pems.allresultdownload', compact('member','users','exam','member_id','results','ref_result'));
        $refid = $ref_result->id;
        $date = $ref_result->student_id;
        $pdfname = $date.$refid.'.pdf';
        return $pdf->stream( $pdfname);
    }

    public function bulkemail(){
        return view ('pems.bulkemail');
    }
         
}
