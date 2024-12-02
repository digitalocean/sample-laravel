<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller {
 
    public function importApplications(Request $request) {
        $file = $request->file('file');
        //dd($file->getFilename());
        foreach($file as $file) {
            $target = $file->move(storage_path('files'), $file->getClientOriginalName());
            $path = $target->getPath() . DIRECTORY_SEPARATOR . $target->getFileName();
        }
        // Storage::disk('local')->put($file)
        // $fileContents = file($path);
        $csv_arr = array_map('str_getcsv', file($path));

        $csv_json = json_encode($csv_arr, JSON_UNESCAPED_UNICODE);
        $csv_json = str_replace("\xEF\xBB\xBF",'',$csv_json); 
        $file_Contents = json_decode($csv_json, true);

        foreach ($file_Contents as $data) {

            $app = Application::create([
                'submitted_on' => $data[0],
                'name' => $data[1],
                'email' => $data[2],
                'phone' => $data[3],
                'parent_name' => $data[4],
                'application_essay' => $data[5],
                'community_service' => $data[6],
                'school' => $data[7],
                'graduation_year' => $data[8],
                'gpa' => $data[9],
                'sat_Scheduled' => $data[10],
                'sat_score' => $data[12],
                'act_scheduled' => $data[11],
                'ap_test_name' => $data[13],
                'ap_test_score' => $data[14],
                'ap_test_name2' => $data[15],
                'ap_test_score2' => $data[16],
                'college_major' => $data[17],
                'college_interest' => $data[18],
                'college_major2' => $data[19],
                'college_interest2' => $data[20],
                'family_income' => $data[21],
                'siblings' => $data[45],
                'siblings_attending_college' => $data[46],
                'fasfa_acknowledgement' => $data[24],
                'college_choice' => $data[25],
                'college_status' => $data[27],
                'college_choice2' => $data[28],
                'college_status2' => $data[30],
                'reference' => $data[38],
                'reference_email' => $data[39],
                'reference_relationship' => $data[40],
                'reference2' => $data[41],
                'reference_email2' => $data[42],
                'reference_relationship2' => $data[43],
                // Add more fields as needed
            ]);

            //dd($app);
            if( $data[31] != Null  ){
                //dd($data[31]);
                $sch = Scholarship::where('name', $data[31])->get();
                //dd($sch);
                if($sch != Null ) {
                    $a = DB::table('scholarship_applications')->insert([
                        ['scholarship_id' => $sch[0]['id'], 'application_id' => $app->id],
                    ]);
                }
            }

            if( $data[32] != " "  ){
                $sch = Scholarship::where('name', $data[32])->get();
                //dd($sch);
                if($sch != Null ) {
                    $a = DB::table('scholarship_applications')->insert([
                        ['scholarship_id' => $sch[0]['id'], 'application_id' => $app->id],
                    ]);
                }
                // dd($a);
            }
            if( $data[33] != " " ){
                //dd($sch);
                $sch = Scholarship::where('name', $data[33])->get();
                if($sch != Null ) {
                    $a = DB::table('scholarship_applications')->insert([
                        ['scholarship_id' => $sch[0]['id'], 'application_id' => $app->id],
                    ]);
                }
            }
            if( $data[34] != " " ){
                $sch = Scholarship::where('name', $data[34])->get();
                if($sch != Null ) {
                    $a = DB::table('scholarship_applications')->insert([
                        ['scholarship_id' => $sch[0]['id'], 'application_id' => $app->id],
                    ]);
                }
            }
            if( $data[35] != " " ){
                //dd($sch);
                $sch = Scholarship::where('name', $data[35])->get();
                if($sch != Null ) {
                    $a = DB::table('scholarship_applications')->insert([
                        ['scholarship_id' => $sch[0]['id'], 'application_id' => $app->id],
                    ]);
                }
            }
            if( $data[36] != " " ){
                $sch = Scholarship::where('name', $data[36])->get();
                if($sch != Null ) {
                    $a = DB::table('scholarship_applications')->insert([
                        ['scholarship_id' => $sch[0]['id'], 'application_id' => $app->id],
                    ]);
                }
            }
            if( $data[37] != " " ){
                $sch = Scholarship::where('name', $data[37])->get();
                if($sch != Null ) {
                    $a = DB::table('scholarship_applications')->insert([
                        ['scholarship_id' => $sch[0]['id'], 'application_id' => $app->id],
                    ]);
                }

            }
        }


        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
    
}
