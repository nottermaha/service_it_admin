<?php

namespace App\Http\Controllers;

use App\Persons;
use App\PersonsMember;
use App\StoreBranch;
use App\Repair;
use App\ListPart;
use App\ImportPart;
use App\SettingStatusRepair;
use App\SettingStatusRepairShop;
use App\ListRepair;
use App\DataUsePart;

use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;

class ReportController extends Controller
{   
  public function get_report_print(Request $request) {
    $s_type=session('s_type','default');
    $s_store_branch_id=session('s_store_branch_id','default');
    $current_date['date']=(date('Y-m-d'));

    
    $date = new CallUseController();
    $current_date = $date->get_date_only2($current_date,'current_date','date');//get 
    // echo $current_date['current_date'];exit();
    if($request->chk==1){
      $item =[
        'store_branch.name as branch_name'

        ,'persons.id as id'
        ,'persons.name as name'
        ,'persons.store_branch_id as store_branch_id'
        ,'persons.person_id as person_id'
        ,'persons.gender as gender'
        ,'persons.email as email'
        ,'persons.birthday as birthday'
        ,'persons.phone as phone'
        ,'persons.address as address'
        ,'persons.position as position'
        ,'persons.salary as salary'
        ,'persons.date_in as date_in'
        ,'persons.date_out as date_out'
      ];
            if($request->chk_print==1){
              $store_branchs = StoreBranch::where('status',1)
              ->get();

              $result = Persons::
              leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
              ->where('persons.status', 1)
              ->orderBy('persons.store_branch_id','asc')
              ->where('persons.type',3)
              ->get($item);
              $date = new CallUseController();
              $result = $date->get_date_all($result,'birth_day','birthday');//get 
              $result = $date->get_date_all($result,'date','date_in');//get

              $data =['chk'=>$request->chk,'type_name'=>'ทั้งหมด','current_date'=>$current_date['current_date']];
              // echo $result;exit;
              return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
            }
            elseif($request->chk_print==2){
              $store_branchs = StoreBranch::where('status',1)
              ->where('id',$request->store_branch_id)
              ->get();

              $result = Persons::
              leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
              ->where('persons.status', 1)
              ->orderBy('persons.store_branch_id','asc')
              ->where('persons.type',3)
              ->where('persons.store_branch_id',$s_store_branch_id)
              ->get($item);
              $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date']];

              // echo $result;exit;
              return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
            }
            elseif($request->chk_print==3){
              $store_branchs = StoreBranch::where('status',1)
              ->where('id',$s_store_branch_id)
              ->get();
              // echo $store_branchs;exit;
              $result = Persons::
              leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
              ->where('persons.status', 1)
              ->orderBy('persons.store_branch_id','asc')
              ->where('persons.type',3)
              ->where('persons.store_branch_id',$s_store_branch_id)
              ->get($item);
              $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date']];

              // echo $result;exit;
              return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
            }
        
    }
    elseif($request->chk==2){
      ///////person_member///////
          if($request->chk_print==3){
            $result = PersonsMember::where('status',1)
            ->get();
            $data =['chk'=>$request->chk];
            // echo $persons;exit;
            return view('report/re-excel',['result'=>$result,'current_date'=>$current_date['current_date']],$data);
          }
    }
    elseif($request->chk==3){
          if($request->chk_print==1){
            $store_branchs = StoreBranch::where('status',1)
            ->get();

            $result = StoreBranch::where('status',1)
            ->get();
            $data =['chk'=>$request->chk,'type_name'=>'ทั้งหมด','current_date'=>$current_date['current_date']];

            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
          }
          elseif($request->chk_print==2){
            $store_branchs = StoreBranch::where('status',1)
            ->where('id',$request->store_branch_id)
            ->get();

            $result = StoreBranch::where('status',1)
            ->where('id',$request->store_branch_id)
            ->get();
            $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date']];

            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
          }
          elseif($request->chk_print==3){
            $store_branchs = StoreBranch::where('status',1)
            ->where('id',$s_store_branch_id)
            ->get();

            $result = StoreBranch::where('status',1)
            ->where('id',$s_store_branch_id)
            ->get();
            $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date']];

            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
          }
    }
    ////////////สำคัญมากกกกกกกกกกกกกก//////////////

    elseif($request->chk==4){////มีเพียงออกรายงานการซ่อมที่อยู่ในอีฟนี้ ซึ่งมันมีเยอะและแพทเทิลแตกต่างจากอันอื่นเลยเอามาไว้ที่นี้
      if($request->chk_get_person=='1'){
          $item = [
            'persons.id as id',
              'persons.name as person_name',
              'store_branch.name as store_name',
          ];
        $persons = Persons::where('persons.status',1)    
        ->leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
        ->where('store_branch_id',$request->store_branch_id)
        ->get($item);
// echo 'hoho';exit();
        $result = Repair::where('status', 1)
        ->get();

        $store_branchs = StoreBranch::where('status', 1)
        ->get();

        $status_repairs = SettingStatusRepairShop::where('status', 1)
        ->get();

        $person_members = PersonsMember::where('status', 1)
        ->get();

        // $persons = Persons::where('status', 1)
        // ->get();

        $current_date=date("Y-m-d");
        $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$persons['0']['store_name'],'current_date'=>$current_date,'chk_get_per'=>1];

        return view('report/report-detail',['result'=>$result,'store_branchs'=>$store_branchs,'status_repairs'=>$status_repairs,'person_members'=>$person_members,'persons'=>$persons],$data);

      }
        if($request->chk_print==1){///chk_print คือข้อที่ 1
            // echo '555';exit();
            $item =[
              'repair.id',
              'repair.store_branch_id',

              'repair.bin_number',
              'repair.status_bill',
              'repair.status_repair',
              'repair.date_in_repair',
              'repair.date_out_repair',

              'setting_status_repair_shop.name as status_repair_shop_name',
            ];
            $item2 =[
              'list_repair.repair_id',
              'list_repair.list_name',
              'list_repair.price',

              'setting_status_repair.name as status_repair_name',

              // 'persons.name as person_name',
            ];
            if($request->store_branch_id==-1){///ร้านทั้งหมด
                  if($request->status_repair_id==-1)///สถานะทั้งหมด
                    {
                      $store_branchs = StoreBranch::where('status',1)
                      ->get();

                      $status_repair = SettingStatusRepair::where('status',1)
                      ->get();

                      $result = Repair::where('repair.status', 1)
                      ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                      ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                      ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                      ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                      ->get($item);                    
                      
                      $data =['chk'=>$request->chk,'type_name'=>'ร้านทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
                    }
                    else{///สถานะตามที่เลือก
                      $store_branchs = StoreBranch::where('status',1)
                      ->get();

                      $status_repair = SettingStatusRepair::where('status',1)
                      ->get();

                      $result = Repair::where('repair.status', 1)
                      ->where('repair.status_repair',$request->status_repair_id)
                      ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                      ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                      ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                      ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                      ->get($item);
                      $data =['chk'=>$request->chk,'type_name'=>'ร้านทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print']];

                    }
            }
            elseif($request->store_branch_id!=-1)///เลือกเฉพาะร้าน
            {
                    if($request->status_repair_id==-1)///สถานะทั้งหมด
                    {
                      $store_branchs = StoreBranch::where('status',1)
                      ->where('id',$request->store_branch_id)
                      ->get();

                      $status_repair = SettingStatusRepair::where('status',1)
                      ->get();

                      $result = Repair::where('repair.status', 1)
                      ->where('repair.store_branch_id',$request->store_branch_id)
                      ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                      ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                      ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                      ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                      ->get($item);

                      $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];

                    }
                    elseif($request->status_repair_id!=-1)///สถานะทั้งหมด
                    {
                      $store_branchs = StoreBranch::where('status',1)
                      ->where('id',$request->store_branch_id)
                      ->get();

                      $status_repair = SettingStatusRepair::where('status',1)
                      ->get();

                      $result = Repair::where('repair.status', 1)
                      ->where('repair.status_repair',$request->status_repair_id)
                      ->where('repair.store_branch_id',$request->store_branch_id)
                      ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                      ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                      ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                      ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                      ->get($item);

                      $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];

                    }
            }
            
            $list_repair = ListRepair::where('list_repair.status', 1)
            ->leftJoin('repair','repair.id','=','list_repair.repair_id')
            ->leftJoin('setting_status_repair','setting_status_repair.id','=','list_repair.status_list_repair')
            ->leftJoin('persons','persons.id','=','list_repair.person_id')
            ->get($item2);

            $date = new CallUseController();
            $result = $date->get_date_all($result,'date_in','date_in_repair');
            $result = $date->get_date_all($result,'date_out','date_out_repair');

            // echo $chk_print['chk_print'];exit();
            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs,'status_repair'=>$status_repair,'list_repair'=>$list_repair,'chk_get_per'=>0],$data);
            
        }////end chk_print1
        if($request->chk_print==2){///chk_print คือข้อที่ 2
          // echo '555';exit();
          $item =[
            'repair.id',
            'repair.store_branch_id',

            'repair.bin_number',
            'repair.status_bill',
            'repair.status_repair',
            'repair.date_in_repair',
            'repair.date_out_repair',
              'persons_member.name as member_name',
            'setting_status_repair_shop.name as status_repair_shop_name',
          ];
          $item2 =[
            'list_repair.repair_id',
            'list_repair.list_name',
            'list_repair.price',

            'setting_status_repair.name as status_repair_name',

            // 'persons.name as person_name',
          ];
          if($request->store_branch_id==-1){///ร้านทั้งหมด
                if($request->person_member_id==-1)///ร้านทั้งหมด สมาชิกทั้งหมด
                  {
                    // exit();
                    $store_branchs = StoreBranch::where('status',1)
                    ->get();

                    $status_repair = SettingStatusRepair::where('status',1)
                    ->get();

                    $result = Repair::where('repair.status', 1)
                    ->where('repair.persons_member_id','!=',NULL)
                    ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                    ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                    ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                    ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                    ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
                    ->get($item);                    
                    
                    $data =['chk'=>$request->chk,'type_name'=>'ลูกค้าสมาชิกทั้งหมด ของสาขาทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
                  }
                  elseif($request->person_member_id!=-1)///ร้านทั้งหมด สมาชิกบางคน 
                  {
                    $store_branchs = StoreBranch::where('status',1)
                    ->get();
                    $status_repair = SettingStatusRepair::where('status',1)
                    ->get();

                    $result = Repair::where('repair.status', 1)
                    // ->where('repair.persons_member_id','!=',NULL)
                    ->where('repair.persons_member_id',$request->person_member_id)
                    ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                    ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                    ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                    ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')

                    ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
                    ->get($item);           

                    $person_get = PersonsMember::find($request->person_member_id);

                    $data =['chk'=>$request->chk,'type_name'=>'ลูกค้าสมาชิก ['.''.$person_get['name'].''.'] ของสาขาทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
                  }
          }
          elseif($request->store_branch_id!=-1){///ร้านที่เลือก
                  if($request->person_member_id==-1)///เลือกร้าน สมาชิกทั้งหมด
                  {
                    // exit();
                    $store_branchs = StoreBranch::where('status',1)
                    ->get();

                    $status_repair = SettingStatusRepair::where('status',1)
                    ->get();

                    $result = Repair::where('repair.status', 1)
                    ->where('repair.store_branch_id',$request->store_branch_id)
                    ->where('repair.persons_member_id','!=',NULL)
                    ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                    ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                    ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                    ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                    ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
                    ->get($item);                    
                    
                    $store_branch__get = StoreBranch::find($request->store_branch_id);

                    $data =['chk'=>$request->chk,'type_name'=>'ลูกค้าสมาชิกทั้งหมด ของสาขา'.''.$store_branch__get['name'],'current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
                  }
                  elseif($request->person_member_id!=-1)///เลือกร้าน สมาชิกบางคน
                  {
                    // exit();
                    $store_branchs = StoreBranch::where('status',1)
                    ->get();

                    $status_repair = SettingStatusRepair::where('status',1)
                    ->get();

                    $result = Repair::where('repair.status', 1)
                    ->where('repair.store_branch_id',$request->store_branch_id)
                    ->where('repair.persons_member_id',$request->person_member_id)
                    ->where('repair.persons_member_id','!=',NULL)
                    ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                    ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                    ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                    ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                    ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
                    ->get($item);                    
                    
                    $person_get = PersonsMember::find($request->person_member_id);
                    $store_branch__get = StoreBranch::find($request->store_branch_id);

                    $data =['chk'=>$request->chk,'type_name'=>'ลูกค้าสมาชิก ['.''.$person_get['name'].''.']'.''.$store_branch__get['name'],'current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
                  }
          }

          $list_repair = ListRepair::where('list_repair.status', 1)
            ->leftJoin('repair','repair.id','=','list_repair.repair_id')
            ->leftJoin('setting_status_repair','setting_status_repair.id','=','list_repair.status_list_repair')
            ->leftJoin('persons','persons.id','=','list_repair.person_id')
            ->get($item2);

            $date = new CallUseController();
            $result = $date->get_date_all($result,'date_in','date_in_repair');
            $result = $date->get_date_all($result,'date_out','date_out_repair');

            // echo $chk_print['chk_print'];exit();
            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs,'status_repair'=>$status_repair,'list_repair'=>$list_repair,'chk_get_per'=>0],$data);
        }//////end chk_print2

        if($request->chk_print==3){///chk_print คือข้อที่ 3
          // echo '555';exit();
          $item =[
            'repair.id',
            'repair.store_branch_id',

            'repair.name as member_name',//ที่จริงทำไว้เพื่อในหน้าปริ้นจะได้เแ็นตัวแปรเดียวกับลูกค้าทั่วไป
            'repair.bin_number',
            'repair.status_bill',
            'repair.status_repair',
            'repair.date_in_repair',
            'repair.date_out_repair',
              // 'persons_member.name as member_name',
            'setting_status_repair_shop.name as status_repair_shop_name',
          ];
          $item2 =[
            'list_repair.repair_id',
            'list_repair.list_name',
            'list_repair.price',

            'setting_status_repair.name as status_repair_name',

            // 'persons.name as person_name',
          ];
          if($request->store_branch_id==-1){///ร้านทั้งหมด สมาชิกทั่วไป

                    // exit();
                    $store_branchs = StoreBranch::where('status',1)
                    ->get();

                    $status_repair = SettingStatusRepair::where('status',1)
                    ->get();

                    $result = Repair::where('repair.status', 1)
                    ->where('repair.persons_member_id','=',NULL)
                    ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                    ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                    ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                    ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                    ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
                    ->get($item);                    
                    
                    $data =['chk'=>$request->chk,'type_name'=>'ลูกค้าทั่วไปทั้งหมด ของสาขาทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
            }
            elseif($request->store_branch_id!=-1){///ร้านทั้งหมด สมาชิกทั่วไป

                    // exit();
                    $store_branchs = StoreBranch::where('status',1)
                    ->get();

                    $status_repair = SettingStatusRepair::where('status',1)
                    ->get();

                    $result = Repair::where('repair.status', 1)
                    ->where('repair.store_branch_id',$request->store_branch_id)
                    ->where('repair.persons_member_id','=',NULL)
                    ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                    ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                    ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                    ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                    ->leftJoin('persons_member','persons_member.id','=','repair.persons_member_id')
                    ->get($item);                    
                    
                    $store_branch__get = StoreBranch::find($request->store_branch_id);

                    $data =['chk'=>$request->chk,'type_name'=>'ลูกค้าทั่วไปทั้งหมด ของสาขา'.''.$store_branch__get['name'],'current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
            }
            $list_repair = ListRepair::where('list_repair.status', 1)
            ->leftJoin('repair','repair.id','=','list_repair.repair_id')
            ->leftJoin('setting_status_repair','setting_status_repair.id','=','list_repair.status_list_repair')
            ->leftJoin('persons','persons.id','=','list_repair.person_id')
            ->get($item2);

            $date = new CallUseController();
            $result = $date->get_date_all($result,'date_in','date_in_repair');
            $result = $date->get_date_all($result,'date_out','date_out_repair');

            // echo $chk_print['chk_print'];exit();
            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs,'status_repair'=>$status_repair,'list_repair'=>$list_repair,'chk_get_per'=>0],$data);

        }//end chk_print 3

        if($request->chk_print==4){///chk_print คือข้อที่ 4
          $item =[
            'repair.id',
            'repair.store_branch_id',

            'repair.bin_number',
            'repair.status_bill',
            'repair.status_repair',
            'repair.date_in_repair',
            'repair.date_out_repair',

            'list_repair.list_name  as list_repair_name',
            'list_repair.price as list_repair_price',
            'persons.name as person_name',
            'persons.id as person_id',
            'setting_status_repair.name as status_list_name',


            'setting_status_repair_shop.name as status_repair_shop_name',
          ];

            $get_store_by_person_id = Persons::find($request->person_id);
            // echo $get_store_by_person_id;exit();
            $get_store_by_person_id2 = StoreBranch::where('id',$get_store_by_person_id['store_branch_id'])->get();

            $store_branchs = StoreBranch::where('status',1)
            ->get();

            $status_repair = SettingStatusRepair::where('status',1)
            ->get();
            $result = Repair::where('repair.status', 1)
            ->where('list_repair.person_id',$request->person_id)
            ->where('repair.date_in_repair','>=',$request['chk_date_in'])
            ->where('repair.date_in_repair','<=',$request['chk_date_out'])
            ->orderBy('repair.bin_number')
            ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
            ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
            ->leftJoin('list_repair','list_repair.repair_id','=','repair.id')
            ->leftJoin('persons','persons.id','=','list_repair.person_id')
            ->leftJoin('setting_status_repair','setting_status_repair.id','=','list_repair.status_list_repair')
            ->get($item);

            $data =['chk'=>$request->chk,'type_name'=>'ร้านทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0,'store_branch_name'=>$get_store_by_person_id2['0']['name']];
                // echo $result;exit();

                $date = new CallUseController();
                $result = $date->get_date_all($result,'date_in','date_in_repair');
                $result = $date->get_date_all($result,'date_out','date_out_repair');

                // echo $result;exit();
                return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs,'status_repair'=>$status_repair,'chk_get_per'=>0],$data);
          // }
      }////end chk_print4

      if($request->chk_print==5){///chk_print คือข้อที่ 5
        // echo '555';exit();
        $item =[
          'repair.id',
          'repair.store_branch_id',

          'repair.bin_number',
          'repair.status_bill',
          'repair.status_repair',
          'repair.date_in_repair',
          'repair.date_out_repair',

          'setting_status_repair_shop.name as status_repair_shop_name',
        ];
        $item2 =[
          'list_repair.id as list_id',
          'list_repair.repair_id',
          'list_repair.list_name',
          'list_repair.price',

          'setting_status_repair.name as status_repair_name',

          // 'persons.name as person_name',
        ];
        $items3 = [// select data show in table
          'data_use_parts.list_repair_id as list_repair_id_chk'
          ,'data_use_parts.list_parts_id as list_parts_id_chk'
          ,'list_parts.name as list_parts_name'
          ,'list_parts.pay_out as pay_out'

          ,'import_parts.lot_name'
        ];
        if($request->store_branch_id==-1){///ร้านทั้งหมด
              if($request->status_repair_id==-1)///สถานะทั้งหมด
                {
                  $store_branchs = StoreBranch::where('status',1)
                  ->get();

                  $status_repair = SettingStatusRepair::where('status',1)
                  ->get();

                  $result = Repair::where('repair.status', 1)
                  ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                  ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                  ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                  ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                  ->get($item);                 
                  
                  $data =['chk'=>$request->chk,'type_name'=>'ร้านทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];
                }
                else{///สถานะตามที่เลือก
                  $store_branchs = StoreBranch::where('status',1)
                  ->get();

                  $status_repair = SettingStatusRepair::where('status',1)
                  ->get();

                  $result = Repair::where('repair.status', 1)
                  ->where('repair.status_repair',$request->status_repair_id)
                  ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                  ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                  ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                  ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                  ->get($item);
                  $data =['chk'=>$request->chk,'type_name'=>'ร้านทั้งหมด','current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print']];

                }
        }
        elseif($request->store_branch_id!=-1)///เลือกเฉพาะร้าน
        {
                if($request->status_repair_id==-1)///สถานะทั้งหมด
                {
                  $store_branchs = StoreBranch::where('status',1)
                  ->where('id',$request->store_branch_id)
                  ->get();

                  $status_repair = SettingStatusRepair::where('status',1)
                  ->get();

                  $result = Repair::where('repair.status', 1)
                  ->where('repair.store_branch_id',$request->store_branch_id)
                  ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                  ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                  ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                  ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                  ->get($item);

                  $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];

                }
                elseif($request->status_repair_id!=-1)///สถานะทั้งหมด
                {
                  $store_branchs = StoreBranch::where('status',1)
                  ->where('id',$request->store_branch_id)
                  ->get();

                  $status_repair = SettingStatusRepair::where('status',1)
                  ->get();

                  $result = Repair::where('repair.status', 1)
                  ->where('repair.status_repair',$request->status_repair_id)
                  ->where('repair.store_branch_id',$request->store_branch_id)
                  ->where('repair.date_in_repair','>=',$request['chk_date_in'])
                  ->where('repair.date_in_repair','<=',$request['chk_date_out'])
                  ->leftJoin('store_branch','store_branch.id','=','repair.store_branch_id')
                  ->leftJoin('setting_status_repair_shop','setting_status_repair_shop.id','=','repair.status_repair')
                  ->get($item);

                  $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date'],'chk_print'=>$request['chk_print'],'chk_get_per'=>0];

                }
        }
        $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
        ->where('data_use_parts.store_branch_id', $s_store_branch_id)
        ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
        ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
        ->get($items3);   
        // echo $data_use_parts;exit();

        $list_repair = ListRepair::where('list_repair.status', 1)
        ->leftJoin('repair','repair.id','=','list_repair.repair_id')
        ->leftJoin('setting_status_repair','setting_status_repair.id','=','list_repair.status_list_repair')
        ->leftJoin('persons','persons.id','=','list_repair.person_id')
        ->get($item2);

        $date = new CallUseController();
        $result = $date->get_date_all($result,'date_in','date_in_repair');
        $result = $date->get_date_all($result,'date_out','date_out_repair');

        // echo $chk_print['chk_print'];exit();
        return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs,'status_repair'=>$status_repair,'list_repair'=>$list_repair,'data_use_parts'=>$data_use_parts,'chk_get_per'=>0],$data);
        
    }////end chk_print5
     
    }///////////////////////
    elseif($request->chk==5){
          if($request->chk_print==1){
            // exit();
            $store_branchs = StoreBranch::where('status',1)
            ->get();
            $result = ListPart::where('list_parts.status', 1)
            ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
            ->get();
            $data =['chk'=>$request->chk,'type_name'=>'ทั้งหมด','current_date'=>$current_date['current_date']];

            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
          }
          elseif($request->chk_print==2){
            $store_branchs = StoreBranch::where('status',1)
            ->where('id',$request->store_branch_id)
            ->get();
            $result = ListPart::where('list_parts.status', 1)
            ->where('import_parts.store_branch_id',$request->store_branch_id)
            ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
            ->get();
            $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date']];

            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
          }
          elseif($request->chk_print==3){
            $store_branchs = StoreBranch::where('status',1)
            ->where('id',$s_store_branch_id)
            ->get();
            $result = ListPart::where('list_parts.status', 1)
            ->where('import_parts.store_branch_id',$s_store_branch_id)
            ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
            ->get();
            $data =['chk'=>$request->chk,'type_name'=>$store_branchs['0']['name'],'current_date'=>$current_date['current_date']];

            return view('report/re-excel',['result'=>$result,'store_branchs'=>$store_branchs],$data);
          }
    }

    
    else{
      echo 'n';exit;
    }
    
  }
//////////////////////////////////////////////////////////////////////////////////////////////////
    public function get_report_detail(Request $request) {
      $s_type=session('s_type','default');
      $s_store_branch_id=session('s_store_branch_id','default');
      
      if($request->chk==1){
        if($s_type==1){
          if($request->chk_get==1 && $request->get_store_branch_id!=-1){

            $store_branch = StoreBranch::where('status', 1)
            ->where('id',$request->get_store_branch_id)
            ->get();
              $item =[
                'store_branch.name as store_branch_name'
                ,'persons.name'
                ,'persons.phone'
                ,'persons.email'
              ];
              $result = Persons::where('persons.status', 1)
            ->leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
            ->where('persons.store_branch_id',$request->get_store_branch_id)
            ->where('persons.type',3)
            ->get($item);
            // $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$result['0']['store_branch_name'],'chk_get'=>0];
            if(count($result)!=0){
              // echo '111';exit();
              $store_branch = StoreBranch::where('status', 1)
              ->get();
              $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$store_branch['0']['name'],'chk_get'=>0];
              return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
            }
            else{
              // echo '2222';exit();
              $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'','chk_get'=>0];
              $store_branch = StoreBranch::where('status', 1)
              ->get();
              return view('report/report-detail',['store_branch'=>$store_branch],$data);
            }
          }
          else{
            $result = Persons::where('status', 1)
            ->where('type',3)
            ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'พนักงานทั้งหมด','chk_get'=>0];
          }

        }
        elseif($s_type==2||$s_type==3){
          $result = Persons::where('status', 1)
          ->where('type',3)
          ->where('store_branch_id',$s_store_branch_id)
          ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'พนักงาน'];
        }

          $store_branch = StoreBranch::where('status', 1)
          ->get();
          // echo $results;exit;
          return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
        }

      elseif($request->chk==2){
        // if($s_type==1){
          $result = PersonsMember::where('status', 1)
          ->where('type',4)
          ->get();

          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'สมาชิก'];
          return view('report/report-detail',['result'=>$result,'store_branch'],$data);
        }

      elseif($request->chk==3){
          if($s_type==1){
              if($request->chk_get==1 && $request->get_store_branch_id!=-1){
                $result = StoreBranch::where('status', 1)
                ->where('id',$request->get_store_branch_id)
                ->get();
                $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$result['0']['name'],'chk_get'=>0];
              }
              else{
                $result = StoreBranch::where('status', 1)
              ->get();
              $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'ร้านทั้งหมด','chk_get'=>0];
              }
            
          }
          elseif($s_type==2||$s_type==3){
            $result = StoreBranch::where('status', 1)
            ->where('id',$s_store_branch_id)
            ->get();
            $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'ร้าน','chk_get'=>0];
          }
          $store_branch = StoreBranch::where('status', 1)
          ->get();

          return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
       }

       elseif($request->chk==4){
        // if($s_type==1){
          $result = Repair::where('status', 1)
          ->get();

          $store_branchs = StoreBranch::where('status', 1)
          ->get();

          $status_repairs = SettingStatusRepairShop::where('status', 1)
          ->get();

          $person_members = PersonsMember::where('status', 1)
          ->get();

          $persons = Persons::where('status', 1)
          ->get();

          $current_date=date("Y-m-d");
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'','current_date'=>$current_date,'chk_get_per'=>0];

          return view('report/report-detail',['result'=>$result,'store_branchs'=>$store_branchs,'status_repairs'=>$status_repairs,'person_members'=>$person_members,'persons'=>$persons],$data);
        }

       elseif($request->chk==5){
        if($s_type==1){
          if($request->chk_get==1 && $request->get_store_branch_id!=-1){
            $store_branch = StoreBranch::where('status', 1)
            ->where('id',$request->get_store_branch_id)
            ->get();
            // echo $store_branch;exit();
            $result = ListPart::where('list_parts.status', 1)
          ->where('import_parts.store_branch_id',$request->get_store_branch_id)
          ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
          ->get();
                if(count($result)!=0){
                  // echo '111';exit();
                  $store_branch = StoreBranch::where('status', 1)
                  ->get();
                  $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$store_branch['0']['name'],'chk_get'=>0];
                  return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
                }
                else{
                  // echo '2222';exit();
                  $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'','chk_get'=>0];
                  $store_branch = StoreBranch::where('status', 1)
                  ->get();
                  return view('report/report-detail',['store_branch'=>$store_branch],$data);
                }
          }
          else{
            $result = ListPart::where('list_parts.status', 1)
            ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
            ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'ร้านทั้งหมด','chk_get'=>0];
          }

        }
        elseif($s_type==2||$s_type==3){
          $store_branch = StoreBranch::where('status', 1)
          ->where('id',$s_store_branch_id)
          ->get();

          $result = ListPart::where('list_parts.status', 1)
          ->where('import_parts.store_branch_id',$s_store_branch_id)
          ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
          ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$store_branch['0']['name']];
        }

          $store_branch = StoreBranch::where('status', 1)
          ->get();

          
          return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
       }
      else{
        echo 'n';exit;
      }
      
    }
    // ///////////////////////////////////////////////////////////////////////////////////////////////
    public function get_report_list() {
      $s_type=session('s_type','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
          $results = Persons::where('status', 1)
          ->get();
          $gender_employee = $this->count_gender_employee($results);

          $results2 = PersonsMember::where('persons_member.status', 1)
          ->get();
          // echo $results2;exit();
          $gender_member = $this->count_gender_member($results2);

          $results3 = StoreBranch::all();
          $store_branch = $this->count_store_branch($results3);

          $results4 = Repair::where('status',1)
          ->get();
          $repair = $this->count_repair($results4);

          $results5 = ImportPart::where('status',1)
          ->get();
          $parts = $this->count_parts($results5);

          $data =[
          'countmale_em' => $gender_employee['countmale'],
          'countfemale_em' => $gender_employee['countfemale'],
          'countundefine_em' => $gender_employee['countundefine'],
          'countgernderall_em' => $gender_employee['countgernderall'],

          'countmale_me' => $gender_member['countmale'],
          'countfemale_me' => $gender_member['countfemale'],
          'countundefine_me' => $gender_member['countundefine'],
          'countgernderall_me' => $gender_member['countgernderall'],

          'countopen_st' => $store_branch['countopen'],
          'countclose_st' => $store_branch['countclose'],
          'countall_st' => $store_branch['countstoreall'],

          'countmember_re' => $repair['countmember'],
          'countgeneral_re' => $repair['countgeneral'],
          'countall_re' => $repair['countrepairall'],

          'countlot_pa' => $parts['countpartlittle'],
          'countall_pa' => $parts['countpartsall'],
          'countlittle_pa' => $parts['countpartlittle'],
          ];
          // echo $data['countmale'];exit();
          
          return view('report/report-list',$data);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }

     
    }

        ////////////////count gender male female undifind employee/////////////////////////
        public function count_gender_employee($results) {
          foreach ($results as $value) {
            $results['countmale'] = $this->countmale_employee($value['id']);
            $results['countfemale'] = $this->countfemale_employee($value['id']);
            $results['countundefine'] = $this->countundefine_employee($value['id']);
            // $results[$key]['countfemaleal'] = $this->countfemaleall();
            // print_r($results[$key]['countfemale']);exit();
          }
          $results['countgernderall']=$results['countmale']+$results['countfemale']+$results['countundefine'];
          // echo $results['countgernderall'];exit();
          return $results;
        }
        public function countmale_employee($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
          $results = Persons::where('persons.status', 1)
          ->where('persons.type', 3)
          ->where('persons.gender', 1)
          ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results = Persons::where('persons.status', 1)
            ->where('persons.store_branch_id', $s_store_branch_id)
            ->where('persons.type', 3)
            ->where('persons.gender', 1)
            ->count();
            }
         return $results;
        }
        public function countfemale_employee($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
          $results = Persons::where('persons.status', 1)
          ->where('persons.type', 3)
          ->where('persons.gender', 2)
          ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results = Persons::where('persons.status', 1)
            ->where('persons.store_branch_id', $s_store_branch_id)
            ->where('persons.type', 3)
            ->where('persons.gender', 2)
            ->count();
            }
          return $results;
        }
        public function countundefine_employee($id) {
          $results = Persons::where('persons.status', 1)
          ->where('persons.type', 3)
          ->where('persons.gender',null)
          ->count();
          return $results;
        }
    /////////////////////////////////////end/////////////////////////////////
  
      ////////////////count gender male female undifind member/////////////////////////
      public function count_gender_member($results2) {
        foreach ($results2 as $value) {
          $results2['countmale'] = $this->countmale_member($value['id']);
          $results2['countfemale'] = $this->countfemale_member($value['id']);
          $results2['countundefine'] = $this->countundefine_member($value['id']);
          // $results[$key]['countfemaleal'] = $this->countfemaleall();
          // print_r($results[$key]['countfemale']);exit();
        }
        $results2['countgernderall']=$results2['countmale']+$results2['countfemale']+$results2['countundefine'];

        return $results2;
      }
      public function countmale_member($id) {
        $results2 = PersonsMember::where('persons_member.status', 1)
        ->where('persons_member.type', 4)
        ->where('persons_member.gender', 1)
        ->count();
        return $results2;
      }
      public function countfemale_member($id) {
        $results2 = PersonsMember::where('persons_member.status', 1)
        ->where('persons_member.type', 4)
        ->where('persons_member.gender', 0)
        ->count();
        return $results2;
      }
      public function countundefine_member($id) {
        $results2 = PersonsMember::where('persons_member.status', 1)
        ->where('persons_member.type', 4)
        ->where('persons_member.gender',null)
        ->count();
        return $results2;
      }
      /////////////////////////////////////end/////////////////////////////////

      ////////////////count open close storebranch/////////////////////////
      public function count_store_branch($results3) {
        foreach ($results3 as $value) {
          $results3['countopen'] = $this->count_open_store_branch($value['id']);
          $results3['countclose'] = $this->count_close_store_branch($value['id']);
          // $results[$key]['countfemaleal'] = $this->countfemaleall();
          // print_r($results[$key]['countfemale']);exit();
        }
        $results3['countstoreall']=$results3['countopen']+$results3['countclose'];

        return $results3;
      }
      public function count_open_store_branch($id) {
        $results3 = StoreBranch::where('store_branch.status', 1)
        ->count();
        return $results3;
      }
      public function count_close_store_branch($id) {
        $results3 = StoreBranch::where('store_branch.status', 0)
        ->count();
        return $results3;
      }

      /////////////////////////////////////end/////////////////////////////////

          ////////////////count member general repair/////////////////////////
          public function count_repair($results4) {
            foreach ($results4 as $value) {
              $results4['countmember'] = $this->count_repair_member($value['id']);
              $results4['countgeneral'] = $this->count_repair_general($value['id']);
            }
            $results4['countrepairall']=$results4['countmember']+$results4['countgeneral'];
 
            return $results4;
          }
          public function count_repair_member($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
            $results4 = Repair::where('repair.status', 1)
            ->where('persons_member_id','!=',NULL)
            ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results4 = Repair::where('repair.status', 1)
            ->where('persons_member_id','!=',NULL)
            ->where('store_branch_id',$s_store_branch_id)
            ->count();
            }
            return $results4;
          }
          public function count_repair_general($id) {
            $s_type=session('s_type','default');
            $s_store_branch_id=session('s_store_branch_id','default');
            if($s_type==1){
              $results4 = Repair::where('repair.status', 1)
              ->where('persons_member_id','=',NULL)
              ->count();
            }
            elseif($s_type==2||$s_type==3){
              $results4 = Repair::where('repair.status', 1)
              ->where('persons_member_id','=',NULL)
              ->where('store_branch_id',$s_store_branch_id)
              ->count();
              }
              return $results4;
          }
    
          /////////////////////////////////////end/////////////////////////////////

           ////////////////count member general repair/////////////////////////
           public function count_parts($results5) {
            foreach ($results5 as $value) {
              $results5['countlotparts'] = $this->count_lot_parts($value['id']);
              $results5['countpartsall'] = $this->count_list_part_all($value['id']);
              $results5['countpartlittle'] = $this->count_list_part_little($value['id']);
            }
            // $results4['countrepairall']=$results4['countmember']+$results4['countgeneral'];
 
            return $results5;
          }

          public function count_lot_parts($id) {
            $s_type=session('s_type','default');
            $s_store_branch_id=session('s_store_branch_id','default');
            if($s_type==1){
              $results5 = ImportPart::where('import_parts.status', 1)
              ->count();
            }
            elseif($s_type==2||$s_type==3){
              $results5 = ImportPart::where('import_parts.status', 1)
              ->where('import_parts.store_branch_id',$s_store_branch_id)
              ->count();
              }
              return $results5;
            }

          public function count_list_part_all($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
            $results5 = ListPart::where('list_parts.status', 1)
            ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results5 = ListPart::where('list_parts.status', 1)
            ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
            ->where('import_parts.store_branch_id',$s_store_branch_id)
            ->count();
            }
            return $results5;
          }

          public function count_list_part_little($id) {
            $s_type=session('s_type','default');
            $s_store_branch_id=session('s_store_branch_id','default');
            if($s_type==1){
              $results5 = ListPart::where('list_parts.status', 1)
              ->where('list_parts.number','<=',5)
              ->count();
            }
            elseif($s_type==2||$s_type==3){
              $results5 = ListPart::where('list_parts.status', 1)
              ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
              ->where('import_parts.store_branch_id',$s_store_branch_id)
              ->where('list_parts.number','<=',5)
              ->count();
              }
              return $results5;
            }
    
          /////////////////////////////////////end/////////////////////////////////
}
