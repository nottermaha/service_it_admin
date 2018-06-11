
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
<link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              ออกรายงาน /
              <small><a>รายการออกรายงาน</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">
@if($chk!=2)  
    <div class="row">
          <div class="col-md-12">
              <div class="box box-default">
                      <!-- <div class="box-header with-border">
                          <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                      </div> -->
                
                <div class="box-body">

                    <?= Form::open(array('url' => '/report-print')) ?>
                      {{ csrf_field() }}
                      <div class="form-group">
                      <label for="Name" class="col-sm-0"></label>
                          <b for="Name" class="col-sm-4" style="padding-top:8;text-align:right;">ออกรายงานทั้งหมด :</b>
                          <div class="col-sm-4"style="margin-top:10px;">
                              <b >หากท่านต้องการออกรายงาน{{$chk_name}}ทั้งหมด</b> 
                          </div>
                            <div style="padding-left:130px;">
                            <input type="hidden" name="chk" value="{{$chk}}">
                            <input type="hidden" name="chk_print" value="1">
                                <button type="submit" class="btn btn-success"><i class="fa fa-download"></i>&nbsp; Excel </button>
                            </div>
                          {!! Form::close() !!}
                      </div>

                      <?= Form::open(array('url' => '/report-print')) ?>
                      {{ csrf_field() }}
                      <div class="form-group">
                      <label for="Name" class="col-sm-0"></label>
                          <b for="Name" class="col-sm-4" style="padding-top:8;text-align:right;">หรือ เลือกเฉพาะร้าน :</b>
                          <div class="col-sm-4">
                              <select required class="form-control select2" style="width: 100%;" name="store_branch_id">
                              <option value=""><b> เลือกร้านที่ต้องการออกรายงาน</b></option>
                              <!-- <option disabled="disabled">California (disabled)</option> -->
                              @foreach ($store_branch as $value)
                              <option value="{{ $value->id }}">{{ $value->name }}</option>
                              @endforeach
                              </select>
                          </div>
                          
                            <div style="padding-left:130px;">
                            <input type="hidden" name="chk" value="{{$chk}}">
                            <input type="hidden" name="chk_print" value="2">
                                <button type="submit" class="btn btn-success"><i class="fa fa-download"></i>&nbsp; Excel </button>
                            </div>
                          {!! Form::close() !!}
                      </div>

                  </div>
              </div>
          </div>
      </div>
@endif
<div class="row">
        <div class="col-xs-12 text-right">
          <?= Form::open(array('url' => '/report-print')) ?>
            <div style="padding-left:130px;">
            <input type="hidden" name="chk" value="{{$chk}}">
            <input type="hidden" name="chk_print" value="3">
                <button type="submit" class="btn btn-success"><i class="fa fa-download fa-lg"></i>&nbsp; Excel</button>
            </div>
            {!! Form::close() !!}
            </div> 
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการ{{$chk_name}}ทั้งหมด</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th class="text-center">#</th>
            @if($chk==3)
            <th class="text-center">ชื่อสาขา</th>
            @else
            <th class="text-center">ชื่อ-สกุล</th>
            @endif
            <th class="text-center">เบอร์โทร</th>
            <th class="text-center">อีเมล์</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($result as $value)
          <tr>
            <td class="text-center">{{ $i=$i+1 }}</td>
            <td class="text-center">{{ $value->name }}</td>
            <td class="text-center">{{ $value->phone }}</td>
            <td class="text-center">{{ $value->email }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>

      </div>
    </div>
    </div>
    </div>
     
        
    </section>
     
   


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
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>

<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })
  //Initialize Select2 Elements
  $('.select2').select2()
</script>



