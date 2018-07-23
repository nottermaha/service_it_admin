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

class PayMoneyController extends Controller
{    
    // public function form_search_data_pay() {
    //   $s_type=session('s_type','default');
    //   if($s_type==1 || $s_type==2 || $s_type==3){
    //         $s_store_branch_id=session('s_store_branch_id','default');
    //         $s_type=session('s_type','default');
    //         $current_date=date("Y-m-d");
    //         $data =[
    //           'current_date' =>$current_date,
    //           's_type' =>$s_type,
    //           's_store_branch_id' =>$s_store_branch_id,
    //           'chk_print' => 0,
    //           // 'count_repair' => 0,
    //           // 'count_pay_out_part' => 0,
    //           // 'count_list_repair_price' => 0,

    //           // 'request_chk_date_in' => 0,
    //           // 'request_chk_date_out' => 0,
      
    //           // 'name_status_bill' => -1,
      
    //           // 'name_store_branch' => 0,

    //         ];
    //         $store_branchs = StoreBranch::where('store_branch.status', 1)
    //         ->get();
    //         $persons = Personsmember::where('status', 1)
    //        ->get();

    //        $get_repairs = Repair::where('status', 1)
    //        ->get();
    //         // echo $data['current_date'];
    //         // exit();
    //         return view('search_data_pay/search-data-pay',['store_branchs'=>$store_branchs,'persons'=>$persons,'get_repairs'=>$get_repairs],$data);
    //     }
    //   }
    //   public function search_data_pay(Request $request) {
    //     $s_store_branch_id=session('s_store_branch_id','default');
    //   $s_type=session('s_type','default');
    //   $items =[
    //     'repair.id as id'
    //     ,'repair.persons_member_id as persons_member_id'
    //       ,'repair.name as name'
    //       ,'repair.status_bill as status_bill'
    //       ,'repair.bin_number as bin_number'
    //       ,'repair.date_in_repair as date_in_repair'
    //       // ,'repair.price as price'

    //       ,'data_pay.status_pay as status_pay'
    //       ,'data_pay.updated_at as updated_at_pay'

    //       ,'persons.name as persons_name'
    //       ,'persons_member.name as member_name'
    //       ,'persons_member.type as type'

    //       ,'store_branch.name as store_branch_name'
    //   ];
    //     if($request['chk_person']=='member'){
    //           if($request->store_branch_id==-1){ //ร้านทั้งหมด
    //             if($request['member_id']==-1){// สมาชิกทั้งหมด
    //             $repairs = Repair::where('repair.status', 1)
    //             ->where('repair.date_in_repair','>=',$request['chk_date_in'])
    //             ->where('repair.date_in_repair','<=',$request['chk_date_out'])
    //             ->leftJoin('persons','persons.id','=','repair.persons_id')
    //             ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
    //             ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
    //             ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
    //             ->get($items);
    //             }
    //             elseif($request['member_id']!=-1){ //สมาชิกที่เลือก
    //               $repairs = Repair::where('repair.status', 1)
    //               ->where('repair.persons_member_id',$request['member_id'])
    //               ->where('repair.date_in_repair','>=',$request['chk_date_in'])
    //               ->where('repair.date_in_repair','<=',$request['chk_date_out'])
    //               ->leftJoin('persons','persons.id','=','repair.persons_id')
    //               ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
    //               ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
    //               ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
    //               ->get($items);
    //               }
    //           }
    //           elseif($request->store_branch_id!=-1){ //ร้านที่เลือก
    //             if($request['member_id']==-1){// สมาชิกทั้งหมด
    //             $repairs = Repair::where('repair.status', 1)
    //             ->where('repair.store_branch_id','>=',$request['store_branch_id'])
    //             ->where('repair.date_in_repair','>=',$request['chk_date_in'])
    //             ->where('repair.date_in_repair','<=',$request['chk_date_out'])
    //             ->leftJoin('persons','persons.id','=','repair.persons_id')
    //             ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
    //             ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
    //             ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
    //             ->get($items);
    //             }
    //             elseif($request['member_id']!=-1){ //สมาชิกที่เลือก
    //               $repairs = Repair::where('repair.status', 1)
    //               ->where('repair.persons_member_id',$request['member_id'])
    //               ->where('repair.date_in_repair','>=',$request['chk_date_in'])
    //               ->where('repair.date_in_repair','<=',$request['chk_date_out'])
    //               ->leftJoin('persons','persons.id','=','repair.persons_id')
    //               ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
    //               ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
    //               ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
    //               ->get($items);
    //               }
    //           }
    //           // echo $repairs;exit();

    //     }
    //     elseif($request['chk_person']=='general')
    //     {
    //       $repairs = Repair::where('repair.status', 1)
    //       ->where('repair.id',$request['repair_id'])
    //       // ->where('repair.date_in_repair','>=',$request['chk_date_in'])
    //       // ->where('repair.date_in_repair','<=',$request['chk_date_out'])
    //       ->leftJoin('persons','persons.id','=','repair.persons_id')
    //       ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
    //       ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
    //       ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
    //       ->get($items);
    //       // echo $repairs;exit();
    //     }

    //     $s_type=session('s_type','default');
    //     if($s_type==1 || $s_type==2 || $s_type==3){
    //           $s_store_branch_id=session('s_store_branch_id','default');
    //           $s_type=session('s_type','default');
    //           $current_date=date("Y-m-d");
    //           $data =[
    //             'current_date' =>$current_date,
    //             's_type' =>$s_type,
    //             's_store_branch_id' =>$s_store_branch_id,
    //             'chk_print' => 1,
  
    //             // 'count_repair' => 0,
    //             // 'count_pay_out_part' => 0,
    //             // 'count_list_repair_price' => 0,
  
    //             // 'request_chk_date_in' => 0,
    //             // 'request_chk_date_out' => 0,
        
    //             // 'name_status_bill' => -1,
        
    //             // 'name_store_branch' => 0,
  
    //           ];
    //           $store_branchs = StoreBranch::where('store_branch.status', 1)
    //           ->get();
    //           $persons = Personsmember::where('status', 1)
    //          ->get();
  
    //          $get_repairs = Repair::where('status', 1)
    //          ->get();
    //           // echo $data['current_date'];
    //           // exit();
    //           return view('search_data_pay/search-data-pay',['store_branchs'=>$store_branchs,'persons'=>$persons,'get_repairs'=>$get_repairs,'repairs'=>$repairs],$data);
    //         }
    //   }
//////////////////////////////////////////////////////////////////////////////////////////////
    public function get_pay_money() {
      $s_type=session('s_type','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
            $s_store_branch_id=session('s_store_branch_id','default');
            $s_type=session('s_type','default');
            $current_date=date("Y-m-d");
            $data =[
              'current_date' =>$current_date,
              's_type' =>$s_type,
              's_store_branch_id' =>$s_store_branch_id,
              'chk' => 0,

              'count_repair' => 0,
              'count_pay_out_part' => 0,
              'count_list_repair_price' => 0,

              'request_chk_date_in' => 0,
              'request_chk_date_out' => 0,
      
              'name_status_bill' => -1,
      
              'name_store_branch' => 0,

            ];
            $store_branchs = StoreBranch::where('store_branch.status', 1)
            ->get();
            // echo $data['current_date'];
            // exit();
            return view('pay_money/pay-money',['store_branchs'=>$store_branchs],$data);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }


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
          // ,'repair.price as price'

          ,'data_pay.status_pay as status_pay'
          ,'data_pay.updated_at as updated_at_pay'

          ,'persons.name as persons_name'
          ,'persons_member.name as member_name'
          ,'persons_member.type as type'

          ,'store_branch.name as store_branch_name'
      ];
      // echo $request['status_bill']; exit();
      if($request->store_branch_id==-1){ //ร้านทั้งหมด
        if($request['status_bill']==2){// บิลทั้งหมด
        $repairs = Repair::where('repair.status', 1)
        ->where('repair.date_in_repair','>=',$request['chk_date_in'])
        ->where('repair.date_in_repair','<=',$request['chk_date_out'])
        ->leftJoin('persons','persons.id','=','repair.persons_id')
        ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
        ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
        ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
        ->get($items);
        }
        elseif($request['status_bill']==1||$request['status_bill']==0){ //ปิด-ยังไม่ปิด บิล
          $repairs = Repair::where('repair.status', 1)
          ->where('repair.status_bill',$request['status_bill'])
          ->where('repair.date_in_repair','>=',$request['chk_date_in'])
          ->where('repair.date_in_repair','<=',$request['chk_date_out'])
          ->leftJoin('persons','persons.id','=','repair.persons_id')
          ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
          ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
          ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
          ->get($items);
          }
      }
      elseif($request->store_branch_id!=-1){ // ร้านที่เลือก
        if($request['status_bill']==2){// บิลทั้งหมด
        $repairs = Repair::where('repair.status', 1)
        ->where('repair.store_branch_id',$request->store_branch_id)
        ->where('repair.date_in_repair','>=',$request['chk_date_in'])
        ->where('repair.date_in_repair','<=',$request['chk_date_out'])
        ->leftJoin('persons','persons.id','=','repair.persons_id')
        ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
        ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
        ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
        ->get($items);
        }
        elseif($request['status_bill']==1||$request['status_bill']==0){ //ปิด-ยังไม่ปิด บิล
          $repairs = Repair::where('repair.status', 1)
          ->where('repair.status_bill',$request['status_bill'])
          ->where('repair.store_branch_id',$request->store_branch_id)
          ->where('repair.date_in_repair','>=',$request['chk_date_in'])
          ->where('repair.date_in_repair','<=',$request['chk_date_out'])
          ->leftJoin('persons','persons.id','=','repair.persons_id')
          ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
          ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')
          ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
          ->get($items);
          }
      }
      $date = new CallUseController();
      $repairs = $date->get_date_all($repairs,'date_in','date_in_repair');
      $repairs = $date->get_date_all($repairs,'date_updated_at_pay','updated_at_pay');
      $request_chk_date_in = $date->get_date_only_request_date($request['chk_date_in']);
      $request_chk_date_out = $date->get_date_only_request_date($request['chk_date_out']);
      // echo $chk_date_in;exit();
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
      // ->where('data_use_parts.store_branch_id',$request->store_branch_id)
      ->where('data_use_parts.store_branch_id', $s_store_branch_id)
      ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
      ->get($items2);
      // echo  $data_use_parts;exit();
      $count_pay_out_part=0; //จำนวนรายการ
      $count_list_repair_price=0; //ราคารวม
      foreach($repairs as $key=>$value){ //เช็คคล้อยๆ หน้าแสดง
        foreach($list_repairs as $key2=>$value2){
          if($list_repairs[$key2]['repair_id_from_list']==$repairs[$key]['id']){
            foreach($data_use_parts as $key3=>$value3){
              if($list_repairs[$key2]['list_id']==$data_use_parts[$key3]['list_repair_id_chk']){
                $count_pay_out_part = $count_pay_out_part + $data_use_parts[$key3]['pay_out'];
                // 
              }
              else{
                // exit();
              }
            }    
            $count_list_repair_price = $count_list_repair_price + $list_repairs[$key2]['price'];
            // echo "ko ="."".$count_list_repair_price;
          }
        }
      }    
            // echo $count_list_repair_price;exit();
      if($request['status_bill']==2){
          $name_status_bill ="รายการทั้งหมด";
      }
      elseif($request['status_bill']==1){
        $name_status_bill ="รายการที่ปิดบิลแล้ว";
      }
      elseif($request['status_bill']==0){
        $name_status_bill ="รายการที่ยังไม่ปิดบิล";
      }

      if($request->store_branch_id==-1){
        $name_store_branch="สาขาทั้งหมด";
      }
      else{
        $store_branch = StoreBranch::find($request->store_branch_id);
        $name_store_branch = $store_branch['name'];
      }


      // echo $name_status_bill;exit();
      $count_repair = count($repairs);
      // echo $count_repair;exit();
      $current_date=date("Y-m-d");
      $data =[
        'current_date' =>$current_date,
        's_type' =>$s_type,
        's_store_branch_id' =>$s_store_branch_id,
        'chk' => 1,

        'count_repair' => $count_repair,
        'count_pay_out_part' => $count_pay_out_part,
        'count_list_repair_price' => $count_list_repair_price,

        'request_chk_date_in' => $request_chk_date_in,
        'request_chk_date_out' => $request_chk_date_out,

        'name_status_bill' => $name_status_bill,

        'name_store_branch' => $name_store_branch,
 
      ];

      $store_branchs = StoreBranch::where('store_branch.status', 1)
      ->get();


      return view('pay_money/pay-money',['repairs'=>$repairs,'list_repairs'=>$list_repairs,'data_use_parts'=>$data_use_parts,'store_branchs'=>$store_branchs],$data);
    }
   

}
