<?php

namespace App\Http\Controllers;

use App\ListRepair;
use App\ListPart;
use App\SettingStatusRepair;
use App\Guarantee;

use Illuminate\Http\Request;

class ListRepairsController extends Controller
{    
    public function get_list_repair_by_id(Request $request) {
      $items = [// select data show in table
        'setting_status_repair.*'
        , 'setting_status_repair.name'
        , 'setting_status_repair.status_color'

        , 'guarantee.name as guarantee_name'

        ,'list_repair.list_name'
        ,'list_repair.detail'
        ,'list_repair.symptom'
        ,'list_repair.image'
        ,'list_repair.price'
        ,'list_repair.status_list_repair'
        ,'list_repair.guarantee_id'
        ,'list_repair.id'
    ];
      $list_repairs = ListRepair::
      leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
      ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
      ->where('list_repair.status', 1)
      ->where('list_repair.repair_id',$request->id)
      ->get($items);

////////เอาไว้ select///////////
      $setting_status_repairs = SettingStatusRepair::where('status', 1)
      ->get();

      $guarantees = Guarantee::where('status', 1)
      ->get();

      $list_parts = ListPart::where('status', 1)
      ->get();
//////////////////////////////
      $repair_id['repair_id']=$request->id;

      // echo $setting_status_repair;exit();
      return view('list_repairs/list-repairs', 
      ['list_repairs' => $list_repairs,
      'setting_status_repairs'=>$setting_status_repairs,
      'guarantees'=>$guarantees,
      'list_parts'=>$list_parts],$repair_id);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $repair = new ListRepair;
        $repair->store_branch_id = 2;
        $repair->status_list_repair = 1;
        $repair->repair_id = $request->repair_id;
        $repair->list_name =  $request->list_name;
        $repair->detail =  $request->detail;
        $repair->symptom =  $request->symptom;
        $repair->status = true;
        $repair->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 
        // echo $repair['repair_id'];exit();
        return redirect('list-repair/'.$repair['repair_id']);
    }
    public function edit(Request $request)
    {
      // echo $request['guarantee'];exit();
      $repair = ListRepair::find($request->id);
      if($request['status_list_repair']>=1){
        $repair->status_list_repair = $request->status_list_repair;
      }
      else{
        $repair->status_list_repair = $request->status_list_repair_old;
      } 
      if($request['guarantee_id']>=1){
        $repair->guarantee_id = $request->guarantee_id;
      }
      else{
        $repair->guarantee_id = $request->guarantee_id_old;
      } 
      $repair->repair_id = $request->repair_id;      
      $repair->list_name =  $request->list_name;
      $repair->detail =  $request->detail;
      $repair->symptom =  $request->symptom;
      $repair->price =  $request->price;
      $repair->image =  $request->image;
      $repair->status = true;
      $repair->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('list-repair/'.$repair['repair_id']);
    }
    public function edit_status(Request $request)
    {
      // echo $request['status_list_repair'];exit();
      $repair = ListRepair::find($request->id);
      if($request['status_list_repair']>=1){
        $repair->status_list_repair = $request->status_list_repair;
      }
      else{
        $repair->status_list_repair = $request->status_list_repair_old;
      } 
      $repair->status = true;
      $repair->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลสถานะการซ่อมเรียบร้อย'); 

      return redirect('list-repair/'.$repair['repair_id']);
    }
    public function delete($id)
    {
      // echo $repair_id;exit();
      $repair = ListRepair::find($id);
      $repair->status = 0;
      $repair->save();
      $repair2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว');
      // $repair_id['repair_id']=$repair['repair_id'];
      // echo $repair_id['repair_id'];exit();
      return redirect('list-repair/'.$repair['repair_id']);
    }
   
}
