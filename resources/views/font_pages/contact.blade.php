@include('form/header-font')


<div class="hero-box hero-box-smaller full-bg-13 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">สาขาทั้งหมด</h1>
        <!-- <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Full width blog posts without sidebars</p> -->
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



<div id="page-content" class="container mrg25T" style="background-color:#DCDCDC;">
@foreach($store_branchs as $store_branch)
    <div class="blog-box row" style="background-color:white;padding-top:25px;padding-bottom:25px;">
        <div class="post-image col-md-4">
            <a href="assets/image-resources/stock-images/img-44.jpg" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Blog post title">
            <!-- // -->
                <img class="img-responsive lazy img-rounded" src="" data-original="{{ asset('image/'.$logo) }}" alt="" style="height:170px;width:280px;padding-left:50px;">
            <!-- // -->
            </a>
        </div>
        <div class="post-content-wrapper col-md-8">
            <a class="post-title"  title="">
                <h3>{{ $store_name }} {{ $store_branch->name}} </h3>
            </a>
            <div class="post-meta">
                <!-- <span>
                    <i class="glyph-icon icon-user"></i>
                    <a href="#" title="">Thomas Edison</a>
                </span> -->
                <span>
                    <h4><i class="glyph-icon icon-phone"></i>
                    เบอร์โทรศัพท์ <b>:</b> {{ $store_branch->phone }}</h4>
                </span>
                <!-- <span>
                    <i class="glyph-icon icon-comments-o"></i>
                    <a href="#" title="">4 Comments</a>
                </span> -->
            </div>
            <div class="post-content">
                {{ $store_branch->address}}
            </div>
            
            <?= Form::open(array('url' => '/font-contact-detail')) ?>
            <input type="hidden" name="id" value="{{ $store_branch->id }}">
                <div class="text-right">
                    <button type="submit"  class="btn ra-100 btn-blue-alt"><i class="glyph-icon icon-list"></i> รายละเอียด </button>
                </div>
            {!! Form::close() !!}
                
                
            </button>
        </div>
    </div>
@endforeach
    
</div>

<br><br>


@include('form/footer-font')