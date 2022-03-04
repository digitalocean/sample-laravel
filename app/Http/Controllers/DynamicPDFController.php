<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use DB;
use PDF;
use Illuminate\Support\Facades\Auth;

class DynamicPDFController extends Controller
{
    function index()
    {
        $id = Auth::user()->id;
        $customer_data = $this->get_customer_data();
        //$references1 = $this->get_customer_data();
        $references1 = DB::table('references')->where('user_id','=',$id)->get();

        return view('dynamic_pdf')->with('customer_data', $customer_data)->with('references1', $references1);
    }

    function get_customer_data()
    {
        $id= Auth::user()->id;
        $user = DB::table('users')->where('id','=', $id)
         ->get();
     $customer_data = DB::table('users')->where('id','=', $id)
         ->limit(10)
         ->get();
         $references1 = DB::table('references')->where('user_id','=',$id)->get();

         /*$user = User::find(1);
         $references=Reference::join('users','users.id','=','references.user_id')
         ->select('users.id as id', 'references.id as id', 'references.name as name', 'references.phone as phone', 'references.address as address', 'references.email as email', 'references.relationship as relationship')
         ->get();*/
         return $customer_data;
         return $references1;
        }

    function pdf()
    {
     $pdf = \App::make('dompdf.wrapper');
     $pdf->loadHTML($this->convert_customer_data_to_html());
     return $pdf->stream();
    }

    function convert_customer_data_to_html()
    {
    $id = Auth::user()->id;
    $references1 = DB::table('references')->where('user_id','=',$id)->get();
    $customer_data = $this->get_customer_data();
    $output = '
            <h3 align="center">Customer Data</h3>
            <table width="100%" style="border-collapse: collapse; border: 20px;">
            <tr>
            <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
            <th style="border: 1px solid; padding:12px;" width="30%">Name</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Member_ID</th>
            <th style="border: 1px solid; padding:12px;" width="15%">Postal Code</th>
            <th style="border: 1px solid; padding:12px;" width="20%">ID</th>
            </tr>
     ';
     foreach($customer_data as $customer)
     {
      $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$customer->id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->name.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->student_id.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->email.'</td>
       <td style="border: 1px solid; padding:12px;">'.$customer->id.'</td>
      </tr>
      ';
     }
     foreach($references1 as $references)
     {
        $output .= '
    <tr>
    <td style="border: 1px solid; padding:12px;">'.$references->id.'</td>
    <td style="border: 1px solid; padding:12px;">'.$references->id.'</td>
    <td style="border: 1px solid; padding:12px;">'.$references->id.'</td>
    <td style="border: 1px solid; padding:12px;">'.$references->id.'</td>
    <td style="border: 1px solid; padding:12px;">'.$references->id.'</td>
    </tr>
       ';
     }
      $output .= '</table>';
     return $output;
    }


    
    function index2()
    {
        $id = Auth::user()->id;
        $customer_data = $this->get_customer_data2();
        //$references1 = $this->get_customer_data();
        $references1 = DB::table('references')->where('user_id','=',$id)->get();

        return view('dynamic_pdf2')->with('customer_data', $customer_data)->with('references1', $references1);
    }

    function get_customer_data2(Request $request)
    {
        $id= $request->student_id;
        $user = DB::table('users')->where('student_id','=', $student_id)
         ->get();
        $customer_data = DB::table('users')->where('student_id','=', $student_id)
         ->limit(10)
         ->get();
         $references1 = DB::table('references')->where('user_id','=',$id)->get();

         /*$user = User::find(1);
         $references=Reference::join('users','users.id','=','references.user_id')
         ->select('users.id as id', 'references.id as id', 'references.name as name', 'references.phone as phone', 'references.address as address', 'references.email as email', 'references.relationship as relationship')
         ->get();*/
         return $customer_data;
         return $references1;
        }

    function pdf2(Request $request)
    {
        $scheduleexamdate= $request->scheduleexamdate;
        $certificates= $request->certificates;
        $student_id= $request->student_id;
        $id= $request->student_id;
        $user = DB::table('users')->where('student_id','=', $student_id)->first();
        $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
         $references1 = DB::table('references')->where('user_id','=',$id)->get();

     $pdf = \App::make('dompdf.wrapper');



     $output = '

     <div align="center">
 
 <!--<div style="width:800px; height:100%; padding:20px; text-align:center; border: 10px double #000000; position: absolute; margin: -130px 0 0 -175px; left: 25%; top: 25%;">--->
 <div>
 <div style="width:750px; height:98%x; padding:20px; text-align:center;">
 <br><br><br><br><br><br><br><br><br>
     <span style="font-size:50px; color:#A9A9A9; font-weight:normal;padding:20px;margin:20px;">Professional Academic  Qualification</span>
 
        <br><br>
 
     <h3><em>This is to certify that</em></span>
 
        <br><br>
 
 
       <h1>'.$user->name.'</h1>
 
    <h3><em>Has achieved the Following Qualification:</em></h3>
 
    <span style="font-size:50px; color:#A9A9A9; font-weight:normal;padding:20px;margin:20px;"><b><em>'.$certificates.'</em></b></span>
 
       <p style="color:#A9A9A9;"><em>On This day</em></p>
       <p style="color:#A9A9A9;"><em>'. $scheduleexamdate.'</em></p>
       <br><br><br>
        <table style="width:100%"><tr>
        <td>Registration Number : '.$user->name.'</td><td></td><td></td>
        </tr>
        <tr><td><br></td><td></td><td></td></tr>
        <tr>
        <td>Dr. Omaima. N. Elshiek :</td><td></td><td>Dr. khaled. H. FadlElmola</td>
        </tr>
        <tr>
        <td>Dean of College</td><td></td><td>Scientific Affairs</td>
        </tr>
        </table>
       <p style="padding-right:200px;margin-right:200px;"></p><p></p>
       <div style="font-size:11px; color:#00000;">Nazlawi Business College</div>
       
 </div>
 
 </div>
 
 </div>
 
 ';
        $output .= '</table>';

     $pdf->loadHTML($output);
     return $pdf->stream();
    }

    public function export(){
        $data = ['name'=>'Sirelkhatim'];
        $data2 = ['name'=>'Gamal'];
        $pdf = PDF::loadView('pems.invoice', compact('data','data2'));
        $name = $data['name'].'.pdf';
        return $pdf->stream( $name);
    }
    public function invoice(){
        $data = ['name'=>'Sirelkhatim'];
        $data2 = ['name'=>'Gamal'];

        return  View('pems.invoice')->with('data',$data)->with('data2',$data2);
        return $pdf->stream('invoice.pdf');
    }
    public function qualificationcertificates(Request $request){
        $scheduleexamdate= $request->graduatedate;
        $certificateid= $request->certificates;
        $certificates = DB::table('levels')->where('id',$certificateid)->first();
        $student_id= $request->student_id;
        $id= $request->student_id;

        $user = DB::table('users')->where('student_id','=', $student_id)->first();
        $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
        $references1 = DB::table('references')->where('user_id','=',$id)->get();

         $pdf = PDF::loadView('pems.certificates.qualificationcertificates', compact('user','certificates','scheduleexamdate'));
         $date=date('Y-m.d');
         $pdfname =$user->student_id.$certificates->id.'.pdf';
         return $pdf->stream( $pdfname);

    }

    public function membershipicertificate(Request $request){
        $graduatedate= $request->graduatedate;
        $registerdate= $request->registerdate;
        $addpicture= $request->addpicture;
        $certificates= $request->certificates;
        $expiredate= $request->expiredate;
        $student_id = $request->student_id;
        $id= $request->student_id;
        $addpicture = $request->addpicture;
        $user = DB::table('users')->where('student_id','=', $student_id)->first();
        $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
        $references1 = DB::table('references')->where('user_id','=',$id)->get();
        $level = DB::table('levels')->where('id','=',$certificates)->first();

         $pdf = PDF::loadView('pems.membershipicertificate',
          compact('user','certificates','graduatedate','addpicture','registerdate','level','expiredate'));
          $date=date('Y-m-d');
         $pdfname = $user->student_id.$certificates.$date.'.pdf';
         return $pdf->stream( $pdfname);
    }

    public function exemptpdf($ref_id,$exam_id,$member_id){
        
        $invoice=DB::table('invoices')->where('student_id',$member_id)->where('subject_id',$exam_id)->first();
        $inv_id = $invoice->id;
        $user = DB::table('users')->where('student_id','=', $member_id)->first();
        $member = DB::table('users')->where('student_id','=', $member_id)->first();
        $exam = DB::table('exam')->where('examcode','=', $exam_id)->first();
        $lastresult  = DB::table('ref_result')->where('id','=',$ref_id)->first();

         $pdf = PDF::loadView('mails.sendexemptpdf', compact('user','member','exam','invoice','lastresult'));
         $date=date('Y-m-d');
         $pdfname = $user->student_id.$certificates.$date;
         //$pdfname = $member_id.'.pdf';
         return $pdf->stream( $pdfname);

    } 
    public function sendbookingpdf($inv_id){
       
        $invoice=DB::table('invoices')->where('id',$inv_id)->first();
        $user = DB::table('users')->where('student_id','=', $invoice->student_id)->first();
        $exam = DB::table('exam')->where('examcode','=', $invoice->subject_id)->first();
 
        $pdf = PDF::loadView('mails.sendbookingpdf', compact('user','exam','invoice'));
        $date = $invoice->student_id;
        $student_id = $user->student_id;
        $pdfname = $student_id.$inv_id.$date.'.pdf';
        return $pdf->stream( $pdfname);

    }
    
    public function downloadresult(Request $req,$id){
        $results = DB::table('result')->where('attempno',$id)->get();
        $users = User::all();
        $member_id = $req->userid;
        $member=DB::table('users')->Where('student_id',$member_id)->first();
        $member_id = $member->student_id;

        $pdf = PDF::loadView('pems.allresultdownload', compact('member','users','member_id','results'));
        $date = $invoice->student_id;
        $pdfname = $member_id.$inv_id.$date.'.pdf';
        return $pdf->stream( $pdfname);


     }


    
    public function transcriptsectioncertificate(Request $request){
        $registerdate= $request->registerdate;
        $graduatedate= $request->graduatedate;
        $certificates= $request->certificates;
        $certifiname= $request->certifiname;
        $student_id= $request->student_id;
        $id= $request->student_id;
        $addpicture = $request->addpicture;
        if($certificates == 2  ){
            $no = 4;
            $exams = DB::table('exam')->where('examcode','<=',$no)->get();
        $user = DB::table('users')->where('student_id','=', $student_id)->first();
        $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
        $references1 = DB::table('references')->where('user_id','=',$id)->get();

         $pdf = PDF::loadView('pems.certificates.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
         $date=date('Y-m-d');
         $pdfname = $user->student_id.$certificates.$date.'.pdf';
         //$pdfname = $certificates.'.pdf';
         return $pdf->stream( $pdfname);
        }else {if($certificates == 3 ){
            $no = 4;
            $exams = DB::table('exam')->where('examcode','<=',$no)->get();
         $user = DB::table('users')->where('student_id','=', $student_id)->first();
        $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
        $references1 = DB::table('references')->where('user_id','=',$id)->get();

         $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
         $date=date('Y-m-d');
         $pdfname = $user->student_id.$certificates.$date.'.pdf';
         //$pdfname = $certificates.'.pdf';
         return $pdf->stream( $pdfname);

        }else
        
        { if($certificates == 4  ){

                    $no = 8;
                    $exams = DB::table('exam')->where('examcode','<=',$no)->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
               // $pdfname = $certificates.'.pdf';
                return $pdf->stream( $pdfname);
                }elseif($certificates == 5  ){

                    $no = 8;
                    $exams = DB::table('exam')->where('examcode','<=',$no)->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
               // $pdfname = $certificates.'.pdf';
                return $pdf->stream( $pdfname);
                }

                
                
                elseif($certificates == 6  ){

                    $no = 14;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 7  ){

                    $no = 17;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examcode','!=',10],['examcode','!=',12],['examcode','!=',14],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 8  ){

                    $no = 17;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examcode','!=',14],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 9  ){

                    $no = 17;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 10  ){

                    $no = 20;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examcode','!=',15],['examcode','!=',16],['examcode','!=',17],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 11  ){

                    $no = 20;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examcode','!=',10],['examcode','!=',12],['examcode','!=',14],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 12  ){

                    $no = 20;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 13  ){

                    $no = 0;
                    $exams = DB::table('exam')->where([['examcode','=',10],['examcode','=',13],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                elseif($certificates == 14  ){

                    $no = 0;
                    $exams = DB::table('exam')->where([['examcode','<=',$no],['examtitle','!=','Empty']])->get();
                $user = DB::table('users')->where('student_id','=', $student_id)->first();
                $customer_data = DB::table('users')->where('student_id','=', $student_id)->limit(10)->get();
                $references1 = DB::table('references')->where('user_id','=',$id)->get();

                $pdf = PDF::loadView('pems.transcriptsectioncertificate', compact('user','certificates','certifiname','graduatedate','registerdate','addpicture','exams'));
                $date=date('Y-m-d');
                $pdfname = $user->student_id.$certificates.$date.'.pdf';
              //  $pdfname = $certificates;
                return $pdf->stream( $pdfname);
                }
                }
            }
    }
}
