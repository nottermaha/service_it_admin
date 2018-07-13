<?php

namespace App\Http\Controllers;

use App\PersonsMember;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class PersonsMemberController extends Controller
{    
    public function get_persons() {
      $s_type=session('s_type','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
        $persons = PersonsMember::get();
        $persons = $this->get_status_name($persons);

        return view('persons_member/persons-member', ['persons' => $persons]);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }
      
    }
    public function report_person_member() {
      $persons = PersonsMember::where('status', 1)
      ->get();
      $persons = $this->get_status_name($persons);

      return view('report/re-person-member-excel', ['persons' => $persons]);
    }
    private function get_status_name($persons)
    {
      foreach ($persons as $key => $value) {
        $persons[$key]['status_name'] = ($value['status'] == 1? 'เปิดใช้งาน':'ปิดใช้งาน');
      }

      return $persons;
    }
    public function form()
    {      
      return View('persons_member/person-member-form');
    }
    public function form_edit(Request $request)
    {
      $person = PersonsMember::find($request->id);
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
      ];
      
      return View('persons_member/person-member-form-edit',$data);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $person = new PersonsMember;
        $person->status = true;
        $person->type = 4;
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
        if ($request->hasFile('image_url')) {        
          $filename = str_random(10) . '.' . $request->file('image_url')
          ->getClientOriginalName();             
          $request->file('image_url')->move(public_path() . '/image/person-member/picture/', $filename);           
          Image::make(public_path() . '/image/person-member/picture/' . $filename)
          ->resize(200, 200)->save(public_path() . '/image/person-member/resize/' . $filename);     
          $person->image_url = $filename;         
        } 
        else{
          // echo '5555555555555';exit();                
          $person->image_url = 'default.png';        
         }
        $person->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

        return redirect('persons-member');
    }

    public function edit(Request $request)
    {
      // echo $request;exit();
      $person = PersonsMember::find($request->id);
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
      if ($request->hasFile('image_url')) {        
        $filename = str_random(10) . '.' . $request->file('image_url')
        ->getClientOriginalName();             
        $request->file('image_url')->move(public_path() . '/image/person-member/picture/', $filename);           
        Image::make(public_path() . '/image/person-member/picture/' . $filename)
        ->resize(200, 200)->save(public_path() . '/image/person-member/resize/' . $filename);     
        $person->image_url = $filename;         
      } 
      else{
        // echo '5555555555555';exit();                
        $person->image_url = $person['image_url'];        
        }
      $person->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('persons-member');
    }

    public function delete($id)
    {
      $person = PersonsMember::find($id);
      if($person->status==1){
        $person->status = 0;
        $person2=session()->flash('status_delete', 'ปิดการใช้งานสมาชิกเรียบร้อยแล้ว');
      }
      elseif($person->status==0){
        $person->status = 1;
        $person2=session()->flash('status_delete', 'เปิดการใช้งานสมาชิกเรียบร้อยแล้ว');
      }
      $person->save();

      return redirect('persons-member');
    }


}
