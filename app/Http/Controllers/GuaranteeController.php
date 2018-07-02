<?php

namespace App\Http\Controllers;

use App\Guarantee;

use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;


class GuaranteeController extends Controller
{    

    public function get_font() {
      $guarantee = Guarantee::where('status', 1)
      ->orderBy('id','asc')
      ->limit(1)
      ->get();//get detail show 
      $data =[
          'id' => $guarantee['0']['id'],
          'detail' => $guarantee['0']['detail'],
      ];

      $guarantees = Guarantee::where('status', 1)
      ->where('id',$guarantee['0']['id']+1)
      ->get(); 

      return view('font_pages/guarantee', ['guarantees' => $guarantees],$data);
    }
    public function get() {
      $guarantee = Guarantee::where('status', 1)
      ->orderBy('id','asc')
      ->limit(1)
      ->get();//get detail show 
      $data =[
          'id' => $guarantee['0']['id'],
          'detail' => $guarantee['0']['detail'],
      ];

      $guarantees = Guarantee::where('status', 1)
      ->where('id',$guarantee['0']['id']+1)
      ->get(); 

      return view('guarantee/guarantee', ['guarantees' => $guarantees],$data);
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

    public function edit_only(Request $request)
    {
      $guarantees = Guarantee::find($request->id);
      $guarantees->detail = $request->detail;         
      $guarantees->status = true;
      $guarantees->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
      
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
