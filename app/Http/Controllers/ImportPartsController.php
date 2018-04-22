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
   
}
