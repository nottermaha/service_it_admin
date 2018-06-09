
<!DOCTYPE html>
<html>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b><i class="fa fa-apple fa-lg"></i> Mac Service</b></span>
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
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
              <?php $data='' ;
                    $data=session('s_name','default');
              ?>
             @if (session()->has('s_name'))  
                {{ $data }} 
             @endif 
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p> 
                @if (session()->has('s_name'))  
                {{ $data }} 
                @endif 
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ url('/profile') }}" class="btn btn-default btn-flat">โปรไฟล์</a>
                 
                </div>
                <div class="pull-right">

                  <?= Form::open(array('url' => '/logout')) ?>
                           <button type="submit" class="btn btn-default btn-flat"><i class="fas fa-list-ul"></i>&nbsp; ออกจากระบบ</button>
                     
                  {!! Form::close() !!}

                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
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
          <img src="image/default.png" class="img-circle" alt="User Image">
          
        </div>
        <div class="pull-left info">
          <p> 
            @if (session()->has('s_name'))  
                  {{ $data }} 
            @endif 
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> ออนไลน์</a>
        </div>
      </div>
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">เมนูจัดการ</li>

        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>กระดานบอร์ด</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{ url('/dashboard')  }}"><i class="fa fa-circle-o"></i> กระดานบอร์ด(แอดมิน)</a></li>
            <li ><a href="{{ url('/dashboard_branch')  }}"><i class="fa fa-circle-o"></i> กระดานบอร์ด(ผู้จัดการร้าน)</a></li>
            <!-- <li class="active"><a href="{{ url('/test')  }}"><i class="fa fa-circle-o"></i> test</a></li> -->
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>ซ่อมอุปกรณ์</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/repair-member')  }}"><i class="fa fa-circle-o"></i> ลูกค้าสมาชิก</a></li>
            <li><a href="{{ url('/repair-general')  }}"><i class="fa fa-circle-o"></i> ลูกค้าทั่วไป</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>บุคคล</span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/persons-manager')  }}"><i class="fa fa-circle-o"></i> ผู้จัดการร้าน</a></li>
            <li><a href="{{ url('/persons-employee')  }}"><i class="fa fa-circle-o"></i> 
            พนักงาน</a></li>
            <li><a href="{{ url('/persons-member')  }}"><i class="fa fa-circle-o"></i> 
            สมาชิก</a></li>
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
            <li class="active"><a href="{{ url('/stores')  }}"><i class="fa fa-circle-o"></i> จัดการร้าน</a></li>
          </ul>
        </li>

        <li class="treeview">
        <a href="#">
            <i class="fa fa-comments"></i> <span>กระทู้ถาม-ตอบ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/questtion-post')  }}"><i class="fa fa-circle-o"></i> รายการกระทู้</a></li>
          </ul>
        </li>

        <li class="treeview">
        <a href="#">
            <i class="fa fa-wrench"></i> <span>อะไหล่</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/import_part')  }}"><i class="fa fa-circle-o"></i> นำเข้าอะไหล่</a></li>
          </ul>
        </li>
        <?php $data='' ;
     $data=session('key','default');
     $data3=session('key2','default');  ?>
        <li class="treeview" >
        <a href="#">
            <i class="fa fa-wrench"></i> <span>ตั้งค่า</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/setting-status-repair')  }}"><i class="fa fa-circle-o"></i> สถานะการแจ้งซ่อม</a></li>
            <li class="active"><a href="{{ url('/gallery')  }}"><i class="fa fa-circle-o"></i>สไลด์ภาพ</a></li>
            <li class="active"><a href="{{ url('/news')  }}"><i class="fa fa-circle-o"></i>ข่าวสาร</a></li>
            <li class="active"><a href="{{ url('/maha')  }}"><i class="fa fa-circle-o"></i>maha</a></li>
          </ul>
        </li>
            <li class="treeview" >
        <a href="#">
            <i class="fa fa-list"></i> <span>ออกรายงาน</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="{{ url('/report-person-member')  }}"><i class="fa fa-circle-o"></i> สถานะการแจ้งซ่อม</a></li>
          </ul>
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


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
<!-- ./wrapper -->

</body>
</html>
