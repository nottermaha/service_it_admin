<?php

namespace App\Http\Controllers;

use App\ImportPart;
use Illuminate\Http\Request;

class ImportPartsController extends Controller
{    
    public function get() {
      // echo $id;exit();
      $Import_parts = ImportPart::where('status', 1)
      ->get();
      // echo $Import_parts;exit();
      return view('import_part/import-part', ['Import_parts' => $Import_parts]);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $import_part = new ImportPart;
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
      $import_part->status = 0;
      $import_part->save();
      $import_part2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 

      return redirect('import_part');
    }
   
}
