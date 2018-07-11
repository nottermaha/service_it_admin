
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
          <?php $s_type='' ;$s_type=session('s_type','default');?>
          <?php $s_store_branch_id='' ;$s_store_branch_id=session('s_store_branch_id','default');?>
          @if($s_type == 1)
            1. ออกรายงานการซ่อมตาม สาขา หรือ เลือกทั้งหมด และสถานะการซ่อม หรือ จะเลือกสถานะทั้งหมด <U>สถานะเป็นส่วนของหน้าเปิดบิลงานซ่อม(หน้าร้าน) </U> ช่องวันที่คือช่วงเวลา จากวันไหน ถึงวันไหน
          @else
            1. ออกรายงานการซ่อมสาขาที่ท่านสังกัด และสถานะการซ่อม หรือ จะเลือกสถานะทั้งหมด <U>สถานะเป็นส่วนของหน้าเปิดบิลงานซ่อม(หน้าร้าน) </U> ช่องวันที่คือช่วงเวลา จากวันไหน ถึงวันไหน
          @endif
                <div class="row">
                  <div class="col-md-3">
                      <br>  
                      <?= Form::open(array('url' => '/report-print')) ?>
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

                        @if($s_type == 1)
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                            @foreach($store_branchs as $store_branch)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                            @endforeach
                        @else
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            @foreach($store_branchs as $store_branch)
                              @if($s_store_branch_id == $store_branch->id)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                              @endif
                            @endforeach
                        @endif
                        </select>              
                    </div>
                    
                    <div class="col-md-2">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_repair_id">      
                        <option value="" ><b>เลือกสถานะ</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          
                            <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                            @foreach($status_repairs as $status_repair)
                                <option value="{{ $status_repair->id }}" >{{ $status_repair->name }}</option>
                            @endforeach
                        </select>             
                    </div>

                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                    <!-- <div class="row">
                      <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button></div>
                    </div>
                    <div class="row" > -->
                      <input type="hidden" name="chk" value="{{$chk}}">
                      <input type="hidden" name="chk_print" value="1">
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button></div>
                    </div>
                      {!! Form::close() !!}
                
<!-- /////////////////////row///////////////////////// -->
<br>
          @if($s_type == 1)
              2. ออกรายงานการซ่อมของลูกค้าสมาชิก โดยสามารถเลือกตามสาขา หรือ เลือกทั้งหมด และ เลือกสถานะการซ่อม หรือเลือกทั้งหมดได้ <U>สถานะเป็นส่วนของหน้าเปิดบิลงานซ่อม(หน้าร้าน) </U> เลือกสมาชิกคนที่่ต้องการได้ ช่องวันที่คือช่วงเวลา จากวันไหน ถึงวันไหน
          @else
              2. ออกรายงานการซ่อมของลูกค้าสมาชิก โดยสามารถเลือกสาขาที่ท่านสังกัด และ เลือกสถานะการซ่อม หรือเลือกทั้งหมดได้ <U>สถานะเป็นส่วนของหน้าเปิดบิลงานซ่อม(หน้าร้าน) </U> เลือกสมาชิกคนที่่ต้องการได้ ช่องวันที่คือช่วงเวลา จากวันไหน ถึงวันไหน
          @endif

<div class="row">      

                  <?= Form::open(array('url' => '/report-print')) ?>
                  {{ csrf_field() }}

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id">      
                        @if($s_type == 1)
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                            @foreach($store_branchs as $store_branch)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                            @endforeach
                        @else
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            @foreach($store_branchs as $store_branch)
                              @if($s_store_branch_id == $store_branch->id)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                              @endif
                            @endforeach
                        @endif
                        </select>              
                    </div>

                    <div class="col-md-3">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="person_member_id">      
                        <option value="" ><b>เลือกลูกค้าสมาชิก</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($person_members as $person_member)
                              <option value="{{ $person_member->id }}" >{{ $person_member->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                     <div class="col-md-2" style="margin-right:40px;">
                      <!-- <br> -->  จาก:
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                         <input type="date" class="form-control pull-right" id="" name="chk_date_in" placeholder="จากวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>            
                    </div>
                    <div class="col-md-2" style="margin-right:40px;">
                      <!-- <br> -->ถึง: 
                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar fa-lg"></i>
                          </div>
                         <input type="date" class="form-control pull-right" id="" name="chk_date_out" placeholder="ถึงวันที่..." data-date-format="yyyy-mm-dd" required value="{{ $current_date }}">
                      </div>              
                    </div>

                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                      <!-- <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button> -->
                      <input type="hidden" name="chk" value="{{$chk}}">
                      <input type="hidden" name="chk_print" value="2">
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button>
                    </div>
                      {!! Form::close() !!}
                      </div>
 <!-- ///////////////////////////////////////////// -->
 <br>
          @if($s_type == 1)
              3. ออกรายงานการซ่อมของลูกค้าทั่วไป โดยสามารถเลือกตามสาขา หรือ เลือกทั้งหมด ช่องวันที่คือช่วงเวลา จากวันไหน - วันไหน
          @else
              3. ออกรายงานการซ่อมของลูกค้าทั่วไป โดยสามารถเลือกสาขาที่ท่านสังกัด ช่องวันที่คือช่วงเวลา จากวันไหน - วันไหน
          @endif

 <div class="row">
 <div class="col-md-3">
                      <br>
                      
                      <?= Form::open(array('url' => '/report-print')) ?>
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
                        @if($s_type == 1)
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                            @foreach($store_branchs as $store_branch)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                            @endforeach
                        @else
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            @foreach($store_branchs as $store_branch)
                              @if($s_store_branch_id == $store_branch->id)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                              @endif
                            @endforeach
                        @endif
                        </select>              
                    </div>

                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                    <!-- <div class="row">
                      <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button></div>
                    </div>
                    <div class="row" > -->
                    <input type="hidden" name="chk" value="{{$chk}}">
                      <input type="hidden" name="chk_print" value="3">
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button></div>
                    </div>
                      {!! Form::close() !!}
                      
<!-- ////////////////////////////////////////////////////-->
<br>
          @if($s_type == 1)
              4. ออกรายงานการซ่อมของช่าง โดยสามารถเลือกตามสาขา หรือ เลือกทั้งหมด และ เลือกสถานะการซ่อม หรือเลือกทั้งหมดได้ <U>สถานะเป็นส่วนของหน้ารายการซ่อมของช่าง </U> ช่องวันที่คือช่วงเวลา จากวันไหน - วันไหน    
          @else
              4. ออกรายงานการซ่อมของช่าง โดยสามารถเลือกช่างสาขาท่าน และ เลือกสถานะการซ่อม หรือเลือกทั้งหมดได้ <U>สถานะเป็นส่วนของหน้ารายการซ่อมของช่าง </U> ช่องวันที่คือช่วงเวลา จากวันไหน - วันไหน    
          @endif
   
<div class="row">


                    <div class="col-md-3">
                      <br>
                      <?= Form::open(array('url' => '/report-print')) ?>
                        <select  required class="form-control select2" style="width: 100%;" name="store_branch_id" onchange="this.form.submit()">      
                        @if($s_type == 1)
                            @if($chk_get_per==1)    
                              <option value="" ><b>{{ $chk_name }}</b></option> 
                            @else
                            <option value="" ><b>เลือกสาขา</b></option>  
                            @endif
                            @foreach($store_branchs as $store_branch)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                            @endforeach
                        @else
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            @foreach($store_branchs as $store_branch)
                              @if($s_store_branch_id == $store_branch->id)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                              @endif
                            @endforeach
                        @endif

                          <!-- <option disabled="disabled"></option> -->
                          
                        </select> 
                        
                        <input type="hidden" name="chk" value="{{$chk}}">
                      <input type="hidden" name="chk_print" value="4">
                      <input type="hidden" name="chk_get_person" value="1">
                      {!! Form::close() !!}    
                    </div>

                    <script>
                    $('[name="store_branch_id"]').change(function() {
                      $(this).closest('form').submit();
                    });
                    </script>    


          <?= Form::open(array('url' => '/report-print')) ?>                 
                    <div class="col-md-2">
                      <br>{{ csrf_field() }}
                        <select  required class="form-control select2" style="width: 100%;" name="person_id" >      
                        <option value="" ><b>เลือกช่างซ่อม</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <!-- <option value="-1" ><b>เลือกทั้งหมด</b></option>  -->
                          @if($chk_get_per==1)    
                              @foreach($persons as $person)
                                  <option value="{{ $person->id }}" >{{ $person->person_name }}</option>
                            @endforeach
                          @endif

                        </select> 
                    </div>


                  <div class="col-md-3">
                      <br>
                      
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


                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                    <input type="hidden" name="chk" value="{{$chk}}">
                      <input type="hidden" name="chk_print" value="4">
                      <!-- <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button> -->
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button>
                    </div>
                      {!! Form::close() !!}
                      </div>
<!-- /////////////////////////////////////// -->
<br>
          @if($s_type == 1)
              5. ออกรายงานการซ่อมของอะไหล่ที่ใช้ซ่อมแต่ละรายการ โดยสามารถเลือกตามสาขา หรือ เลือกทั้งหมด และ เลือกสถานะการซ่อม หรือเลือกทั้งหมดได้ <U>สถานะเป็นส่วนของหน้าเปิดบิลงานซ่อม </U> ช่องวันที่คือช่วงเวลา จากวันไหน - วันไหน
          @else
             5. ออกรายงานการซ่อมของอะไหล่ที่ใช้ซ่อมแต่ละรายการ โดยสามารถเลือกสาขาที่ท่านสังกัด และ เลือกสถานะการซ่อม หรือเลือกทั้งหมดได้ <U>สถานะเป็นส่วนของหน้าเปิดบิลงานซ่อม </U> ช่องวันที่คือช่วงเวลา จากวันไหน - วันไหน   
          @endif

 <div class="row">
 <div class="col-md-3">
                      <br>
                      
                      <?= Form::open(array('url' => '/report-print')) ?>
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
                        @if($s_type == 1)
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                            @foreach($store_branchs as $store_branch)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                            @endforeach
                        @else
                          <option value="" ><b>เลือกสาขา</b></option>  
                            <!-- <option disabled="disabled"></option> -->
                            @foreach($store_branchs as $store_branch)
                              @if($s_store_branch_id == $store_branch->id)
                                <option value="{{ $store_branch->id }}" >{{ $store_branch->name }}</option>
                              @endif
                            @endforeach
                        @endif
                        </select>              
                    </div>
                    
                    <div class="col-md-2">
                      <br>
                        <select  required class="form-control select2" style="width: 100%;" name="status_repair_id">      
                        <option value="" ><b>เลือกสถานะ</b></option>  
                          <!-- <option disabled="disabled"></option> -->
                          <option value="-1" ><b>เลือกทั้งหมด</b></option> 
                          @foreach($status_repairs as $status_repair)
                              <option value="{{ $status_repair->id }}" >{{ $status_repair->name }}</option>
                          @endforeach
                        </select>             
                    </div>

                    <div class="col-md-1 col-xs-1" style="margin-top:17px;">
                    <div class="row">
                      <!-- <button type="submit" class="btn btn-warning ">ดูตัวอย่าง</button></div> -->
                    </div>
                    <div class="row" >
                    <input type="hidden" name="chk" value="{{$chk}}">
                      <input type="hidden" name="chk_print" value="5">
                      <button type="submit" class="btn btn-success "><i class="fa fa-download"></i>&nbsp; Excel</button></div>
                    </div>
                      {!! Form::close() !!}
<!--////////////////////////////////-->

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
                                @elseif($chk==5)
                                อะไหล่
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
@if($chk!=4)  
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
@endif
      <br>

@if($chk!=4)
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
              <!-- @if($chk==4)
              <th class="text-center">ชื่อล็อต</th>
              <th class="text-center">ชื่ออะไหล่</th>
              <th class="text-center">จำนวน</th>
              <th class="text-center">ราคา</th>
              @endif -->
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
            @if($chk_name!='')
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
            @endif
          </tbody>
          </table>

        </div>
      </div>
  </div>
</div>
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

