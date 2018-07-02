<?php

namespace App\Http\Controllers;


use App\Persons;
use App\Repair;
use App\ListRepair;
use App\PersonsMember;
use App\Http\Controllers\UploadController;

use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class AuthenController extends Controller
{    

      public function login(Request $request) {
        // echo $id;exit();
        $result = Persons::where('status',1)
        ->where('username',$request->username)
        ->where('password',$request->password)
        ->get();

        // echo $result['0']['name'];exit();
        if($result!='[]'){
          ////////login admin manager employee/////////
          // echo 'rrr';exit();
          session(['s_name'=>$result['0']['name']]);
          session(['s_id'=>$result['0']['id'] ]); 
          session(['s_type'=>$result['0']['type'] ]); 
          session(['s_store_branch_id'=>$result['0']['store_branch_id'] ]); 
          // session(['key2'=>$result['0']['store_branch_id'] ]); 
          // if (session()->has('key2')) { 
          //   $data=session('key2','default'); 
          // } 
          $request->session()->flash('status_login_ok', 'การเข้าสู่ระบบเสร็จสิ้น'); 
          return redirect('dashboard');
        }
        ///////login member////////
        else if($result=='[]'){
          $result2 = PersonsMember::where('status',1)
          ->where('username',$request->username)
          ->where('password',$request->password)
          ->get();
              if($result2!='[]'){
                session(['s_name'=>$result2['0']['name']]);
                session(['s_id'=>$result2['0']['id'] ]); 
                session(['s_type'=>$result2['0']['type'] ]);
                $request->session()->flash('status_login_ok', 'การเข้าสู่ระบบเสร็จสิ้น'); 
              return redirect('/');
              }
              else{
                ///////ligin fail///////
                $request->session()->flash('status_login_fail', 'fail');
                return redirect('/');
              }
        }
       
        // return view('gallery/gallery', ['gallerys' => $gallerys]);
      }

      public function create_register(Request $request){
        // echo $request['name'];
        // echo $request['birthday'];
        // exit();
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
        $request->session()->flash('status_create', 'คุณได้สมัครสมาชิกเรียบร้อย');
        
        return redirect('/font-register');

      }
      public function font_profile(){
        $id=session('s_id','default');
        $person_member = PersonsMember::find($id);
        // echo $person_member;exit();
        $date = new CallUseController();
        $person_member = $date->get_date_only($person_member,'birth_day','birthday');//get วันที่ภาษาไทย แถวเดียว
        $person_member = $date->get_date_only($person_member,'date_created','created_at');//get วันที่ภาษาไทย แถวเดียว
        // echo $person_member;exit();
        $item = [
              'persons.name as persons_name'
              ,'persons.phone as persons_phone'

              ,'persons_member.name as persons_member_name'
              ,'persons_member.phone as persons_member_phone'

              ,'store_branch.name as store_branch_name'

              ,'repair.id as r_id'
              ,'repair.persons_member_id as persons_member_id' //check
              ,'repair.bin_number as bin_number'
              ,'repair.name as name_general'
              ,'repair.phone as phone_general'
              ,'repair.status_repair as status_repair'
              ,'repair.price as price'
              ,'repair.date_in_repair as date_in_repair'
              ,'repair.date_out_repair as date_out_repair'
              ,'repair.after_price as after_price'
              ,'repair.equipment_follow as equipment_follow'
        ];
        $repairs = Repair::where('repair.status',1)
        ->where('repair.persons_member_id',$id)
        ->orderBy('repair.id','desc')
        ->leftJoin('persons_member', 'persons_member.id', '=', 'repair.persons_member_id')
        ->leftJoin('persons', 'persons.id', '=', 'repair.persons_id')
        ->leftJoin('store_branch', 'store_branch.id', '=', 'repair.store_branch_id')
        ->get($item);

        $date = new CallUseController();
        $repairs = $date->get_date_all($repairs,'date_in','date_in_repair');
        $repairs = $date->get_date_all($repairs,'date_out','date_out_repair');
        // echo $repairs;exit();
        if($repairs!='[]'){
              // foreach($repairs as $key=>$value)
              // {
                $items = [
                  'list_repair.repair_id as repair_id_form_list'
                  ,'list_repair.id as id'
                  ,'list_repair.status_list_repair as status_list_repair'
                  ,'list_repair.status_list_repair as status_list_repair'
                  ,'list_repair.list_name as list_name'
                  ,'list_repair.detail as detail'
                  ,'list_repair.symptom as symptom'
                  ,'list_repair.price as price'

                  ,'setting_status_repair.id as s_id'
                  ,'setting_status_repair.name as status_name'
                  ,'setting_status_repair.status_color'
          
                  // ,'list_repair.id as l_id'
                  // ,'list_repair.price as price'
          
                  ,'persons.name as person_name'
                  ];
              $list_repairs = ListRepair::where('list_repair.status', 1)
              ->leftJoin('persons', 'persons.id', '=', 'list_repair.person_id')
              ->leftJoin('setting_status_repair', 'setting_status_repair.id', '=', 'list_repair.status_list_repair')
              ->get($items); 
              
              $data = [
                'id' => $person_member['id'],
                'type' => $person_member['type'],
                'username' => $person_member['username'],
                'password' => $person_member['password'],
                'name' => $person_member['name'],
                'person_id' => $person_member['person_id'],
                'gender' => $person_member['gender'],
                'email' => $person_member['email'],
                // 'birthday' => $person_member['birthday'],
                'phone' => $person_member['phone'],
                'image_url' => $person_member['image_url'],
                'address' => $person_member['address'],
                'profile_id' => $person_member['id'],
                'created_at' => $person_member['created_at'],
                'birthday' => $person_member['birth_day'],
                'date_created' => $person_member['date_created'],

            ];
              // } 
          // echo $list_repairs;exit();
          return view('font_pages/profile',['repairs'=>$repairs,'list_repairs'=>$list_repairs], $data);
        }

        else{
          return view('font_pages/profile',['repairs'=>$repairs], $data);
        }

        // echo $repairs;exit();
        // return view('font_pages/profile',$data);
      }
      public function font_profile_edit(Request $request){
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
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลโปรไฟล์เรียบร้อยแล้ว'); 

      return redirect('font-profile');

      }

      public function profile(){
        $id=session('s_id','default');
        $person = Persons::find($id);
        $profile = $this->get_profile($person['id']);

        $date = new CallUseController();
        $profile = $date->get_date_only($profile,'created','created_at');//get วันที่ภาษาไทย แถวเดียว
        // $date = new CallUseController();
        $profile = $date->get_date_only($profile,'birth','birthday');//get วันที่ภาษาไทย แถวเดียว
        // echo $profile;exit();
        $data = [
          'store_branch_name' => $profile['0']['store_branch_name'],
            'type' => $profile['0']['type'],
            'username' => $profile['0']['username'],
            'password' => $profile['0']['password'],
            'name' => $profile['0']['name'],
            'person_id' => $profile['0']['person_id'],
            'gender' => $profile['0']['gender'],
            'email' => $profile['0']['email'],
            'birthday' => $profile['0']['birthday'],
            'phone' => $profile['0']['phone'],
            'image_url' => $profile['0']['image_url'],
            'address' => $profile['0']['address'],
            'profile_id' => $profile['0']['profile_id'],
            // 'created_at' => $profile['0']['created'],  
            'create_date' => $profile['created'],
            'birth_date' => $profile['birth'], 
        ];
        $items = [
          'persons_member.name as name_member'
          ,'persons_member.phone as phone_member'
          ,'persons_member.type as type_member'
          
          ,'repair.id as r_id'
          ,'repair.persons_member_id as persons_member_id' //check
          ,'repair.bin_number as bin_number'
          ,'repair.name as name_general'
          ,'repair.phone as phone_general'
          ,'repair.status_repair as status_repair'
          ,'repair.price as price'
          ,'repair.date_in_repair as date_in_repair'
          ,'repair.date_out_repair as date_out_repair'
          ,'repair.after_price as after_price'
          ,'repair.equipment_follow as equipment_follow'

          // ,'list_repair.status_list_repair as status_list_repair'
          // ,'list_repair.list_name as list_name'
          // ,'list_repair.detail as detail'
          // ,'list_repair.symptom as symptom'
          ];
        $repairs = Repair::where('repair.status', 1)
        ->where('repair.persons_id',$id)
        ->orderBy('repair.id','desc')
        // ->leftJoin('list_repair', 'list_repair.repair_id', '=', 'repair.id')
        ->leftJoin('persons_member', 'persons_member.id', '=', 'repair.persons_member_id')
        ->get($items);
        $date_in = new CallUseController();
        $repairs = $date->get_date_all($repairs,'date_in','date_in_repair'); 
        //////////////////get วันที่ภาษาไทย ลูป date_in_repair  pattern = ข้อมูลทั้งหมด ชื่อที่ใช้ตอน $key และ ฟิวใน db ////////////////////////////
        $date_out = new CallUseController();
        $repairs = $date->get_date_all($repairs,'date_out','date_out_repair'); //get วันที่ภาษาไทย ลูป date_out_repair
            // echo $repairs;exit();
        foreach($repairs as $key=>$value)
        {
              if($repairs[$key]['persons_member_id']!=NULL)
              {
                $repairs[$key]['is_name']=$value['name_member'];
                $repairs[$key]['is_phone']=$value['phone_member'];
              }
              else if($repairs[$key]['persons_member_id']==NULL)
              {
                $repairs[$key]['is_name']=$value['name_general'];
                $repairs[$key]['is_phone']=$value['phone_general'];
              }
              if($repairs[$key]['type_member']!=NULL)
              {
                $repairs[$key]['is_type']=$value['type_member'];
              }
              else if($repairs[$key]['type_member']==NULL)
              {
                $repairs[$key]['is_type']='';
              }
              // $date_in = new CallUseController();
              // $n = $date->get_date_only($value['date_in_repair'],'date_in_repair'); //get วันที่ภาษาไทย ลูป date_in_repair
              // $date_out = new CallUseController();
              // $m = $date->get_date_only($value['date_out_repair'],'date_out_repair'); //get วันที่ภาษาไทย ลูป date_in_repair
              // $repairs[$key]['date_in_repair']=$n;
              // $repairs[$key]['date_out_repair']=$m;
        }
        if($repairs!='[]'){
              foreach($repairs as $key=>$value)
              {
                $items = [
                  'list_repair.repair_id as repair_id_form_list'
                  ,'list_repair.id as id'
                  ,'list_repair.status_list_repair as status_list_repair'
                  ,'list_repair.status_list_repair as status_list_repair'
                  ,'list_repair.list_name as list_name'
                  ,'list_repair.detail as detail'
                  ,'list_repair.symptom as symptom'
                  ];
              $list_repairs = ListRepair::where('list_repair.status', 1)
              ->leftJoin('repair', 'repair.id', '=', 'list_repair.repair_id')
              // ->where('repair_id',24)
              ->get($items);   
              }
              return view('profile/profile',['repairs'=>$repairs,'list_repairs'=>$list_repairs], $data);
            }
            else{
              return view('profile/profile',['repairs'=>$repairs], $data);
            }
       
      }

      public function get_profile($person_id){
        $items = [
          'persons.id as profile_id'
          ,'store_branch.name as store_branch_name'
          ,'persons.type as type'
          ,'persons.username as username'
          ,'persons.password as password'
          ,'persons.name as name'
          ,'persons.person_id as person_id'
          ,'persons.gender as gender'
          ,'persons.phone as phone'
          ,'persons.email as email'
          ,'persons.birthday as birthday'
          ,'persons.image_url as image_url'
          ,'persons.address as address'
          ,'persons.created_at as created_at'
          ];
        $data_profile = Persons::where('persons.id',$person_id)
        ->leftJoin('store_branch', 'store_branch.id', '=', 'persons.store_branch_id')
        ->get($items);

        // echo $answer_posts;exit();
        // $data = [
        //     'name' => $answer_posts['0']['name'],
        // ];
        // echo $data['name'];exit();

        return $data_profile;
        
      }

      public function edit_profile(Request $request)
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
          $type=session('s_type','default');
          if($type==1||$type==2){
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
          }
          else if($type==3)
          {
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
          }
          $person->save();
          $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
    
          $id=session('s_id','default');
        $person = Persons::find($id);
        $profile = $this->get_profile($person['id']);
        $date = new CallUseController();
        $profile = $date->get_date_only($profile,'created','created_at');//get วันที่ภาษาไทย แถวเดียว
        // $date = new CallUseController();
        $profile = $date->get_date_only($profile,'birth','birthday');//get วันที่ภาษาไทย แถวเดียว

        $data = [
          'store_branch_name' => $profile['0']['store_branch_name'],
            'type' => $profile['0']['type'],
            'username' => $profile['0']['username'],
            'password' => $profile['0']['password'],
            'name' => $profile['0']['name'],
            'person_id' => $profile['0']['person_id'],
            'gender' => $profile['0']['gender'],
            'email' => $profile['0']['email'],
            'birthday' => $profile['0']['birthday'],
            'phone' => $profile['0']['phone'],
            'image_url' => $profile['0']['image_url'],
            'address' => $profile['0']['address'],
            'profile_id' => $profile['0']['profile_id'],
            // 'created_at' => $profile['0']['created_at'],
            'create_date' => $profile['created'],
            'birth_date' => $profile['birth'], 

        ];

        $items = [
          'persons_member.name as name_member'
          ,'persons_member.phone as phone_member'
          ,'persons_member.type as type_member'
          
          ,'repair.id as r_id'
          ,'repair.persons_member_id as persons_member_id' //check
          ,'repair.bin_number as bin_number'
          ,'repair.name as name_general'
          ,'repair.phone as phone_general'
          ,'repair.status_repair as status_repair'
          ,'repair.price as price'
          ,'repair.date_in_repair as date_in_repair'
          ,'repair.date_out_repair as date_out_repair'
          ,'repair.after_price as after_price'
          ,'repair.equipment_follow as equipment_follow'

          // ,'list_repair.status_list_repair as status_list_repair'
          // ,'list_repair.list_name as list_name'
          // ,'list_repair.detail as detail'
          // ,'list_repair.symptom as symptom'
          ];
        $repairs = Repair::where('repair.status', 1)
        ->where('repair.persons_id',$id)
        ->orderBy('repair.id','desc')
        // ->leftJoin('list_repair', 'list_repair.repair_id', '=', 'repair.id')
        ->leftJoin('persons_member', 'persons_member.id', '=', 'repair.persons_member_id')
        ->get($items);
        foreach($repairs as $key=>$value)
        {
              if($repairs[$key]['persons_member_id']!=NULL)
              {
                $repairs[$key]['is_name']=$value['name_member'];
                $repairs[$key]['is_phone']=$value['phone_member'];
              }
              else if($repairs[$key]['persons_member_id']==NULL)
              {
                $repairs[$key]['is_name']=$value['name_general'];
                $repairs[$key]['is_phone']=$value['phone_general'];
              }
              if($repairs[$key]['type_member']!=NULL)
              {
                $repairs[$key]['is_type']=$value['type_member'];
              }
              else if($repairs[$key]['type_member']==NULL)
              {
                $repairs[$key]['is_type']='';
              }
              
        }
        if($repairs!='[]'){
              foreach($repairs as $key=>$value)
              {         
                $items = [
                  'list_repair.repair_id as repair_id_form_list'
                  ,'list_repair.id as id'
                  ,'list_repair.status_list_repair as status_list_repair'
                  ,'list_repair.status_list_repair as status_list_repair'
                  ,'list_repair.list_name as list_name'
                  ,'list_repair.detail as detail'
                  ,'list_repair.symptom as symptom'
                  ];
              $list_repairs = ListRepair::where('list_repair.status', 1)
              ->leftJoin('repair', 'repair.id', '=', 'list_repair.repair_id')
              // ->where('repair_id',24)
              ->get($items);   
              }
              return view('profile/profile',['repairs'=>$repairs,'list_repairs'=>$list_repairs], $data);
            }
            else{
              return view('profile/profile',['repairs'=>$repairs], $data);
            }
      }

      public function logout() {
        $request->session()->forget('s_id');  
        $request->session()->flush(); 
        $request->session()->forget('s_name');  
        $request->session()->flush(); 
        $request->session()->forget('key2');  
        $request->session()->flush();
        $request->session()->forget('s_type');  
        $request->session()->flush();  
        $request->session()->forget('s_store_branch_id');  
        $request->session()->flush();  

        return redirect('/');

      } 
   
}
