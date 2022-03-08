<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Hash;
use Image;
use PDF;
use App\Student;
use App\Subject;
use App\Invoice;
use Mail;
use App\Mail\StudentExam;
use App\Mail\StudentProfile;
use Illuminate\Support\Facades\Validator;
use App\User;




class ProfileController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth','verified']);
        $this->middleware('auth');
    }
    public function profile(){
        return view('profile');
    }
    public function profileUpdate(Request $request){

        //////Validation rule
        $request->validate([
            'name'=>'required|min:6|string|max:255',
            'email'=>'required|min:4|string|max:255'
        ]);

        $user = Auth::user();
        $user->fullname = $request['fullname'];
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->phone = $request['phone'];
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->middlename = $request['middlename'];
        $user->title = $request['title'];
        $user->save();
        return back()->with('message', 'Profile Updated');

    }
    public function changePasswordForm()
    {
        return view('changepassword');
    }


    public function sendProfile(){
        $student = Student::find(1);
         //Mail::to($($student->email)->send(new StudentProfile($student));
        echo 'send Your Login Data  Successfully';

    }


    public function changePassword(Request $request)
    {
        if(!(Hash::check($request->get('currenrtpassword'), Auth::user()->password))){
            return back()->with('error', 'Your password does not match with that you provided');
        }
         if(strcmp($request->get('currenrtpassword'), $request->get('newpassword')) == 0){
             return back()->with('error', 'Your Currnt Password cannot be same with the new password');
        }
        $request->validate([
            'currenrtpassword' => 'required',
            'newpassword' => 'required|string|min:6|confirmed'
        ]);
        $user->password = bcrypt($request->get('newpassword'));
        $user->password2 = $request['newpassword'];
        $user->update();
        return back()->with('message', 'Password Change Successfuly');
    }
    public function getProfileAvatar(){
        return view('profilepicture');
    }
    public function profilePictureUpload(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().".".$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250,250)->save(public_path('/'.$filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            }
            return back()->with('message', 'Profile Picture Uploaded Successfuly');
    }

    public function admin_credential_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];
    
      $validator = Validator::make($data, [
        'current-password' => 'required',
        'password' => 'required|same:password',
        'password_confirmation' => 'required|same:password',     
      ], $messages);
    
      return $validator;
    }  
    public function postCredentials(Request $request)
{
  if(Auth::Check())
  {
    $request_data = $request->All();
    $validator = $this->admin_credential_rules($request_data);
    if($validator->fails())
    {
      return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
    }
    else
    {  
      $current_password = Auth::User()->password;           
      if(Hash::check($request_data['current-password'], $current_password))
      {           
        $user_id = Auth::User()->id;                       
        $obj_user = User::find($user_id);
        $obj_user->password = Hash::make($request_data['password']);
        $obj_user->password2 = $request_data['password'];
        $obj_user->save(); 
         return  redirect()->back();
        //return "ok";
      }
      else
      {           
        $error = array('current-password' => 'Please enter correct current password');
        return response()->json(array('error' => $error), 400);   
      }
    }        
  }
  else
  {
    return redirect()->to('/');
  }    
}
}
