<?php

namespace App\Http\Controllers;

use App\Repair;
use Illuminate\Http\Request;

class RepairsGeneralController extends Controller
{    
    public function get_repair() {
      $repairs = Repair::where('status', 1)
      ->where('store_branch_id',2)
      ->where('persons_member_id',NULL)
      // ->where('persons_id',14)
      ->get();
      $repairs = $this->get_status_name($repairs);

      return view('repairs_general/repairs-general', ['repairs' => $repairs]);
    }
    private function get_status_name($repairs)
    {
      foreach ($repairs as $key => $value) {
        $repairs[$key]['status_name'] = ($value['status'] == 1? 'เปิดใช้งาน' : 'ปิดใช้งาน');
      }

      return $repairs;
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $repair = new Repair;
        $repair->store_branch_id = 2;
        $repair->persons_id =  12;
        $repair->name =  $request->name;
        $repair->phone =  $request->phone;
        $repair->date_in_repair =  $request->date_in_repair;
        $repair->price =  $request->price;
        $repair->status = true;
        $repair->save();

        return redirect('repair-general');
    }
    public function edit(Request $request)
    {
      $repair = Repair::find($request->id);
      $repair->name =  $request->name;
        $repair->phone =  $request->phone;
        $repair->date_in_repair =  $request->date_in_repair;
        $repair->price =  $request->price;
        $repair->after_price =  $request->after_price;
        $repair->date_out_repair =  $request->date_out_repair;
        $repair->guarantee =  $request->guarantee;
        $repair->status = true;
      $repair->save();

      return redirect('repair-general');
    }
    public function delete($id)
    {
      $store = Repair::find($id);
      $store->status = 0;
      $store->save();

       return redirect('repair-general');
    }
}
