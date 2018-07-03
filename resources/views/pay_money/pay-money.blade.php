
<!-- css header-leftmenu -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
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

</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              สรุปยอดเงิน /
              <small><a>สรุปยอดเงิน รายรับ-รายจ่าย</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

    <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
                  <!-- <div class="box-header with-border">
                      <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                  </div> -->
          <div class="box-body">
                <div class="row">
                <div class="col-md-3">
                      <br>
                      
                      <?= Form::open(array('url' => '/search-pay-money')) ?>
                      {{ csrf_field() }}
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker" name="chk_date_in" placeholder="จากวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>            
                    </div>
                    <div class="col-md-3">
                      <br>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="datepicker2" name="chk_date_out" placeholder="ถึงวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>              
                    </div>
                    @if($s_type == 1)
                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id">      
                        <option value="" ><b>เลือกสาขา</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          @foreach($store_branchs as $store_branch)
                              <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                          @endforeach
                        </select>             
                    </div>
                    @elseif($s_type == 2 || $s_type == 3)
                    <div class="col-md-3">
                      <br>
                        @foreach($store_branchs as $store_branch) 
                          @if($s_store_branch_id==$store_branch->id)
                          <input hidden="text" name="store_branch_id" value="{{$s_store_branch_id}}">
                            <input type="text" name="" class="form-control pull-right" value="{{$store_branch->name}}" disabled>
                          @endif
                        @endforeach           
                    </div>
                    @endif
                    <div class="col-md-2">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_bill">      
                        <option value="" ><b>เลือกหมวด</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                                <option value="2" >รายการทั้งหมด</option>
                                <option value="0" >รายการที่ยังไม่ปิดบิล</option>
                                <option value="1" >รายการที่ปิดบิลแล้ว</option>
                                
                        </select>             
                    </div>

                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                      <input type="hidden" name="chk_table" value="">
                      <button type="submit" class="btn btn-success ">ค้นหา</button>
                    </div>
                      {!! Form::close() !!}
                </div><br>
          </div>
        </div>
      </div>
    </div>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการล็อตอะไหล่</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th class="text-center">บิล</th>
            <th class="text-center">ชื่อลูกค้า</th>
            <!-- <th class="text-center">แก้ไขล่าสุด</th> -->
            <th class="text-center">ช่างช่อม</th>
            <th class="text-center">วันรับเข้าระบบ</th>
            <th class="text-center">ข้อมูลการเงิน</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ;$num_price=0 ;$num_part=0 ;$k=0 ;$temp_num=0?>
        @if($chk == 1)
          @foreach ($repairs as $repair)
          <tr>
          <td>{{ $i=$i+1 }}</td>
          <td>{{ $repair->bin_number }} <br>
          @if($repair->status_pay == 1)
          <b style="color:green;">จ่ายเงินแล้ว</b>
          @elseif($repair->status_pay == 0)
          <b style="color:red;">ยังไม่จ่ายเงิน</b>
          @endif <br>

          @if($repair->status_bill == 1)
          <b style="color:green;">ปิดบิลแล้ว</b>
          @elseif($repair->status_bill == 0)
          <b style="color:red;">ยังไม่ปิดบิล</b>
          @endif <br>

          </td>
          <td>{{ $repair->is_name }} <br>
              @if($repair->type==4) 
              <b style="color:green;">ลูกค้าสมาชิก</b>
              @else   
              <b style="color:blue;">ลูกค้าทั่วไป</b>
              @endif
          </td>
          <td>{{ $repair->persons_name }}</td>
          <td>{{ $repair->date_in }}</td>
          <td>
          
          ราคาประเมิน {{ number_format($repair->price, 2) }} <br>
          รายการที่ซ่อม<br>
          <!-- ///เช็ค รายการซ่อม กับเทเบิลซ่อม// -->
          @foreach ($list_repairs as $list_repair)
            @if( $list_repair->repair_id_from_list == $repair->id )
            - {{ $list_repair->list_name}} <b style="color:blue;">
            
            ราคาที่รับจากลูกค้า {{ number_format($list_repair->price, 2) }}บ.
            <?php $num_price =$num_price+$list_repair->price; ?>
            </b>  <br> ราคาอะไหล่ที่ใช้
            <!-- ///เช็ค การใช้อะไหล่ กับรายการซ่อม// -->
                @foreach($data_use_parts as $data_use_part)
                
                  @if( $list_repair->list_id==$data_use_part->list_repair_id_chk )  
                      <?php $num_part =$num_part+$data_use_part->pay_out; ?>
                      <a>- {{ $data_use_part->list_parts_name }} {{ number_format($data_use_part->pay_out) }}  </a>
                  @endif
                  
                @endforeach   
                <br>
            @endif
            
          @endforeach
          ราคารวมที่รับจากลูกค้า {{ number_format($num_price, 2) }}บ. <br>
          ยอดรวมต้นทุน  {{ $num_part }}บ. <br>
          <?php $temp_num =$num_price-$num_part; ?><?php $num_price = 0;$num_part =0; ?>
          @if( $temp_num>=0 )
          <b style="color:green;">กำไร {{ number_format($temp_num, 2) }}บ.</b> 
          @elseif( $temp_num<0 )
          <b style="color:red;">ขาดทุน {{ number_format($temp_num, 2) }}บ.</b> 
          @endif
          <br>

          </td>

          </tr>
         @endforeach
      @endif

        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>

      
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
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })
  //Initialize Select2 Elements
  $('.select2').select2()

</script>
<script>
  //Date picker
  $('#datepicker').datepicker({
  autoclose: true
  })
  $('#datepicker2').datepicker({
  autoclose: true
  })
</script>

