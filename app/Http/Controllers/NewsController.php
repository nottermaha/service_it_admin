<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class NewsController extends Controller
{    

  public function get() {
    $s_type=session('s_type','default');
    if($s_type==1 ){
      $news = News::where('status', 1)
      ->get();
  
      // echo $news;exit();
      return view('new/new', ['news' => $news]);
    }
    else{
      echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
    }

  }
  public function create(Request $request)
  { 
    // echo $request;exit();
      $news = new News;
      $news->store_branch_id = 2;
      $news->title = $request->title;
      if ($request->hasFile('img_url')) {      
        // echo $request;exit();       
        $chk_name =$request->file('img_url')
        ->getClientOriginalName();     
        $value = substr($chk_name,-3);
        if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
          // echo '44';exit();
        }
        else{
          // echo 'tt';exit();
          $request->session()->flash('status_image_fail', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
          $request->session()->flash('status_id',$request->id); 
          return redirect('news');
        }

        $filename = str_random(10) . '.' . $request->file('img_url')
        ->getClientOriginalName();             
        $request->file('img_url')->move('image/new/picture/', $filename);            
        Image::make('image/new/picture/' . $filename)
        ->resize(200, 200)->save('image/new/resize/' . $filename);     
        // $img = Image::make($request->file('image')->getRealPath());
        $news->img_url = $filename;      
        $news->detail = $request->detail;
        $news->status = true;
        $news->save();
        $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');         
      } 
      else{      
                  
        if($request['img_url']<=1)
        {
          $news->img_url = 'default.jpg'; 
          $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');      
        } 
        else{
          $request->session()->flash('status_image_fail', 'รูปเฟล');
          return redirect('/news');
        }          
       }  
      // $news->img_url = $request->img_url;
 

      return redirect('/news');
  }
  public function edit(Request $request)
  {//
    //  echo $request['img_url'];exit();

    $news = News::find($request->id);
    $news->store_branch_id = 2;
    $news->title = $request->title;      
  
    if ($request->hasFile('img_url')) {  
      ////check type jpg png/////
      $chk_name =$request->file('img_url')
      ->getClientOriginalName();     
      $value = substr($chk_name,-3);
      if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
        // echo '44';exit();
      }
      else{
        // echo 'tt';exit();
        $request->session()->flash('status_image_fail', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
        $request->session()->flash('status_id',$request->id); 
        return redirect('news');
      }

      $filename = str_random(10) . '.' . $request->file('img_url')
      ->getClientOriginalName();             
      $request->file('img_url')->move('image/new/picture/', $filename);            
      Image::make('image/new/picture/' . $filename)
      ->resize(200, 200)->save('image/new/resize/' . $filename);     
      // $img = Image::make($request->file('image')->getRealPath());
      $news->img_url = $filename;         
    } 
    else{
      if($request['img_url']<=1)
      {
        $news->img_url=$news['img_url']; 
      } 
      else{
        $request->session()->flash('status_image_fail', 'รูปเฟล');
        $request->session()->flash('status_id',$request->id);
        return redirect('/news');
      }               
             
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
