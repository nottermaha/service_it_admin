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
       <!-- Select2 -->
       <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              ซ่อมอุปกรณ์ /
              <small><a>ค้นหารายการซ่อม</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

<div class="container">
   <div class="row">
        <h4 class="text-center" style="margin-left:-50px;"><I>กรุณากรอก "เลขบิล" ที่ท่านต้องการค้นหา</I></h4><br>


        <?= Form::open(array('url' => '/search-repair-only-bill')) ?>        
        <div class="col-md-2 col-xs-3">
            <p style="text-align:right;font-size:20px;">เลขบิล</p> 
            <!-- <select   class="form-control select2 input-lg" style="width: 100%;" name="check_type_search">     
            <option value="bill" ><b>หมายเลขบิล</b></option>    
            <option value="name" ><b>ชื่อ-นามสกุล(ลูกค้า)</b></option>          
            </select> -->
        </div>
        <div class="col-md-7 col-xs-7">
              <!-- <input class="form-control input-lg" type="text" placeholder="B0103062212..." name="bin_number" required> -->
              <!-- <select  required class="form-control select2" style="width: 100%;" name="bin_number" > -->
              <select  required class="form-control select2 lg" style="width: 100%;" name="id_repair" >
                    <option value="" ><b>เลือกรายการบิล</b></option>
                    <!-- <option disabled="disabled">California (disabled)</option> -->
                    @foreach($repair_gets as $repair_get)
                    <option value="{{ $repair_get->id }}" >{{ $repair_get->bin_number }} คุณ {{ $repair_get->is_name }}</option>
                    @endforeach
              </select>
                        
        </div>
        <div class="col-md-1 col-xs-1">
            <input type="hidden" name="chk_num_bill" value="1">
            <button type="submit" class="btn btn-success ">ค้นหา</button>
        </div>
        {!! Form::close() !!}
    </div><br><br>
    @if($check==2)
        <!-- <div class="col-md-1"></div> -->
            <div class="col-md-8 col-xs-8" style="margin-left:150px;">
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> ไม่พบรายการดังกล่าว</h4>
                กรุณาตรวจสอบหมายเลขบิลของท่านให้ถูกต้อง
              </div>
            </div>
        </div>
    @endif
    @if($check==1)

    <div class="col-md-1" style="margin-right:50px;">
    </div>
    <div class="col-md-8" >
    <div class="panel" >
    <div class="panel-body">
        <h3 class="title-hero">
            <h3 class="modal-title text-center" style="color:gray;"><b>รายละเอียด</b></h3>
        </h3>
        <br>
        <div class="box box-info">
            <div class="box-header">
              <!-- <h3 class="box-title">Color & Time Picker</h3> -->
            </div>
            <div class="box-body">

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          สาขาที่ซ่อม : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$store_branch_name}}</b>
                        </div>
                    </div><hr style="margin-top:5px;margin-bottom:5px;">

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          หมายเลขบิล : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$bin_number}}</b>
                        </div>
                    </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ชื่อลูกค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $name }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                       <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          เบอร์โทร : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $phone }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                        
                        <b for="" class="control-label col-md-3"style="text-align:right">
                                อุปกรณ์ที่นำมาซ่อม  </b><br>
                                <?php $i=0; ?>
                            @foreach($repairs as $repair)
                              @foreach($status_lists as $value)
                                @if($value->l_id==$repair->list_repair_id)
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                {{ $i=$i+1 }} </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$value->list_repair_name}}.
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                อาการเสีย: </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$value->symptom}}.
                                </b>                                              
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                ราคา : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$value->price}} บาท.
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                ช่างซ่อม : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$value->person_name}}.
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                สถานะการซ่อม : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">

                                    @if( $value->status_color==1 )
                                    <button style="width:190px;" type="button" class="btn btn-primary">
                                    @elseif( $value->status_color==2 )
                                    <button style="width:190px;" type="button" class="btn btn-info" >
                                    @elseif( $value->status_color==3 )
                                    <button style="width:190px;" type="button" class="btn btn-success" >
                                    @elseif( $value->status_color==4 )
                                    <button style="width:190px;" type="button" class="btn btn-warning">
                                    @elseif( $value->status_color==5 )
                                    <button style="width:190px;" type="button" class="btn btn-danger">
                                    @elseif( $value->status_color==6 )
                                    <button style="width:190px;" type="button" class="btn btn-default" >
                                    @elseif( $value->status_color==7 )
                                    <button style="width:190px;" type="button" class="btn bg-navy color-palette">
                                    @elseif( $value->status_color==8 )
                                    <button style="width:190px;" type="button" class="btn bg-teal-active color-palette" >
                                    @elseif( $value->status_color==9 )
                                    <button style="width:190px;" type="button" class="btn bg-purple-active color-palette" >
                                    @elseif( $value->status_color==10 )
                                    <button style="width:190px;" type="button" class="btn bg-orange-active color-palette" >
                                    @elseif( $value->status_color==11 )
                                    <button style="width:190px;" type="button" class="btn bg-maroon-active color-palette" >
                                    @elseif( $value->status_color==12 )
                                    <button style="width:190px;" type="button" class="btn bg-black-active color-palette" >
                                    @endif
                                    {{ $value->name }}.
                                    </button>
                                    </b>
                                    @endif
   
                                  @endforeach
                                
                            @endforeach 
                          
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          อุปกรณ์ที่ติดมาด้วย : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                         {{ $equipment_follow }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ราคาประเมิน : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$price}}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <!-- <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ราคาจริง : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$after_price}}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;"> -->

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่รับเข้าระบบ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$date_in_repair}}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่คืนสินค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$date_out_repair}}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                       <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          พนักงานที่รับหน้าร้าน : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$persons_name}}</b>
                        </div>
                      </div>


            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
        
    </div>
</div>
    </div>
        
    <div class="col-md-2">
    </div>
    @endif
                        
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

  <!-- select2 -->
  <script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<script>
    //Initialize Select2 Elements
    $('.select2').select2()
</script>

<script>

  $(function () {
    $('#example').DataTable()
  })

</script>

