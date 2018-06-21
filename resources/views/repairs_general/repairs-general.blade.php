
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
              ซ่อมอุปกรณ์ /
              <small><a>ลูกค้าทั่วไป</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">
      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-repair">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการซ่อมอุปกรณ์ ลูกค้าทั่วไป</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th>เลขบิล</th>
            <th>ชื่อ-สกุล</th>
            <th>ราคา</th>
            <th>ช่างซ่อม</th>
            <th class="text-center">รายการที่ซ่อม</th>
            <!-- <th class="text-center">ปิดบิล</th> -->
            <th class="text-center">สถานะ</th>
            <!-- <th>แก้ไข</th> -->
            <!-- <th>ลบ</th> -->
            <th class="text-center">เมนูจัดการ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($repairs as $repair)
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td>{{ $repair->bin_number }}</td>
            <td>{{ $repair->name }}</td>
            <td>{{ $repair->price }}</td>
            <td>{{ $repair->persons_id }}</td>
            <td class="text-center">
            <!-- <a href="{{ url('/list-repair/'.$repair->id)  }}" class="btn btn-default"><i class="fa fa-list fa-lg"></i>&nbsp;รายการที่ซ่อม</a></a> -->
            <?= Form::open(array('url' => '/list-repair' )) ?>
            <input type="text" name="id" value="{{ $repair->id }}">
            <button type="submit" class="btn btn-default"><i class="fa fa-list fa-lg"></i>&nbsp;รายการที่ซ่อม</button>
          {!! Form::close() !!}
          </td> 
            <!-- <td class="text-center"><a href="" class="btn btn-danger"></i>&nbsp; ปิดบิล</a></a></td>  -->
            @if($repair->status_repair==1)
            <td class="text-center">
            <button style="width:190px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">สินค้าที่พึ่งเข้าระบบ
            </td>
            @elseif($repair->status_repair==2)
            <td class="text-center">
            <button style="width:190px;" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">กำลังซ่อมสินค้า
            </td>
            @elseif($repair->status_repair==3)
            <td class="text-center">
            <button style="width:190px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">ซ่อมสินค้าเสร็จแล้ว
            </td>
            @elseif($repair->status_repair==4)
            <td class="text-center">
            <button style="width:190px;" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">ลูกค้ารับสินค้าคืนแล้ว
            </td>
            @elseif($repair->status_repair==5)
            <td class="text-center">
            <button style="width:190px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">ยกเลิกการซ่อม
            </td>  
            @endif


            <!-- <td>
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-repair{{ $repair->id }}">
                <i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
            </button>
            </td> -->
            <!-- <td class="text-center"><a href="<?php echo url('/repair-general/delete') ?>/{{$repair->id}}" 
            class="btn btn-danger">ลบ</a></td>    -->
            <!-- <td>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-repair-general{{ $repair->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td> -->
            <td class="text-center">
              <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal-manage-repair-general{{ $repair->id }}"><i class="fa fa-pencil-square-o fa-lg"></i>&nbsp; เมนูจัดการ
              </button>
            </td>

             <!-- //////////////////////////modal-manage-repair-general/////////////////////// -->

            <div class="modal" id="modal-manage-repair-general{{ $repair->id }}">
              <div class="modal-dialog "style="width:350px;margin-right:100px;" >
                <div class="modal-content " >
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center">เมนูจัดการ</h4>
                  </div>        

                    <div class="modal-body">
                    <div class="modal-header " >
                      <div class="row" >
                        <div class="form-group">
                          <div  class="text-center">
                              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-repair{{ $repair->id }}" style="width:300px;">
                                  <i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไขข้อมูล
                              </button>
                          </div>
                        </div>
                      </div>
                      <div class="row" >
                        <div class="form-group">
                          <div  class="text-center">
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-repair-general{{ $repair->id }}" style="width:300px;"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบข้อมูล
                              </button>
                          </div>
                        </div>
                      </div>  
                      <div class="row" >
                        <div class="form-group">
                          <div  class="text-center">
                          <a href="" class="btn btn-danger" style="width:300px;"><i class="fa fa-power-off fa-lg"></i>&nbsp; ปิดบิล</a></a>
                          </div>
                        </div>
                      </div>
                     
                     </div>
                     <br>
                      <div class="row" >
                        <div class="form-group">
                          <div  class="text-center">
                          <?= Form::open(array('url' => '/print')) ?>
                          <!-- <a href="<?php echo url('/print') ?>" class="btn btn-success" style="width:300px;"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบรับซ่อม</a></a> -->
                          <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                          <input type="hidden" name="id" value="{{ $repair->id }}">
                          <button type="submit"style="width:300px;" class="btn btn-success"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบรับซ่อม</button>
                          {!! Form::close() !!}
                          </div>
                        </div>
                      </div>
                      <div class="row" >
                        <div class="form-group">
                          <div  class="text-center">
                          <?= Form::open(array('url' => '/print2')) ?>
                          <!-- <a href="<?php echo url('/print') ?>" class="btn btn-success" style="width:300px;"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบรับซ่อม</a></a> -->
                          <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                          <input type="hidden" name="id" value="{{ $repair->id }}">
                          <button type="submit"style="width:300px;" class="btn btn-success"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบเสร็จ</button>
                          {!! Form::close() !!}
                          </div>
                        </div>
                      </div>

                    </div> 
                    
                </div>
              </div>          
            </div>
    <!-- //////////////////////End modal-manage-repair-general///////////////////////// -->
<!-- //////////////////////////////modal-edit-status-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-status-repair{{ $repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">สถานะการสินค้า</h4>
          </div>        
          <?= Form::open(array('url' => '/repair-general-status')) ?>
          <div class="modal-body">

            <div class="row" >
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">สถานะ</b>
                    <div class="col-md-8">               
                        <select class="form-control select2" style="width: 100%;" name="status_repair" required>
                        <option selected="selected">สถานะที่เคยเลือก [  ]</option>
                        <!-- <option disabled="disabled">California (disabled)</option> -->
                  
                        <option value="1">สินค้าที่พึ่งเข้าระบบ</option>
                        <option value="2">กำลังซ่อมสินค้า</option>
                        <option value="3">ซ่อมสินค้าเสร็จแล้ว</option>
                        <option value="4">ลูกค้ารับสินค้าคืนแล้ว</option>
                        <option value="5">ยกเลิกการซ่อม</option>
                        
                        </select>
                    </div>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="id" value="{{ $repair->id }}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-edit-status-repair//////////////////////////////// -->
             <!-- //////////////////////////////modal-delete-repair-general//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-repair-general{{ $repair->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/repair-general/delete/'.$repair->id)) ?>
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
    <!-- //////////////////////////////End modal-delete-repair-general//////////////////////////////// -->

            <!-- //////////////////////////////modal-edit-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-repair{{ $repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขข้อมูลแจ้งซ่อมใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/repair-general/edit/'. $repair->id)) ?>
          <div class="modal-body">
           
          <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่อ-สกุล</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อ-สกุล..." value="{{ $repair->name }}">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">เบอร์โทร</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-phone fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="phone" placeholder="เบอร์โทร..." value="{{ $repair->phone }}">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">วันที่ซ่อม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar fa-lg"></i>
                        </div>
                          <input type="date" class="form-control pull-right" id="Name" name="date_in_repair" placeholder="วันที่ซ่อม..." value="{{ $repair->date_in_repair }}">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคาประเมิน</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="price" placeholder="ราคาประเมิน..." value="{{ $repair->price }}">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคาจริง</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="after_price" placeholder="ราคา..." value="{{ $repair->after_price }}">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">วันที่รับคืน</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar fa-lg"></i>
                        </div>
                          <input type="date" class="form-control pull-right" id="Name" name="date_out_repair" placeholder="วันที่รับคืน..." value="{{ $repair->date_out_repair }}">
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
    <!-- //////////////////////////////End modal-edit-repair//////////////////////////////// -->

          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>

            <!-- //////////////////////////////modal-add-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-add-repair">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลแจ้งซ่อมใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/repair-general/create')) ?>
          <div class="modal-body">
           
          <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ชื่อ-สกุล</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อ-สกุล...">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">เบอร์โทร</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-phone fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="phone" placeholder="เบอร์โทร...">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">วันที่ซ่อม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar fa-lg"></i>
                        </div>
                          <input type="date" class="form-control pull-right" id="Name" name="date_in_repair" placeholder="วันที่ซ่อม...">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคาประเมิน</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="price" placeholder="ราคาประเมิน...">
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
    <!-- //////////////////////////////End modal-add-repair//////////////////////////////// -->
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

</script>


