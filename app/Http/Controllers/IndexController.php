<?php

namespace App\Http\Controllers;

use App\Gallery;

use Illuminate\Http\Request;

class IndexController extends Controller
{    

    public function index() {
      $gallerys = Gallery::where('status', 1)
      ->get();

      return view('font_pages/index', ['gallerys' => $gallerys]);
    }


}
