<?php

namespace App\Http\Controllers;

use App\Store;
use App\StoreBranch;

use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class StoreController extends Controller
{   
  public function edit_store(Request $request)
    {
      $store = Store::find($request->id);
      $store->name = $request->name;
      // $store->account_number = $request->account_number;
      if ($request->hasFile('logo')) {      
        // echo $request;exit();       
        $chk_name =$request->file('logo')
          ->getClientOriginalName();     
          $value = substr($chk_name,-3);
          if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
            // echo '44';exit();
          }
          else{
            // echo 'tt';exit();
            $request->session()->flash('status_image_fail', ''); 
            // $request->session()->flash('status_id',$request->id); 
            return redirect('stores');
          }  

        $filename = str_random(10) . '.' . $request->file('logo')
        ->getClientOriginalName();             
        $request->file('logo')->move('image/', $filename);            
        Image::make('image/' . $filename)
        ->resize(50, 50)->save('image/logo-report/' . $filename);     
        // $img = Image::make($request->file('image')->getRealPath());
        $store->logo = $filename;        
      $store->save();
      $request->session()->flash('status_store_edit', 'แก้ไขข้อมูลร้านเรียบร้อยแล้ว');        
      } 
      else{                    
        if($request['logo']<=1)
        { 
          $store->logo=$store['logo'];         
        }  
        else{
          $request->session()->flash('status_image_fail', '');
        }    
       }
      //  exit();


      return redirect('stores');
    }
  
    public function get_store_branch_list() {
      $s_type=session('s_type','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
        $stores = StoreBranch::
        orderBy('id','asc')
        ->get();
        // $stores = $this->get_status_name($stores);
        $store = Store::find(1);
        $data =[
        'id' => $store['id'],
        'name' => $store['name'],
        'logo' => $store['logo'],
        ];

        return view('stores/stores-list', ['stores' => $stores],$data); 
        // return response()->json($stores);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }
      
    }

    public function get_store_branch_detail(Request $request) {
      $stores = StoreBranch::find($request->id);
      // $stores = $this->get_status_name($stores);
      // echo $stores;exit();
      $data =[
        'id' => $stores['id'],
        'name' => $stores['name'],
        'phone' => $stores['phone'],
        'email' => $stores['email'],
        'image_url' => $stores['image_url'],
        'map' => $stores['map'],
        'address' => $stores['address'],
        'detail' => $stores['detail'],
        'contact' => $stores['contact'],
      ];
      return view('stores/stores-detail',$data); 
      // return response()->json($stores);
    }

    public function get_store_branch() {
      $s_type=session('s_type','default');
      if($s_type==1){
        $stores = StoreBranch::
        orderBy('id','asc')
        ->get();
  
        $store = Store::find(1);
        $data =[
        'id' => $store['id'],
        'name' => $store['name'],
        'logo' => $store['logo'],
        ];
        // $stores = $this->get_status_name($stores);
  
        return view('stores/stores', ['stores' => $stores],$data); 
        // return response()->json($stores);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }

    }

    public function get_store_branch_to_font_contact() {
      $store = Store::where('id',1)->get();
      // $data = [
      //   'store_name' =>$store['0']['name'],
      // ];
      $store_branchs = StoreBranch::
      orderBy('id','asc')
      ->get();

      $store = Store::find(1);
        $data =[
        'id' => $store['id'],
        'store_name' => $store['name'],
        'logo' => $store['logo'],
        ];

      return view('font_pages/contact', ['store_branchs' => $store_branchs],$data); 
    }

    public function get_font_contact_by_id(Request $request) {

      $store_branchs = StoreBranch::find($request->id);
      $data =[
        'name' => $store_branchs['name'],
        'phone' => $store_branchs['phone'],
        'email' => $store_branchs['email'],
        'map' => $store_branchs['map'],
        'image_url' => $store_branchs['image_url'],
        'address' => $store_branchs['address'],
        'detail' => $store_branchs['detail'],
        'contact' => $store_branchs['contact'],
      ];
      return view('font_pages/contact-detail', $data); 
    }
    
    // private function get_status_name($stores)
    // {
    //    $i=0;
    //   foreach ($stores as $key => $value) {
    //     $stores[$key]['status_name'] = ($value['status'] == 1? 'เปิดใช้งาน' : 'ปิดใช้งาน');
    //     $stores[$key]['index'] = $i=$i+1;
    //   }
    //   return $stores;
    // }

    public function create_store_branch(Request $request)
    {

        $store = new StoreBranch;
        $store->store_id = '1';
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->email = $request->email;
        // $store->image_url = $request->image_url;
        $store->map = $request->map;
        $store->address = $request->address;
        // $store->account_number = $request->account_number;
        $store->detail = $request->detail;
        $store->contact = $request->contact;
        if ($request->hasFile('image_url')) {      
          // echo $request;exit();       

          $chk_name =$request->file('image_url')
          ->getClientOriginalName();     
          $value = substr($chk_name,-3);
          if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
            // echo '44';exit();
          }
          else{
            // echo 'tt';exit();
            $request->session()->flash('status_image_create_fail', ''); 
            return redirect('stores');
          } 

          $filename = str_random(10) . '.' . $request->file('image_url')
          ->getClientOriginalName();             
          $request->file('image_url')->move(public_path() . '/image/store-branch/picture/', $filename);   
          Image::make(public_path() . '/image/store-branch/picture/' . $filename)
          ->resize(200, 200)->save(public_path() . '/image/store-branch/resize/' . $filename);     
          // $img = Image::make($request->file('image')->getRealPath());          
          $store->image_url = $filename;        
          $store->status = true;
         $store->save();
          $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');          
        } 
        else{                
                  
                if($request['image_url']<=1)
              { 
                $store->image_url = 'default.jpg';  
                $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');           
              }  
              else{
                $request->session()->flash('status_image_create_fail', ''); 
                return redirect('stores');
              }  
         }  
     
        return redirect('stores');
    }

    public function edit_store_branch(Request $request)
    {
      $num=$request['phone'];
      $value = substr($num,0,2);
      if( strlen($num) > 10 || strlen($num) < 9){
      //  echo $request['phone'];
      $request->session()->flash('status_phone_fail', '');
      $request->session()->flash('status_id',$request->id); 
      return redirect('stores');
      }
      if($value!='02' && $value!='03'  && $value!='04'  && $value!='05'  && $value!='06'  && $value!='08'  && $value!='09' )
      { 
        $request->session()->flash('status_phone_fail', ''); 
        $request->session()->flash('status_id',$request->id); 
        return redirect('stores');
      }

      $store = StoreBranch::find($request->id);
      $store->store_id = '1';
      $store->name = $request->name;
      $store->phone = $request->phone;
      $store->email = $request->email;
      // $store->image_url = $request->image_url;
      $store->map = $request->map;
      $store->address = $request->address;
      // $store->account_number = $request->account_number;   

      if ($request->hasFile('image_url')) {      
        // echo $request;exit();       
      //               echo $store; 
      // exit();
        $chk_name =$request->file('image_url')
          ->getClientOriginalName();     
          $value = substr($chk_name,-3);
          if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
            // echo '44';exit();
          }
          else{
            // echo 'tt';exit();
            $request->session()->flash('status_image_edit_fail', ''); 
            $request->session()->flash('status_id',$request->id); 
            return redirect('stores');
          } 

        $filename = str_random(10) . '.' . $request->file('image_url')
        ->getClientOriginalName();             
        $request->file('image_url')->move('image/store-branch/picture/', $filename);            
        Image::make('image/store-branch/picture/' . $filename)
        ->resize(200, 200)->save('image/store-branch/resize/' . $filename);     
        // $img = Image::make($request->file('image')->getRealPath());
        $store->image_url = $filename;
        $store->detail = $request->detail;
        $store->contact = $request->contact;
        // echo "hhh";exit();
        $store->save();
        $request->session()->flash('status_edit', 'แก้ไขข้อมูลสาขาเรียบร้อยแล้ว');          
      } 
      else{                
        if($request['image_url']<=1)
        { 
          $store->image_url=$store['image_url'];   
          $request->session()->flash('status_edit', 'แก้ไขข้อมูลสาขาเรียบร้อยแล้ว');             
        }  
        else{
          $request->session()->flash('status_image_edit_fail', ''); 
            $request->session()->flash('status_id',$request->id); 
        }    
       }
      

      return redirect('stores');
    }

    public function delete($id)
    {
      $store = StoreBranch::find($id);
      if($store['status']==1){
      $store->status = 0;
      $store2=session()->flash('status_delete', 'ปิดการใช้งานสาขาเรียบร้อย'); 
      }
      elseif($store['status']==0){
        $store->status = 1;
        $store2=session()->flash('status_delete', 'เปิดการใช้งานสาขาเรียบร้อย'); 
        }
      $store->save();
      

       return redirect('stores');
    }

}
