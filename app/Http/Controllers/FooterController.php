<?php

namespace App\Http\Controllers;

use App\Store;
use App\StoreBranch;
use App\News;

use Illuminate\Http\Request;

class FooterController extends Controller
{   
  
    public function get_footer_font() {
      $stores = StoreBranch::where('status',1)
      ->get();
      $stores = News::where('status',1)
      ->orderBy('id','desc')
      ->limit(3)
      ->get();
      // echo $new['0']['title'];exit();
      return $stores;

    }
//      @foreach($results as $new)
//     <li>
//         <div class="post-image">
//             <a href="assets/image-resources/stock-images/img-10.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">

//                 <img src="{{ asset('image/new/resize/'.$new->img_url) }}" class="img-responsive">
//             </a>
//         </div>
//         <div class="post-body">
//             <a class="post-title" href="blog-single.html" title="">
//                 <h3>{{$new->title}}</h3>
//             </a>
//             by <a href="#">Hector Tomales</a> on 16.04.2015
//         </div>
//     </li>
// @endforeach  
   

}
