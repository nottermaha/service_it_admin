<?php

namespace App\Http\Controllers;

use App\Repair;
use App\Store;
use App\Persons;
use App\PersonsMember;
use App\StoreBranch;

use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;

class DashboardController extends Controller
{    

    public function dashboard_addmin() {
      $store = Store::find(1);
      session(['s_logo'=>$store['logo'] ]);
      session(['s_store_name'=>$store['name'] ]);
      $s_type=session('s_type','default');
      if($s_type!=1){
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }

      $count_repair_member['count'] = Repair::where('status', 1)
      ->where('persons_member_id','!=',NULL)
      ->count();

      $count_repair_general['count'] = Repair::where('status', 1)
      ->where('persons_member_id',NULL)
      ->count();

      $count_manager['count'] = Persons::where('persons.status', 1)
      ->where('type',2)
      ->count();

      $count_employee['count'] = Persons::where('persons.status', 1)
      ->where('type',3)
      ->count();

      $count_member['count'] = PersonsMember::where('persons_member.status', 1)
      ->where('type',4)
      ->count();

      $person_member= PersonsMember::where('persons_member.status', 1)
      ->where('type',4)
      ->limit(8)
      ->get();

      $results = Personsmember::where('persons_member.status', 1)
      ->get();
      $gender = $this->count_male2($results);
      $results2 = Repair::where('status', 1)
      ->get();

      $repair_day = $this->get_repair_hour_in_day($results2);
      $repair_month = $this->get_repair_day_in_month($results2);
      $repair_year = $this->get_repair_day_in_year($results2);

      // echo $repair_month['day_03'];exit();
      $data = [
        'count_repair_member' =>$count_repair_member['count'],
        'count_repair_general' =>$count_repair_general['count'],

        'count_manager' =>$count_manager['count'],
        'count_employee' =>$count_employee['count'],
        'count_member' =>$count_member['count'],

        'countmale' => $gender['countmale'],
        'countfemale' => $gender['countfemale'],
        'countundefine' => $gender['countundefine'],

        'time_08' => $repair_day['time_08'],'time_09' => $repair_day['time_09'],
        'time_10' => $repair_day['time_10'],'time_11' => $repair_day['time_11'],
        'time_12' => $repair_day['time_12'],'time_13' => $repair_day['time_13'],
        'time_14' => $repair_day['time_14'],'time_15' => $repair_day['time_15'],
        'time_16' => $repair_day['time_16'],'time_17' => $repair_day['time_17'],

        'day_01' => $repair_month['day_01'],'day_16' => $repair_month['day_16'],
        'day_02' => $repair_month['day_02'],'day_17' => $repair_month['day_17'],
        'day_03' => $repair_month['day_03'],'day_18' => $repair_month['day_18'],
        'day_04' => $repair_month['day_04'],'day_19' => $repair_month['day_19'],
        'day_05' => $repair_month['day_05'],'day_20' => $repair_month['day_20'],
        'day_06' => $repair_month['day_06'],'day_21' => $repair_month['day_21'],
        'day_07' => $repair_month['day_07'],'day_22' => $repair_month['day_22'],
        'day_08' => $repair_month['day_08'],'day_23' => $repair_month['day_23'],
        'day_09' => $repair_month['day_09'],'day_24' => $repair_month['day_24'],
        'day_10' => $repair_month['day_10'],'day_25' => $repair_month['day_25'],
        'day_11' => $repair_month['day_11'],'day_26' => $repair_month['day_26'],
        'day_12' => $repair_month['day_12'],'day_27' => $repair_month['day_27'],
        'day_13' => $repair_month['day_13'],'day_28' => $repair_month['day_28'],
        'day_14' => $repair_month['day_14'],'day_29' => $repair_month['day_29'],
        'day_15' => $repair_month['day_15'],'day_30' => $repair_month['day_30'],
        'day_31' => $repair_month['day_31'],

        'month_01' => $repair_year['month_01'],'month_02' => $repair_year['month_02'],
        'month_03' => $repair_year['month_03'],'month_04' => $repair_year['month_04'],
        'month_05' => $repair_year['month_05'],'month_06' => $repair_year['month_06'],
        'month_07' => $repair_year['month_07'],'month_08' => $repair_year['month_08'],
        'month_09' => $repair_year['month_09'],'month_10' => $repair_year['month_10'],
        'month_11' => $repair_year['month_11'],'month_12' => $repair_year['month_12'],

        'month' => $repair_month['month'],'year' => $repair_month['year'],
        
      ];
      // echo $data['count_admin'];exit();
      return view('dashboard/dashboard',['person_member'=>$person_member],$data);
    }
  
    //////////////////////////////////////////////////////////////////////////////////
    public function count_male2($results) {
      foreach ($results as $value) {
        $results['countmale'] = $this->countmale($value['id']);
        $results['countfemale'] = $this->countfemale($value['id']);
        $results['countundefine'] = $this->countundefine($value['id']);
        // $results[$key]['countfemaleal'] = $this->countfemaleall();
        // print_r($results[$key]['countfemale']);exit();
      }
      return $results;
    }
    public function countmale($id) {
      $results = Personsmember::where('persons_member.status', 1)
      ->where('persons_member.gender', 1)
      ->count();
      return $results;
    }
    public function countfemale($id) {
      $results = Personsmember::where('persons_member.status', 1)
      ->where('persons_member.gender', 2)
      ->count();
      return $results;
    }
    public function countundefine($id) {
      $results = Personsmember::where('persons_member.status', 1)
      ->where('persons_member.gender',null)
      ->count();
      return $results;
    }
/////////////////////////////////////////////////////////////////////////////////////////
public function get_repair_hour_in_day()
{        
  $result = Repair::where('status',1)
  ->get();
  $current_day=(date('Y-m-d'));
 
  // echo  $current_day;exit();
  $result8=[];$result9=[];$result10=[];$result11=[];$result12=[];
  $result13=[];$result14=[];$result15=[];$result16=[];$result17=[];
  foreach($result as $key=>$value)
  { 
    if($current_day==date("Y-m-d", strtotime($value['created_at'])) )
    {

      
     $time=date("H", strtotime($value['created_at']));
    //  echo "....".$time."...."; 
    if(date("H", strtotime($value['created_at']))=='08'){$result8[$key]['time_08']=$time;}
    else if(date("H", strtotime($value['created_at']))=='09'){$result9[$key]['time_09']="i";}
    else if(date("H", strtotime($value['created_at']))=='10'){$result10[$key]['time_10']="i";}
    else if(date("H", strtotime($value['created_at']))=='11'){$result11[$key]['time_11']="i";}
    else if(date("H", strtotime($value['created_at']))=='12'){$result12[$key]['time_12']="i";}
    else if(date("H", strtotime($value['created_at']))=='13'){$result13[$key]['time_13']="i";}
    else if(date("H", strtotime($value['created_at']))=='14'){$result14[$key]['time_14']="i";}
    else if(date("H", strtotime($value['created_at']))=='15'){$result15[$key]['time_15']="i";}
    else if(date("H", strtotime($value['created_at']))=='16'){$result16[$key]['time_16']="i";}
    else if(date("H", strtotime($value['created_at']))=='17'){$result17[$key]['time_17']="i";}
      }    
  }
 
  $count_time['time_08']=count($result8);
  $count_time['time_09']=count($result9);
  $count_time['time_10']=count($result10);
  $count_time['time_11']=count($result11);
  $count_time['time_12']=count($result12);
  $count_time['time_13']=count($result13);
  $count_time['time_14']=count($result14);
  $count_time['time_15']=count($result15);
  $count_time['time_16']=count($result16);
  $count_time['time_17']=count($result17);
  // echo  $count_time['time_08']."<br>";
  // echo  $count_time['time_09']."<br>";
  // echo  $count_time['time_10']."<br>";
  // echo  $count_time['time_11']."<br>";
  // echo  $count_time['time_12']."<br>";
  // echo  $count_time['time_13']."<br>";
  // echo  $count_time['time_14']."<br>";
  // echo  $count_time['time_15']."<br>";
  // echo  $count_time['time_16']."<br>";
  // echo  $count_time['time_17']."<br>";exit();
  // return response()->json($count_time);
  return $count_time;
}
public function get_repair_day_in_month()
    {
      $result = Repair::where('status',1)
      ->get();
        $current_month=(date('m'));
        $result1=[];$result2=[];$result3=[];$result4=[];$result5=[];
        $result6=[];$result7=[];$result8=[];$result9=[];$result10=[];
        $result11=[];$result12=[];$result13=[];$result14=[];$result15=[];
        $result16=[];$result17=[];$result18=[];$result19=[];$result20=[];
        $result21=[];$result22=[];$result23=[];$result24=[];$result25=[];
        $result26=[];$result27=[];$result28=[];$result29=[];$result30=[];
        $result31=[];
        foreach($result as $key=>$value)
        {
        if($current_month==date("m", strtotime($value['created_at'])) )
          {
            //  echo "....".$current_month."...."; 
            if(date("d", strtotime($value['created_at']))=='01'){$result1[$key]['day_01']="n";}
            if(date("d", strtotime($value['created_at']))=='02'){$result2[$key]['day_02']="n";}
            if(date("d", strtotime($value['created_at']))=='03'){$result3[$key]['day_03']="n";}
            if(date("d", strtotime($value['created_at']))=='04'){$result4[$key]['day_04']="n";}
            if(date("d", strtotime($value['created_at']))=='05'){$result5[$key]['day_05']="n";}
            if(date("d", strtotime($value['created_at']))=='06'){$result6[$key]['day_06']="n";}
            if(date("d", strtotime($value['created_at']))=='07'){$result7[$key]['day_07']="n";}
            if(date("d", strtotime($value['created_at']))=='08'){$result8[$key]['day_08']="n";}
            if(date("d", strtotime($value['created_at']))=='09'){$result9[$key]['day_09']="n";}
            if(date("d", strtotime($value['created_at']))=='10'){$result10[$key]['day_10']="n";}
            if(date("d", strtotime($value['created_at']))=='11'){$result11[$key]['day_11']="n";}
            if(date("d", strtotime($value['created_at']))=='12'){$result12[$key]['day_12']="n";}
            if(date("d", strtotime($value['created_at']))=='13'){$result13[$key]['day_13']="n";}
            if(date("d", strtotime($value['created_at']))=='14'){$result14[$key]['day_14']="n";}
            if(date("d", strtotime($value['created_at']))=='15'){$result15[$key]['day_15']="n";}
            if(date("d", strtotime($value['created_at']))=='16'){$result16[$key]['day_16']="n";}
            if(date("d", strtotime($value['created_at']))=='17'){$result17[$key]['day_17']="n";}
            if(date("d", strtotime($value['created_at']))=='18'){$result18[$key]['day_18']="n";}
            if(date("d", strtotime($value['created_at']))=='19'){$result19[$key]['day_19']="n";}
            if(date("d", strtotime($value['created_at']))=='20'){$result20[$key]['day_20']="n";}
            if(date("d", strtotime($value['created_at']))=='21'){$result21[$key]['day_21']="n";}
            if(date("d", strtotime($value['created_at']))=='22'){$result22[$key]['day_22']="n";}
            if(date("d", strtotime($value['created_at']))=='23'){$result23[$key]['day_23']="n";}
            if(date("d", strtotime($value['created_at']))=='24'){$result24[$key]['day_24']="n";}
            if(date("d", strtotime($value['created_at']))=='25'){$result25[$key]['day_25']="n";}
            if(date("d", strtotime($value['created_at']))=='26'){$result26[$key]['day_26']="n";}
            if(date("d", strtotime($value['created_at']))=='27'){$result27[$key]['day_27']="n";}
            if(date("d", strtotime($value['created_at']))=='28'){$result28[$key]['day_28']="n";}
            if(date("d", strtotime($value['created_at']))=='29'){$result29[$key]['day_29']="n";}
            if(date("d", strtotime($value['created_at']))=='30'){$result30[$key]['day_30']="n";}
            if(date("d", strtotime($value['created_at']))=='31'){$result31[$key]['day_31']="n";}
            
          }  
        }
      
        $count_day['day_01']=count($result1);
        $count_day['day_02']=count($result2);
        $count_day['day_03']=count($result3);
        $count_day['day_04']=count($result4);
        $count_day['day_05']=count($result5);
        $count_day['day_06']=count($result6);
        $count_day['day_07']=count($result7);
        $count_day['day_08']=count($result8);
        $count_day['day_09']=count($result9);
        $count_day['day_10']=count($result10);

        $count_day['day_11']=count($result11);
        $count_day['day_12']=count($result12);
        $count_day['day_13']=count($result13);
        $count_day['day_14']=count($result14);
        $count_day['day_15']=count($result15);
        $count_day['day_16']=count($result16);
        $count_day['day_17']=count($result17);
        $count_day['day_18']=count($result18);
        $count_day['day_19']=count($result19);
        $count_day['day_20']=count($result20);

        $count_day['day_21']=count($result21);
        $count_day['day_22']=count($result22);
        $count_day['day_23']=count($result23);
        $count_day['day_24']=count($result24);
        $count_day['day_25']=count($result25);
        $count_day['day_26']=count($result26);
        $count_day['day_27']=count($result27);
        $count_day['day_28']=count($result28);
        $count_day['day_29']=count($result29);
        $count_day['day_30']=count($result30);
        $count_day['day_31']=count($result31);
    
          // $count_date[date("d", strtotime($value['call_time']))]=count($result2);
          $year=(date('Y'));
          $year= $year+543;
          $count_day['year']=$year;
          // echo $count_day['year'];exit();
          $month=(date('m'));
          // echo $month;exit();
          if($month=='01'){$count_day['month']='ม.ค';}
          if($month=='02'){$count_day['month']='ก.พ';}
          if($month=='03'){$count_day['month']='มี.ค';}
          if($month=='04'){$count_day['month']='เม.ย';}
          if($month=='05'){$count_day['month']='พ.ค';}
          if($month=='06'){$count_day['month']='มิ.ย';}
          if($month=='07'){$count_day['month']='ก.ค';}
          if($month=='08'){$count_day['month']='ส.ค';}
          if($month=='09'){$count_day['month']='ก.ย';}
          if($month=='10'){$count_day['month']='ต.ค';}
          if($month=='11'){$count_day['month']='พ.ย';}
          if($month=='12'){$count_day['month']='ธ.ค';}
          // echo $count_day['month'];exit();
          return $count_day;
    }

    public function get_repair_day_in_year()
    {
      $result = Repair::where('status',1)
      ->get();
        $current_month=(date('Y'));
        $result1=[];$result2=[];$result3=[];$result4=[];$result5=[];
        $result6=[];$result7=[];$result8=[];$result9=[];$result10=[];
        $result11=[];$result12=[];
        foreach($result as $key=>$value)
        {
        if($current_month==date("Y", strtotime($value['created_at'])) )
          {
            //  echo "....".$current_month."...."; 
            if(date("m", strtotime($value['created_at']))=='01'){$result1[$key]['month_01']="n";}
            if(date("m", strtotime($value['created_at']))=='02'){$result2[$key]['month_02']="n";}
            if(date("m", strtotime($value['created_at']))=='03'){$result3[$key]['month_03']="n";}
            if(date("m", strtotime($value['created_at']))=='04'){$result4[$key]['month_04']="n";}
            if(date("m", strtotime($value['created_at']))=='05'){$result5[$key]['month_05']="n";}
            if(date("m", strtotime($value['created_at']))=='06'){$result6[$key]['month_06']="n";}
            if(date("m", strtotime($value['created_at']))=='07'){$result7[$key]['month_07']="n";}
            if(date("m", strtotime($value['created_at']))=='08'){$result8[$key]['month_08']="n";}
            if(date("m", strtotime($value['created_at']))=='09'){$result9[$key]['month_09']="n";}
            if(date("m", strtotime($value['created_at']))=='10'){$result10[$key]['month_10']="n";}
            if(date("m", strtotime($value['created_at']))=='11'){$result11[$key]['month_11']="n";}
            if(date("m", strtotime($value['created_at']))=='12'){$result12[$key]['month_12']="n";}

          }  
        }
      
        $count_month['month_01']=count($result1);
        $count_month['month_02']=count($result2);
        $count_month['month_03']=count($result3);
        $count_month['month_04']=count($result4);
        $count_month['month_05']=count($result5);
        $count_month['month_06']=count($result6);
        $count_month['month_07']=count($result7);
        $count_month['month_08']=count($result8);
        $count_month['month_09']=count($result9);
        $count_month['month_10']=count($result10);
        $count_month['month_11']=count($result11);
        $count_month['month_12']=count($result12);
    
        // echo $count_month['month_07'];exit();
          return $count_month;
    }

/////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////
    public function dashboard_by_store_branch() {
      $store = Store::find(1);
      session(['s_logo'=>$store['logo'] ]);
      session(['s_store_name'=>$store['name'] ]);
      $store_branch_id=session('s_store_branch_id','default');
      // echo $store_branch_id;exit();
      $count_repair_member['count'] = Repair::where('status', 1)
      ->where('persons_member_id','!=',NULL)
      ->where('store_branch_id',$store_branch_id)
      ->count();

      $count_repair_general['count'] = Repair::where('status', 1)
      ->where('persons_member_id',NULL)
      ->where('store_branch_id',$store_branch_id)
      ->count();

      $count_manager['count'] = Persons::where('persons.status', 1)
      ->where('type',2)
      ->where('store_branch_id',$store_branch_id)
      ->count();

      $count_employee['count'] = Persons::where('persons.status', 1)
      ->where('type',3)
      ->where('store_branch_id',$store_branch_id)
      ->count();

      $count_member['count'] = PersonsMember::where('persons_member.status', 1)
      ->where('type',4)
      ->count();

      $person_member= PersonsMember::where('persons_member.status', 1)
      ->where('type',4)
      ->limit(8)
      ->get();
      $date = new CallUseController();
      $person_member = $date->get_date_all($person_member,'created','created_at');
      // echo $person_member;exit();

      $results = Persons::where('persons.status', 1)
      ->where('store_branch_id',$store_branch_id)
      ->get();
      $gender = $this->count_male2_by_store_branch($results);
      $results2 = Repair::where('status', 1)
      ->where('store_branch_id',$store_branch_id)
      ->get();

      $repair_day = $this->get_repair_hour_in_day_by_store_branch($results2);
      $repair_month = $this->get_repair_day_in_month_by_store_branch($results2);
      $repair_year = $this->get_repair_day_in_year_by_store_branch($results2);

      // echo $repair_month['day_03'];exit();
      $data = [
        'count_repair_member' =>$count_repair_member['count'],
        'count_repair_general' =>$count_repair_general['count'],

        'count_manager' =>$count_manager['count'],
        'count_employee' =>$count_employee['count'],
        'count_member' =>$count_member['count'],

        'countmale' => $gender['countmale'],
        'countfemale' => $gender['countfemale'],
        'countundefine' => $gender['countundefine'],

        'time_08' => $repair_day['time_08'],'time_09' => $repair_day['time_09'],
        'time_10' => $repair_day['time_10'],'time_11' => $repair_day['time_11'],
        'time_12' => $repair_day['time_12'],'time_13' => $repair_day['time_13'],
        'time_14' => $repair_day['time_14'],'time_15' => $repair_day['time_15'],
        'time_16' => $repair_day['time_16'],'time_17' => $repair_day['time_17'],

        'day_01' => $repair_month['day_01'],'day_16' => $repair_month['day_16'],
        'day_02' => $repair_month['day_02'],'day_17' => $repair_month['day_17'],
        'day_03' => $repair_month['day_03'],'day_18' => $repair_month['day_18'],
        'day_04' => $repair_month['day_04'],'day_19' => $repair_month['day_19'],
        'day_05' => $repair_month['day_05'],'day_20' => $repair_month['day_20'],
        'day_06' => $repair_month['day_06'],'day_21' => $repair_month['day_21'],
        'day_07' => $repair_month['day_07'],'day_22' => $repair_month['day_22'],
        'day_08' => $repair_month['day_08'],'day_23' => $repair_month['day_23'],
        'day_09' => $repair_month['day_09'],'day_24' => $repair_month['day_24'],
        'day_10' => $repair_month['day_10'],'day_25' => $repair_month['day_25'],
        'day_11' => $repair_month['day_11'],'day_26' => $repair_month['day_26'],
        'day_12' => $repair_month['day_12'],'day_27' => $repair_month['day_27'],
        'day_13' => $repair_month['day_13'],'day_28' => $repair_month['day_28'],
        'day_14' => $repair_month['day_14'],'day_29' => $repair_month['day_29'],
        'day_15' => $repair_month['day_15'],'day_30' => $repair_month['day_30'],
        'day_31' => $repair_month['day_31'],

        'month_01' => $repair_year['month_01'],'month_02' => $repair_year['month_02'],
        'month_03' => $repair_year['month_03'],'month_04' => $repair_year['month_04'],
        'month_05' => $repair_year['month_05'],'month_06' => $repair_year['month_06'],
        'month_07' => $repair_year['month_07'],'month_08' => $repair_year['month_08'],
        'month_09' => $repair_year['month_09'],'month_10' => $repair_year['month_10'],
        'month_11' => $repair_year['month_11'],'month_12' => $repair_year['month_12'],

        'month' => $repair_month['month'],'year' => $repair_month['year'],
        
      ];
      // echo $data['count_admin'];exit();
      return view('dashboard/dashboard',['person_member'=>$person_member],$data);
    }
  
    //////////////////////////////////////////////////////////////////////////////////
    public function count_male2_by_store_branch($results) {
      foreach ($results as $value) {
        $results['countmale'] = $this->countmale_by_store_branch($value['id']);
        $results['countfemale'] = $this->countfemale_by_store_branch($value['id']);
        $results['countundefine'] = $this->countundefine_by_store_branch($value['id']);
        // $results[$key]['countfemaleal'] = $this->countfemaleall();
        // print_r($results[$key]['countfemale']);exit();
      }
      return $results;
    }
    public function countmale_by_store_branch($id) {
      $results = Persons::where('persons.status', 1)
      ->where('persons.gender', 1)
      ->count();
      return $results;
    }
    public function countfemale_by_store_branch($id) {
      $results = Persons::where('persons.status', 1)
      ->where('persons.gender', 0)
      ->count();
      return $results;
    }
    public function countundefine_by_store_branch($id) {
      $results = Persons::where('persons.status', 1)
      ->where('persons.gender',null)
      ->count();
      return $results;
    }
/////////////////////////////////////////////////////////////////////////////////////////
public function get_repair_hour_in_day_by_store_branch()
{        
  $store_branch_id=session('s_store_branch_id','default');
  // echo $store_branch_id;exit();
  $result = Repair::where('status',1)
  ->where('store_branch_id',$store_branch_id)
  ->get();

  $current_day=(date('Y-m-d'));
 
  // echo  $current_day;exit();
  $result8=[];$result9=[];$result10=[];$result11=[];$result12=[];
  $result13=[];$result14=[];$result15=[];$result16=[];$result17=[];
  foreach($result as $key=>$value)
  { 
    if($current_day==date("Y-m-d", strtotime($value['created_at'])) )
    {

      
     $time=date("H", strtotime($value['created_at']));
    //  echo "....".$time."...."; 
    if(date("H", strtotime($value['created_at']))=='08'){$result8[$key]['time_08']=$time;}
    else if(date("H", strtotime($value['created_at']))=='09'){$result9[$key]['time_09']="i";}
    else if(date("H", strtotime($value['created_at']))=='10'){$result10[$key]['time_10']="i";}
    else if(date("H", strtotime($value['created_at']))=='11'){$result11[$key]['time_11']="i";}
    else if(date("H", strtotime($value['created_at']))=='12'){$result12[$key]['time_12']="i";}
    else if(date("H", strtotime($value['created_at']))=='13'){$result13[$key]['time_13']="i";}
    else if(date("H", strtotime($value['created_at']))=='14'){$result14[$key]['time_14']="i";}
    else if(date("H", strtotime($value['created_at']))=='15'){$result15[$key]['time_15']="i";}
    else if(date("H", strtotime($value['created_at']))=='16'){$result16[$key]['time_16']="i";}
    else if(date("H", strtotime($value['created_at']))=='17'){$result17[$key]['time_17']="i";}
      }    
  }
 
  $count_time['time_08']=count($result8);
  $count_time['time_09']=count($result9);
  $count_time['time_10']=count($result10);
  $count_time['time_11']=count($result11);
  $count_time['time_12']=count($result12);
  $count_time['time_13']=count($result13);
  $count_time['time_14']=count($result14);
  $count_time['time_15']=count($result15);
  $count_time['time_16']=count($result16);
  $count_time['time_17']=count($result17);
  // echo  $count_time['time_08']."<br>";
  // echo  $count_time['time_09']."<br>";
  // echo  $count_time['time_10']."<br>";
  // echo  $count_time['time_11']."<br>";
  // echo  $count_time['time_12']."<br>";
  // echo  $count_time['time_13']."<br>";
  // echo  $count_time['time_14']."<br>";
  // echo  $count_time['time_15']."<br>";
  // echo  $count_time['time_16']."<br>";
  // echo  $count_time['time_17']."<br>";exit();
  // return response()->json($count_time);
  return $count_time;
}
public function get_repair_day_in_month_by_store_branch()
    {
        $store_branch_id=session('s_store_branch_id','default');
        // echo $store_branch_id;exit();
        $result = Repair::where('status',1)
        ->where('store_branch_id',$store_branch_id)
        ->get();
        $current_month=(date('m'));
        $result1=[];$result2=[];$result3=[];$result4=[];$result5=[];
        $result6=[];$result7=[];$result8=[];$result9=[];$result10=[];
        $result11=[];$result12=[];$result13=[];$result14=[];$result15=[];
        $result16=[];$result17=[];$result18=[];$result19=[];$result20=[];
        $result21=[];$result22=[];$result23=[];$result24=[];$result25=[];
        $result26=[];$result27=[];$result28=[];$result29=[];$result30=[];
        $result31=[];
        foreach($result as $key=>$value)
        {
        if($current_month==date("m", strtotime($value['created_at'])) )
          {
            //  echo "....".$current_month."...."; 
            if(date("d", strtotime($value['created_at']))=='01'){$result1[$key]['day_01']="n";}
            if(date("d", strtotime($value['created_at']))=='02'){$result2[$key]['day_02']="n";}
            if(date("d", strtotime($value['created_at']))=='03'){$result3[$key]['day_03']="n";}
            if(date("d", strtotime($value['created_at']))=='04'){$result4[$key]['day_04']="n";}
            if(date("d", strtotime($value['created_at']))=='05'){$result5[$key]['day_05']="n";}
            if(date("d", strtotime($value['created_at']))=='06'){$result6[$key]['day_06']="n";}
            if(date("d", strtotime($value['created_at']))=='07'){$result7[$key]['day_07']="n";}
            if(date("d", strtotime($value['created_at']))=='08'){$result8[$key]['day_08']="n";}
            if(date("d", strtotime($value['created_at']))=='09'){$result9[$key]['day_09']="n";}
            if(date("d", strtotime($value['created_at']))=='10'){$result10[$key]['day_10']="n";}
            if(date("d", strtotime($value['created_at']))=='11'){$result11[$key]['day_11']="n";}
            if(date("d", strtotime($value['created_at']))=='12'){$result12[$key]['day_12']="n";}
            if(date("d", strtotime($value['created_at']))=='13'){$result13[$key]['day_13']="n";}
            if(date("d", strtotime($value['created_at']))=='14'){$result14[$key]['day_14']="n";}
            if(date("d", strtotime($value['created_at']))=='15'){$result15[$key]['day_15']="n";}
            if(date("d", strtotime($value['created_at']))=='16'){$result16[$key]['day_16']="n";}
            if(date("d", strtotime($value['created_at']))=='17'){$result17[$key]['day_17']="n";}
            if(date("d", strtotime($value['created_at']))=='18'){$result18[$key]['day_18']="n";}
            if(date("d", strtotime($value['created_at']))=='19'){$result19[$key]['day_19']="n";}
            if(date("d", strtotime($value['created_at']))=='20'){$result20[$key]['day_20']="n";}
            if(date("d", strtotime($value['created_at']))=='21'){$result21[$key]['day_21']="n";}
            if(date("d", strtotime($value['created_at']))=='22'){$result22[$key]['day_22']="n";}
            if(date("d", strtotime($value['created_at']))=='23'){$result23[$key]['day_23']="n";}
            if(date("d", strtotime($value['created_at']))=='24'){$result24[$key]['day_24']="n";}
            if(date("d", strtotime($value['created_at']))=='25'){$result25[$key]['day_25']="n";}
            if(date("d", strtotime($value['created_at']))=='26'){$result26[$key]['day_26']="n";}
            if(date("d", strtotime($value['created_at']))=='27'){$result27[$key]['day_27']="n";}
            if(date("d", strtotime($value['created_at']))=='28'){$result28[$key]['day_28']="n";}
            if(date("d", strtotime($value['created_at']))=='29'){$result29[$key]['day_29']="n";}
            if(date("d", strtotime($value['created_at']))=='30'){$result30[$key]['day_30']="n";}
            if(date("d", strtotime($value['created_at']))=='31'){$result31[$key]['day_31']="n";}
            
          }  
        }
      
        $count_day['day_01']=count($result1);
        $count_day['day_02']=count($result2);
        $count_day['day_03']=count($result3);
        $count_day['day_04']=count($result4);
        $count_day['day_05']=count($result5);
        $count_day['day_06']=count($result6);
        $count_day['day_07']=count($result7);
        $count_day['day_08']=count($result8);
        $count_day['day_09']=count($result9);
        $count_day['day_10']=count($result10);

        $count_day['day_11']=count($result11);
        $count_day['day_12']=count($result12);
        $count_day['day_13']=count($result13);
        $count_day['day_14']=count($result14);
        $count_day['day_15']=count($result15);
        $count_day['day_16']=count($result16);
        $count_day['day_17']=count($result17);
        $count_day['day_18']=count($result18);
        $count_day['day_19']=count($result19);
        $count_day['day_20']=count($result20);

        $count_day['day_21']=count($result21);
        $count_day['day_22']=count($result22);
        $count_day['day_23']=count($result23);
        $count_day['day_24']=count($result24);
        $count_day['day_25']=count($result25);
        $count_day['day_26']=count($result26);
        $count_day['day_27']=count($result27);
        $count_day['day_28']=count($result28);
        $count_day['day_29']=count($result29);
        $count_day['day_30']=count($result30);
        $count_day['day_31']=count($result31);
    
          // $count_date[date("d", strtotime($value['call_time']))]=count($result2);
          $year=(date('Y'));
          $year= $year+543;
          $count_day['year']=$year;
          // echo $count_day['year'];exit();
          $month=(date('m'));
          // echo $month;exit();
          if($month=='01'){$count_day['month']='ม.ค';}
          if($month=='02'){$count_day['month']='ก.พ';}
          if($month=='03'){$count_day['month']='มี.ค';}
          if($month=='04'){$count_day['month']='เม.ย';}
          if($month=='05'){$count_day['month']='พ.ค';}
          if($month=='06'){$count_day['month']='มิ.ย';}
          if($month=='07'){$count_day['month']='ก.ค';}
          if($month=='08'){$count_day['month']='ส.ค';}
          if($month=='09'){$count_day['month']='ก.ย';}
          if($month=='10'){$count_day['month']='ต.ค';}
          if($month=='11'){$count_day['month']='พ.ย';}
          if($month=='12'){$count_day['month']='ธ.ค';}
          // echo $count_day['month'];exit();
          return $count_day;
    }
    public function get_repair_day_in_year_by_store_branch()
    {
      $result = Repair::where('status',1)
      ->get();
        $current_month=(date('Y'));
        $result1=[];$result2=[];$result3=[];$result4=[];$result5=[];
        $result6=[];$result7=[];$result8=[];$result9=[];$result10=[];
        $result11=[];$result12=[];
        foreach($result as $key=>$value)
        {
        if($current_month==date("Y", strtotime($value['created_at'])) )
          {
            //  echo "....".$current_month."...."; 
            if(date("m", strtotime($value['created_at']))=='01'){$result1[$key]['month_01']="n";}
            if(date("m", strtotime($value['created_at']))=='02'){$result2[$key]['month_02']="n";}
            if(date("m", strtotime($value['created_at']))=='03'){$result3[$key]['month_03']="n";}
            if(date("m", strtotime($value['created_at']))=='04'){$result4[$key]['month_04']="n";}
            if(date("m", strtotime($value['created_at']))=='05'){$result5[$key]['month_05']="n";}
            if(date("m", strtotime($value['created_at']))=='06'){$result6[$key]['month_06']="n";}
            if(date("m", strtotime($value['created_at']))=='07'){$result7[$key]['month_07']="n";}
            if(date("m", strtotime($value['created_at']))=='08'){$result8[$key]['month_08']="n";}
            if(date("m", strtotime($value['created_at']))=='09'){$result9[$key]['month_09']="n";}
            if(date("m", strtotime($value['created_at']))=='10'){$result10[$key]['month_10']="n";}
            if(date("m", strtotime($value['created_at']))=='11'){$result11[$key]['month_11']="n";}
            if(date("m", strtotime($value['created_at']))=='12'){$result12[$key]['month_12']="n";}

          }  
        }
      
        $count_month['month_01']=count($result1);
        $count_month['month_02']=count($result2);
        $count_month['month_03']=count($result3);
        $count_month['month_04']=count($result4);
        $count_month['month_05']=count($result5);
        $count_month['month_06']=count($result6);
        $count_month['month_07']=count($result7);
        $count_month['month_08']=count($result8);
        $count_month['month_09']=count($result9);
        $count_month['month_10']=count($result10);
        $count_month['month_11']=count($result11);
        $count_month['month_12']=count($result12);
    
        // echo $count_month['month_07'];exit();
          return $count_month;
    }

}
