<?php

namespace App\Http\Controllers;

use App\SettingGroupPart;
use Illuminate\Http\Request;

class SettingGroupPartController extends Controller
{    
    public function get() {
      $s_type=session('s_type','default');
      if($s_type==1 ){
          // echo $id;exit();
          $setting_group_parts = SettingGroupPart::where('status', 1)
          ->get();
          // echo $setting_group_parts;exit();
          return view('setting_group_part/setting-group-part', ['setting_group_parts' => $setting_group_parts]);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }

    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $setting_group_parts = new SettingGroupPart;
        $setting_group_parts->name = $request->name;
        $setting_group_parts->status = true;
        $setting_group_parts->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        return redirect('/setting-group-part');
    }
    public function edit(Request $request)
    {
      $setting_group_parts = SettingGroupPart::find($request->id);
      $setting_group_parts->name = $request->name;
      $setting_group_parts->status = true;
      $setting_group_parts->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
      return redirect('/setting-group-part');
    }
    public function delete($id)
    {
      $setting_group_parts = SettingGroupPart::find($id);
      $setting_group_parts->status = 0;
      $setting_group_parts->save();
      $setting_group_parts=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 
      return redirect('/setting-group-part');
    }
}
