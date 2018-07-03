


  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: center;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette-box h4 {
      position: absolute;
      top: 100%;
      left: 25px;
      margin-top: -40px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
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
              สถานะรายการแจ้งซ่อม (หน้าร้าน) /
              <small><a>สถานะรายการแจ้งซ่อม</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-setting-status-repair">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการตั้งค่าสถานะการแจ้งซ่อม</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th class="text-center">ชื่อสถานะ</th>
            <th class="text-center">สี</th>
            <th class="text-center">แก้ไข</th>
            <th class="text-center">ลบ</th>
          </tr>
        </thead>
        
        <tbody>
        <?php $i=0 ?>
          @foreach ($setting_status_repairs as $setting_status_repair)
          <tr>
          <td>{{ $i=$i+1 }}</td>
            <td class="text-center">{{ $setting_status_repair->name }}</td>
            <td class="text-center">
            @if($setting_status_repair->status_color==1) 
            <div class="bg-light-blue-active color-palette"><span>น้ำเงิน</span>
            @elseif($setting_status_repair->status_color==2)
            <div class="bg-aqua-active color-palette"><span>ฟ้า</span></div>
            @elseif($setting_status_repair->status_color==3)
            <div class="bg-green-active color-palette"><span>เขียว</span></div>
            @elseif($setting_status_repair->status_color==4)
            <div class="bg-yellow-active color-palette"><span>เหลือง</span></div>
            @elseif($setting_status_repair->status_color==5)
            <div class="bg-red-active color-palette"><span>แดง</span></div>
            @elseif($setting_status_repair->status_color==6)
            <div class="bg-gray-active color-palette"><span>เทา</span></div>
            @elseif($setting_status_repair->status_color==7)
            <div class="bg-navy color-palette"><span>น้ำเงินเข้ม</span></div>
            @elseif($setting_status_repair->status_color==8)
            <div class="bg-teal-active color-palette"><span>ฟ้าอ่อน</span></div>
            @elseif($setting_status_repair->status_color==9)
            <div class="bg-purple-active color-palette"><span>ม่วง</span></div>
            @elseif($setting_status_repair->status_color==10)
            <div class="bg-orange-active color-palette"><span>ส้ม</span></div>
            @elseif($setting_status_repair->status_color==11)
            <div class="bg-maroon-active color-palette"><span>ชมพู</span></div>
            @elseif($setting_status_repair->status_color==12)  
            <div class="bg-black-active color-palette"><span>ดำ</span></div>
            @endif
            </td>
            <td class="text-center">
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-setting-status-repair{{ $setting_status_repair->id }}">
              <i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
              </button>
           </td>
             <!-- <td class="text-center"><a href="<?php echo url('/setting-status-repair/delete') ?>/{{$setting_status_repair->id}}" 
            class="btn btn-danger">ลบ</a></td>  -->
            <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-setting-status-repair{{ $setting_status_repair->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td>
            <!-- //////////////////////////////modal-delete-gallery//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-setting-status-repair{{ $setting_status_repair->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/setting-status-repair-shop/delete/'.$setting_status_repair->id)) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบข้อมูล </b>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-gallery//////////////////////////////// -->

<!-- //////////////////////////////modal-edit-setting-status-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-setting-status-repair{{ $setting_status_repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลล็อตใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/setting-status-repair-shop/edit/'.$setting_status_repair->id)) ?>
          <div class="modal-body">
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่อสถานะ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อสถานะ..." value="{{ $setting_status_repair->name }}" required>
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">เลือกสี</b>
                    <div class="col-md-8">

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" id=""class="flat-red2"  value="1"
                                @if($setting_status_repair->status_color==1) checked @endif >
                            </label>น้ำเงิน
                            <div class="bg-light-blue-active color-palette"><span>น้ำเงิน</span>
                            </div> 
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="2" 
                                @if($setting_status_repair->status_color==2) checked @endif>
                            </label>ฟ้า
                            <div class="bg-aqua-active color-palette"><span>ฟ้า</span></div> 
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="3" 
                                @if($setting_status_repair->status_color==3) checked @endif>
                            </label>เขียว
                            <div class="bg-green-active color-palette"><span>เขียว</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="4" 
                                @if($setting_status_repair->status_color==4) checked @endif>
                            </label>เหลือง
                            <div class="bg-yellow-active color-palette"><span>เหลือง</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="5" 
                                @if($setting_status_repair->status_color==5) checked @endif>
                            </label>แดง
                            <div class="bg-red-active color-palette"><span>แดง</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="6" 
                                @if($setting_status_repair->status_color==6) checked @endif>
                            </label>เทา
                            <div class="bg-gray-active color-palette"><span>เทา</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="7"
                                @if($setting_status_repair->status_color==7) checked @endif>
                            </label>น้ำเงินเข้ม
                            <div class="bg-navy color-palette"><span>น้ำเงินเข้ม</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="8"
                                @if($setting_status_repair->status_color==8) checked @endif>
                            </label>ฟ้าอ่อน
                            <div class="bg-teal-active color-palette"><span>ฟ้าอ่อน</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="9"
                                @if($setting_status_repair->status_color==9) checked @endif>
                            </label>ม่วง
                            <div class="bg-purple-active color-palette"><span>ม่วง</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="10"
                                @if($setting_status_repair->status_color==10) checked @endif>
                            </label>ส้ม
                            <div class="bg-orange-active color-palette"><span>ส้ม</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="11"
                                @if($setting_status_repair->status_color==11) checked @endif>
                            </label>ชมพู
                            <div class="bg-maroon-active color-palette"><span>ชมพู</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="12"
                                @if($setting_status_repair->status_color==12) checked @endif>
                            </label>ดำ
                            <div class="bg-black-active color-palette"><span>ดำ</span></div>
                      </div>
                    </div>
                        

                    </div>

              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-edit-setting-status-repair//////////////////////////////// -->
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
       <!-- //////////////////////////////modal-add-setting-status-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-add-setting-status-repair">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลล็อตใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/setting-status-repair-shop/create')) ?>
          <div class="modal-body">
            
          <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่อสถานะ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อสถานะ..." required>
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">เลือกสี</b>
                    <div class="col-md-8">

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" id=""class="flat-red2"  value="1" checked>
                            </label>น้ำเงิน
                            <div class="bg-light-blue-active color-palette"><span>น้ำเงิน</span>
                            </div> 
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="2">
                            </label>ฟ้า
                            <div class="bg-aqua-active color-palette"><span>ฟ้า</span></div> 
                      </div>
                    </div>

                     <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="3">
                            </label>เขียว
                            <div class="bg-green-active color-palette"><span>เขียว</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="4">
                            </label>เหลือง
                            <div class="bg-yellow-active color-palette"><span>เหลือง</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="5">
                            </label>แดง
                            <div class="bg-red-active color-palette"><span>แดง</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="6">
                            </label>เทา
                            <div class="bg-gray-active color-palette"><span>เทา</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="7">
                            </label>น้ำเงินเข้ม
                            <div class="bg-navy color-palette"><span>น้ำเงินเข้ม</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="8">
                            </label>ฟ้าอ่อน
                            <div class="bg-teal-active color-palette"><span>ฟ้าอ่อน</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="9">
                            </label>ม่วง
                            <div class="bg-purple-active color-palette"><span>ม่วง</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="10">
                            </label>ส้ม
                            <div class="bg-orange-active color-palette"><span>ส้ม</span></div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-5" >
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="11">
                            </label>ชมพู
                            <div class="bg-maroon-active color-palette"><span>ชมพู</span></div>
                      </div>
                            <div class="col-md-2"></div>
                      <div class="col-md-5" style="">
                            <label>
                                <input type="radio" name="status_color" class="flat-red2"  value="12">
                            </label>ดำ
                            <div class="bg-black-active color-palette"><span>ดำ</span></div>
                      </div>
                    </div>
                        

                    </div>

              </div>
            </div>

          </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-setting-status-repair//////////////////////////////// -->

        @if (session()->has('status_create'))     
     <script>swal({ title: "<?php echo session()->get('status_create'); ?>",        
                     text: "ผลการทํางาน",         
                     timer: 2500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>
     @elseif (session()->has('status_edit'))     
     <script>swal({ title: "<?php echo session()->get('status_edit'); ?>",        
                     text: "ผลการทํางาน",         
                     timer: 2500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>
         @elseif (session()->has('status_delete'))     
     <script>swal({ title: "<?php echo session()->get('status_delete'); ?>",        
                     text: "ผลการทํางาน",         
                     timer: 2500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>
     @endif 

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

<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })
  //Initialize Select2 Elements
  $('.select2').select2()

</script>

