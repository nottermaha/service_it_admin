<?php

namespace App\Http\Controllers;

use App\ListPart;
use Illuminate\Http\Request;

class ListPartsController extends Controller
{    
  public function get_list_parts_by_id(Request $request) {
    // echo $id;exit();
    $list_parts = ListPart::where('status', 1)
    ->where('import_parts_id',$request->id)
    ->get();

    $import_parts_id['import_parts_id']=$request->id;
    // echo $import_parts_id['import_parts_id'];exit();
    return view('list_part/list-part', ['list_parts' => $list_parts],$import_parts_id);
  }
  public function create(Request $request)
  { 
    // echo $request;exit();
      $list_parts = new ListPart;
      $list_parts->import_parts_id = $request->import_parts_id;
      $list_parts->name = $request->name;
      $list_parts->general = $request->general;
      $list_parts->type_part = $request->type_part;
      $list_parts->number = $request->number;
      $list_parts->pay_in = $request->pay_in;
      $list_parts->pay_out = $request->pay_out;
      $list_parts->status = true;
      $list_parts->save();
      $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

      return redirect('list-part/'.$list_parts['import_parts_id']);
  }
  public function edit(Request $request)
  { 
      $list_parts = ListPart::find($request->id);
      $list_parts->import_parts_id = $request->import_parts_id;
      $list_parts->name = $request->name;
      $list_parts->general = $request->general;
      $list_parts->type_part = $request->type_part;
      $list_parts->number = $request->number;
      $list_parts->pay_in = $request->pay_in;
      $list_parts->pay_out = $request->pay_out;
      $list_parts->status = true;
      $list_parts->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว');

      return redirect('list-part/'.$list_parts['import_parts_id']);
  }
  public function delete($id)
  {
    $list_parts = ListPart::find($id);
    $list_parts->status = 0;
    $list_parts->save();
    $list_parts2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 

    return redirect('list-part/'.$list_parts['import_parts_id']);
  }

   
}
