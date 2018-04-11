<?php

namespace App\Http\Controllers;

use App\Repair;
use Illuminate\Http\Request;

class RepairsGeneralController extends Controller
{    
    public function get_repair() {
      $repairs = Repair::where('status', 1)
      ->where('store_branch_id',2)
      ->where('persons_member_id',NULL)
      ->where('persons_id',14)
      ->get();
      $repairs = $this->get_status_name($repairs);

      return view('repairs_general/repairs-general', ['repairs' => $repairs]);
    }
    private function get_status_name($repairs)
    {
      foreach ($repairs as $key => $value) {
        $repairs[$key]['status_name'] = ($value['status'] == 1? 'เปิดใช้งาน' : 'ปิดใช้งาน');
      }

      return $repairs;
    }
    // public function form()
    // {      
    //   return View('persons_member/person-member-form');
    // }
    // public function form_edit($id)
    // {
    //   $person = PersonsMember::find($id);
    //   $data = [
    //     'id' => $person->id,
    //     'username' => $person->username,
    //     'password' => $person->password,
    //     'name' => $person->name,
    //     'person_id' => $person->person_id,
    //     'gender' => $person->gender,
    //     'email' => $person->email,
    //     'birthday' => $person->birthday,
    //     'phone' => $person->phone,
    //     'image_url' => $person->image_url,
    //     'address' => $person->address,
    //   ];
      
    //   return View('persons_member/person-member-form-edit',$data);
    // }
    // public function create(Request $request)
    // { 
    //   // echo $request;exit();
    //     $person = new PersonsMember;
    //     $person->status = true;
    //     $person->username = $request->username;
    //     $person->password = $request->password;
    //     $person->name = $request->name;
    //     $person->person_id = $request->person_id;
    //     $person->gender = $request->gender;
    //     $person->birthday = $request->birthday;
    //     $person->email = $request->email;
    //     $person->phone = $request->phone;
    //     $person->image_url = $request->image_url;
    //     $person->address = $request->address;

    //     $person->save();

    //     return redirect('persons-member');
    // }

    // public function edit(Request $request)
    // {
    //   // echo $request;exit();
    //   $person = PersonsMember::find($request->id);
    //   // $person->store_branch_id = $request->store_branch_id;
    //   $person->status = true;
    //   $person->username = $request->username;
    //   $person->password = $request->password;
    //   $person->name = $request->name;
    //   $person->person_id = $request->person_id;
    //   $person->gender = $request->gender;
    //   $person->birthday = $request->birthday;
    //   $person->email = $request->email;
    //   $person->phone = $request->phone;
    //   $person->image_url = $request->image_url;
    //   $person->address = $request->address;
    //   $person->save();

    //   return redirect('persons-member');
    // }

    // public function delete($id)
    // {
    //   $person = PersonsMember::find($id);
    //   $person->status = 0;
    //   $person->save();

    //   return redirect('persons-member');
    // }


}
