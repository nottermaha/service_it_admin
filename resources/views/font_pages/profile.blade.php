
@include('form/header-font')
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
            document.getElementById('pass').innerHTML = "กรุณากรอกรหัสผ่านเแชป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";
		}
		else if(y.length<8){document.getElementById('pass').innerHTML = "รหัสผ่านไม่ควรต่ำกว่า 8 ตัว";}
		else{document.getElementById('pass').innerHTML = "";}
	}
    function ChkRePass()
	{
		var x = document.getElementById("password");
		var y = document.getElementById("repassword");
		if(x.value!=y.value){document.getElementById('repass').innerHTML = "การยืนยันรหัสผ่านไม่ตรงกัน";}
		else{document.getElementById('repass').innerHTML = "";}
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
            document.getElementById('txt_phone').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
            //   alert(msg);
            return false;
        }

            for (i = 0; i < s.length; i++ ) {               
                if ( s.charCodeAt(i) < 48 || s.charCodeAt(i) > 57 ) {
                    document.getElementById('txt_phone').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
                    //  alert(msg);
                    return false;
                } 
                    if ( ((i == 0) && (s.charCodeAt(i) != 48)) || ((i == 1) && (s.charCodeAt(i) == 55)) || ((i == 1) && (s.charCodeAt(i) == 49)) || ((i == 1) && (s.charCodeAt(i) == 48)) )
                    {
                        document.getElementById('txt_phone').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
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
        var y = document.getElementById("name").value;
        if(y.length<1){document.getElementById('txt_name').innerHTML = "กรุณากรอก ชื่อ-นามสกุล";return false}
        else{document.getElementById('txt_name').innerHTML = "";}
        ///
        var y = document.getElementById("password").value;
		var elem = document.getElementById("password").value;
        if(!elem.match(/^([a-z0-9\_])+$/i))
		{
            document.getElementById('pass').innerHTML = "กรุณากรอกรหัสผ่านเแชป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";return false;
		}
		else if(y.length<8){document.getElementById('pass').innerHTML = "รหัสผ่านไม่ควรต่ำกว่า 8 ตัว";return false;}
		else{document.getElementById('pass').innerHTML = "";}
        ////
        var x = document.getElementById("password");
		var y = document.getElementById("repassword");
		if(x.value!=y.value){document.getElementById('repass').innerHTML = "การยืนยันรหัสผ่านไม่ตรงกัน";return false;}
		else{document.getElementById('repass').innerHTML = "";}
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
            document.getElementById('txt_phone').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";return false;
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

<div id="page-content" class="col-md-10 center-margin frontend-components mrg25T">
<div class="row mailbox-wrapper">
<div class="col-md-3">

    <div class="panel-layout">
        <div class="panel-box">

            <div class="panel-content image-box">
                <div class="ribbon">
                    <div class="bg-primary">รูปโปรไฟล์</div>
                </div>
                <div class="image-content font-white">

                    <div class="meta-box meta-box-bottom">
                        <!-- <img src="assets/image-resources/gravatar.jpg" alt="" class="meta-image img-bordered img-circle"> -->
                        <a href="{{ asset('image/person-member/picture/'.$image_url) }}"><img src="{{ asset('image/person-member/resize/'.$image_url) }}" style="height:150px;width:150px;border-radius: 50%;"></a> 
                        <h3 class="meta-heading">{{$name}}</h3>
                        <!-- <h4 class="meta-subheading">ลูกค้าสมาชิก</h4> -->
                    </div>

                </div>
                <img src="assets/image-resources/blurred-bg/blurred-bg-13.jpg" alt="">

            </div>
            <div class="panel-content pad15A bg-white radius-bottom-all-4">
                
                <blockquote class="font-gray">
                    <p>ลูกค้าสมาชิก.</p>
                    <!-- <small>
                        Programmer at
                        <cite title="Monarch">Monarch</cite>
                    </small> -->
                </blockquote>
            </div>
        </div>
    </div>
    
    <div class="content-box mrg15B">
        <h3 class="content-box-header clearfix">
            ทามไลน์ของคุณ
            <div class="font-size-11 float-right">
                <a href="#" title="">
                    <i class="glyph-icon mrg5R opacity-hover icon-plus"></i>
                </a>
                <a href="#" title="">
                    <i class="glyph-icon opacity-hover icon-cog"></i>
                </a>
            </div>
        </h3>
        <div class="content-box-wrapper text-center clearfix">
            <div class="timeline-box timeline-box-right">
                <div class="tl-row">
                    <div class="tl-item">
                        <div class="tl-icon bg-yellow">
                            <i class="glyph-icon icon-eyedropper"></i>
                        </div>
                        <div class="popover left">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                <div class="tl-label bs-label label-success">เป็นสมาชิกเมื่อ</div>
                                <!-- <p class="tl-content">Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.</p> -->
                                <div class="tl-time">
                                    <i class="glyph-icon icon-clock-o"></i>
                                    {{ $date_created }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tl-row">
                    <div class="tl-item">
                        <div class="tl-icon bg-green">
                            <i class="glyph-icon icon-list"></i>
                        </div>
                        <div class="popover left">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                <div class="tl-label bs-label label-success">รายการซ่อมที่ปิดบิลแล้ว</div>
                                <div class="tl-time">
                                    <i class="glyph-icon icon-check"></i>
                                    จำนวน {{$count_close}}  รายการ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tl-row">
                    <div class="tl-item">
                        <div class="tl-icon bg-red">
                            <i class="glyph-icon icon-list"></i>
                        </div>
                        <div class="popover left">
                            <div class="arrow"></div>
                            <div class="popover-content">
                                <div class="tl-label bs-label label-danger">รายการซ่อมที่ยังไม่ปิดบิล</div>
                                <div class="tl-time">
                                    <i class="glyph-icon icon-close"></i>
                                    จำนวน  {{$count_on}}  รายการ
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="col-md-9">

    <div class="example-box-wrapper">
        <ul class="list-group row list-group-icons">
            <li class="col-md-3 active">
                <a href="#tab-example-4" data-toggle="tab" class="list-group-item">
                    <i class="glyph-icon font-green icon-user"></i>
                     ข้อมูลส่วนตัว 
                </a>
            </li>
            <li class="col-md-3">
                <a href="#tab-example-1" data-toggle="tab" class="list-group-item">
                    <i class="glyph-icon font-green icon-dashboard"></i>
                    แก้ไขข้อมูลส่วนตัว
                </a>
            </li>
            <li class="col-md-3">
                <a href="#tab-example-2" data-toggle="tab" class="list-group-item">
                <i class="glyph-icon tooltip-button font-green icon-wrench" ></i>
                    <!-- <i class="glyph-icon font-primary icon-camera"></i> -->
                    การซ่อมสินค้าทั้งหมด
                </a>
            </li>
            <!-- <li class="col-md-3">
                <a href="#tab-example-3" data-toggle="tab" class="list-group-item">
                    <i class="glyph-icon font-blue-alt font-green icon-globe"></i>
                    รายการซ่อมปัจจุบัน
                </a>
            </li> -->
        </ul>
            @if(session()->has('status_image_fail'))                
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> การอัพโหลดรูปล้มเหลว!</h4>
                    กรุณาอัพโหลดรูปภาพที่เป็น .png .jpg .gif เท่านั่น.
                </div>       
            @endif
        <div class="tab-content">
            <div class="tab-pane fade " id="tab-example-1">
                <div class="alert alert-close alert-success">
                   <h3 class="text-center"><b>แก้ไขโปรไฟล์</b></h3>
                </div>
                <div class="row">

                    <div class="content-box">
                    {!!  Form::open(['url'=>'/font-profile-edit','class'=>'form-horizontal','files'=>true,'id'=>'ChkForm'])   !!}
                    <div class="form-horizontal pad15L pad15R bordered-row">

                        <div class="form-group">

                            <div class="row">
                                <label class="col-sm-3 control-label">ชื่อผู้ใช้</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-user " ></i></span>
                                        <input type="text" class="form-control" placeholder="ชื่อผู้ใช้..." name="username" id="username"required onBlur="checkText()" value="{{$username}}" >
                                    </div><b id="txt_username" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">รหัสผ่าน</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-lock " ></i></span>
                                        <input type="text" class="form-control" placeholder="รหัสผ่าน..." name="password" id="password"onBlur="ChkLengthPass()" required value="{{$password}}">
                                    </div><b id="pass" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">รหัสผ่านอีกครั้ง</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-lock "></i></span>
                                        <input type="password" class="form-control" placeholder="รหัสผ่านอีกครั้ง.." name="password" id="repassword" onBlur="ChkRePass()" required >
                                    </div><b id="repass" style="color:red;"></b>
                                </div>
                            </div>
                           
                        </div>  
                        <div class="form-group">

                            <div class="row">
                                <label class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล..." name="name" id="name" onBlur="checkName()"required value="{{$name}}">
                                    </div><b id="txt_name" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">เลขประจำตัวประชาชน</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน..." name="person_id" id="person_id" onBlur="checkID()" value="{{$person_id}}">
                                    </div><b id="txt_person_id" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">เพศ</label>
                                <div class="col-sm-8">
                                    <label style="padding-right:30px;">
                                        <input type="radio" id="inlineRadio110" name="gender" class="custom-radio" @if($gender==1) checked @endif value="1" value="{{$gender}}">
                                        ชาย
                                    </label>
                                    <label>
                                        <input type="radio" id="inlineRadio110" name="gender" class="custom-radio" @if($gender==2) checked @endif value"2" value="{{$gender}}">
                                        หญิง
                                    </label>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">วัน/เดือน/ปีเกิด</label>
                                <div class="col-sm-8">
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-calendar " ></i></span>
                                        <input type="text" class="form-control" placeholder="วัน/เดือน/ปีเกิด.." name="birthday">
                                    </div> -->
                                    <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon">
                                            <i class="glyph-icon icon-calendar"></i>
                                        </span>
                                        <input type="date" class="bootstrap-datepicker form-control" name="birthday" value="{{$birthday2}}">
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">อีเมล์</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-envelope " ></i></span>
                                        <input type="text" class="form-control" placeholder="อีเมล์.." name="email" onBlur="ChkEmail()" id="email"  required value="{{$email}}">
                                    </div><b id="txt_email" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">อีเมล์</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-envelope " ></i></span>
                                        <input type="text" class="form-control" placeholder="อีเมล์.." name="email" onBlur="ChkEmail()" id="email"  required value="{{$email}}">
                                    </div><b id="txt_email" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">เบอร์โทร</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-phone " ></i></span>
                                        <input type="text" class="form-control" placeholder="เบอร์โทร.." name="phone" id="phone"    required onBlur="CheckMobileNumber()"  value="{{$phone}}">
                                    </div><b id="txt_phone" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">รูปประจำตัว</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-picture-o " ></i></span>
                                        <input type="file" class="form-control" placeholder="รูปประจำตัว.." name="image_url" value="{{$image_url}}">
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">ที่อยู่</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon icon-home"></i></span>
                                        <!-- <input type="text" class="form-control" placeholder="ที่อยู่.."> -->
                                          <textarea  id="" class="form-control" placeholder="ที่อยู่..." name="address" value="{{$address}}">{{$address}}</textarea>

                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                <input type="hidden" name="id" value="{{$id}}">
                                <button type="button" onClick="BtnChkSubmit()" class="btn btn-warning">แก้ไขโปรไฟล์</button>
                                </div>
                            </div><br><br>

                        </div> 
                        </div> 
                    {!! Form::close() !!}
                </div>

                </div>
            </div>

            <div class="tab-pane fade pad0A" id="tab-example-2">
                <div class="content-box pad25A">
                <h3 class="title-hero">
                       <h3>รายการซ่อมสินค้าของท่าน</h3> 
                    </h3>
                    <div class="example-box-wrapper">

                    <table id="datatable-row-highlight" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>บิล</th>
                        <th>วันที่ซ่อม</th>
                        <th>ช่างซ่อม</th>
                        <th>สถานะ</th>
                        <th>สาขาที่ซ่อม</th>
                        <th>เพิ่มเติม</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>บิล</th>
                        <th>วันที่ซ่อม</th>
                        <th>ช่างซ่อม</th>
                        <th>สถานะ</th>
                        <th>สาขาที่ซ่อม</th>
                        <th>เพิ่มเติม</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    <?php $j=0 ?>
                        @foreach($repairs as $repair)
                        <tr>
                        <td>{{ $j=$j+1 }}</td>
                            <td>{{ $repair->bin_number }}
                            <br>
                            @if($repair->status_bill==0)
                            <b style="color:red;">ยังไม่ปิดบิล</b>
                            @elseif($repair->status_bill==1)
                            <b style="color:green;">ปิดบิลแล้ว</b>
                            @endif
                            </td>
                            <td>{{ $repair->date_in }}</td>
                            <td>{{ $repair->persons_name }}</td>
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
                            <td>{{ $repair->store_branch_name }}</td>
                            <td>
                            <button title="MonarchUI Admin Template" class="btn btn-sm btn-alt btn-hover mrg10R btn-purple">
                                <span data-toggle="modal" data-target="#modal-detail{{$repair->r_id}}">เพิ่มเติม</span>
                                <i class="glyph-icon icon-bars"></i>
                            </button><br>

                            </td>
         <!-- //////////////////////////////modal-login//////////////////////////////// -->

    <div class="modal fade " id="modal-detail{{$repair->r_id}}">
        <div class="modal-dialog " style="width:50%;">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">รายละเอียดการซ่อมสินค้า</h4>
          </div>  
                <div id="login-form" class="content-box">
                <div class="content-box-wrapper pad20A">

                   <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          หมายเลขบิล : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->bin_number }}</b>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ชื่อลูกค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->persons_member_name }}</b>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          เบอร์โทร : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->persons_member_phone }}</b>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group">
                        <b for="" class="control-label col-md-3"style="text-align:right">
                                อุปกรณ์ที่นำมาซ่อม  </b><br>
                                <?php $i=0 ?>
                        @foreach($list_repairs as $list_repair)
                              @if( $repair->r_id==$list_repair->repair_id_form_list )
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                {{ $i=$i+1 }} : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->list_name }}.
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                อาการเสีย : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->symptom }}
                                </b>
                                <!-- <b for="" class="control-label col-md-3"style="text-align:right">
                                รายละเอียด : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->detail }}.
                                </b> -->
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                ราคา : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->price }} บาท.
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                ช่างซ่อม : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{ $list_repair->person_name }}.
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                สถานะ : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                @if( $list_repair->status_color==1 )
                                    <button style="width:190px;" type="button" class="btn btn-info">
                                    @elseif( $list_repair->status_color==2 )
                                    <button style="width:190px;" type="button" class="btn btn-btn-blue-alt" >
                                    @elseif( $list_repair->status_color==3 )
                                    <button style="width:190px;" type="button" class="btn btn-success" >
                                    @elseif( $list_repair->status_color==4 )
                                    <button style="width:190px;" type="button" class="btn btn-yellow">
                                    @elseif( $list_repair->status_color==5 )
                                    <button style="width:190px;" type="button" class="btn btn-danger">
                                    @elseif( $list_repair->status_color==6 )
                                    <button style="width:190px;" type="button" class="btn btn-default" >
                                    @elseif( $list_repair->status_color==7 )
                                    <button style="width:190px;" type="button" class="btn btn-black-opacity">
                                    @elseif( $list_repair->status_color==8 )
                                    <button style="width:190px;" type="button" class="btn btn btn-azure" >
                                    @elseif( $list_repair->status_color==9 )
                                    <button style="width:190px;" type="button" class="btn btn-purple" >
                                    @elseif( $list_repair->status_color==10 )
                                    <button style="width:190px;" type="button" class="btn btn-warning" >
                                    @elseif( $list_repair->status_color==11 )
                                    <button style="width:190px;" type="button" class="btn btn-primary" >
                                    @elseif( $list_repair->status_color==12 )
                                    <button style="width:190px;" type="button" class="btn btn btn-black" >
                                    @endif
                                    {{ $list_repair->status_name }}.
                                    </button>
                                </b>
                              @endif
                          @endforeach
                          
                        </div>
                      </div>

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          อุปกรณ์ที่ติดมาด้วย : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->equipment_follow }}</b>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ราคาประเมิน : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->price }}</b>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่รับเข้าระบบ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->date_in }}</b>
                        </div>
                    </div>

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่คืนสินค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $repair->date_out }}</b>
                        </div>
                    </div><br>
                    
                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          </b>
                          <div class="col-md-3">
                                <?= Form::open(array('url' => '/print')) ?>
                                <!-- <a href="<?php echo url('/print') ?>" class="btn btn-success" style="width:300px;"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบรับซ่อม</a></a> -->
                                <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                                <input type="hidden" name="id" value="{{ $repair->r_id }}">
                                <button type="submit"style="width:100px;" class="btn btn-success"><i class="glyph-icon  icon-print" title=".icon-print"></i>&nbsp;ใบซ่อม</button>
                                {!! Form::close() !!}
                          </div>
                          @if($repair->status_bill==1)
                          <div class="col-md-3">
                                <?= Form::open(array('url' => '/print2')) ?>
                                <!-- <a href="<?php echo url('/print') ?>" class="btn btn-success" style="width:300px;"><i class="fa fa-print fa-lg"></i>&nbsp;พิมพ์ใบรับซ่อม</a></a> -->
                                <input type="hidden" name="store_branch_id" value="{{ $repair->store_branch_id }}">
                                <input type="hidden" name="id" value="{{ $repair->r_id }}">
                                <button type="submit"style="width:100px;" class="btn btn-success"><i class="glyph-icon icon-print" title=".icon-print"></i>&nbsp;ใบเสร็จ</button>
                                {!! Form::close() !!}</b>
                          </div>
                    @endif


                        </div>
                    </div>

                        

                </div>
                <!-- <div class="button-pane"> -->
                <!-- <button type="submit" class="btn btn-block btn-primary">ล็อกอิน</button> -->

                <!-- </div> -->
            </div>      

        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-login//////////////////////////////// -->
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
                </div>
            </div>

            
            <div class="tab-pane pad0A fade active in" id="tab-example-4">
                <div class="content-box">
                    <form class="form-horizontal pad15L pad15R bordered-row">
                    <br><h2 class="text-center"><b style="color:gray">ข้อมูลส่วนตัว</b></h2><hr><br>
                        <div class="row">
                            <div class="col-sm-6">                    
                                <!-- <img src="http://onepiece-treasurecruise.com/en/wp-content/uploads/c1022.png" alt="" style="width:100%;padding-left:20px;padding-right:20px;padding-bottom:20px;"> -->
                                <img src="{{ asset('image/person-member/picture/'.$image_url) }}" style="width:100%;padding-left:20px;padding-right:20px;padding-bottom:20px;"></a> 
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                <!-- <b class="text-center"><h3><b style="color:gray">รายละเอียด</b></h3></b>  -->
                                </div>
                                <div class="row">
                                <h4 style="color:gray"><b >ชื่อ-นามสกุล : </b> {{$name}}</h4> 
                                <hr style="margin-top:5px;margin-bottom:5px;">
                                </div>

                                <div class="row">
                                <h4 style="color:gray"><b  style="margin-top:-10px;">เลขประจำตัวประชาชน : </b>{{$person_id}} </h4> 
                                <hr style="margin-top:5px;margin-bottom:5px;">
                                </div>

                                 <div class="row">
                                 <h4 style="color:gray"><b  style="margin-top:-10px;">เพศ : </b>
                                 @if($gender==1)
                                ชาย
                                @else($gender)
                                หญิง
                                @endif</h4>  
                                <hr style="margin-top:5px;margin-bottom:5px;">
                                </div>

                                <div class="row">
                                <h4 style="color:gray"><b  style="margin-top:-10px;">วัน/เดือน/ปีเกิด : </b>
                                @if($birthday != '01 มกราคม 2513')
                                    {{$birthday}}
                                
                                @endif
                                 </h4> 
                                <hr style="margin-top:5px;margin-bottom:5px;">
                                </div>

                                <div class="row">
                                <h4 style="color:gray"><b  style="margin-top:-10px;">อีเมล์ : </b>{{$email}} </h4> 
                                <hr style="margin-top:5px;margin-bottom:5px;">
                                </div>

                                <div class="row">
                                <h4 style="color:gray"><b  style="margin-top:-10px;">เบอร์โทร : </b>{{$phone}} </h4> 
                                <hr style="margin-top:5px;margin-bottom:5px;">
                                </div>

                                <div class="row">
                                <h4 style="color:gray"><b  style="margin-top:-10px;">ที่อยู่ : </b>{{$address}} </h4> 
                                </div><br>
                            </div>
                        </div>  
                    </form>
                    </div>
                </div>
            </div>
        </div>
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
@endif 
@if (session()->has('status_edit'))     
     <script>swal({ title: "<?php echo session()->get('status_edit'); ?>",        
                     text: "ผลการทํางาน",         
                     timer: 2500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>

@endif 
@if (session()->has('status_login_ok'))     
     <script>swal({ title: "<?php echo session()->get('status_login_ok'); ?>",        
                     text: "ยินดีต้อนรับ",         
                     timer: 2500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>
@endif
@include('form/footer-font')