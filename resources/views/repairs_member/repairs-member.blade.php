<script>

    function checkName()
	{   var y = document.getElementById("name").value;
        if(y.length<1){document.getElementById('txt_name').innerHTML = "กรุณากรอก ชื่อ-นามสกุล";}
        else{document.getElementById('txt_name').innerHTML = "";}
	}

    //////////////onclick////////////////
    function BtnChkSubmit() 
    { 
        ////
        var y = document.getElementById("name").value;
        if(y.length<1){document.getElementById('txt_name').innerHTML = "กรุณากรอก ชื่อ-นามสกุล";return false}
        else{document.getElementById('txt_name').innerHTML = "";}

        // else{
            ChkForm.submit();
        // }

    }

</script>
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
              ซ่อมอุปกรณ์ /
              <small><a>ลูกค้าสมาชิก</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

    <div class="col-md-3"></div>
    {!!  Form::open(['url'=>'/repair-member/create','id'=>'ChkForm'])   !!}
    {{ csrf_field() }}
      <div class="col-md-6">
        <div class="box box-success">
                <div class="box-header with-border bg-success">
                    <h3 class="box-title">เปิดบิลใหม่</h3>
                </div>
            <div class="box-body">

                <div class="row">
              <div class="form-group">
                <b for="" class="control-label col-md-3"style="text-align:right">ชื่อ-นามสกุล</b>
                <div class="col-md-8">
                    <select required class="form-control select2" style="width: 100%;" name="member_id">
                      <option value="">เลือกสมาชิก</option>
                      <!-- <option disabled="disabled">California (disabled)</option> -->
                    @foreach($members as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                    </select>
                </div><b style="font-size:30px;color:red;" title="ต้องกรอกข้อมูล">*</b>
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
                          <input type="date" class="form-control pull-right" id="Name" name="date_in_repair" placeholder="วันที่ซ่อม..." value="{{$current_date}}" disabled> 
                      </div>
                    </div><b style="font-size:30px;color:red;" title="ต้องกรอกข้อมูล">*</b>
              </div>
            </div>
          <div class="row">
            <div class="text-center">
              <!-- <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button> -->
              <button type="submit" class="btn btn-success">บันทึก</button>
            </div>
          </div>

            </div>
        </div> 
      </div>
    {!! Form::close() !!}

      <!-- <div class="row">
        <div class="col-xs-12 text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-repair">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>
      <br> -->

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการซ่อมอุปกรณ์ ลูกค้าสมาชิก</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
          <th>#</th>
            <th>เลขบิล</th>
            <th>ชื่อ-สกุล</th>
            <!-- <th>ราคา</th> -->
            <th>ผู้รับงานซ่อม</th>
            <th class="text-center">รายการแจ้งซ่อม</th>
            <th class="text-center">สถานะ</th>
            <th class="text-center">เมนูจัดการ</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($repairs as $repair)
          <tr>
          <td>{{ $i=$i+1 }}</td>
            <td>{{ $repair->bin_number }} <br>
            @if($repair->status_pay==0)
            <b style="color:red;">ยังไม่จ่ายเงิน</b> 
            @elseif($repair->status_pay==1)
            <b style="color:green;">จ่ายเงินแล้ว</b> 
            @endif
             </td>
            <td>{{ $repair->member_name }}</td>
            <!-- <td>{{ number_format($repair->price, 2) }}</td> -->
            <td>{{ $repair->persons_name }}</td>
            <td class="text-center">
            <!-- <a href="{{ url('/list-repair/'.$repair->id)  }}" class="btn btn-default"><i class="fa fa-list fa-lg"></i>&nbsp;รายการที่ซ่อม</a></a> -->
            <?= Form::open(array('url' => '/list-repair' )) ?>
            <input type="hidden" name="id" value="{{ $repair->id }}">
            <input type="hidden" name="back" value="member">
            <button type="submit" class="btn btn-default"><i class="fa fa-list fa-lg"></i>&nbsp;รายการแจ้งซ่อม</button>
          {!! Form::close() !!}
          </td> 
            <!-- <td class="text-center"><a href="" class="btn btn-danger"></i>&nbsp; ปิดบิล</a></a></td>  -->
           
            <td class="text-center">
            @if( $repair->status_color==1 )
            <button style="width:190px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==2 )
            <button style="width:190px;" type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==3 )
            <button style="width:190px;" type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==4 )
            <button style="width:190px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==5 )
            <button style="width:190px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==6 )
            <button style="width:190px;" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==7 )
            <button style="width:190px;" type="button" class="btn bg-navy color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==8 )
            <button style="width:190px;" type="button" class="btn bg-teal-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==9 )
            <button style="width:190px;" type="button" class="btn bg-purple-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==10 )
            <button style="width:190px;" type="button" class="btn bg-orange-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==11 )
            <button style="width:190px;" type="button" class="btn bg-maroon-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @elseif( $repair->status_color==12 )
            <button style="width:190px;" type="button" class="btn bg-black-active color-palette" data-toggle="modal" data-target="#modal-edit-status-repair{{ $repair->id }}">
            @endif
           <i class="fa  fa-chevron-circle-up fa-lg"></i> {{ $repair->status_name }}</td>
            </button>
            </td>
 
            <!-- <td><a href="" class="btn btn-danger"></i>&nbsp; ปิดบิล</a></a></td> 
            <td>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-repair{{ $repair->id }}">
                  <i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข
              </button>
            </td>   -->
            <!-- <td class="text-center"><a href="<?php echo url('/repair-member/delete') ?>/{{$repair->id}}" 
            class="btn btn-danger">ลบ</a>
            </td> -->
            <!-- <td>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-repair-member{{ $repair->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td> -->
            <td class="text-center">
              <button type="button" class="btn btn-info " data-toggle="modal" data-target="#modal-manage-repair-member{{ $repair->id }}"><i class="fa fa-pencil-square-o fa-lg"></i>&nbsp; เมนูจัดการ
              </button>
            </td>

            <!-- //////////////////////////modal-manage-repair-member/////////////////////// -->

            <div class="modal" id="modal-manage-repair-member{{ $repair->id }}">
              <div class="modal-dialog "style="width:350px;margin-right:100px;" >
                <div class="modal-content " >
                  <div class="modal-header bg-primary" >
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
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-repair-member{{ $repair->id }}" style="width:300px;"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบข้อมูล
                              </button>
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
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-print-bill-repair-member{{ $repair->id }}" style="width:300px;"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบเสร็จ
                            </button>
                          <!-- <?= Form::open(array('url' => '/print2')) ?>
                          <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                          <input type="hidden" name="id" value="{{ $repair->id }}">
                          <button type="submit"style="width:300px;" class="btn btn-success"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบเสร็จ</button>
                          {!! Form::close() !!} -->
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row" >
                        <div class="form-group">
                          <div  class="text-center">สถานะการจ่ายเงิน
                          @if($repair->status_pay == 0)
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-status-pay-repair-member{{ $repair->id }}" style="width:300px;"><i class="fa fa-money fa-lg"></i>&nbsp;ยังไม่จ่ายเงิน
                            </button>
                          @elseif($repair->status_pay == 1)
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-status-pay-repair-member{{ $repair->id }}" style="width:300px;"><i class="fa fa-money fa-lg"></i>&nbsp;จ่ายเงินแล้ว
                            </button>
                          @endif
                          </div>
                        </div>
                      </div>
                      <div class="row" >
                        <div class="form-group">
                          <div  class="text-center">
                          @if($repair->status_pay == 0)
                            เมื่อลูกค้าจ่ายเงินแล้วเท่านั้น จึงจะสามารถ "ปิดบิล" ได้
                            <button type="button" class="btn btn-danger disabled" data-toggle="modal" data-target="#modal-status-bill-repair-member{{ $repair->id }}" style="width:300px;"><i class="fa fa-power-off fa-lg"></i>&nbsp;ปิดบิล
                            </button>
                          @elseif($repair->status_pay == 1)
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-status-bill-repair-member{{ $repair->id }}" style="width:300px;" ><i class="fa fa-power-off fa-lg"></i>&nbsp;ปิดบิล
                            </button>
                          @endif
                          </div>
                        </div>
                      </div>

                    </div> 
                    
                </div>
              </div>          
            </div>
    <!-- //////////////////////End modal-manage-repair-member///////////////////////// -->

    <!-- /////////////modal-status-bill-repair-member//////////////////// -->

            <div class="modal fade " id="modal-status-bill-repair-member{{ $repair->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-red" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ยืนยันการปิดบิล</h4>
                  </div>        
                  <?= Form::open(array('url' => '/status-bill-member')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                        @if($repair->status_bill==0)
                        <b class="control-label col-md-12"style="text-align:center">กดปุ่ม "ยืนยันการปิดบิล" เพื่อยืนยันการปิดบิลงานซ่อม</b>
                        <br> 
                          <b for="" class="control-label col-md-12"style="text-align:left"> 
                          โปรดตรวจสอบข้อมูลงานซ่อมของท่านก่อนทำการปิดบิล เพราะการปิดบิลคืองานซ่อมนี้ได้เสร็จสมบูรณ์ทุกกระบวนการแล้ว   และเมื่อปิดบิลจะทำให้รายการนี้หายไปจากหน้านี้ </b>
                        @endif
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                          <input type="hidden" name="id" value="{{ $repair->id }}">
                        @if($repair->status_bill==0)
                        <button type="submit" class="btn btn-danger"><i class="fa fa-power-off fa-lg"></i>&nbsp;ยืนยันการปิดบิล</button>
                        @endif
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
            <!-- /////////////////End modal-status-bill-repair-member///////////////////////// -->
        <!-- /////////////modal-status-pay-repair-member//////////////////// -->

            <div class="modal fade " id="modal-status-pay-repair-member{{ $repair->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-warning" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">สถานะการจ่ายเงิน</h4>
                  </div>        
                  <?= Form::open(array('url' => '/status-pay-member')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                        @if($repair->status_pay==0)
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ยืนยันการจ่ายเงิน" เพื่อยืนยันการจ่ายเงินของลูกค้า</b>
                        @elseif($repair->status_pay==1)
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ยกเลิกการจ่ายเงิน" เพื่อยกเลิกการจ่ายเงินของลูกค้า </b>
                        @endif
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                          <input type="hidden" name="id" value="{{ $repair->id }}">
                        @if($repair->status_pay==0)
                        <button type="submit" class="btn btn-success">ยืนยันการจ่ายเงิน</button>
                        @elseif($repair->status_pay==1)
                        <button type="submit" class="btn btn-warning">ยกเลิกการจ่ายเงิน</button>
                        @endif
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
            <!-- /////////////////End modal-status-pay-repair-member///////////////////////// -->

            <!-- /////////////modal-print-bill-repair-member//////////////////// -->

            <div class="modal fade " id="modal-print-bill-repair-member{{ $repair->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-green" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ออกใบเสร็จ</h4>
                  </div>        
                  <?= Form::open(array('url' => '/print2')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                        @if($repair->status_bill==0)
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ออกใบเสร็จ" เพื่อยืนยันการออกใบเสร็จ </b>
                        @elseif($repair->status_bill==1)
                          <b for="" class="control-label col-md-12"style="text-align:right">ท่านได้ทำการออกใบเสร็จไปแล้ว หากต้องการออกใบอีกครั้ง กดปุ่ม "ออกใบเสร็จอีกครั้ง" </b>
                        @endif
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                          <input type="hidden" name="id" value="{{ $repair->id }}">
                        @if($repair->status_bill==0)
                        <button type="submit" class="btn btn-success">ออกใบเสร็จ</button>
                        @elseif($repair->status_bill==1)
                        <button type="submit" class="btn btn-warning">ออกใบเสร็จอีกครั้ง</button>
                        @endif
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
            <!-- /////////////////End modal-print-bill-repair-member///////////////////////// -->

    <!-- //////////////////////////////modal-edit-status-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-status-repair{{ $repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-yellow" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">สถานะสินค้า</h4>
          </div>        
          <?= Form::open(array('url' => '/repair-member-status/'.$repair->id)) ?>
          <div class="modal-body">

            <div class="row" >
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">สถานะสินค้า</b>
                    <div class="col-md-8">               
                        <select class="form-control select2" style="width: 100%;" name="status_repair">
                        <option selected="selected">สถานะที่เลือก [ {{ $repair->status_name }} ]</option>
                        <!-- <option disabled="disabled">California (disabled)</option> -->
                        @foreach ($setting_status_repair_shops as $setting_status_repair_shop)
                        <option value="{{ $setting_status_repair_shop->id }}">{{ $setting_status_repair_shop->name }}</option>
                        @endforeach
                        </select>
                    </div>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="status_repair_old" value="{{ $repair->status_repair }}">

            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-edit-status-repair//////////////////////////////// -->

             <!-- /////////////////////////modal-delete-repair-member///////////////////////// -->

            <div class="modal fade " id="modal-delete-repair-member{{ $repair->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header bg-red" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบข้อมูล</h4>
                  </div>        
                <?= Form::open(array('url' => '/repair-member/delete/'.$repair->id)) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบข้อมูล </b>

                          <div class="form-group">
                            <b for="" class="control-label col-md-12 "style="color:orange;text-align:center;">การ"ลบ"จะทำให้อะไหล่ที่ถูกใช้กับบิลซ่อมนี้ถูกยกเลิก</b>
                          </div>

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
    <!-- //////////////////////////////End modal-delete-repair-member//////////////////////////////// -->

            <!-- //////////////////////////////modal-edit-repair//////////////////////////////// -->

        <div class="modal fade " id="modal-edit-repair{{ $repair->id }}">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header bg-yellow" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขข้อมูลแจ้งซ่อม</h4>
          </div>        
          <?= Form::open(array('url' => '/repair-member/edit/'. $repair->id)) ?>
          <div class="modal-body">
            <div class="row">
              <div class="form-group">
                <b for="" class="control-label col-md-3"style="text-align:right">ชื่อ</b>
                <div class="col-md-8">
                    <select class="form-control select2" style="width: 100%;" name="member_id">
                      <option selected="selected" >สมาชิกที่เคยเลือก [ {{ $repair->member_name }} ]</option>
                      <!-- <option disabled="disabled">California (disabled)</option> -->
                    @foreach($members as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    
                    @endforeach
                    </select>
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
                          <input type="text" class="form-control pull-right" id="Name" name="" placeholder="เบอร์โทร..." value="{{ $repair->member_phone }}" disabled >
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
                          <input type="date" class="form-control pull-right" id="Name" name="" placeholder="วันที่ซ่อม..." value="{{ $repair->date_in_repair }}" disabled>
                          <input type="hidden" name="date_in_repair" value="{{ $repair->date_in_repair }}">
                      </div>
                    </div>
              </div>
            </div>

            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">อุปกรณ์ที่นำมาด้วย</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-angle-double-right fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="equipment_follow" placeholder="อุปกรณ์ที่นำมาด้วย..." value="{{ $repair->equipment_follow }}">
                      </div>
                    </div>
              </div>
            </div>

            <!-- <div class="row" style="padding-top:20px;">
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
            </div> -->

            <!-- <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">ราคา</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-money fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="after_price" placeholder="ราคา..." value="{{ $repair->after_price }}">
                      </div>
                    </div>
              </div>
            </div> -->

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
            <input type="hidden" name="member_id_old" value="{{ $repair->persons_member_id }}">
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

        <!-- <div class="modal fade " id="modal-add-repair">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลแจ้งซ่อมใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/repair-member/create')) ?>
          <div class="modal-body">
            <div class="row">
              <div class="form-group">
                <b for="" class="control-label col-md-3"style="text-align:right">ชื่อ</b>
                <div class="col-md-8">
                    <select required class="form-control select2" style="width: 100%;" name="member_id">
                      <option value="">เลือกสมาชิก</option>
                    @foreach($members as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                    </select>
                </div><b style="font-size:30px;color:red;" title="ต้องกรอกข้อมูล">*</b>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">วันที่ซ่อม</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="date" class="form-control pull-right" id="Name" name="date_in_repair" placeholder="วันที่ซ่อม..." value="{{$current_date}}"> 
                      </div>
                    </div><b style="font-size:30px;color:red;" title="ต้องกรอกข้อมูล">*</b>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
              <div class="form-group">
                    <b for="" class="control-label col-md-3"style="text-align:right">อุปกรณ์ที่นำมาด้วย</b>
                    <div class="col-md-8">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="equipment_follow" placeholder="อุปกรณ์ที่นำมาด้วย...">
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
                            <i class="fa fa-user fa-lg"></i>
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
    </div> -->
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
  //Initialize Select2 Elements
  $('.select2').select2()

</script>

