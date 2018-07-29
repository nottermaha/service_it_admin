<script>
	function checkText()
	{   var y = document.getElementById("username").value;
		var elem = document.getElementById('username').value;
		if(!elem.match(/^([a-z0-9\_])+$/i))
		{
            document.getElementById('txt_username').innerHTML = "กรุณากรอกชื่อผู้ใช้เป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";
		}
        else if(y.length<4){document.getElementById('txt_username').innerHTML = "ชื่อผู้ใช้ไม่ควรต่ำกว่า 4 ตัว";}
        else{document.getElementById('txt_username').innerHTML = "";}
	}
    function checkName()
	{   var y = document.getElementById("name").value;
        if(y.length<1){document.getElementById('txt_name').innerHTML = "กรุณากรอก ชื่อ-นามสกุล";}
        else{document.getElementById('txt_name').innerHTML = "";}
	}
	function ChkLengthPass()
	{   var y = document.getElementById("password").value;
		var elem = document.getElementById("password").value;
        if(!elem.match(/^([a-z0-9\_])+$/i))
		{
            document.getElementById('pass').innerHTML = "กรุณากรอกรหัสผ่านเป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";
		}
		else if(y.length<8){document.getElementById('pass').innerHTML = "รหัสผ่านไม่ควรต่ำกว่า 8 ตัว";}
		else{document.getElementById('pass').innerHTML = "";}
	}
    function ChkRePass()
	{
		var x = document.getElementById("password");
		var y = document.getElementById("repassword");
		if(x.value!=y.value){document.getElementById('repassw').innerHTML = "การยืนยันรหัสผ่านไม่ตรงกัน";}
		else{document.getElementById('repassw').innerHTML = "";}
	}
    function ChkEmail(){
            var x = document.getElementById("email");
			var y = x.value;
            var emailFilter=/^.+@.+\..{2,3}$/;
            // var str=document.form.text1.value;
        if (!(emailFilter.test(y))) { 
            document.getElementById('txt_email').innerHTML = "อีเมลล์ไม่ถูกต้อง";
            return false;
        }
        else{document.getElementById('txt_email').innerHTML = "";}
        //  return true;
    }
  
    function CheckMobileNumber() {
        var msg = 'โปรดกรอกหมายเลขโทรศัพท์ 10 หลัก ด้วยรูปแบบดังนี้ 08XXXXXXXX ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค';
        var x = document.getElementById("phone").value;
        s = new String(x);

        if ( s.length != 10)
        {
            document.getElementById('txt_phone').innerHTML = "เบอร์โทรศัพท์ต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
            //   alert(msg);
            return false;
        }

            for (i = 0; i < s.length; i++ ) {               
                if ( s.charCodeAt(i) < 48 || s.charCodeAt(i) > 57 ) {
                    document.getElementById('txt_phone').innerHTML = "เบอร์โทรศัพท์ต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
                    //  alert(msg);
                    return false;
                } 
                    if ( ((i == 0) && (s.charCodeAt(i) != 48)) || ((i == 1) && (s.charCodeAt(i) == 55)) || ((i == 1) && (s.charCodeAt(i) == 49)) || ((i == 1) && (s.charCodeAt(i) == 48) ))
                    {
                        document.getElementById('txt_phone').innerHTML = "เบอร์โทรศัพท์ต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
                        return false;
                    }
                    else{
                        document.getElementById('txt_phone').innerHTML = "";
                    }
            }            
            return true;
    }

    function checkIDD() 
    { 
        var id = document.getElementById("person_id").value;
        if(id.length != 13) return false; 
        for(i=0, sum=0; i < 12; i++) 
        sum += parseFloat(id.charAt(i))*(13-i); if((11-sum%11)%10!=parseFloat(id.charAt(12))) 
        return false; return true;
    }
    function checkID() 
    { 
        if(!checkIDD(person_id.value)) 
        {
            document.getElementById('txt_person_id').innerHTML = "เลขประจำตัวประชาชนของท่านไม่ถูกต้อง";
        }
        else
        {
            document.getElementById('txt_person_id').innerHTML = "";
        } 
    }
    //////////////onclick////////////////
    function BtnChkSubmit() 
    { 
      
        var y = document.getElementById("username").value;
		var elem = document.getElementById('username').value;
        var str = "กรุณาตรวจสอบข้อมูลให้ถูกต้องก่อนทำการสมัครสมาชิก";
		if(!elem.match(/^([a-z0-9\_])+$/i))
		{
            document.getElementById('txt_username').innerHTML = "กรุณากรอกชื่อผู้ใช้เป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";return false;
		}
        else if(y.length<4){document.getElementById('txt_username').innerHTML = "ชื่อผู้ใช้ไม่ควรต่ำกว่า 4 ตัว";return false;}
        else{document.getElementById('txt_username').innerHTML = "";}
        ////
        // alert('555');
        var y = document.getElementById("name").value;
        if(y.length<1){document.getElementById('txt_name').innerHTML = "กรุณากรอก ชื่อ-นามสกุล";return false}
        else{document.getElementById('txt_name').innerHTML = "";}
        ///
         
        // var y = document.getElementById("password").value;
		// var elem = document.getElementById("password").value;
   
        // if(!elem.match(/^([a-z0-9\_])+$/i))
		// {
        //     document.getElementById('pass').innerHTML = "กรุณากรอกรหัสผ่านเป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";return false;
		// }
		// else if(y.length<8){document.getElementById('pass').innerHTML = "รหัสผ่านไม่ควรต่ำกว่า 8 ตัว";return false;}
		// else{document.getElementById('pass').innerHTML = "";}
        ////
         
    //     var x = document.getElementById("password");
		// var y = document.getElementById("repassword");
		// if(x.value!=y.value){document.getElementById('repass').innerHTML = "การยืนยันรหัสผ่านไม่ตรงกัน";return false;}
		// else{document.getElementById('repass').innerHTML = "";}
        /////
        var x = document.getElementById("email").value;
        var emailFilter=/^.+@.+\..{2,3}$/;
            // var str=document.form.text1.value;
        if (!(emailFilter.test(x))) { 
            document.getElementById('txt_email').innerHTML = "อีเมลล์ไม่ถูกต้อง";
            return false;
        }
        else{document.getElementById('txt_email').innerHTML = "";}
        /////
        
        if(!CheckMobileNumber(phone.value)) 
        {
            document.getElementById('txt_phone').innerHTML = "เบอร์โทรศัพท์ต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";return false;
        }
        else
        {
            document.getElementById('txt_phone').innerHTML = "";
        }
        // else{
            ChkForm.submit();
        // }

    }

</script>
<!-- css header-leftmenu -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php $s_store_name=session('s_store_name','default'); ?>
  <!-- <title>ServiceIt | Manager</title> -->
  <title>{{$s_store_name}}</title>
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
 @include('form/header-leftmenu')

<!-- Main content -->
<section class="content">

<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <!-- <img class="profile-user-img img-responsive img-circle" src="dist/img/user4-128x128.jpg" alt="User profile picture"> -->
        @if($type==1||$type==2)
        <a href="{{ asset('image/person-manager/picture/'.$image_url) }}"><img class="profile-user-img img-responsive img-circle" src="{{ asset('image/person-manager/resize/'.$image_url) }}" ></a>
        @elseif($type==3)
        <a href="{{ asset('image/person-employee/picture/'.$image_url) }}"><img class="profile-user-img img-responsive img-circle" src="{{ asset('image/person-employee/resize/'.$image_url) }}" ></a>
        @endif
        <h3 class="profile-username text-center">{{$name}}</h3>

        <!-- <p class="text-muted text-center">Software Engineer</p> -->

        <!-- <ul class="list-group list-group-unbordered">
          <li class="list-group-item">
            <b>Followers</b> <a class="pull-right">1,322</a>
          </li>
          <li class="list-group-item">
            <b>Following</b> <a class="pull-right">543</a>
          </li>
          <li class="list-group-item">
            <b>Friends</b> <a class="pull-right">13,287</a>
          </li>
        </ul> -->

        <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">เกี่ยวกับฉัน</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i> ตำแหน่ง</strong>

        <p class="text-muted">
        @if($type==1)
        <p class="text-muted">แอดมิน</p>
        @elseif($type==2)
        <p class="text-muted">ผู้จัดการร้าน</p>
        @elseif($type==3)
        <p class="text-muted">พนักงาน</p>
        @endif
        </p>

        <hr>

        <strong><i class="fa fa-map-marker margin-r-5"></i> ร้านที่สังกัด</strong>

        <p class="text-muted">{{$store_branch_name}}</p>

        <hr>

        <!-- <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

        <p>
          <span class="label label-danger">UI Design</span>
          <span class="label label-success">Coding</span>
          <span class="label label-info">Javascript</span>
          <span class="label label-warning">PHP</span>
          <span class="label label-primary">Node.js</span>
        </p> -->

        <!-- <hr> -->

        <strong><i class="fa fa-file-text-o margin-r-5"></i>เป็นสมาชิกของระบบเมื่อ</strong>
        <p>{{$create_date }}</p>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
  <!-- /.col -->
 
  <div class="col-md-9">
            @if(session()->has('status_image_fail'))               
                  <script type="text/javascript">
                          $(window).on('load',function(){
                              $('#modal-edit-gallery<?php echo session()->get('status_id'); ?>').modal('show');
                          });   
                    </script>   
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i>ผิดพลาด การอัพโหลดรูปล้มเหลว!</h4>
                    กรุณาอัพโหลดรูปภาพที่เป็น .png .jpg .gif เท่านั่น.
                  </div>       
              @endif
              @if(session()->has('status_confirm_password_fail'))  
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-warning"></i> แก้ไขข้อมูลส่วนตัวล้มเหลว!</h4>
                        การยืนยันรหัสผ่านเดิมไม่ถูกต้อง                              
                    </div>  
            @endif    
              
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">โปรไฟล์</a></li>
        <li><a href="#timeline" data-toggle="tab">ทามไลน์</a></li>
        <li><a href="#settings" data-toggle="tab">แก้ไขโปรไฟล์</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post clearfix">
            
          </div>
          <!-- /.post -->

          <!-- Post -->
          <div class="post">
            <!-- /.user-block -->
            <div class="row margin-bottom">
              <div class="col-sm-6">
                <!-- <img class="img-responsive" src="dist/img/photo1.png" alt="Photo"> -->
                @if($type==1||$type==2)
                <img class="img-responsive" src="{{ asset('image/person-manager/picture/'.$image_url) }}"style="width:70%;margin: auto auto;" ></a>
                @elseif($type==3)
                <img class="img-responsive" src="{{ asset('image/person-employee/picture/'.$image_url) }}" ></a>
                @endif
              </div>
              <!-- /.col -->
              <div class="col-sm-5">
                  
                <div class="row">
                <h3>ข้อมูลส่วนตัว</h3>
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div>
                <div class="row">
                  <b >ชื่อ-ขนามสกุล : </b>{{$name}} 
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div>

                <div class="row">
                  <b  style="margin-top:-10px;">เลขประจำตัวประชาชน : </b>{{$person_id}} 
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div>

                <div class="row">
                  <b  style="margin-top:-10px;">เพศ : </b>
                  @if($gender==1)
                  ชาย
                  @else($gender)
                  หญิง
                  @endif
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div>

                <div class="row">
                  <b  style="margin-top:-10px;">วัน/เดือน/ปีเกิด : </b>{{$birth_date}} 
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div>

                <div class="row">
                  <b  style="margin-top:-10px;">อีเมล์ : </b>{{$email}} 
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div>

                <div class="row">
                  <b  style="margin-top:-10px;">เบอร์โทรศัพท์ : </b>{{$phone}} 
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div>

                <div class="row">
                  <b  style="margin-top:-10px;">ที่อยู่ : </b>{{$address}} 
                  <hr style="margin-top:5px;margin-bottom:5px;">
                </div><br>
                <div class="row text-center">
                <a href="#settings" class="btn btn-warning "data-toggle="tab"><i class="fa fa-edit"></i> แก้ไขโปรไฟล์</a>
                </div>


              </div>
              <!-- /.col -->
              
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.post -->
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="timeline">
          <!-- The timeline -->
          <ul class="timeline timeline-inverse">
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-red">
                    ข้อมูลร้านที่สังกัด
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-home bg-blue"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->
                  <h3 class="timeline-header no-border"><a href="#">สาขาที่สังกัด</a>
                  {{$store_branch_name}}
                </h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-user bg-aqua"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span> -->

                <h3 class="timeline-header no-border"><a href="#">ตำแหน่ง</a>
                      @if($type==1)
                          แอดมิน
                      @elseif($type==2)
                          ผู้จัดการร้าน
                      @elseif($type==3)
                          พนักงาน
                      @endif
                </h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-clock-o bg-yellow"></i>

              <div class="timeline-item">
                <!-- <span class="time"><i class="fa fa-clock-o"></i> 12:05</span> -->
                  <h3 class="timeline-header no-border"><a href="#">เป็นสมาชิกของระบบเมื่อ</a>: {{ $create_date }}
                  
                </h3>
              </div>
            </li>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <li class="time-label">
                  <span class="bg-green">
                    รายการที่ท่านเป็นผู้เปิดบิล
                  </span>
            </li>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <li>
              <i class="fa fa-wrench bg-purple"></i>

              <div class="timeline-item">
               
              <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>#</th>
            <th>บิล</th>
            <th>ผู้แจ้งซ่อม</th>
            <th>ลูกค้า</th>
            <th>สถานะ</th>
            <th>รายละะเอียด</th>
          </tr>
        </thead>
        
        <tbody> <?php $j=0 ?>
        @foreach($repairs as $repair)     
          <tr>
            <td>{{ $j=$j+1 }}</td>
            <td>{{$repair->bin_number}}</td>
            <td>{{$repair->is_name}}</td>
            <td>
            @if($repair->is_type==4)
            <b style="color:blue;">ลูกค้าสมาชิก</b>
            @elseif($repair->is_type!=4)
            <b style="color:green;">ลูกค้าทั่วไป</b>
            @endif
            </td>
            <td>
              @if($repair->status_repair==1)
              <b style="color:orange;">สินค้าพึ่งเข้าระบบ</b>
              @elseif($repair->status_repair==2)
              <b style="color:gray;">กำลังซ่อมสินค้า</b>
              @elseif($repair->status_repair==3)
              <b style="color:green;">ซ่อมสินค้าเสร็จแล้ว</b>
              @elseif($repair->status_repair==4)
              <b style="color:blue;">ลูกค้ารับสินค้าคืนแล้ว</b>
              @elseif($repair->status_repair==5)
              <b style="color:red;">ยกเลิกการซ่อมสินค้า</b>
              @endif
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-detail{{ $repair->r_id }}"><i class="fa fa-list fa-lg"></i>&nbsp; 
            </button>
            </td>
            <!-- //////////////////////////////repair//////////////////////////////// -->

            <div class="modal fade " id="modal-detail{{ $repair->r_id }}">
              <div class="modal-dialog " style="width:800px;">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title text-center" ><b>รายละเอียด</b></h3>
                  </div>        
               
                    <div class="modal-body">

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          หมายเลขบิล : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->bin_number }}</b>
                        </div>
                    </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ชื่อลูกค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->is_name }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                       <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          เบอร์โทรศัพท์ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->is_phone }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                        <b for="" class="control-label col-md-3"style="text-align:right">
                                อุปกรณ์ที่นำมาซ่อม  </b><br>
                                <?php $i=0 ?>
                        @foreach($list_repairs as $list_repair)
                              @if( $list_repair->repair_id_form_list==$repair->r_id )
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                {{ $i=$i+1 }} : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->list_name }}
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                อาการเสีย : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->symptom }}
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                รายละเอียด : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->detail }}
                                </b>
                              @endif
                          @endforeach
                          
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          อุปกรณ์ที่ติดมาด้วย : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->equipment_follow }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ราคาประเมิน : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->price }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ราคาจริง : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->after_price }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่รับเข้าระบบ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->date_in }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่คืนสินค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->date_out }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      
                    </div> 
                      <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button> -->
                      </div>
                
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End repair//////////////////////////////// -->
          </tr>
        @endforeach
        </tbody>
      </table>


              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="settings">
          <!-- <form class="form-horizontal"> -->


          <!-- ////////////////////////////////////////////////////////////////// -->
          {!!  Form::open(['url'=>'/profile-edit','class'=>'form-horizontal','files'=>true,'id'=>'ChkForm'])   !!}
          <div class="col-md-12">
        <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">บันทึกข้อมูลการเข้าสู่ระบบ</h3>
                </div>
            <div class="box-body">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">ชื่อผู้ใช้ <b style="color:red;font-size:20px;">*</b></label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-user fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="" placeholder="ชื่อผู้ใช้..." value="{{$username}}" disabled>
                            </div>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รหัสผ่าน <b style="color:red;font-size:20px;">*</b></label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="password" class="form-control pull-right"  name="" placeholder="รหัสผ่าน..." value="{{$password}}" disabled>
                            </div>
                        </div>  
                </div>


    <div class="row">
    <div class="col-sm-12 text-center">
        <input type="button"  class="btn btn-warning " name="answer" value="แก้ไขข้อมูลเข้าการสู่ระบบ <<คลิก>>" onclick="showDivna()" />
          <div id="welcomeDivna"  style="display:none;" class="answer_list" >
                <div class="form-group" style="padding-top:10px;">
                    <label for="Birthday" class="control-label col-sm-3">ชื่อผู้ใช้ </label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-user fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="username" placeholder="ชื่อผู้ใช้..." value="{{$username}}" id="username"required onBlur="checkText()">
                            </div><b  id="txt_username" style="color:red;"></b>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รหัสผ่านใหม่ </label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="password" class="form-control pull-right"  name="newpassword" placeholder="รหัสผ่านใหม่ (กรอกข้อมูลหากท่านต้องการเปลี่ยนรหัสผ่านใหม่)..." value="" id="password"onBlur="ChkLengthPass()" required>
                            </div><b  id="pass" style="color:red;"></b>
                        </div>  
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รหัสผ่านอีกครั้ง </label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="password" class="form-control pull-right"  name="" placeholder="รหัสผ่านอีกครั้ง..." value="" id="repassword"onBlur="ChkRePass()" required>
                            </div><b  id="repassw" style="color:red;"></b>
                        </div>  
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">ยืนยันรหัสผ่านเดิม </label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="password" class="form-control pull-right"  name="oldpassword" placeholder="รหัสผ่านเดิม..." value="" >
                            </div>
                        </div>  
                </div>

          </div>

          </div>
          </div>

            </div>
        </div>
    </div>


        <div class="col-md-12">
        <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">บันทึกข้อมูลทั่วไป</h3>
                </div>
            <div class="box-body">
                <div class="form-group">
                    <label for="Name" class="control-label col-sm-3">ชื่อ-นามสกุล <b style="color:red;font-size:20px;">*</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control"  name="name" placeholder="ชื่อ-นามสกุล..." value="{{$name}}" id="name"required onBlur="checkName()">
                    </div><b  id="txt_name" style="color:red;"></b>
                </div>

                <div class="form-group">
                    <label for="Person_id" class="control-label col-sm-3">เลขประจำตัวประชาชน</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="person_id" placeholder="เลขประจำตัวประชาชน..." value="{{$person_id}}" id="person_id" onBlur="checkID()">
                        </div><b  id="txt_person_id" style="color:red;"></b>
                </div>

                <div class="form-group">
                    <label for="Gender" class="control-label col-sm-3">เพศ</label>
                        <div class="col-sm-2">
                            <label>
                                <input type="radio" name="gender" class="flat-red2" checked value="1">
                            </label>&nbsp;&nbsp;ชาย  
                        </div>
                        <div class="col-sm-2">
                            <label>
                                <input type="radio" name="gender" class="flat-red2" value="2">
                            </label>&nbsp;&nbsp;หญิง
                        </div>
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">วัน/เดือน/ปีเกิด</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar fa-lg"></i>
                                </div>
                                <input type="date" class="form-control pull-right" id="" name="birthday" placeholder="วัน/เดือน/ปีเกิด..." data-date-format="yyyy-mm-dd" value="{{$birthday}}">
                            </div>
                        </div>          
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">อีเมล์ <b style="color:red;font-size:20px;">*</b></label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-envelope fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" name="email" placeholder="อีเมล์..." value="{{$email}}" onBlur="ChkEmail()" id="email" >
                            </div><b  id="txt_email" style="color:red;"></b>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">เบอร์โทรศัพท์ <b style="color:red;font-size:20px;">*</b></label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone fa-lg"></i>
                                </div>
                                    <input type="text" class="form-control pull-right"  name="phone" placeholder="เบอร์โทรศัพท์..." value="{{$phone}}" id="phone" required onBlur="CheckMobileNumber()">
                            </div><b id="txt_phone" style="color:red;"></b>
                        </div> 
                </div> 

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รูปประจำตัว</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-picture-o fa-lg"></i>
                                </div>
                                <input type="file" class="form-control pull-right" id="Image" name="image_url" placeholder="รูปประจำตัว..." value="{{$image_url}}">
                            </div>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Address" class="control-label col-sm-3">ที่อยู่</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="3" placeholder="ที่อยู่ ..." name="address" value="{{$address}}" disabled>{{$address}}</textarea>
                        </div>
                </div>

                 <div class="form-group">
                    <label for="Name" class="control-label col-sm-7 text-right">แก้ไขที่อยู่</label>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">เลขที่</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="home_number" value="{{$home_number}}">
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">หมู่ที่</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="group_number" value="{{$group_number}}">
                            </div>
                    </div>
                </div>

               <div class="form-group">
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">หมู่บ้าน</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="home_name" value="{{$home_name}}">
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">ตรอก</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="alley" value="{{$alley}}">
                            </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">ซอย</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="soy" value="{{$soy}}">
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">ถนน</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="road" value="{{$road}}">
                            </div>
                    </div>
                </div>

                 <div class="form-group">
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">จังหวัด</label>
                            <div class="col-md-9">
                                <select  class="form-control " style="width: 100%;" name="PROVINCE_ID" id="province">
                                <option value="PROVINCE_NAME">- กรุณาเลือกจังหวัด -</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">อำเภอ</label>
                            <div class="col-md-9">
                                <select  class="form-control " style="width: 100%;" name="AMPHUR_ID" id="amphur">
                                <option>- กรุณาเลือกอำเภอ -</option>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">ตำบล</label>
                            <div class="col-md-9">
                                <select  class="form-control " style="width: 100%;" name="DISTRICT_ID" id="district">
                                <option>- กรุณาเลือกตำบล -</option>
                                </select>
                            </div>
                    </div>
                    <div class="col-sm-6">
                            <label for="Name" class="control-label col-sm-3">รหัสไปรษณีย์</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control pull-right" name="postcode" 
                                id="postcode" disabled>
                            </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
          <input type="hidden" name="id"value="{{$profile_id}}">
          <button  type="button" onClick="BtnChkSubmit()" class="btn btn-success btn-lg">บันทึก</button>
        </div>
    </div>
    </form>

<!-- ///////////////////////////////////////////////////////////////////////////////////// -->

            <!-- <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputName" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>

              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Name</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

              <div class="col-sm-10">
                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div> -->
          <!-- </form> -->
        </div>
        <!-- /.tab-pane -->
      </div>
      <!-- /.tab-content -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

    @if (session()->has('status_edit'))     
     <script>swal({ title: "<?php echo session()->get('status_edit'); ?>",        
                     text: "ผลการทํางาน",         
                     timer: 2500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>
     @endif 

</section>
<!-- /.content -->
</div>

@include('form/footer')

  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- //////////// -->
<script src="AutoProvince.js"></script>
<!-- /////////// -->
<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })

</script>
<script>
  //Flat red color scheme for iCheck
  $('input[type="checkbox"].flat-red2, input[type="radio"].flat-red2').iCheck({
  checkboxClass: 'icheckbox_flat-green',
  radioClass   : 'iradio_flat-green'
  })
  //Date picker
  $('#datepicker').datepicker({
  autoclose: true
  })
  $('#datepicker2').datepicker({
  autoclose: true
  })
  $('#datepicker3').datepicker({
  autoclose: true
  })
    //Initialize Select2 Elements
    $('.select2').select2()
</script>
<script>
$('body').AutoProvince({
	PROVINCE:		'#province', // select div สำหรับรายชื่อจังหวัด
	AMPHUR:			'#amphur', // select div สำหรับรายชื่ออำเภอ
	DISTRICT:		'#district', // select div สำหรับรายชื่อตำบล
	POSTCODE:		'#postcode', // input field สำหรับรายชื่อรหัสไปรษณีย์
	arrangeByName:		false // กำหนดให้เรียงตามตัวอักษร
});
</script>

<script>
    function showDivna(){ 
        var x = document.getElementById("welcomeDivna");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }   

    }
</script>