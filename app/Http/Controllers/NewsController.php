<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class NewsController extends Controller
{    
  public function maha() {
    // echo $news;exit();
    return view('new/maha');
  }
  public function get() {
    $news = News::where('status', 1)
    ->get();

    // echo $news;exit();
    return view('new/new', ['news' => $news]);
  }
  public function create(Request $request)
  { 
    // echo $request;exit();
      $news = new News;
      $news->store_branch_id = 2;
      $news->title = $request->title;
      if ($request->hasFile('img_url')) {      
        // echo $request;exit();       
        $filename = str_random(10) . '.' . $request->file('img_url')
        ->getClientOriginalName();             
        $request->file('img_url')->move(public_path() . '/image/new/picture/', $filename);            
        Image::make(public_path() . '/image/new/picture/' . $filename)
        ->resize(200, 200)->save(public_path() . '/image/new/resize/' . $filename);     
        // $img = Image::make($request->file('image')->getRealPath());
        $news->img_url = $filename;         
      } 
      else{                
        $news->img_url = 'default.jpg';        
       }  
      // $news->img_url = $request->img_url;
      $news->detail = $request->detail;
      $news->status = true;
      $news->save();
      $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว'); 

      return redirect('/news');
  }
  public function edit(Request $request)
  {
    $news = News::find($request->id);
    $news->store_branch_id = 2;
    $news->title = $request->title;
    if ($request->hasFile('img_url')) {      
      // echo $request;exit();       
      $filename = str_random(10) . '.' . $request->file('img_url')
      ->getClientOriginalName();             
      $request->file('img_url')->move(public_path() . '/image/new/picture/', $filename);            
      Image::make(public_path() . '/image/new/picture/' . $filename)
      ->resize(200, 200)->save(public_path() . '/image/new/resize/' . $filename);     
      // $img = Image::make($request->file('image')->getRealPath());
      $news->img_url = $filename;         
    } 
    else{                
      $news->img_url=$news['img_url'];        
     }
    $news->detail = $request->detail;
    $news->status = true;
    $news->save();
    $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
    return redirect('/news');
  }
  public function delete($id)
  {
    $news = News::find($id);
    $news->status = 0;
    $news->save();
    $news2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 
    return redirect('/news');
  }

}
