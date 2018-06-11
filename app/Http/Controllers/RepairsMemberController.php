<?php

namespace App\Http\Controllers;

use App\Repair;
use App\PersonsMember;
use Illuminate\Http\Request;

class RepairsMemberController extends Controller
{    
    public function get_repair() {
      $s_store_branch_id=session('s_store_branch_id','default');
      $items = [// select data show in table
        'persons_member.*'
        , 'persons_member.name'
        ,'repair.date_in_repair'
        ,'repair.price'
        ,'repair.equipment_follow'
        ,'repair.after_price'
        ,'repair.date_out_repair'
        ,'repair.guarantee'
        ,'repair.id'
        ,'repair.status'
        ,'repair.persons_member_id'
    ];
      $repairs = Repair::
      leftJoin('persons_member', 'persons_member.id', '=', 'repair.persons_member_id')
      ->where('store_branch_id',$s_store_branch_id)
      ->where('persons_member_id', '!=',NULL)
      ->where('repair.status', 1)
      ->orderBy('repair.id', 'desc')
      // ->orderBy('News.id', 'desc')
      // ->where('persons_id',14)
      ->get($items);
      // echo $repairs;exit();
      // $repairs = $this->get_status_name($repairs);
      $member = PersonsMember::where('status',1)->get(); //show in modal

      return view('repairs_member/repairs-member', ['repairs' => $repairs,'members'=>$member]);
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
      $s_store_branch_id=session('s_store_branch_id','default');
      $s_id=session('s_id','default');
      $current_day=(date('d'));
      $current_month=(date('m'));
      $current_year=(date('y'));
      $repairs = Repair::
      orderBy('id','desc')
      ->limit(1)
      ->get();
      // echo $repairs['0']['id']+1;exit();
      $repair_last_id =$repairs['0']['id']+1;
      // echo $request;exit();
        $repair = new Repair;
        $repair->store_branch_id = $s_store_branch_id;
        $repair->persons_member_id = $request->member_id;
        $repair->persons_id = $s_id;
        $repair->bin_number =  "B2".$current_day."".$current_month."".$current_year."".$repair_last_id;
        $repair->status_repair =  1;
        $repair->date_in_repair =  $request->date_in_repair;
        $repair->price =  $request->price;
        $repair->equipment_follow =  $request->equipment_follow;
        $repair->status = true;
        $repair->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        return redirect('repair-member');
    }
    public function edit(Request $request)
    {
      $repair = Repair::find($request->id);
      // echo $request['member_id'];exit();
      if($request['member_id']>=1){
        $repair->persons_member_id = $request->member_id;
      }
      else{
        $repair->persons_member_id = $request->member_id_old;
      } 
      // $repair->persons_member_id = $request->member_id;
      $repair->date_in_repair =  $request->date_in_repair;
      $repair->price =  $request->price;
      $repair->equipment_follow =  $request->equipment_follow;
      $repair->after_price =  $request->after_price;
      $repair->date_out_repair =  $request->date_out_repair;
      $repair->guarantee =  $request->guarantee;
      $repair->status = true;
      $repair->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('repair-member');
    }
    public function delete($id)
    {
      $store = Repair::find($id);
      $store->status = 0;
      $store->save();
      $person2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว');

       return redirect('repair-member');
    }


}
