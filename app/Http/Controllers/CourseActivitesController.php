<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourcesActivity;
use App\User;
use App\Courseimg;
use App\PdfCertificate;
use Auth;
use Hash;
use Image;
use DB;


class CourseActivitesController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
        //$this->middleware(['auth','verified']);
        $this->middleware(['auth']);

    }
    public function home(){
        return view('coursesactivites.home');
    }
    public function create(){
        return view('/coursesactivites/create');
    }
    public function contactus(){
        return view('coursesactivites.contactus');
    }
    public function store(Request $request){
        $data = new CourcesActivity;
        $data->coursetitle = $request->coursetitle;
        $data->description = $request->description;
        $data->numberhourse = $request->numberhourse;
        $data->coursestartdate = $request->coursestartdate;
        $data->courselocation = $request->courselocation;
        $data->user_id = Auth::user()->id;
        $data->save();
        return redirect('/map/mysqcpd');
    }
    public function show($id){
        $data = CourcesActivity::find($id);
        return view('coursesactivites.show', compact('data'))->with('data',$data);
    }
    public function index(){

        $data = CourcesActivity::all();

        return view('coursesactivites.data',compact('data'));
    }
    public function update(Request $request, $id){
        $data = CourcesActivity::find($id);
        $data->coursetitle = $request['coursetitle'];
        $data->description = $request['description'];
        $data->numberhourse = $request['numberhourse'];
        $data->coursestartdate = $request['coursestartdate'];
        $data->courselocation = $request['courselocation'];
        $data->save();
        return redirect("/coursesactivites/data/$id/edit");
    }
    public function edit($id){
        $data = CourcesActivity::find($id);
        return view('coursesactivites.edit',compact('data'));
    }
    public function destroy($id){
        //Here with this function I am first finding the id and
        // then I am deleting it.
        CourcesActivity::find($id)->delete();
        //After deleting it I am going to redirect back to the uc. in my case.
        //this will call the index method of my controller.
        // Okay lemme show you.
        return redirect('/coursesactivites/data');
    }


    public function coursePictureUpload(Request $request){
        if($request->hasFile('coursepic')){
            $coursepic = $request->file('coursepic');
            $filename = time().".".$coursepic->getClientOriginalExtension();
            Image::make($coursepic)->resize(250,250)->save(public_path('img1/'.$filename));
            $id=Auth::user()->id;
            $coursepic = new Courseimg;
            $coursepic->user_id = $id;
            $coursepic->courseimg = $filename;
            $coursepic->save();
           /* if($request->hasFile('coursepic')){
                $coursepic = $request->file('coursepic');
                $filename = time().".".$coursepic->getClientOriginalExtension();
                Image::make($coursepic)->resize(250,250)->save(public_path('/'.$filename));
                $user = Auth::user();
                $user->avatar = $filename;
                $user->save();
                }*/
           /* $user = Auth::user();
            $user->avatar = $filename;
            $user->save();*/
            }
            return back()->with('message', 'Profile Picture Uploaded Successfuly');
           // return 46;
    }
    public function coursePictureUpload2(Request $request){
            $this->validate($request, [
               // 'title' => 'required','body' => 'required',
                'courseimg' => 'nullable|max:5999' ]);




                
 // $uniqueFileName = uniqid().$request->file('coursepic')->getClientOriginalName().'.'. $request->get('coursepic')->getClientOriginalExtension();

        
               // return redirect()->back()->with('success', 'File uploaded successfully.');

                        //Handle File Upload
                    if($request->hasFile('coursepic')){
                        $coursepic = $request->file('coursepic');

                        $file = $request->file('coursepic');
                        $filenamewithExt = $request->file('coursepic')->getClientOriginalName();

                        $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

                        $filename = $filename.'_'.time() . '.' . $request->file('coursepic')->extension();
                        $filePath = public_path() .'/img1/uploads/';
                        $file->move($filePath, $filename);



                        /*      return $request->file('coursepic')->getClientOriginalName();
                      } else {
                            return 'no file!';
                        }*/
               // if($request->hasfile('courseimg')){
                    //Get File Name With Extension
                    $filenamewithExt = $request->file('coursepic')->getClientOriginalName();
                    //Get just file name
                    $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
                    //Get just extension
                    //$extension = $request->file('coursepic')->getOriginalClientExtension();
                    //File Name to store
                    $fileNameToStore=$filename.'_'.time().'.pdf';
                    //Uploade Image

                    //$request->get('coursepic')->move(public_path('img1').$fileNameToStore);
                   // $request->get('coursepic')->move('public/courseimgs', $fileNameToStore);



            //$filename = time().".".$coursepic->getClientOriginalExtension();
            //Image::make($coursepic)->resize(250,250)->save(public_path('img1/'.$filename));
            $id=Auth::user()->id;
            $coursepic = new PdfCertificate;
            $coursepic->user_id = $id;
            $coursepic->courseimg = $fileNameToStore;
            $coursepic->save();
           /* if($request->hasFile('coursepic')){
                $coursepic = $request->file('coursepic');
                $filename = time().".".$coursepic->getClientOriginalExtension();
                Image::make($coursepic)->resize(250,250)->save(public_path('/'.$filename));
                $user = Auth::user();
                $user->avatar = $filename;
                $user->save();
                }*/
           /* $user = Auth::user();
            $user->avatar = $filename;
            $user->save();*/
            }
            return back()->with('message', 'Profile PDF Uploaded Successfuly');
           // return 46;
    }
}
