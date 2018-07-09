<?php

namespace App\Http\Controllers;

use App\Repair;
use App\ListRepair;
use App\PersonsMember;
use App\DataPay;
use App\SettingStatusRepairShop;

use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;

class RepairsMemberController extends Controller
{    
      public function search_repair_form() {
        $s_type=session('s_type','default');
        if($s_type==1 || $s_type==2 || $s_type==3){
          $data['check']=0;
          return view('search_repair/search_repair', $data);
        }
        else{
          echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
        }

      }

      public function search_repair_only_bill(Request $request) {
            // echo $request['chk_num_bill'];exit();
            // echo $request['bin_number'];exit();
        $items = [
          'repair.id as r_id'
          ,'repair.persons_member_id as persons_member_id'
          ,'repair.bin_number as bin_number'
          ,'repair.name as name'
          ,'repair.status_repair as status_repair'
          ,'repair.phone as phone'
          // ,'repair.price as price'
          // ,'repair.after_price as after_price'
          ,'repair.equipment_follow as equipment_follow'
          ,'repair.date_in_repair as date_in_repair'
          ,'repair.date_out_repair as date_out_repair'

          ,'store_branch.name as store_branch_name'

          ,'persons.name as persons_name'

          ,'persons_member.name as member_name'
          ,'persons_member.phone as member_phone'

          ,'list_repair.id as list_repair_id'
          ,'list_repair.list_name as list_repair_name'
          ,'list_repair.symptom as symptom'
          // ,'list_repair.detail as detail'
          ,'list_repair.status_list_repair as status_list_repair'
      ];

        $repairs = Repair::where('repair.status', 1)
        ->where('repair.bin_number',$request->bin_number)  
        ->where('list_repair.status',1)  
        ->leftJoin('store_branch', 'store_branch.id', '=', 'repair.store_branch_id')      
        ->leftJoin('persons', 'persons.id', '=', 'repair.persons_id')
        ->leftJoin('persons_member', 'persons_member.id', '=', 'repair.persons_member_id')
        ->leftJoin('list_repair', 'list_repair.repair_id', '=', 'repair.id')
        ->get($items);        
        // echo $repairs;exit();
        $repairs2 = Repair::where('repair.status', 1)
        ->where('repair.bin_number',$request->bin_number)  
        ->where('list_repair.status',1)  
        ->leftJoin('store_branch', 'store_branch.id', '=', 'repair.store_branch_id')      
        ->leftJoin('persons', 'persons.id', '=', 'repair.persons_id')
        ->leftJoin('persons_member', 'persons_member.id', '=', 'repair.persons_member_id')
        ->leftJoin('list_repair', 'list_repair.repair_id', '=', 'repair.id')
        ->get($items);

        /////get status ////
        

        // echo $status_lists;exit(); 
      
        foreach($repairs as $key=>$value){

        // echo $repairs;exit();
          if($repairs[$key]['persons_member_id']!=NULL)
            {
              $repairs[$key]['name']=$value['member_name'];
              $repairs[$key]['phone']=$value['member_phone'];
            }
            // else if($repairs[$key]['p_id']==NULL)
            // {
            //   $repairs[$key]['is_name']=$value['person_name'];
            //   $repairs[$key]['is_type']=$value['person_type'];
            // }
        }

        if(count($repairs)!=0){
          
          $items2 =[
            'setting_status_repair.id as s_id'
            ,'setting_status_repair.name'
            ,'setting_status_repair.status_color'

            ,'list_repair.id as l_id'
            ,'list_repair.price as price'

            ,'persons.name as person_name'
        ];
        $status_lists = ListRepair::where('list_repair.status', 1)
        ->where('list_repair.repair_id',$repairs['0']['r_id'])      
        ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')
        ->leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
        ->get($items2);

        $date = new CallUseController();
        $repairs2 = $date->get_date_only($repairs2,'date_in','date_in_repair');
        $repairs2 = $date->get_date_only($repairs2,'date_out','date_out_repair');
        $data = [
          'id' => $repairs['0']['id'],
          'store_branch_name' => $repairs['0']['store_branch_name'],
          'bin_number' => $repairs['0']['bin_number'],
          'name' => $repairs['0']['name'],
          'status_repair' => $repairs['0']['status_repair'],
          'phone' => $repairs['0']['phone'],
          'price' => $repairs['0']['price'],
          'after_price' => $repairs['0']['after_price'],
          'equipment_follow' => $repairs['0']['equipment_follow'],
          'persons_name' => $repairs['0']['persons_name'],
          'date_in_repair' => $repairs2['date_in'],
          'date_out_repair' => $repairs2['date_out'],
          
          'check' => 1,
        ];

        // echo $repairs;exit();
        return view('search_repair/search_repair',['repairs'=>$repairs,'status_lists'=>$status_lists], $data);
      }
      // echo $request['chk_num_bill'];exit();
      else{
        if($request['chk_num_bill']==1){
          $data['check']=2;
          // echo $repairs;exit();
        }
        else{
        $data['check']=2;
        }
        return view('search_repair/search_repair', $data);
      }

    }

    public function status_bill(Request $request)
    {
      $repair = Repair::find($request->id);
      $repair->status_bill =  1;
      // echo "llll";exit();
      $repair->save();
      // $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
  
      return redirect('repair-member');
    }
  
    public function status_pay(Request $request) {
      $data_pay_get = DataPay::where('repair_id',$request->id)
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
          return redirect('repair-member');
    }

    public function get_repair() {
      $s_type=session('s_type','default');
        if($s_type==1 || $s_type==2 || $s_type==3){
          $s_store_branch_id=session('s_store_branch_id','default');
          $item=[
            'setting_status_repair_shop.*'
            , 'setting_status_repair_shop.name as status_name'
            , 'setting_status_repair_shop.status_color'

            ,'persons.name as persons_name'

            ,'persons_member.name as member_name'
            ,'persons_member.phone as member_phone'

            ,'data_pay.status_bill as status_bill'//
            ,'data_pay.status_pay as status_pay'//

            ,'repair.id as id'
            ,'repair.store_branch_id as store_branch_id'
            ,'repair.persons_member_id as persons_member_id'
            ,'repair.persons_id as persons_id'
            ,'repair.bin_number as bin_number'
            // ,'repair.name as name'
            ,'repair.status_repair as status_repair'
            // ,'repair.phone as phone'
            // ,'repair.price as price'
            ,'repair.date_in_repair as date_in_repair'
            ,'repair.date_out_repair as date_out_repair'
            // ,'repair.after_price as after_price'
            ,'repair.equipment_follow as equipment_follow'

          ];
          $repairs = Repair::
          leftJoin('persons_member', 'persons_member.id', '=', 'repair.persons_member_id')
          ->leftJoin('persons','persons.id','=','repair.persons_id')
          ->leftJoin('data_pay','data_pay.repair_id','=','repair.id')////
          ->leftJoin('setting_status_repair_shop', 'setting_status_repair_shop.id', '=', 'repair.status_repair')
          ->where('repair.store_branch_id',$s_store_branch_id)
          ->where('repair.persons_member_id', '!=',NULL)
          ->where('repair.status', 1)
          ->where('repair.status_bill',0)////////////////////////
          ->orderBy('repair.id', 'desc')
          // ->orderBy('News.id', 'desc')
          // ->where('persons_id',14)
          ->get($item);
          $current_date=(date('Y-m-d'));
          $data['current_date']=$current_date;

          // echo $repairs;exit();
          // $repairs = $this->get_status_name($repairs);
          ////////เอาไว้ select///////////
          $setting_status_repair_shops = SettingStatusRepairShop::where('status', 1)
          ->get();
          $member = PersonsMember::where('status',1)->get(); //show in modal

          return view('repairs_member/repairs-member', ['repairs' => $repairs,'members'=>$member,'setting_status_repair_shops'=>$setting_status_repair_shops],$data);
        }
        else{
          echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
        }
      
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
      $status_list_repair_shop = SettingStatusRepairShop::where('status',1)
      ->orderBy('id','asc')
      ->limit('1')
      ->get();

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
        $repair->status_bill =  0;
        $repair->bin_number =  "B2".$current_day."".$current_month."".$current_year."".$repair_last_id;
        $repair->status_repair =  1;
        $repair->date_in_repair =  $request->date_in_repair;
        // $repair->price =  $request->price;
        // $repair->equipment_follow =  $request->equipment_follow;
        $repair->status = true;
        $repair->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        $repairs = Repair::where('repair.status', 1)
        ->orderBy('id','desc')
        ->limit(1)
        ->get();

        $data_pay = new DataPay;
        $data_pay->repair_id = $repairs['0']['id'];
        $data_pay->status_bill = 0;
        $data_pay->status_pay = 0;
        $data_pay->save();

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
      // $repair->after_price =  $request->after_price;
      $repair->date_out_repair =  $request->date_out_repair;
      $repair->status = true;
      $repair->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('repair-member');
    }

    public function status_repair(Request $request)
    {
      // echo $request['status_repair'];exit();
      $repair = Repair::find($request->id);
      if($request['status_repair']>=1){
        $repair->status_repair = $request->status_repair;
      }
      else{
        $repair->status_repair = $request->status_repair_old;
      } 
      $repair->save();

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
