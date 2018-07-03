
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
              ออกรายงาน /
              <small><a>รายการออกรายงาน</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

  @if($chk==4)
  <div class="row">
      <div class="col-md-12">
        <div class="box box-default">
                  <!-- <div class="box-header with-border">
                      <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                  </div> -->
          <div class="box-body">
                <div class="row">
                  <div class="col-md-3">
                      <br>
                      
                      <?= Form::open(array('url' => '/search-pay-money')) ?>
                      {{ csrf_field() }}
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_in" placeholder="จากวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>            
                    </div>
                    <div class="col-md-3">
                      <br>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_out" placeholder="ถึงวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>              
                    </div>

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id">      
                        <option value="" ><b>เลือกสาขา</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($store_branchs as $store_branch)
                              <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                          @endforeach
                        </select>              
                    </div>
                    
                    <div class="col-md-2">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_bill">      
                        <option value="" ><b>เลือกสถานะ</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($status_repairs as $status_repair)
                              <option value="{{ $status_repair->id }}" >{{ $status_repair->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                    <div class="row">
                      <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button></div>
                    </div>
                    <div class="row" >
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button></div>
                    </div>
                      {!! Form::close() !!}
                
<!-- /////////////////////row///////////////////////// -->
<div class="row">
<div class="col-md-3">
                      <br>
                      
                      <?= Form::open(array('url' => '/search-pay-money')) ?>
                      {{ csrf_field() }}
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_in" placeholder="จากวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>            
                    </div>
                    <div class="col-md-3">
                      <br>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_out" placeholder="ถึงวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>              
                    </div>

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id">      
                        <option value="" ><b>เลือกสาขา</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($store_branchs as $store_branch)
                              <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                          @endforeach
                        </select>              
                    </div>
                    
                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_bill">      
                        <option value="" ><b>เลือกสถานะ</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($status_repairs as $status_repair)
                              <option value="{{ $status_repair->id }}" >{{ $status_repair->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_bill">      
                        <option value="" ><b>เลือกลูกค้าสมาชิก</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($person_members as $person_member)
                              <option value="{{ $person_member->id }}" >{{ $person_member->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                    <div class="col-md-6 col-xs-6" style="margin-top:17px;">
                      <input type="hidden" name="chk_table" value="">
                      <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button>
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button>
                    </div>
                      {!! Form::close() !!}
                      </div>
 <!-- ///////////////////////////////////////////// -->
 <div class="row">
 <div class="col-md-3">
                      <br>
                      
                      <?= Form::open(array('url' => '/search-pay-money')) ?>
                      {{ csrf_field() }}
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_in" placeholder="จากวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>            
                    </div>
                    <div class="col-md-3">
                      <br>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_out" placeholder="ถึงวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>              
                    </div>

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id">      
                        <option value="" ><b>เลือกสาขา</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($store_branchs as $store_branch)
                              <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                          @endforeach
                        </select>              
                    </div>
                    
                    <div class="col-md-2">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_bill">      
                        <option value="" ><b>เลือกสถานะ</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($status_repairs as $status_repair)
                              <option value="{{ $status_repair->id }}" >{{ $status_repair->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                    <div class="row">
                      <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button></div>
                    </div>
                    <div class="row" >
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button></div>
                    </div>
                      {!! Form::close() !!}
                      
<!-- ////////////////////////////////////////////////////-->
                      
<div class="row">
<div class="col-md-3">
                      <br>
                      
                      <?= Form::open(array('url' => '/search-pay-money')) ?>
                      {{ csrf_field() }}
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_in" placeholder="จากวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>            
                    </div>
                    <div class="col-md-3">
                      <br>
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                          <input type="date" class="form-control pull-right" id="" name="chk_date_out" placeholder="ถึงวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>              
                    </div>

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id">      
                        <option value="" ><b>เลือกสาขา</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($store_branchs as $store_branch)
                              <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                          @endforeach
                        </select>              
                    </div>
                    
                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_bill">      
                        <option value="" ><b>เลือกสถานะ</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($status_repairs as $status_repair)
                              <option value="{{ $status_repair->id }}" >{{ $status_repair->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_bill">      
                        <option value="" ><b>เลือกช่างซ่อม</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($person_members as $person_member)
                              <option value="{{ $person_member->id }}" >{{ $person_member->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                    <div class="col-md-6 col-xs-6" style="margin-top:17px;">
                      <input type="hidden" name="chk_table" value="">
                      <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button>
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button>
                    </div>
                      {!! Form::close() !!}
                      </div>


          </div>
        </div>
      </div>
    </div>
  @else
  @if($chk!=2)  
      <div class="row">
            <div class="col-md-12">
                <div class="box box-default">
                        <!-- <div class="box-header with-border">
                            <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                        </div> -->
                  
                  <div class="box-body">

                      <?= Form::open(array('url' => '/report-print')) ?>
                        {{ csrf_field() }}
                        <div class="form-group">
                        <label for="Name" class="col-sm-0"></label>
                            <b for="Name" class="col-sm-4" style="padding-top:8;text-align:right;">ออกรายงานทั้งหมด :</b>
                            <div class="col-sm-4"style="margin-top:10px;">
                            <!-- <b >หากท่านต้องการออกรายงาน{{$chk_name}}ทั้งหมด</b> -->
                                <b >หากท่านต้องการออกรายงาน
                                @if($chk==1)
                                พนักงาน
                                @elseif($chk==3)
                                ร้าน
                                @elseif($chk==1)
                                @endif
                                ทั้งหมด</b> 
                            </div>
                              <div style="padding-left:130px;">
                              <input type="hidden" name="chk" value="{{$chk}}">
                              <input type="hidden" name="chk_print" value="1">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i>&nbsp; Excel </button>
                              </div>
                            {!! Form::close() !!}
                        </div>

                        
                        <div class="form-group">
                        <label for="Name" class="col-sm-0"></label>
                            <b for="Name" class="col-sm-2" style="padding-top:8;text-align:right;">ดูข้อมูลเฉพาะร้าน :</b>
                            <div class="col-sm-3">
                                <?= Form::open(array('url' => '/report-detail')) ?>
                                {{ csrf_field() }}
                                <select required class="form-control select2" style="width: 100%;" name="get_store_branch_id" onchange="this.form.submit()">
                                <option value=""><b> เลือกร้านที่ต้องการดูข้อมูล</b></option>
                                <option value="-1">ดูหั้งหมด</option>
                                @foreach ($store_branch as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            
                              <!-- <div class="col-md-1"> -->
                              <input type="hidden" name="chk" value="{{$chk}}">
                              <input type="hidden" name="chk_get" value="1">
                              <!-- <input type="hidden" name="chk_print" value="2"> -->
                                  <!-- <button type="submit" class="btn btn-success"><i class="fa fa-download"></i>&nbsp; ค้นหา </button> -->
                              <!-- </div> -->
                            {!! Form::close() !!}

                            <b for="Name" class="col-sm-2" style="padding-top:8;text-align:right;">เลือกร้านออกรายงาน :</b>
                            <div class="col-sm-4">
                                <?= Form::open(array('url' => '/report-print')) ?>
                                {{ csrf_field() }}
                                <select required class="form-control select2" style="width: 100%;" name="store_branch_id">
                                <option value=""><b> เลือกร้านที่ต้องการออกรายงาน</b></option>
                                <!-- <option disabled="disabled">California (disabled)</option> -->
                                @foreach ($store_branch as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            
                            <div class="col-md-1">
                              <input type="hidden" name="chk" value="{{$chk}}">
                              <input type="hidden" name="chk_print" value="2">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-download"></i>&nbsp; Excel </button>
                              </div>
                            {!! Form::close() !!}

                            

                        </div>

                    </div>
                </div>
            </div>
        </div>
        
  @endif
@endif
<div class="row">
      <div class="col-xs-12 text-right">
          <?= Form::open(array('url' => '/report-print')) ?>
          <div style="padding-left:130px;">
            <input type="hidden" name="chk" value="{{$chk}}">
            <input type="hidden" name="chk_print" value="3">
                <button type="submit" class="btn btn-success"><i class="fa fa-download fa-lg"></i>&nbsp; Excel</button>
          </div>
            {!! Form::close() !!}
      </div> 
</div>
      <br>

<div class="row">
  <div class="col-xs-12">

    <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการ{{$chk_name}}</h3>
            </div>
       <div class="box-body table-responsive ">
          <table id="example" class="table table-bordered table-striped table-hover  ">
          <thead >
            <tr>
              <th class="text-center">#</th>
              @if($chk==5)
              <th class="text-center">ชื่อล็อต</th>
              <th class="text-center">ชื่ออะไหล่</th>
              <th class="text-center">จำนวน</th>
              <th class="text-center">ราคา</th>
              @endif
                  @if($chk==3)
                  <th class="text-center">ชื่อสาขา</th>
                  <th class="text-center">เบอร์โทร</th>
                  <th class="text-center">อีเมล์</th>
                  @endif
              @if($chk==1 || $chk==2)
              <th class="text-center">ชื่อ-สกุล</th>
              <th class="text-center">เบอร์โทร</th>
              <th class="text-center">อีเมล์</th>
              @endif
            </tr>
          </thead>
        
          <tbody>
            <?php $i=0 ?>
            @foreach ($result as $value)
            <tr>
              <td class="text-center">{{ $i=$i+1 }}</td>
              @if($chk==5)
              <td class="text-center">{{ $value->lot_name }}</td>
              <td class="text-center">{{ $value->name }}</td>
              <td class="text-center">{{ $value->number }}</td>
              <td class="text-center">{{ $value->pay_out }}</td>
              @else
              <td class="text-center">{{ $value->name }}</td>
              <td class="text-center">{{ $value->phone }}</td>
              <td class="text-center">{{ $value->email }}</td>
              @endif
            </tr>
            @endforeach
          </tbody>
          </table>

        </div>
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
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })
  //Initialize Select2 Elements
  $('.select2').select2()
</script>
<script>
$('[name="get_store_branch_id"]').change(function() {
  $(this).closest('form').submit();
});
</script>
<script>
  //Date picker
  $('#datepicker').datepicker({
  autoclose: true
  })
  $('#datepicker2').datepicker({
  autoclose: true
  })
</script>

