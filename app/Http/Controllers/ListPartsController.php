<?php

namespace App\Http\Controllers;

use App\ListPart;
use Illuminate\Http\Request;

class ListPartsController extends Controller
{    
  public function get_list_parts_by_id(Request $request) {
    // echo $id;exit();
    $list_parts = ListPart::where('import_parts_id',$request->id)
    ->get();
    // echo $list_parts;exit();
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
      $list_parts->generation = $request->generation;
      $list_parts->number = $request->number;
      // $list_parts->pay_in = $request->pay_in;
      $list_parts->pay_out = $request->pay_out;
      $list_parts->status = true;
      $list_parts->save();
      $request->session()->flash('list_status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

      $list_parts = ListPart::where('import_parts_id',$request->import_parts_id)
      ->get();

      $import_parts_id['import_parts_id']=$request->import_parts_id;

    return view('list_part/list-part', ['list_parts' => $list_parts],$import_parts_id);
  }
  public function edit(Request $request)
  { 
      // echo $request['import_parts_id'];exit();
      $list_parts = ListPart::find($request->id);
      $list_parts->import_parts_id = $request->import_parts_id;
      $list_parts->name = $request->name;
      $list_parts->generation = $request->generation;
      $list_parts->number = $request->number;
      // $list_parts->pay_in = $request->pay_in;
      $list_parts->pay_out = $request->pay_out;
      $list_parts->status = true;
      $list_parts->save();
      $request->session()->flash('list_status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว');

      $list_parts = ListPart::where('import_parts_id',$request->import_parts_id)
      ->get();

      $import_parts_id['import_parts_id']=$request->import_parts_id;

    return view('list_part/list-part', ['list_parts' => $list_parts],$import_parts_id);
  }
  public function delete(Request $request)
  {
    $list_parts = ListPart::find($request->id);
    // $list_parts->status = 0;
    if($list_parts->status==1){
      $list_parts->status = 0;
      $list_parts2=session()->flash('list_status_delete', 'ปิดการใช้งานรายการอะไหล่เรียบร้อยแล้ว'); 
    }
    elseif($list_parts->status==0){
      $list_parts->status = 1;
      $list_parts2=session()->flash('list_status_delete', 'เปิดการใช้งานรายการอะไหล่เรียบร้อยแล้ว');
    }
    $list_parts->save();

    $list_parts = ListPart::where('import_parts_id',$request->import_parts_id)
      ->get();

      $import_parts_id['import_parts_id']=$request->import_parts_id;

      return view('list_part/list-part', ['list_parts' => $list_parts],$import_parts_id);
  }

   
}
