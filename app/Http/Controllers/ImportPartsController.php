<?php

namespace App\Http\Controllers;

use App\ImportPart;
use App\Http\Controllers\CallUseController;
use Illuminate\Http\Request;

class ImportPartsController extends Controller
{    
    public function get() {
      $s_type=session('s_type','default');
      $s_store_branch_id=session('s_store_branch_id','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
        // echo $id;exit();
        $Import_parts = ImportPart::where('store_branch_id',$s_store_branch_id)
        ->get();
        $date = new CallUseController();
        $Import_parts = $date->get_date_all($Import_parts,'date','created_at'); //get วันที่ภาษาไทย ลูป

        // echo $Import_parts;exit();
        return view('import_part/import-part', ['Import_parts' => $Import_parts]);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $s_store_branch_id=session('s_store_branch_id','default');
        $import_part = new ImportPart;
        $import_part->store_branch_id = $s_store_branch_id;
        $import_part->lot_name = $request->lot_name;
        $import_part->status = true;
        $import_part->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        
        return redirect('import_part');
    }
    public function edit(Request $request)
    {
      $import_part = ImportPart::find($request->id);
      $import_part->lot_name = $request->lot_name;
      $import_part->status = true;
      $import_part->save();
      $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 

      return redirect('import_part');
    }
    public function delete($id)
    {
      $import_part = ImportPart::find($id);
      if($import_part->status==1){
        $import_part->status = 0;
        $import_part2=session()->flash('status_delete', 'ปิดการใช้งานล็อตอะไหล่เรียบร้อยแล้ว'); 
      }
      elseif($import_part->status==0){
        $import_part->status = 1;
        $import_part2=session()->flash('status_delete', 'เปิดการใช้งานล็อตอะไหล่เรียบร้อยแล้ว'); 
      }
      // $import_part->status = 0;
      $import_part->save();

      return redirect('import_part');
    }
   
}
