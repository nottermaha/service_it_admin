
<!-- css header-leftmenu -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- <title>AdminLTE 2 | Dashboard</title> -->
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
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<!-- <script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script> -->
</head>
<!--End css header-leftmenu -->
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

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              สไลด์ภาพ /
              <small><a>รายการสไลด์ภาพ</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">
      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-gallery">
              <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>

      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการสไลด์ภาพ</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th class="text-center">รูปภาพ</th>
            <th class="text-center">แก้ไข</th>
            <th class="text-center">ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($gallerys as $gallery)
          <tr>
          <td>{{ $i=$i+1 }}</td>
          <td class="text-center">
            <a href="{{ asset('image/gallery/picture/'.$gallery->img_url) }}"><img src="{{ asset('image/gallery/resize/'.$gallery->img_url) }}" style="width:400px;height:250px;"></a> 
          </td>

          <td class="text-center"> 
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-gallery{{ $gallery->id }}"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
            </button>
          </td>
          <td class="text-center">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-gallery{{ $gallery->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
            </button>
          </td>
          <!-- <td class="text-center"><a href="<?php echo url('/gallery/delete') ?>/{{$gallery->id}}" 
            class="btn btn-danger">ลบ</a></td> -->

            <!-- //////////////////////////////modal-delete-gallery//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-gallery{{ $gallery->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-red" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/gallery/delete/'.$gallery->id)) ?>
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

           <!-- //////////////////////////////modal-edit-gallery//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-gallery{{ $gallery->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-yellow" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขข้อมูลรูปภาพ</h4>
          </div>        
          <!-- <?= Form::open(array('url' => '/gallery/edit/'.$gallery->id)) ?> -->
          {!!  Form::open(['url'=>'/gallery/edit/'.$gallery->id,'class'=>'form','files'=>true])   !!}
          <div class="modal-body">

          @if(session()->has('status_edit_image_fail'))               
            <script type="text/javascript">
                      $(window).on('load',function(){
                          $('#modal-edit-gallery<?php echo session()->get('status_id'); ?>').modal('show');
                      });   
                </script>   
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> การอัพโหลดรูปล้มเหลว!</h4>
                กรุณาอัพโหลดรูปภาพที่เป็น .png .jpg .gif เท่านั่น.
              </div>       
          @endif
  
          <div class="row" >
              <div class="form-group">
                  <b for="" class="control-label col-md-3"style="text-align:right"></b>
                    <img src="{{ asset('image/gallery/resize/'.$gallery->img_url) }}">
              </div>  
          </div>  

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รูปภาพ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="file" class="form-control pull-right" id="Name" name="img_url" placeholder="รูปภาพ..." value="{{ $gallery->img_url }}">
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
    <!-- //////////////////////////////End modal-edit-gallery//////////////////////////////// -->
     
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
<!-- //////////////////////////////modal-add-gallery//////////////////////////////// -->

        <div class="modal fade " id="modal-add-gallery">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-green" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลรูปภาพ</h4>
          </div>        
          <!-- <?= Form::open(array('url' => '/gallery/create')) ?> -->
          {!!  Form::open(['url'=>'/gallery/create','class'=>'form','files'=>true])   !!}
          <div class="modal-body">
          @if(session()->has('status_create_image_fail'))               
            <script type="text/javascript">
                      $(window).on('load',function(){
                          $('#modal-add-gallery').modal('show');
                      });   
                </script>   
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> การอัพโหลดรูปล้มเหลว!</h4>
                กรุณาอัพโหลดรูปภาพที่เป็น .png .jpg .gif เท่านั่น.
              </div>       
          @endif
            
            <div class="row">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รูปภาพ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="file" class="form-control pull-right" id="Name" name="img_url" placeholder="...">
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
                     timer: 3500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>
    @elseif (session()->has('status_create_fail'))     
     <script>swal({ title: "<?php echo session()->get('status_create_fail'); ?>",        
                     text: "กรุณากรอกเป็นไฟล์รูปภาพ jpg,png,gif",         
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

