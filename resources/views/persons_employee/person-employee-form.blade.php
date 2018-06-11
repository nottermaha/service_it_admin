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

</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')

    <section class="content">
  <!-- <form role="form" class="form-horizontal" action="/person/create" method="post"> -->
  <!-- <form role="form" class="form-horizontal" action="<?php echo url('/person-employee/create') ?>" method="post"> -->

    {!!  Form::open(['url'=>'/person-employee-create','class'=>'form-horizontal','files'=>true])   !!}
<div class="row">
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-body">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Name" class="control-label col-sm-3">ร้านที่สังกัด</label>
                    <div for="Name" class="control-label col-sm-3">
                    {{$store_branch_name}}
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">บันทึกข้อมูลทั่วไป</h3>
                </div>
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Name" class="control-label col-sm-3">ชื่อ-นามสกุล</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="Name" name="name" placeholder="ชื่อ-นามสกุล...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="Person_id" class="control-label col-sm-3">เลขประจำตัวประชาชน</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="Person_id" name="person_id" placeholder="เลขประจำตัวประชาชน...">
                        </div>
                </div>

                <div class="form-group">
                    <label for="Gender" class="control-label col-sm-3">เพศ</label>
                        <div class="col-sm-2">
                            <label>
                                <input type="radio" name="gender" class="flat-red2" checked value="1">
                            </label>&nbsp;&nbsp;ชาย  
                        </div>
                        <div class="col-sm-2">
                            <label>
                                <input type="radio" name="gender" class="flat-red2" value="2">
                            </label>&nbsp;&nbsp;หญิง
                        </div>
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">วัน/เดือน/ปีเกิด</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" name="birthday" placeholder="วัน/เดือน/ปีเกิด..." data-date-format="yyyy-mm-dd">
                            </div>
                        </div>          
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">อีเมล์</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Email" name="email" placeholder="อีเมล์...">
                            </div>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">เบอร์โทร</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone fa-lg"></i>
                                </div>
                                    <input type="text" class="form-control pull-right" id="Phone" name="phone" placeholder="เบอร์โทร...">
                            </div>
                        </div> 
                </div> 

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รูปประจำตัว</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-picture-o fa-lg"></i>
                                </div>
                                <input type="file" class="form-control pull-right" id="Image" name="image_url" placeholder="รูปประจำตัว...">
                            </div>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Address" class="control-label col-sm-3">ที่อยู่</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" placeholder="ที่อยู่ ..." name="address"></textarea>
                        </div>
                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                </div>
            <div class="box-body">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">ชื่อผู้ใช้</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-user fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Username" name="username" placeholder="ชื่อผู้ใช้..." >
                            </div>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รหัสผ่าน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Password" name="password" placeholder="รหัสผ่าน..." >
                            </div>
                        </div>  
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รหัสผ่านอีกครั้ง</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Password" name="password" placeholder="ป้อนรหัสผ่านเดิม...">
                            </div>
                        </div>  
                </div>
            
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">บันทึกข้อมูลรายละเอียดงาน</h3>
            </div>
            <div class="box-body">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">ตำแหน่ง</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-user fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Position" name="position" placeholder="ตำแหน่ง...">
                            </div>
                        </div> 
                </div> 

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">เงินเดือน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Salary" name="salary" placeholder="เงินเดือน...">
                            </div>
                        </div>    
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">วันเข้าเป็นพนักงาน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker2" name="date_in" placeholder="วันเข้าเป็นพนักงาน..." data-date-format="yyyy-mm-dd">
                            </div>
                        </div>
                </div> 

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">วันออกจากงาน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar fa-lg"></i>
                                </div>
                                    <input type="text" class="form-control pull-right" id="datepicker3" name="date_out" placeholder="วันออกจากงาน..." data-date-format="yyyy-mm-dd">
                                </div>
                            </div>
                        </div> 
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-right">
        <input type="hidden" name="check" value="1">
        <input type="hidden" name="store_branch_id" value="{{$store_branch_id}}">
          <button type="submit" class="btn btn-success">บันทึก</button>
        </div>
    </div>
  </form>

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

<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">


<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>


<script>
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red2, input[type="radio"].flat-red2').iCheck({
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
    //Initialize Select2 Elements
    $('.select2').select2()
</script>
