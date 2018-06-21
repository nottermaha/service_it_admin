<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\News;

use Illuminate\Http\Request;

class IndexController extends Controller
{    

    public function index() {
      $gallerys = Gallery::where('status', 1)
      ->get();
      $news = News::where('status', 1)
      ->orderBy('id','desc')
      ->limit(10)
      ->get();

      return view('font_pages/index', ['gallerys' => $gallerys,'news' => $news]);
    }


}
