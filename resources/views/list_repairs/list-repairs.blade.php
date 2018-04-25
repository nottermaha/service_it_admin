
<!-- css header-leftmenu -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">

</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-repair">
                    add data
            </button>
        </div> 
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการย่อยถ</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
          <th>id</th>
            <th>รายการ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($list_repairs as $list_repair)
          <tr>
            <td>{{ $list_repair->id }}</td>
            <td>{{ $list_repair->list_name }}</td>
            <td>
              <button type="button" class="btn btn-warning" data-toggle="modal" <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-repair{{ $list_repair->id }}">
                      แก้ไข
              </button>
            </td>  
            <td class="text-center"><a href="<?php echo url('/list-repair/delete') ?>/{{$list_repair->id}}" 
            class="btn btn-danger">ลบ</a></td>

        <!-- //////////////////////////////modal-edit-list-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-repair{{ $list_repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลรายการแจ้งซ่ออม</h4>
          </div>        
          <?= Form::open(array('url' => '/list-repair/edit/'.$list_repair->id )) ?>
          <div class="modal-body">
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายการที่ซ่อม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="list_name" placeholder="รายการที่ซ่อม..." value="{{ $list_repair->list_name }}">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายละเอียดเพิ่มเติม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม..." value="{{ $list_repair->detail }}">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">อาการเบื้องต้น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="symptom" placeholder="อาการเบื้องต้น..." value="{{ $list_repair->symptom }}">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">สถานะการซ่อม</b>
                    <div class="col-md-8">               
                        <select class="form-control select2" style="width: 100%;" name="status_list_repair">
                        <option selected="selected">สถานะที่เคยเลือก [ {{ $list_repair->name }} ]</option>
                        <!-- <option disabled="disabled">California (disabled)</option> -->
                        @foreach ($setting_status_repairs as $setting_status_repair)
                        <option value="{{ $setting_status_repair->id }}">{{ $setting_status_repair->name }}</option>
                        @endforeach
                        </select>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคา</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="price" placeholder="อาการเบื้องต้น..." value="{{ $list_repair->price }}">
                      </div>
                    </div>
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
                          <input type="text" class="form-control pull-right" id="Name" name="image" placeholder="อาการเบื้องต้น..." value="{{ $list_repair->image }}">
                      </div>
                    </div>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="status_list_repair_old" value="{{ $list_repair->status_list_repair }}">
          <input type="hidden" name="repair_id"value="{{$repair_id}}">
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
            <h4 class="modal-title">บันทึกข้อมูลรายการแจ้งซ่ออม</h4>
          </div>        
          <?= Form::open(array('url' => '/list-repair/create')) ?>
          <div class="modal-body">
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายการที่ซ่อม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="list_name" placeholder="รายการที่ซ่อม...">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายละเอียดเพิ่มเติม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม...">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">อาการเบื้องต้น</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="symptom" placeholder="อาการเบื้องต้น...">
                      </div>
                    </div>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="repair_id"value="{{$repair_id}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-repair//////////////////////////////// -->
    </section>
@include('form/footer')

<!-- js header-leftmenu -->
<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- End js header-leftmenu -->

  <!-- DataTables -->
  <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- DataTables -->
<script src="../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })
  //Initialize Select2 Elements
  $('.select2').select2()

</script>
