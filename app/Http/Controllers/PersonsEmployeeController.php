<?php

namespace App\Http\Controllers;

use App\Persons;
use App\StoreBranch;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class PersonsEmployeeController extends Controller
{    
    public function get_persons() {
      $s_type=session('s_type','default');
      if($s_type==1 ){
        $store_branch = StoreBranch::where('status', 1)->get();
        $check['check']=0;

        return view('persons_employee/persons-employee',  ['store_branch' => $store_branch],$check);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }


    }

    public function get_persons2(Request $request) {
      $store_branch = StoreBranch::where('status', 1)->get();
        if($request['store_branch_id']>=1){
        $persons = Persons::where('type',3)
        ->where('store_branch_id',$request->store_branch_id)
        ->get();
        // $persons = $this->get_status_name($persons);
        $store_branch_select = StoreBranch::find($request->store_branch_id);
        $data = [
          'check' => 1,
          'store_branch_name' => $store_branch_select->name,
          'store_branch_id' => $store_branch_select->id,
      ];

      return view('persons_employee/persons-employee', ['persons' => $persons,'store_branch' => $store_branch], $data);
      }
    }

    private function get_status_name($persons)
    {
      foreach ($persons as $key => $value) {
        $persons[$key]['status_name'] = ($value['status'] == 1? 'เปิดใช้งาน' : 'ปิดใช้งาน');
      }

      return $persons;
    }
    public function form(Request $request)
    {
      // $stores = Store_branch::where('status', 1)->get();
      $stores_branch = StoreBranch::find($request->store_branch_id);
      $data =[
        'store_branch_id' => $stores_branch->id,
        'store_branch_name' => $stores_branch->name,
      ];
      
      return View('persons_employee/person-employee-form',$data);
    }
    public function form_edit(Request $request)
    {
      $person = Persons::find($request->id);
       $items = [
        'store_branch.name as branch_name'
        ];
      $stores = Persons::where('persons.id',$request->id)
      ->leftJoin('store_branch', 'store_branch.id', '=', 'persons.store_branch_id')
      ->first($items);

      $data = [
        'id' => $person->id,
        'username' => $person->username,
        'password' => $person->password,
        'name' => $person->name,
        'person_id' => $person->person_id,
        'gender' => $person->gender,
        'email' => $person->email,
        'birthday' => $person->birthday,
        'phone' => $person->phone,
        'image_url' => $person->image_url,
        'address' => $person->address,
        'position' => $person->position,
        'salary' => $person->salary,
        'date_in' => $person->date_in,
        'date_out' => $person->date_out,
        'store_branch_id'=>$person->store_branch_id,
        'branch_name'=>$stores['branch_name'],
      ];
       
      return View('persons_employee/person-employee-form-edit',$data);
    }
    public function create(Request $request)
    { 
      if($request->check==1){
      // echo $request;exit();
        $person = new Persons;
        $person->store_branch_id = $request->store_branch_id;
        $person->type = 3;
        $person->status = true;
        $person->username = $request->username;
        $person->password = $request->password;
        $person->name = $request->name;
        $person->person_id = $request->person_id;
        $person->gender = $request->gender;
        $person->birthday = $request->birthday;
        $person->email = $request->email;
        $person->phone = $request->phone;
        // $person->image_url = $request->image_url;
        $person->address = $request->address;
        $person->position = $request->position;
        $person->salary = $request->salary;
        $person->date_in = $request->date_in;
        $person->date_out = $request->date_out;
        if ($request->hasFile('image_url')) {        
          $filename = str_random(10) . '.' . $request->file('image_url')
          ->getClientOriginalName();             
          $request->file('image_url')->move(public_path() . '/image/person-employee/picture/', $filename);           
          Image::make(public_path() . '/image/person-employee/picture/' . $filename)
          ->resize(200, 200)->save(public_path() . '/image/person-employee/resize/' . $filename);     
          $person->image_url = $filename;         
        } 
        else{
          // echo '5555555555555';exit();                
          $person->image_url = 'default.png';        
         }
        $person->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        $store_branch = StoreBranch::where('status', 1)->get();
        // echo $request['store_branch_id'];exit();
        $persons = Persons::where('type',3)
        ->where('store_branch_id',$request->store_branch_id)
        ->get();
        // $persons = $this->get_status_name($persons);
        $store_branch_select = StoreBranch::find($request->store_branch_id);
        $data = [
          'check' => 1,
          'store_branch_name' => $store_branch_select->name,
          'store_branch_id' => $store_branch_select->id,
      ];

      return view('persons_employee/persons-employee', ['persons' => $persons,'store_branch' => $store_branch], $data);
    }
        // return redirect('persons-employee');
    }

    public function edit(Request $request)
    {
        // echo $request;exit();
        $person = Persons::find($request->id);
        // $person->store_branch_id = $request->store_branch_id;
        $person->status = true;
        $person->username = $request->username;
        $person->password = $request->password;
        $person->name = $request->name;
        $person->person_id = $request->person_id;
        $person->gender = $request->gender;
        $person->birthday = $request->birthday;
        $person->email = $request->email;
        $person->phone = $request->phone;
        // $person->image_url = $request->image_url;
        $person->address = $request->address;
        $person->position = $request->position;
        $person->salary = $request->salary;
        $person->date_in = $request->date_in;
        $person->date_out = $request->date_out;
        if ($request->hasFile('image_url')) {        
          $filename = str_random(10) . '.' . $request->file('image_url')
          ->getClientOriginalName();             
          $request->file('image_url')->move(public_path() . '/image/person-employee/picture/', $filename);           
          Image::make(public_path() . '/image/person-employee/picture/' . $filename)
          ->resize(200, 200)->save(public_path() . '/image/person-employee/resize/' . $filename);     
          $person->image_url = $filename;         
        } 
        else{
          // echo '5555555555555';exit();                
          $person->image_url = $person['image_url'];        
          }
        $person->save();
        $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
  
        // return redirect('persons-manager');
        $store_branch = StoreBranch::where('status', 1)->get();
  
        // echo $request['store_branch_id'];exit();
        $persons = Persons::where('type',3)
        ->where('store_branch_id',$request->store_branch_id)
        ->get();
        // $persons = $this->get_status_name($persons);
  
        $store_branch_select = StoreBranch::find($request->store_branch_id);
        $data = [
          'check' => 1,
          'store_branch_name' => $store_branch_select->name,
          'store_branch_id' => $store_branch_select->id,
      ];
  
      return view('persons_employee/persons-employee', ['persons' => $persons,'store_branch' => $store_branch], $data);
    }

    public function delete(Request $request)
    {
      $person = Persons::find($request->id);
      if($person->status==1){
        $person->status = 0;
      }
      elseif($person->status==0){
        $person->status = 1;
      }
      $person->save();
      $person2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว');

        // return redirect('persons-manager');
        $store_branch = StoreBranch::where('status', 1)->get();
        // echo $request['store_branch_id'];exit();
        $persons = Persons::where('type',3)
        ->where('store_branch_id',$request->store_branch_id)
        ->get();
        // $persons = $this->get_status_name($persons);
        $store_branch_select = StoreBranch::find($request->store_branch_id);
        $data = [
          'check' => 1,
          'store_branch_name' => $store_branch_select->name,
          'store_branch_id' => $store_branch_select->id,
      ];
  
      return view('persons_employee/persons-employee', ['persons' => $persons,'store_branch' => $store_branch], $data);
    }


}
