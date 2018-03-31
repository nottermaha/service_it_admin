@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>ฟอร์มบันทึกข้อมูลร้านสาขา</h1>
@stop

@section('content')
  <!-- <form role="form" class="form-horizontal" action="/person/create" method="post"> -->
  <form role="form" class="form-horizontal" action="<?php echo url('/person/create') ?>" method="post">

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
  </div>
  
    <div class="box-body">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="Birthday" class="control-label col-sm-2">ชื่อผู้ใช้</label>
        <div class="col-sm-4">
          <div class="input-group date">
              <div class="input-group-addon">
                  <i class="fa fa-user fa-lg"></i>
              </div>
                  <input type="text" class="form-control pull-right" id="Username" name="username" placeholder="ชื่อผู้ใช้..." value="name">
            </div>
        </div> 

        <label for="Birthday" class="control-label col-sm-2">รหัสผ่าน</label>
        <div class="col-sm-4">
          <div class="input-group date">
              <div class="input-group-addon">
                  <i class="fa fa-lock fa-lg"></i>
              </div>
                  <input type="text" class="form-control pull-right" id="Password" name="password" placeholder="รหัสผ่าน...">
            </div>
        </div>  

    </div>

    <div class="form-group">
        <label for="Status" class="control-label col-sm-2">สถานะ</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="Status" name="Status" placeholder="สถานะ...">
        </div>
    </div>
      
    </div>
</div>


<div class="row">
        <div class="col-sm-12 text-right">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
      </div>

  </form>


@stop

@section('css')
<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
@stop

@section('js')
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<script>
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
  })
  //Date picker
  $('#datepicker').datepicker({
  autoclose: true
  })
  $('#datepicker2').datepicker({
  autoclose: true
  })
  $('#datepicker3').datepicker({
  autoclose: true
  })
</script>
@stop