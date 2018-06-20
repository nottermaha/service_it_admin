<?php

namespace App\Http\Controllers;

use App\Repair;
use App\ListRepair;
use App\StoreBranch;
use App\Persons;
use Illuminate\Http\Request;

class RepairsGeneralController extends Controller
{    
  public function print_repair(Request $request) {
    $repairs = Repair::find($request->id);
// echo $repairs;exit();
    $store_branch = StoreBranch::find($request->store_branch_id);
    $data = [
      'id' => $repairs['id'],
      'bin_number' => $repairs['bin_number'],
      'name' => $repairs['name'],
      'phone' => $repairs['phone'],
      'after_price' => $repairs['after_price'],
      'equipment_follow' => $repairs['equipment_follow'],

      'store_name' => $store_branch['name'],
      'store_address' => $store_branch['address'],
      'store_phone' => $store_branch['phone'],
    ];
    $list_repair = ListRepair::where('status',1)
    ->where('repair_id',$request->id)
    ->get();
    // echo $list_repair;exit();
    return view('repairs_print/print',['list_repair'=>$list_repair],$data);
  }

  public function print_bill(Request $request) {
    $repairs = Repair::find($request->id);
// echo $repairs;exit();
    $store_branch = StoreBranch::find($request->store_branch_id);   
    
    $list_repair = ListRepair::where('status',1)
    ->where('repair_id',$request->id)
    ->get();

    $result=0;
    foreach($list_repair as $key=>$value){
      $result=$result+$value['price'];
    }
    $data = [
      'id' => $repairs['id'],
      'bin_number' => $repairs['bin_number'],
      'name' => $repairs['name'],
      'phone' => $repairs['phone'],
      'after_price' => $repairs['after_price'],
      'price' => $repairs['price'],
      'symptom' => $repairs['symptom'],
      'equipment_follow' => $repairs['equipment_follow'],

      'store_name' => $store_branch['name'],
      'store_address' => $store_branch['address'],
      'store_phone' => $store_branch['phone'],

      'count_price' => $result,
    ];

    // echo $result;exit();
    // echo $list_repair;exit();
    return view('repairs_print/print2',['list_repair'=>$list_repair],$data);
  }
  
  public function font_general() {
    $data['check']=0;
    return view('font_pages/repair', $data);
  }
  public function font_general_search(Request $request) {
        
        $items = [
          'repair.id as r_id'
          ,'repair.bin_number as bin_number'
          ,'repair.name as name'
          ,'repair.status_repair as status_repair'
          ,'repair.phone as phone'
          ,'repair.after_price as after_price'
          ,'repair.equipment_follow as equipment_follow'
          ,'repair.date_in_repair as date_in'

          ,'persons.name as persons_name'

          ,'list_repair.list_name as list_repair_name'
          ,'list_repair.status_list_repair as status_list_repair'
      ];

        $repairs = Repair::where('repair.status', 1)
        ->where('repair.bin_number',$request->bin_number)
        ->leftJoin('persons', 'persons.id', '=', 'repair.persons_id')
        ->leftJoin('list_repair', 'list_repair.repair_id', '=', 'repair.id')
        ->get($items);
        // echo $repairs;exit();
        foreach($repairs as $key=>$value){
          $repairs[$key]['date_in_repair_day']=date("d", strtotime($value['date_in']));
          $repairs[$key]['date_in_repair_month']=date("m", strtotime($value['date_in']));
          $repairs[$key]['date_in_repair_year']=date("y", strtotime($value['date_in']));
         
        }
        if(count($repairs)!=0){
          
        $data = [
          'id' => $repairs['0']['id'],
          'bin_number' => $repairs['0']['bin_number'],
          'name' => $repairs['0']['name'],
          'status_repair' => $repairs['0']['status_repair'],
          'phone' => $repairs['0']['phone'],
          'after_price' => $repairs['0']['after_price'],
          'equipment_follow' => $repairs['0']['equipment_follow'],
          'persons_name' => $repairs['0']['persons_name'],
          'date_in_repair' => $repairs['0']['date_in_repair'],

          'check' => 1,
        ];

        // echo $repairs;exit();
        return view('font_pages/repair',['repairs'=>$repairs], $data);
      }
      else{
        if($request['chk_num_bill']==1){
          $data['check']=2;
        }
        else{
         $data['check']=0;
        }
        return view('font_pages/repair', $data);
      }
 
  }
    public function get_repair() {
      $store_branch_id=session('s_store_branch_id','default');
      $repairs = Repair::where('status', 1)
      ->where('store_branch_id',$store_branch_id)
      ->where('persons_member_id',NULL)
      // ->where('persons_id',14)
      ->get();
      $repairs = $this->get_status_name($repairs);
      $person = Persons::where('status', 1)
      ->get();


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
      $current_day=(date('d'));
      $current_month=(date('m'));
      $current_year=(date('y'));
      $repairs = Repair::
      orderBy('id','desc')
      ->limit(1)
      ->get();
      // echo $repairs['0']['id']+1;exit();
      $repair_last_id =$repairs['0']['id']+1;
      // echo "B2".$current_day."".$current_month."".$current_year."".$repair_last_id;exit();

        $store_branch_id=session('s_store_branch_id','default');
        $s_id=session('s_id','default');
        $repair = new Repair;
        $repair->store_branch_id = $store_branch_id;
        $repair->persons_id =  $s_id;
        $repair->bin_number =  "B2".$current_day."".$current_month."".$current_year."".$repair_last_id;
        $repair->name =  $request->name;
        $repair->status_repair =  1;
        $repair->phone =  $request->phone;
        $repair->date_in_repair =  $request->date_in_repair;
        $repair->price =  $request->price;
        $repair->status = true;
        $repair->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

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
        $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('repair-general');
    }
    public function status_repair(Request $request)
    {
      // echo $request['status_repair'];exit();
      $repair = Repair::find($request->id);
      if($request->status_repair>=1){
        $repair->status_repair = $request->status_repair;
      }
      else{
        $repair->status_repair = $repair['status_repair'];
      }
      $repair->save();

       return redirect('repair-general');
    }
    public function delete($id)
    {
      $store = Repair::find($id);
      $store->status = 0;
      $store->save();
      $person2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว');

       return redirect('repair-general');
    }
}
