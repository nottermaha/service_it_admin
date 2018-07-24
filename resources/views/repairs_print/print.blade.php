
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="https://main.msger.info/assets/printer/tools_style_01/table-print.css">
        <link rel="stylesheet" type="text/css" href="https://main.msger.info/assets/printer/data/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
        <script type="text/javascript" src="https://main.msger.info/assets/printer/data/js/jquery-1.3.2.min.js"></script>    
        <script type="text/javascript" src="https://main.msger.info/assets/printer/data/js/jquery-barcode.js"></script>  
                <title>พิมพ์บิล ร้าน 
                @foreach($stores as $store)
                        {{ $store->name }}
                @endforeach
                </title>
    </head>
<body>


<center>
    <div class="x_content">
      <div id="copy" style="width:21cm;height:13.4cm;">
        <div class="col-md-12 " style="padding-top:10px;padding-buttom:10px;padding-left:10px;padding-right:10px;">
            <div class="col-md-5" style="text-align:left;padding-left: 10px;">
                <button class="btn"style="color:white;background-color:gray;width:300px;text-align: left;">
                <h4 style="margin-top:-1px;">Invoice {{$bin_number}}</h4>
                <h5 style="margin-bottom:-1px;">อินวอยร์บิลซ่อม</h5> 
                </button>

                  <h5 style="margin: 4px 1px;" class="color"> รหัส  :  {{$bin_number}}</b>
                  <h5 style="margin: 4px 1px;" class="color">ชื่อ  :  {{$name}}</h5>
                  <h5 style="margin: 4px 1px;" class="color">เบอร์ติดต่อ  :  {{$phone}}</h5> 
              
            </div>
            <div class="col-md-7" style="text-align:right;padding-right: 10px;margin-top:-120px;">
                  <div style="margin-left:350px;">
                  <!-- <img src="/uploads/imageVoice/t-arter.jpg" style="height: 70px;padding-bottom: 10px;"> -->
                  <!-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTPWe2GWn6ojcHN32JujpSVhjs2tj9sLz_XI2mAeUEgZ3UfTJ6" alt="" style="height: 70px;padding-bottom: 10px;"> -->
                @foreach($stores as $store)
                        <img src="{{ asset('image/'.$store->logo) }}"style="height: 70px;padding-bottom: 10px;">
                @endforeach 

                  </div>   
                <h4 class="color" style="margin-top: -1px;margin-bottom: 0px;text-align: right;">
                @foreach($stores as $store)
                        {{ $store->name }}
                @endforeach 
                {{$store_name}}</h4>
                <h5 class="color" style="margin-top: 4px;margin-bottom: 0px;text-align: right;">{{$store_address}}</h5>
                <h5 class="color" style="margin-top: 4px;margin-bottom: 0px;text-align: right;">โทร : {{$store_phone}} </h5>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 5px 20px 0px 20px;">
            <div class="col-xs-4 bg-col" style="text-align:left;background-color: #DCDCDC;padding-top: 5px;height:136px;">
            @foreach($list_repair as $value)
            <!-- <h5  class="color">อุปกรณ์ : iPhone : S5 (G900)</h5> -->
                <h5  class="color">อุปกรณ์ : {{$value->list_name}} : {{$value->symptom}}</h5>
            @endforeach
                <!-- <h5  class="color">อิมี่ : </h5> -->
                <!-- <h5 class="color">ระยะเวลาซ่อม : 1 วัน</h5> -->
                <!-- <h5  class="color">สิ่งที่ติดมา : {{$equipment_follow}}</h5> -->
                <!-- <h5 class="color">รหัส : </h5> -->
            </div>
            <div class="col-xs-4 bg-col" style="text-align:left;background-color: #DCDCDC;padding-top: 5px;height:136px;">
                <h5  class="color">ราคาประเมินซ่อม : 500 บาท</h5>
                <!-- <h5 class="color">วางมัดจำ : 0 บาท</h5> -->
                <h5 class="color">วันที่รับเข้าระบบ : {{$date_in}}</h5>
                <h5  class="color">สิ่งที่ติดมา : {{$equipment_follow}}</h5>
                <!-- <h5  class="color">อาการ : แบตเสื่อม</h5> -->
                <h5  class="color"></h5>
            </div>
            <div class="col-xs-4 bg-col" style="text-align:left;background-color: #DCDCDC;padding-top: 5px;height:136px;">
            	<!-- <h5  class="color">บาร์โค้ดจัดการข้อมูล</h5> -->
                <h5  class="color">
                	<div id="inputdata" style="margin-left: -10px; margin-top: -3px;margin-bottom: 9px;"></div>
                </h5>  
                <!-- โค้ด สำหรับเว็บนอก หรือเช็คนอคลิงค์ -->

	                <h4 style="margin: 23px 1px 0px 0px;font-size:16px;" class="color">เช็คสถานะออนไลน์ได้ที่</h4>
			        <h5 style="margin: 4px 1px;font-size:12px;" class="color">
			        	www.macserviceit.xyz	
			        </h5>
			                
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 5px 20px 0px 20px;height: 150px;">
            <div class="col-xs-12" style="text-align: left;padding: 2;">
                <p>1.โปรดตรวจสอบรายการสินค้าที่ส่งมาซ่อมให้ครบตามรายการที่ระบุไว้<br />2.เอกสารฉบับนี้เป็นเอกสารสำคัญที่ต้องนำมาใช้เป็นหลักฐานในการรับสินค้า<br </p>            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 5px 20px 0px 80px;">
            <div class="col-xs-6" style="text-align: left;padding: 0;">
                <h5 style="margin: 4px 1px 0px -52px;text-align: center;" class="color">ลูกค้า (.................................................)</h5>
                <h5 style="margin: 4px 1px;text-align: center;" class="color">{{$name}}</h5>
            </div>
            <div class="col-xs-6" style="text-align: left;padding: 0;">
                <h5 style="margin: 4px 1px 0px -65px;text-align: center;" class="color">ลงชื่อผู้รับ (.................................................)</h5>
                <h5 style="margin: 4px 1px;text-align: center;" class="color">พนักงาน</h5>
            </div>
        </div>
      </div>

      <!-- <img src="/uploads/images/cut.png" style="width: 27px;margin-top: -15px;margin-bottom: -100px;margin-left: -700px;"> -->
      <div id="clone"></div>
    </div>
</center>

</body>
</html>
<script type="text/javascript">
    $( document ).ready(function() {
        var id = "{{$id}}"
        $("#inputdata").barcode(id, "code128");  
        $("#inputdata2").barcode(id, "code128"); 
        if ("1" == 1) {
            $('#copy').clone().appendTo('#clone');
            $('#copy').css('border-bottom', '#999999 1px dotted');
        }
        setTimeout(function() {
            window.print();
        }, 3000);
        window.onafterprint = function(){
            setTimeout(function() {
                window.close();
            }, 10000);
        }
    });
</script>