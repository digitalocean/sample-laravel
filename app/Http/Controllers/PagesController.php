<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use App\Page;
use App\Level;
use App\User;
use App\Member_level;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function getContact()
    {
        return view('pages.contact');
    }
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'min:10' ]);
            $data = array ('email' => $request->email,
                'subject' => $request->subject,
                'bodyMessage' => $request->message,
                'survey' => ['Q1' => "hello", 'Q2' => "YES"]
            );


            Mail::send('emails.contact', $data, function($message) use ($data){
                $message->form($data['email']);
                $message->to('seralkhatem123@gmail.com');
                $message->subject($data['subject']);

            });

    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        $data = array(
            'title' => 'services',
            'services' =>  ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data);
    }
//--------------------NEW PAGESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS
    public function index($id=0){

        // Fetch all records
        $userData['data'] = Page::getuserData();

        $userData['edit'] = $id;

        // Fetch edit record
        if($id>0){
          $userData['editData'] = Page::getuserData($id);
        }

        // Pass to view
        return view('page.index')->with("userData",$userData);
      }

      public function save(Request $request){

        if ($request->input('submit') != null ){

          // Update record
          if($request->input('editid') !=null ){
            $name = $request->input('name');
            $email = $request->input('email');
            $editid = $request->input('editid');

            if($name !='' && $email != ''){
               $data = array('name'=>$name,"email"=>$email);

               // Update
               Page::updateData($editid, $data);

               Session::flash('message','Update successfully.');

            }

          }else{ // Insert record
             $name = $request->input('name');
             $email = $request->input('email');
             $email = $request->input('email');

             if($name !='' && $email !='' && $email != ''){
                $data = array('name'=>$name,"email"=>$email,"email"=>$email);

                // Insert
                $value = Page::insertData($data);
                if($value){
                  Session::flash('message','Insert successfully.');
                }else{
                  Session::flash('message','email already exists.');
                }

             }
          }

        }
        return redirect()->action('PagesController@index',['id'=>0]);
      }

      public function deleteUser($id=0){

        if($id != 0){
          // Delete
          Page::deleteData($id);

          Session::flash('message','Delete successfully.');

        }
        return redirect()->action('PagesController@index',['id'=>0]);
      }
      
Public function  showuserlevel(Request $request){
  $q = $request->input('q');
  //if($q != null)
  $user = User::where('name','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('student_id','LIKE','%'.$q.'%')->first();
  $student_id = $user->student_id;     
  $member_level=DB::table('memberlevel')->where('student_id',$student_id)->get();
  $level = Level::all();                       

//return view('home.showuserlevel')->with('member_level',$member_level);
  if($user->student_id > 9999)
      //return view('ross.membersq')->with('user',$user)->with('members',$members);
  return view('home.showuserlevel')->with('member_level',$member_level)->with('user',$user)->with('level',$level);
else
$members= User::all();
return view ('quotes.index')->withMessage('No Details found. Try to search again !')->with('members',$members);

} 
}
