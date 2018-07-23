
<!-- css header-leftmenu -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title>AdminLTE 2 | Dashboard</title> -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
       <!-- Select2 -->
       <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              การชำระเงิน /
              <small><a>การชำระเงิน</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">
<!-- //////////////////////////start//////////////////////////// -->

    <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header bg-yellow">
              <h3 class="box-title "> <b style="color:black">ขั้นตอนที่ 1.</b> รอการชำระเงิน</h3>
            </div>

       <div class="box-body table-responsive  ">
              <table id="example1" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">บิล</th>
            <th class="text-center">ชื่อลูกค้า</th>
            <th class="text-center">วันที่รับสินค้า</th>
            <th class="text-center">จำนวน</th>
            <th class="text-center">สถานะการชำระเงิน</th>
          </tr>
        </thead>
        
        <tbody>
        <?php $i=0; ?>
        @foreach($repairs_status_pay_0 as $repairs_status_pay_0s)
            <tr>
                <td class="text-center">{{ $i=$i+1}}</td>
                <td class="text-center">{{$repairs_status_pay_0s->bin_number}}</td>
                <td >{{$repairs_status_pay_0s->is_name}}
                  @if($repairs_status_pay_0s-> type=='4')
                  <b style="color:green;">ลูกค้าสมาชิก</b>
                  @else
                  <b style="color:blue;">ลูกค้าทั่วไป</b>
                  @endif
                </td>
                <td class="text-center">{{$repairs_status_pay_0s->date_in}}</td>
                <td class="text-center">
                    <?php $number = 0;$number_price = 0 ; ?> 
                    @foreach($list_repairs as $list_repair)
                      @if($list_repair->repair_id_from_list == $repairs_status_pay_0s->id)
                      <?php $number = $number+1 ; $number_price = $number_price+$list_repair->price; ?> 
                      @endif
                    @endforeach
                     จำนวน {{ $number }} รายการ  <br>
                     ราคารวม {{ number_format($number_price, 2) }} บ.
                </td>
                <td class="text-center">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><i class="fa fa-clock-o fa-lg"></i> รอการชำระเงิน
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu " >
                    <li data-toggle="modal" data-target="#modal-pay-money-in{{ $repairs_status_pay_0s->id }}"><a href="#"><i class="fa fa-check-square"></i> ชำระเงิน</a></li>
                  </ul>
          <!-- //////////////modal-pay-money-in////////////////// -->
          <div class="modal fade " id="modal-pay-money-in{{ $repairs_status_pay_0s->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-green" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ชำระเงิน </h4>
                  </div>
                  <?= Form::open(array('url' => '/data-pay-confirm')) ?>        
                  <h4>กดปุ่ม "ยืนยันการชำระเงิน" เพื่อนชำระเงินของบิลนี้</h4>
                      <div class="modal-footer">
                      <input type="hidden" name="repair_id" value="{{ $repairs_status_pay_0s->id }}"> 
  
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success">ยืนยันการชำระเงิน</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
            <!-- //////////////End modal-pay-money-in////////////////// -->
                </div>
                <!-- /btn-group -->
              </td>
            </tr>
        @endforeach
   
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
    <!-- ///////////////////// -->
    <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header bg-green">
              <h3 class="box-title "><b style="color:black">ขั้นตอนที่ 2.</b>ชำระเงินเรียบร้อย สามารถ " ปิดบิลซ่อมได้ "</h3>
            </div>

       <div class="box-body table-responsive  ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th class="text-center">บิล</th>
            <th class="text-center">ชื่อลูกค้า</th>
            <th class="text-center">วันที่ชำระเงิน</th>
            <th class="text-center">จำนวน</th>
            <th class="text-center">สถานะการชำระเงิน</th>
          </tr>
        </thead>
        
        <tbody>
        <?php $i=0; ?>
        @foreach($repairs_status_pay_1 as $repairs_status_pay_1s)
            <tr>
                <td class="text-center">{{ $i=$i+1}}</td>
                <td class="text-center">{{$repairs_status_pay_1s->bin_number}}</td>
                <td >{{$repairs_status_pay_1s->is_name}}
                  @if($repairs_status_pay_1s-> type=='4')
                  <b style="color:green;">ลูกค้าสมาชิก</b>
                  @else
                  <b style="color:blue;">ลูกค้าทั่วไป</b>
                  @endif
                </td>
                <td class="text-center">{{$repairs_status_pay_1s->date_pay}}</td>
                <td class="text-center">
                    <?php $number = 0;$number_price = 0 ; ?> 
                    @foreach($list_repairs as $list_repair)
                      @if($list_repair->repair_id_from_list == $repairs_status_pay_1s->id)
                      <?php $number = $number+1 ; $number_price = $number_price+$list_repair->price; ?> 
                      @endif
                    @endforeach
                     จำนวน {{ $number }} รายการ  <br>
                     ราคารวม {{ number_format($number_price, 2) }} บ.
                </td>
                <td class="text-center">
                <div class="input-group-btn">
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><i class="fa fa-money fa-lg"></i> ชำระเงินแล้ว
                    <span class="fa fa-caret-down"></span></button>
                  <ul class="dropdown-menu " >
                    <li data-toggle="modal" data-target="#modal-pay-money-out{{ $repairs_status_pay_1s->id }}"><a href="#">
                    <i class="fa  fa-times-circle"></i>ยกเลิกการชำระเงิน</a></li>
                    <li data-toggle="modal" data-target="#modal-close-bill{{ $repairs_status_pay_1s->id }}"><a href="#"><i class="fa fa-power-off">
                    </i>ปิดบิลงานซ่อม</a></li>
                  </ul>
        <!-- //////////////modal-pay-money-out////////////////// -->
          <div class="modal fade " id="modal-pay-money-out{{ $repairs_status_pay_1s->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-yellow" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ชำระเงิน </h4>
                  </div>
                  <?= Form::open(array('url' => '/data-pay-confirm')) ?>        
                  <h4>กดปุ่ม "ยกเลิกการชำระเงิน" เพื่อยกเลิกการชำระเงินของบิลนี้
                  <input type="hidden" name="repair_id" value="{{ $repairs_status_pay_1s->id }}">
                  </h4>
                      <div class="modal-footer">
                     
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-warning">ยกเลิกการชำระเงิน</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
            <!-- //////////////End modal-pay-money-out////////////////// -->

            <!-- //////////////modal-close-bill////////////////// -->
          <div class="modal fade " id="modal-close-bill{{ $repairs_status_pay_1s->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-gray" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ปิดบิลงานซ่อม</h4>
                  </div>
                  <?= Form::open(array('url' => '/data-close-bill')) ?>        
                  <h4>กดปุ่ม "ปิดบอลงานซ่อม" เพื่อปิดบิลงานซ่อมนี้ <br>
                 <b style="color:red;">กรุณาตรวจสอบข้อมูลให้ครบถ้วนก่อนทำการปิดบิล</b> 
                  <input type="hidden" name="repair_id" value="{{ $repairs_status_pay_1s->id }}">
                  </h4>
                      <div class="modal-footer">
                      <input type="hidden" name="repair_id" value="{{ $repairs_status_pay_1s->id }}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ปิดบอลงานซ่อม</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
            <!-- //////////////End modal-pay-money-out////////////////// -->
                </div>
                </td>
            </tr>          
        @endforeach
   
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
     <!-- ///////////////////// -->
     <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header bg-gray">
              <h3 class="box-title "><b style="color:black">ขั้นตอนที่ 3.</b>รายการที่ปิดบิลแล้ว</h3>
            </div>

       <div class="box-body table-responsive  ">
              <table id="example2" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th class="text-center">#</th>
            <th class="text-center">บิล</th>
            <th class="text-center">ชื่อลูกค้า</th>
            <th class="text-center">วันที่ปิดบิล</th>
            <th class="text-center">จำนวน</th>
          </tr>
        </thead>
        
        <tbody>
        <?php $i=0; ?>
        @foreach($repairs_status_bill as $repairs_status_bills)
            <tr>
                <td class="text-center">{{ $i=$i+1}}</td>
                <td><b style="color:green;">{{$repairs_status_bills->bin_number}}</b>  <br>

                    @foreach($list_repairs as $list_repair)
                      @if($list_repair->repair_id_from_list == $repairs_status_bills->id)
                      <b>รายการ</b> {{ $list_repair->list_name }} <b>ราคา</b> {{ number_format($list_repair->price, 2) }} บ. <br>
                      @endif
                    @endforeach  
                     
                </td>
                <td >{{$repairs_status_bills->is_name}}
                  @if($repairs_status_bills-> type=='4')
                  <b style="color:green;">ลูกค้าสมาชิก</b>
                  @else
                  <b style="color:blue;">ลูกค้าทั่วไป</b>
                  @endif
                </td>
                <td class="text-center"> {{$repairs_status_bills->date_close_bill}}</td>
                <td class="text-center">
                    <?php $number = 0;$number_price = 0 ; ?> 
                    @foreach($list_repairs as $list_repair)
                      @if($list_repair->repair_id_from_list == $repairs_status_bills->id)
                      <?php $number = $number+1 ; $number_price = $number_price+$list_repair->price; ?> 
                      @endif
                    @endforeach
                     จำนวน {{ $number }} รายการ  <br>
                     ราคารวม {{ number_format($number_price, 2) }} บ.
                </td>
            </tr>
        @endforeach
   
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
<!-- //////////////////////////end//////////////////////////// -->
  
    </section>
@include('form/footer')

<!-- js header-leftmenu -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- End js header-leftmenu -->

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

  <!-- select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
    //Initialize Select2 Elements
    $('.select2').select2()
</script>

<script>

  $(function () {
    $('#example').DataTable()
  })
  $(function () {
    $('#example1').DataTable()
  })
  $(function () {
    $('#example2').DataTable()
  })

</script>

