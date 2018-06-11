<?php

namespace App\Http\Controllers;

use App\Store;
use App\StoreBranch;

use Illuminate\Http\Request;

class StoreController extends Controller
{   
  
    public function get_store_branch() {
      $stores = StoreBranch::
      orderBy('id','asc')
      ->get();
      $stores = $this->get_status_name($stores);

      return view('stores/stores', ['stores' => $stores]); 
      // return response()->json($stores);
    }

    private function get_status_name($stores)
    {
       $i=0;
      foreach ($stores as $key => $value) {
        $stores[$key]['status_name'] = ($value['status'] == 1? 'เปิดใช้งาน' : 'ปิดใช้งาน');
        $stores[$key]['index'] = $i=$i+1;
      }
      return $stores;
    }

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
        $store->status = true;
        $store->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 
        
        return redirect('stores');
    }

    public function edit_store_branch(Request $request)
    {
      $store = StoreBranch::find($request->id);
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
      $store->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('stores');
    }

    public function delete($id)
    {
      $store = StoreBranch::find($id);
      if($store['status']==1){
      $store->status = 0;
      }
      elseif($store['status']==0){
        $store->status = 1;
        }
      $store->save();
      $store2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 

       return redirect('stores');
    }

}
