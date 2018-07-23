<?php

namespace App\Http\Controllers;

use App\News;
use App\Repair;
use App\ListRepair;
use App\DataUsePart;
use App\StoreBranch;
use App\DataPay;
use App\Personsmember;

use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;

class DataPayController extends Controller
{    
  public function form_search_data_pay() {
    $s_store_branch_id=session('s_store_branch_id','default');
      $s_type=session('s_type','default');
      $items =[
        'repair.id as id'
        ,'repair.persons_member_id as persons_member_id'
          ,'repair.name as name'
          ,'repair.status_bill as status_bill'
          ,'repair.bin_number as bin_number'
          ,'repair.date_in_repair as date_in_repair'
          ,'repair.updated_at as date_close_bill'
          // ,'repair.price as price'
          ,'data_pay.status_pay as status_pay'
          ,'data_pay.updated_at as updated_at_pay'

          ,'persons.name as persons_name'

          ,'persons_member.name as member_name'
          ,'persons_member.type as type'

          ,'store_branch.name as store_branch_name'
      ];
          $repairs_status_pay_0 = Repair::where('repair.status', 1)
          ->where('data_pay.status_pay',0)
          ->where('repair.status_bill',0)
          ->where('repair.store_branch_id', $s_store_branch_id)
          ->leftJoin('persons','persons.id','=','repair.persons_id')
          ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
          ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
          ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
          ->get($items);

          foreach($repairs_status_pay_0 as $key=>$value)
          {
                if($repairs_status_pay_0[$key]['persons_member_id']!=NULL)
                {
                  $repairs_status_pay_0[$key]['is_name']=$value['member_name'];
                }
                else if($repairs_status_pay_0[$key]['persons_member_id']==NULL)
                {
                  $repairs_status_pay_0[$key]['is_name']=$value['name'];
                }
          }
// echo $repairs_status_pay_0;exit();
          $repairs_status_pay_1 = Repair::where('repair.status', 1)
          ->where('data_pay.status_pay',1)
          ->where('repair.status_bill',0)
          ->where('repair.store_branch_id', $s_store_branch_id)
          ->leftJoin('persons','persons.id','=','repair.persons_id')
          ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
          ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
          ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
          ->get($items);
          foreach($repairs_status_pay_1 as $key=>$value)
          {
                if($repairs_status_pay_1[$key]['persons_member_id']!=NULL)
                {
                  $repairs_status_pay_1[$key]['is_name']=$value['member_name'];
                }
                else if($repairs_status_pay_1[$key]['persons_member_id']==NULL)
                {
                  $repairs_status_pay_1[$key]['is_name']=$value['name'];
                }
          }
          $repairs_status_bill = Repair::where('repair.status', 1)
          ->where('repair.status_bill',1)
          ->where('repair.store_branch_id', $s_store_branch_id)
          ->leftJoin('persons','persons.id','=','repair.persons_id')
          ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
          ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
          ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
          ->get($items);
          foreach($repairs_status_bill as $key=>$value)
          {
                if($repairs_status_bill[$key]['persons_member_id']!=NULL)
                {
                  $repairs_status_bill[$key]['is_name']=$value['member_name'];
                }
                else if($repairs_status_bill[$key]['persons_member_id']==NULL)
                {
                  $repairs_status_bill[$key]['is_name']=$value['name'];
                }
          }
          $date = new CallUseController();
          $repairs_status_pay_0 = $date->get_date_all($repairs_status_pay_0,'date_in','date_in_repair');
          $repairs_status_pay_1 = $date->get_date_all($repairs_status_pay_1,'date_pay','updated_at_pay');
          $repairs_status_bill = $date->get_date_all($repairs_status_bill,'date_close_bill','date_close_bill');

          $items2 = [
            'repair.id as repair_id_from_list'
    
            ,'list_repair.id as list_id'
            ,'list_repair.list_name as list_name'
            ,'list_repair.price as price'
          ];
          $list_repairs = ListRepair::where('list_repair.status', 1)
          ->leftJoin('repair', 'repair.id', '=', 'list_repair.repair_id')
          ->get($items2);
    
          $items3 = [
            'data_use_parts.list_repair_id as list_repair_id_chk'
            ,'data_use_parts.list_parts_id as list_parts_id_chk'
            ,'list_parts.name as list_parts_name'
            ,'list_parts.pay_out as pay_out'
          ];
          $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
          // ->where('data_use_parts.store_branch_id',$request->store_branch_id)
          ->where('data_use_parts.store_branch_id', $s_store_branch_id)
          ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
          ->get($items3);
          // echo $repairs_status_bill;exit();
          return view('search_data_pay/search-data-pay',['repairs_status_pay_0'=>$repairs_status_pay_0
          ,'repairs_status_pay_1'=>$repairs_status_pay_1
          ,'repairs_status_bill'=>$repairs_status_bill
          ,'list_repairs'=>$list_repairs]);
         
  }

    public function data_pay_confirm(Request $request){
      // echo 'ho';exit();
      $data_pay_get = DataPay::where('repair_id',$request->repair_id)
      ->get();
      // echo $data_pay_get;exit();
      $data_pay = DataPay::find($data_pay_get['0']['id']);
      if($data_pay['status_pay']==0){
        $data_pay->status_pay = 1;
      }
      elseif($data_pay['status_pay']==1)
      {
        $data_pay->status_pay = 0;
      }
      $data_pay->save();
      return redirect('/form-search-data-pay');

    }

    public function data_close_bill(Request $request){
      // echo 'ho';exit();
      $repair = Repair::find($request->repair_id);
      $repair->status_bill = 1;
      $repair->save();
      return redirect('/form-search-data-pay');
     
    }

}
