
@extends('adminlte::page')

@section('title', 'รายการร้าน')

@section('content_header')
    <h1>รายการร้านสาขา</h1>
@stop

@section('content')

    <br>
    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
          <!-- <?= link_to('store-form',$title='add data',['class'=>'btn btn-primary '],['data-toggle'=>'btn btn-primary '],['data-toggle'=>'#modal-default '],$secure=null); ?> -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-add-branch">
                    add data
            </button>
        </div> 
      </div>

      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการร้านสาขา</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>ลำดับ</th>
            <th>สาขา</th>
            <th>สถานะ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($stores as $store )
          <tr>
            <td>{{ $store->index }}</td>
            <td ><a href=""data-toggle="modal" data-target="#modal-show-store-branch">{{ $store->name }}</a></td>
            <td class="text-center">{{ $store->status_name }}</td>
            <!-- <td class="text-center"><a href="<?php echo url('') ?>/{{$store->id}}" 
            class="btn btn-warning">แก้ไข</a></td> -->
            <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit-branch{{ $store->id }}">แก้ไข</a></a></td> 

                    <div class="modal fade" id="modal-edit-branch{{ $store->id }}">
        
        <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">บันทึกข้อมูลสาขาใหม่</h4>
          </div>        
          <?= Form::open(array('url' => '/store-branch/edit/'. $store->id)) ?>   
          <div class="modal-body">
            <div class="row">
              <div class="form-group">
                <b for="" class="control-label col-sm-2"style="text-align:right">ชื่อสาขา</b>
                <div class="col-sm-9">
                  <div class="input-group date">
                    <div class="input-group-addon">
                        <i class="fa fa-user fa-lg"></i>
                    </div>
                      <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อสาขา..." value="{{ $store->name }}">
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success">บันทึก</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>          
    </div>

            <td class="text-center"><a href="<?php echo url('/store-branch/delete') ?>/{{$store->id}}" 
            class="btn btn-danger">ลบ</a></td>

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
        
            <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">บันทึกข้อมูลสาขาใหม่</h4>
              </div>        
              <?= Form::open(array('url' => '/store-branch/create')) ?>
              <div class="modal-body">
                <div class="row">
                  <div class="form-group">
                    <b for="" class="control-label col-sm-2"style="text-align:right">ชื่อสาขา</b>
                    <div class="col-sm-9">
                      <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-user fa-lg"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="Name" name="name" placeholder="ชื่อสาขา...">
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
              <div class="modal-footer">
                <button type="button" class="btn btn-danger " data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
              </div>
              {!! Form::close() !!}
            </div>
          </div>          
        </div>
          
  
@stop

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@stop

@section('js')
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>

  $(function () {
    $('#example').DataTable()
  })

</script>


@stop
