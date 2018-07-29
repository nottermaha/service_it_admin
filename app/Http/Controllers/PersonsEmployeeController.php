<?php

namespace App\Http\Controllers;

use App\AddressDistrict;
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
        ->orderBy('id','desc')
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

      $address = AddressDistrict::where('district.DISTRICT_ID',$person->DISTRICT_ID)
      ->leftJoin('amphur','amphur.AMPHUR_ID','=','district.AMPHUR_ID')
      ->leftJoin('geography','geography.GEO_ID','=','district.GEO_ID')
      ->leftJoin('province','province.PROVINCE_ID','=','district.PROVINCE_ID')
      ->get();

       $items = [
        'store_branch.name as branch_name'
        ];
      $stores = Persons::where('persons.id',$request->id)
      ->leftJoin('store_branch', 'store_branch.id', '=', 'persons.store_branch_id')
      ->first($items);
      if(count($address)>0){
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
                    // 'address' => $person->address,
                    'position' => $person->position,
                    'salary' => $person->salary,
                    'date_in' => $person->date_in,
                    'date_out' => $person->date_out,
                    'store_branch_id'=>$person->store_branch_id,
                    'branch_name'=>$stores['branch_name'],
            
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
                    'name' => $person->name,
                    'person_id' => $person->person_id,
                    'gender' => $person->gender,
                    'email' => $person->email,
                    'birthday' => $person->birthday,
                    'phone' => $person->phone,
                    'image_url' => $person->image_url,
                    // 'address' => $person->address,
                    'position' => $person->position,
                    'salary' => $person->salary,
                    'date_in' => $person->date_in,
                    'date_out' => $person->date_out,
                    'store_branch_id'=>$person->store_branch_id,
                    'branch_name'=>$stores['branch_name'],
            
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
        $person->password = md5($request->password);
        $person->name = $request->name;
        $person->person_id = $request->person_id;
        $chk_person_id =  Persons::where('person_id',$request->person_id)->get();
        if(count($chk_person_id)>0)
        {
          // echo 'hoho';exit();
            $request->session()->flash('status_cre_emp_person_id_fail', ''); 
            $stores_branch = StoreBranch::find($request->store_branch_id);
              $data =[
                'store_branch_id' => $stores_branch->id,
                'store_branch_name' => $stores_branch->name,
              ];
              
              return View('persons_employee/person-employee-form',$data);
        }
        $person->gender = $request->gender;
        $person->birthday = $request->birthday;
        $person->email = $request->email;
        $person->phone = $request->phone;
        // $person->image_url = $request->image_url;
        // $person->address = $request->address;
        $person->position = $request->position;
        $person->salary = $request->salary;
        $person->date_in = $request->date_in;
        $person->date_out = $request->date_out;

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

        if ($request->hasFile('image_url')) {        

          $chk_name =$request->file('image_url')
          ->getClientOriginalName();     
          $value = substr($chk_name,-3);
          if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
            // echo '44';exit();
          }
          else{
            // echo 'tt';exit();
            $request->session()->flash('status_cre_emp_image_fail', ''); 
            // $request->session()->flash('status_id',$request->id); 
            ///////////////////////
             // $stores = Store_branch::where('status', 1)->get();
              $stores_branch = StoreBranch::find($request->store_branch_id);
              $data =[
                'store_branch_id' => $stores_branch->id,
                'store_branch_name' => $stores_branch->name,
              ];
              
              return View('persons_employee/person-employee-form',$data);
                    /////////////////////
          } 

          $filename = str_random(10) . '.' . $request->file('image_url')
          ->getClientOriginalName();             
          $request->file('image_url')->move('image/person-employee/picture/', $filename);           
          Image::make('image/person-employee/picture/' . $filename)
          ->resize(200, 200)->save('image/person-employee/resize/' . $filename);     
          $person->image_url = $filename;         
        } 
        else{
          // echo '5555555555555';exit();                
          // $person->image_url = 'default.png';     
          if($request['image_url']<=1)
            { 
              // echo 'g';exit();  
              $person->image_url = 'default.png';        
            }  
            else{
              // echo 'h';exit();  
              $request->session()->flash('status_cre_emp_image_fail', '');
            ///////////////////////
             // $stores = Store_branch::where('status', 1)->get();
              $stores_branch = StoreBranch::find($request->store_branch_id);
              $data =[
                'store_branch_id' => $stores_branch->id,
                'store_branch_name' => $stores_branch->name,
              ];
              
              return View('persons_employee/person-employee-form',$data);
            /////////////////////   
            }    
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
      $s_id=session('s_id','default');
      $chk_person_confirm = Persons::find($s_id);
        // echo $request;exit();
        $person = Persons::find($request->id);
        // $person->store_branch_id = $request->store_branch_id;
        $person->status = true;
        if($request->newpassword != ''){
          if($request->confirmpassword==$chk_person_confirm->password){
            // echo 'yes';exit();
          $person->username = $request->username;
          $person->password = md5($request->newpassword);
          }
          else{
            $request->session()->flash('status_confirm_password_emp_fail', ''); 
            return redirect()->action(
              'PersonsEmployeeController@form_edit', [$request->id]
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
          $request->session()->flash('status_confirm_password_emp_fail', ''); 
          return redirect()->action(
            'PersonsEmployeeController@form_edit', [$request->id]
        );
        }
      }
        $person->name = $request->name;
        $person->person_id = $request->person_id;
        $person->gender = $request->gender;
        $person->birthday = $request->birthday;
        $person->email = $request->email;
        $person->phone = $request->phone;
        // $person->image_url = $request->image_url;
        // $person->address = $request->address;
        $person->position = $request->position;
        $person->salary = $request->salary;
        $person->date_in = $request->date_in;
        $person->date_out = $request->date_out;

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

        if ($request->hasFile('image_url')) {        
          $filename = str_random(10) . '.' . $request->file('image_url')
          ->getClientOriginalName();             
          $request->file('image_url')->move('image/person-employee/picture/', $filename);           
          Image::make('image/person-employee/picture/' . $filename)
          ->resize(200, 200)->save('image/person-employee/resize/' . $filename);     
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
        $person2=session()->flash('status_delete', 'ปิดการใช้งานพนักงานเรียบร้อยแล้ว');
      }
      elseif($person->status==0){
        $person->status = 1;
        $person2=session()->flash('status_delete', 'ปิดการใช้งานพนักงานเรียบร้อยแล้ว');
      }
      $person->save();
      // $person2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว');

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
