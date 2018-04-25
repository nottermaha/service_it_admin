<?php

namespace App\Http\Controllers;

use App\SettingStatusRepair;
use Illuminate\Http\Request;

class SettingStatusController extends Controller
{    
    public function get() {
      // echo $id;exit();
      $setting_status_repairs = SettingStatusRepair::where('status', 1)
      ->get();
      // echo $setting_status_repair;exit();
      return view('setting_status_repair/setting-status-repair', ['setting_status_repairs' => $setting_status_repairs]);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $setting_status_repairs = new SettingStatusRepair;
        $setting_status_repairs->store_branch_id = 2;
        $setting_status_repairs->name = $request->name;
        $setting_status_repairs->status = true;
        $setting_status_repairs->save();

        return redirect('/setting-status-repair');
    }
    public function edit(Request $request)
    {
      $setting = SettingStatusRepair::find($request->id);
      $setting->store_branch_id = 2;
      $setting->name = $request->name;
      $setting->status = true;
      $setting->save();

      return redirect('/setting-status-repair');
    }
    public function delete($id)
    {
      $setting_status_repairs = SettingStatusRepair::find($id);
      $setting_status_repairs->status = 0;
      $setting_status_repairs->save();

      return redirect('/setting-status-repair');
    }
}
