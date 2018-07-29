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
  <script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
          <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              บุคคล /
              <small><a>สมาชิก</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
          <?= link_to('/person-member-form',$title='&nbsp;เพิ่มข้อมูล',['class'=>'btn btn-primary fa  fa-plus-circle fa-lg'],$secure=null); ?>
        </div> 
      </div>

      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการสมาชิก</h3>
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
            <th style="text-align:center">สถานะ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($persons as $person)
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td width="100px;">
                    <!-- <img src="dist/img/user1-128x128.jpg" alt="User Image"> -->
                    <a href="{{ asset('image/person-member/picture/'.$person->image_url) }}"><img src="{{ asset('image/person-member/resize/'.$person->image_url) }}" style="height:100px;width:100px;border-radius: 50%;"></a> 

            </td>
            <td >{{ $person->name }}</td>
            <td class="text-center">{{ $person->phone }}</td>
            <td class="text-center">
            @if($person->gender==1)  
            ชาย
            @elseif($person->gender==2)  
            หญิง
            @endif
            </td>
            <td><a href="{{ url('/person-member-form-edit'.$person->id)  }}" class="btn btn-warning"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข</a>
            </td>   
            <!-- <td style="text-align:center">
                      <?= Form::open(array('url' => '/person-member-form-edit')) ?>
                      <input type="hidden" name="id" value="{{ $person->id }}">
                          <button type="submit" class="btn btn-warning"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข</button>
                      {!! Form::close() !!}
            </td> -->
            <!-- <td class="text-center"><a href="<?php echo url('/person-member/delete') ?>/{{$person->id}}" class="btn btn-danger">ลบ</a></td> -->
            <!-- <td style="text-align:center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-person-member{{ $person->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td> -->
            @if($person->status==1)
            <td class="text-center">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-delete-person-member{{ $person->id }}"><i class="fa fa-check-circle fa-lg"></i>&nbsp; เปิดใช้งาน
              </button>
            </td>
            @elseif($person->status==0)
            <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-person-member{{ $person->id }}"><i class="fa  fa-times-circle fa-lg"></i>&nbsp; ปิดใช้งาน
              </button>
            </td>
            @endif
            <!-- //////////////////////////////modal-delete-person-member//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-person-member{{ $person->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-yellow" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">สถานะการเปิดปิดการใช้งานบุคคล</h4>
                  </div>        
                <?= Form::open(array('url' => '/person-member/delete/'.$person->id)) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <!-- <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบข้อมูล </b> -->
                          @if($person->status==1)
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ปิดการใช้งาน" เพื่อยืนยันการปิดการใช้งาน </b>
                        @elseif($person->status==0)
                        <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "เปิดการใช้งาน" เพื่อยืนยันการเปิดการใช้งาน </b>
                        @endif
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <!-- <button type="submit" class="btn btn-danger">ลบข้อมูล</button> -->
                        @if($person->status==1)
                        <button type="submit" class="btn btn-danger"><i class="fa fa-power-off fa-lg"></i>
                        &nbsp;ปิดการใช้งาน</button>
                        @elseif($person->status==0)
                        <button type="submit" class="btn btn-success"><i class="fa fa-power-off fa-lg"></i>
                        &nbsp;เปิดการใช้งาน</button>
                        @endif
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-person-member//////////////////////////////// -->
          </tr>
          @endforeach
        </tbody>
      </table>
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


