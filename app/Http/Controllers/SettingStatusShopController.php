<?php

namespace App\Http\Controllers;

use App\SettingStatusRepairShop;
use Illuminate\Http\Request;

class SettingStatusShopController extends Controller
{    
    public function get() {
      // echo $id;exit();
      $setting_status_repairs = SettingStatusRepairShop::where('status', 1)
      ->get();
      // echo $setting_status_repair;exit();
      return view('setting_status_repair_shop/setting-status-repair-shop', ['setting_status_repairs' => $setting_status_repairs]);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $setting_status_repairs = new SettingStatusRepairShop;
        $setting_status_repairs->name = $request->name;
        $setting_status_repairs->status_color = $request->status_color;
        $setting_status_repairs->status = true;
        $setting_status_repairs->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        return redirect('/setting-status-repair-shop');
    }
    public function edit(Request $request)
    {
      $setting = SettingStatusRepairShop::find($request->id);
      $setting->name = $request->name;
      $setting->status_color = $request->status_color;
      $setting->status = true;
      $setting->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
      return redirect('/setting-status-repair-shop');
    }
    public function delete($id)
    {
      $setting_status_repairs = SettingStatusRepairShop::find($id);
      $setting_status_repairs->status = 0;
      $setting_status_repairs->save();
      $setting_status_repairs2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 
      return redirect('/setting-status-repair-shop');
    }
}
