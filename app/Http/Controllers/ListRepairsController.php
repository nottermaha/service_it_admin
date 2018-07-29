<?php

namespace App\Http\Controllers;

use App\ListRepair;
use App\ListPart;
use App\SettingStatusRepair;
use App\Guarantee;
use App\DataUsePart;
use App\Persons;
use App\ImportPart;

use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน

class ListRepairsController extends Controller
{    
    public function get_list_repair_by_id(Request $request) {
      // echo $request['id'];exit();
      $s_store_branch_id=session('s_store_branch_id','default');
      $items = [// select data show in table
        'setting_status_repair.*'
        , 'setting_status_repair.name'
        , 'setting_status_repair.status_color'

        , 'guarantee.name as guarantee_name'

        ,'persons.id as person_id'//
        ,'persons.name as person_name'//

        ,'list_repair.list_name'
        // ,'list_repair.detail'
        ,'list_repair.symptom'
        ,'list_repair.image'
        ,'list_repair.price'
        ,'list_repair.price_before'
        ,'list_repair.status_list_repair'
        ,'list_repair.guarantee_id'
        ,'list_repair.image'
        ,'list_repair.id'
    ];
      $list_repairs = ListRepair::
      leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
      ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
      ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
      ->where('list_repair.status', 1)
      ->where('list_repair.repair_id',$request->id)
      ->get($items);
// echo $list_repairs;exit();
////////เอาไว้ select///////////
      $setting_status_repairs = SettingStatusRepair::where('status', 1)
      ->get();

      $guarantees = Guarantee::where('status', 1)
      ->get();

      $persons = Persons::where('status', 1)
      ->where('store_branch_id',$s_store_branch_id)
      ->get();

      $items3 = [// select data show in table
        'import_parts.lot_name as import_parts_lot_name'
        , 'list_parts.name'
        , 'list_parts.pay_out'
        , 'list_parts.number'
      ];
      $list_parts = ListPart::where('list_parts.status', 1)
      ->orderBy('list_parts.name','asc')
      ->leftJoin('import_parts','import_parts.id','=','list_parts.import_parts_id')
      ->get($items3);
//////////////////////////////
      $items2 = [// select data show in table
        'data_use_parts.list_repair_id as list_repair_id_chk'
        ,'data_use_parts.list_parts_id as list_parts_id_chk'
        ,'list_parts.name as list_parts_name'
        ,'list_parts.pay_out as pay_out'
      ];
      $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
      ->where('data_use_parts.store_branch_id', $s_store_branch_id)
      ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
      ->get($items2);
//  echo $data_use_parts;exit();
      $data = [
        'repair_id'=>$request->id,
        'chk'=>1,
        'back'=>$request->back,
      ];

      // echo $setting_status_repair;exit();
      return view('list_repairs/list-repairs', 
      ['list_repairs' => $list_repairs,
      'setting_status_repairs'=>$setting_status_repairs,
      'guarantees'=>$guarantees,
      'list_parts'=>$list_parts,
      'persons'=>$persons,
      'data_use_parts'=>$data_use_parts],$data);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
      $status_list_repair = SettingStatusRepair::where('status',1)
      ->orderBy('id','asc')
      ->limit('1')
      ->get();
      $s_store_branch_id=session('s_store_branch_id','default');
        $repair = new ListRepair;
        // $repair->store_branch_id = $s_store_branch_id;
        $repair->person_id =  $request->person_id;
        $repair->status_list_repair = $status_list_repair['0']['id'];
        $repair->repair_id = $request->repair_id;
        $repair->list_name =  $request->list_name;
        // $repair->detail =  $request->detail;
        $repair->symptom =  $request->symptom;               
        $repair->image = 'default.jpg';        
        $repair->status = true;
        $repair->save();
        $request->session()->flash('list_status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 
        // echo $repair['repair_id'];exit();
        // return redirect('list-repair/'.$repair['repair_id']);
        $items = [// select data show in table
          'setting_status_repair.*'
          , 'setting_status_repair.name'
          , 'setting_status_repair.status_color'
  
          , 'guarantee.name as guarantee_name'

          ,'persons.id as person_id'//
          ,'persons.name as person_name'//
  
          ,'list_repair.list_name'
          // ,'list_repair.detail'
          ,'list_repair.symptom'
          ,'list_repair.image'
          ,'list_repair.price'
          ,'list_repair.price_before'
          ,'list_repair.status_list_repair'
          ,'list_repair.guarantee_id'
          ,'list_repair.id'
      ];
        $list_repairs = ListRepair::
        leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
        ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
        ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
        ->where('list_repair.status', 1)
        ->where('list_repair.repair_id',$request->repair_id)
        ->get($items);
  
  ////////เอาไว้ select///////////
        $setting_status_repairs = SettingStatusRepair::where('status', 1)
        ->get();
  
        $guarantees = Guarantee::where('status', 1)
        ->get();

        $persons = Persons::where('status', 1)
        ->get();
  
        $list_parts = ListPart::where('status', 1)
        ->get();
  //////////////////////////////
          $items2 = [// select data show in table
            'data_use_parts.list_repair_id as list_repair_id_chk'
            ,'data_use_parts.list_parts_id as list_parts_id_chk'
            ,'list_parts.name as list_parts_name'
            ,'list_parts.pay_out as pay_out'
          ];
          $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
          ->where('data_use_parts.store_branch_id', $s_store_branch_id)
          ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
          ->get($items2);
  
        // $repair_id['repair_id']=$request->repair_id;
        $data = [
          'repair_id'=>$request->repair_id,
          'chk'=>1,
          'back'=>$request->back,
        ];
  
        // echo $setting_status_repair;exit();
        return view('list_repairs/list-repairs', 
        ['list_repairs' => $list_repairs,
        'setting_status_repairs'=>$setting_status_repairs,
        'guarantees'=>$guarantees,
        'list_parts'=>$list_parts,
        'persons'=>$persons,
        'data_use_parts'=>$data_use_parts],$data);
    }
    public function edit(Request $request)
    {
      // echo $request['status_list_repair_old'];exit();
      $s_store_branch_id=session('s_store_branch_id','default');
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
      if($request['person_id']>=1){
        $repair->person_id = $request->person_id;
      }
      else{
        $repair->person_id = $request->person_id_old;
      } 
      $repair->repair_id = $request->repair_id;      
      $repair->list_name =  $request->list_name;
      // $repair->detail =  $request->detail;
      $repair->symptom =  $request->symptom;
      $repair->price =  $request->price;
      $repair->price_before =  $request->price_before;

      if ($request->hasFile('image')) {  
        
        $chk_name =$request->file('image')
        ->getClientOriginalName();     
        $value = substr($chk_name,-3);
        if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
          // echo '44';exit();
        }
        else{
          // echo 'tt';exit();
          $request->session()->flash('status_image_fail', ''); 
          $request->session()->flash('status_id',$request->id); 
          // return redirect('gallery');
          ///////////////////
                            $items = [// select data show in table
                              'setting_status_repair.*'
                              , 'setting_status_repair.name'
                              , 'setting_status_repair.status_color'
                      
                              , 'guarantee.name as guarantee_name'
                      
                              ,'persons.id as person_id'//
                              ,'persons.name as person_name'//
                      
                              ,'list_repair.list_name'
                              // ,'list_repair.detail'
                              ,'list_repair.symptom'
                              ,'list_repair.image'
                              ,'list_repair.price'
                              ,'list_repair.price_before'
                              ,'list_repair.status_list_repair'
                              ,'list_repair.guarantee_id'
                              ,'list_repair.id'
                          ];
                            $list_repairs = ListRepair::
                            leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
                            ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
                            ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
                            ->where('list_repair.status', 1)
                            ->where('list_repair.repair_id',$request->repair_id)
                            ->get($items);
                      
                      ////////เอาไว้ select///////////
                            $setting_status_repairs = SettingStatusRepair::where('status', 1)
                            ->get();
                      
                            $guarantees = Guarantee::where('status', 1)
                            ->get();
                      
                            $persons = Persons::where('status', 1)
                            ->get();
                      
                            $list_parts = ListPart::where('status', 1)
                            ->get();
                      //////////////////////////////
                              $items2 = [// select data show in table
                                'data_use_parts.list_repair_id as list_repair_id_chk'
                                ,'data_use_parts.list_parts_id as list_parts_id_chk'
                                ,'list_parts.name as list_parts_name'
                                ,'list_parts.pay_out as pay_out'
                              ];
                              $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
                              ->where('data_use_parts.store_branch_id', $s_store_branch_id)
                              ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
                              ->get($items2);
                      
                            // $repair_id['repair_id']=$request->repair_id;
                            $data = [
                              'repair_id'=>$request->repair_id,
                              'chk'=>1,
                              'back'=>$request->back,
                            ];
                      
                            // echo $setting_status_repair;exit();
                            return view('list_repairs/list-repairs', 
                            ['list_repairs' => $list_repairs,
                            'setting_status_repairs'=>$setting_status_repairs,
                            'guarantees'=>$guarantees,
                            'list_parts'=>$list_parts,
                            'persons'=>$persons,
                            'data_use_parts'=>$data_use_parts],$data);
          /////////////////
        }

        $filename = str_random(10) . '.' . $request->file('image')
        ->getClientOriginalName();             
        $request->file('image')->move('image/list-repair/picture/', $filename);           
        Image::make('image/list-repair/picture/' . $filename)
        ->resize(200, 200)->save('image/list-repair/resize/' . $filename);     
        $repair->image = $filename;      
        $repair->status = true;
        // $repair->save();
        // $request->session()->flash('list_status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว');   
      } 
      else{
        // echo '5555555555555';exit();                
          if($request['image']<=1){
              $repair->image =$repair['image'];
              $repair->status = true;

          }
          else{
            $request->session()->flash('status_image_fail', ''); 
            $request->session()->flash('status_id',$request->id); 

                      ///////////////////
                      $items = [// select data show in table
                        'setting_status_repair.*'
                        , 'setting_status_repair.name'
                        , 'setting_status_repair.status_color'
                
                        , 'guarantee.name as guarantee_name'
                
                        ,'persons.id as person_id'//
                        ,'persons.name as person_name'//
                
                        ,'list_repair.list_name'
                        // ,'list_repair.detail'
                        ,'list_repair.symptom'
                        ,'list_repair.image'
                        ,'list_repair.price'
                        ,'list_repair.price_before'
                        ,'list_repair.status_list_repair'
                        ,'list_repair.guarantee_id'
                        ,'list_repair.id'
                    ];
                      $list_repairs = ListRepair::
                      leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
                      ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
                      ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
                      ->where('list_repair.status', 1)
                      ->where('list_repair.repair_id',$request->repair_id)
                      ->get($items);
                
                ////////เอาไว้ select///////////
                      $setting_status_repairs = SettingStatusRepair::where('status', 1)
                      ->get();
                
                      $guarantees = Guarantee::where('status', 1)
                      ->get();
                
                      $persons = Persons::where('status', 1)
                      ->get();
                
                      $list_parts = ListPart::where('status', 1)
                      ->get();
                //////////////////////////////
                        $items2 = [// select data show in table
                          'data_use_parts.list_repair_id as list_repair_id_chk'
                          ,'data_use_parts.list_parts_id as list_parts_id_chk'
                          ,'list_parts.name as list_parts_name'
                          ,'list_parts.pay_out as pay_out'
                        ];
                        $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
                        ->where('data_use_parts.store_branch_id', $s_store_branch_id)
                        ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
                        ->get($items2);
                
                      // $repair_id['repair_id']=$request->repair_id;
                      $data = [
                        'repair_id'=>$request->repair_id,
                        'chk'=>1,
                        'back'=>$request->back,
                      ];
                
                      // echo $setting_status_repair;exit();
                      return view('list_repairs/list-repairs', 
                      ['list_repairs' => $list_repairs,
                      'setting_status_repairs'=>$setting_status_repairs,
                      'guarantees'=>$guarantees,
                      'list_parts'=>$list_parts,
                      'persons'=>$persons,
                      'data_use_parts'=>$data_use_parts],$data);
    /////////////////

          }             
       }
      $repair->save();
      $request->session()->flash('list_status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว');
      // $repair->status = true;
      // $repair->save();
      // $request->session()->flash('list_status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      // return redirect('list-repair/'.$repair['repair_id']);
      $items = [// select data show in table
        'setting_status_repair.*'
        , 'setting_status_repair.name'
        , 'setting_status_repair.status_color'

        , 'guarantee.name as guarantee_name'

        ,'persons.id as person_id'//
        ,'persons.name as person_name'//

        ,'list_repair.list_name'
        // ,'list_repair.detail'
        ,'list_repair.symptom'
        ,'list_repair.image'
        ,'list_repair.price'
        ,'list_repair.price_before'
        ,'list_repair.status_list_repair'
        ,'list_repair.guarantee_id'
        ,'list_repair.id'
    ];
      $list_repairs = ListRepair::
      leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
      ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
      ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
      ->where('list_repair.status', 1)
      ->where('list_repair.repair_id',$request->repair_id)
      ->get($items);

////////เอาไว้ select///////////
      $setting_status_repairs = SettingStatusRepair::where('status', 1)
      ->get();

      $guarantees = Guarantee::where('status', 1)
      ->get();

      $persons = Persons::where('status', 1)
      ->get();

      $list_parts = ListPart::where('status', 1)
      ->get();
//////////////////////////////
        $items2 = [// select data show in table
          'data_use_parts.list_repair_id as list_repair_id_chk'
          ,'data_use_parts.list_parts_id as list_parts_id_chk'
          ,'list_parts.name as list_parts_name'
          ,'list_parts.pay_out as pay_out'
        ];
        $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
        ->where('data_use_parts.store_branch_id', $s_store_branch_id)
        ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
        ->get($items2);

      // $repair_id['repair_id']=$request->repair_id;
      $data = [
        'repair_id'=>$request->repair_id,
        'chk'=>1,
        'back'=>$request->back,
      ];

      // echo $setting_status_repair;exit();
      return view('list_repairs/list-repairs', 
      ['list_repairs' => $list_repairs,
      'setting_status_repairs'=>$setting_status_repairs,
      'guarantees'=>$guarantees,
      'list_parts'=>$list_parts,
      'persons'=>$persons,
      'data_use_parts'=>$data_use_parts],$data);
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
      $request->session()->flash('list_status_edit', 'แก้ไขข้อมูลสถานะการซ่อมเรียบร้อย'); 

      // return redirect('list-repair/'.$repair['repair_id']);
      $items = [// select data show in table
        'setting_status_repair.*'
        , 'setting_status_repair.name'
        , 'setting_status_repair.status_color'

        , 'guarantee.name as guarantee_name'

        ,'persons.id as person_id'//
        ,'persons.name as person_name'//

        ,'list_repair.list_name'
        // ,'list_repair.detail'
        ,'list_repair.symptom'
        ,'list_repair.image'
        ,'list_repair.price'
        ,'list_repair.price_before'
        ,'list_repair.status_list_repair'
        ,'list_repair.guarantee_id'
        ,'list_repair.id'
    ];
      $list_repairs = ListRepair::
      leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
      ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
      ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
      ->where('list_repair.status', 1)
      ->where('list_repair.repair_id',$request->repair_id)
      ->get($items);

////////เอาไว้ select///////////
      $setting_status_repairs = SettingStatusRepair::where('status', 1)
      ->get();

      $guarantees = Guarantee::where('status', 1)
      ->get();

      $persons = Persons::where('status', 1)
      ->get();

      $list_parts = ListPart::where('status', 1)
      ->get();
//////////////////////////////
        $items2 = [// select data show in table
          'data_use_parts.list_repair_id as list_repair_id_chk'
          ,'data_use_parts.list_parts_id as list_parts_id_chk'
          ,'list_parts.name as list_parts_name'
          ,'list_parts.pay_out as pay_out'
        ];
        $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
        ->where('data_use_parts.store_branch_id', $s_store_branch_id)
        ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
        ->get($items2);

      // $repair_id['repair_id']=$request->repair_id;
      $data = [
        'repair_id'=>$request->repair_id,
        'chk'=>1,
        'back'=>$request->back,
      ];

      // echo $setting_status_repair;exit();
      return view('list_repairs/list-repairs', 
      ['list_repairs' => $list_repairs,
      'setting_status_repairs'=>$setting_status_repairs,
      'guarantees'=>$guarantees,
      'list_parts'=>$list_parts,
      'persons'=>$persons,
      'data_use_parts'=>$data_use_parts],$data);
    }
    public function delete(Request $request)
    {
      // echo $repair_id;exit();
      $s_store_branch_id=session('s_store_branch_id','default');
      $repair = ListRepair::find($request->id);
      $repair->status = 0;
      $repair->save();
      $repair2=session()->flash('list_status_delete', 'ลบข้อมูลเรียบร้อยแล้ว');

      /////////////

      $list_repair = ListRepair::where('list_repair.status',1)
      ->where('id',$request->id)
      ->get();//get รายการที่จะลบ
      // echo $list_repair;exit();
      foreach($list_repair as $key=>$value)
      { 
        $item2 = [
          'data_use_parts.id as data_id',
          'data_use_parts.list_parts_id as data_list_parts_id',
        ];
        $data_use_part = DataUsePart::where('data_use_parts.status',1)
        ->where('data_use_parts.list_repair_id',$list_repair[$key]['id'])
        ->orderBy('data_use_parts.id','asc')
        ->leftJoin('list_parts','list_parts.id','=','data_use_parts.list_parts_id')
        ->leftJoin('list_repair','list_repair.id','=','data_use_parts.list_repair_id')
        ->get($item2); //get ว่ารายการย่อยของเรา ถูกใช้ใน use_data.id ไหนบ้าง
        // echo $data_use_part;exit();
        foreach($data_use_part as $value)
        { 
          //แก้ไข status=0 และ เพิ่มอะไหล+1
          $data_use_part['data_id2']=$value['data_id'];
          $data_use_part_edit = DataUsePart::find($data_use_part['data_id2']);
          $data_use_part_edit->status = 0;
          $data_use_part_edit->save();

        $data_use_part['data_list_parts_id2']=$value['data_list_parts_id'];
        $list_part_delete_number =ListPart::find($data_use_part['data_list_parts_id2']);
        $list_part_delete_number->number = $list_part_delete_number['number']+1;
        // echo $list_part_delete_number['number'];exit();
        $list_part_delete_number->status = true;
        $list_part_delete_number->save();       
        
        }

      }

      // $repair_id['repair_id']=$repair['repair_id'];
      // echo $repair_id['repair_id'];exit();
      // return redirect('list-repair/'.$repair['repair_id']);
      $items = [// select data show in table
        'setting_status_repair.*'
        , 'setting_status_repair.name'
        , 'setting_status_repair.status_color'

        , 'guarantee.name as guarantee_name'

        ,'persons.id as person_id'//
        ,'persons.name as person_name'//

        ,'list_repair.list_name'
        // ,'list_repair.detail'
        ,'list_repair.symptom'
        ,'list_repair.image'
        ,'list_repair.price'
        ,'list_repair.price_before'
        ,'list_repair.status_list_repair'
        ,'list_repair.guarantee_id'
        ,'list_repair.id'
    ];
      $list_repairs = ListRepair::
      leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
      ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
      ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
      ->where('list_repair.status', 1)
      ->where('list_repair.repair_id',$request->repair_id)
      ->get($items);

////////เอาไว้ select///////////
      $setting_status_repairs = SettingStatusRepair::where('status', 1)
      ->get();

      $guarantees = Guarantee::where('status', 1)
      ->get();

      $persons = Persons::where('status', 1)
      ->get();

      $list_parts = ListPart::where('status', 1)
      ->get();
//////////////////////////////
        $items2 = [// select data show in table
          'data_use_parts.list_repair_id as list_repair_id_chk'
          ,'data_use_parts.list_parts_id as list_parts_id_chk'
          ,'list_parts.name as list_parts_name'
          ,'list_parts.pay_out as pay_out'
        ];
        $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
        ->where('data_use_parts.store_branch_id', $s_store_branch_id)
        ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
        ->get($items2);

      // $repair_id['repair_id']=$request->repair_id;
      $data = [
        'repair_id'=>$request->repair_id,
        'chk'=>1,
        'back'=>$request->back,
      ];

      // echo $setting_status_repair;exit();
      return view('list_repairs/list-repairs', 
      ['list_repairs' => $list_repairs,
      'setting_status_repairs'=>$setting_status_repairs,
      'guarantees'=>$guarantees,
      'list_parts'=>$list_parts,
      'persons'=>$persons,
      'data_use_parts'=>$data_use_parts],$data);
    }

    public function create_data_use_part(Request $request)
    { 
      // echo $request;exit();
      echo $request['list_parts_id'];exit();
        $s_store_branch_id=session('s_store_branch_id','default');
        $list_part = ListPart::find($request->list_parts_id);
        if($list_part['number']<=0){
          // $request->session()->flash('status_part_null', 'อะไหล่ไม่มี');
          $data = [
              'status_part_null_name'=>$list_part['name'],
              'status_part_null_id'=>$request->list_repair_id,
              'repair_id'=>$request->repair_id,
              'chk'=>0,
          ];
          //  echo $data['status_part_null_name'];exit();
        }
        else
        {

        // echo $list_part;exit();
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
        
        $request->session()->flash('list_status_create', 'เพิ่มข้อมูลอะไหล่เรียบร้อยแล้ว'); 
        }
        // echo $repair['repair_id'];exit();
        // return redirect('list-repair/'.$repair['repair_id']);
        $items = [// select data show in table
          'setting_status_repair.*'
          , 'setting_status_repair.name'
          , 'setting_status_repair.status_color'
  
          , 'guarantee.name as guarantee_name'

          ,'persons.id as person_id'//
          ,'persons.name as person_name'//
  
          ,'list_repair.list_name'
          // ,'list_repair.detail'
          ,'list_repair.symptom'
          ,'list_repair.image'
          ,'list_repair.price'
          ,'list_repair.price_before'
          ,'list_repair.status_list_repair'
          ,'list_repair.guarantee_id'
          ,'list_repair.id'
      ];
        $list_repairs = ListRepair::
        leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
        ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
        ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
        ->where('list_repair.status', 1)
        ->where('list_repair.repair_id',$request->repair_id)
        ->get($items);
  
  ////////เอาไว้ select///////////
        $setting_status_repairs = SettingStatusRepair::where('status', 1)
        ->get();
  
        $guarantees = Guarantee::where('status', 1)
        ->get();

        $persons = Persons::where('status', 1)
        ->get();
  
        $list_parts = ListPart::where('status', 1)
        ->get();
  //////////////////////////////
          $items2 = [// select data show in table
            'data_use_parts.list_repair_id as list_repair_id_chk'
            ,'data_use_parts.list_parts_id as list_parts_id_chk'
            ,'list_parts.name as list_parts_name'
            ,'list_parts.pay_out as pay_out'
          ];
          $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
          ->where('data_use_parts.store_branch_id', $s_store_branch_id)
          ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
          ->get($items2);
  
        // echo $setting_status_repair;exit();
        return view('list_repairs/list-repairs', 
        ['list_repairs' => $list_repairs,
        'setting_status_repairs'=>$setting_status_repairs,
        'guarantees'=>$guarantees,
        'list_parts'=>$list_parts,
        'persons'=>$persons,
        'data_use_parts'=>$data_use_parts],$data);
    }
    
    public function delete_data_use_part(Request $request)
    { 

        // echo $list_part;exit();
        $s_store_branch_id=session('s_store_branch_id','default');
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

        $request->session()->flash('list_status_delete', 'ลบข้อมูลอะไหล่เรียบร้อยแล้ว'); 
        
        // echo $repair['repair_id'];exit();
        // return redirect('list-repair/'.$repair['repair_id']);
        $items = [// select data show in table
          'setting_status_repair.*'
          , 'setting_status_repair.name'
          , 'setting_status_repair.status_color'
  
          , 'guarantee.name as guarantee_name'

          ,'persons.id as person_id'//
          ,'persons.name as person_name'//
  
          ,'list_repair.list_name'
          // ,'list_repair.detail'
          ,'list_repair.symptom'
          ,'list_repair.image'
          ,'list_repair.price'
          ,'list_repair.price_before'
          ,'list_repair.status_list_repair'
          ,'list_repair.guarantee_id'
          ,'list_repair.id'
      ];
        $list_repairs = ListRepair::
        leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
        ->leftJoin('guarantee', 'guarantee.id', '=', 'list_repair.guarantee_id')
        ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')//
        ->where('list_repair.status', 1)
        ->where('list_repair.repair_id',$request->repair_id)
        ->get($items);
  
  ////////เอาไว้ select///////////
        $setting_status_repairs = SettingStatusRepair::where('status', 1)
        ->get();
  
        $guarantees = Guarantee::where('status', 1)
        ->get();

        $persons = Persons::where('status', 1)
        ->get();
  
        $list_parts = ListPart::where('status', 1)
        ->get();
  //////////////////////////////
          $items2 = [// select data show in table
            'data_use_parts.list_repair_id as list_repair_id_chk'
            ,'data_use_parts.list_parts_id as list_parts_id_chk'
            ,'list_parts.name as list_parts_name'
            ,'list_parts.pay_out as pay_out'
          ];
          $data_use_parts = DataUsePart::where('data_use_parts.status', 1)
          ->where('data_use_parts.store_branch_id', $s_store_branch_id)
          ->leftJoin('list_parts', 'list_parts.id', '=', 'data_use_parts.list_parts_id')
          ->get($items2);
  
        // $repair_id['repair_id']=$request->repair_id;
        $data = [
          'repair_id'=>$request->repair_id,
          'chk'=>1,
        ];
  
        // echo $setting_status_repair;exit();
        return view('list_repairs/list-repairs', 
        ['list_repairs' => $list_repairs,
        'setting_status_repairs'=>$setting_status_repairs,
        'guarantees'=>$guarantees,
        'list_parts'=>$list_parts,
        'persons'=>$persons,
        'data_use_parts'=>$data_use_parts],$data);
    }
}
