<?php

namespace App\Http\Controllers;

use App\Guarantee;

use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;


class GuaranteeController extends Controller
{    

    public function get() {
      $guarantees = Guarantee::where('status', 1)
      ->get();

      return view('guarantee/guarantee', ['guarantees' => $guarantees]);
    }

    public function create(Request $request)
    {
        $guarantees = new Guarantee;
        $guarantees->name = $request->name;        
        $guarantees->status = true;
        $guarantees->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 
        return redirect('guarantee');
    }
    public function edit(Request $request)
    {
      $guarantees = Guarantee::find($request->id);
      $guarantees->name = $request->name;         
      $guarantees->status = true;
      $guarantees->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
      
      return redirect('guarantee');
    }
    public function delete($id)
    {
      $guarantees = Guarantee::find($id);      
      $guarantees->status = 0;
      $guarantees->save();
      $gallerys2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 
      
      return redirect('guarantee');
    }
    
   
}
