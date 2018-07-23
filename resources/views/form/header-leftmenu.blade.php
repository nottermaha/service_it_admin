
<!DOCTYPE html>
<html>
<?php $s_store_name=session('s_store_name','default'); ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- <title>MA 2 | Dashboard</title> -->
<title>{{$s_store_name}}</title>
  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>   
    <?php $s_logo=session('s_logo','default'); ?>
    
    <!-- <img src="{{ asset('image/'.$s_logo) }}" style="width:30px;height:30px;"alt=""> -->
    {{$s_store_name}}</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
     
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"> -->
              <span class="hidden-xs">
              <?php $data='' ;
                    $data=session('s_name','default');
              ?>
              <i class="fa  fa-User fa-lg"></i>
             @if (session()->has('s_name'))  
                {{ $data }} 
             @endif 
              <i class="fa  fa-chevron-down "></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"> -->

                <p> 
                @if (session()->has('s_name'))  
                {{ $data }} 
                @endif 
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <!-- <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div> -->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/profile') }}" class="btn btn-default btn-flat"><i class="fa fa-user"></i>&nbsp;โปรไฟล์</a>
                 
                </div>
                <div class="pull-right">

                  <?= Form::open(array('url' => '/logout')) ?>
                           <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i>&nbsp; ออกจากระบบ</button>
                     
                  {!! Form::close() !!}

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li> -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <!-- <img src="image/default.png" class="img-circle" alt="User Image"> -->
          
        </div>
        <div class="pull-left info">
          <p> 
            <!-- @if (session()->has('s_name'))  
                  {{ $data }} 
            @endif  -->
          </p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> ออนไลน์</a><br><br> -->
        </div>
      </div>
      <?php $s_type=session('s_type','default'); ?>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">เมนูจัดการ</li>

        @if($s_type==1 || $s_type==2)
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>กระดานบอร์ด</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @if($s_type==1)
            <li ><a href="{{ url('/dashboard')  }}"><i class="fa fa-circle-o"></i> กระดานบอร์ด(แอดมิน)</a></li>
          @elseif($s_type==2)
            <li ><a href="{{ url('/dashboard_branch')  }}"><i class="fa fa-circle-o"></i> กระดานบอร์ด(ผู้จัดการร้าน)</a></li>
          @endif
            <!-- <li class="active"><a href="{{ url('/test')  }}"><i class="fa fa-circle-o"></i> test</a></li> -->
          </ul>
        </li>
        @endif

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>ซ่อมอุปกรณ์</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ url('/form-search-repair-only-bill')  }}"><i class="fa fa-search-minus"></i>ค้นหารายการซ่อม</a></li>
          <li><a href="{{ url('/form-search-data-pay')  }}"><i class="fa fa-money"></i>การชำระเงิน</a></li>
            <li><a href="{{ url('/repair-member')  }}"><i class="fa fa-circle-o"></i> ลูกค้าสมาชิก</a></li>
            <li><a href="{{ url('/repair-general')  }}"><i class="fa fa-circle-o"></i> ลูกค้าทั่วไป</a></li>
            <hr style="margin-top:0px;margin-bottom:0px;"><br>
            <a style="padding-left:20px;">สำหรับช่างซ่อม</a> 
            <li><a href="{{ url('/list-repair-for-technician')  }}"><i class="fa fa-circle-o"></i> รายการแจ้งซ่อมของท่าน(ช่าง)</a></li>
          </ul>
        </li>

        <li class="">
          <a href="{{ url('/pay-money')  }}">
            <i class="fa fa-money"></i>
            <span>สรุปยอดเงิน รับ-จ่าย</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          <!-- <ul class="treeview-menu">
            <li><a href="{{ url('/pay-money')  }}"><i class="fa fa-circle-o"></i> 
            สรุปยอดเงิน รับ-จ่าย</a></li>
          </ul> -->
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            <span>บุคคล</span>
          </a>
          <ul class="treeview-menu">
          <li><a href="{{ url('/persons-form-search')  }}"><i class="fa fa-search-minus"></i>ค้นหารายการบุคคล</a></li>
          <hr style="margin-top:0px;margin-bottom:-17px;"><br>
          @if($s_type==1)
            <li><a href="{{ url('/persons-manager')  }}"><i class="fa fa-circle-o"></i> ผู้จัดการร้าน</a></li>
            <li><a href="{{ url('/persons-employee')  }}"><i class="fa fa-circle-o"></i> 
            พนักงาน</a></li>
          @endif
          @if($s_type==1 || $s_type==2 || $s_type==3)
            <li><a href="{{ url('/persons-member')  }}"><i class="fa fa-circle-o"></i> 
            สมาชิก</a></li>
          @endif
          </ul>
        </li>

        <li class="treeview">
        <a href="#">
            <i class="fa fa-home"></i> <span>ร้าน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          @if($s_type==1)
            <li class="active"><a href="{{ url('/stores')  }}"><i class="fa fa-circle-o"></i> จัดการร้าน</a></li>
          @endif
            <li class="active"><a href="{{ url('/stores-list')  }}"><i class="fa fa-circle-o"></i>สาขาทั้งหมด</a></li>
          </ul>
        </li>

        <li class="">
        {!!  Form::open(['url'=>'/questtion-post','id'=>'myForm','files'=>true])   !!}
            <!-- <li onclick="myForm.submit();">Click me</li> -->
            <input type="hidden" name="chk_get" value="all">
            <div style="padding-top:10px;padding-bottom:5px;padding-left:15px;background-color:#222d32;">
              <span class="active" onclick="myForm.submit();">
              <a style="cursor:Pointer;"class="fa fa-comments"></i>&nbsp;&nbsp;  กระทู้ถาม-ตอบ</a></span>
            </div>
              {!! Form::close() !!}
        <!-- <a href="#"> -->
            <!-- <i class="fa fa-comments"></i> <span>กระทู้ถาม-ตอบ</span> -->
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          <!-- </a> -->
          <!-- <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/questtion-post')  }}"><i class="fa fa-circle-o"></i> รายการกระทู้</a></li>
          </ul> -->
        </li>

        <li class="">
        <a href="{{ url('/import_part')  }}">
            <i class="fa fa-wrench"></i> <span>อะไหล่</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          <!-- <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/import_part')  }}"><i class="fa fa-circle-o"></i> นำเข้าอะไหล่</a></li>
          </ul> -->
        </li>
        
        @if($s_type==1)
        <li class="treeview" >
        <a href="#">
            <i class="fa fa-wrench"></i> <span>ตั้งค่า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/setting-status-repair')  }}"><i class="fa fa-circle-o"></i> สถานะการแจ้งซ่อม (ช่าง)</a></li>
            <li class="active"><a href="{{ url('/setting-status-repair-shop')  }}"><i class="fa fa-circle-o"></i> สถานะการแจ้งซ่อม (หน้าร้าน)</a></li>
            <li class="active"><a href="{{ url('/gallery')  }}"><i class="fa fa-circle-o"></i>สไลด์ภาพ</a></li>
            <li class="active"><a href="{{ url('/news')  }}"><i class="fa fa-circle-o"></i>ข่าวสาร</a></li>
            <li class="active"><a href="{{ url('/guarantee')  }}"><i class="fa fa-circle-o"></i>รับประกัน</a></li>
          </ul>
        </li>
        @endif
        
            <li class="" >
        <a href="{{ url('/report-list')  }}">
            <i class="fa fa-list"></i> <span>ออกรายงาน</span>
            <!-- <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span> -->
          </a>
          <!-- <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/report-list')  }}"><i class="fa fa-circle-o"></i>รายการออกรายงาน</a></li>
          </ul> -->
        </li> 

        <li class="treeview">
        <a href="#">
        <i class="fa fa-sign-out"></i> <span>ออกจากระบบ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <?= Form::open(array('url' => '/logout')) ?>
                           
                           <button type="submit" class="btn"></i>&nbsp;<i class="fa fa-sign-out"></i> ยืนยันการออกจากระบบ</button>
                     
                  {!! Form::close() !!}
          </ul>
        </li>


    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    


<!-- ///////////////////////////content////////////////////////////// -->
  
<!-- ./wrapper -->

</body>
</html>
