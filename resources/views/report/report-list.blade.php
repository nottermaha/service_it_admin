
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

    <div class="row">

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/512/user-male-icon.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">รายงานข้อมูลพนักงาน</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">รายการพนักงานทั้งหมด <span class="pull-right badge bg-blue">
                {{ $countgernderall_em }}</span></a></li>
                <li><a href="#">ชาย <span class="pull-right badge bg-aqua">{{ $countmale_em }}</span></a></li>
                <li><a href="#">หญิง <span class="pull-right badge bg-green">{{ $countfemale_em }}</span></a></li>
                <li><a href="#">ไม่ระบุ <span class="pull-right badge bg-green">{{ $countundefine_em }}</span></a></li>
                <li><a href="#">ออกรายงาน <span class="pull-right ">
                <?= Form::open(array('url' => '/report-detail')) ?>
                <input type="hidden" name="chk" value="1">
                        <button type="submit" class="btn btn-default">คลิก</button>
                {!! Form::close() !!}
                
                </span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>

        <!-- /.col -->
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">รายงานข้อมูลสมาชิก</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">รายการสมาชิกทั้งหมด <span class="pull-right badge bg-blue">{{ $countgernderall_me }}</span></a></li>
                <li><a href="#">ชาย <span class="pull-right badge bg-aqua">{{ $countmale_me }}</span></a></li>
                <li><a href="#">หญิง<span class="pull-right badge bg-green">{{ $countfemale_me }}</span></a></li>
                <li><a href="#">ไม่ระบุ<span class="pull-right badge bg-green">{{ $countundefine_me }}</span></a></li>
                <li><a href="#">ออกรายงาน <span class="pull-right">
                <?= Form::open(array('url' => '/report-detail')) ?>
                <input type="hidden" name="chk" value="2">
                        <button type="submit" class="btn btn-default">คลิก</button>
                {!! Form::close() !!}
                </span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="https://png.pngtree.com/element_origin_min_pic/16/07/03/2057790adc884f5.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">รายงานข้อมูลร้าน</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">รายการร้านทั้งหมด <span class="pull-right badge bg-blue">
                {{ $countall_st }}</span></a></li>
                <li><a href="#">ร้านที่เปิดทำการ <span class="pull-right badge bg-aqua">
                {{ $countopen_st }}</span></a></li>
                <li><a href="#">ร้านที่ปิดทำการ <span class="pull-right badge bg-green">
                {{ $countclose_st }}</span></a></li>
                <li><a href="#">ออกรายงาน <span class="pull-right ">
                <?= Form::open(array('url' => '/report-detail')) ?>
                <input type="hidden" name="chk" value="3">
                        <button type="submit" class="btn btn-default">คลิก</button>
                {!! Form::close() !!}
                </span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
                <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
              <div class="widget-user-image">
                <img class="img-circle" src="https://png.pngtree.com/element_origin_min_pic/16/11/12/4eb0e9d8dffad514c5e5a0713980689e.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">รายงานข้อมูลการซ่อมสินค้า</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">รายการซ่อมทั้งหมด<span class="pull-right badge bg-blue">
                {{ $countall_re }}</span></a></li>
                <li><a href="#">ลูกค้าสมาชิก<span class="pull-right badge bg-aqua">{{ $countmember_re }}</span></a></li>
                <li><a href="#">ลูกค้าทั่วไป<span class="pull-right badge bg-green">{{ $countgeneral_re }}</span></a></li>
                <li><a href="#">ออกรายงาน <span class="pull-right ">
                <?= Form::open(array('url' => '/report-detail')) ?>
                <input type="hidden" name="chk" value="4">
                        <button type="submit" class="btn btn-default">คลิก</button>
                {!! Form::close() !!}
                </span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="http://download.seaicons.com/icons/paomedia/small-n-flat/1024/wrench-screwdriver-icon.png" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">รายงานข้อมูลอะไหล่</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">ล็อตอะไหล่ทั้งหมด <span class="pull-right badge bg-blue">
                {{ $countlot_pa }}</span></a></li>
                <li><a href="#">รายการอะไหล่ทั้งหมด <span class="pull-right badge bg-aqua">
                {{ $countall_pa }}</span></a></li>
                <li><a href="#">รายการอะไหล่เหลือน้อย <span class="pull-right badge bg-green">
                {{ $countlittle_pa }}</span></a></li>
                <li><a href="#">ออกรายงาน <span class="pull-right ">
                <?= Form::open(array('url' => '/report-detail')) ?>
                <input type="hidden" name="chk" value="5">
                        <button type="submit" class="btn btn-default">คลิก</button>
                {!! Form::close() !!}
                </span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
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



