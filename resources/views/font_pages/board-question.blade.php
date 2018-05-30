@include('form/header-font')
<!-- Ckeditor -->

<script type="text/javascript" src="assets/widgets/ckeditor/ckeditor.js"></script>
<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">กระดานสนทนา</h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Monarch comes with example pages for single blog posts.</p>
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

                <button type="button" class="btn btn-primary  margin-bottom" data-toggle="modal" data-target="#modal-add-question-post">
                   <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; ตั้งกระทู้
                </button>
                <br><br>
                
                <!-- //////////////////////////////modal-add-question-post//////////////////////////////// -->

        <div class="modal fade " id="modal-add-question-post" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ตั้งกระทู้ใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/questtion-post-font/create')) ?>
          <div class="modal-body">

            <div class="row" style="padding-top:20px;">
              <div class="form-group" style="padding-left:20px;padding-right:20px;">
                          <input type="text" class="form-control pull-right" id="Name" name="topic" placeholder="ชื่อเรื่อง...">
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">
                    <!-- <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="message">
                    </textarea> -->
                    <div class="example-box-wrapper">
                        <textarea class="ckeditor" cols="80" id="editor1" name="message" rows="10">
                        </textarea>
                    </div>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-question-post//////////////////////////////// -->
                <ul class="comments-list">
                @foreach ($question_posts as $question_post)
                    <li class="panel">
                        <div class="panel-body">
                            <div class="comment-image">
                                <img class="img-rounded lazy img-responsive" src="" data-original="assets/image-resources/people/testimonial1.jpg" alt="">
                            </div>
                            <div class="comment-wrapper">
                                <div class="comment-header clearfix">
                                    <div class="float-left">
                                        <div class="comment-author">
                                            <h2><b>ชื่อเรื่อง : {{$question_post->topic}}</b></h2> <br>
                                            <b>Thomas Edison</b> says:
                                        </div>
                                        <div class="comment-date">
                                            <i class="glyph-icon icon-clock-o"></i>
                                            21 December 2014
                                        </div>
                                    </div>
                                    <!-- <a href="{{ url('/font-board-answer')  }}" title="Reply" class="btn btn-xs btn-primary">
                                        ตอบกลับ
                                    </a> -->
                                    <?= Form::open(array('url' => '/font-board-answer')) ?>
                                    <input type="hidden" name="id" value="{{ $question_post->id }}">
                                    <div style="padding-left:130px;">
                                        <button type="submit" class="btn btn-xs btn-primary"><i class="fas fa-list-ul"></i>&nbsp; ตอบกลับ</button>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                                <!-- <div class="comment-body"> -->
                                   <p><h3>{!! $question_post->message !!}</h3></p>
                                <!-- </div> -->
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