<?php

namespace App\Http\Controllers;

use App\Persons;
use App\PersonsMember;
use App\StoreBranch;
use App\Repair;
use App\ListPart;
use App\ImportPart;
use App\SettingStatusRepair;

use Illuminate\Http\Request;

class ReportController extends Controller
{   
  public function get_report_print(Request $request) {
    $s_type=session('s_type','default');
    $s_store_branch_id=session('s_store_branch_id','default');
    
    if($request->chk==1){
      $item =[
        'store_branch.name as branch_name'

        ,'persons.id as id'
        ,'persons.name as name'
        ,'persons.person_id as person_id'
        ,'persons.gender as gender'
        ,'persons.email as email'
        ,'persons.birthday as birthday'
        ,'persons.phone as phone'
        ,'persons.address as address'
        ,'persons.position as position'
        ,'persons.salary as salary'
        ,'persons.date_in as date_in'
        ,'persons.date_out as date_out'
      ];
            if($request->chk_print==1){
              $result = Persons::
              leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
              ->where('persons.status', 1)
              ->orderBy('persons.store_branch_id','asc')
              ->where('persons.type',3)
              ->get($item);
              $data =['chk'=>$request->chk];
              // echo $persons;exit;
              return view('report/re-excel',['result'=>$result],$data);
            }
            elseif($request->chk_print==2){
              $result = Persons::
              leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
              ->where('persons.status', 1)
              ->orderBy('persons.store_branch_id','asc')
              ->where('persons.type',3)
              ->where('persons.store_branch_id',$s_store_branch_id)
              ->get($item);
              $data =['chk'=>$request->chk];
              // echo $result;exit;
              return view('report/re-excel',['result'=>$result],$data);
            }
            elseif($request->chk_print==3){
              $result = Persons::
              leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
              ->where('persons.status', 1)
              ->orderBy('persons.store_branch_id','asc')
              ->where('persons.type',3)
              ->where('persons.store_branch_id',$request->store_branch_id)
              ->get($item);
              $data =['chk'=>$request->chk];
              // echo $persons;exit;
              return view('report/re-excel',['result'=>$result],$data);
            }
        
    }
    elseif($request->chk==2){
      ///////person_member///////
          if($request->chk_print==3){
            $result = PersonsMember::where('status',1)
            ->get();
            $data =['chk'=>$request->chk];
            // echo $persons;exit;
            return view('report/re-excel',['result'=>$result],$data);
          }
    }
    elseif($request->chk==3){
          if($request->chk_print==1){
            $result = StoreBranch::where('status',1)
            ->get();
            $data =['chk'=>$request->chk];

            return view('report/re-excel',['result'=>$result],$data);
          }
          elseif($request->chk_print==2){
            $result = StoreBranch::where('status',1)
            ->where('id',$request->store_branch_id)
            ->get();
            $data =['chk'=>$request->chk];

            return view('report/re-excel',['result'=>$result],$data);
          }
          elseif($request->chk_print==3){
            $result = StoreBranch::where('status',1)
            ->where('id',$s_store_branch_id)
            ->get();
            $data =['chk'=>$request->chk];

            return view('report/re-excel',['result'=>$result],$data);
          }
    }
    
    else{
      echo 'n';exit;
    }
    
  }

    public function get_report_detail(Request $request) {
      $s_type=session('s_type','default');
      $s_store_branch_id=session('s_store_branch_id','default');
      
      if($request->chk==1){
        if($s_type==1){
          if($request->chk_get==1 && $request->get_store_branch_id!=-1){
              $item =[
                'store_branch.name as store_branch_name'
                ,'persons.name'
                ,'persons.phone'
                ,'persons.email'
              ];
              $result = Persons::where('persons.status', 1)
            ->leftJoin('store_branch','store_branch.id','=','persons.store_branch_id')
            ->where('persons.store_branch_id',$request->get_store_branch_id)
            ->where('persons.type',3)
            ->get($item);
            $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$result['0']['store_branch_name'],'chk_get'=>0];
          }
          else{
            $result = Persons::where('status', 1)
            ->where('type',3)
            ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'พนักงานทั้งหมด','chk_get'=>0];
          }

        }
        elseif($s_type==2||$s_type==3){
          $result = Persons::where('status', 1)
          ->where('type',3)
          ->where('store_branch_id',$s_store_branch_id)
          ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'พนักงาน'];
        }

          $store_branch = StoreBranch::where('status', 1)
          ->get();
          // echo $results;exit;
          return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
        }

      elseif($request->chk==2){
        // if($s_type==1){
          $result = PersonsMember::where('status', 1)
          ->where('type',4)
          ->get();

          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'สมาชิก'];
          return view('report/report-detail',['result'=>$result,'store_branch'],$data);
        }

      elseif($request->chk==3){
          if($s_type==1){
              if($request->chk_get==1 && $request->get_store_branch_id!=-1){
                $result = StoreBranch::where('status', 1)
                ->where('id',$request->get_store_branch_id)
                ->get();
                $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$result['0']['name'],'chk_get'=>0];
              }
              else{
                $result = StoreBranch::where('status', 1)
              ->get();
              $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'ร้านทั้งหมด','chk_get'=>0];
              }
            
          }
          elseif($s_type==2||$s_type==3){
            $result = StoreBranch::where('status', 1)
            ->where('id',$s_store_branch_id)
            ->get();
            $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'ร้าน','chk_get'=>0];
          }
          $store_branch = StoreBranch::where('status', 1)
          ->get();

          return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
       }

       elseif($request->chk==4){
        // if($s_type==1){
          $result = Repair::where('status', 1)
          ->get();

          $store_branchs = StoreBranch::where('status', 1)
          ->get();

          $status_repairs = SettingStatusRepair::where('status', 1)
          ->get();

          $person_members = PersonsMember::where('status', 1)
          ->get();

          $current_date=date("Y-m-d");
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'งานซ่อมทั้งหมด','current_date'=>$current_date];

          return view('report/report-detail',['result'=>$result,'store_branchs'=>$store_branchs,'status_repairs'=>$status_repairs,'person_members'=>$person_members],$data);
        }

       elseif($request->chk==5){
        if($s_type==1){
          if($request->chk_get==1 && $request->get_store_branch_id!=-1){
            $store_branch = StoreBranch::where('status', 1)
            ->where('id',$request->get_store_branch_id)
            ->get();

            $result = ListPart::where('list_parts.status', 1)
          ->where('import_parts.store_branch_id',$request->get_store_branch_id)
          ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
          ->get();
            $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$result['0']['name'],'chk_get'=>0];
          }
          else{
            $result = ListPart::where('list_parts.status', 1)
            ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
            ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>'ร้านทั้งหมด','chk_get'=>0];
          }

        }
        elseif($s_type==2||$s_type==3){
          $store_branch = StoreBranch::where('status', 1)
          ->where('id',$s_store_branch_id)
          ->get();

          $result = ListPart::where('list_parts.status', 1)
          ->where('import_parts.store_branch_id',$s_store_branch_id)
          ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
          ->get();
          $data =['s_type'=>$s_type,'chk'=>$request->chk,'chk_name'=>$store_branch['0']['name']];
        }

          $store_branch = StoreBranch::where('status', 1)
          ->get();

          
          return view('report/report-detail',['result'=>$result,'store_branch'=>$store_branch],$data);
       }
      else{
        echo 'n';exit;
      }
      
    }
    public function get_report_list() {
      $s_type=session('s_type','default');
      if($s_type==1 || $s_type==2 || $s_type==3){
          $results = Persons::where('status', 1)
          ->get();
          $gender_employee = $this->count_gender_employee($results);

          $results2 = PersonsMember::where('persons_member.status', 1)
          ->get();
          // echo $results2;exit();
          $gender_member = $this->count_gender_member($results2);

          $results3 = StoreBranch::all();
          $store_branch = $this->count_store_branch($results3);

          $results4 = Repair::where('status',1)
          ->get();
          $repair = $this->count_repair($results4);

          $results5 = ImportPart::where('status',1)
          ->get();
          $parts = $this->count_parts($results5);

          $data =[
          'countmale_em' => $gender_employee['countmale'],
          'countfemale_em' => $gender_employee['countfemale'],
          'countundefine_em' => $gender_employee['countundefine'],
          'countgernderall_em' => $gender_employee['countgernderall'],

          'countmale_me' => $gender_member['countmale'],
          'countfemale_me' => $gender_member['countfemale'],
          'countundefine_me' => $gender_member['countundefine'],
          'countgernderall_me' => $gender_member['countgernderall'],

          'countopen_st' => $store_branch['countopen'],
          'countclose_st' => $store_branch['countclose'],
          'countall_st' => $store_branch['countstoreall'],

          'countmember_re' => $repair['countmember'],
          'countgeneral_re' => $repair['countgeneral'],
          'countall_re' => $repair['countrepairall'],

          'countlot_pa' => $parts['countpartlittle'],
          'countall_pa' => $parts['countpartsall'],
          'countlittle_pa' => $parts['countpartlittle'],
          ];
          // echo $data['countmale'];exit();
          
          return view('report/report-list',$data);
      }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }

     
    }

        ////////////////count gender male female undifind employee/////////////////////////
        public function count_gender_employee($results) {
          foreach ($results as $value) {
            $results['countmale'] = $this->countmale_employee($value['id']);
            $results['countfemale'] = $this->countfemale_employee($value['id']);
            $results['countundefine'] = $this->countundefine_employee($value['id']);
            // $results[$key]['countfemaleal'] = $this->countfemaleall();
            // print_r($results[$key]['countfemale']);exit();
          }
          $results['countgernderall']=$results['countmale']+$results['countfemale']+$results['countundefine'];
          // echo $results['countgernderall'];exit();
          return $results;
        }
        public function countmale_employee($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
          $results = Persons::where('persons.status', 1)
          ->where('persons.type', 3)
          ->where('persons.gender', 1)
          ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results = Persons::where('persons.status', 1)
            ->where('persons.store_branch_id', $s_store_branch_id)
            ->where('persons.type', 3)
            ->where('persons.gender', 1)
            ->count();
            }
         return $results;
        }
        public function countfemale_employee($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
          $results = Persons::where('persons.status', 1)
          ->where('persons.type', 3)
          ->where('persons.gender', 2)
          ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results = Persons::where('persons.status', 1)
            ->where('persons.store_branch_id', $s_store_branch_id)
            ->where('persons.type', 3)
            ->where('persons.gender', 2)
            ->count();
            }
          return $results;
        }
        public function countundefine_employee($id) {
          $results = Persons::where('persons.status', 1)
          ->where('persons.type', 3)
          ->where('persons.gender',null)
          ->count();
          return $results;
        }
    /////////////////////////////////////end/////////////////////////////////
  
      ////////////////count gender male female undifind member/////////////////////////
      public function count_gender_member($results2) {
        foreach ($results2 as $value) {
          $results2['countmale'] = $this->countmale_member($value['id']);
          $results2['countfemale'] = $this->countfemale_member($value['id']);
          $results2['countundefine'] = $this->countundefine_member($value['id']);
          // $results[$key]['countfemaleal'] = $this->countfemaleall();
          // print_r($results[$key]['countfemale']);exit();
        }
        $results2['countgernderall']=$results2['countmale']+$results2['countfemale']+$results2['countundefine'];

        return $results2;
      }
      public function countmale_member($id) {
        $results2 = PersonsMember::where('persons_member.status', 1)
        ->where('persons_member.type', 4)
        ->where('persons_member.gender', 1)
        ->count();
        return $results2;
      }
      public function countfemale_member($id) {
        $results2 = PersonsMember::where('persons_member.status', 1)
        ->where('persons_member.type', 4)
        ->where('persons_member.gender', 0)
        ->count();
        return $results2;
      }
      public function countundefine_member($id) {
        $results2 = PersonsMember::where('persons_member.status', 1)
        ->where('persons_member.type', 4)
        ->where('persons_member.gender',null)
        ->count();
        return $results2;
      }
      /////////////////////////////////////end/////////////////////////////////

      ////////////////count open close storebranch/////////////////////////
      public function count_store_branch($results3) {
        foreach ($results3 as $value) {
          $results3['countopen'] = $this->count_open_store_branch($value['id']);
          $results3['countclose'] = $this->count_close_store_branch($value['id']);
          // $results[$key]['countfemaleal'] = $this->countfemaleall();
          // print_r($results[$key]['countfemale']);exit();
        }
        $results3['countstoreall']=$results3['countopen']+$results3['countclose'];

        return $results3;
      }
      public function count_open_store_branch($id) {
        $results3 = StoreBranch::where('store_branch.status', 1)
        ->count();
        return $results3;
      }
      public function count_close_store_branch($id) {
        $results3 = StoreBranch::where('store_branch.status', 0)
        ->count();
        return $results3;
      }

      /////////////////////////////////////end/////////////////////////////////

          ////////////////count member general repair/////////////////////////
          public function count_repair($results4) {
            foreach ($results4 as $value) {
              $results4['countmember'] = $this->count_repair_member($value['id']);
              $results4['countgeneral'] = $this->count_repair_general($value['id']);
            }
            $results4['countrepairall']=$results4['countmember']+$results4['countgeneral'];
 
            return $results4;
          }
          public function count_repair_member($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
            $results4 = Repair::where('repair.status', 1)
            ->where('persons_member_id','!=',NULL)
            ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results4 = Repair::where('repair.status', 1)
            ->where('persons_member_id','!=',NULL)
            ->where('store_branch_id',$s_store_branch_id)
            ->count();
            }
            return $results4;
          }
          public function count_repair_general($id) {
            $s_type=session('s_type','default');
            $s_store_branch_id=session('s_store_branch_id','default');
            if($s_type==1){
              $results4 = Repair::where('repair.status', 1)
              ->where('persons_member_id','=',NULL)
              ->count();
            }
            elseif($s_type==2||$s_type==3){
              $results4 = Repair::where('repair.status', 1)
              ->where('persons_member_id','=',NULL)
              ->where('store_branch_id',$s_store_branch_id)
              ->count();
              }
              return $results4;
          }
    
          /////////////////////////////////////end/////////////////////////////////

           ////////////////count member general repair/////////////////////////
           public function count_parts($results5) {
            foreach ($results5 as $value) {
              $results5['countlotparts'] = $this->count_lot_parts($value['id']);
              $results5['countpartsall'] = $this->count_list_part_all($value['id']);
              $results5['countpartlittle'] = $this->count_list_part_little($value['id']);
            }
            // $results4['countrepairall']=$results4['countmember']+$results4['countgeneral'];
 
            return $results5;
          }

          public function count_lot_parts($id) {
            $s_type=session('s_type','default');
            $s_store_branch_id=session('s_store_branch_id','default');
            if($s_type==1){
              $results5 = ImportPart::where('import_parts.status', 1)
              ->count();
            }
            elseif($s_type==2||$s_type==3){
              $results5 = ImportPart::where('import_parts.status', 1)
              ->where('import_parts.store_branch_id',$s_store_branch_id)
              ->count();
              }
              return $results5;
            }

          public function count_list_part_all($id) {
          $s_type=session('s_type','default');
          $s_store_branch_id=session('s_store_branch_id','default');
          if($s_type==1){
            $results5 = ListPart::where('list_parts.status', 1)
            ->count();
          }
          elseif($s_type==2||$s_type==3){
            $results5 = ListPart::where('list_parts.status', 1)
            ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
            ->where('import_parts.store_branch_id',$s_store_branch_id)
            ->count();
            }
            return $results5;
          }

          public function count_list_part_little($id) {
            $s_type=session('s_type','default');
            $s_store_branch_id=session('s_store_branch_id','default');
            if($s_type==1){
              $results5 = ListPart::where('list_parts.status', 1)
              ->where('list_parts.number','<=',5)
              ->count();
            }
            elseif($s_type==2||$s_type==3){
              $results5 = ListPart::where('list_parts.status', 1)
              ->leftJoin('import_parts', 'import_parts.id', '=', 'list_parts.import_parts_id')
              ->where('import_parts.store_branch_id',$s_store_branch_id)
              ->where('list_parts.number','<=',5)
              ->count();
              }
              return $results5;
            }
    
          /////////////////////////////////////end/////////////////////////////////
}
