<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use App\Models\Scholarship;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller {
 
    public function importApplications(Request $request) {
        $file = $request->file('file');
        // dd($file->getFilename());
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

        //dd($file_Contents);

        foreach ($file_Contents as $data) {
            //dd($data);
            Application::create([
                'name' => $data[1],
                'email' => $data[2],
                'submitted_on' => $data[0],
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
                'family_income' => $data[21],
                'siblings' => $data[22],
                'siblings_attending_college' => $data[23],
                'fasfa_acknowledgement' => $data[24],
                'college_choice' => $data[25],
                'college_status' => $data[27],
                'college_choice2' => $data[28],
                'college_status2' => $data[30],
                'scholarship_choice' => $data[31],
                'scholarship_choice2' => $data[32],
                'scholarship_choice3' => $data[33],
                'scholarship_choice4' => $data[34],
                'scholarship_choice5' => $data[35],
                'scholarship_choice6' => $data[36],
                'scholarship_choice7' => $data[37],
                'reference' => $data[38],
                'reference_email' => $data[39],
                'reference_relationship' => $data[40],
                'reference2' => $data[41],
                'reference_email2' => $data[42],
                'reference_relationship2' => $data[43],
                // Add more fields as needed
            ]);
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }
    
}
