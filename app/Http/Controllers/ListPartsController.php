<?php

namespace App\Http\Controllers;

use App\ListPart;
use App\SettingBrandPart;
use App\SettingGroupPart;

use Illuminate\Http\Request;

class ListPartsController extends Controller
{    
  public function get_list_parts_by_id(Request $request) {
    // echo $id;exit();
    $item = [
      'setting_group_part.id as group_id'
      ,'setting_group_part.name as group_name'

      ,'setting_brand_part.id as brand_id'
      ,'setting_brand_part.name as brand_name'

      ,'list_parts.id'
      ,'list_parts.setting_brand_part_id as momo'
      ,'list_parts.name'
      ,'list_parts.generation'
      ,'list_parts.number'
      ,'list_parts.pay_out'
      ,'list_parts.status'
    ];
    $list_parts = ListPart::where('list_parts.status',1)
    ->where('list_parts.import_parts_id',$request->id)
    ->leftJoin('setting_group_part','setting_group_part.id','=','list_parts.setting_group_part_id')
    ->leftJoin('setting_brand_part','setting_brand_part.id','=','list_parts.setting_brand_part_id')
    ->get($item);
    $group_parts = SettingGroupPart::where('status',1)
    ->get();
    $brand_parts = SettingBrandPart::where('status',1)
    ->get();
    // echo $list_parts;exit();
    $import_parts_id['import_parts_id']=$request->id;
    // echo $import_parts_id['import_parts_id'];exit();
    return view('list_part/list-part', ['list_parts' => $list_parts,'group_parts' => $group_parts,'brand_parts' => $brand_parts],$import_parts_id);
  }
  public function create(Request $request)
  { 
    // echo $request;exit();
      $list_parts = new ListPart;
      $list_parts->import_parts_id = $request->import_parts_id;
      $list_parts->setting_group_part_id = $request->setting_group_part_id;//
      $list_parts->setting_brand_part_id = $request->setting_brand_part_id;//
      $list_parts->name = $request->name;
      $list_parts->generation = $request->generation;
      $list_parts->number = $request->number;
      // $list_parts->pay_in = $request->pay_in;
      $list_parts->pay_out = $request->pay_out;
      $list_parts->status = true;
      $list_parts->save();
      $request->session()->flash('list_status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

      return redirect()->action(
        'ListPartsController@get_list_parts_by_id', [$request->import_parts_id]
    );
  }
  public function edit(Request $request)
  { 
      // echo $request['import_parts_id'];exit();
      $list_parts = ListPart::find($request->id);
      $list_parts->import_parts_id = $request->import_parts_id;
      if($request['setting_group_part_id']>=1){
      $list_parts->setting_group_part_id = $request->setting_group_part_id;//
      }
      else{
        $list_parts->setting_group_part_id = $request->old_setting_group_part_id;//
      }
      if($request['setting_brand_part_id']>=1){
        $list_parts->setting_brand_part_id = $request->setting_brand_part_id;//
        }
        else{
          $list_parts->setting_brand_part_id = $request->old_setting_brand_part_id;//
        }
      
      $list_parts->name = $request->name;
      $list_parts->generation = $request->generation;
      $list_parts->number = $request->number;
      // $list_parts->pay_in = $request->pay_in;
      $list_parts->pay_out = $request->pay_out;
      $list_parts->status = true;
      $list_parts->save();
      $request->session()->flash('list_status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว');

      return redirect()->action(
        'ListPartsController@get_list_parts_by_id', [$request->import_parts_id]
    );
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

    return redirect()->action(
      'ListPartsController@get_list_parts_by_id', [$request->import_parts_id]
  );
  }

   
}
