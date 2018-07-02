@include('form/header-font')
<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">รายอะเอียดข่าว</h1>
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

<!--<link rel="stylesheet" type="text/css" href="assets/widgets/pretty-photo/prettyphoto.css">-->
<script type="text/javascript" src="assets/widgets/pretty-photo/prettyphoto.js"></script>
<script type="text/javascript">
    /* PrettyPhoto */

    $(document).ready(function() {
        $(".prettyphoto").prettyPhoto();
    });
</script>

<div id="page-content" class="container mrg25T">
    <div class="row">
        <div class="col-md-9">
            <div class="blog-box blog-box-single blog-box-alt row">
                <a class="post-title"  title="">
                    <h3>เรื่อง :{{ $title }}</h3>
                </a>
                <div class="post-image">
                    <a href="assets/image-resources/stock-images/img-42.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <!-- <img class="img-responsive lazy img-rounded" src="" data-original="assets/image-resources/slides-bg/slide-3.jpg" alt=""> -->
                        <img class="img-responsive lazy img-rounded" src="{{ asset('image/new/picture/'.$img_url) }}" style="height:700px;"></a>
                    </a>
                </div>
                <div class="post-content-wrapper">
                    <div class="post-meta clearfix">
                        <span class="float-left">
                            <i class="glyph-icon icon-user"></i>
                            <a href="#" title="">แอดมิน</a>
                        </span>
                        <span class="float-left">
                            <i class="glyph-icon icon-clock-o"></i>
                           วันที่โพส :{{ $date_create }} แก้ไขล่าสุด :{{ $date_update }}
                        </span>
                        <span class="float-right">
                            <!-- <i class="glyph-icon icon-comments-o"></i> -->
                            <!-- <a href="#comments" title="">4 Comments</a> -->
                        </span>
                    </div>
                    <div class="divider"></div>
                    <div class="post-content">
                        {!! $detail !!}
                    </div>

                </div>
            </div>

            <h3 class="p-title title-alt">
                <span>ข่าวใหม่</span>
            </h3>
            <div class="owl-carousel-5 slider-wrapper carousel-wrapper">
            @foreach ($news as $new)
                <div>
                    <div class="thumbnail-box-wrapper mrg5A">
                        <div class="thumbnail-box">
                            <a class="thumb-link" href="#" title=""></a>
                            <div class="thumb-content">
                                <div class="center-vertical">
                                    <div class="center-content">
                                        <i class="icon-helper icon-center animated zoomInUp font-white glyph-icon icon-linecons-camera"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="thumb-overlay bg-black"></div>

                            <img src="{{ asset('image/new/resize/'.$new->img_url) }}" >
                        </div>
                        <div class="thumb-pane">
                            <h3 class="thumb-heading animated rollIn">
                                <a href="#" title="">
                                {{$new->title}}
                                </a>
                                <small>{{ $new->date_in }}</small>
                            </h3>
                            <div class="text-right">
                    <?= Form::open(array('url' => '/font-new-detail')) ?>
                        <input type="hidden" name="id" value="{{ $new->id }}">
                        <button type="submit" class="btn btn-xs ra-100 btn-blue-alt">ดูเพิ่มเติม</button>
                    {!! Form::close() !!}
                    </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            <br>

        </div>
        <div class="col-md-3">
            <div class="content-box">
    <h3 class="content-box-header bg-default">
        ข่าวใหม่
    </h3>
    <div class="posts-list content-box-wrapper">
        <ul class="">
        @foreach ($news_rights as $news_right)
            <li>
                <div class="post-image">
                    <a href="assets/image-resources/stock-images/img-10.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="{{ asset('image/new/resize/'.$news_right->img_url) }}" alt="">
                    </a>
                </div>
                <div class="post-body">
                    <a class="post-title" href="blog-single.html" title="">
                        <h3>{{ $news_right->title }}</h3>
                    </a>
                    <p>{!!str_limit($news_right->detail, 70)!!}.
                    <div class="text-right">
                    <?= Form::open(array('url' => '/font-new-detail')) ?>
                        <input type="hidden" name="id" value="{{ $news_right->id }}">
                        <button type="submit" class="btn btn-xs ra-100 btn-blue-alt">ดูเพิ่มเติม</button>
                    {!! Form::close() !!}
                    </div>
                    </p>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
</div>

        </div>
    </div>
</div>

<br><br>

@include('form/footer-font')