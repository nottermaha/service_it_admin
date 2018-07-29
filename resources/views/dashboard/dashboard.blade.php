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
<!-- /////////////////////////////////////////////////////// -->
<script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
      <section class="content-header">
            <?php 
            $s_type='' ; $s_type=session('s_type','default');
            $s_name='' ; $s_name=session('s_name','default'); 
            ?>
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              กระดานบอร์ด /
              <small><a>
              @if($s_type=='1' )
              บอร์ดแอดมิน
              @elseif($s_type=='2' )
              บอร์ดผู้จัดการร้าน
              @endif</a> </small>
            </h1>
          </section> 
      <br>
    <section class="content">

          <!-- Small boxes (Stat box) -->
      <div class="row"><!-- small box -->
        <!-- <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>150</h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->

              <p>แจ้งซ่อมของสมาชิก&nbsp;{{$count_repair_member}}</p>
              <p>แจ้งซ่อมลูกค้าทั่วไป&nbsp;{{$count_repair_general}}</p>
              <p>.</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{ url('/repair-member')  }}" class="small-box-footer"> แจ้งซ่อมของสมาชิก <i class="fa fa-arrow-circle-right"></i></a>
            <a href="{{ url('/repair-general')  }}" class="small-box-footer"> แจ้งซ่อมลูกค้าทั่วไป <i class="fa fa-arrow-circle-right"></i></a>
            <a href="{{ url('/form-search-repair-only-bill')  }}" class="small-box-footer"> ค้าหารายการซ่อม <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <!-- <h3>44</h3> -->

              <p>ผู้จัดการร้านทั้งหมด {{$count_manager}}</p>
              <p>พนักงานทั้งหมด {{$count_employee}}</p>
              <p>ลูกค้าสมาชิกทั้งหมด {{$count_member}}</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{ url('/persons-manager')  }}" class="small-box-footer">ผู้จัดการร้าน<i class="fa fa-arrow-circle-right"></i></a>
            <a href="{{ url('/persons-employee')  }}" class="small-box-footer">พนักงาน<i class="fa fa-arrow-circle-right"></i></a>
            <a href="{{ url('/persons-member')  }}" class="small-box-footer">ลูกค้าสมาชิก<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col --><!-- small box -->
        <!-- <div class="col-lg-3 col-xs-6">
          
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div> -->
        <!-- ./col -->
      </div>
      <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
      <div class="row">
        <div class="col-md-12">

         <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">กราฟแสดงจำนวนการแจ้งซ่อมรายวัน</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="lineChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          
          <!-- AREA CHART -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">กราฟแสดงจำนวนการแจ้งซ่อมรายเดือน</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChart" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

           <!-- AREA CHART -->
           <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">กราฟแสดงจำนวนการแจ้งซ่อมรายปี</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div class="chart">
                <canvas id="areaChartYear" style="height:250px"></canvas>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


<!-- /////////////////////////////user///////////////////////////////// -->
<!-- <div class="col-md-6"> -->


        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
                      <!-- USERS LIST -->
                      <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">สมาชิกใหม่</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">8 สมาชิกคนล่าสุด</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  @foreach($person_member as $value)
                    <li>
                    <a href="{{ asset('image/person-member/picture/'.$value->image_url) }}"><img src="{{ asset('image/person-member/resize/'.$value->image_url) }}" style="height:100px;width:100px;border-radius: 50%;"></a>
                      <!-- <img src="dist/img/user1-128x128.jpg" alt="User Image"> -->
                      <!-- <a href="{{ asset('image/person-member/picture/'.$value->image_url) }}"><img src="{{ asset('image/person-member/resize/'.$value->image_url) }}" ></a> -->
                      <a class="users-list-name" href="#">{{$value->name}}</a>
                      <span class="users-list-date">{{ $value->created}}</span>
                    </li>
                    @endforeach
                   
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{ url('/persons-member')  }}" class="uppercase">ดูเพิ่มเติม</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            <!-- </div> -->
            <!-- /.col -->
        </div>
        <div class="col-md-6">
          <!-- LINE CHART -->
    <!-- /////////////////////////donut/////////////////////////// -->
    <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">เพศ (สมาชิก)</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
<!-- ///////////////////////////////////////////////////////////////// -->
    </section>
    @if (session()->has('status_login_ok'))     
     <script>swal({ title: "<?php echo session()->get('status_login_ok'); ?>",        
                     text: "ยินดีต้อนรับ",         
                     timer: 2500,         
                     type: 'success',  
                     position: 'top-end',       
                     showConfirmButton: false     }); 
    </script>
    @endif

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
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Morris charts -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- donut chart -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>

<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })

</script>
<script>
  $(function () {
    "use strict";
    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "ชาย", value: {{$countmale}} },
        {label: "หญิง", value: {{$countfemale}}},
        {label: "ไม่ระบุ", value: {{$countundefine}}}
      ],
      hideHover: 'auto'
    });
  });
</script>
<script>

 $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    //--------------
    //- AREA CHART -
    //--------------

    // Get context with jQuery - using jQuery's .get() method.
    var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChart       = new Chart(areaChartCanvas)

////////////year//////////////
        var areaChartCanvasYear = $('#areaChartYear').get(0).getContext('2d')
    // This will get the first returned node in the jQuery collection.
    var areaChartYear       = new Chart(areaChartCanvasYear)

    var areaChartData = {
      labels  : ['1 {{$month}} {{$year}}','2 {{$month}} {{$year}}', '3 {{$month}} {{$year}}','4 {{$month}} {{$year}}', '5 {{$month}} {{$year}}','6 {{$month}} {{$year}}',
      '7 {{$month}} {{$year}}','8 {{$month}} {{$year}}', '9 {{$month}} {{$year}}','10 {{$month}} {{$year}}', '11 {{$month}} {{$year}}','12 {{$month}} {{$year}}',
       '13 {{$month}} {{$year}}','14 {{$month}} {{$year}}','15 {{$month}} {{$year}}' ,'16 {{$month}} {{$year}}','17 {{$month}} {{$year}}','18 {{$month}} {{$year}}' 
       ,'19 {{$month}} {{$year}}' ,'20 {{$month}} {{$year}}','21 {{$month}} {{$year}}','22 {{$month}} {{$year}}','23 {{$month}} {{$year}}','24 {{$month}} {{$year}}'
       ,'25 {{$month}} {{$year}}' ,'26 {{$month}} {{$year}}', '27 {{$month}} {{$year}}' ,'28 {{$month}} {{$year}}','29 {{$month}} {{$year}}','30 {{$month}} {{$year}}'
       ,'31 {{$month}} {{$year}}'],
      datasets: [
        // {
        //   label               : 'Electronics',
        //   fillColor           : 'rgba(210, 214, 222, 1)',
        //   strokeColor         : 'rgba(210, 214, 222, 1)',
        //   pointColor          : 'rgba(210, 214, 222, 1)',
        //   pointStrokeColor    : '#c1c7d1',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(220,220,220,1)',
        //   data                : [65, 59, 80, 81, 56, 55, 40]
        // },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$day_01}},{{$day_02}}, {{$day_03}},{{$day_04}}, {{$day_05}}
          ,{{$day_06}},{{$day_07}},{{$day_08}},{{$day_09}} ,{{$day_10}},{{$day_11}}  
          ,{{$day_12}},{{$day_13}} ,{{$day_14}},{{$day_15}} ,{{$day_16}},{{$day_17}}  
          ,{{$day_18}},{{$day_19}} ,{{$day_20}},{{$day_21}}  ,{{$day_22}},{{$day_23}}  
          ,{{$day_24}},{{$day_25}} ,{{$day_26}},{{$day_27}} ,{{$day_28}},{{$day_29}} ,{{$day_30}},{{$day_31}}]
        }
      ]
    }

        var areaChartDataYear = {
      labels  : ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน'
                ,'กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
      datasets: [
        // {
        //   label               : 'Electronics',
        //   fillColor           : 'rgba(210, 214, 222, 1)',
        //   strokeColor         : 'rgba(210, 214, 222, 1)',
        //   pointColor          : 'rgba(210, 214, 222, 1)',
        //   pointStrokeColor    : '#c1c7d1',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(220,220,220,1)',
        //   data                : [65, 59, 80, 81, 56, 55, 40]
        // },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$month_01}},{{$month_02}}, {{$month_03}},{{$month_04}}, {{$month_05}}
          ,{{$month_06}},{{$month_07}},{{$month_08}},{{$month_09}} ,{{$month_10}},{{$month_11}}  
          ,{{$month_12}}]
        }
      ]
    }

    var lineChartData = {
      labels  : ['08.00', '09.00', '10.00', '11.00', '12.00', '13.00', '14.00' ,'15.00' ,'16.00' ,'17.00'],
      datasets: [
        // {
        //   label               : 'Electronics',
        //   fillColor           : 'rgba(210, 214, 222, 1)',
        //   strokeColor         : 'rgba(210, 214, 222, 1)',
        //   pointColor          : 'rgba(210, 214, 222, 1)',
        //   pointStrokeColor    : '#c1c7d1',
        //   pointHighlightFill  : '#fff',
        //   pointHighlightStroke: 'rgba(220,220,220,1)',
        //   data                : [65, 59, 80, 81, 56, 55, 40]
        // },
        {
          label               : 'Digital Goods',
          fillColor           : 'rgba(60,141,188,0.9)',
          strokeColor         : 'rgba(60,141,188,0.8)',
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [{{$time_08}}, {{$time_09}}, {{$time_10}}, {{$time_11}}, {{$time_12}}, 
          {{$time_13}}, {{$time_14}} ,{{$time_15}} ,{{$time_16}} ,{{$time_17}}]
        }
      ]
    }
    var areaChartOptions = {
      //Boolean - If we should show the scale at all
      showScale               : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : false,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - Whether the line is curved between points
      bezierCurve             : true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension      : 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot                : false,
      //Number - Radius of each point dot in pixels
      pointDotRadius          : 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth     : 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius : 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke           : true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth      : 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill             : true,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio     : true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive              : true
    }

    areaChart.Line(areaChartData, areaChartOptions)
    areaChartYear.Line(areaChartDataYear, areaChartOptions)
    //Create the line chart
    //-------------
    //- LINE CHART -
    //--------------
    var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
    var lineChart                = new Chart(lineChartCanvas)
    var lineChartOptions         = areaChartOptions
    lineChartOptions.datasetFill = false
    lineChart.Line(lineChartData, lineChartOptions)

    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieChart       = new Chart(pieChartCanvas)
    var PieData        = [
      {
        value    : 700,
        color    : '#f56954',
        highlight: '#f56954',
        label    : 'Chrome'
      },
      {
        value    : 500,
        color    : '#00a65a',
        highlight: '#00a65a',
        label    : 'IE'
      },
      {
        value    : 400,
        color    : '#f39c12',
        highlight: '#f39c12',
        label    : 'FireFox'
      },
      {
        value    : 600,
        color    : '#00c0ef',
        highlight: '#00c0ef',
        label    : 'Safari'
      },
      {
        value    : 300,
        color    : '#3c8dbc',
        highlight: '#3c8dbc',
        label    : 'Opera'
      },
      {
        value    : 100,
        color    : '#d2d6de',
        highlight: '#d2d6de',
        label    : 'Navigator'
      }
    ]
    var pieOptions     = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke    : true,
      //String - The colour of each segment stroke
      segmentStrokeColor   : '#fff',
      //Number - The width of each segment stroke
      segmentStrokeWidth   : 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps       : 100,
      //String - Animation easing effect
      animationEasing      : 'easeOutBounce',
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate        : true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale         : false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive           : true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio  : true,
      //String - A legend template
      legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions)

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    barChartData.datasets[1].fillColor   = '#00a65a'
    barChartData.datasets[1].strokeColor = '#00a65a'
    barChartData.datasets[1].pointColor  = '#00a65a'
    var barChartOptions                  = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    barChart.Bar(barChartData, barChartOptions)
  })

</script>
