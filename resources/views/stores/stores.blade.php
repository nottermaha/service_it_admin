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
              ร้านสาขา /
              <small><a>รายการร้านสาขา</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
          <!-- <?= link_to('store-form',$title='add data',['class'=>'btn btn-primary '],['data-toggle'=>'btn btn-primary '],['data-toggle'=>'#modal-default '],$secure=null); ?> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-branch">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>

      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการร้านสาขา</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead>
          <tr >
            <th>#</th>
            <th>สาขา</th>
            <th class="text-center">สถานะ</th>
            <th class="text-center">แก้ไข</th>
            <!-- <th class="text-center">ลบ</th> -->
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($stores as $store )
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td >
              <a href=""data-toggle="modal" data-target="#modal-show-store-branch">{{ $store->name }}</a>
            </td>
            @if($store->status==1)
            <td class="text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-delete-branch{{ $store->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; เปิดใช้งาน
              </button>
            </td>
            @elseif($store->status==0)
            <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-branch{{ $store->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ปิดใช้งาน
              </button>
            </td>
            @endif
            <td class="text-center">
              <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-branch{{ $store->id }}"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข</a>
            </td> 
            <!-- <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-branch{{ $store->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td> -->
            <!-- //////////////////////////////modal-delete-branch//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-branch{{ $store->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/store-branch/delete/'.$store->id)) ?>
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
    <!-- //////////////////////////////End modal-delete-store//////////////////////////////// -->

<!-- //////////////////////////////modal-edit-branch//////////////////////////////// -->
      <div class="modal fade" id="modal-edit-branch{{ $store->id }}">
        <div class="modal-dialog" style="width:50%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แก้ไขข้อมูลสาขา</h4>
            </div>        
          <?= Form::open(array('url' => '/store-branch/edit/'. $store->id)) ?>   
          <div class="modal-body">
            <div class="row">
              <div class="form-group">
                <b for="" class="control-label col-sm-2"style="text-align:right">ชื่อสาขา</b>
                <div class="col-sm-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </div>
                      <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อสาขา..." value="{{ $store->name }}">
                  </div>
                </div>
              </div>
            </div><br>
          <!-- </div> <br> -->
          <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">เบอร์โทร</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="phone" placeholder="เบอร์โทร..." value="{{ $store->phone }}">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">อีเมล์</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="email" placeholder="อีเมล์..." value="{{ $store->email }}">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">แผนที่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="map" placeholder="แผนที่..." value="{{ $store->map }}">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ที่อยู่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="address" placeholder="ที่อยู่..." value="{{ $store->address }}">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">รายละเอียดเพิ่มเติม</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม..." value="{{ $store->detail }}">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ช่องทางการติดต่อเพิ่มเติม</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="contact" placeholder="ช่องทางการติดต่อเพิ่มเติม..." value="{{ $store->contact }}">
                      </div>
                    </div>
                  </div>
                </div><br>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
<!-- //////////////////////////////Enfmodal-edit-branch//////////////////////////////// -->

          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
    </section>
    <!-- //////////////////////////////modal-add-branch//////////////////////////////// -->

        <div class="modal fade" id="modal-add-branch" >
        
            <div class="modal-dialog"style="width:50%;">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">บันทึกข้อมูลสาขาใหม่</h4>
              </div>        
              <?= Form::open(array('url' => '/store-branch/create')) ?>
              <div class="modal-body">
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ชื่อสาขา</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อสาขา...">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">เบอร์โทร</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="phone" placeholder="เบอร์โทร...">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">อีเมล์</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="email" placeholder="อีเมล์...">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">แผนที่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="map" placeholder="แผนที่...">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ที่อยู่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="address" placeholder="ที่อยู่...">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">รายละเอียดเพิ่มเติม</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม...">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ช่องทางการติดต่อเพิ่มเติม</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="contact" placeholder="ช่องทางการติดต่อเพิ่มเติม...">
                      </div>
                    </div>
                  </div>
                </div>
              </div><br> 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
              </div>
              {!! Form::close() !!}
            </div>
          </div>          
        </div>
        <!-- //////////////////////////////End modal-add-branch//////////////////////////////// -->
        
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

  $(function () {
    $('#example').DataTable()
  })

</script>

