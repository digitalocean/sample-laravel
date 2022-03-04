<?php

namespace App\Http\Controllers;
 use Importer;

use Illuminate\Http\Request;
use Users;
use DB;
use Excell;
use App\Imports;
use Maatwebsite\Excel\Facades\Excel;
//use Maatwebsite\Excel\Excel;

class BasicController extends Controller
{
    public function sendmail(Request $request){
        $data["email"]=$request->get("email");
        $data["client_name"]=$request->get("client_name");
        $data["subject"]=$request->get("subject");

        $pdf = PDF::loadView('mails.mail', $data);

        try{
            Mail::send('mails.mail', $data, function($message)use($data,$pdf) {
            $message->to($data["email"], $data["client_name"])
            ->subject($data["subject"])
            ->attachData($pdf->output(), "invoice.pdf");
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return response()->json(compact('this'));
    }

    public function comments(){
        $data = DB::table('comments')->get();
        return view('comments',compact('data'));
    }



    public function import(Request $request){
        $this->validate($request,[
            //'select_file' => 'required|'//Mimes:xls,xlsx'
        ]);
        $path = $request->file('select_file')->getRealPath();

        $data = Importer::make('Excel');
        $data->load($path);
        $collection = $data->getCollection();
        //dd($collection)9


        //$data = Excell::load($path)->get();
        if($data->count > 0)
        {
            foreach($value as $row)
            {
                $insert_data [] = array(
                    'name' =>  $row['name'],
                    'email' =>  $row['email'],
                    'subject' =>  $row['subject'],
                    'message' =>  $row['message'],
               ); 
            }
        }
        if(!empty($insert_data))
        {
            DB::table('comments')->insert($insert_data);
        }
        $data = DB::table('comments')->get();
        return redirect()->back()->with('data',$data)->with('Success', 'Daa Uploaded Successfuly ..!');
    }


     /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('comments');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import1() 
    {
        Excel::import(new Imports,request()->file('file'));
           
        return back();
    }



 }
