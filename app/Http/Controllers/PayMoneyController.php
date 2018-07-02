<?php

namespace App\Http\Controllers;

use App\News;
use App\Repair;
use App\ListRepair;
use App\DataUsePart;
use App\StoreBranch;
use App\DataPay;

use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;

class PayMoneyController extends Controller
{    

    public function get_pay_money() {
      $s_store_branch_id=session('s_store_branch_id','default');
      $s_type=session('s_type','default');
      $current_date=date("Y-m-d");
      $data =[
        'current_date' =>$current_date,
        's_type' =>$s_type,
        's_store_branch_id' =>$s_store_branch_id,
        'chk' => 0,
      ];
      $store_branchs = StoreBranch::where('store_branch.status', 1)
      ->get();
      // echo $data['current_date'];
      // exit();
      return view('pay_money/pay-money',['store_branchs'=>$store_branchs],$data);
    }

    public function search_pay_money(Request $request) {
      $s_store_branch_id=session('s_store_branch_id','default');
      $s_type=session('s_type','default');
      $items =[
        'repair.id as id'
        ,'repair.persons_member_id as persons_member_id'
          ,'repair.name as name'
          ,'repair.status_bill as status_bill'
          ,'repair.bin_number as bin_number'
          ,'repair.date_in_repair as date_in_repair'
          ,'repair.price as price'

          ,'data_pay.status_pay as status_pay'

          ,'persons.name as persons_name'
          ,'persons_member.name as member_name'
          ,'persons_member.type as type'
      ];
      // echo $request['status_bill']; exit();
      if($request['status_bill']==0 || $request['status_bill']==1){
        $repairs = Repair::where('repair.status', 1)
        ->where('repair.status_bill',$request['status_bill'])
        ->where('repair.store_branch_id',$request->store_branch_id)
        ->where('repair.date_in_repair','>=',$request['chk_date_in'])
        ->where('repair.date_in_repair','<=',$request['chk_date_out'])
        ->leftJoin('persons','persons.id','=','repair.persons_id')
        ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
        ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
        ->get($items);
      }
      elseif($request['status_bill']==2){
        $repairs = Repair::where('repair.status', 1)
        // ->where('repair.status_bill',$request->status_bill)
        ->where('repair.store_branch_id',$request->store_branch_id)
        ->where('repair.date_in_repair','>=',$request['chk_date_in'])
        ->where('repair.date_in_repair','<=',$request['chk_date_out'])
        ->leftJoin('persons','persons.id','=','repair.persons_id')
        ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
        ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
        ->get($items);
      }
            
      $date = new CallUseController();
      $repairs = $date->get_date_all($repairs,'date_in','date_in_repair');
      foreach($repairs as $key=>$value){
        // echo $repairs;exit();
          if($repairs[$key]['persons_member_id']!=NULL)
            {
              $repairs[$key]['is_name']=$value['member_name'];
            }
            else if($repairs[$key]['persons_member_id']==NULL)
            {
              $repairs[$key]['is_name']=$value['name'];
            }
        }
      // echo $request['chk_date_in']." ".$request['chk_date_out'];
      // echo $repairs;
      // exit();

      $items2 = [
        'repair.id as repair_id_from_list'

        ,'list_repair.id as list_id'
        ,'list_repair.list_name as list_name'
        ,'list_repair.price as price'
      ];
      $list_repairs = ListRepair::where('list_repair.status', 1)
      ->leftJoin('repair', 'repair.id', '=', 'list_repair.repair_id')
      ->get($items2);

      $items2 = [
        'data_use_parts.list_repair_id as list_repair_id_chk'
        ,'data_use_parts.list_parts_id as list_parts_id_chk'
        ,'list_parts.name as list_parts_name'
        ,'list_parts.pay_out as pay_out'
      ];
      $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
      ->where('data_use_parts.store_branch_id',$request->store_branch_id)
      ->where('data_use_parts.store_branch_id', $s_store_branch_id)
      ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
      ->get($items2);
      //       echo $data_use_parts;
      // exit();

      $current_date=date("Y-m-d");
      $data =[
        'current_date' =>$current_date,
        's_type' =>$s_type,
        's_store_branch_id' =>$s_store_branch_id,
        'chk' => 1,
      ];

      $store_branchs = StoreBranch::where('store_branch.status', 1)
      ->get();

      return view('pay_money/pay-money',['repairs'=>$repairs,'list_repairs'=>$list_repairs,'data_use_parts'=>$data_use_parts,'store_branchs'=>$store_branchs],$data);
    }
   

}
