<?php

namespace App\Http\Controllers;


use App\Persons;
use App\PersonsMember;
use App\Http\Controllers\UploadController;
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
          // echo 'rrr';exit();
          session(['s_name'=>$result['0']['name']]);
          session(['s_id'=>$result['0']['id'] ]); 
          session(['s_type'=>$result['0']['type'] ]); 
          // session(['key2'=>$result['0']['store_branch_id'] ]); 
          // if (session()->has('key2')) { 
          //   $data=session('key2','default'); 
                    
          // } 
          return redirect('dashboard');
        }
        else if($result=='[]'){
          $result2 = PersonsMember::where('status',1)
          ->where('username',$request->username)
          ->where('password',$request->password)
          ->get();
              if($result2!='[]'){
                session(['s_name'=>$result2['0']['name']]);
                session(['s_id'=>$result2['0']['id'] ]); 
                session(['s_type'=>$result2['0']['type'] ]); 
              return redirect('/');
              }
              // else{
              //   return redirect('/');
              // }
        }
       
        // return view('gallery/gallery', ['gallerys' => $gallerys]);
      }
      public function font_profile(){
        $id=session('s_id','default');
        $person_member = PersonsMember::find($id);
        // echo $person_member;exit();
        $data = [
            'type' => $person_member['type'],
            'username' => $person_member['username'],
            'password' => $person_member['password'],
            'name' => $person_member['name'],
            'person_id' => $person_member['person_id'],
            'gender' => $person_member['gender'],
            'email' => $person_member['email'],
            'birthday' => $person_member['birthday'],
            'phone' => $person_member['phone'],
            'image_url' => $person_member['image_url'],
            'address' => $person_member['address'],
            'profile_id' => $person_member['id'],
            'created_at' => $person_member['created_at'],
        ];
        // echo $data['type'];exit();
        return view('font_pages/profile',$data);
      }
     
      public function profile(){
        $id=session('s_id','default');
        $person = Persons::find($id);
        $profile = $this->get_profile($person['id']);

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
            'created_at' => $profile['0']['created_at'],
            
        ];

        return view('profile/profile',$data);
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
          if($type==2){
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
            'created_at' => $profile['0']['created_at'],

        ];

        return view('profile/profile',$data);
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

        return redirect('/');

      } 
   
}
