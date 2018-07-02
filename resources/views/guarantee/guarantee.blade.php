
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
  <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
  <script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<!-- <script src="https://unpkg.com/promise-polyfill@7.1.0/dist/promise.min.js"></script> -->
<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              รับประกัน /
              <small><a>รายการรับประกัน</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">
    <div class="col-md-1"></div>
    {!!  Form::open(['url'=>'/guarantee-edit-only','class'=>'form-horizontal','files'=>true])   !!}
    {{ csrf_field() }}
    <div class="col-md-10">
        <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">บันทึกข้อมูลรายละเอียดการรับประกัน</h3>
                    <I><h5>ข้อมูลส่วนนี้จะแสดงในหน้าใช้งานของลูกค้า ในส่วนของการรับประกัน</h5></I>
                </div>
            <div class="box-body">
            <input type="hidden" name="_token" value="fHc8pJvh1Gj4zf3SYopWZGvi0VztqE9wno25Za8z">

                <div class="form-group">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <textarea  class="ckeditor" cols="80" id="editor" rows="10"name="detail" value="{{ $detail }}">{{ $detail }}
                    </textarea>  <br>                  
                    <div class="text-right">
                    <input type="hidden" name="id" value="{{ $id }}">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-edit fa-lg"></i>&nbsp;แก้ไขข้อมูล</button>
                    </div>
                </div>

                </div>
            </div>
        </div>
        
    </div>
    {!! Form::close() !!}
    
      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-guarantee">
              <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>

      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการรับประกัน</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th>รูปภาพ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($guarantees as $guarantee)
          <tr>
          <td>{{ $i=$i+1 }}</td>
          <td>
            {{ $guarantee->name }} 
          </td>
          <td> 
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-guarantee{{ $guarantee->id }}"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
            </button>
          </td>
          <td>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-guarantee{{ $guarantee->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
            </button>
          </td>
                      <!-- //////////////////////////////modal-delete-guarantee//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-guarantee{{ $guarantee->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/guarantee/delete/'.$guarantee->id)) ?>
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
    <!-- //////////////////////////////End modal-delete-guarantee//////////////////////////////// -->
         
         <!-- //////////////////////////////modal-edit-guarantee//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-guarantee{{ $guarantee->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลการรับประกันใหม่</h4>
          </div>        
          {!!  Form::open(['url'=>'/guarantee/edit/'.$guarantee->id,'class'=>'form','files'=>true])   !!}
          <div class="modal-body">
            
            <div class="row">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายการรับประกัน</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" value="{{ $guarantee->name }}">
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
    <!-- //////////////////////////////End modal-edit-guarantee//////////////////////////////// -->
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>

<!-- //////////////////////////////modal-add-guarantee//////////////////////////////// -->

        <div class="modal fade " id="modal-add-guarantee">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลการรับประกันใหม่</h4>
          </div>        
          {!!  Form::open(['url'=>'/guarantee/create','class'=>'form','files'=>true])   !!}
          <div class="modal-body">
            
            <div class="row">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายการรับประกัน</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="รายการรับประกัน...">
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
    <!-- //////////////////////////////End modal-add-guarantee//////////////////////////////// -->

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

