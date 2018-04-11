<?php

namespace App\Http\Controllers;

use App\Persons;
use App\Store_branch;
use Illuminate\Http\Request;

class PersonsEmployeeController extends Controller
{    
    public function get_persons() {
      $persons = Persons::where('status', 1)
      ->where('type',3)
      ->where('store_branch_id',2)
      ->get();     
       $data = [
        'name1' => "notter1", 
        'name2' => "notter2",
        'name3' => "notter3",
        'num1' => 10,
        'num2' => 20,
        'num3' => 25,       
      ];
      $persons = $this->get_status_name($persons);

      // print_r($go);exit();

      return view('persons_employee/persons-employee', ['persons' => $persons],$data);
    }
    private function get_status_name($persons)
    {
      foreach ($persons as $key => $value) {
        $persons[$key]['status_name'] = ($value['status'] == 1? 'เปิดใช้งาน' : 'ปิดใช้งาน');
      }

      return $persons;
    }
    public function form()
    {
      $stores = Store_branch::where('status', 1)->get();
      
      return View('persons_employee/person-employee-form',['stores'=>$stores]);
    }
    public function form_edit($id)
    {
      $person = Persons::find($id);
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
      ];
      
      return View('persons_employee/person-employee-form-edit',$data);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $person = new Persons;
        $person->store_branch_id = 2;
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
        $person->image_url = $request->image_url;
        $person->address = $request->address;
        $person->position = $request->position;
        $person->salary = $request->salary;
        $person->date_in = $request->date_in;
        $person->date_out = $request->date_out;
        $person->save();

        return redirect('persons-employee');
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
      $person->image_url = $request->image_url;
      $person->address = $request->address;
      $person->position = $request->position;
      $person->salary = $request->salary;
      $person->date_in = $request->date_in;
      $person->date_out = $request->date_out;
      $person->save();

      return redirect('persons-employee');
    }

    public function delete($id)
    {
      $person = Persons::find($id);
      $person->status = 0;
      $person->save();

      return redirect('persons-employee');
    }


}
