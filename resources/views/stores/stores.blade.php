<script>

    function checkName()
	{   var y = document.getElementById("name").value;
        if(y.length<1){document.getElementById('txt_name').innerHTML = "กรุณากรอก ชื่อร้านสาขา";}
        else{document.getElementById('txt_name').innerHTML = "";}
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

@foreach($stores as $store)
    function checkName{{ $store->id }}()
	{   var y = document.getElementById("name{{ $store->id }}").value;
        if(y.length<1){document.getElementById('txt_name{{ $store->id }}').innerHTML = "กรุณากรอก ชื่อร้านสาขา";}
        else{document.getElementById('txt_name{{ $store->id }}').innerHTML = "";}
	}
    function ChkEmail{{ $store->id }}(){
            var x = document.getElementById("email{{ $store->id }}");
			var y = x.value;
            var emailFilter=/^.+@.+\..{2,3}$/;
            // var str=document.form.text1.value;
        if (!(emailFilter.test(y))) { 
            document.getElementById('txt_email{{ $store->id }}').innerHTML = "อีเมลล์ไม่ถูกต้อง";
            return false;
        }
        else{document.getElementById('txt_email{{ $store->id }}').innerHTML = "";}
        //  return true;
    }

        function CheckMobileNumber{{ $store->id }}() {
        var msg = 'โปรดกรอกหมายเลขโทรศัพท์ 10 หลัก ด้วยรูปแบบดังนี้ 08XXXXXXXX ไม่ต้องใส่เครื่องหมายขีด (-) วงเล็บหรือเว้นวรรค';
        var x = document.getElementById("phone{{ $store->id }}").value;
        s = new String(x);

        if ( s.length != 10)
        {
            document.getElementById('txt_phone{{ $store->id }}').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
            //   alert(msg);
            return false;
        }

            for (i = 0; i < s.length; i++ ) {               
                if ( s.charCodeAt(i) < 48 || s.charCodeAt(i) > 57 ) {
                    document.getElementById('txt_phone{{ $store->id }}').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
                    //  alert(msg);
                    return false;
                } 
                    if ( ((i == 0) && (s.charCodeAt(i) != 48)) || ((i == 1) && (s.charCodeAt(i) == 55)) || ((i == 1) && (s.charCodeAt(i) == 49)) || ((i == 1) && (s.charCodeAt(i) == 48) ))
                    {
                        document.getElementById('txt_phone{{ $store->id }}').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";
                        return false;
                    }
                    else{
                        document.getElementById('txt_phone{{ $store->id }}').innerHTML = "";
                    }
            }            
            return true;
    }
    
    //////////////onclick////////////////
    function EditBtnChkSubmit{{ $store->id }}() 
    { 
      
        ////
        var y = document.getElementById("name{{ $store->id }}").value;
        if(y.length<1){document.getElementById('txt_name{{ $store->id }}').innerHTML = "กรุณากรอก ชื่อร้านสาขา";return false}
        else{document.getElementById('txt_name{{ $store->id }}').innerHTML = "";}
        ///
       
        var x = document.getElementById("email{{ $store->id }}").value;
        var emailFilter=/^.+@.+\..{2,3}$/;
            // var str=document.form.text1.value;
        if (!(emailFilter.test(x))) { 
            document.getElementById('txt_email{{ $store->id }}').innerHTML = "อีเมลล์ไม่ถูกต้อง";
            return false;
        }
        else{document.getElementById('txt_email{{ $store->id }}').innerHTML = "";}
        /////
        var x = document.getElementById("phone{{ $store->id }}").value;
        if(!CheckMobileNumber{{ $store->id }}(x.value)) 
        {
            document.getElementById('txt_phone{{ $store->id }}').innerHTML = "เบอร์โทรต้องอยู่ระหว่าง 9-10 หลัก และต้องเป็นตัวเลข และขึ้นต้นด้วย 02,03,04,05,06,08,09 เท่านั้น";return false;
        }
        else
        {
            document.getElementById('txt_phone{{ $store->id }}').innerHTML = "";
        }
        // else{
          // alert('555');
          var bb= {{ $store->id }};
          // alert(bb);
          // EditChkForm.''.{{$store->id}}.submit();
          // (EditChkForm{{ $store->id }}).submit();
          
document.getElementById("EditChkForm{{ $store->id }}").submit();
        // }

    }
@endforeach

    function BtnChkSubmitCre() 
    { 
      
        ////
        var y = document.getElementById("name").value;
        if(y.length<1){document.getElementById('txt_name').innerHTML = "กรุณากรอก ชื่อสาขา";return false}
        else{document.getElementById('txt_name').innerHTML = "";}
        ///
       
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
            ChkFormCre.submit();
        // }

    }
</script>
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
  <!-- <script src="https://cdn.ckeditor.com/4.9.3/standard/ckeditor.js"></script> -->
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              จัดการร้าน/
              <small><a>จัดการร้าน</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

<div class="col-md-1"></div>
    {!!  Form::open(['url'=>'/store-edit','class'=>'form-horizontal','files'=>true])   !!}
    
    <div class="col-md-10">
        <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">แก้ไขข้อมูลร้าน</h3>
                    <!-- <I><h5>ข้อมูลส่วนนี้จะแสดงในหน้าใช้งานของลูกค้า ในส่วนของการรับประกัน</h5></I> -->
                </div>
            <div class="box-body">
            <!-- <input type="hidden" name="_token" value="fHc8pJvh1Gj4zf3SYopWZGvi0VztqE9wno25Za8z"> -->
{{ csrf_field() }}
                <div class="form-group">
                <div class="row">
                <div class="text-center">
                      <img src="{{ asset('image/'.$logo) }}"style="padding-bottom:20px;width:20%">
                </div>
                    <label for="Person_id" class="control-label col-sm-2">โลโก้ร้าน</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="Person_id" name="logo" placeholder="..." value="{{ $logo }}">
                    </div>
                  </div><br>
                  <div class="row">
                    <label for="Person_id" class="control-label col-sm-2">ชื่อร้านสาขา</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="Person_id" name="name" placeholder="ชื่อร้านสาขา..." value="{{ $name }}" required>
                    </div>
                  </div><br>
                    <div class="row">
                      <div class="text-center">
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-edit fa-lg"></i>&nbsp;แก้ไขข้อมูล</button>
                      </div>
                    </div>

                </div>
            </div>
        </div>
        
    </div>
    {!! Form::close() !!}
    
      <div class="row">
        <div class="col-xs-12 text-right">
          <!-- <?= link_to('store-form',$title='add data',['class'=>'btn btn-primary '],['data-toggle'=>'btn btn-primary '],['data-toggle'=>'#modal-default '],$secure=null); ?> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-branch">
                <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; เพิ่มข้อมูล
            </button>
        </div> 
      </div>

      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">จัดการร้านสาขา</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead>
          <tr >
            <th>#</th>
            <th>สาขา</th>
            <th class="text-center">สถานะ</th>
            <th class="text-center">แก้ไข</th>
            <!-- <th class="text-center">ลบ</th> -->
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($stores as $store )
          <tr>
            <td>{{ $i=$i+1 }}</td>
            <td >
              <a href=""data-toggle="modal" data-target="#modal-show-store-branch">{{ $store->name }}@if($store->id==2)(สาขาหลัก)@endif</a>
            </td>
            @if($store->id!=2)
              @if($store->status==1)
              <td class="text-center">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-delete-branch{{ $store->id }}"><i class="fa fa-power-off fa-lg"></i>&nbsp; เปิดใช้งาน
                </button>
              </td>
              @elseif($store->status==0)
              <td class="text-center">
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-branch{{ $store->id }}"><i class="fa fa-power-off fa-lg"></i>&nbsp; ปิดใช้งาน
                </button>
              </td>
              @endif
            @else
            <td class="text-center">สาขาหลักปิดการใช้งานไม่ได้</td>  
            @endif
            
              <td class="text-center">
                <a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-branch{{ $store->id }}"><i class="fa fa-edit fa-lg"></i>&nbsp; แก้ไข</a>
              </td> 
            
            <!-- <td class="text-center">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-branch{{ $store->id }}"><i class="fa fa-trash fa-lg"></i>&nbsp; ลบ
              </button>
            </td> -->
            <!-- //////////////////////////////modal-delete-branch//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-branch{{ $store->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">สถานะการเปิดให้บริการร้านสาขา</h4>
                  </div>        
                <?= Form::open(array('url' => '/store-branch/delete/'.$store->id)) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                        @if($store->status==1)
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ปิดการใช้งาน" เพื่อยืนยันการปิดการใช้งาน </b>
                        @elseif($store->status==0)
                        <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "เปิดการใช้งาน" เพื่อยืนยันการเปิดการใช้งาน </b>
                        @endif
                        </div>
                      </div> <br>
                      <div class="row" >
                          <div class="col-md-1"></div>
                          <div class="col-md-10">
                                <div class="form-group">
                                <b for="" style="text-align:right;color:red;">*** การ "ปิดการใช้งาน" จะทำให้ผู้จัดการร้าน และพนักงาน ที่สังกัดร้านนั้น ไม่สามารถล็อกอินเข้าสู่ระบบได้ </b>
                                </div>
                          </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        @if($store->status==1)
                        <button type="submit" class="btn btn-danger"><i class="fa fa-power-off fa-lg"></i>
                        &nbsp;ปิดการใช้งาน</button>
                        @elseif($store->status==0)
                        <button type="submit" class="btn btn-success"><i class="fa fa-power-off fa-lg"></i>
                        &nbsp;เปิดการใช้งาน</button>
                        @endif
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-store//////////////////////////////// -->

<!-- //////////////////////////////modal-edit-branch//////////////////////////////// -->
      <div class="modal fade" id="modal-edit-branch{{ $store->id }}">
        <div class="modal-dialog" style="width:50%;">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">แก้ไขข้อมูลสาขา</h4>
            </div>        {!!  Form::open(['url'=>'/store-branch/edit/'. $store->id,'class'=>'form','files'=>true,'id'=>'EditChkForm{{$store->id}}'] )   !!}
          <div class="modal-body">
          {{ csrf_field() }}
          <div class="row" >
              <div class="form-group">
                  <b for="" class="control-label col-md-4"style="text-align:right"></b>
                    <img src="{{ asset('image/store-branch/resize/'.$store->image_url) }}">
              </div>  
          </div>  

            <div class="row">
              <div class="form-group">
                <b for="" class="control-label col-sm-2"style="text-align:right">รูปภาพ</b>
                <div class="col-sm-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-picture-o fa-lg"></i>
                    </div>
                      <input type="file" class="form-control pull-right" id="Name" name="image_url" placeholder="ชื่อสาขา..." value="{{ $store->image_url }}">
                  </div>
                </div>
              </div>
            </div><br>

            <div class="row">
              <div class="form-group">
                <b for="" class="control-label col-sm-2"style="text-align:right">ชื่อสาขา <b style="color:red;font-size:20px;">*</b></b>
                <div class="col-sm-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-home fa-lg"></i>
                    </div>
                      <input type="text" class="form-control pull-right"  name="name" placeholder="ชื่อสาขา..." value="{{ $store->name }}" id="name{{ $store->id }}" onBlur="checkName{{ $store->id }}()">
                  </div><b  id="txt_name{{ $store->id }}" style="color:red;"></b>
                </div>
              </div>
            </div><br>
          <!-- </div> <br> -->
          <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">เบอร์โทร <b style="color:red;font-size:20px;">*</b></b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-phone fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right"  name="phone" placeholder="เบอร์โทร..." value="{{ $store->phone }}" id="phone{{ $store->id }}" onBlur="CheckMobileNumber{{ $store->id }}()">
                      </div><b id="txt_phone{{ $store->id }}" style="color:red;"></b>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">อีเมล์ <b style="color:red;font-size:20px;">*</b></b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" name="email" placeholder="อีเมล์..." value="{{ $store->email }}" onBlur="ChkEmail{{ $store->id }}()" id="email{{ $store->id }}">
                      </div><b  id="txt_email{{ $store->id }}" style="color:red;"></b>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">แผนที่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-map fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="map" placeholder="แผนที่..." value="{{ $store->map }}">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ช่องทางการติดต่อเฟสบุ๊ค</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa  fa-facebook-official fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="contact" placeholder="ช่องทางการติดต่อเฟสบุ๊ค..." value="{{ $store->contact }}">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ที่อยู่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-home fa-lg"></i>
                        </div>
                          <!-- <input type="text" class="form-control pull-right" id="Name" name="address" placeholder="ที่อยู่..." value="{{ $store->address }}"> -->
                          <textarea class="form-control" rows="3" placeholder="ที่อยู่ ..." id="Name" name="address" value="{{ $store->address }}">{{ $store->address }}</textarea>
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">รายละเอียดเพิ่มเติม</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-list fa-lg"></i>
                        </div>
                          <!-- <input type="text" class="form-control pull-right" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม..." value="{{ $store->detail }}"> -->
                          <textarea class="form-control" rows="3" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม..." value="{{ $store->detail }}">{{ $store->detail }}</textarea>
                      </div>
                    </div>
                  </div>
                </div><br>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" onClick="EditBtnChkSubmit{{ $store->id }}()" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
<!-- //////////////////////////////Enfmodal-edit-branch//////////////////////////////// -->

          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
    </section>
    <!-- //////////////////////////////modal-add-branch//////////////////////////////// -->

        <div class="modal fade" id="modal-add-branch" >
        
            <div class="modal-dialog"style="width:50%;">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">บันทึกข้อมูลสาขาใหม่</h4>
              </div>        
              {!!  Form::open(['url'=>'/store-branch/create','class'=>'form','files'=>true,'id'=>'ChkFormCre'])   !!}
              <div class="modal-body">
              {{ csrf_field() }}
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">รูปภาพ</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-picture-o fa-lg"></i>
                        </div>
                          <input type="file" class="form-control pull-right" id="Name" name="image_url" placeholder="รูปภาพ..." >
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ชื่อสาขา <b style="color:red;font-size:20px;">*</b></b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-home fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right"  name="name" placeholder="ชื่อสาขา..." id="name"required onBlur="checkName()">
                      </div><b  id="txt_name" style="color:red;"></b>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">เบอร์โทร <b style="color:red;font-size:20px;">*</b></b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-phone fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right"  name="phone" placeholder="เบอร์โทร..." id="phone" required onBlur="CheckMobileNumber()">
                      </div><b id="txt_phone" style="color:red;"></b>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">อีเมล์ <b style="color:red;font-size:20px;">*</b></b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right"  name="email" placeholder="อีเมล์..." onBlur="ChkEmail()" id="email">
                      </div><b  id="txt_email" style="color:red;"></b>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">แผนที่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-map fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="map" placeholder="แผนที่...">
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ช่องทางการติดต่อเฟสบุ๊ค</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa  fa-facebook-official fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="contact" placeholder="ช่องทางการติดต่อเฟสบุ๊ค...">
                      </div>
                    </div>
                  </div>
                </div><br> 
              
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ที่อยู่</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-home fa-lg"></i>
                        </div>
                          <!-- <input type="text" class="form-control pull-right" id="Name" name="address" placeholder="ที่อยู่..."> -->
                          <textarea class="form-control" rows="3" placeholder="ที่อยู่ ..." id="Name" name="address" ></textarea>
                      </div>
                      </div>
                    </div>
                  </div>
                </div><br>
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">รายละเอียดเพิ่มเติม</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-list fa-lg"></i>
                        </div>
                        <textarea class="form-control" rows="3" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม..."></textarea>
                          <!-- <input type="text" class="form-control pull-right" id="Name" name="detail" placeholder="รายละเอียดเพิ่มเติม..."> -->
                      </div>
                    </div>
                  </div>
                </div><br>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                <button  type="button" onClick="BtnChkSubmitCre()" class="btn btn-success">บันทึก</button>
              </div>
              {!! Form::close() !!}
            </div>
          </div>          
        </div>
        <!-- //////////////////////////////End modal-add-branch//////////////////////////////// -->
        
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
    @elseif (session()->has('status_store_edit'))     
     <script>swal({ title: "<?php echo session()->get('status_store_edit'); ?>",        
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

  $(function () {
    $('#example').DataTable()
  })

</script>

