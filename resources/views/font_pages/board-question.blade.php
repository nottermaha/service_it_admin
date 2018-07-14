@include('form/header-font')
<!-- Ckeditor -->

<script type="text/javascript" src="assets/widgets/ckeditor/ckeditor.js"></script>
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
                    <span>กระทู้คำถาม</span>
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
                <br>
            <div class="text-right">
                <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#modal-add-question-post">
                    <i class="fa fa-plus-circle fa-lg"></i> &nbsp; ตั้งกระทู้
                </button><br><br>
            </div>
                

        <div class="modal fade " id="modal-add-question-post" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ตั้งกระทู้ใหม่</h4>
          </div>        
          <?php $s_type='' ;$s_type=session('s_type','default');?>

          <?= Form::open(array('url' => '/questtion-post-font-create')) ?>
          <div class="modal-body">
            @if($s_type==4) 
            <div class="row" style="padding-top:20px;">
              <div class="form-group" style="padding-left:20px;padding-right:20px;">
                   หัวข้อ
                          <input type="text" class="form-control pull-right" id="Name" name="topic" placeholder="ชื่อเรื่อง...">
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
                <div class="form-group" style="padding-left:20px;padding-right:20px;">
                    <!-- <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="message">
                    </textarea> -->
                    รายละเอียด
                    <div class="example-box-wrapper">
                        <textarea class="ckeditor" cols="80" id="editor1" name="message" rows="10">
                        </textarea>
                    </div>
              </div>
            </div>
            @else
                <div class="col-md-1"></div>
                <div class="col-md-10">    
                    <b>ท่านต้อง "สมัครสมาชิก" จึงจะสามารถตอบความตั้งกระทู้ได้ <br> คลิก <a href="{{ url('/font-register')  }}">สมัครสมาชิก</a></b>
                </div><br><br>
            @endif
          
          </div> 
          <div class="modal-footer">
          @if($s_type==4)
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
            @endif
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-question-post//////////////////////////////// -->
                <ul class="comments-list">
                @foreach ($question_posts as $question_post)
                    <li class="panel" style="background-color:#DCDCDC;"> 
                        <div class="panel-body">
                            <div class="comment-image">
                                <!-- <img class="img-rounded lazy img-responsive" src="" data-original="assets/image-resources/people/testimonial1.jpg" alt=""> -->
                @if($question_post->is_type==1 || $question_post->is_type==2)
                <img class="img-circle" style="border-radius:50%;height:70px;width:70px;" src="{{ asset('image/person-manager/resize/'.$question_post->is_image_url) }}" alt="">
                @elseif($question_post->is_type==3)
                <img class="img-circle img-sm" style="border-radius:50%;height:70px;width:70px;" src="{{ asset('image/person-employee/resize/'.$question_post->is_image_url) }}" alt="">
                @elseif($question_post->is_type==4)
                <img class="img-circle img-sm" style="border-radius:50%;height:70px;width:70px;" src="{{ asset('image/person-member/resize/'.$question_post->is_image_url) }}" alt="">
                @endif
                            </div>
                            <div class="comment-wrapper">
                                <div class="comment-header clearfix">
                                    <div class="float-left">
                                        <div class="comment-author">
                                            <h2><b>ชื่อเรื่อง : {{$question_post->topic}}</b></h2> 
                                           <b> {{ $question_post->is_name }} </b>&nbsp;&nbsp;&nbsp;&nbsp;
                                            <b style="color:gray;">สถานะ :</b>  
                                                @if($question_post->is_type==1)
                                                <b style="color:orange;">แอดมิน</b>
                                                @elseif($question_post->is_type==2)
                                                <b style="color:back;">ผู้จัดการร้าน</b>
                                                @elseif($question_post->is_type==3)
                                                <b style="color:blue;">พนักงาน</b>
                                                @elseif($question_post->is_type==4)
                                                <b style="color:green;">สมาชิก</b>
                                                @endif
                                                &nbsp;&nbsp;&nbsp;&nbsp;
                                                ตั้งกระทู้เมื่อ : {{$question_post->created}}
                                        </div>
                                        <!-- <div class="comment-date">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            21 December 2014
                                        </div> -->
                                    </div>
                                    <!-- <a href="{{ url('/font-board-answer')  }}" title="Reply" class="btn btn-xs btn-primary">
                                        ตอบกลับ
                                    </a> -->
                                    <?= Form::open(array('url' => '/font-board-answer')) ?>
          
                    <input type="hidden" name="chk_get" value="{{$chk_get}}">
                      <input type="hidden" name="id" value="{{ $question_post->id }}">
                      <input type="hidden" name="s_id" value="{{ $question_post->persons_member_id }}">
                                    <div style="padding-left:130px;">
                                        <button type="submit" class="btn btn-xs btn-primary"><i class="fas fa-list-ul"></i>&nbsp; แสดงความคิดเห็น</button>
                                    </div>
                                    {!! Form::close() !!}


                                </div>
                                <!-- <div class="comment-body"> -->
                                   <p><h3>{!!str_limit($question_post->message, 100)!!}...</h3></p>

            @if($question_post->persons_member_id == $s_id)
            <div class="text-right" >
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-question-post{{ $question_post->id }}">
                <i class="fa  fa-edit fa-lg"></i>แก้ไข&nbsp;
                </button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-question-post{{ $question_post->id }}">
                <i class="fa  fa-trash fa-lg"></i>ลบ&nbsp;
                </button>
            </div>



            <!-- //////////////////////////////modal-delete-question-post//////////////////////////////// -->

                        <div class="modal fade " id="modal-delete-question-post{{ $question_post->id }}">
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
                                <input type="hidden" name="id" value="{{$question_post->id}}">
                                    <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                                    <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                                </div>
                            {!! Form::close() !!}
                            </div>
                        </div>          
                        </div>
                <!-- //////////////////////////////End modal-delete-question-post//////////////////////////////// -->
                    <!-- /////////////////////////modal-edit-question-post///////////////////////// -->

                    <div class="modal fade " id="modal-edit-question-post{{ $question_post->id }}" style="padding-left:-100px;">
                    
                    <div class="modal-dialog ">
                    <div class="modal-content ">
                    <div class="modal-header " >
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">แก้ไขกระทู้ของท่าน</h4>
                    </div>        
                    <?= Form::open(array('url' => '/questtion-post-font-edit')) ?>
                    <div class="modal-body">
                        
                        
                        <div class="row" style="padding-top:20px;">
                        <div class="form-group" style="padding-left:20px;padding-right:20px;">หัวข้อ
                            <input type="text" class="form-control pull-right" id="Name" name="topic" placeholder="หัวข้อ..." value="{{$question_post->topic}}">
                        </div>
                        </div>
                        <div class="row" style="padding-top:20px;">
                        <div class="form-group" style="padding-left:20px;padding-right:20px;">รายละเอียด
                            <textarea class="ckeditor" cols="80" id="editor1" name="message2" rows="10"
                            placeholder="รายละเอียด..." name="message2{{ $question_post->id }}" value="{{$question_post->message}}">{{$question_post->message}}
                            </textarea>
                        </div>
                        </div>
                    
                    </div> 
                    <div class="modal-footer">
                    <input type="hidden" name="chk_get" value="{{$chk_get}}">
                    <input type="hidden" name="id" value="{{$question_post->id}}">
                        <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                    {!! Form::close() !!}

                    </div>
                </div>          
                </div>
                <!-- ////////////////////////End modal-edit-question-post/////////////////////////// -->

            @endif
                                <!-- </div> -->
                            </div>
                        </div>
                    </li>
                    @endforeach
            <div class="text-right">
                <button type="button" class="btn btn-info btn-lg " data-toggle="modal" data-target="#modal-add-question-post">
                    <i class="fa fa-plus-circle fa-lg"></i> &nbsp; ตั้งกระทู้
                </button><br><br>
            </div>

                </ul>
            </div>

        </div>
  
</div>



<br><br>
@include('form/footer-font')