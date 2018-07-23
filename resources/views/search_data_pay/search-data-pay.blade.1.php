
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
      <div class="col-md-12">
        <div class="box box-primary">
                  <!-- <div class="box-header with-border">
                      <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                  </div> -->
          <div class="box-body bg-info">
            <h4>ค้นหาการชำระเงินโดยสามารถ<b style="color:orange;">เลือกลูกค้าสมาชิกได้</b></h4> 
                <div class="row" style="margin-top:-20px;margin-bottom:-20px;">
                <div class="col-md-2" style="margin-right:40px;">
                      <br>
                      
                      <?= Form::open(array('url' => 'search-data-pay')) ?>
                      {{ csrf_field() }}
                     จาก <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_in" placeholder="จากวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>            
                    </div>
                    <div class="col-md-2" style="margin-right:40px;">
                      <br>
                      ถึง<div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_out" placeholder="ถึงวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>              
                    </div>
                    @if($s_type == 1)
                    <div class="col-md-3">
                      <br><br>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id">      
                        <option value="" ><b>เลือกสาขา</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1">สาขาทั้งหมด</option>
                          @foreach($store_branchs as $store_branch)
                              <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                          @endforeach
                        </select>             
                    </div>
                    @elseif($s_type == 2 || $s_type == 3)
                    <div class="col-md-3">
                      <br><br>
                        @foreach($store_branchs as $store_branch) 
                          @if($s_store_branch_id==$store_branch->id)
                          <input hidden="text" name="store_branch_id" value="{{$s_store_branch_id}}">
                            <input type="text" name="" class="form-control pull-right" value="{{$store_branch->name}}" disabled>
                          @endif
                        @endforeach           
                    </div>
                    @endif
                    <div class="col-md-3">
                      <br><br>
                        <select  required class="form-control select2" style="width: 100%;" name="member_id">      
                        <option value="" ><b>เลือกลูกค้าสมาชิก</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1">เลือกทั้งหมด</option>
                          @foreach($persons as $person)
                              <option value="{{ $person->id }}" >{{ $person->name }}</option>
                          @endforeach
                        </select>             
                    </div>
                    <br>
                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                      <input type="hidden" name="chk_person" value="member">
                      <button type="submit" class="btn btn-success ">
                      <i class="fa fa-search"></i></button>
                    </div>
                      {!! Form::close() !!}
                </div><br>

                <?= Form::open(array('url' => '/search-data-pay')) ?>
                      {{ csrf_field() }}
                <h4>ค้นหาการชำระเงินโดยสามารถ<b style="color:blue;">เลือกตามบิล กรณี ลูกค้าทั่วไป</b></h4> 
                <div class="col-md-4">
                        <select  required class="form-control select2" style="width: 100%;" name="repair_id">      
                        <option value="" ><b>เลือกรายการบิล</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          @foreach($get_repairs as $get_repair)
                              <option value="{{ $get_repair->id }}" >
                              {{ $get_repair->bin_number }}  {{ $get_repair->name }} 
                              </option>
                          @endforeach
                        </select>             
                </div>
                <div class="col-md-1 col-xs-1" >
                      <input type="hidden" name="chk_person" value="general">
                      <button type="submit" class="btn btn-success ">
                      <i class="fa fa-search"></i></button>
                </div>
                {!! Form::close() !!}
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title ">รายการชำระเงิน</h3>
            </div>

       <div class="box-body table-responsive  ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th class="text-center">บิล</th>
            <th class="text-center">ชื่อลูกค้า</th>
            <th class="text-center">วันรับเข้าระบบ</th>
            <th class="text-center">วันที่จ่ายเงิน</th>
            <th class="text-center">ข้อมูลการเงิน</th>
          </tr>
        </thead>
        
        <tbody>
        <?php $i=0; ?>
        @if($chk_print == 1)
        @foreach($repairs as $repair)
            <tr>
                <td>{{ $i=$i+1}}</td>
                <td>{{$repair->bin_number}}</td>
                <td>{{$repair->name}}</td>
                <td>{{$repair->date_in_repair}}</td>
                <td>{{$repair->updated_at_pay}}</td>
                <td>บิล</td>
            </tr>
        @endforeach
        @endif
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

</script>

