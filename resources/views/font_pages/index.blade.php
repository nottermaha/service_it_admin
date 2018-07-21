@include('form/header-font')

<!-- <div class="hero-box bg-blue font-inverse">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s" style="visibility: visible; -webkit-animation: 0.6s;">Pattern over blue background</h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s" style="visibility: visible; -webkit-animation: 0.9s 0.2s;">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
    </div>
    <div class="hero-pattern pattern-bg-1"></div>
</div> -->

    <div class="owl-slider-1 slider-wrapper">
    @foreach ($gallerys as $gallery)
        <div>
            <!-- <img src="assets/image-resources/slides-bg/slide-1.jpg" class="img-full" alt="Example alternate text"> -->
          <img src="{{ asset('image/gallery/picture/'.$gallery->img_url) }}" style="width:100%;height:400px;">
          <!-- </a>  -->
        </div>
    @endforeach
    </div>

<!-- Owl carousel -->

<!--<link rel="stylesheet" type="text/css" href="assets/widgets/owlcarousel/owlcarousel.css">-->
<script type="text/javascript" src="assets/widgets/owlcarousel/owlcarousel.js"></script>
<script type="text/javascript" src="assets/widgets/owlcarousel/owlcarousel-demo.js"></script>

<div class="large-padding pad25B">
    <div class="container pad25B row">
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-clock wow bounceInDown" data-wow-delay="1s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp"><h3 style="color:gray;">บริการรวดเร็ว</h3></h3>
                <p class="icon-content wow fadeInUp">บริการกระชับฉับไว ด้วยระบบที่มีความทันสมัย <br> พร้อมใส่ใจทุกบริการ</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-beaker wow bounceInDown" data-wow-delay="1.5s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp"><h3 style="color:gray;">ทีมช่างคุณภาพ</h3></h3>
                <p class="icon-content wow fadeInUp">ทีมช่างคุณภาพที่มีประสบการณ์ซ่อมมาหลายปี ที่เชี่ยวชาญทั้งระบบ ios และ andriod </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-camera wow bounceInDown" data-wow-delay="2s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp"><h3 style="color:gray;">ตรวจสอบสถานะได้ทุกที่</h3></h3>
                <p class="icon-content wow fadeInUp">ระบบของเราจะออนไลน์ พร้อมที่จะให้ทุกท่านตรวจสอบสถานะการซ่อมของท่านได้ทุกที่ ทุกเวลา </p>
            </div>
        </div>
    </div>
</div>
<style>

    .hero-box-smaller .owl-pagination {
        display: none;
    }

</style>
<!-- <div class="hero-box hero-box-smaller bg-black font-inverse">
    <div class="container">
        <div class="owl-slider-5 inverse slider-wrapper">
            <div>
                <div class="testimonial-box-big">
                    <div class="testimonial-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <i class="glyph-icon icon-quote-right"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                    <div class="testimonial-author-wrapper">
                        <div class="testimonial-author">
                            <b>John Wayne</b>
                            <span>Manager, ACME Inc.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="testimonial-box-big">
                    <div class="testimonial-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <i class="glyph-icon icon-quote-right"></i>
                        <p>It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge.</p>
                    </div>
                    <div class="testimonial-author-wrapper">
                        <div class="testimonial-author">
                            <b>John Wayne</b>
                            <span>Manager, ACME Inc.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="testimonial-box-big">
                    <div class="testimonial-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <i class="glyph-icon icon-quote-right"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                    <div class="testimonial-author-wrapper">
                        <div class="testimonial-author">
                            <b>John Wayne</b>
                            <span>Manager, ACME Inc.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="testimonial-box-big">
                    <div class="testimonial-content">
                        <i class="glyph-icon icon-quote-left"></i>
                        <i class="glyph-icon icon-quote-right"></i>
                        <p>If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The regular than the existing European languages.</p>
                    </div>
                    <div class="testimonial-author-wrapper">
                        <div class="testimonial-author">
                            <b>John Wayne</b>
                            <span>Manager, ACME Inc.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-pattern pattern-bg-2"></div>
</div> -->

<div class="cta-box-btn bg-yellow">
    <div class="container">
    <?php $s_store_name=session('s_store_name','default'); ?>
        <a href="#" class="btn btn-success" title="">
                ร้าน {{ $s_store_name }}
            <!-- <span>It takes less than 5 minutes to get everything set up.</span> -->
        </a>
    </div>
</div>
<div class="hero-box fixed-bg hero-box-smaller full-bg-10 font-inverse">
    <div class="container">


        <div class="col-md-6">
            <div class="icon-box icon-box-left mrg25B">
                <i class="glyph-icon tooltip-button demo-icon icon-home wow bounceIn" data-wow-duration="0.8s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.1s">สาขาของเรา</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.2s">ร้านของเรามีหลายสาขา เชิญท่านใช้บริการสาขาที่ใกล้บ้านท่านได้ ดูรายละเอียดเพิ่มเติมได้ที่ปุ่ม "รายละเอียด" ด้านล่างได้เลยค่ะ...</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.2s" href="{{ url('/font-contact')  }}" title="Learn more about customizing AUI">ดูข้อมูลเพิ่มเติม</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="icon-box icon-box-left mrg25T">
                <i class="icon-alt glyph-icon icon-linecons-beaker wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.3s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.4s">ตรวจสอบการแจ้งซ่อมสินค้า !!</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.5s">ท่านสามารถตรวจสอบการแจ้งซ่อมของท่านได้ง่ายๆ ทางเรามีบริการเช็คข้อมูลการซ่อมสินค้าออนไลน์...</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.4s" href="{{ url('/font-repair')  }}" title="Learn more about AUI widgets plugins">ดูข้อมูลเพิ่มเติม</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="icon-box icon-box-left mrg25B">
                <i class="icon-alt glyph-icon icon-linecons-mobile wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.6s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.7s">ข่าวสาร </h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.8s">ข่าวสารใหม่ อัพเดตทันสถานะการณ์ ข้อมูลสินค้าใหม่ อุปกรณ์เครื่องมือซ่อมที่ทันสมัย ข้อมูลปัญหาเครื่องเสีย เปิดไม่ติด อื่่นๆ...</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.6s" href="{{ url('/font-new')  }}" title="Learn more about AUI responsive design techiques">ดูข้อมูลเพิ่มเติม</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="icon-box icon-box-left mrg25T">
                <i class="icon-alt glyph-icon icon-linecons-graduation-cap wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.9s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="1s">การรับประกันหลังซ่อม</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="1.1s">สินค้าที่ท่านนำมาซ่อมกับทางร้านของเรา ไม่ว่าจะสาขาไหนท่านจะได้รับการประกันหลังซ่อม ดูราลละเอียดเพิ่มเติม...</p>
                    <a class="read-more wow fadeInUp " data-wow-delay="1.8s" href="{{ url('/font-guarantee')  }}" title="Learn more about AUI extensive documentation">ดูข้อมูลเพิ่มเติม</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-overlay opacity-80 bg-black"></div>
    <div class="hero-pattern pattern-bg-2"></div>
</div>

<!-- <div class="container large-padding">
    <div class="feature-box small-padding clearfix">
        <div class="feature-img">
            <div class="iphone-wrapper">
                <div class="iphone-screen"></div>
                <div class="iphone-content">
                    <div class="owl-slider-3 slider-wrapper">
                        <img src="http://placehold.it/310x541/42bdc2/FFFFFF">
                        <img src="http://placehold.it/310x541/42bdc2/FFFFFF">
                        <img src="http://placehold.it/310x541/42bdc2/FFFFFF">
                        <img src="http://placehold.it/310x541/42bdc2/FFFFFF">
                        <img src="http://placehold.it/310x541/42bdc2/FFFFFF">
                        <img src="http://placehold.it/310x541/42bdc2/FFFFFF">
                    </div>
                </div>
            </div>
        </div>
        <div class="feature-content">
            <div class="feature-heading">
                <h2>Which of us ever to take a trivial </h2>
                <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment</p>
            </div>
            <ul class="feature-list">
                <li>
                    <i class="glyph-icon font-primary icon-camera"></i>
                    <span>
                        <b>Wonderful serenity has taken</b>
                        <p>Alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of.</p>
                    </span>
                </li>
                <li>
                    <i class="glyph-icon font-primary icon-anchor"></i>
                    <span>
                        <b>Steal into the inner sanctuary recently</b>
                        <p>It wasn't a dream. His room, a proper human room although a little too small, lay peacefully between its four familiar walls. A collection of textile samples lay spread out on the table - Samsa was a travelling salesman and above it there.?</p>
                    </span>
                </li>
                <li>
                    <i class="glyph-icon font-primary icon-bolt"></i>
                    <span>
                        <b>Little too small, lay peacefully between its</b>
                        <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss.</p>
                    </span>
                </li>
                <li>
                    <i class="glyph-icon font-primary icon-bullhorn"></i>
                    <span>
                        <b>Monarch Developer API</b>
                        <p>Lorem ipsum dolor sic amet dixit tu? Access Monarch's human room although a little too small.</p>
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div> -->

<div class="hero-box poly-bg-3 hero-box-smaller overflow-hidden font-inverse">
    <div class="wow fadeInUp col-md-5">
        <div class="bg-holder" style="top: -100px;">
            <img src="assets/image-resources/stock-images/img-10.jpg" alt="">
        </div>
    </div>
    <div class="col-md-7">
        <div class="owl-carousel-5 slider-wrapper carousel-wrapper">

            @foreach($news as $new)
            <div class="pad15A">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <!-- <h3 class="thumb-heading wow bounceIn">
                                    Railroad bridge
                                    <small>12 March 2015</small>
                                </h3> -->
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay "></div>
                    <!-- <img src="assets/image-resources/stock-images/img-1.jpg" alt=""> -->
                    <img src="{{ asset('image/new/picture/'.$new->img_url) }}" style="height:230px;">
                    
                </div><br>
                <?= Form::open(array('url' => '/font-new-detail')) ?>
                    <input type="hidden" name="id" value="{{ $new->id }}">
                    <button type="submit" class="btn ra-100 btn-blue-alt"><i class="glyph-icon tooltip-button  icon-navicon"></i>&nbsp; ดูรายละเอียด</button>
                    {!! Form::close() !!}
            </div>
            @endforeach
            

        </div>

    </div>
    <div class="hero-overlay bg-black opacity-60"></div>
    <div class="hero-pattern pattern-bg-1"></div>
</div>

@include('form/footer-font')