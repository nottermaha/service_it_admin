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
  <script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
  <!-- <script src="https://cdn.ckeditor.com/4.9.3/standard/ckeditor.js"></script> -->
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')
 <section class="content-header">
            <h1 style="background-color:#DCDCDC;padding-top:10px;padding-bottom:10px;padding-left:10px;">
              สาขาทั้งหมด/
              <small><a>สาขาทั้งหมด</a> </small>
            </h1>
          </section> 
      <br>

    <section class="content">

    @foreach($stores as $store)

  <div class="row"> 
   <div class="col-md-1"></div>
    <div class="col-md-10 ">
        <div class="col-md-12">
          <div class="box box-solid">
            <div class="box-header with-border bg-primary">
              <!-- <h3 class="box-title">Progress Bars Different Sizes</h3> -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                  <div class="col-md-4">
                  <img src="{{ asset('image/'.$logo) }}"style="width:150px;height:150px;"><br><br>
                  </div>
                  <div class="col-md-8">
                     <h3> M {{ $store->name }}</h3>
                     <br>
                     <div class="col-md-12">
                      <h4> <i class="fa fa-phone fa-lg"></i>&nbsp;เบอร์โทร : {{ $store->phone }}</h4>
                    </div>
                    <div class="text-right">
                    {!!  Form::open(['url'=>'/stores-detail'])  !!}
                    <input type="hidden"  name="id" value="{{ $store->id }}">
                      <button type="submit" class="btn btn-info right"><i class="fa fa-list fa-lg"></i>&nbsp;รายละเอียด</button>
                    {!! Form::close() !!}
                     </div>
                  </div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col (left) -->
      </div>
    </div>
  <div class="col-md-13"></div>
    @endforeach
  
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

