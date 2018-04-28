<?php

namespace App\Http\Controllers;

use App\Store;
use App\Store_branch;

use Illuminate\Http\Request;

class StoreController extends Controller
{   
  
    public function get_store_branch() {
      $stores = Store_branch::where('status', 1)->get();
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
        $store = new Store_branch;
        $store->store_id = '1';
        $store->name = $request->name;
        $store->status = true;
        $store->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 
        
        return redirect('stores');
    }

    public function edit_store_branch(Request $request)
    {
      $store = Store_branch::find($request->id);
      $store->store_id = '1';
      $store->name = $request->name;
      $store->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('stores');
    }

    public function delete($id)
    {
      $store = Store_branch::find($id);
      $store->status = 0;
      $store->save();
      $store2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 

       return redirect('stores');
    }

}
