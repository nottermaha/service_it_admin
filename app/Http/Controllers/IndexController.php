<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\News;
use App\Store;

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
      $store = Store::find(1);
      session(['s_logo'=>$store['logo'] ]);
      session(['s_store_name'=>$store['name'] ]);
      return view('font_pages/index', ['gallerys' => $gallerys,'news' => $news]);
    }


}
