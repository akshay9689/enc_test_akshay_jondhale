<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Notification;
use Illuminate\Support\Facades\DB;

use Session;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

set_time_limit(0);
class Task extends Controller
{

     
    public function task1(){

        $curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://microsoftedge.github.io/Demos/json-dummy-data/64KB.json",// your preferred link
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_TIMEOUT => 30000,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        // Set Here Your Requesred Headers
        'Content-Type: application/json',
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
   $data =  json_decode($response);
   
//    $d = array();
//    foreach($data as $data1)  
//     $d = $data1[0];
//    }

    $name = array();

     for($i=0; $i < count($data); $i++){

        $name[] = $data[$i]->name;

     }
     
}
   
       return view('task1', compact('name'));

    
    }


    public function task2(){

        return view('task2');

    }


    public function add(Request $req)
    {
       $start = microtime(true);
        $firstname = $req->firstname;
        $lastname = $req->lastname;

        $data = array(
          
            'firstname' => $firstname,
            'lastname' => $lastname,
    
          );

       
     $insert = DB::table('task2')->insertGetId($data);

     $end = microtime(true);

     $etime = $end - $start;

    

     $update = DB::table('task2')->where('id', $insert)->update(['exe_time' => $etime]);
     return redirect()->back();
        }

}
