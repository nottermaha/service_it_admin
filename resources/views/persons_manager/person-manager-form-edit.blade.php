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
                    if ( ((i == 0) && (s.charCodeAt(i) != 48)) || ((i == 1) && (s.charCodeAt(i) == 55)) || ((i == 1) && (s.charCodeAt(i) == 49)) || ((i == 1) && (s.charCodeAt(i) == 48) ))
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
        // var y = document.getElementById("password").value;
		// var elem = document.getElementById("password").value;
        // if(!elem.match(/^([a-z0-9\_])+$/i))
		// {
        //     document.getElementById('pass').innerHTML = "กรุณากรอกรหัสผ่านเป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";return false;
		// }
		// else if(y.length<8){document.getElementById('pass').innerHTML = "รหัสผ่านไม่ควรต่ำกว่า 8 ตัว";return false;}
		// else{document.getElementById('pass').innerHTML = "";}
        ////
        // var x = document.getElementById("password");
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

</head>
<!--End css header-leftmenu -->

@include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              บุคคล /
              <small><a>แก้ไขข้อมูลผู้จัดการร้าน</a> </small>
            </h1>
          </section> 
      <br>
    <section class="content">
  <!-- <form role="form" class="form-horizontal" action="/person/create" method="post"> -->
  <!-- <form role="form" class="form-horizontal" action="<?php echo url('/person-manager/edit') ?>/{{$id}}" method="post"> -->
  {!!  Form::open(['url'=>'/person-manager-edit','class'=>'form-horizontal','files'=>true,'id'=>'ChkForm'])   !!}
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body bg-info">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Name" class="control-label col-sm-3" style="font-size:25px;"> ร้านที่สังกัด</label>
                    <div for="Name" class="control-label col-sm-8 t" style="font-size:25px;text-align:left;">
                    {{$branch_name}}
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">บันทึกข้อมูลทั่วไป</h3>
                </div>
            <div class="box-body">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="Name" class="control-label col-sm-3">ชื่อ-นามสกุล <b style="color:red;font-size:20px;">*</b></label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" name="name" placeholder="ชื่อ-นามสกุล..." value="{{$name}}" id="name"required onBlur="checkName()">
                    </div><b  id="txt_name" style="color:red;"></b>
                </div><br>

                <div class="form-group">
                    <label for="Person_id" class="control-label col-sm-3">เลขประจำตัวประชาชน</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control"  name="person_id" placeholder="เลขประจำตัวประชาชน..." value="{{$person_id}}" id="person_id" onBlur="checkID()">
                        </div><b  id="txt_person_id" style="color:red;"></b>
                </div>

                <div class="form-group">
                    <label for="Gender" class="control-label col-sm-3">เพศ</label>
                        <div class="col-sm-2">
                            <label>
                                <input type="radio" name="gender" class="flat-red2" @if($gender == '1')checked @endif  value="1">
                            </label>&nbsp;&nbsp;ชาย  
                        </div>
                        <div class="col-sm-2">
                            <label>
                                <input type="radio" name="gender" class="flat-red2" @if($gender == '2')checked @endif value="2">
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
                                <input type="text" class="form-control pull-right" id="datepicker" name="birthday" placeholder="วัน/เดือน/ปีเกิด..." data-date-format="yyyy-mm-dd" value="{{$birthday}}">
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
                                <input type="text" class="form-control pull-right"  name="email" placeholder="อีเมล์..." value="{{$email}}"  onBlur="ChkEmail()" id="email">
                            </div><b  id="txt_email" style="color:red;"></b>
                        </div> 
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">เบอร์โทร</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-phone fa-lg"></i>
                                </div>
                                    <input type="text" class="form-control pull-right"  name="phone" placeholder="เบอร์โทร..." value="{{$phone}}" id="phone" required onBlur="CheckMobileNumber()">
                            </div><b id="txt_phone" style="color:red;"></b>
                        </div> 
                </div> 

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-5">
                        </div>
                        <div class="col-md-6">
                            <a href="{{ asset('image/person-manager/picture/'.$image_url ) }}"><img src="{{ asset('image/person-manager/resize/'.$image_url) }}"style="padding-bottom:20px;width:200px;height:250px;"></a>
                        </div>
                    </div>
                    <label for="Birthday" class="control-label col-sm-3" >รูปประจำตัว</label>
                        <div class="col-sm-9" >
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
                    <!-- <label for="Name" class="control-label col-sm-2">จังหวัด<b style="color:red;font-size:20px;">*</b></label> -->
                    <div class="col-sm-6">
                        <select  class="form-control " style="width: 100%;" name="PROVINCE_ID" id="province">
                        <option value="PROVINCE_NAME">- กรุณาเลือกจังหวัด -</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <select  class="form-control " style="width: 100%;" name="AMPHUR_ID" id="amphur">
                        <option>- กรุณาเลือกอำเภอ -</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">

                    <div class="col-sm-6">
                        <select  class="form-control " style="width: 100%;" name="DISTRICT_ID" id="district">
                        <option>- กรุณาเลือกตำบล -</option>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group date">
                                <input type="text" class="form-control pull-right" name="postcode" 
                                id="postcode" disabled>
                        </div>
                    </div> 
                </div>

            </div>
        </div>
    </div>

                   
            
    <div class="col-md-6"> 
            @if(session()->has('status_confirm_password_mana_fail'))  
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> แก้ไขข้อมูลส่วนตัวผู้จัดการร้านล้มเหลว!</h4>
                การยืนยันรหัสผ่านของท่านไม่ถูกต้อง                                     
            </div>  
            @endif  
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

                <!-- <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">รหัสผ่าน <b style="color:red;font-size:20px;">*</b></label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="password" class="form-control pull-right" name="" placeholder="รหัสผ่าน..." value="{{$password}}" disabled>
                            </div>
                        </div>  
                </div> -->

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
                                <input type="password" class="form-control pull-right"  name="newpassword" placeholder="(กรอกข้อมูลหากท่านต้องการเปลี่ยนรหัสผ่านใหม่)..." value="" id="password"onBlur="ChkLengthPass()" required>
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
                    <label for="Birthday" class="control-label col-sm-3">ยืนยันรหัสของท่าน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-lock fa-lg"></i>
                                </div>
                                <input type="password" class="form-control pull-right"  name="confirmpassword" placeholder="ยืนยันรหัสของท่าน..." value="" >
                            </div>
                        </div>  
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3"></label>
                        <div class="col-sm-9">
                            <b style="color:orange;">การเปลี่ยน ชื่อผู้ใช้ หรือ รหัสผ่าน จะต้องยืนยันรหัสผ่านของท่านด้วยเสมอ</b>
                        </div>  
                </div>

          </div>

          </div>
          </div>
            
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">บันทึกข้อมูลรายละเอียดงาน</h3>
            </div>
            <div class="box-body">
            {{ csrf_field() }}

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">ตำแหน่ง</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-user fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Position" name="position" placeholder="ตำแหน่ง..." value="{{$position}}">
                            </div>
                        </div> 
                </div> 

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">เงินเดือน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-money fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="Salary" name="salary" placeholder="เงินเดือน..." value="{{$salary}}">
                            </div>
                        </div>    
                </div>

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">วันเข้าเป็นพนักงาน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar fa-lg"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker2" name="date_in" placeholder="วันเข้าเป็นพนักงาน..." data-date-format="yyyy-mm-dd" value="{{$date_in}}">
                            </div>
                        </div>
                </div> 

                <div class="form-group">
                    <label for="Birthday" class="control-label col-sm-3">วันออกจากงาน</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar fa-lg"></i>
                                </div>
                                    <input type="text" class="form-control pull-right" id="datepicker3" name="date_out" placeholder="วันออกจากงาน..." data-date-format="yyyy-mm-dd" value="{{$date_out}}">
                                </div>
                            </div>
                        </div> 
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 text-center">
            <input type="hidden" name="id"value="{{$id}}">
            <input type="hidden" name="store_branch_id"value="{{$store_branch_id}}">
          <button type="button" onClick="BtnChkSubmit()" class="btn btn-success btn-lg">บันทึก</button>
        </div>
    </div>
  </form>


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

<link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
<!-- //////////// -->
<script src="AutoProvince.js"></script>
<!-- /////////// -->

<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>


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