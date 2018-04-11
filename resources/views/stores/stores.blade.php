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

</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
          <!-- <?= link_to('store-form',$title='add data',['class'=>'btn btn-primary '],['data-toggle'=>'btn btn-primary '],['data-toggle'=>'#modal-default '],$secure=null); ?> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-branch">
                    add data
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
        <thead >
          <tr>
            <th>ลำดับ</th>
            <th>สาขา</th>
            <th>สถานะ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($stores as $store )
          <tr>
            <td>{{ $store->index }}</td>
            <td ><a href=""data-toggle="modal" data-target="#modal-show-store-branch">{{ $store->name }}</a></td>
            <td class="text-center">{{ $store->status_name }}</td>
            <!-- <td class="text-center"><a href="<?php echo url('') ?>/{{$store->id}}" 
            class="btn btn-warning">แก้ไข</a></td> -->
            <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-branch{{ $store->id }}">แก้ไข</a></a></td> 

                    <div class="modal fade" id="modal-edit-branch{{ $store->id }}">
        
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลสาขาใหม่</h4>
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

            <td class="text-center"><a href="<?php echo url('/store-branch/delete') ?>/{{$store->id}}" 
            class="btn btn-danger">ลบ</a></td>

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
        
            <div class="modal-dialog">
            <div class="modal-content">
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

