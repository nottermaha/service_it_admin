<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GallerysController extends Controller
{    
    public function get() {
      // echo $id;exit();
      $gallerys = Gallery::where('status', 1)
      ->get();
      // echo $gallery;exit();
      return view('gallery/gallery', ['gallerys' => $gallerys]);
    }
    public function create(Request $request)
    { 
      // echo $request;exit();
        $gallerys = new Gallery;
        $gallerys->store_branch_id = 2;
        $gallerys->img_url = $request->img_url;
        $gallerys->status = true;
        $gallerys->save();

        return redirect('gallery');
    }
    public function edit(Request $request)
    {
      $gallerys = Gallery::find($request->id);
      $gallerys->store_branch_id = 2;
      $gallerys->img_url = $request->img_url;
      $gallerys->status = true;
      $gallerys->save();

      return redirect('gallery');
    }
    public function delete($id)
    {
      $gallerys = Gallery::find($id);
      $gallerys->status = 0;
      $gallerys->save();

      return redirect('gallery');
    }
    
   
}
