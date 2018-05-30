<?php

namespace App\Http\Controllers;

use App\News;

use Illuminate\Http\Request;

class FontGuaranteeController extends Controller
{    

    public function news() {
      $news = News::where('status', 1)
      ->get();

      return view('font_pages/new', ['news' => $news]);
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
