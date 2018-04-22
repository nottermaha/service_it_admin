<?php

namespace App\Http\Controllers;

use App\ListRepair;
use Illuminate\Http\Request;

class ListRepairsController extends Controller
{    
    public function get_list_repair_by_id($id) {
      // echo $id;exit();
      $list_repairs = ListRepair::where('status', 1)
      // $repairs = ListRepair::find($id);
      ->where('repair_id',$id)
      // ->where('persons_member_id',NULL)
      // ->where('persons_id',14)
      ->get();
      $repair_id['repair_id']=$id;
      // echo $repairs;exit();
      return view('list_repairs_member/list-repairs-member', ['list_repairs' => $list_repairs],$repair_id);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $repair = new ListRepair;
        $repair->store_branch_id = 2;
        $repair->repair_id = $request->repair_id;
        $repair->list_name =  $request->list_name;
        $repair->detail =  $request->detail;
        $repair->symptom =  $request->symptom;
        $repair->status = true;
        $repair->save();
        // echo $repair['repair_id'];exit();
        return redirect('list-repair/'.$repair['repair_id']);
    }
    public function edit(Request $request)
    {
      $repair = ListRepair::find($request->id);
      $repair->repair_id = $request->repair_id;
      $repair->list_name =  $request->list_name;
      $repair->detail =  $request->detail;
      $repair->symptom =  $request->symptom;
      $repair->status_list_repair =  $request->status_list_repair;
      $repair->price =  $request->price;
      $repair->image =  $request->image;
      $repair->status = true;
      $repair->save();

      return redirect('list-repair/'.$repair['repair_id']);
    }
    public function delete($id)
    {
      // echo $repair_id;exit();
      $repair = ListRepair::find($id);
      $repair->status = 0;
      $repair->save();
      // $repair_id['repair_id']=$repair['repair_id'];
      // echo $repair_id['repair_id'];exit();
      return redirect('list-repair/'.$repair['repair_id']);
    }
   
}
