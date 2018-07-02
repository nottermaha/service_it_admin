<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Controllers\CallUseController;

use Illuminate\Http\Request;

class FontNewController extends Controller
{    
  // public function news() {
  //   $news = News::where('status', 1)->get();
  //   $data = [
  //         'title' => $news->title,
  //       ];
  //       $ansewr_posts = $this->DashboardController(get_repair_hour_in_day_by_store_branch());

  //   return view('form/footer', $data);
  // }


    public function news() {
      $news = News::where('status', 1)
      // ->limit(1)
      ->orderBy('id','desc')
      ->get();
      $images = new CallUseController();
      $results = $images->get_footer_font();
      // echo $results['1']['title'];exit();
      $date = new CallUseController();
      $news = $date->get_date_all($news,'date_in','created_at');
      // echo $news;exit();

      return view('font_pages/new', ['news' => $news,'results'=>$results]);
    }
    public function new_by_id(Request $request) {
      $detail_news = News::find($request->id);

      $date = new CallUseController();
      $detail_news = $date->get_date_only2($detail_news,'date_create','created_at');
      $detail_news = $date->get_date_only2($detail_news,'date_update','updated_at');

      $data = [
        'img_url' => $detail_news->img_url,
        'title' => $detail_news->title,
        'detail' => $detail_news->detail,
        'date_create' => $detail_news->date_create,
        'date_update' => $detail_news->date_update,
      ];
      $news = News::where('status', 1)
      ->limit(10)
      ->get();
      $date = new CallUseController();
      $news = $date->get_date_all($news,'date_in','created_at');

      $news_rights = News::where('status', 1)
      ->orderBy('id','desc')
      ->limit(5)
      ->get();

      return view('font_pages/new-detail',['news' => $news,'news_rights' => $news_rights],$data);
    }

   

}
