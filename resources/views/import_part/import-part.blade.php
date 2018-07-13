
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
              ล็อตอะไหล่ /
              <small><a>รายการล็อตอะไหล่</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-import-part">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>
      <br>

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
            <th class="text-center">รายการ</th>
            <th class="text-center">สร้างล๊อตเมื่อ</th>
            <!-- <th class="text-center">แก้ไขล่าสุด</th> -->
            <th class="text-center">รายการอะไหล่</th>
            <th class="text-center">แก้ไข</th>
            <th class="text-center">ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($Import_parts as $Import_part)
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td class="text-center">{{ $Import_part->lot_name }}</td>
            <td class="text-center">{{ $Import_part->date }}</td>
            <!-- <td class="text-center">{{ $Import_part->updated_at }}</td> -->
            <td class="text-center">
            <?= Form::open(array('url' => '/list-part')) ?>
            <input type="hidden" name="id" value="{{$Import_part->id}}">
            <button type="submit" class="btn btn-default"><i class="fa fa-list fa-lg"></i>&nbsp;รายการอะไหล่</button>
            {!! Form::close() !!}
            </td> 
            <td class="text-center">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-import-part{{ $Import_part->id }}">
                <i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
            </button>
            </td>
            <!-- <td class="text-center">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-import-part{{ $Import_part->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
            </button>
          </td> -->
          @if($Import_part->status==1)
            <td class="text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-delete-import-part{{ $Import_part->id }}"><i class="fa fa-power-off fa-lg"></i>&nbsp; เปิดใช้งาน
              </button>
            </td>
            @elseif($Import_part->status==0)
            <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-import-part{{ $Import_part->id }}"><i class="fa fa-power-off fa-lg"></i>&nbsp; ปิดใช้งาน
              </button>
            </td>
            @endif

          <!-- //////////////////////////////modal-delete-import-part//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-import-part{{ $Import_part->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">สถานะการเปิดปิดการใช้งานล็อตอะไหล่</h4>
                  </div>        
                <?= Form::open(array('url' => '/import_part/delete/'.$Import_part->id)) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                        @if($Import_part->status==1)
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ปิดการใช้งาน" เพื่อยืนยันการปิดการใช้งาน </b>
                        @elseif($Import_part->status==0)
                        <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "เปิดการใช้งาน" เพื่อยืนยันการเปิดการใช้งาน </b>
                        @endif
                        <br><I style="padding-left:10px;">การ "ปิดการใช้งาน" จะทำให้ไม่สามารถใช้อะไหล่ในล็อตนี้ ( ในหน้ารายการซ่อมของท่าน(ช่าง) ) ได้</I>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <!-- <button type="submit" class="btn btn-danger">ลบข้อมูล</button> -->
                        @if($Import_part->status==1)
                        <button type="submit" class="btn btn-danger"><i class="fa fa-power-off fa-lg"></i>
                        &nbsp;ปิดการใช้งาน</button>
                        @elseif($Import_part->status==0)
                        <button type="submit" class="btn btn-success"><i class="fa fa-power-off fa-lg"></i>
                        &nbsp;เปิดการใช้งาน</button>
                        @endif
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-import-part//////////////////////////////// -->

      <!-- //////////////////////////////modal-edit-import-part//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-import-part{{ $Import_part->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขข้อมูลล็อตอะไหล่</h4>
          </div>        
          <?= Form::open(array('url' => '/import_part/edit/'.$Import_part->id)) ?>
          <div class="modal-body">
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่อล็อต <b style="color:red;font-size:20px;">*</b></b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-dropbox fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="lot_name" placeholder="ชื่อล็อต..." value="{{ $Import_part->lot_name }}" required>
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
    <!-- //////////////////////////////End modal-edit-import-part//////////////////////////////// -->
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>

       <!-- //////////////////////////////modal-add-import-part//////////////////////////////// -->

        <div class="modal fade " id="modal-add-import-part">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลล็อตใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/import_part/create')) ?>
          <div class="modal-body">
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่อล็อต <b style="color:red;font-size:20px;">*</b></b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-dropbox fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="lot_name" placeholder="ชื่อล็อต..." required>
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
    <!-- //////////////////////////////End modal-add-import-part//////////////////////////////// -->

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

