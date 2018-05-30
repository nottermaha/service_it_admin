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
                    <span>รายการกระทู้</span>
                </h3>

                <div class="blog-box blog-box-single blog-box-alt row">
                <a class="post-title" href="blog-single.html" title="">
                    <h3>{{$question_posts_topic}}</h3>
                </a>
                <div class="post-image">
                    <a href="../../assets/image-resources/stock-images/img-42.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive lazy img-rounded" src="" data-original="../../assets/image-resources/slides-bg/slide-3.jpg" alt="">
                    </a>
                </div>
                <div class="post-content-wrapper">
                    <div class="post-meta clearfix">
                        <span class="float-left">
                            <i class="glyph-icon icon-user"></i>
                            <a href="#" title="">Thomas Edison</a>
                        </span>
                        <span class="float-left">
                            <i class="glyph-icon icon-clock-o"></i>
                            21 December 2014
                        </span>
                        <span class="float-right">
                            <i class="glyph-icon icon-comments-o"></i>
                            <a href="#comments" title="">4 Comments</a>
                        </span>
                    </div>
                    <div class="divider"></div>
                    <div class="post-content">
                    {!! $question_posts_message !!}
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
                                        <img class="img-circle" src="assets/image-resources/people/testimonial3.jpg" alt="">
                                        <div class="testimonial-author">
                                            <b>{{  $ansewr_post->is_name }}</b>
                                            <span>Manager, ACME Inc.</span>
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