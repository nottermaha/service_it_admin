
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
    <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->
  <!-- Morris chart -->
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <!-- <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->

  <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <!-- <a href="compose.html" class="btn btn-primary btn-block margin-bottom">ตั้งกระทู้</a> -->
          <button type="button" class="btn btn-primary btn-block margin-bottom" data-toggle="modal" data-target="#modal-add-question-post">
                   <i class="fa  fa-plus-circle fa-lg"></i> &nbsp; ตั้งกระทู้
          </button>
                  <!-- //////////////////////////////modal-add-question-post//////////////////////////////// -->

        <div class="modal fade " id="modal-add-question-post" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ตั้งกระทู้ใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/questtion-post-create')) ?>
          <div class="modal-body">
            
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group" style="padding-left:20px;padding-right:20px;">หัวข้อ
                          <input type="text" class="form-control pull-right" id="Name" name="topic" placeholder="หัวข้อ...">
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">รายละเอียด
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="message">
                    </textarea>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}

        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-question-post//////////////////////////////// -->

          <div class="box box-solid">
            <div class="box-header with-border">
              <!-- <h3 class="box-title">Labels</h3> -->

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked"><br>
              <?= Form::open(array('url' => '/questtion-post')) ?>
                    </li>
                    <input type="hidden" name="chk_get" value="all">
                    <button type="submit" class="btn btn-warning btn-block margin-bottom"><i class="fa fa-comments fa-lg"></i>&nbsp; กระทู้ทั้งหมด</button>
                    </li>
              {!! Form::close() !!}
              <?= Form::open(array('url' => '/questtion-post')) ?>
                    </li>
                    <input type="hidden" name="chk_get" value="only">
                    <button type="submit" class="btn btn-primary btn-block margin-bottom"><i class="fa fa-comments fa-lg"></i>&nbsp; กระทู้ของท่าน</button>
                    </li>
              {!! Form::close() !!}

              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">กระทู้คำถาม</h3>

              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach ($question_posts as $question_post)
                  <!-- <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">5 mins ago</td>
                  </tr> -->
                    <tr>
                    <!-- <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td> -->
                    <td><I>{{$question_post->topic}}</I></td> 

                    <td class="mailbox-subject"> {!!str_limit($question_post->message, 70)!!}...
                    </td>
                    <td class="mailbox-attachment"></td>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">                    
                    <?= Form::open(array('url' => '/answer-post-form')) ?>
                    <input type="hidden" name="chk_get" value="{{$chk_get}}">
                      <input type="hidden" name="id" value="{{ $question_post->id }}">
                      <input type="hidden" name="s_id" value="{{ $question_post->persons_id }}">
                          <button type="submit" class="btn btn-info"><i class="fa fa-eye"></i>&nbsp; ดูเพิ่มเติม</button>
                    </td>
                    {!! Form::close() !!}
                    @if($question_post->persons_id == $s_id)
                    <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-question-post{{ $question_post->id }}">
                   <i class="fa  fa-edit fa-lg"></i> &nbsp;
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-question-post{{ $question_post->id }}">
                   <i class="fa  fa-trash fa-lg"></i> &nbsp;
                    </button>


<!-- //////////////////////////////modal-delete-question-post//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-question-post{{ $question_post->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบกระทู้</h4>
                  </div>        
                <?= Form::open(array('url' => '/questtion-post-delete')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบกระทู้นี้ </b>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                      <input type="hidden" name="chk_get" value="{{$chk_get}}">
                      <input type="hidden" name="id" value="{{$question_post->id}}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-question-post//////////////////////////////// -->
        <!-- /////////////////////////modal-edit-question-post///////////////////////// -->

        <div class="modal fade " id="modal-edit-question-post{{ $question_post->id }}" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขกระทู้ของท่าน</h4>
          </div>        
          <?= Form::open(array('url' => '/questtion-post-edit')) ?>
          <div class="modal-body">
            
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group" style="padding-left:20px;padding-right:20px;">หัวข้อ
                  <input type="text" class="form-control pull-right" id="Name" name="topic" placeholder="หัวข้อ..." value="{{$question_post->topic}}">
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">รายละเอียด
                  <textarea  class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="message2{{ $question_post->id }}" value="{{$question_post->message}}">
                    {{$question_post->message}}
                  </textarea>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
          <input type="hidden" name="id" value="{{$question_post->id}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}

        </div>
      </div>          
    </div>
    <!-- ////////////////////////End modal-edit-question-post/////////////////////////// -->
                     
                      {!! Form::close() !!}
                    </td>
                    @endif
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    
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

<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script> -->



  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>




<script>
  // Datatable
  $(function () {
    $('#example').DataTable()
  })
  //Initialize Select2 Elements
  $('.select2').select2()
</script>
<script>
	CKEDITOR.replace( 'message' );
</script>
<script>
	// CKEDITOR.replace( 'message2' );
    @foreach ($question_posts as $question_post)
      CKEDITOR.replace( 'message2{{$question_post->id}}' );
    @endforeach
</script>
<!-- <script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script> -->
