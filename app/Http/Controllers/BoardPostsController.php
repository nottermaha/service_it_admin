<?php

namespace App\Http\Controllers;

use App\QuestionPost;
use App\AnswerPost;
use Illuminate\Http\Request;

class BoardPostsController extends Controller
{    

  public function get_question_post() {
    $question_posts = QuestionPost::where('status', 1)
    ->get();

    // echo $question_posts;exit();
    return view('board/question_post', ['question_posts' => $question_posts]);
  }

  public function create_question_post(Request $request)
    { 
      // echo $request;exit();
        $question_posts = new QuestionPost;
        $question_posts->topic = $request->topic;
        $question_posts->message = $request->message;
        $question_posts->status = true;
        $question_posts->save();
        // $question_posts->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        
        return redirect('questtion-post');
    }

    public function form_get_answer_post($id) {
      $question_posts = QuestionPost::find($id);
      $data = [
        'question_posts_id' => $question_posts->id,
        'question_posts_topic' => $question_posts->topic,
        'question_posts_message' => $question_posts->message,
      ];
      $ansewr_posts = $this->get_answer_posts($question_posts['id']);
      // echo $ansewr_posts;exit();
      return view('board/answer-post', ['ansewr_posts' => $ansewr_posts],$data);
    }
    public function get_answer_posts($question_posts_id)
    {
      $items = [// select data show in table
        // 'persons_member.*',
        // 'persons.*'
        'persons_member.id as pm_id'
        ,'persons_member.name as member_name'
        ,'persons_member.type as member_type'
        , 'persons.id as p_id'
        , 'persons.name as person_name'
        , 'persons.type as person_type'
        , 'answer_posts.message as answer_message'
    ];
      $answer_posts = AnswerPost::where('question_posts_id',$question_posts_id)
      ->leftJoin('persons_member', 'persons_member.id', '=', 'answer_posts.persons_member_id')
      ->leftJoin('persons', 'persons.id', '=', 'answer_posts.persons_id')
      ->get($items);

      foreach($answer_posts as $key=>$value)
      {
            if($answer_posts[$key]['pm_id']!=NULL)
            {
              $answer_posts[$key]['is_name']=$value['member_name'];
              $answer_posts[$key]['is_type']=$value['member_type'];
            }
            else if($answer_posts[$key]['p_id']!=NULL)
            {
              $answer_posts[$key]['is_name']=$value['person_name'];
              $answer_posts[$key]['is_type']=$value['person_type'];
            }
      }

        //  echo $answer_posts;exit();
        //  echo $answer['name_na'];exit();
      return  $answer_posts;
    }
    public function create_answer_post(Request $request)
    { 
      // echo $request;exit();
        $answer_posts = new AnswerPost;
        $answer_posts->persons_member_id = 1;
        $answer_posts->question_posts_id = $request->question_id;
        $answer_posts->message = $request->message;
        $answer_posts->status = true;
        $answer_posts->save();
        // $question_posts->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
        
        return redirect('answer-post-form/'.$answer_posts['question_posts_id']);
    }
}
