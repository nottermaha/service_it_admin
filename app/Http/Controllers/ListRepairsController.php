<?php

namespace App\Http\Controllers;

use App\ListRepair;
use Illuminate\Http\Request;

class ListRepairsController extends Controller
{    
    public function get_list_repair_by_id($id) {
      // echo $id;exit();
      $repairs = ListRepair::where('status', 1)
      // $repairs = ListRepair::find($id);
      ->where('repair_id',$id)
      // ->where('persons_member_id',NULL)
      // ->where('persons_id',14)
      ->get();
      // echo $repairs;exit();
      return view('list_repairs_member/list-repairs-member', ['repairs' => $repairs]);
    }
   
}
