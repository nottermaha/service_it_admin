@include('form/header-font')
<div class="hero-box hero-box-smaller bg-gradient-5 font-inverse">
    <div class="container">
        <h1 class="pad0A hero-heading font-size-28 wow fadeInDown" data-wow-duration="0.6s"> {{$name}}</h1>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>

<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2669.402796803141!2d103.2591953!3d16.2368481!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3122a38bf2762c17%3A0x275b2c5760abd519!2sMac+Service+Thailand+%40Mahasarakam!5e1!3m2!1sth!2sth!4v1527685715989" width="1500" height="600" frameborder="0" style="border:0" allowfullscreen></iframe> -->

<iframe  src="{{$map}}" width="1500" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>



<div id="map-marker" ></div>
<div class="mrg25T pad25T pad25B">
    <div class="container mrg25T mrg25B row">
    <h2>รายละเอียดร้าน</h2>
        <h4>{{$detail}}</h4>
        <div class="col-md-8">
        <br><br>
        <img src="{{ asset('image/store-branch/picture/'.$image_url) }}" alt="" width="600px;" height="400px;">
        </div>
            <h1>ติดต่อเรา</h1>
            <div class="divider mrg25T mrg25B"></div>
            <h3>ช่องทางการติดต่อ</h3>
            <ul class="contact-list mrg15T mrg25B reset-ul">
                <li>
                    <i class="glyph-icon icon-home"></i>
                    {{$address}}
                </li>
                <li>
                    <i class="glyph-icon icon-phone"></i>
                    {{$phone}}
                </li>
                <li>
                    <i class="glyph-icon icon-envelope-o"></i>
                    <a href="#" title="">{{$email}}</a>
                </li>
                <li>
                    <i class="glyph-icon  icon-facebook-square"></i>
                    <a href="#" title="">{{$contact}}</a>
                </li>
                
            </ul>
            <div class="divider mrg25T mrg25B"></div>
            <h3 class="mrg15B">เพิ่มเติม</h3>
            <p class="font-gray-dark">หากท่านมีความต้องการที่จะซ่อมสินค้า หรือประสงค์ที่จะติดต่อในกรณีที่ซ่อมสินค้ากับร้าน กรุณาติดต่อตามช่องทางการติดต่อที่ระบุไว้</p>
        </div>
    </div>
</div>
@include('form/footer-font')