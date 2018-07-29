<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Persons;
use App\Http\Controllers\UploadController;
use Illuminate\Http\Request;
use Image; //เรียกใช้ library จดัการรูปภาพเข้ามาใช้งาน 

class GallerysController extends Controller
{    
      public $path = 'image/';
    public function get() {
      $s_type=session('s_type','default');
      if($s_type==1 ){
        // echo $id;exit();
        $gallerys = Gallery::where('status', 1)
        ->get();
        // echo $gallery;exit();
        return view('gallery/gallery', ['gallerys' => $gallerys]);
            }
      else{
        echo "<meta http-equiv='refresh' content='0;url=blank.php'>";
      }
    
    }
    public function create(Request $request)
    {

        $gallerys = new Gallery;
        $gallerys->store_branch_id = 2;
        // $gallerys->image = $image;
        // if ($request->file('img_url')->isValid()) {
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
            $request->session()->flash('status_create_image_fail', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
            // $request->session()->flash('status_id',$request->id); 
            return redirect('gallery');
          }  

          $filename = str_random(10) . '.' . $request->file('img_url')
          ->getClientOriginalName();             
          // $request->file('img_url')->move(public_path() . '/image/gallery/picture/', $filename);
          $request->file('img_url')->move('image/gallery/picture/', $filename);       
          Image::make('image/gallery/picture/' . $filename)
          ->resize(200, 200)->save('image/gallery/resize/' . $filename);     
          // $img = Image::make($request->file('image')->getRealPath());
          $gallerys->img_url = $filename;       
          $gallerys->status = true;
          $gallerys->save();
          $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');   
        } 
        else{
          // echo '5555555555555';exit(); 
          if($request['img_url']<=1)
          { 
            $gallerys->img_url = 'default.jpg';         
          }  
          else{
            $request->session()->flash('status_create_image_fail', '');
            return redirect('gallery');
          }              
                 
         }  
 
          $gallerys->status = true;
          $gallerys->save();
          $request->session()->flash('status_create', 'เพิ่มข้อมูลเรียบร้อยแล้ว');   
          return redirect('gallery');
    }
    public function edit(Request $request)
    {
      // echo 'hh';exit();
      $gallerys = Gallery::find($request->id);
      // echo $request['img_url'];exit();
      $gallerys->store_branch_id = 2;
      if ($request->hasFile('img_url')) {
       
      $chk_name =$request->file('img_url')
      ->getClientOriginalName();     
      $value = substr($chk_name,-3);
      if($value=='jpg' || $value=='JPG' || $value=='png' || $value=='PNG' || $value=='gif' || $value=='GIF'){
        // echo '44';exit();
      }
      else{
        // echo 'tt';exit();
        $request->session()->flash('status_edit_image_fail', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
        $request->session()->flash('status_id',$request->id); 
        return redirect('gallery');
      }

          $filename = str_random(10) . '.' . $request->file('img_url')
          ->getClientOriginalName();             
          $request->file('img_url')->move('image/gallery/picture/', $filename);       
          Image::make('image/gallery/picture/' . $filename)
          ->resize(200, 200)->save('image/gallery/resize/' . $filename);     
          $gallerys->img_url = $filename;    
          
          // $filename = str_random(10) . '.' . $request->file('img_url')
          // ->getClientOriginalName();             
          // $request->file('img_url')->move(public_path() . '/image/gallery/picture/', $filename);       
          // Image::make(public_path() . '/image/gallery/picture/' . $filename)
          // ->resize(200, 200)->save(public_path() . '/image/gallery/resize/' . $filename);     
          // $gallerys->img_url = $filename;         
          $gallerys->status = true;
          $gallerys->save();
          $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
        } 
        else{    
          if($request['img_url']==''){
              $gallerys->img_url=$gallerys['img_url'];  
              $request->session()->flash('status_edit', 'แก้ไขข้อมูลเรียบร้อยแล้ว'); 
          }
          else{
            $request->session()->flash('status_edit_image_fail', ''); 
            $request->session()->flash('status_id',$request->id); 
            return redirect('gallery');
          }
              
         }  

      
      return redirect('gallery');
    }
    public function delete($id)
    {
      $gallerys = Gallery::find($id);
      $gallerys->status = 0;
      $gallerys->save();
      $gallerys2=session()->flash('status_delete', 'ลบข้อมูลเรียบร้อยแล้ว'); 
      return redirect('gallery');
    }
    
   
}
