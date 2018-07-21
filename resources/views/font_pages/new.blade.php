@include('form/header-font')


<div class="hero-box hero-box-smaller full-bg-5 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">ข่าวสาร</h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">ข่าวสาร</p>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>

<!-- Mixitup -->

<script type="text/javascript" src="assets/widgets/mixitup/mixitup.js"></script>
<script type="text/javascript" src="assets/widgets/mixitup/images-loaded.js"></script>
<script type="text/javascript" src="assets/widgets/mixitup/isotope.js"></script>
<script type="text/javascript" src="assets/widgets/mixitup/portfolio-demo.js"></script>

<div class="portfolio-controls portfolio-nav-alt bg-blue clearfix controls">
    <div class="container text-center">
        <ul class="float-none">
            <!-- <li class="filter" data-filter="all">View all</li>
            <li class="filter" data-filter="hover_1">Illustrations</li>
            <li class="filter" data-filter="hover_2">ข่าวสารทั้งหมด</li>
            <li class="filter" data-filter="hover_3">ข่าวใหม่</li>
            <li class="filter" data-filter="hover_4">ข่าวสารทั้งหมด</li> -->
        </ul>
    </div>
</div>
<div class="container">
<ul id="portfolio-grid" class="reset-ul">



    @foreach ($news as $new)
    <li class="col-md-3 col-sm-6 mix hover_2" data-cat="4">
        <div class="thumbnail-box-wrapper" >
            <div class="thumbnail-box thumbnail-box-inverse">
                <a class="thumb-link" href="#" title=""></a>
                <div class="thumb-content">
                    <div class="center-vertical">
                        <div class="center-content">
                            <h3 class="thumb-heading animated bounceIn">
                                <!-- Cookie monsters -->
                                <!-- <small></small> -->
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="thumb-overlay bg-black"></div>
                <img src="{{ asset('image/new/resize/'.$new->img_url) }}" height="300px;">
            </div>

            <div class="thumb-pane"style="height:220px;">
                <h3 class="thumb-heading animated rollIn">
                    <!-- <a href="{{ url('/font-new-detail/$new->id')  }}" title=""> -->
                    <!-- <a href="<?php echo url('/font-new-detail') ?>/{{$new->id}}">
                    {{ $new->title }}
                    </a> -->
                    <a >
                    {{$new->title}}
                    </a>
                </h3>
                {!!str_limit($new->detail, 120)!!}<br>
                <small>เผยแพร่เมื่อ : {{ $new->date_in }}</small>
                <?= Form::open(array('url' => '/font-new-detail')) ?>
                <input type="hidden" name="id" value="{{ $new->id }}">
                <div style="padding-left:130px;padding-bottom:10px;">
                    <button type="submit" class="btn ra-100 btn-blue-alt"><i class="glyph-icon tooltip-button  icon-navicon"></i>&nbsp; ดูเพิ่มเติม</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </li>

@endforeach

</ul>
</div>

<div class="divider"></div>

<!-- <div class="text-center">
    <ul class="pagination pagination-lg">
        <li><a href="#">«</a></li>
        <li class="active"><a href="#">หน้า 1 <span class="sr-only">(current)</span></a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">»</a></li>
    </ul>
</div> -->

@include('form/footer-font')