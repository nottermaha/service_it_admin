
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
              บุคคล /
              <small><a>ค้นหารายการบุคคล</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

<div class="container">
    <div class="row">
      <div class="col-md-11">
        <div class="box box-default">
                  <!-- <div class="box-header with-border">
                      <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                  </div> -->
          <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                      <br>
                      {{ csrf_field() }}
                      <?= Form::open(array('url' => '/persons-form-search2')) ?>
                        <select  required class="form-control select2" style="width: 100%;" name="person_type_select" onchange="this.form.submit()">
                        @if($check==0)
                        <option value="" ><b>เลือกประเภทบุคคล</b></option>
                        @elseif($check==1)
                        <option value="" ><b>{{ $type_select }}</b></option>
                        @endif
                        <!-- <option disabled="disabled">California (disabled)</option> -->
                        @if($type==1)
                        <option value="2" >ผู้จัดการร้าน</option>
                        @endif
                        @if($type==2||$type==1)
                        <option value="3" >พนักงาน</option>
                        @endif
                        @if($type==3||$type==2||$type==1)
                        <option value="4" >สมาชิก</option>
                        @endif
                        </select>
                      {!! Form::close() !!}
                    </div>
                    <div class="col-md-7">
                      <br>
                      
                      {{ csrf_field() }}
                      <?= Form::open(array('url' => '/persons-search')) ?>
                        <select  required class="form-control select2" style="width: 100%;" name="person_id">
                        @if($check_store==0)
                        <option value="" ><b>เลือกบุคคล</b></option>
                          @foreach($store_branchs as $store_branch)
                          <option disabled="disabled">{{ $store_branch->name }}</option>
                            @foreach($persons as $person)
                              @if($person->store_branch_id == $store_branch->id)
                                <option value="{{ $person->id }}" > - {{ $person->name }}</option>
                              @endif
                            @endforeach
                          @endforeach
                        @elseif($check_store==1)
                        <option value="" ><b>เลือกบุคคล</b></option>
                            @foreach($persons as $person)
                                <option value="{{ $person->id }}" > - {{ $person->name }}</option>
                            @endforeach
                        @endif
                        </select>             
                    </div>
                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                    <input type="hidden" name="chk_table" value="{{ $check_table }}">
                      <button type="submit" class="btn btn-success ">ค้นหา</button>
                  </div>
                  {!! Form::close() !!}
                </div><br>
                  <!-- <br><br> -->
                      <!-- <div class="col-md-1"></div> -->
                          <!-- <div class="col-md-8 col-xs-8" style="margin-left:150px;">
                            <div class="alert alert-warning alert-dismissible">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h4><i class="icon fa fa-warning"></i> ไม่พบรายการดังกล่าว</h4>
                              กรุณาตรวจสอบหมายเลขบิลของท่านให้ถูกต้อง
                            </div>
                          </div> -->
                </div>
          </div>
        </div>
      </div>
    </div>

    @if($check_show==1)
    <div class="col-md-1" style="margin-right:50px;">
    </div>
    <div class="col-md-8" >
    <div class="panel" >
    <div class="panel-body">
        <h3 class="title-hero">
            <h3 class="modal-title text-center" style="color:gray;"><b>รายละเอียด</b></h3>
        </h3>
        <br>
        <div class="box box-info">
            <div class="box-header">
              <!-- <h3 class="box-title">Color & Time Picker</h3> -->
            </div>
            <div class="box-body">

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ชื่อ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $name }}</b>
                        </div>
                    </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          เพศ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          @if($gender==1)ชาย 
                          @else หญิง 
                          @endif</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                       <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          เบอร์โทร : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $phone }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันเกิด : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $birth }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          อีเมล์ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $email }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ที่อยู่ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $address }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่เป็นสมาชิกของระบบ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                         {{ $created }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">


            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
        
    </div>
</div>
@endif
    </div>
        
    <div class="col-md-2">
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

  <!-- select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
    //Initialize Select2 Elements
    $('.select2').select2()
</script>
<script>
$('[name="person_type_select"]').change(function() {
  $(this).closest('form').submit();
});
</script>