<?php

namespace App\Http\Controllers;

use App\QuestionPost;
use App\AnswerPost;

use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;

class FontBoardPostsController extends Controller
{    

  //หน้าค้ำถาม
  //chk_status_show=0 ดึงเฉยๆ
    //chk_status_show=1 ตั้งกระทู้
      //chk_status_show=2 แก้ไขกระทู้
        //chk_status_show=3 ลบกระทู้

  //หน้าคำตอบ
    //chk_status_show=0 ดึงเฉยๆ
    //chk_status_show=1 ตอบกระทู้
      //chk_status_show=2 แก้ไขกระทู้คำถามในหน้าคำตอบ
        //chk_status_show=3 ลบกระทู้คำถามในหน้าคำตอบ ตัวนี้จะใช้ฟังชั่นเดียวกับหน้าคำถาม
          //chk_status_show=4 แก้ไขกระทู้คำตอบ
            //chk_status_show=5 ลบกระทู้คำตอบ
    public function get_question_post(Request $request) {
      if($request['chk_get']=='all'){
          $s_id=session('s_id','default');
          $items = [// get คนถาม
            'persons_member.id as pm_id'
            ,'persons_member.name as member_name'
            ,'persons_member.type as member_type'
            ,'persons_member.image_url as member_image_url'
    
            , 'persons.id as p_id'
            , 'persons.name as person_name'
            , 'persons.image_url as person_image_url'
            , 'persons.type as person_type'
    
            , 'question_posts.id as id'
            , 'question_posts.persons_member_id as persons_member_id'
            , 'question_posts.persons_id as persons_id'
            , 'question_posts.topic as topic'
            , 'question_posts.message as message'
            , 'question_posts.created_at as created_at'
            , 'question_posts.updated_at as updated_at'
        ];
          $question_posts = QuestionPost::where('question_posts.status',1)
          ->orderBy('question_posts.id','desc')
          ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
          ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
          ->get($items);
          // echo $question_posts;exit();
          foreach($question_posts as $key=>$value)
          {
                if($question_posts[$key]['pm_id']!=NULL)
                {
                  $question_posts[$key]['is_name']=$value['member_name'];
                  $question_posts[$key]['is_type']=$value['member_type'];
                  $question_posts[$key]['is_image_url']=$value['member_image_url'];
                }
                else if($question_posts[$key]['p_id']!=NULL)
                {
                  $question_posts[$key]['is_name']=$value['person_name'];
                  $question_posts[$key]['is_type']=$value['person_type'];
                  $question_posts[$key]['is_image_url']=$value['person_image_url'];
                }
          }
          // echo $question_posts;exit();
          $date = new CallUseController();
          $question_posts = $date->get_date_all($question_posts,'created','created_at');
          $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
    
          $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
          $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
          // echo $question_posts;exit();
          $data = [
            's_id'=>$s_id,
            'chk_get'=>$request['chk_get'],
            'chk_status_show'=>0,
          ];
      }
      elseif($request['chk_get']=='only'){
        // exit();
        $s_id=session('s_id','default');
        $items = [// get คนถาม
          'persons_member.id as pm_id'
          ,'persons_member.name as member_name'
          ,'persons_member.type as member_type'
          ,'persons_member.image_url as member_image_url'
  
          , 'persons.id as p_id'
          , 'persons.name as person_name'
          , 'persons.image_url as person_image_url'
          , 'persons.type as person_type'
  
          , 'question_posts.id as id'
          , 'question_posts.persons_id as persons_id'
          , 'question_posts.persons_member_id as persons_member_id'
          , 'question_posts.topic as topic'
          , 'question_posts.message as message'
          , 'question_posts.created_at as created_at'
          , 'question_posts.updated_at as updated_at'
      ];
        $question_posts = QuestionPost::where('question_posts.status',1)
        ->where('question_posts.persons_member_id',$s_id)
        ->orderBy('question_posts.id','desc')
        ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
        ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
        ->get($items);
        // echo $question_posts;exit();
        foreach($question_posts as $key=>$value)
        {
              if($question_posts[$key]['pm_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['member_name'];
                $question_posts[$key]['is_type']=$value['member_type'];
                $question_posts[$key]['is_image_url']=$value['member_image_url'];
              }
              else if($question_posts[$key]['p_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['person_name'];
                $question_posts[$key]['is_type']=$value['person_type'];
                $question_posts[$key]['is_image_url']=$value['person_image_url'];
              }
        }
        // echo $question_posts;exit();
        $date = new CallUseController();
        $question_posts = $date->get_date_all($question_posts,'created','created_at');
        $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
  
        $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
        $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
        // echo $question_posts;exit();
        $data = [
          's_id'=>$s_id,
          'chk_get'=>$request['chk_get'],
          'chk_status_show'=>0,
        ];
      }
      // return view('board/question_post', ['question_posts' => $question_posts],$data);
      return view('font_pages/board-question', ['question_posts' => $question_posts],$data);
      // echo $question_posts;exit();
      
    }
    
  public function create_question_post(Request $request)
    { 
      // echo $request;exit();
        $s_store_branch_id=session('s_store_branch_id','default');
        $s_type=session('s_type','default');
        $s_id=session('s_id','default');
        // echo $s_id;exit();
        $question_posts = new QuestionPost;
        // $question_posts->store_branch_id = $s_store_branch_id;
          if($s_type==4){
          $question_posts->persons_member_id = $s_id;
          }
        $question_posts->topic = $request->topic;
        $question_posts->message = $request->message;
        $question_posts->status = true;
        $question_posts->save();
        // $request->session()->flash('status_create', 'ตั้งกระทู้เรียบร้อยแล้ว');
        
        // return redirect('questtion-post');
        if($request['chk_get']=='all'){
          $s_id=session('s_id','default');
          $items = [// get คนถาม
            'persons_member.id as pm_id'
            ,'persons_member.name as member_name'
            ,'persons_member.type as member_type'
            ,'persons_member.image_url as member_image_url'
    
            , 'persons.id as p_id'
            , 'persons.name as person_name'
            , 'persons.image_url as person_image_url'
            , 'persons.type as person_type'
    
            , 'question_posts.id as id'
            , 'question_posts.persons_member_id as persons_member_id'
            , 'question_posts.persons_id as persons_id'
            , 'question_posts.topic as topic'
            , 'question_posts.message as message'
            , 'question_posts.created_at as created_at'
            , 'question_posts.updated_at as updated_at'
        ];
          $question_posts = QuestionPost::where('question_posts.status',1)
          ->orderBy('question_posts.id','desc')
          ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
          ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
          ->get($items);
          // echo $question_posts;exit();
          foreach($question_posts as $key=>$value)
          {
                if($question_posts[$key]['pm_id']!=NULL)
                {
                  $question_posts[$key]['is_name']=$value['member_name'];
                  $question_posts[$key]['is_type']=$value['member_type'];
                  $question_posts[$key]['is_image_url']=$value['member_image_url'];
                }
                else if($question_posts[$key]['p_id']!=NULL)
                {
                  $question_posts[$key]['is_name']=$value['person_name'];
                  $question_posts[$key]['is_type']=$value['person_type'];
                  $question_posts[$key]['is_image_url']=$value['person_image_url'];
                }
          }
          // echo $question_posts;exit();
          $date = new CallUseController();
          $question_posts = $date->get_date_all($question_posts,'created','created_at');
          $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
    
          $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
          $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
          // echo $question_posts;exit();
          $data = [
            's_id'=>$s_id,
            'chk_get'=>$request['chk_get'],
            'chk_status_show'=>1,
          ];
      }
      elseif($request['chk_get']=='only'){
        // exit();
        $s_id=session('s_id','default');
        $items = [// get คนถาม
          'persons_member.id as pm_id'
          ,'persons_member.name as member_name'
          ,'persons_member.type as member_type'
          ,'persons_member.image_url as member_image_url'
  
          , 'persons.id as p_id'
          , 'persons.name as person_name'
          , 'persons.image_url as person_image_url'
          , 'persons.type as person_type'
  
          , 'question_posts.id as id'
          , 'question_posts.persons_id as persons_id'
          , 'question_posts.persons_member_id as persons_member_id'
          , 'question_posts.topic as topic'
          , 'question_posts.message as message'
          , 'question_posts.created_at as created_at'
          , 'question_posts.updated_at as updated_at'
      ];
        $question_posts = QuestionPost::where('question_posts.status',1)
        ->where('question_posts.persons_member_id',$s_id)
        ->orderBy('question_posts.id','desc')
        ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
        ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
        ->get($items);
        // echo $question_posts;exit();
        foreach($question_posts as $key=>$value)
        {
              if($question_posts[$key]['pm_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['member_name'];
                $question_posts[$key]['is_type']=$value['member_type'];
                $question_posts[$key]['is_image_url']=$value['member_image_url'];
              }
              else if($question_posts[$key]['p_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['person_name'];
                $question_posts[$key]['is_type']=$value['person_type'];
                $question_posts[$key]['is_image_url']=$value['person_image_url'];
              }
        }
        // echo $question_posts;exit();
        $date = new CallUseController();
        $question_posts = $date->get_date_all($question_posts,'created','created_at');
        $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
  
        $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
        $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
        // echo $question_posts;exit();
        $data = [
          's_id'=>$s_id,
          'chk_get'=>$request['chk_get'],
          'chk_status_show'=>1,
        ];
      }


      return view('font_pages/board-question', ['question_posts' => $question_posts],$data);
    }

    public function edit_question_post(Request $request)
    { 
      // echo $request;exit();
        $s_store_branch_id=session('s_store_branch_id','default');
        $s_type=session('s_type','default');
        $s_id=session('s_id','default');
        // echo $s_id;exit();
        $question_posts =  QuestionPost::find($request->id);
        // $question_posts->store_branch_id = $s_store_branch_id;
        if($s_type==4){
          $question_posts->persons_member_id = $s_id;
          }
        $question_posts->topic = $request->topic;
        $question_posts->message = $request->message2;//message2
        $question_posts->status = true;
        $question_posts->save();
        // $request->session()->flash('status_edit', 'แก้ไขกระทู้เรียบร้อยแล้ว');
        
        // return redirect('questtion-post');
                // return redirect('questtion-post');
                if($request['chk_get']=='all'){
                  $s_id=session('s_id','default');
                  $items = [// get คนถาม
                    'persons_member.id as pm_id'
                    ,'persons_member.name as member_name'
                    ,'persons_member.type as member_type'
                    ,'persons_member.image_url as member_image_url'
            
                    , 'persons.id as p_id'
                    , 'persons.name as person_name'
                    , 'persons.image_url as person_image_url'
                    , 'persons.type as person_type'
            
                    , 'question_posts.id as id'
                    , 'question_posts.persons_member_id as persons_member_id'
                    , 'question_posts.persons_id as persons_id'
                    , 'question_posts.topic as topic'
                    , 'question_posts.message as message'
                    , 'question_posts.created_at as created_at'
                    , 'question_posts.updated_at as updated_at'
                ];
                  $question_posts = QuestionPost::where('question_posts.status',1)
                  ->orderBy('question_posts.id','desc')
                  ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
                  ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
                  ->get($items);
                  // echo $question_posts;exit();
                  foreach($question_posts as $key=>$value)
                  {
                        if($question_posts[$key]['pm_id']!=NULL)
                        {
                          $question_posts[$key]['is_name']=$value['member_name'];
                          $question_posts[$key]['is_type']=$value['member_type'];
                          $question_posts[$key]['is_image_url']=$value['member_image_url'];
                        }
                        else if($question_posts[$key]['p_id']!=NULL)
                        {
                          $question_posts[$key]['is_name']=$value['person_name'];
                          $question_posts[$key]['is_type']=$value['person_type'];
                          $question_posts[$key]['is_image_url']=$value['person_image_url'];
                        }
                  }
                  // echo $question_posts;exit();
                  $date = new CallUseController();
                  $question_posts = $date->get_date_all($question_posts,'created','created_at');
                  $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
            
                  $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
                  $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
                  // echo $question_posts;exit();
                  $data = [
                    's_id'=>$s_id,
                    'chk_get'=>$request['chk_get'],
                    'chk_status_show'=>2,
                  ];
              }
              elseif($request['chk_get']=='only'){
                // exit();
                $s_id=session('s_id','default');
                $items = [// get คนถาม
                  'persons_member.id as pm_id'
                  ,'persons_member.name as member_name'
                  ,'persons_member.type as member_type'
                  ,'persons_member.image_url as member_image_url'
          
                  , 'persons.id as p_id'
                  , 'persons.name as person_name'
                  , 'persons.image_url as person_image_url'
                  , 'persons.type as person_type'
          
                  , 'question_posts.id as id'
                  , 'question_posts.persons_id as persons_id'
                  , 'question_posts.persons_member_id as persons_member_id'
                  , 'question_posts.topic as topic'
                  , 'question_posts.message as message'
                  , 'question_posts.created_at as created_at'
                  , 'question_posts.updated_at as updated_at'
              ];
                $question_posts = QuestionPost::where('question_posts.status',1)
                ->where('question_posts.persons_member_id',$s_id)
                ->orderBy('question_posts.id','desc')
                ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
                ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
                ->get($items);
                // echo $question_posts;exit();
                foreach($question_posts as $key=>$value)
                {
                      if($question_posts[$key]['pm_id']!=NULL)
                      {
                        $question_posts[$key]['is_name']=$value['member_name'];
                        $question_posts[$key]['is_type']=$value['member_type'];
                        $question_posts[$key]['is_image_url']=$value['member_image_url'];
                      }
                      else if($question_posts[$key]['p_id']!=NULL)
                      {
                        $question_posts[$key]['is_name']=$value['person_name'];
                        $question_posts[$key]['is_type']=$value['person_type'];
                        $question_posts[$key]['is_image_url']=$value['person_image_url'];
                      }
                }
                // echo $question_posts;exit();
                $date = new CallUseController();
                $question_posts = $date->get_date_all($question_posts,'created','created_at');
                $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
          
                $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
                $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
                // echo $question_posts;exit();
                $data = [
                  's_id'=>$s_id,
                  'chk_get'=>$request['chk_get'],
                  'chk_status_show'=>2,
                ];
              }

      return view('font_pages/board-question', ['question_posts' => $question_posts],$data);
    }    
    public function delete_question_post(Request $request)
    { 
        $question_posts = QuestionPost::find($request->id);
        $question_posts->status = 0;
        $question_posts->save();
        // $request->session()->flash('status_delete', 'ลบกระทู้เรียบร้อยแล้ว');
        
        // return redirect('questtion-post');
              // return redirect('questtion-post');
              if($request['chk_get']=='all'){
                $s_id=session('s_id','default');
                $items = [// get คนถาม
                  'persons_member.id as pm_id'
                  ,'persons_member.name as member_name'
                  ,'persons_member.type as member_type'
                  ,'persons_member.image_url as member_image_url'
          
                  , 'persons.id as p_id'
                  , 'persons.name as person_name'
                  , 'persons.image_url as person_image_url'
                  , 'persons.type as person_type'
          
                  , 'question_posts.id as id'
                  , 'question_posts.persons_member_id as persons_member_id'
                  , 'question_posts.persons_id as persons_id'
                  , 'question_posts.topic as topic'
                  , 'question_posts.message as message'
                  , 'question_posts.created_at as created_at'
                  , 'question_posts.updated_at as updated_at'
              ];
                $question_posts = QuestionPost::where('question_posts.status',1)
                ->orderBy('question_posts.id','desc')
                ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
                ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
                ->get($items);
                // echo $question_posts;exit();
                foreach($question_posts as $key=>$value)
                {
                      if($question_posts[$key]['pm_id']!=NULL)
                      {
                        $question_posts[$key]['is_name']=$value['member_name'];
                        $question_posts[$key]['is_type']=$value['member_type'];
                        $question_posts[$key]['is_image_url']=$value['member_image_url'];
                      }
                      else if($question_posts[$key]['p_id']!=NULL)
                      {
                        $question_posts[$key]['is_name']=$value['person_name'];
                        $question_posts[$key]['is_type']=$value['person_type'];
                        $question_posts[$key]['is_image_url']=$value['person_image_url'];
                      }
                }
                // echo $question_posts;exit();
                $date = new CallUseController();
                $question_posts = $date->get_date_all($question_posts,'created','created_at');
                $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
          
                $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
                $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
                // echo $question_posts;exit();
                $data = [
                  's_id'=>$s_id,
                  'chk_get'=>$request['chk_get'],
                  'chk_status_show'=>3,
                ];
            }
            elseif($request['chk_get']=='only'){
              // exit();
              $s_id=session('s_id','default');
              $items = [// get คนถาม
                'persons_member.id as pm_id'
                ,'persons_member.name as member_name'
                ,'persons_member.type as member_type'
                ,'persons_member.image_url as member_image_url'
        
                , 'persons.id as p_id'
                , 'persons.name as person_name'
                , 'persons.image_url as person_image_url'
                , 'persons.type as person_type'
        
                , 'question_posts.id as id'
                , 'question_posts.persons_id as persons_id'
                , 'question_posts.persons_member_id as persons_member_id'
                , 'question_posts.topic as topic'
                , 'question_posts.message as message'
                , 'question_posts.created_at as created_at'
                , 'question_posts.updated_at as updated_at'
            ];
              $question_posts = QuestionPost::where('question_posts.status',1)
              ->where('question_posts.persons_member_id',$s_id)
              ->orderBy('question_posts.id','desc')
              ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
              ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
              ->get($items);
              // echo $question_posts;exit();
              foreach($question_posts as $key=>$value)
              {
                    if($question_posts[$key]['pm_id']!=NULL)
                    {
                      $question_posts[$key]['is_name']=$value['member_name'];
                      $question_posts[$key]['is_type']=$value['member_type'];
                      $question_posts[$key]['is_image_url']=$value['member_image_url'];
                    }
                    else if($question_posts[$key]['p_id']!=NULL)
                    {
                      $question_posts[$key]['is_name']=$value['person_name'];
                      $question_posts[$key]['is_type']=$value['person_type'];
                      $question_posts[$key]['is_image_url']=$value['person_image_url'];
                    }
              }
              // echo $question_posts;exit();
              $date = new CallUseController();
              $question_posts = $date->get_date_all($question_posts,'created','created_at');
              $question_posts = $date->get_time_all($question_posts,'time_created','created_at');
        
              $question_posts = $date->get_date_all($question_posts,'updated','updated_at');
              $question_posts = $date->get_time_all($question_posts,'time_updated','updated_at');
              // echo $question_posts;exit();
              $data = [
                's_id'=>$s_id,
                'chk_get'=>$request['chk_get'],
                'chk_status_show'=>3,
              ];
            }
      
      return view('font_pages/board-question', ['question_posts' => $question_posts],$data);
    }
    public function edit_question_post_from_answer(Request $request)
    { 
      // echo $request;exit();
        $s_store_branch_id=session('s_store_branch_id','default');
        $s_type=session('s_type','default');
        $s_id=session('s_id','default');
        // echo $s_id;exit();
        $question_posts =  QuestionPost::find($request->id);
        // $question_posts->store_branch_id = $s_store_branch_id;
        if($s_type==4){
          $question_posts->persons_member_id = $s_id;
          }
        $question_posts->topic = $request->topic;
        $question_posts->message = $request->message2;//message2
        $question_posts->status = true;
        $question_posts->save();
        // $question_posts->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');

        $s_id=session('s_id','default');
        $items = [// get คนถาม  อันนี้แค่เรียกค่าให้เหมือนฟังชั่นล่าง
          'persons_member.id as pm_id'
          ,'persons_member.name as member_name'
          ,'persons_member.type as member_type'
          ,'persons_member.image_url as member_image_url'
  
          , 'persons.id as p_id'
          , 'persons.name as person_name'
          , 'persons.image_url as person_image_url'
          , 'persons.type as person_type'
  
          , 'question_posts.id as q_id'
          , 'question_posts.topic as topic'
          , 'question_posts.message as message'
          , 'question_posts.created_at as created_at'
          , 'question_posts.updated_at as updated_at'
      ];
        $question_posts = QuestionPost::where('question_posts.status',1)
        ->where('question_posts.id',$request->id)
        ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
        ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
        ->get($items);
        
        foreach($question_posts as $key=>$value)
        {
              if($question_posts[$key]['pm_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['member_name'];
                $question_posts[$key]['is_type']=$value['member_type'];
                $question_posts[$key]['is_image_url']=$value['member_image_url'];
              }
              else if($question_posts[$key]['p_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['person_name'];
                $question_posts[$key]['is_type']=$value['person_type'];
                $question_posts[$key]['is_image_url']=$value['person_image_url'];
              }
        }
        // echo $question_posts;exit();
        $date = new CallUseController();
        $question_posts = $date->get_date_only($question_posts,'created','created_at');
        $question_posts = $date->get_time_only($question_posts,'time_created','created_at');
  
        $question_posts = $date->get_date_only($question_posts,'updated','updated_at');
        $question_posts = $date->get_time_only($question_posts,'time_updated','updated_at');
        // echo $question_posts;exit();
        $data = [
          'person_name' => $question_posts['0']['is_name'],
          'person_type' => $question_posts['0']['is_type'],
          'person_image_url' => $question_posts['0']['is_image_url'],
  
          'question_posts_id' => $question_posts['0']['q_id'],
          'question_posts_topic' => $question_posts['0']['topic'],
          'question_posts_message' => $question_posts['0']['message'],
          'created' => $question_posts['created'],
          'time_created' => $question_posts['time_created'],
          'updated' => $question_posts['updated'],
          'time_updated' => $question_posts['time_updated'],
  
          's_id_from_question'=>$request->s_id,
          's_id'=>$s_id,
          'chk_get'=>$request['chk_get'],
          'chk_status_show'=>2,
        ];
        $ansewr_posts = $this->get_answer_posts($question_posts['0']['q_id']);
        // echo $ansewr_posts;exit();
        return view('font_pages/board-answer', ['ansewr_posts' => $ansewr_posts],$data);
    }


    public function form_get_answer_post(Request $request) {
      $s_id=session('s_id','default');
      // $question_posts = QuestionPost::find($request->id);

      $items = [// get คนถาม
        'persons_member.id as pm_id'
        ,'persons_member.name as member_name'
        ,'persons_member.type as member_type'
        ,'persons_member.image_url as member_image_url'

        , 'persons.id as p_id'
        , 'persons.name as person_name'
        , 'persons.image_url as person_image_url'
        , 'persons.type as person_type'

        , 'question_posts.id as q_id'
        , 'question_posts.topic as topic'
        , 'question_posts.message as message'
        , 'question_posts.created_at as created_at'
        , 'question_posts.updated_at as updated_at'
    ];
      $question_posts = QuestionPost::where('question_posts.status',1)
      ->where('question_posts.id',$request->id)
      ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
      ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
      ->get($items);
      
      foreach($question_posts as $key=>$value)
      {
            if($question_posts[$key]['pm_id']!=NULL)
            {
              $question_posts[$key]['is_name']=$value['member_name'];
              $question_posts[$key]['is_type']=$value['member_type'];
              $question_posts[$key]['is_image_url']=$value['member_image_url'];
            }
            else if($question_posts[$key]['p_id']!=NULL)
            {
              $question_posts[$key]['is_name']=$value['person_name'];
              $question_posts[$key]['is_type']=$value['person_type'];
              $question_posts[$key]['is_image_url']=$value['person_image_url'];
              // echo $question_posts;exit();
            }
      }
      // echo $question_posts;exit();/
      $date = new CallUseController();
      $question_posts = $date->get_date_only($question_posts,'created','created_at');
      $question_posts = $date->get_time_only($question_posts,'time_created','created_at');

      $question_posts = $date->get_date_only($question_posts,'updated','updated_at');
      $question_posts = $date->get_time_only($question_posts,'time_updated','updated_at');
      // echo $question_posts;exit();
      $data = [
        'person_name' => $question_posts['0']['is_name'],
        'person_type' => $question_posts['0']['is_type'],
        'person_image_url' => $question_posts['0']['is_image_url'],

        'question_posts_id' => $question_posts['0']['q_id'],
        'question_posts_topic' => $question_posts['0']['topic'],
        'question_posts_message' => $question_posts['0']['message'],
        'created' => $question_posts['created'],
        'time_created' => $question_posts['time_created'],
        'updated' => $question_posts['updated'],
        'time_updated' => $question_posts['time_updated'],

        's_id_from_question'=>$request->s_id,
        's_id'=>$s_id,
        'chk_get'=>$request['chk_get'],
        'chk_status_show'=>0,
      ];
      $ansewr_posts = $this->get_answer_posts($question_posts['0']['q_id']);
      // echo $ansewr_posts;exit();
      return view('font_pages/board-answer', ['ansewr_posts' => $ansewr_posts],$data);
    }

    public function create_answer_post(Request $request)
    { 
      $s_id=session('s_id','default');
      $s_type=session('s_type','default');
      // echo $request;exit();
        $answer_posts = new AnswerPost;
        if($s_type==4){
          $answer_posts->persons_member_id = $s_id;
        }
        $answer_posts->question_posts_id = $request->question_id;
        $answer_posts->message = $request->message;
        $answer_posts->status = true;
        $answer_posts->save();
        // $question_posts->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');

        $items = [// get คนถาม
          'persons_member.id as pm_id'
          ,'persons_member.name as member_name'
          ,'persons_member.type as member_type'
          ,'persons_member.image_url as member_image_url'
  
          , 'persons.id as p_id'
          , 'persons.name as person_name'
          , 'persons.image_url as person_image_url'
          , 'persons.type as person_type'
  
          , 'question_posts.id as q_id'
          , 'question_posts.topic as topic'
          , 'question_posts.message as message'
          , 'question_posts.created_at as created_at'
          , 'question_posts.updated_at as updated_at'
      ];
        $question_posts = QuestionPost::where('question_posts.status',1)
        ->where('question_posts.id',$request->question_id)
        ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
        ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
        ->get($items);
        
        foreach($question_posts as $key=>$value)
        {
              if($question_posts[$key]['pm_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['member_name'];
                $question_posts[$key]['is_type']=$value['member_type'];
                $question_posts[$key]['is_image_url']=$value['member_image_url'];
              }
              else if($question_posts[$key]['p_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['person_name'];
                $question_posts[$key]['is_type']=$value['person_type'];
                $question_posts[$key]['is_image_url']=$value['person_image_url'];
              }
        }
        // echo $question_posts;exit();
        $date = new CallUseController();
        $question_posts = $date->get_date_only($question_posts,'created','created_at');
        $question_posts = $date->get_time_only($question_posts,'time_created','created_at');
  
        $question_posts = $date->get_date_only($question_posts,'updated','updated_at');
        $question_posts = $date->get_time_only($question_posts,'time_updated','updated_at');
        // echo $question_posts;exit();
        $data = [
          'person_name' => $question_posts['0']['is_name'],
          'person_type' => $question_posts['0']['is_type'],
          'person_image_url' => $question_posts['0']['is_image_url'],
  
          'question_posts_id' => $question_posts['0']['q_id'],
          'question_posts_topic' => $question_posts['0']['topic'],
          'question_posts_message' => $question_posts['0']['message'],
          'created' => $question_posts['created'],
          'time_created' => $question_posts['time_created'],
          'updated' => $question_posts['updated'],
          'time_updated' => $question_posts['time_updated'],
  
          's_id_from_question'=>$request->s_id,
          's_id'=>$s_id,
          'chk_get'=>$request['chk_get'],
          'chk_status_show'=>1,
        ];
        $ansewr_posts = $this->get_answer_posts($question_posts['0']['q_id']);
        
        return view('font_pages/board-answer', ['ansewr_posts' => $ansewr_posts],$data);
    }

    public function edit_answer_post(Request $request)
    { 
      $s_id=session('s_id','default');
      $s_type=session('s_type','default');
      // echo $request['message2'];exit();
        $answer_posts = AnswerPost::find($request->answer_id);
        $answer_posts->message = $request->message3;
        $answer_posts->status = true;
        $answer_posts->save();
        // $question_posts->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');

        $items = [// get คนถาม
          'persons_member.id as pm_id'
          ,'persons_member.name as member_name'
          ,'persons_member.type as member_type'
          ,'persons_member.image_url as member_image_url'
  
          , 'persons.id as p_id'
          , 'persons.name as person_name'
          , 'persons.image_url as person_image_url'
          , 'persons.type as person_type'
  
          , 'question_posts.id as q_id'
          , 'question_posts.topic as topic'
          , 'question_posts.message as message'
          , 'question_posts.created_at as created_at'
          , 'question_posts.updated_at as updated_at'
      ];
        $question_posts = QuestionPost::where('question_posts.status',1)
        ->where('question_posts.id',$request->question_id)
        ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
        ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
        ->get($items);
        
        foreach($question_posts as $key=>$value)
        {
              if($question_posts[$key]['pm_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['member_name'];
                $question_posts[$key]['is_type']=$value['member_type'];
                $question_posts[$key]['is_image_url']=$value['member_image_url'];
              }
              else if($question_posts[$key]['p_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['person_name'];
                $question_posts[$key]['is_type']=$value['person_type'];
                $question_posts[$key]['is_image_url']=$value['person_image_url'];

              }
        }
        // echo $question_posts;exit();
        $date = new CallUseController();
        $question_posts = $date->get_date_only($question_posts,'created','created_at');
        $question_posts = $date->get_time_only($question_posts,'time_created','created_at');
  
        $question_posts = $date->get_date_only($question_posts,'updated','updated_at');
        $question_posts = $date->get_time_only($question_posts,'time_updated','updated_at');
        // echo $question_posts;exit();
        $data = [
          'person_name' => $question_posts['0']['is_name'],
          'person_type' => $question_posts['0']['is_type'],
          'person_image_url' => $question_posts['0']['is_image_url'],
  
          'question_posts_id' => $question_posts['0']['q_id'],
          'question_posts_topic' => $question_posts['0']['topic'],
          'question_posts_message' => $question_posts['0']['message'],
          'created' => $question_posts['created'],
          'time_created' => $question_posts['time_created'],
          'updated' => $question_posts['updated'],
          'time_updated' => $question_posts['time_updated'],
  
          's_id_from_question'=>$request->s_id,
          's_id'=>$s_id,
          'chk_get'=>$request['chk_get'],
          'chk_status_show'=>4,
        ];
        $ansewr_posts = $this->get_answer_posts($question_posts['0']['q_id']);
        
        return view('font_pages/board-answer', ['ansewr_posts' => $ansewr_posts],$data);
    }

    public function delete_answer_post(Request $request)
    { 
      $s_id=session('s_id','default');
      $s_type=session('s_type','default');
      // echo $request['message2'];exit();
        $answer_posts = AnswerPost::find($request->answer_id);
        $answer_posts->status = 0;
        $answer_posts->save();
        // $question_posts->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');

        $items = [// get คนถาม
          'persons_member.id as pm_id'
          ,'persons_member.name as member_name'
          ,'persons_member.type as member_type'
          ,'persons_member.image_url as member_image_url'
  
          , 'persons.id as p_id'
          , 'persons.name as person_name'
          , 'persons.image_url as person_image_url'
          , 'persons.type as person_type'
  
          , 'question_posts.id as q_id'
          , 'question_posts.topic as topic'
          , 'question_posts.message as message'
          , 'question_posts.created_at as created_at'
          , 'question_posts.updated_at as updated_at'
      ];
        $question_posts = QuestionPost::where('question_posts.status',1)
        ->where('question_posts.id',$request->question_id)
        ->leftJoin('persons_member', 'persons_member.id', '=', 'question_posts.persons_member_id')
        ->leftJoin('persons', 'persons.id', '=', 'question_posts.persons_id')
        ->get($items);
        
        foreach($question_posts as $key=>$value)
        {
              if($question_posts[$key]['pm_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['member_name'];
                $question_posts[$key]['is_type']=$value['member_type'];
                $question_posts[$key]['is_image_url']=$value['member_image_url'];
              }
              else if($question_posts[$key]['p_id']!=NULL)
              {
                $question_posts[$key]['is_name']=$value['person_name'];
                $question_posts[$key]['is_type']=$value['person_type'];
                $question_posts[$key]['is_image_url']=$value['person_image_url'];

              }
        }
        // echo $question_posts;exit();
        $date = new CallUseController();
        $question_posts = $date->get_date_only($question_posts,'created','created_at');
        $question_posts = $date->get_time_only($question_posts,'time_created','created_at');
  
        $question_posts = $date->get_date_only($question_posts,'updated','updated_at');
        $question_posts = $date->get_time_only($question_posts,'time_updated','updated_at');
        // echo $question_posts;exit();
        $data = [
          'person_name' => $question_posts['0']['is_name'],
          'person_type' => $question_posts['0']['is_type'],
          'person_image_url' => $question_posts['0']['is_image_url'],
  
          'question_posts_id' => $question_posts['0']['q_id'],
          'question_posts_topic' => $question_posts['0']['topic'],
          'question_posts_message' => $question_posts['0']['message'],
          'created' => $question_posts['created'],
          'time_created' => $question_posts['time_created'],
          'updated' => $question_posts['updated'],
          'time_updated' => $question_posts['time_updated'],
  
          's_id_from_question'=>$request->s_id,
          's_id'=>$s_id,
          'chk_get'=>$request['chk_get'],
          'chk_status_show'=>5,
        ];
        $ansewr_posts = $this->get_answer_posts($question_posts['0']['q_id']);
        
        return view('font_pages/board-answer', ['ansewr_posts' => $ansewr_posts],$data);
    }

    public function get_answer_posts($question_posts_id)
    {
      $items = [//get คนตอบ
        // 'persons_member.*',
        // 'persons.*'
        'persons_member.id as pm_id'
        ,'persons_member.name as member_name'
        ,'persons_member.type as member_type'
        ,'persons_member.image_url as member_image_url'

        , 'persons.id as p_id'
        , 'persons.name as person_name'
        , 'persons.image_url as person_image_url'
        , 'persons.type as person_type'

        , 'answer_posts.id as id'///
        , 'answer_posts.message as answer_message'
        , 'answer_posts.updated_at as ans_updated_at'
    ];
      $answer_posts = AnswerPost::where('question_posts_id',$question_posts_id)
      ->leftJoin('persons_member', 'persons_member.id', '=', 'answer_posts.persons_member_id')
      ->leftJoin('persons', 'persons.id', '=', 'answer_posts.persons_id')
      ->orderBy('answer_posts.id','desc')
      ->where('answer_posts.status',1)
      ->get($items);
      $date = new CallUseController();
      $answer_posts = $date->get_date_all($answer_posts,'updated_answer','ans_updated_at');
      $answer_posts = $date->get_time_all($answer_posts,'time_updated_answer','updated_at');
      // echo $answer_posts;exit();
      foreach($answer_posts as $key=>$value)
      {
            if($answer_posts[$key]['pm_id']!=NULL)
            {
              $answer_posts[$key]['is_name']=$value['member_name'];
              $answer_posts[$key]['is_type']=$value['member_type'];
              $answer_posts[$key]['is_image_url']=$value['member_image_url'];
              $answer_posts[$key]['is_s_id']=$value['pm_id'];////////
            }
            else if($answer_posts[$key]['p_id']!=NULL)
            {
              $answer_posts[$key]['is_name']=$value['person_name'];
              $answer_posts[$key]['is_type']=$value['person_type'];
              $answer_posts[$key]['is_image_url']=$value['person_image_url'];
              $answer_posts[$key]['is_s_id']=$value['pm_id'];////////
            }
      }

        //  echo $answer_posts;exit();
        //  echo $answer['name_na'];exit();
      return  $answer_posts;
    }
}
