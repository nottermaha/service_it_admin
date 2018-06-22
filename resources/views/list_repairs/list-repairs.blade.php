
<style>

.button_black {background-color:black;}
</style>
<style>
    .color-palette {
      height: 35px;
      line-height: 35px;
      text-align: center;
    }

    .color-palette-set {
      margin-bottom: 15px;
    }

    .color-palette span {
      display: none;
      font-size: 12px;
    }

    .color-palette:hover span {
      display: block;
    }

    .color-palette-box h4 {
      position: absolute;
      top: 100%;
      left: 25px;
      margin-top: -40px;
      color: rgba(255, 255, 255, 0.8);
      font-size: 12px;
      display: block;
      z-index: 7;
    }
  </style>
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


<!-- ///////////////////////js ย้ายขึ้นมาเพราะใช้ auto modal/////////////////////// -->
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
<!-- //////////////////////////////////////////////////////////////////// -->
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              ซ่อมอุปกรณ์ /
              <small><a>รายการแจ้งซ่อม</a> </small>
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
              <h3 class="box-title">รายการแจ้งซ่อม</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
          <th>#</th>
            <th class="text-center">รายการ</th>
            <th class="text-center">ราคา</th>
            <th class="text-center">การใช้อะไหล่</th>
            <th class="text-center">สถานะการซ่อม</th>
            <th class="text-center">แก้ไข</th>
            <th class="text-center">ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($list_repairs as $list_repair)
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td class="text-center">{{ $list_repair->list_name }}</td>
            <td class="text-center">{{ $list_repair->price }}</td>
            <td class="text-center">
            <?php $k=0; $temp=0; ?>
            @foreach($data_use_parts as $data_use_part)
              @if( $list_repair->id==$data_use_part->list_repair_id_chk )  
                  <a>{{ $k=$k+1 }}. {{ $data_use_part->list_parts_name }} {{ $data_use_part->pay_out }}</a> <br>
                  <?php $temp =$temp+$data_use_part->pay_out; ?>
              @endif      
            @endforeach   
            <b>ราคาอะไหล่ทั้งหมด <?php echo $temp; ?>บ.</b> <br>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-manage-part{{ $list_repair->id }}">
                  <i class="fa fa-wrench fa-lg"></i>&nbsp; จัดการอะไหล่
              </button>
            </td>
            <td class="text-center">
            @if( $list_repair->status_color==1 )
            <button style="width:190px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==2 )
            <button style="width:190px;" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==3 )
            <button style="width:190px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==4 )
            <button style="width:190px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==5 )
            <button style="width:190px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==6 )
            <button style="width:190px;" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==7 )
            <button style="width:190px;" type="button" class="btn bg-navy color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==8 )
            <button style="width:190px;" type="button" class="btn bg-teal-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==9 )
            <button style="width:190px;" type="button" class="btn bg-purple-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==10 )
            <button style="width:190px;" type="button" class="btn bg-orange-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==11 )
            <button style="width:190px;" type="button" class="btn bg-maroon-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @elseif( $list_repair->status_color==12 )
            <button style="width:190px;" type="button" class="btn bg-black-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $list_repair->id }}">
            @endif
            {{ $list_repair->name }}</td>
            </button>
            </td>
            <td class="text-center">
             <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-repair{{ $list_repair->id }}">
                  <i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
              </button>
            </td>  
            <!-- <td class="text-center"><a href="<?php echo url('/list-repair/delete') ?>/{{$list_repair->id}}" 
            class="btn btn-danger"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ</a></td> -->
            <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-list-repair{{ $list_repair->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td>
             <!-- //////////////////////////////modal-delete-list-repair//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-list-repair{{ $list_repair->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                  <!-- <?= Form::open(array('url' => '/list-repair/delete/'.$list_repair->id)) ?> -->
                <?= Form::open(array('url' => '/list-repair-delete')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบข้อมูล </b>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                      <input type="hidden" name="repair_id"value="{{$repair_id}}">
                      <input type="hidden" name="id"value="{{ $list_repair->id }}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-list-repair//////////////////////////////// -->

    <!-- //////////////////////////////modal-manage-part//////////////////////////////// -->

        <div class="modal fade " id="modal-manage-part{{$list_repair->id}}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">จัดการอะไหล่</h4>
          </div>       
          <div class="modal-body">

            <div class="row">
              <div class="form-group"> 
              @foreach($data_use_parts as $data_use_part)
              @if( $list_repair->id==$data_use_part->list_repair_id_chk ) 
                <div class="row">
                      <?= Form::open(array('url' => '/list-repair-delete-data-use-part' )) ?>
                      <b for="" class="control-label col-md-2"style="text-align:right">อะไหล่ที่ใช้</b>
                    <div class="col-md-8" >               
                            
                        <a>{{ $data_use_part->list_parts_name }}</a> <br>
                                  
                    </div>
                    <div class="col-md-2">
                      <input type="hidden" name="list_repair_id" value="{{ $list_repair->id }}">
                      <input type="hidden" name="list_parts_id" value="{{ $data_use_part->list_parts_id_chk }}">
                      <input type="hidden" name="repair_id"value="{{$repair_id}}">
                      <button type="submit" class="btn btn-danger" >นำออก</button>
                    </div>
                </div>
                    {!! Form::close() !!}
              @endif      
              @endforeach   
              </div>
            </div><br>
          <?= Form::open(array('url' => '/list-repair-data-use-part' )) ?>
            <div class="row" >
              <div class="form-group">
                    <b for="" class="control-label col-md-2"style="text-align:right">รายการอะไหล่</b>
                    <div class="col-md-8">               
                        <select required class="form-control select2" style="width: 100%;" name="list_parts_id">
                        <option value="">เลือกอะไหล่ที่ต้องการเพิ่ม</option>
                        <!-- <option disabled="disabled">California (disabled)</option> -->
                        @foreach ($list_parts as $list_part)
                        <option value="{{ $list_part->id }}">" {{ $list_part->name }} " คงเหลือ {{ $list_part->number }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                    <input type="hidden" name="list_repair_id" value="{{ $list_repair->id }}">
                    <input type="hidden" name="repair_id"value="{{$repair_id}}">
                    <button type="submit" class="btn btn-success">ใช้อะไหล่</button>
                    </div> 
                    
              </div>
            </div>
         
          </div> 
          <div class="modal-footer">
          <div class="col-md-2"></div>
            <div class="row col-md-9" >
            <!-- ///check fail is show modal/// -->
                    @if ($chk==0)
                        <script type="text/javascript">
                            $(window).on('load',function(){
                                $('#modal-manage-part{{$status_part_null_id}}').modal('show');
                            });
                        </script>
                    <!-- ///end//// -->
                    <!-- ///message fail/// -->
                        <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i>อะไหล่ "{{ $status_part_null_name }}" หมด!</h4>
                        กรุณาเพิ่มอะไหล่เข้าระบบ ก่อนที่จะใช้อะไหล่
                      </div>
                    <!-- ///end//// -->
                    @endif
              </div>
          <!-- <input type="hidden" name="repair_id"value="{{$repair_id}}"> -->
            <!-- <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button> -->
            <!-- <button type="submit" class="btn btn-success">บันทึก</button> -->
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-manage-part//////////////////////////////// -->


<!-- //////////////////////////////modal-edit-status-list-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-status-repair{{ $list_repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">สถานะการซ่อม</h4>
          </div>        
          <?= Form::open(array('url' => '/list-repair-status-edit' )) ?>
          <div class="modal-body">

            <div class="row" >
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">สถานะการซ่อม</b>
                    <div class="col-md-8">               
                        <select class="form-control select2" style="width: 100%;" name="status_list_repair">
                        <option selected="selected">สถานะที่เลือก [ {{ $list_repair->name }} ]</option>
                        <!-- <option disabled="disabled">California (disabled)</option> -->
                        @foreach ($setting_status_repairs as $setting_status_repair)
                        <option value="{{ $setting_status_repair->id }}">{{ $setting_status_repair->name }}</option>
                        @endforeach
                        </select>
                    </div>
              </div>
            </div>


          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="status_list_repair_old" value="{{ $list_repair->status_list_repair }}">
          <input type="hidden" name="repair_id"value="{{$repair_id}}">
          <input type="hidden" name="id"value="{{ $list_repair->id }}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-edit-status-repair//////////////////////////////// -->

        <!-- //////////////////////////////modal-edit-list-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-repair{{ $list_repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขข้อมูลรายการแจ้งซ่อม</h4>
          </div>        
          <?= Form::open(array('url' => '/list-repair-edit' )) ?>
          <div class="modal-body">
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รายการแจ้งซ่อม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="list_name" placeholder="รายการแจ้งซ่อม..." value="{{ $list_repair->list_name }}">
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
                            <i class="fa fa-angle-double-right fa-lg"></i>
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
                            <i class="fa fa-angle-double-right fa-lg"></i>
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
                        <option selected="selected">สถานะที่เลือก [ {{ $list_repair->name }} ]</option>
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
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="price" placeholder="อาการเบื้องต้น..." value="{{ $list_repair->price }}">
                      </div>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ประกันหลังซ่อม</b>
                    <div class="col-md-8">               
                        <select class="form-control select2" style="width: 100%;" name="guarantee_id">
                        <option selected="selected">การรับประกันที่เลือก [ {{ $list_repair->guarantee_name }} ]</option>
                        <!-- <option disabled="disabled">California (disabled)</option> -->
                        @foreach ($guarantees as $guarantee)
                        <option value="{{ $guarantee->id }}">{{ $guarantee->name }}</option>
                        @endforeach
                        </select>
                    </div>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">รูปภาพ</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-image fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="image" placeholder="อาการเบื้องต้น..." value="{{ $list_repair->image }}">
                      </div>
                    </div>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="status_list_repair_old" value="{{ $list_repair->status_list_repair }}">
          <input type="hidden" name="guarantee_id_old" value="{{ $list_repair->guarantee_id }}">
          <input type="hidden" name="repair_id"value="{{$repair_id}}">
          <input type="hidden" name="id"value="{{ $list_repair->id }}">
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
            <h4 class="modal-title">บันทึกข้อมูลรายการแจ้งซ่อม</h4>
          </div>        
          <?= Form::open(array('url' => '/list-repair-create')) ?>
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



