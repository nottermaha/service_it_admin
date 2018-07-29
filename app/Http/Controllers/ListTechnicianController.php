<?php

namespace App\Http\Controllers;

use App\ListRepair;
use App\ListPart;
use App\SettingStatusRepair;
use App\Guarantee;
use App\DataUsePart;
use App\Persons;
use App\ImportPart;
use App\SettingBrandPart;
use App\SettingGroupPart;

use Illuminate\Http\Request;

class ListTechnicianController extends Controller
{    
    public function get_list_repair_for_technician() {
      $s_type=session('s_type','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
    $s_store_branch_id=session('s_store_branch_id','default');
          $s_id=session('s_id','default');
          $items = [// select data show in table
            'setting_status_repair.*'
            , 'setting_status_repair.name'
            , 'setting_status_repair.status_color'

            ,'guarantee.name as guarantee_name'

            ,'persons.id as person_id'
            ,'persons.name as person_name'

            ,'repair.id as repair_id'//->
            ,'repair.bin_number as bin_number'//->
            ,'repair.persons_member_id as persons_member_id'//->

            ,'list_repair.list_name'
            // ,'list_repair.detail'
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
          ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')
          ->leftJoin('repair', 'repair.id', '=', 'list_repair.repair_id')
          ->where('list_repair.status', 1)
          ->where('list_repair.person_id', $s_id)//->
          ->where('repair.store_branch_id', $s_store_branch_id)//->
          ->where('repair.status_bill',0)//->
          ->where('repair.status',1)//->
          ->orderBy('repair.bin_number','desc')//->
          // ->where('list_repair.repair_id',$request->id)
          ->get($items);
          // echo $list_repairs;exit();
    ////////เอาไว้ select///////////
          $setting_status_repairs = SettingStatusRepair::where('status', 1)
          ->get();

          $items3 = [// //->
            'import_parts.lot_name as import_parts_lot_name'
            , 'list_parts.id'
            , 'list_parts.name'
            , 'list_parts.generation'
            , 'list_parts.pay_out'
            , 'list_parts.number'
          ];
          $list_parts = ListPart::where('list_parts.status', 1)
          ->where('import_parts.status', 1)
          ->orderBy('list_parts.name','asc')
          ->leftJoin('import_parts','import_parts.id','=','list_parts.import_parts_id')
          ->where('import_parts.store_branch_id', $s_store_branch_id)
          ->get($items3);
    //////////////////////////////
          $items2 = [// select data show in table
            'data_use_parts.list_repair_id as list_repair_id_chk'
            ,'data_use_parts.list_parts_id as list_parts_id_chk'
            ,'list_parts.name as list_parts_name'
            ,'list_parts.generation as list_parts_generation'
            ,'list_parts.pay_out as pay_out'
            ,'import_parts.lot_name as lot_name3'
          ];
          $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
          ->where('data_use_parts.store_branch_id', $s_store_branch_id)
          ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
          ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
          ->get($items2);
    //  echo $data_use_parts;exit();

//////////////////////
$item = [
  'setting_group_part.id as group_id'
  ,'setting_group_part.name as group_name'

  ,'setting_brand_part.id as brand_id'
  ,'setting_brand_part.name as brand_name'

  ,'list_parts.id'
  // ,'list_parts.setting_brand_part_id as momo'
  ,'list_parts.name'
  ,'list_parts.generation'
  ,'list_parts.number'
  ,'list_parts.pay_out'
  ,'list_parts.status'
];
$list_parts = ListPart::where('list_parts.status',1)
->leftJoin('setting_group_part','setting_group_part.id','=','list_parts.setting_group_part_id')
->leftJoin('setting_brand_part','setting_brand_part.id','=','list_parts.setting_brand_part_id')
->get($item);
$group_parts = SettingGroupPart::where('status',1)
->get();
$brand_parts = SettingBrandPart::where('status',1)
->get();
/////////////////////

          if($list_repairs!='[]'){ 
            $data = [
            'repair_id'=>$list_repairs['0']['repair_id'],
            'chk'=>1,
          ];

          // echo $setting_status_repair;exit();
        
          return view('list_tecnician/list-technician', 
          ['list_repairs' => $list_repairs,
          'setting_status_repairs'=>$setting_status_repairs,
          'list_parts'=>$list_parts,
          'data_use_parts'=>$data_use_parts
          ,'group_parts'=>$group_parts,
          'brand_parts'=>$brand_parts
          ,'list_parts'=>$list_parts
        ],$data);
          }
          else{
            $data = [
              'repair_id'=>0,
              'chk'=>1,
            ];
            return view('list_tecnician/list-technician', 
            ['list_repairs' => $list_repairs,
            'setting_status_repairs'=>$setting_status_repairs,
            'list_parts'=>$list_parts,
            'data_use_parts'=>$data_use_parts
            ,'group_parts'=>$group_parts
            ,'brand_parts'=>$brand_parts
            ,'list_parts'=>$list_parts
          ],$data);
          }
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }
      
    }
    
    public function edit_status(Request $request)
    {
      // echo $request['status_list_repair'];exit();
      $s_store_branch_id=session('s_store_branch_id','default');
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


      return redirect('list-repair-for-technician');
    }

    public function create_data_use_part(Request $request)
    { 
      // echo "jjj";
      // echo $request['list_parts_id'];exit();
        $s_store_branch_id=session('s_store_branch_id','default');
        $list_part = ListPart::find($request->list_parts_id);
        if($list_part['number']<=0){
          // $request->session()->flash('status_part_null', 'อะไหล่ไม่มี');
          $data = [
              // 'status_part_null_name'=>$list_part['name'],
              // 'status_part_null_id'=>$request->list_repair_id,
              'repair_id'=>$request->repair_id,
              'chk'=>0,
          ];
          //  echo $data['chk'];exit();
          $request->session()->flash('status_part_null_name', $list_part['name']);
          $request->session()->flash('status_part_null_id', $request->list_repair_id);
          // $request->session()->flash('status_create', 'เพิ่มอะไหล่เรียบร้อยแล้ว');
        }
        else
        {

        // echo 'hh';exit();
        $data_use_part = new DataUsePart;
        $data_use_part->store_branch_id = $s_store_branch_id;
        $data_use_part->list_repair_id = $request->list_repair_id;
        $data_use_part->list_parts_id = $request->list_parts_id;
        $data_use_part->status = true;
        $data_use_part->save();
        $list_part_delete_number =ListPart::find($request->list_parts_id);
        // echo $list_part_delete_number['number'];
        $list_part_delete_number->number = $list_part_delete_number['number']-1;
        // echo $list_part_delete_number['number'];exit();
        $list_part_delete_number->status = true;
        $list_part_delete_number->save();
        $data = [
          'repair_id'=>$request->repair_id,
          'chk'=>1,
        ];
        
        $request->session()->flash('status_create', 'เพิ่มอะไหล่เรียบร้อยแล้ว'); 
        }
        return redirect('list-repair-for-technician');
        
    }

    public function delete_data_use_part(Request $request)
    { 
        $data_use_part = DataUsePart::where('status',1)
        ->where('list_repair_id',$request->list_repair_id)
        ->where('list_parts_id',$request->list_parts_id)
        ->get();
        // echo $data_use_part;exit();
        $data_use_part_delete = DataUsePart::find($data_use_part['0']['id']);
        // echo $data_use_part_delete;exit();
        $data_use_part_delete->status = 0;
        $data_use_part_delete->save();
        $list_part_delete_number =ListPart::find($request->list_parts_id);
        // echo $list_part_delete_number['number'];
        $list_part_delete_number->number = $list_part_delete_number['number']+1;
        // echo $list_part_delete_number['number'];exit();
        $list_part_delete_number->status = true;
        $list_part_delete_number->save();

        $request->session()->flash('status_create', 'ลบอะไหล่เรียบร้อยแล้ว'); 
        return redirect('list-repair-for-technician');
        
    }
}
