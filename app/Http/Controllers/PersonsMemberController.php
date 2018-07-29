<?php

namespace App\Http\Controllers;

use App\PersonsMember;
use App\AddressDistrict;
use App\Persons;

use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class PersonsMemberController extends Controller
{    
    public function get_persons() {
      $s_type=session('s_type','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
        $persons = PersonsMember::orderBy('id','desc')->get();
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
      // echo $person;exit();
      $address = AddressDistrict::where('district.DISTRICT_ID',$person->DISTRICT_ID)
      ->leftJoin('amphur','amphur.AMPHUR_ID','=','district.AMPHUR_ID')
      ->leftJoin('geography','geography.GEO_ID','=','district.GEO_ID')
      ->leftJoin('province','province.PROVINCE_ID','=','district.PROVINCE_ID')
      ->get();
      // echo $address;exit();
      if(count($address)>0){
        // echo 'hh';exit();
          $data = [
                  'id' => $person->id,
                  'username' => $person->username,
                  'password' => $person->password,
                  'prefix' => $person->prefix,
                  'name' => $person->name,
                  'person_id' => $person->person_id,
                  'gender' => $person->gender,
                  'email' => $person->email,
                  'birthday' => $person->birthday,
                  'phone' => $person->phone,
                  'image_url' => $person->image_url,
                  // 'address' => $person->address,

                  'home_number' => $person->home_number,
                  'group_number' => $person->group_number,
                  'home_name' => $person->home_name,
                  'alley' => $person->alley,
                  'soy' => $person->soy,
                  'road' => $person->road,

                  'address' =>
                      $person->home_number.' '.
                      ' หมู่ที่:'.$person->group_number.' '.
                      ' หมู่บ้าน:'.$person->home_name.' '.
                      ' ตรอก:'.$person->alley.' '.
                      ' ซอย:'.$person->soy.' '.
                      ' ถนน:'.$person->road.' '.
                      ' ตำบล:'.$address['0']['DISTRICT_NAME'].' '.
                        'อำเภอ:'.$address['0']['AMPHUR_NAME'].' '.
                      ' จังหวัด:'.$address['0']['PROVINCE_NAME'].' '.
                      ' รหัสไปรษณีย์:'.$address['0']['POSTCODE'].' '.
                      ' '.$address['0']['GEO_NAME']
                  ,
                ];
      }
      else{
                    $data = [
                      'id' => $person->id,
                      'username' => $person->username,
                      'password' => $person->password,
                      'prefix' => $person->prefix,
                      'name' => $person->name,
                      'person_id' => $person->person_id,
                      'gender' => $person->gender,
                      'email' => $person->email,
                      'birthday' => $person->birthday,
                      'phone' => $person->phone,
                      'image_url' => $person->image_url,
                      // 'address' => $person->address,

                      'home_number' => $person->home_number,
                      'group_number' => $person->group_number,
                      'home_name' => $person->home_name,
                      'alley' => $person->alley,
                      'soy' => $person->soy,
                      'road' => $person->road,

                      'address' =>
                          $person->home_number.' '.
                          ' หมู่ที่:'.$person->group_number.' '.
                          ' หมู่บ้าน:'.$person->home_name.' '.
                          ' ตรอก:'.$person->alley.' '.
                          ' ซอย:'.$person->soy.' '.
                          ' ถนน:'.$person->road
                      ,
                    ];

      }
      // echo $person_district;exit();
     
      return View('persons_member/person-member-form-edit',$data);
    }
    public function create(Request $request)
    { 
     
      // echo $request;exit();
        $person = new PersonsMember;
        $person->status = true;
        $person->type = 4;
        $person->username = $request->username;
        $person->password = md5($request->password);
        $person->name = $request->name;
        $person->person_id = $request->person_id;
        $chk_person_id =  PersonsMember::where('person_id',$request->person_id)->get();
        if(count($chk_person_id)>0)
        {
          // echo 'hoho';exit();
            $request->session()->flash('status_cre_mem_person_id_fail', ''); 
            return redirect('person-member-form');
        }
        // echo 'jojo';exit();
        $person->gender = $request->gender;
        $person->birthday = $request->birthday;
        $person->email = $request->email;
        $person->phone = $request->phone;
        // $person->image_url = $request->image_url;

        if($request->PROVINCE_ID!='PROVINCE_NAME'){
          // echo $request->PROVINCE_ID;exit();
        $person->PROVINCE_ID = $request->PROVINCE_ID;
        $person->AMPHUR_ID = $request->AMPHUR_ID;
        $person->DISTRICT_ID = $request->DISTRICT_ID;
        }
        $person->home_number = $request->home_number;
        $person->group_number = $request->group_number;
        $person->home_name = $request->home_name;
        $person->alley = $request->alley;
        $person->soy = $request->soy;
        $person->road = $request->road;

        // $person->address = $request->address;
        if ($request->hasFile('image_url')) {   
          
          $chk_name =$request->file('image_url')
          ->getClientOriginalName();     
          $value = substr($chk_name,-3);
          if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
            // echo '44';exit();
          }
          else{
            // echo 'tt';exit();
            $request->session()->flash('status_cre_mem_image_fail', ''); 
            // $request->session()->flash('status_id',$request->id); 
            return redirect('person-member-form');
          } 

          $filename = str_random(10) . '.' . $request->file('image_url')
          ->getClientOriginalName();             
          $request->file('image_url')->move('image/person-member/picture/', $filename);           
          Image::make('image/person-member/picture/' . $filename)
          ->resize(200, 200)->save('image/person-member/resize/' . $filename);     
          $person->image_url = $filename;        
      
        } 
        else{
        //  echo '5555555555555';exit();                
            if($request['image_url']<=1)
            { 
              // echo 'g';exit();  
              $person->image_url = 'default.png';        
            }  
            else{
              // echo 'h';exit();  
              $request->session()->flash('status_cre_mem_image_fail', '');
              return redirect('person-member-form');    
            }    
         }
          $person->save();
          $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 
          return redirect('persons-member');  
    }

    public function edit(Request $request)
    {
      // echo $request['province'].'  อำ  '.$request['amphur'].'  ตำ  '.$request['district'].'  ร  '.$request['postcode'];exit();
      $s_id=session('s_id','default');
      $chk_person_confirm = Persons::find($s_id);

      $person = PersonsMember::find($request->id);
      // $person->store_branch_id = $request->store_branch_id;
      $person->status = true;
      if($request->newpassword != ''){
        if($request->confirmpassword==$chk_person_confirm->password){
          // echo 'yes';exit();
        $person->username = $request->username;
        $person->password = md5($request->newpassword);
        }
        else{
          $request->session()->flash('status_confirm_password_mem_fail', ''); 
          return redirect()->action(
            'PersonsMemberController@form_edit', [$request->id]
        );
        }
    }
    elseif($request->username!=$person->username ){
      if($request->confirmpassword==$chk_person_confirm->password){
        // echo 'yes';exit();
      $person->username = $request->username;
      $person->password = md5($person->password);
      }
      else{
        $request->session()->flash('status_confirm_password_mem_fail', ''); 
        return redirect()->action(
          'PersonsMemberController@form_edit', [$request->id]
      );
      }
    }
      $person->name = $request->name;
      $person->person_id = $request->person_id;
      $person->gender = $request->gender;
      $person->birthday = $request->birthday;
      $person->email = $request->email;
      $person->phone = $request->phone;

      if($request->PROVINCE_ID!='PROVINCE_NAME'){
        // echo $request->PROVINCE_ID;exit();
      $person->PROVINCE_ID = $request->PROVINCE_ID;
      $person->AMPHUR_ID = $request->AMPHUR_ID;
      $person->DISTRICT_ID = $request->DISTRICT_ID;
      }
      else{
        // echo 'ggg';exit();
        $person->PROVINCE_ID = $person['PROVINCE_ID'];
        $person->AMPHUR_ID = $person['AMPHUR_ID'];
        $person->DISTRICT_ID = $person['DISTRICT_ID'];
      }
      $person->home_number = $request->home_number;
      $person->group_number = $request->group_number;
      $person->home_name = $request->home_name;
      $person->alley = $request->alley;
      $person->soy = $request->soy;
      $person->road = $request->road;

      // $person->image_url = $request->image_url;
      $person->address = $request->address;
      if ($request->hasFile('image_url')) {        
        $filename = str_random(10) . '.' . $request->file('image_url')
        ->getClientOriginalName();             
        $request->file('image_url')->move('image/person-member/picture/', $filename);           
        Image::make('image/person-member/picture/' . $filename)
        ->resize(200, 200)->save('image/person-member/resize/' . $filename);     
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
