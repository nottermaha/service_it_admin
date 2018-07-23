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
            document.getElementById('pass').innerHTML = "กรุณากรอกรหัสผ่านเป็นตัวอักษรภาษาอังกฤษ หรือตัวเลข";
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

<div id="page-title">
    <!-- <h2>Forms elements</h2> -->
    <!-- <p>Components for creating great user experiences.</p> -->
    <div id="theme-options" class="admin-options">
    <a href="javascript:void(0);" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
    <div id="theme-switcher-wrapper">
        <div class="scroll-switcher">
            <h5 class="header">Layout options</h5>
            <ul class="reset-ul">
                <li>
                    <label for="boxed-layout">Boxed layout</label>
                    <input type="checkbox" data-toggletarget="boxed-layout" id="boxed-layout" class="input-switch-alt">
                </li>
                <li>
                    <label for="fixed-header">Fixed header</label>
                    <input type="checkbox" data-toggletarget="fixed-header" id="fixed-header" class="input-switch-alt">
                </li>
                <li>
                    <label for="fixed-sidebar">Fixed sidebar</label>
                    <input type="checkbox" data-toggletarget="fixed-sidebar" id="fixed-sidebar" class="input-switch-alt">
                </li>
                <li>
                    <label for="closed-sidebar">Closed sidebar</label>
                    <input type="checkbox" data-toggletarget="closed-sidebar" id="closed-sidebar" class="input-switch-alt">
                </li>
            </ul>
            <div class="boxed-bg-wrapper hide">
                <h5 class="header">
                    Boxed Page Background
                    <a class="set-background-style" data-header-bg="" title="Remove all styles" href="javascript:void(0);">Clear</a>
                </h5>
                <div class="theme-color-wrapper clearfix">
                    <h5>Patterns</h5>
                    <a class="tooltip-button set-background-style pattern-bg-3" data-header-bg="pattern-bg-3" title="Pattern 3" href="javascript:void(0);">Pattern 3</a>
                    <a class="tooltip-button set-background-style pattern-bg-4" data-header-bg="pattern-bg-4" title="Pattern 4" href="javascript:void(0);">Pattern 4</a>
                    <a class="tooltip-button set-background-style pattern-bg-5" data-header-bg="pattern-bg-5" title="Pattern 5" href="javascript:void(0);">Pattern 5</a>
                    <a class="tooltip-button set-background-style pattern-bg-6" data-header-bg="pattern-bg-6" title="Pattern 6" href="javascript:void(0);">Pattern 6</a>
                    <a class="tooltip-button set-background-style pattern-bg-7" data-header-bg="pattern-bg-7" title="Pattern 7" href="javascript:void(0);">Pattern 7</a>
                    <a class="tooltip-button set-background-style pattern-bg-8" data-header-bg="pattern-bg-8" title="Pattern 8" href="javascript:void(0);">Pattern 8</a>
                    <a class="tooltip-button set-background-style pattern-bg-9" data-header-bg="pattern-bg-9" title="Pattern 9" href="javascript:void(0);">Pattern 9</a>
                    <a class="tooltip-button set-background-style pattern-bg-10" data-header-bg="pattern-bg-10" title="Pattern 10" href="javascript:void(0);">Pattern 10</a>

                    <div class="clear"></div>

                    <h5 class="mrg15T">Solids &amp;Images</h5>
                    <a class="tooltip-button set-background-style bg-black" data-header-bg="bg-black" title="Black" href="javascript:void(0);">Black</a>
                    <a class="tooltip-button set-background-style bg-gray mrg10R" data-header-bg="bg-gray" title="Gray" href="javascript:void(0);">Gray</a>

                    <a class="tooltip-button set-background-style full-bg-1" data-header-bg="full-bg-1 fixed-bg" title="Image 1" href="javascript:void(0);">Image 1</a>
                    <a class="tooltip-button set-background-style full-bg-2" data-header-bg="full-bg-2 fixed-bg" title="Image 2" href="javascript:void(0);">Image 2</a>
                    <a class="tooltip-button set-background-style full-bg-3" data-header-bg="full-bg-3 fixed-bg" title="Image 3" href="javascript:void(0);">Image 3</a>
                    <a class="tooltip-button set-background-style full-bg-4" data-header-bg="full-bg-4 fixed-bg" title="Image 4" href="javascript:void(0);">Image 4</a>
                    <a class="tooltip-button set-background-style full-bg-5" data-header-bg="full-bg-5 fixed-bg" title="Image 5" href="javascript:void(0);">Image 5</a>
                    <a class="tooltip-button set-background-style full-bg-6" data-header-bg="full-bg-6 fixed-bg" title="Image 6" href="javascript:void(0);">Image 6</a>

                </div>
            </div>
            <h5 class="header">
                Header Style
                <a class="set-adminheader-style" data-header-bg="bg-gradient-9" title="Remove all styles" href="javascript:void(0);">Clear</a>
            </h5>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-adminheader-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="javascript:void(0);">Primary</a>
                <a class="tooltip-button set-adminheader-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="javascript:void(0);">Green</a>
                <a class="tooltip-button set-adminheader-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="javascript:void(0);">Red</a>
                <a class="tooltip-button set-adminheader-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="javascript:void(0);">Blue</a>
                <a class="tooltip-button set-adminheader-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="javascript:void(0);">Warning</a>
                <a class="tooltip-button set-adminheader-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="javascript:void(0);">Purple</a>
                <a class="tooltip-button set-adminheader-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="javascript:void(0);">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-adminheader-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="javascript:void(0);">Gradient 1</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="javascript:void(0);">Gradient 2</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="javascript:void(0);">Gradient 3</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="javascript:void(0);">Gradient 4</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="javascript:void(0);">Gradient 5</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="javascript:void(0);">Gradient 6</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="javascript:void(0);">Gradient 7</a>
                <a class="tooltip-button set-adminheader-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="javascript:void(0);">Gradient 8</a>
            </div>
            <h5 class="header">
                Sidebar Style
                <a class="set-sidebar-style" data-header-bg="" title="Remove all styles" href="javascript:void(0);">Clear</a>
            </h5>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-sidebar-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="javascript:void(0);">Primary</a>
                <a class="tooltip-button set-sidebar-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="javascript:void(0);">Green</a>
                <a class="tooltip-button set-sidebar-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="javascript:void(0);">Red</a>
                <a class="tooltip-button set-sidebar-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="javascript:void(0);">Blue</a>
                <a class="tooltip-button set-sidebar-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="javascript:void(0);">Warning</a>
                <a class="tooltip-button set-sidebar-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="javascript:void(0);">Purple</a>
                <a class="tooltip-button set-sidebar-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="javascript:void(0);">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-sidebar-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="javascript:void(0);">Gradient 1</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="javascript:void(0);">Gradient 2</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="javascript:void(0);">Gradient 3</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="javascript:void(0);">Gradient 4</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="javascript:void(0);">Gradient 5</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="javascript:void(0);">Gradient 6</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="javascript:void(0);">Gradient 7</a>
                <a class="tooltip-button set-sidebar-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="javascript:void(0);">Gradient 8</a>
            </div>
        </div>
    </div>
</div>
</div>

<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            <!-- Input groups -->
        </h3>
    <div class="row">
        <div class="col-md-5">
                <div class="example-box-wrapper">
                <?php $s_logo=session('s_logo','default'); ?>
                    <img  src="{{ asset('image/'.$s_logo) }}" alt="" style="height:100%;width:80%;">
                </div>
            </div>
            {!!  Form::open(['url'=>'/font-register-create','class'=>'form-horizontal','files'=>true,'id'=>'ChkForm'])   !!}
            <div class="col-md-7">
                <div class="example-box-wrapper">
                <a class=text-center><b><h1>สมัครสมาชิก</h1></b></a><br>
                    <form class="form-horizontal bordered-row">
                        <div class="form-group">

                            <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-8">
                                    @if(session()->has('status_image_fail'))               
                                        <script type="text/javascript">
                                                $(window).on('load',function(){
                                                    $('#modal-edit-gallery<?php echo session()->get('status_id'); ?>').modal('show');
                                                });   
                                            </script>   
                                        <div class="alert alert-warning alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><i class="icon fa fa-warning"></i> การอัพโหลดรูปล้มเหลว!</h4>
                                            กรุณาอัพโหลดรูปภาพที่เป็น .png .jpg .gif เท่านั่น.
                                        </div>       
                                    @endif
                            </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 control-label">ชื่อผู้ใช้ <b style="color:red;">*</b></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-user " ></i></span>
                                        <input type="text" class="form-control" placeholder="ชื่อผู้ใช้..." name="username" id="username"required onBlur="checkText()" >
                                    </div><b id="txt_username" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">รหัสผ่าน <b style="color:red;">*</b></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-lock " ></i></span>
                                        <input type="password" class="form-control" placeholder="รหัสผ่าน..." name="password" id="password"onBlur="ChkLengthPass()" required />
                                    </div><b id="pass" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">รหัสผ่านอีกครั้ง <b style="color:red;">*</b></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-lock "></i></span>
                                        <input type="password" class="form-control" placeholder="รหัสผ่านอีกครั้ง.." name="password" id="repassword" onBlur="ChkRePass()" required>
                                    </div><b id="repass" style="color:red;"></b>
                                </div>
                            </div>
                           
                        </div>  
                        <div class="form-group">

                            <div class="row">
                                <label class="col-sm-3 control-label">ชื่อ-นามสกุล <b style="color:red;">*</b></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" class="form-control" placeholder="ชื่อ-นามสกุล..." name="name" id="name" onBlur="checkName()"required>
                                    </div><b id="txt_name" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">เลขประจำตัวประชาชน</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon">@</span>
                                        <input type="text" class="form-control" placeholder="เลขประจำตัวประชาชน..." name="person_id" id="person_id" onBlur="checkID()">
                                    </div><b id="txt_person_id" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">เพศ</label>
                                <div class="col-sm-8">
                                    <label style="padding-right:30px;">
                                        <input type="radio" id="inlineRadio110" name="gender" class="custom-radio" checked value="1">
                                        ชาย
                                    </label>
                                     <label style="padding-right:30px;">
                                        <input type="radio" id="inlineRadio110" name="gender" class="custom-radio" value="2">
                                        หญิง
                                    </label>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">วัน/เดือน/ปีเกิด </label>
                                <div class="col-sm-8">
                                    <!-- <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-calendar " ></i></span>
                                        <input type="text" class="form-control" placeholder="วัน/เดือน/ปีเกิด.." name="birthday">
                                    </div> -->
                                    <div class="input-prepend input-group">
                                        <span class="add-on input-group-addon">
                                            <i class="glyph-icon icon-calendar"></i>
                                        </span>  <!-- class="bootstrap-datepicker form-control"  data-date-format="mm/dd/yy"  -->
                                        <input type="date" class="form-control"
                                        name="birthday" required>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">อีเมล์ <b style="color:red;">*</b></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-envelope " ></i></span>
                                        <input type="text" class="form-control" placeholder="อีเมล์.." name="email" onBlur="ChkEmail()" id="email"  required>
                                    </div><b id="txt_email" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">เบอร์โทร <b style="color:red;">*</b></label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-phone " ></i></span>
                                        <!-- <input type="text" class="form-control" placeholder="เบอร์โทร.." name="phone" required> -->
                                        <input type="text"  class="form-control" name="phone" id="phone"    required onBlur="CheckMobileNumber()" >
                                    </div><b id="txt_phone" style="color:red;"></b>
                                </div>
                            </div><br>
                            <div class="row">
                                <label class="col-sm-3 control-label">รูปประจำตัว</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon tooltip-button  icon-picture-o " ></i></span>
                                        <input type="file" class="form-control" placeholder="รูปประจำตัว.." name="image_url">
                                    </div>
                                </div>
                            </div><br>
                            
                            <div class="row">
                                <label class="col-sm-3 control-label">ที่อยู่</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyph-icon icon-home"></i></span>
                                        <!-- <input type="text" class="form-control" placeholder="ที่อยู่.."> -->
                                          <textarea  id="" class="form-control" placeholder="ที่อยู่..." name="address"></textarea>


                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-12 text-center">
                                <button type="button" onClick="BtnChkSubmit()" class="btn btn-primary">สมัครสมาชิก</button>
                                </div>
                            </div>

                        </div> 

                    <!-- </form> -->
                </div>
            </div>
            {!! Form::close() !!}

        </div>
        
    </div>
</div>

        </div>
    </div>
</div>

<br><br>

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
@include('form/footer-font')