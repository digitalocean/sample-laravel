<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use PDF;
use Auth;
use DB;
use App\Customer;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
   public function basic_email() {
      $data = array('name'=>"Virat Gandhi");

   /*   Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });*/
      echo "Basic Email Sent. Check your inbox.";
   }
   public function html_email() {
      $data = array('name'=>"Virat Gandhi");
    /*  Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });*/
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email() {
      $data = array('name'=>"Virat Gandhi");
   /*   Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
         $message->attach('C:\Users\Administrator\Desktop\nbclogo.jpg');
         $message->attach('C:\Users\Administrator\Desktop\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });*/
      echo "Email Sent with attachment. Check your inbox.";
   }

//-----------------------------------POST CONTACT to sent attach pdf mail-----------------------------------------------
   public function postContact(Request $request){
       $i= 1;
       $id = Auth::user()->student_id;
    $exams = DB::table('ref_result')->where('student_id','=',$id)->get();

   /* $this->validate($request, [
        'name' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'message' => 'required|min:20',
        'checkbox' => 'required']);
*/
$data = array(
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request ->email,
        'checkbox' => $request ->checkbox,
        'bodyMessage' => $request->message,
        'id' => Auth::user()->id,
        'name' => Auth::user()->name,
        'email' => Auth::user()->email,
        $exams,
        $id,
        $i
       // 'id' => Auth::user()->id,
       // 'id' => Auth::user()->id,
       // 'id' => Auth::user()->id,

    );

 //code to send email to my inbox
/* Mail::send('mails.sendMail5', $data, function($message) use ($data){
    $message->from('info@acpa-global.com');
    $message->to($data['email']);
}); */

//Feedback mail to client
$pdf = PDF::loadView('/', $data)->setPaper('a4');
/* Mail::send('mails.sendMail5', $data, function($message) use ($data,$pdf){
        $message->from('info@acpa.com');
        $message->to($data['email']);
        $message->subject('Thank you message');
        //Attach PDF doc
        $message->attachData($pdf->output(),'customer.pdf');
    }); */
    $pdf_name = time() . ".pdf";
    $path = public_path('/' . $pdf_name);
    $pdf = PDF::loadView('mail')->save($path);

//Session::flash('success', 'Hello &nbsp;'.$data['name'].'&nbsp;Thank You for choosing us. Will reply to your query as soon as possible');

//Storage::put('public/pdf/invoice.pdf', $pdf->output());

//return $pdf->download('invoice.pdf');
return redirect()->back();
   }
   /*
public function testMail(){
    $my_pdf_path_for_example = 'mail/' . str_random(25) . '.pdf';
        PDF::loadHTML('<h1>Test</h1> ')->save($my_pdf_path_for_example );
        $model =1;
      //  $model = SomeCoolModel::find(request('id') );

        $model->path_to_pdf = $my_pdf_path_for_example ;
        $model->save();
        return response()
    ->download($my_pdf_path_for_example );
    return 44;
}*/
public function export_pdf()
{
  // Fetch all customers from database
  $data = Customer::get();
  // Send data to the view using loadView function of PDF facade
  $pdf = PDF::loadView('/exportpdf2', $data);
  // If you want to store the generated pdf to the server then you can use the store function
  $pdf->save(storage_path().'_filename.pdf');
  // Finally, you can download the file using download function
  return $pdf->download('thisdtestpdf.pdf');
}

}
