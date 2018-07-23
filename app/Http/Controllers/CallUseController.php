<?php

namespace App\Http\Controllers;

use App\Store;
use App\StoreBranch;
use App\News;
use App\ImportPart;

use Illuminate\Http\Request;

class CallUseController extends Controller
{   
  
    public function get_footer_font() {
      $stores = StoreBranch::where('status',1)
      ->get();
      $stores = News::where('status',1)
      ->orderBy('id','desc')
      ->limit(3)
      ->get();
      // echo $new['0']['title'];exit();
      return $stores;

    }
    public function get_date_all($results,$text,$name) {
      //results=data text=ชื่อตัวแปรใหม่ name=value
      // echo $id;exit();
      // $results = ImportPart::where('status', 1)
      // ->get();
      $date="";
      $year="";
      $month="";
      $day="";
      foreach($results as $key=>$value)
      {
        $year=date("Y", strtotime($value[$name]));
        $month=date("m", strtotime($value[$name]));
        if($month=='01'){
          $month="มกราคม";
        }
        if($month=='02'){
          $month="กุมภาพันธ์";
        }
        if($month=='03'){
          $month="มีนาคม";
        }
        if($month=='04'){
          $month="เมษายน";
        }
        if($month=='05'){
          $month="พฤษภาคม";
        }
        if($month=='06'){
          $month="มิถุนายน";
        }
        if($month=='07'){
          $month="กรกฏาคม";
        }
        if($month=='08'){
          $month="สิงหาคม";
        }
        if($month=='09'){
          $month="กันยายน";
        }
        if($month=='10'){
          $month="ตุลาคม";
        }
        if($month=='11'){
          $month="พฤศจิกายน";
        }
        if($month=='12'){
          $month="ธันวาคม";
        }

        $day=date("d", strtotime($value[$name]));
        $results[$key][$text]=$day." ".$month." ".($year+543);
        // echo $date;
      }
      // exit();
      return $results;
    }

    public function get_date_only($results,$text,$name) {
      //results = data  name = value
      // echo $name;exit();
      // $results = ImportPart::where('status', 1)
      // ->get();
      date_default_timezone_set("Asia/Bangkok");
        $year=date("Y", strtotime($results['0'][$name]));
        // echo $year;exit();
        $month=date("m", strtotime($results['0'][$name]));
        if($month=='01'){
          $month="มกราคม";
        }
        if($month=='02'){
          $month="กุมภาพันธ์";
        }
        if($month=='03'){
          $month="มีนาคม";
        }
        if($month=='04'){
          $month="เมษายน";
        }
        if($month=='05'){
          $month="พฤษภาคม";
        }
        if($month=='06'){
          $month="มิถุนายน";
        }
        if($month=='07'){
          $month="กรกฏาคม";
        }
        if($month=='08'){
          $month="สิงหาคม";
        }
        if($month=='09'){
          $month="กันยายน";
        }
        if($month=='10'){
          $month="ตุลาคม";
        }
        if($month=='11'){
          $month="พฤศจิกายน";
        }
        if($month=='12'){
          $month="ธันวาคม";
        }

        $day=date("d", strtotime($results['0'][$name]));
        $results[$text]=$day." ".$month." ".($year+543);
        // echo $results['0']['date'];
      // exit();
      return $results;
    }

    public function get_date_only2($results,$text,$name) {

      date_default_timezone_set("Asia/Bangkok");
        $year=date("Y", strtotime($results[$name]));
        // echo $year;exit();
        $month=date("m", strtotime($results[$name]));
        if($month=='01'){
          $month="มกราคม";
        }
        if($month=='02'){
          $month="กุมภาพันธ์";
        }
        if($month=='03'){
          $month="มีนาคม";
        }
        if($month=='04'){
          $month="เมษายน";
        }
        if($month=='05'){
          $month="พฤษภาคม";
        }
        if($month=='06'){
          $month="มิถุนายน";
        }
        if($month=='07'){
          $month="กรกฏาคม";
        }
        if($month=='08'){
          $month="สิงหาคม";
        }
        if($month=='09'){
          $month="กันยายน";
        }
        if($month=='10'){
          $month="ตุลาคม";
        }
        if($month=='11'){
          $month="พฤศจิกายน";
        }
        if($month=='12'){
          $month="ธันวาคม";
        }

        $day=date("d", strtotime($results[$name]));
        $results[$text]=$day." ".$month." ".($year+543);
      // exit();
      return $results;
    }

    public function get_date_only_request_date($results) {

      date_default_timezone_set("Asia/Bangkok");
        $year=date("Y", strtotime($results));
        // echo $year;exit();
        $month=date("m", strtotime($results));
        if($month=='01'){
          $month="มกราคม";
        }
        if($month=='02'){
          $month="กุมภาพันธ์";
        }
        if($month=='03'){
          $month="มีนาคม";
        }
        if($month=='04'){
          $month="เมษายน";
        }
        if($month=='05'){
          $month="พฤษภาคม";
        }
        if($month=='06'){
          $month="มิถุนายน";
        }
        if($month=='07'){
          $month="กรกฏาคม";
        }
        if($month=='08'){
          $month="สิงหาคม";
        }
        if($month=='09'){
          $month="กันยายน";
        }
        if($month=='10'){
          $month="ตุลาคม";
        }
        if($month=='11'){
          $month="พฤศจิกายน";
        }
        if($month=='12'){
          $month="ธันวาคม";
        }
        $day=date("d", strtotime($results));
        $results=$day." ".$month." ".($year+543);
      // exit();
      return $results;
    }

    public function get_time_all($results,$text,$name) {

      foreach($results as $key=>$value)
      {
      $hour=date("H", strtotime($value['0'][$name]));
      // echo $year;exit();
      $minute=date("i", strtotime($value['0'][$name]));
      // $second=date("s", strtotime($value['0'][$name]));
      $results[$key][$text]=$hour.":".$minute."น.";
    // exit();
      }
    return $results;
  }

    public function get_time_only($results,$text,$name) {

      $hour=date("H", strtotime($results['0'][$name]));
      // echo $year;exit();
      $minute=date("i", strtotime($results['0'][$name]));
      // $second=date("s", strtotime($results['0'][$name]));
      $results[$text]=$hour.":".$minute."น.";
    // exit();

    return $results;
  }

    public function get_time_only2($results,$text,$name) {

        $hour=date("H", strtotime($results[$name]));
        // echo $year;exit();
        $minute=date("i", strtotime($results[$name]));
        // $second=date("s", strtotime($results[$name]));
        $results[$text]=$hour.":".$minute."น.";
      // exit();
      return $results;
    }

}
