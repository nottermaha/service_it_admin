
<!-- css header-leftmenu -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, angle-double-right-scalable=no" name="viewport">
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
              อะไหล่ /
              <small><a>รายการอะไหล่</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-list-part">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการอะไหล่</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th class="text-center">รายการ</th>
            <th class="text-center">รุ่น</th>
            <th class="text-center">จำนวน</th>
            <th class="text-center">แก้ไข</th>
            <th class="text-center">ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($list_parts as $list_part)
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td class="text-center">{{ $list_part->name }}</td>
            <td class="text-center">{{ $list_part->generation }}</td>
            <td class="text-center">{{ $list_part->number }}</td>
            <td class="text-center">
              <button type="button" class="btn btn-warning" data-toggle="modal" <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-list-part{{ $list_part->id }}"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
              </button>
            </td>  
            <!-- <td class="text-center"><a href="<?php echo url('/list-part/delete/') ?>/{{$list_part->id}}" 
            class="btn btn-danger">ลบ</a></td> -->
            <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-list-part{{ $list_part->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
          </td>
          <!-- //////////////////////////////modal-delete-list-part//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-list-part{{ $list_part->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/list-part/delete/'.$list_part->id)) ?>
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
    <!-- //////////////////////////////End modal-delete-list-part//////////////////////////////// -->

<!-- //////////////////////////////modal-add-list-part//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-list-part{{ $list_part->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลล็อตใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/list-part-edit')) ?>
          <div class="modal-body">
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่ออะไหล่</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่ออะไหล่..." value="{{ $list_part->name }}" required>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รุ่น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="generation" placeholder="รุ่น..." value="{{ $list_part->generation }}">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">จำนวน</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="number" class="form-control pull-right" id="Name" name="number" placeholder="จำนวน..." value="{{ $list_part->number }}" required>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคาต้นทุนต่อชิ้น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="number" class="form-control pull-right" id="Name" name="pay_in" placeholder="ราคาต้นทุนต่อชิ้น..." value="{{ $list_part->pay_in }}" required>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคาขายต่อชิ้น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="number" class="form-control pull-right" id="Name" name="pay_out" placeholder="ราคาขายต่อชิ้น..." value="{{ $list_part->pay_out }}" required>
                      </div>ราคาขายต่อชิ้นจะนำไปใช้ในการคิดราคาต้นทุน(ราคาอะไหล่)
                    </div>
              </div>
            </div>
            
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="id"value="{{ $list_part->id }}">
          <input type="hidden" name="import_parts_id"value="{{$import_parts_id}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-edit-list-part//////////////////////////////// -->
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
<!-- //////////////////////////////modal-add-list-part//////////////////////////////// -->

        <div class="modal fade " id="modal-add-list-part">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลล็อตใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/list-part-create')) ?>
          <div class="modal-body">
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่ออะไหล่</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่ออะไหล่..." required>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รุ่น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="generation" placeholder="รุ่น..." >
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">จำนวน</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="number" class="form-control pull-right" id="Name" name="number" placeholder="จำนวน..." required>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคาต้นทุนต่อชิ้น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="number" class="form-control pull-right" id="Name" name="pay_in" placeholder="ราคาต้นทุนต่อชิ้น..." required>
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคาขายต่อชิ้น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="number" class="form-control pull-right" id="Name" name="pay_out" placeholder="ราคาขายต่อชิ้น..." required>
                      </div>ราคาขายต่อชิ้นจะนำไปใช้ในการคิดราคาต้นทุน(ราคาอะไหล่)
                    </div>
              </div>
            </div>
            
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="import_parts_id"value="{{$import_parts_id}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-list-part//////////////////////////////// -->

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

