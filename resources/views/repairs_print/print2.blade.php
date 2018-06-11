
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="https://main.msger.info/assets/printer/tools_style_01/table-print.css">
        <link rel="stylesheet" type="text/css" href="https://main.msger.info/assets/printer/data/css/bootstrap.css">
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
        <script type="text/javascript" src="https://main.msger.info/assets/printer/data/js/jquery-1.3.2.min.js"></script>    
        <script type="text/javascript" src="https://main.msger.info/assets/printer/data/js/jquery-barcode.js"></script>  
                <title>พิมพ์บิล ร้านMac service</title>
    </head>
<body>


<center>
    <div class="x_content">
      <div id="copy" class="row" style="width: 21cm;height: 14.8cm;margin: auto;">
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0.5cm 21px 0px 21px;">
            <div class="col-xs-5" style="text-align:left;padding-left: 0;">
                <div class="text-muted well well-sm no-shadow head_left" style="background: #3d3d3d;border: 1px solid #2f2f2f;">
                    <h4 class="text-head1" style="margin-top: 0px;margin-bottom: 0px;color: #ffffff;">ใบเสร็จรับเงิน</h4>
                    <h6 class="text-head1" style="margin-top: 0px;margin-bottom: 0px;color: #ffffff;">อินวอยร์บิลรับเครื่องซ่อม ระบบออนไลน์</h6>                   
                </div>        
                <h5 style="margin: 4px 1px;" class="color">รหัส  :  {{$bin_number}}</h5>
                <h5 style="margin: 4px 1px;" class="color">ชื่อ  :  {{$name}}</h5>
                <h5 style="margin: 4px 1px;" class="color">เบอร์ติดต่อ  :  {{$phone}}</h5>                
            </div>
            <div class="col-xs-7" style="padding-right: 0;">
                <h4 class="color" style="margin-top: 0px;margin-bottom: 0px;text-align: right;">
                                        <!-- <img src="/uploads/imageVoice/t-arter.jpg" style="height: 70px;padding-bottom: 10px;"> -->
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSTPWe2GWn6ojcHN32JujpSVhjs2tj9sLz_XI2mAeUEgZ3UfTJ6" alt="" style="height: 70px;padding-bottom: 10px;">
                                    </h4>
                <h4 class="color" style="margin-top: 0px;margin-bottom: 0px;text-align: right;">Mac Service {{$store_name}}</h4>
                <h5 class="color" style="margin-top: 4px;margin-bottom: 0px;text-align: right;">91/2 {{$store_address}}</h5>
                <h5 class="color" style="margin-top: 4px;margin-bottom: 0px;text-align: right;">โทร : {{$store_phone}} </h5>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 5px 20px 0px 20px;">
            <div class="col-xs-1 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;border-left: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: center;margin-top: 7px;">ที่</h5>
            </div>
            <div class="col-xs-4 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: center;margin-top: 7px;">รายการซ่อม</h5>
            </div>
            <div class="col-xs-5 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: center;margin-top: 7px;">รายละเอียดการซ่อม</h5>
            </div>
            <div class="col-xs-2 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: center;margin-top: 7px;">ราคาซ่อม</h5>                   
            </div>
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 5px 20px 0px 20px;margin-top: -6px;">
        <?php $i=0; ?>
        @foreach($list_repair as $value)
        <div class="row">
            <div class="col-xs-1" style="text-align:left;border-top: 1px solid #D8D8D8;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;border-left: 1px solid #D8D8D8;padding: 0px;">
                <h5 class="color" style="text-align: center;">{{$i=$i+1}}</h5>
            </div>
            <div class="col-xs-4" style="text-align:left;border-top: 1px solid #D8D8D8;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;">
                <h5 class="color" style="text-align: center;">
                  {{$value->name}} : {{$value->detail}}              </h5>
            </div>
            <div class="col-xs-5" style="text-align:left;border-top: 1px solid #D8D8D8;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;">
                <h5 class="color" style="text-align: center;">
                {{$value->symptom}} 
                </h5>
            </div>
            <div class="col-xs-2" style="text-align:left;border-top: 1px solid #D8D8D8;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;">
                <h5 class="color" style="text-align: center;">
                {{$value->price}}             </h5>                   
            </div></div>
          @endforeach
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 5px 20px 0px 20px;margin-top: -6px;">
            <div class="col-xs-1 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-bottom: 1px solid #D8D8D8;border-left: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: center;margin-top: 7px;"></h5>
            </div>
            <div class="col-xs-4 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-bottom: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: center;margin-top: 7px;"></h5>
            </div>
            <div class="col-xs-5 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: right;padding-right:10px;margin-top: 7px;">ราคารวม</h5>
            </div>
            <div class="col-xs-2 bg-col" style="text-align:left;border-top: 1px solid #D8D8D8;background-color: #f5f5f5;
                border-right: 1px solid #D8D8D8;border-bottom: 1px solid #D8D8D8;padding: 0px;height:30px;">
                <h5 class="color" style="text-align: center;margin-top: 7px;">{{$count_price}}</h5>                   
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 80px 20px 0px 80px;">
            <div class="col-xs-6" style="text-align: left;padding: 0;">
                <h5 style="margin: 4px 1px 0px -52px;text-align: center;" class="color">ผู้มาซ่อม (.................................................)</h5>
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
        var id = "0077318"
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