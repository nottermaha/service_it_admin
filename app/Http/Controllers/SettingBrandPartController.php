<?php

namespace App\Http\Controllers;

use App\SettingBrandPart;
use Illuminate\Http\Request;

class SettingBrandPartController extends Controller
{    
    public function get() {
      $s_type=session('s_type','default');
      if($s_type==1 ){
          // echo $id;exit();
          $setting_brand_parts = SettingBrandPart::where('status', 1)
          ->get();
          // echo $setting_brand_parts;exit();
          return view('setting_brand_part/setting-brand-part', ['setting_brand_parts' => $setting_brand_parts]);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }

    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $setting_brand_parts = new SettingBrandPart;
        $setting_brand_parts->name = $request->name;
        $setting_brand_parts->status = true;
        $setting_brand_parts->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        return redirect('/setting-brand-part');
    }
    public function edit(Request $request)
    {
      $setting_brand_parts = SettingBrandPart::find($request->id);
      $setting_brand_parts->name = $request->name;
      $setting_brand_parts->status = true;
      $setting_brand_parts->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
      return redirect('/setting-brand-part');
    }
    public function delete($id)
    {
      $setting_brand_parts = SettingBrandPart::find($id);
      $setting_brand_parts->status = 0;
      $setting_brand_parts->save();
      $setting_brand_parts=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 
      return redirect('/setting-brand-part');
    }
}
