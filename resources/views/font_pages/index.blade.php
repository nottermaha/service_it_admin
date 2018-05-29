@include('form/header-font')

<!-- <div class="hero-box bg-blue font-inverse">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s" style="visibility: visible; -webkit-animation: 0.6s;">Pattern over blue background</h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s" style="visibility: visible; -webkit-animation: 0.9s 0.2s;">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.</p>
    </div>
    <div class="hero-pattern pattern-bg-1"></div>
</div> -->
<div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-setting-status-repair">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>
       <!-- //////////////////////////////modal-add-setting-status-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-add-setting-status-repair">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลล็อตใหม่</h4>
          </div>  

                      <div id="login-form" class="content-box">
                <div class="content-box-wrapper pad20A">

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-envelope-o"></i>
                            </span>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="checkbox-primary col-md-6" style="height: 20px;">
                            <label>
                                <input type="checkbox" id="loginCheckbox1" class="custom-checkbox">
                                Remember me
                            </label>
                        </div>
                        <div class="text-right col-md-6">
                            <a href="#" class="switch-button" switch-target="#login-forgot" switch-parent="#login-form" title="Recover password">Forgot your password?</a>
                        </div>
                    </div>
                </div>
                <div class="button-pane">
                    <button type="submit" class="btn btn-block btn-primary">Login</button>
                </div>
            </div>      
         
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-setting-status-repair//////////////////////////////// -->

<a href="{{ url('/gallery')  }}"><i class="fa fa-circle"></i>หลังบ้าน...</a></li>
    <div class="owl-slider-1 slider-wrapper">
    @foreach ($gallerys as $gallery)
        <div>
            <!-- <img src="assets/image-resources/slides-bg/slide-1.jpg" class="img-full" alt="Example alternate text"> -->
          <img src="{{ asset('image/gallery/picture/'.$gallery->img_url) }}" width="100%" height="400px;"></a> 
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
                <h3 class="text-transform-upr icon-title wow fadeInUp">Easy to customize</h3>
                <p class="icon-content wow fadeInUp">Our UI kit comes packed with over 130 components including Bootstrap, jQuery widgets, charts, HTML elements and others.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-beaker wow bounceInDown" data-wow-delay="1.5s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp">Based on Bootstrap 3.3</h3>
                <p class="icon-content wow fadeInUp">Easily create your own or choose the right layout, color and theme for each project you develop with the AgileUI Framework.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box icon-box-offset-large bg-default content-box icon-boxed">
                <i class="icon-large glyph-icon bg-white border-default btn-border icon-linecons-camera wow bounceInDown" data-wow-delay="2s"></i>
                <h3 class="text-transform-upr icon-title wow fadeInUp">Extensive documentation</h3>
                <p class="icon-content wow fadeInUp">AUI has a comprehensive support section featuring guides and documentations has a comprehensive support section.</p>
            </div>
        </div>
    </div>
</div>
<style>

    .hero-box-smaller .owl-pagination {
        display: none;
    }

</style>
<div class="hero-box hero-box-smaller bg-black font-inverse">
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
</div>

<div class="cta-box-btn bg-yellow">
    <div class="container">
        <a href="#" class="btn btn-success" title="">
            Join our team
            <span>It takes less than 5 minutes to get everything set up.</span>
        </a>
    </div>
</div>
<div class="hero-box fixed-bg hero-box-smaller full-bg-10 font-inverse">
    <div class="container">


        <div class="col-md-6">
            <div class="icon-box icon-box-left mrg25B">
                <i class="icon-alt glyph-icon icon-linecons-params wow bounceIn" data-wow-duration="0.8s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.1s">Easy to customize</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.2s">Our UI kit comes packed with over 130 components including Bootstrap, jQuery widgets, charts, HTML elements and others.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.2s" href="#" title="Learn more about customizing AUI">Learn more</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="icon-box icon-box-left mrg25T">
                <i class="icon-alt glyph-icon icon-linecons-beaker wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.3s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.4s">Based on Bootstrap 3.3</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.5s">Easily create your own or choose the right layout, color and theme for each project you develop with the AgileUI Framework.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.4s" href="#" title="Learn more about AUI widgets &amp; plugins">Learn more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="icon-box icon-box-left mrg25B">
                <i class="icon-alt glyph-icon icon-linecons-mobile wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.6s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.7s">Responsive &amp; Mobile Layouts</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="0.8s">AUI and its themes were designed using the latest responsive design techniques themes were designed using the latest.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.6s" href="#" title="Learn more about AUI responsive design techiques">Learn more</a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="icon-box icon-box-left mrg25T">
                <i class="icon-alt glyph-icon icon-linecons-graduation-cap wow bounceIn" data-wow-duration="0.8s" data-wow-delay="0.9s"></i>
                <div class="icon-wrapper">
                    <h4 class="icon-title wow bounceIn" data-wow-duration="0.6s" data-wow-delay="1s">Extensive documentation</h4>
                    <p class="icon-content wow bounceIn" data-wow-duration="0.6s" data-wow-delay="1.1s">AUI has a comprehensive support section featuring guides and documentations has a comprehensive support section.</p>
                    <a class="read-more wow fadeInUp" data-wow-delay="1.8s" href="#" title="Learn more about AUI extensive documentation">Learn more</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-overlay opacity-80 bg-black"></div>
    <div class="hero-pattern pattern-bg-2"></div>
</div>

<div class="container large-padding">
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
</div>

<div class="hero-box poly-bg-3 hero-box-smaller overflow-hidden font-inverse">
    <div class="wow fadeInUp col-md-5">
        <div class="bg-holder" style="top: -100px;">
            <img src="assets/image-resources/stock-images/img-10.jpg" alt="">
        </div>
    </div>
    <div class="col-md-7">
        <div class="owl-carousel-5 slider-wrapper carousel-wrapper">

            <div class="pad15A">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading wow bounceIn">
                                    Railroad bridge
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-primary"></div>
                    <img src="assets/image-resources/stock-images/img-1.jpg" alt="">
                </div>
            </div>
            <div class="pad15A">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading wow rollIn">
                                    Beautiful garden
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-black"></div>
                    <img src="assets/image-resources/stock-images/img-2.jpg" alt="">
                </div>
            </div>
            <div class="pad15A">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading wow fadeInDown">
                                    Sunrays flowers
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-primary"></div>
                    <img src="assets/image-resources/stock-images/img-3.jpg" alt="">
                </div>
            </div>
            <div class="pad15A">
                <div class="thumbnail-box">
                    <a class="thumb-link" href="#" title=""></a>
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <h3 class="thumb-heading wow flipInX">
                                    Seeing a DJs work
                                    <small>12 March 2015</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-blue"></div>
                    <img src="assets/image-resources/stock-images/img-4.jpg" alt="">
                </div>
            </div>
            <div class="pad15A">
                <div class="thumbnail-box">
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <div class="thumb-btn wow bounceInDown">
                                    <a href="#" class="btn btn-md btn-round btn-success" title=""><i class="glyph-icon icon-check"></i></a>
                                    <a href="#" class="btn btn-md btn-round btn-danger" title=""><i class="glyph-icon icon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-primary"></div>
                    <img src="assets/image-resources/stock-images/img-5.jpg" alt="">
                </div>
            </div>
            <div class="pad15A">
                <div class="thumbnail-box">
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <div class="thumb-btn wow zoomIn">
                                    <a href="#" class="btn btn-lg btn-round btn-success" title=""><i class="glyph-icon icon-check"></i></a>
                                    <a href="#" class="btn btn-lg btn-round btn-danger" title=""><i class="glyph-icon icon-remove"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-gray"></div>
                    <img src="assets/image-resources/stock-images/img-6.jpg" alt="">
                </div>
            </div>
            <div class="pad15A">
                <div class="thumbnail-box">
                    <div class="thumb-content">
                        <div class="center-vertical">
                            <div class="center-content">
                                <div class="thumb-btn wow rotateIn">
                                    <a href="#" class="btn btn-lg btn-round btn-primary" title=""><i class="glyph-icon icon-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="thumb-overlay bg-black"></div>
                    <img src="assets/image-resources/stock-images/img-7.jpg" alt="">
                </div>
            </div>

        </div>

    </div>
    <div class="hero-overlay bg-black opacity-60"></div>
    <div class="hero-pattern pattern-bg-1"></div>
</div>
<div class="main-footer bg-gradient-4 clearfix">
    <div class="container clearfix">
        <div class="col-md-3 pad25R">
            <div class="header">About us</div>
            <p class="about-us">
                sollicitudin eu erat. Pellentesque ornare mi vitae sem consequat ac bibendum neque adipiscing.
            </p>
            <div class="divider"></div>
            <div class="header">Footer background</div>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-footer-style bg-primary" data-header-bg="bg-primary" title="" href="#" data-original-title="Primary">Primary</a>
                <a class="tooltip-button set-footer-style bg-green" data-header-bg="bg-green" title="" href="#" data-original-title="Green">Green</a>
                <a class="tooltip-button set-footer-style bg-red" data-header-bg="bg-red" title="" href="#" data-original-title="Red">Red</a>
                <a class="tooltip-button set-footer-style bg-blue" data-header-bg="bg-blue" title="" href="#" data-original-title="Blue">Blue</a>
                <a class="tooltip-button set-footer-style bg-warning" data-header-bg="bg-warning" title="" href="#" data-original-title="Warning">Warning</a>
                <a class="tooltip-button set-footer-style bg-purple" data-header-bg="bg-purple" title="" href="#" data-original-title="Purple">Purple</a>
                <a class="tooltip-button set-footer-style bg-black" data-header-bg="bg-black" title="" href="#" data-original-title="Black">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-footer-style bg-gradient-1" data-header-bg="bg-gradient-1" title="" href="#" data-original-title="Gradient 1">Gradient 1</a>
                <a class="tooltip-button set-footer-style bg-gradient-2" data-header-bg="bg-gradient-2" title="" href="#" data-original-title="Gradient 2">Gradient 2</a>
                <a class="tooltip-button set-footer-style bg-gradient-3" data-header-bg="bg-gradient-3" title="" href="#" data-original-title="Gradient 3">Gradient 3</a>
                <a class="tooltip-button set-footer-style bg-gradient-4" data-header-bg="bg-gradient-4" title="" href="#" data-original-title="Gradient 4">Gradient 4</a>
                <a class="tooltip-button set-footer-style bg-gradient-5" data-header-bg="bg-gradient-5" title="" href="#" data-original-title="Gradient 5">Gradient 5</a>
                <a class="tooltip-button set-footer-style bg-gradient-6" data-header-bg="bg-gradient-6" title="" href="#" data-original-title="Gradient 6">Gradient 6</a>
                <a class="tooltip-button set-footer-style bg-gradient-7" data-header-bg="bg-gradient-7" title="" href="#" data-original-title="Gradient 7">Gradient 7</a>
                <a class="tooltip-button set-footer-style bg-gradient-8" data-header-bg="bg-gradient-8" title="" href="#" data-original-title="Gradient 8">Gradient 8</a>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="header">Recent posts</h3>
            <div class="posts-list">
                <ul>
                    <li>
                        <div class="post-image">
                            <a href="assets/image-resources/stock-images/img-10.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                                <img class="img-responsive" src="assets/image-resources/stock-images/img-10.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-body">
                            <a class="post-title" href="blog-single.html" title="">
                                <h3>When our power of choice is untrammelled prevents</h3>
                            </a>
                            by <a href="#">Hector Tomales</a> on 16.04.2015
                        </div>
                    </li>
                    <li>
                        <div class="post-image">
                            <a href="assets/image-resources/stock-images/img-11.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                                <img class="img-responsive" src="assets/image-resources/stock-images/img-11.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-body">
                            <a class="post-title" href="blog-single.html" title="">
                                <h3>And when nothing prevents our being able</h3>
                            </a>
                            by <a href="#">Hector Tomales</a> on 16.04.2015
                        </div>
                    </li>
                    <li>
                        <div class="post-image">
                            <a href="assets/image-resources/stock-images/img-12.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                                <img class="img-responsive" src="assets/image-resources/stock-images/img-12.jpg" alt="">
                            </a>
                        </div>
                        <div class="post-body">
                            <a class="post-title" href="blog-single.html" title="">
                                <h3>When our power of choice is untrammelled</h3>
                            </a>
                            by <a href="#">Hector Tomales</a> on 16.04.2015
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-2">
            <h3 class="header">Components</h3>
            <ul class="footer-nav">
                <li><a href="hero-static.html" title="Static hero sections"><span>Static sections</span></a></li>
                <li><a href="hero-alignments.html" title="Hero alignments"><span>Hero alignments</span></a></li>
                <li><a href="hero-overlays.html" title="Hero overlays"><span>Hero overlays</span></a></li>
                <li><a href="hero-video.html" title="Hero with video backgrounds"><span>Video sections</span></a></li>
                <li><a href="hero-elements.html" title="Hero sections with elements"><span>Hero elements</span></a></li>
                <li><a href="hero-parallax.html" title="Hero with parallax backgrounds"><span>Parallax sections</span></a></li>
                <li><a href="portfolio-3col.html" title="Portfolio with 3 columns"><span>Portfolio 3 columns</span></a></li>
                <li><a href="contact-us.html" title="Contact us"><span>Contact us</span></a></li>
                <li><a href="features-box.html" title="Features boxes"><span>Features boxes</span></a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <h3 class="header">Photo Gallery</h3>
            <div class="row no-gutter">
                <div class="col-xs-4">
                    <a href="assets/image-resources/stock-images/img-20.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="assets/image-resources/stock-images/img-20.jpg" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="assets/image-resources/stock-images/img-19.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="assets/image-resources/stock-images/img-19.jpg" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="assets/image-resources/stock-images/img-18.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="assets/image-resources/stock-images/img-18.jpg" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="assets/image-resources/stock-images/img-17.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="assets/image-resources/stock-images/img-17.jpg" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="assets/image-resources/stock-images/img-16.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="assets/image-resources/stock-images/img-16.jpg" alt="">
                    </a>
                </div>
                <div class="col-xs-4">
                    <a href="assets/image-resources/stock-images/img-15.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
                        <img class="img-responsive" src="assets/image-resources/stock-images/img-15.jpg" alt="">
                    </a>
                </div>
            </div>
            <h3 class="header">Contact us</h3>
            <ul class="footer-contact">
                <li>
                    <i class="glyph-icon icon-home"></i>
                    5804 Quaking Embers Trail, Tiger, Missouri
                </li>
                <li>
                    <i class="glyph-icon icon-phone"></i>
                    (636) 517-1243
                </li>
                <li>
                    <i class="glyph-icon icon-envelope-o"></i>
                    <a href="#" title="">homepage@example.com</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="footer-pane">
        <div class="container clearfix">
            <div class="logo">&copy; 2014 Monarch. All Rights Reserved.</div>
            <div class="footer-nav-bottom">
                <a href="#" title="Portfolio">Widgets</a>
                <a href="#" title="Layout">Layout</a>
                <a href="#" title="Elements">Elements</a>
                <a href="#" title="">Pricing tables</a>
                <a href="#" title="Portfolio">Portfolio</a>
            </div>
        </div>
    </div>
</div></div>


    <!-- FRONTEND ELEMENTS -->

<!-- Skrollr -->

<script type="text/javascript" src="assets/widgets/skrollr/skrollr.js"></script>

<!-- Owl carousel -->

<script type="text/javascript" src="assets/widgets/owlcarousel/owlcarousel.js"></script>
<script type="text/javascript" src="assets/widgets/owlcarousel/owlcarousel-demo.js"></script>

<!-- HG sticky -->

<script type="text/javascript" src="assets/widgets/sticky/sticky.js"></script>

<!-- WOW -->

<script type="text/javascript" src="assets/widgets/wow/wow.js"></script>

<!-- VideoBG -->

<script type="text/javascript" src="assets/widgets/videobg/videobg.js"></script>
<script type="text/javascript" src="assets/widgets/videobg/videobg-demo.js"></script>

<!-- Mixitup -->

<script type="text/javascript" src="assets/widgets/mixitup/mixitup.js"></script>
<script type="text/javascript" src="assets/widgets/mixitup/isotope.js"></script>

<!-- WIDGETS -->

<!-- Bootstrap Dropdown -->

<script type="text/javascript" src="assets/widgets/dropdown/dropdown.js"></script>

<!-- Bootstrap Tooltip -->

<script type="text/javascript" src="assets/widgets/tooltip/tooltip.js"></script>

<!-- Bootstrap Popover -->

<script type="text/javascript" src="assets/widgets/popover/popover.js"></script>

<!-- Bootstrap Progress Bar -->

<script type="text/javascript" src="assets/widgets/progressbar/progressbar.js"></script>

<!-- Bootstrap Buttons -->

<script type="text/javascript" src="assets/widgets/button/button.js"></script>

<!-- Bootstrap Collapse -->

<script type="text/javascript" src="assets/widgets/collapse/collapse.js"></script>

<!-- Superclick -->

<script type="text/javascript" src="assets/widgets/superclick/superclick.js"></script>

<!-- Input switch alternate -->

<script type="text/javascript" src="assets/widgets/input-switch/inputswitch-alt.js"></script>

<!-- Slim scroll -->

<script type="text/javascript" src="assets/widgets/slimscroll/slimscroll.js"></script>

<!-- Content box -->

<script type="text/javascript" src="assets/widgets/content-box/contentbox.js"></script>

<!-- Overlay -->

<script type="text/javascript" src="assets/widgets/overlay/overlay.js"></script>

<!-- Widgets init for demo -->

<script type="text/javascript" src="assets/js-init/widgets-init.js"></script>
<script type="text/javascript" src="assets/js-init/frontend-init.js"></script>

<!-- Theme layout -->

<script type="text/javascript" src="assets/themes/frontend/layout.js"></script>

<!-- Theme switcher -->

<script type="text/javascript" src="assets/widgets/theme-switcher/themeswitcher.js"></script>


<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>