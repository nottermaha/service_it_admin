@include('form/header-font')
<!-- Ckeditor -->

<script type="text/javascript" src="assets/widgets/ckeditor/ckeditor.js"></script>
<!-- <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script> -->
<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">กระดานสนทนา</h1>
        <!-- <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Monarch comes with example pages for single blog posts.</p> -->
    </div>
    <div class="hero-overlay bg-black"></div>
</div>

<!-- Lazyload -->

<script type="text/javascript" src="assets/widgets/lazyload/lazyload.js"></script>
<script type="text/javascript">
    /* Lazyload */

    $(function() {
        $("img.lazy").lazyload({
            effect: "fadeIn",
            threshold: 100
        });
    });
</script>
<!-- <script>
	CKEDITOR.replace( 'message' );
</script>
<script>
	CKEDITOR.replace( 'message35' );
</script>
<script>
	CKEDITOR.replace( 'message2' );
</script> -->

<!-- PrettyPhoto modals -->

<!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/pretty-photo/prettyphoto.css">-->
<script type="text/javascript" src="assets/widgets/pretty-photo/prettyphoto.js"></script>
<script type="text/javascript">
    /* PrettyPhoto */

    $(document).ready(function() {
        $(".prettyphoto").prettyPhoto();
    });
</script>

<div id="page-content" class="container mrg25T">
    <div class="row">

            <div class="blog-comments" id="comments">
                <h3 class="p-title title-alt">
                    <span>รายละเอียดกระทู้</span>
                </h3>

                <div class="row">
                            <div class="col-md-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <!-- <h3 class="title-hero">
                                            Basic
                                        </h3> -->
                                        <div class="example-box-wrapper">
                                            <ul class="nav">
                                            <?= Form::open(array('url' => '/font-board-question')) ?>
                                            </li>
                                            <input type="hidden" name="chk_get" value="all">
                                            <button type="submit" class="btn btn-warning btn-block margin-bottom"><i class="fa fa-comments fa-lg"></i>&nbsp; กระทู้ทั้งหมด</button>
                                            </li>
                                    {!! Form::close() !!}
                                    <?php $s_type='' ;$s_type=session('s_type','default');?>
                                    @if($s_type==4)
                                    <?= Form::open(array('url' => '/font-board-question')) ?>
                                            </li>
                                            <input type="hidden" name="chk_get" value="only">
                                            <button type="submit" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-comments fa-lg"></i>&nbsp; กระทู้ของท่าน</button>
                                            </li>
                                    {!! Form::close() !!}
                                    @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                <div class="blog-box blog-box-single blog-box-alt row">
                <a class="post-title" href="blog-single.html" title="">
                    <h3>ชื่อเรื่อง :{{$question_posts_topic}}</h3>
                    
                </a>
                @if($person_type==1 || $person_type==2)
                <img class="img-circle" style="border-radius:50%;height:70px;width:70px;" src="{{ asset('image/person-manager/resize/'.$person_image_url) }}" alt="">
                @elseif($person_type==3)
                <img class="img-circle img-sm" style="border-radius:50%;height:70px;width:70px;" src="{{ asset('image/person-employee/resize/'.$person_image_url) }}" alt="">
                @elseif($person_type==4)
                <img class="img-circle img-sm" style="border-radius:50%;height:70px;width:70px;" src="{{ asset('image/person-member/resize/'.$person_image_url) }}" alt="">
                @endif

                <div class="post-content-wrapper">
                    <div class="post-meta clearfix">
                        <span class="float-left">
                            <i class="glyph-icon icon-user"></i>
                            <a href="#" title="">{{ $person_name }}</a>
                            <b style="color:gray;">สถานะ :</b>
                                    @if($person_type==1)
                                    <b style="color:orange;">แอดมิน</b>
                                    @elseif($person_type==2)
                                    <b style="color:back;">ผู้จัดการร้าน</b>
                                    @elseif($person_type==3)
                                    <b style="color:blue;">พนักงาน</b>
                                    @elseif($person_type==4)
                                    <b style="color:green;">สมาชิก</b>
                                    @endif
                        </span>
                        <span class="float-left">
                            <i class="glyph-icon icon-clock-o"></i>
                            </h5>
                            ตั้งกระทู้เมื่อ {{ $created }} {{ $time_created }}  แก้ไขล่าสุด {{ $updated }} {{ $time_updated }}
                        </span>
                        <span class="float-right">
                        
                            <!-- <i class="glyph-icon icon-clock-o"></i> -->
                        <?= Form::open(array('url' => '/font-board-question')) ?>
                        <input type="hidden" name="chk_get" value="{{$chk_get}}">
                            <button type="submit" class="btn btn-warning margin-bottom"><i class="fa fa-reply fa-lg"></i>&nbsp; ย้อนกลับ
                        </button>
                        <button type="button" class="btn btn-primary margin-bottom" data-toggle="modal" data-target="#modal-add-answer-post">
                                <i class="fa fa-plus-circle fa-lg"></i> &nbsp; ตอบกระทู้
                        </button>
                        {!! Form::close() !!}
                        </span>

        <!-- //////////////////////////////modal-add-answer-post//////////////////////////////// -->

        <div class="modal fade " id="modal-add-answer-post" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ตอบกระทู้</h4>
          </div> 

          <?php $s_type='' ;$s_type=session('s_type','default');?>
              
          <?= Form::open(array('url' => '/font-board-answer-create')) ?>
          <div class="modal-body">
          <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">
                    <!-- <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="message">
                    </textarea> -->
                    @if($s_type==4) 

                    <div class="example-box-wrapper">
                    <textarea  class="ckeditor" cols="80" id="editor" rows="10"name="message">
                   
                  </textarea>
                        
                    </div>
                    @else
                    <div class="col-md-1"></div>
                    <div class="col-md-10">    
                        <b>ท่านต้อง "สมัครสมาชิก" จึงจะสามารถตอบความคิดเห็นต่อกระทู้นี้ได้ <br> คลิก <a href="{{ url('/font-register')  }}">สมัครสมาชิก</a></b>
                   
                    </div> 
                    @endif
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
        @if($s_type==4) 
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
            <input type="hidden" name="question_id" value="{{$question_posts_id}}">
            <input type="hidden" name="s_id" value="{{$s_id_from_question}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
        @endif
          </div>
          
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-answer-post//////////////////////////////// -->

                        <!-- <span class="float-right">
                            <i class="glyph-icon icon-comments-o"></i>
                            <a href="#comments" title="">4 Comments</a>
                        </span> -->
                    </div>
                    <div class="divider"></div>
                    <div class="post-content">
                    
                    <h3>รายละเอียด</h3>{!! $question_posts_message !!}

                    @if($s_id_from_question == $s_id)
              <div class="box-tools pull-right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-question-post">
                   <i class="fa  fa-edit fa-lg"></i> &nbsp;แก้ไข
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-question-post">
                   <i class="fa  fa-trash fa-lg"></i> &nbsp;ลบ
                    </button>
              </div>
              <br>

              <!-- //////////////////////////////modal-delete-question-post//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-question-post">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบกระทู้</h4>
                  </div>        
                <?= Form::open(array('url' => '/questtion-post-font-delete')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบกระทู้นี้ </b>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                      <input type="hidden" name="chk_get" value="{{$chk_get}}">
                      <input type="hidden" name="id" value="{{ $question_posts_id }}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-question-post//////////////////////////////// -->
        <!-- /////////////////////////modal-font-board-answer-edit///////////////////////// -->

        <div class="modal fade " id="modal-edit-question-post" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขกระทู้ของท่าน</h4>
          </div>        
          <?= Form::open(array('url' => '/font-board-question-for-answer-edit')) ?>
          <div class="modal-body">
            
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group" style="padding-left:20px;padding-right:20px;">หัวข้อ
                  <input type="text" class="form-control pull-right" id="Name" name="topic" placeholder="หัวข้อ..." value="{{ $question_posts_topic }}">
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">รายละเอียด
                  <textarea  class="ckeditor" cols="80" id="editor" rows="10"name="message2" value="{{ $question_posts_message }}">
                    {{ $question_posts_message }}
                  </textarea>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
          <input type="hidden" name="s_id" value="{{ $s_id_from_question }}">
          <input type="hidden" name="id" value="{{ $question_posts_id }}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}

        </div>
      </div>          
    </div>
    <!-- ////////////////////////End modal-edit-question-post/////////////////////////// -->
              @endif

                    <br>
                    </div>

                </div>
            </div>

                <ul class="comments-list">
                @foreach ($ansewr_posts as $ansewr_post)
                    <li class="panel">
                        <div class="panel-body">
                        <div class="col-md-12">
                                <div class="testimonial-box testimonial-box-alt">
                                    <div class="testimonial-content radius-all-8 bg-gray">
                                        <div class="testimonial-arrow border-gray arrow-rounded"></div>
                                        <i class="glyph-icon icon-quote-left"></i>
                                        <p>{!! $ansewr_post->answer_message !!}.</p>
                                    </div>
                                    <div class="testimonial-author-wrapper">
                            <!-- <img class="img-circle" src="assets/image-resources/people/testimonial3.jpg" alt=""> -->
                            @if($ansewr_post->is_type==1 || $ansewr_post->is_type==2)
                            <img class="img-circle img-sm" src="{{ asset('image/person-manager/resize/'.$ansewr_post->is_image_url) }}" alt="">
                            @elseif($ansewr_post->is_type==3)
                            <img class="img-circle img-sm" src="{{ asset('image/person-employee/resize/'.$ansewr_post->is_image_url) }}" alt="">
                            @elseif($ansewr_post->is_type==4)
                            <img class="img-circle img-sm" src="{{ asset('image/person-member/resize/'.$ansewr_post->is_image_url) }}" alt="">
                            @endif
                                        <div class="testimonial-author">
                                            <b>{{  $ansewr_post->is_name }}</b>
                                            
                                                @if($ansewr_post->is_type==1)
                                                <b style="color:orange;">แอดมิน</b>
                                                @elseif($ansewr_post->is_type==2)
                                                <b style="color:back;">ผู้จัดการร้าน</b>
                                                @elseif($ansewr_post->is_type==3)
                                                <b style="color:blue;">พนักงาน</b>
                                                @elseif($ansewr_post->is_type==4)
                                                <b style="color:green;">สมาชิก</b>
                                                @endif
                                            <span>แก้ไขล่าสุด : {{ $ansewr_post->updated_answer }}</span>

                                            @if($s_id==$ansewr_post->is_s_id) 
                                            <div class="box-tools pull-right">
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-answer-post{{ $ansewr_post->id }}">
                                                <i class="fa  fa-edit fa-lg"></i> &nbsp;แก้ไข
                                                </button>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-answer-post{{ $ansewr_post->id }}">
                                                <i class="fa  fa-trash fa-lg"></i> &nbsp;ลบ
                                                </button>
                                            </div>

                                            <!-- //////////////////////////////modal-delete-answer-post//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-answer-post{{ $ansewr_post->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบความคิดเห็น</h4>
                  </div>        
                <?= Form::open(array('url' => '/font-board-answer-delete')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบความคิดเห็นนี้ </b>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                      <input type="hidden" name="chk_get" value="{{$chk_get}}">
                      <input type="hidden" name="s_id" value="{{ $s_id_from_question }}">
                      <input type="hidden" name="question_id" value="{{ $question_posts_id }}">
                      <input type="hidden" name="answer_id" value="{{ $ansewr_post->id }}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////modal-delete-answer-post//////////////////////////////// -->
        <!-- /////////////////////////modal-edit-answer-post///////////////////////// -->

        <div class="modal fade " id="modal-edit-answer-post{{ $ansewr_post->id }}" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขกระความคิดเห็น</h4>
          </div>        
          <?= Form::open(array('url' => '/font-board-answer-edit')) ?>
          <div class="modal-body">
            
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">รายละเอียด
                  <textarea  class="ckeditor" cols="80" id="editor" rows="10"name="message3" value="{{ $ansewr_post->answer_message }}">
                  {{ $ansewr_post->answer_message }}
                  </textarea>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
          <input type="hidden" name="s_id" value="{{ $s_id_from_question }}">
          <input type="hidden" name="question_id" value="{{ $question_posts_id }}">
          <input type="hidden" name="answer_id" value="{{ $ansewr_post->id }}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}

        </div>
      </div>          
    </div>
    <!-- ////////////////////////modal-edit-answer-post/////////////////////////// -->

                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <!-- <li class="panel">
                        <div class="panel-body">
                            <div class="comment-image">
                                <img class="img-rounded lazy img-responsive" src="" data-original="../../assets/image-resources/people/testimonial1.jpg" alt="">
                            </div>
                            <div class="comment-wrapper">
                                <div class="comment-header clearfix">
                                    <div class="float-left">
                                        <div class="comment-author">
                                            <b>Thomas Edison</b> says:
                                        </div>
                                        <div class="comment-date">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            21 December 2014
                                        </div>
                                    </div>
                                    <a href="#" title="Reply" class="btn btn-xs btn-primary">
                                        Reply
                                    </a>
                                </div>
                                <div class="comment-body">
                                    <p>The languages only differ in their grammar, their pronunciation and their most common words. Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="panel">
                        <div class="panel-body">
                            <div class="comment-image">
                                <img class="img-rounded lazy img-responsive" src="" data-original="../../assets/image-resources/people/testimonial1.jpg" alt="">
                            </div>
                            <div class="comment-wrapper">
                                <div class="comment-header clearfix">
                                    <div class="float-left">
                                        <div class="comment-author">
                                            <b>Thomas Edison</b> says:
                                        </div>
                                        <div class="comment-date">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            21 December 2014
                                        </div>
                                    </div>
                                    <a href="#" title="Reply" class="btn btn-xs btn-primary">
                                        Reply
                                    </a>
                                </div>
                                <div class="comment-body">
                                    <p>The languages only differ in their grammar, their pronunciation and their most common words. Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li class="panel">
                                <div class="panel-body">
                                    <div class="comment-image">
                                        <img class="img-rounded lazy img-responsive" src="" data-original="../../assets/image-resources/people/testimonial1.jpg" alt="">
                                    </div>
                                    <div class="comment-wrapper">
                                        <div class="comment-header clearfix">
                                            <div class="float-left">
                                                <div class="comment-author">
                                                    <b>Thomas Edison</b> says:
                                                </div>
                                                <div class="comment-date">
                                                    <i class="glyph-icon icon-clock-o"></i>
                                                    21 December 2014
                                                </div>
                                            </div>
                                            <a href="#" title="Reply" class="btn btn-xs btn-primary">
                                                Reply
                                            </a>
                                        </div>
                                        <div class="comment-body">
                                            <p>The languages only differ in their grammar, their pronunciation and their most common words. Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                                        </div>
                                    </div>
                                </div>
                                <ul>
                                    <li class="panel">
                                        <div class="panel-body">
                                            <div class="comment-image">
                                                <img class="img-rounded lazy img-responsive" src="" data-original="../../assets/image-resources/people/testimonial1.jpg" alt="">
                                            </div>
                                            <div class="comment-wrapper">
                                                <div class="comment-header clearfix">
                                                    <div class="float-left">
                                                        <div class="comment-author">
                                                            <b>Thomas Edison</b> says:
                                                        </div>
                                                        <div class="comment-date">
                                                            <i class="glyph-icon icon-clock-o"></i>
                                                            21 December 2014
                                                        </div>
                                                    </div>
                                                    <a href="#" title="Reply" class="btn btn-xs btn-primary">
                                                        Reply
                                                    </a>
                                                </div>
                                                <div class="comment-body">
                                                    <p>The languages only differ in their grammar, their pronunciation and their most common words. Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="panel">
                        <div class="panel-body">
                            <div class="comment-image">
                                <img class="img-rounded lazy img-responsive" src="" data-original="../../assets/image-resources/people/testimonial1.jpg" alt="">
                            </div>
                            <div class="comment-wrapper">
                                <div class="comment-header clearfix">
                                    <div class="float-left">
                                        <div class="comment-author">
                                            <b>Thomas Edison</b> says:
                                        </div>
                                        <div class="comment-date">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            21 December 2014
                                        </div>
                                    </div>
                                    <a href="#" title="Reply" class="btn btn-xs btn-primary">
                                        Reply
                                    </a>
                                </div>
                                <div class="comment-body">
                                    <p>The languages only differ in their grammar, their pronunciation and their most common words. Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="panel">
                        <div class="panel-body">
                            <div class="comment-image">
                                <img class="img-rounded lazy img-responsive" src="" data-original="../../assets/image-resources/people/testimonial1.jpg" alt="">
                            </div>
                            <div class="comment-wrapper">
                                <div class="comment-header clearfix">
                                    <div class="float-left">
                                        <div class="comment-author">
                                            <b>Thomas Edison</b> says:
                                        </div>
                                        <div class="comment-date">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            21 December 2014
                                        </div>
                                    </div>
                                    <a href="#" title="Reply" class="btn btn-xs btn-primary">
                                        Reply
                                    </a>
                                </div>
                                <div class="comment-body">
                                    <p>The languages only differ in their grammar, their pronunciation and their most common words. Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words.</p>
                                </div>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>

        </div>
  
</div>



<br><br>
@include('form/footer-font')