<?php

namespace App\Http\Controllers;

use App\Persons;
use App\Store_branch;
use Illuminate\Http\Request;

class DashboardController extends Controller
{    
    // public function get_male() {
    //   $persons = Persons::where('status', 1)
    //   ->get();     
    //    $data = [
    //     'name1' => "notter1", 
    //     'name2' => "notter2",
    //     'name3' => "notter3",
    //     'num1' => 10,
    //     'num2' => 20,
    //     'num3' => 25,       
    //   ];
    //   // $persons = $this->get_status_name($persons);

    //   // print_r($go);exit();
    //   return view('dashboard/dashboard', ['persons' => $persons],$data);
    // }
    // public function get_status_name()
    // {
    //   // foreach ($persons as $key => $value) {
    //     $persons['status_name'] = ($value['gender']);
    //     // $count = $this->count_gender_by_gender_id($value['id']);
    //   // }

    //   // return $persons;
    // }
    // private function count_gender_by_gender_id($gender)
    // {
    //     $results = Person::where('Person.status', 1)
    //         ->where('Person.gender', 1)
    //         ->count();

    //     return $results;
    // }
   

    // private $response = array('status'=>1,'message' => 'success');
    // private $path = 'images/alumni/';
  
    // public function country_summary_all() {
    //   $results = Country::where('AddressCountry.status', 1)
    //   ->limit(1)
    //   ->get();
    //   foreach ($results as $key => $value) {
    //     $results[$key]['countmaleall'] = $this->countmaleall();
    //     $results[$key]['countfemaleall'] = $this->countfemaleall();
    //     $results[$key]['countcountryall'] = $this->countcountryall();
    //     $results[$key]['countundefineall'] = $this->countundefineall();
  
    //   }
    //   return response()->json($results);
    // }
    public function count_male() {
      $results = Persons::where('persons.status', 1)
      ->get();
      foreach ($results as $value) {
        $results['countmale'] = $this->countmale($value['id']);
        $results['countfemale'] = $this->countfemale($value['id']);
        $results['countundefine'] = $this->countundefine($value['id']);
        // $results[$key]['countfemaleal'] = $this->countfemaleall();
        // print_r($results[$key]['countfemale']);exit();
      }
      // $data = [
      //       'male' => "Male", 
      //       'female' => "Female",
      //       'undefine' => "Undefine",
      //       'countmale' =>  $results['countmale'],
      //       'countfemale' => $results['countfemale'],
      //       'countundefine' => $results['countundefine'],       
      //     ];
      // return response()->json($results);
      // print_r($results['countmale']);exit();
      return view('dashboard/dashboard',$results);
    }
  
    // public function countcountry($id) {
    //   $results = Person::where('Person.personStatus', 1)
    //   ->where('Person.nationalityAddressCountryId', $id)
    //   ->count();
    //   return $results;
    // }
    // public function countcountryall() {
    //   $results = Person::where('Person.personStatus', 1)
    //   ->where('Person.nationalityAddressCountryId','>',0)
    //   ->count();
    //   return $results;
    //   // return response()->json($value);
    // }
    public function countmale($id) {
      $results = Persons::where('persons.status', 1)
      ->where('persons.gender', 1)
      ->count();
      return $results;
    }
    public function countfemale($id) {
      $results = Persons::where('persons.status', 1)
      ->where('persons.gender', 0)
      ->count();
      return $results;
    }
    public function countundefine($id) {
      $results = Persons::where('persons.status', 1)
      ->where('persons.gender',null)
      ->count();
      return $results;
    }
    // public function countmaleall() {
    //   $results = Person::where('Person.personStatus', 1)
    //   ->where('Person.gender', 1)
    //   ->count();
    //   return $results;
    // }
    // public function countfemaleall() {
    //   $results = Person::where('Person.personStatus', 1)
    //   ->where('Person.gender', 0)
    //   ->count();
    //   return $results;
    // }
    // public function countundefineall() {
    //   $results = Person::where('Person.personStatus', 1)
    //   ->where('Person.gender',null)
    //   ->count();
    //   return $results;
    // }
    



}
