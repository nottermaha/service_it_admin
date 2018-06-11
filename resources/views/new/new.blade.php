
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
              ข่าว /
              <small><a>รายการข่าว</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-new">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการข่าวสาร</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th>รูปภาพ</th>
            <th>หัวข้อ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
          </tr>
        </thead>
        
        <tbody>
        <?php $i=0 ?>
          @foreach ($news as $new)
          <tr>
          <td>{{ $i=$i+1 }}</td>
          <td>
            <a href="{{ asset('image/new/picture/'.$new->img_url) }}"><img src="{{ asset('image/new/resize/'.$new->img_url) }}"></a> 
          </td>
            <td>{{ $new->title }}</td>
            <td>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-new{{ $new->id }}">
              <i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
              </button>
           </td>
            <td>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-new{{ $new->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td>
            <!-- //////////////////////////////modal-delete-new//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-new{{ $new->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/new/delete/'.$new->id)) ?>
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
    <!-- //////////////////////////////End modal-delete-new//////////////////////////////// -->
    <!-- //////////////////////////////modal-edit-new//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-new{{ $new->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลล็อตใหม่</h4>
          </div>    
          {!!  Form::open(['url'=>'/new/edit/'.$new->id,'class'=>'form','files'=>true])   !!}    
          <!-- <?= Form::open(array('url' => '/new/edit/'.$new->id)) ?> -->
          <div class="modal-body">
            
          <div class="row" >
              <div class="form-group">
                  <b for="" class="control-label col-md-3"style="text-align:right"></b>
                    <img src="{{ asset('image/new/resize/'.$new->img_url) }}">
              </div>  
          </div>  

          <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รูปภาพ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="file" class="form-control pull-right" id="Name" name="img_url" placeholder="ชื่อสถานะ..." value="{{ $new->img_url }}">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">หัวข้อ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="title" placeholder="หัวข้อ..." value="{{ $new->title }}">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายละเอียด</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                       
                            <textarea id="compose-textarea-edit{{ $new->id }}" class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="detail" value="555">
                            <?php echo  $new->detail;?> 
                            </textarea>
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
    <!-- //////////////////////////////End modal-edit-new/////////////////////////////// -->

          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
    <!-- //////////////////////////////modal-add-new//////////////////////////////// -->

        <div class="modal fade " id="modal-add-new">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลข่าวสารใหม่</h4>
          </div>    
          {!!  Form::open(['url'=>'/new/create','class'=>'form','files'=>true])   !!}  
          <!-- <?= Form::open(array('url' => '/new/create')) ?> -->
          <div class="modal-body">
            
          <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รูปภาพ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="file" class="form-control pull-right" id="Name" name="img_url" placeholder="ชื่อสถานะ..." >
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">หัวข้อ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="title" placeholder="หัวข้อ..." >
                      </div>
                    </div>
              </div>
            </div>

             <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายละเอียด</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                       
                            <textarea id="compose-textarea-add" class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="detail" >
                           
                            </textarea>
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
    <!-- //////////////////////////////End modal-add-new/////////////////////////////// -->
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
<script>
  $(function () {
    //Add text editor
    $("#compose-textarea-add").wysihtml5();
  });
</script>
<script>
  $(function () {
    //Add text editor
    @foreach ($news as $new)
    $("#compose-textarea-edit{{$new->id}}").wysihtml5();
    @endforeach
  });
</script>

