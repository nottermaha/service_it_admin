<?php

namespace App\Http\Controllers;


use App\Persons;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class AuthenController extends Controller
{    

      public function login(Request $request) {
        // echo $id;exit();
        $result = Persons::where('status', 1)
        ->where('username',$request->username)
        ->where('password',$request->password)
        ->get();
        if($result!='[]'){
          // echo 'rrr';exit();
          session(['key'=>$request->username]); 
          session(['key3'=>$result['0']['type'] ]); 
          session(['key2'=>$result['0']['store_branch_id'] ]); 
          if (session()->has('key2')) { 
            $data=session('key2','default'); 
                    // echo 'kk'.$data;exit();
          } 
          
          return redirect('gallery');
        }
        else if($result=='[]'){
          return redirect('gallery');
        }
       
        // return view('gallery/gallery', ['gallerys' => $gallerys]);
      }
      public function logout() {
        $request->session()->forget('key');  
        $request->session()->flush(); 
        $request->session()->forget('key2');  
        $request->session()->flush();
        $request->session()->forget('key3');  
        $request->session()->flush();  
      return redirect('gallery');
      } 
   
}
