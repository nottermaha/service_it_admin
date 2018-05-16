<?php

namespace App\Http\Controllers;

use App\Persons;
use App\Store_branch;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class PersonsManagerController extends Controller
{    
    public function get_persons() {
      $persons = Persons::where('status', 1)
      ->where('type',2)
      ->get();
      $persons = $this->get_status_name($persons);
      // echo $persons;exit();

      return view('persons_manager/persons-manager', ['persons' => $persons]);
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
      
      return View('persons_manager/person-manager-form',['stores'=>$stores]);
    }
    public function form_edit($id)
    {
      $person = Persons::find($id);
       $items = [
        'store_branch.name as branch_name'
        ];
      $stores = Persons::where('persons.id',$id)
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
        'branch_name'=>$stores['branch_name'],
      ];
     
      return View('persons_manager/person-manager-form-edit',$data);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $person = new Persons;
        $person->store_branch_id = $request->store_branch_id;
        $person->type = 2;
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
          $request->file('image_url')->move(public_path() . '/image/person-manager/picture/', $filename);           
          Image::make(public_path() . '/image/person-manager/picture/' . $filename)
          ->resize(200, 200)->save(public_path() . '/image/person-manager/resize/' . $filename);     
          $person->image_url = $filename;         
        } 
        else{
          // echo '5555555555555';exit();                
          $person->image_url = 'default.jpg';        
         }
        $person->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        return redirect('persons-manager');
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
        $request->file('image_url')->move(public_path() . '/image/person-manager/picture/', $filename);           
        Image::make(public_path() . '/image/person-manager/picture/' . $filename)
        ->resize(200, 200)->save(public_path() . '/image/person-manager/resize/' . $filename);     
        $person->image_url = $filename;         
      } 
      else{
        // echo '5555555555555';exit();                
        $person->image_url = $person['image_url'];        
       }
      $person->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('persons-manager');
    }

    public function delete($id)
    {
      $person = Persons::find($id);
      $person->status = 0;
      $person->save();
      $person2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว');

      return redirect('persons-manager');
    }


}
