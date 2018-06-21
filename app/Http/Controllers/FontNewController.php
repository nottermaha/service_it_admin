<?php

namespace App\Http\Controllers;

use App\News;
use App\Http\Controllers\FooterController;

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
      $images = new FooterController();
      $results = $images->get_footer_font();
      // echo $results['1']['title'];exit();

      return view('font_pages/new', ['news' => $news,'results'=>$results]);
    }
    public function new_by_id(Request $request) {
      $detail_news = News::find($request->id);
      $data = [
        'img_url' => $detail_news->img_url,
        'title' => $detail_news->title,
        'detail' => $detail_news->detail,
      ];
      $news = News::where('status', 1)
      ->get();

      return view('font_pages/new-detail',['news' => $news],$data);
    }

   

}
