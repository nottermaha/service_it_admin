
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

 <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>
  
</head>
<!--End css header-leftmenu -->

 @include('form/header-leftmenu')

     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-md-3">
        <?= Form::open(array('url' => '/questtion-post')) ?>
        <input type="hidden" name="chk_get" value="{{$chk_get}}">
              <button type="submit" class="btn btn-warning margin-bottom"><i class="fa fa-reply fa-lg"></i>&nbsp; ย้อนกลับ
        </button>
        <button type="button" class="btn btn-info margin-bottom" data-toggle="modal" data-target="#modal-add-answer-post">
                   <i class="fa fa-comments-o fa-lg"></i> &nbsp; ตอบกระทู้
          </button>
        {!! Form::close() !!}
          <!-- <a href="{{ url('questtion-post') }}" class="btn btn-warning margin-bottom">
          <i class="fa fa-reply fa-lg"></i> &nbsp;ย้อนกลับ</a> -->
          <!-- <button type="button" class="btn btn-primary margin-bottom" data-toggle="modal" data-target="#modal-add-answer-post">
                   <i class="fa fa-plus-circle fa-lg"></i> &nbsp; ตอบกระทู้
          </button> -->
          <!-- //////////////////////////////modal-add-answer-post//////////////////////////////// -->

        <div class="modal fade " id="modal-add-answer-post" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">ตอบกระทู้</h4>
          </div>        
          <?= Form::open(array('url' => '/answer-post-create')) ?>
          <div class="modal-body">
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">
                    <textarea id="compose-textarea" class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="message">
                      
                    </textarea>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
            <input type="hidden" name="question_id" value="{{$question_posts_id}}">
            <input type="hidden" name="s_id" value="{{$s_id_from_question}}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-add-answer-post//////////////////////////////// -->


          <!-- /. box -->
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
              <h3 class="box-title">รายละเอียดกระทู้</h3><br><br>

              @if($s_id_from_question == $s_id)
              <div class="box-tools pull-right">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-question-post">
                   <i class="fa  fa-edit fa-lg"></i> &nbsp;
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-question-post">
                   <i class="fa  fa-trash fa-lg"></i> &nbsp;
                    </button>
              </div>

              <!-- //////////////////////////////modal-delete-question-post//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-question-post">
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
                      <input type="hidden" name="id" value="{{ $question_posts_id }}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////End modal-delete-question-post//////////////////////////////// -->
        <!-- /////////////////////////modal-edit-question-post///////////////////////// -->

        <div class="modal fade " id="modal-edit-question-post" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขกระทู้ของท่าน</h4>
          </div>        
          <?= Form::open(array('url' => '/questtion-post-from-answer-edit')) ?>
          <div class="modal-body">
            
            
            <div class="row" style="padding-top:20px;">
              <div class="form-group" style="padding-left:20px;padding-right:20px;">หัวข้อ
                  <input type="text" class="form-control pull-right" id="Name" name="topic" placeholder="หัวข้อ..." value="{{ $question_posts_topic }}" required>
              </div>
            </div>
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">รายละเอียด
                  <textarea  class="form-control" style="height: 300px" placeholder="รายละเอียด..." name="message2" value="{{ $question_posts_message }}">
                    {{ $question_posts_message }}
                  </textarea>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
          <input type="hidden" name="s_id" value="{{ $s_id_from_question }}">
          <input type="hidden" name="id" value="{{ $question_posts_id }}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}

        </div>
      </div>          
    </div>
    <!-- ////////////////////////End modal-edit-question-post/////////////////////////// -->
              @endif
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>หัวข้อ :{{$question_posts_topic}}</h3>
                <h4>
                @if($person_type==1 || $person_type==2)
                <img class="img-circle img-sm" src="{{ asset('image/person-manager/resize/'.$person_image_url) }}" alt="">
                @elseif($person_type==3)
                <img class="img-circle img-sm" src="{{ asset('image/person-employee/resize/'.$person_image_url) }}" alt="">
                @elseif($person_type==4)
                <img class="img-circle img-sm" src="{{ asset('image/person-member/resize/'.$person_image_url) }}" alt="">
                @endif
                &nbsp;&nbsp;&nbsp;{{ $person_name }} <b style="color:gray;">สถานะ :</b>
                        @if($person_type==1)
                        <b style="color:orange;">แอดมิน</b>
                        @elseif($person_type==2)
                        <b style="color:back;">ผู้จัดการร้าน</b>
                        @elseif($person_type==3)
                        <b style="color:blue;">พนักงาน</b>
                        @elseif($person_type==4)
                        <b style="color:green;">สมาชิก</b>
                        @endif
                </h4>
                </h5>ตั้งกระทู้เมื่อ
                  <span class="mailbox-read-time ">{{ $created }} {{ $time_created }}</span></h5>
                  </h5>แก้ไขล่าสุด
                  <span class="mailbox-read-time ">{{ $updated }} {{ $time_updated }}</span></h5
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">

              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
              <h3>รายละเอียด</h3><br>
                {!! $question_posts_message !!}  
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <!-- <ul class="mailbox-attachments " style="width:700px;">
                <li>
                  <span class="mailbox-attachment-icon"></span>

                </li>
              </ul> -->
                          <!-- /.box-body -->
            <div class="box-footer box-comments">

            @foreach($ansewr_posts as $ansewr_post)
              <div class="box-comment">
                <!-- User image -->
                @if($ansewr_post->is_type==1 || $ansewr_post->is_type==2)
                <img class="img-circle img-sm" src="{{ asset('image/person-manager/resize/'.$ansewr_post->is_image_url) }}" alt="">
                @elseif($ansewr_post->is_type==3)
                <img class="img-circle img-sm" src="{{ asset('image/person-employee/resize/'.$ansewr_post->is_image_url) }}" alt="">
                @elseif($ansewr_post->is_type==4)
                <img class="img-circle img-sm" src="{{ asset('image/person-member/resize/'.$ansewr_post->is_image_url) }}" alt="">
                @endif
                <!-- <img class="img-circle img-sm" src="dist/img/user3-128x128.jpg" alt="User Image"> -->

                <div class="comment-text">
                      <span class="username">
                        <!-- Maria Gonzales -->
                        {{$ansewr_post->is_name}} <b style="color:gray;">สถานะ :</b>
                            @if($ansewr_post->is_type==1)
                            <b style="color:orange;">แอดมิน</b>
                            @elseif($ansewr_post->is_type==2)
                            <b style="color:back;">ผู้จัดการร้าน</b>
                            @elseif($ansewr_post->is_type==3)
                            <b style="color:blue;">พนักงาน</b>
                            @elseif($ansewr_post->is_type==4)
                            <b style="color:green;">สมาชิก</b>
                            @endif
                        <span class="text-muted pull-right">แก้ไขล่าสุด {{ $ansewr_post->updated_answer }} {{ $ansewr_post->time_updated_answer }}</span>
                      </span><!-- /.username -->
                  <!-- It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout. -->
                  {!! $ansewr_post->answer_message !!}
                  <?php $s_id='' ;$s_id=session('s_id','default');?>
                  @if($s_id==$ansewr_post->is_s_id) 
                  <div class="box-tools pull-right">
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-answer-post{{ $ansewr_post->id }}">
                    <i class="fa  fa-edit fa-lg"></i> &nbsp;
                      </button>
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-answer-post{{ $ansewr_post->id }}">
                    <i class="fa  fa-trash fa-lg"></i> &nbsp;
                      </button>
                  </div>
                  @endif

                  <!-- //////////////////////////////modal-delete-answer-post//////////////////////////////// -->

            <div class="modal fade " id="modal-delete-answer-post{{ $ansewr_post->id }}">
              <div class="modal-dialog ">
                <div class="modal-content ">
                  <div class="modal-header " >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">ลบความคิดเห็น</h4>
                  </div>        
                <?= Form::open(array('url' => '/answer-post-delete')) ?>
                    <div class="modal-body">
                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-9"style="text-align:right">กดปุ่ม "ลบข้อมูล" เพื่อยืนยันการลบความคิดเห็นนี้ </b>
                        </div>
                      </div>  
                    </div> 
                      <div class="modal-footer">
                      <input type="hidden" name="chk_get" value="{{$chk_get}}">
                      <input type="hidden" name="s_id" value="{{ $s_id_from_question }}">
                      <input type="hidden" name="question_id" value="{{ $question_posts_id }}">
                      <input type="hidden" name="answer_id" value="{{ $ansewr_post->id }}">
                        <button type="button" class="btn btn-warning " data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                      </div>
                {!! Form::close() !!}
                </div>
              </div>          
            </div>
    <!-- //////////////////////////////modal-delete-answer-post//////////////////////////////// -->
        <!-- /////////////////////////modal-edit-answer-post///////////////////////// -->

        <div class="modal fade " id="modal-edit-answer-post{{ $ansewr_post->id }}" style="padding-left:-100px;">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">แก้ไขกระความคิดเห็น</h4>
          </div>        
          <?= Form::open(array('url' => '/answer-post-edit')) ?>
          <div class="modal-body">
            
            <div class="row" style="padding-top:20px;">
            <div class="form-group" style="padding-left:20px;padding-right:20px;">รายละเอียด
                  <textarea  class="ckeditor" cols="80" id="editor" rows="10"name="message3" value="{{ $ansewr_post->answer_message }}">
                  {{ $ansewr_post->answer_message }}
                  </textarea>
              </div>
            </div>
          
          </div> 
          <div class="modal-footer">
          <input type="hidden" name="chk_get" value="{{$chk_get}}">
          <input type="hidden" name="s_id" value="{{ $s_id_from_question }}">
          <input type="hidden" name="question_id" value="{{ $question_posts_id }}">
          <input type="hidden" name="answer_id" value="{{ $ansewr_post->id }}">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}

        </div>
      </div>          
    </div>

    <!-- ////////////////////////modal-edit-answer-post/////////////////////////// -->


                </div>
                <!-- /.comment-text -->
              </div>
              <!-- /.box-comment -->
              @endforeach

            </div>

            </div>

          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->    
      <div class="text-right">
        <button type="button" class="btn btn-info margin-bottom" data-toggle="modal" data-target="#modal-add-answer-post">
              <i class="fa  fa-comments-o fa-lg"></i> &nbsp; ตอบกระทู้
        </button>
      </div>
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
	CKEDITOR.replace( 'message2' );
</script>
<!-- <script>
  $(function () {
    //Add text editor
    $("#compose-textarea").wysihtml5();
  });
</script> -->
