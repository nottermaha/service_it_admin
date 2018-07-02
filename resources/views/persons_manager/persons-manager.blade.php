<!-- css header-leftmenu -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ServiceIt | Manager</title>
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
       <!-- Select2 -->
<link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
          <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              บุคคล /
              <small><a>ผู้จัดการร้าน</a> </small>
            </h1>
          </section> 
      <br>
  <!-- Content Wrapper. Contains page content
  <div class="content-wrapper">
    Content Header (Page header)
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> -->


      <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header"> -->
      <!-- <h1>
        บคคล /
        <small>ผู้จัดการร้าน</small>
      </h1> -->
      <!-- <br><br> -->
      <!-- <ol class="breadcrumb"> -->
        <!-- <li><a><h2><i class="fa fa-dashboard"></i>บุคคล</h2></a></li> -->
        <!-- <li class="active">ผู้จัดการร้าน</li> -->
      <!-- </ol> -->
    <!-- </section> -->

    </script>
    <section class="content">

      <br>
      <div class="row">
          <div class="col-md-12">
              <div class="box box-default">
                      <!-- <div class="box-header with-border">
                          <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                      </div> -->
                  <div class="box-body">
                  {{ csrf_field() }}
                      <?= Form::open(array('url' => '/persons-manager2')) ?>
                      <div class="form-group">
                      <label for="Name" class="col-sm-2"></label>
                          <b for="Name" class="col-sm-1" style="padding-top:8;">เลือกร้าน</b>
                          <div class="col-sm-6">
                              <select  required class="form-control select2" style="width: 100%;" name="store_branch_id"  >
                              <option value="" ><b> เลือกร้านที่ต้องการดูข้อมูล</b></option>
                              <!-- <option disabled="disabled">California (disabled)</option> -->
                              @foreach ($store_branch as $value)
                              <option value="{{ $value->id }}" >{{ $value->name }}</option>
                              @endforeach
                              </select>
                          </div>
                          
                            <div style="padding-left:130px;">
                                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>&nbsp; ตกลง</button>
                            </div>
                          {!! Form::close() !!}
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- <div class="row">
        <div class="col-xs-12 text-right">
          <?= link_to('/person-manager-form',$title='&nbsp;เพิ่มข้อมูล',['class'=>'btn btn-primary fa  fa-plus-circle fa-lg'],$secure=null); ?>
        </div> 
      </div>
      <br> -->

 @if($check!=0)
 <!-- @if($persons!=NULL) -->
      <div class="row">
        <div class="col-xs-12 text-right">
          <?= Form::open(array('url' => '/person-manager-form')) ?>
            <input type="hidden" name="store_branch_id" value="{{$store_branch_id}}">
            <div style="padding-left:130px;">
                <button type="submit" class="btn btn-primary"><i class="fa  fa-plus-circle fa-lg"></i>&nbsp; เพิ่มข้อมูล</button>
            </div>
            {!! Form::close() !!}
            </div> 
      </div>
      <br>


      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการผู้จัดการร้าน @if($check!=0){{$store_branch_name}} @endif</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th>รูปภาพ</th>
            <th style="text-align:center">ชื่อ-สกุล</th>
            <th style="text-align:center">เบอร์โทร</th>
            <th style="text-align:center">เพศ</th>
            <th style="text-align:center">แก้ไข</th>
            <th style="text-align:center">ลบ</th>
          </tr>
        </thead>
        
        <tbody>

          <?php $i=0 ?>
          @foreach ($persons as $person)
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td width="100px;">
                    <!-- <img src="dist/img/user1-128x128.jpg" alt="User Image"> -->
                    <a href="{{ asset('image/person-manager/picture/'.$person->image_url) }}"><img src="{{ asset('image/person-manager/resize/'.$person->image_url) }}" style="height:100px;width:100px;border-radius: 50%;"></a> 

            </td>
            <td style="text-align:center">{{ $person->name }}</td>
            <td class="text-center">{{ $person->phone }}</td>
            <td class="text-center">
            @if($person->gender==1)  
            ชาย
            @elseif($person->gender==2)  
            หญิง
            @endif
            </td>

            <!-- <td style="text-align:center"><a href="{{ url('/person-manager-form-edit/'.$person->id)  }}" class="btn btn-warning"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข</a></td>    -->
            <td  class="text-center">
              <div class="row">
                      <?= Form::open(array('url' => '/person-manager-form-edit')) ?>
                      <input type="hidden" name="id" value="{{ $person->id }}">
                          <button type="submit" class="btn btn-warning"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข</button>
                      {!! Form::close() !!}

              </div>
            </td>
      

            <!-- <td class="text-center"><a href="<?php echo url('/person-manager/delete') ?>/{{$person->id}}" class="btn btn-danger">ลบ</a></td> -->
            <td style="text-align:center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-person-manager{{ $person->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td>
            <!-- //////////////////////////////modal-delete-person-manager//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-person-manager{{ $person->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/person-manager-delete')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบข้อมูล </b>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                      <input type="text" name="id" value="{{ $person->id }}">
                      <input type="text" name="store_branch_id" value="{{ $store_branch_id}}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-person-manager//////////////////////////////// -->
          </tr>
          @endforeach
        

        </tbody>
      </table>     
         <!-- @endif -->
        @endif
      </div>
    </div>
    </div>
    </div>
    
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
    @elseif (session()->has('status_select_store_branch'))     
     <script>swal({ title: "<?php echo session()->get('status_select_store_branch'); ?>",        
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

  <!-- select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })
    //Initialize Select2 Elements
    $('.select2').select2()

</script>

