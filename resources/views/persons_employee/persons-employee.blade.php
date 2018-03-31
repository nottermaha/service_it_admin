
@extends('adminlte::page')

@section('title', 'รายการบุคคล')

@section('content_header')
    <h1>รายการพนักงาน</h1>
@stop

@section('content')
              
    <br>
    <section class="content">

      <div class="row">
        <div class="col-xs-12 text-right">
          <?= link_to('/person-employee-form',$title='add data',['class'=>'btn btn-primary '],$secure=null); ?>
        </div> 
      </div>
      <br>

      <div class="row">
        <div class="col-xs-12">

      <div class="box">
            <div class="box-header">
              <h3 class="box-title">รายการพนักงาน</h3>
            </div>

       <div class="box-body table-responsive ">
              <table id="example" class="table table-bordered table-striped table-hover  ">
        <thead >
          <tr>
            <th>ชื่อ</th>
            <th>สกุล</th>
            <th>สถานะ</th>
            <th>แก้ไข</th>
            <th>ลบ</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($persons as $person)
          <tr>
            <td>{{ $person->name }}</td>
            <td>{{ $person->last_name }}</td>
            <td class="text-center">{{ $person->status_name }}</td>
            <td><a href="{{ url('/person-employee-form-edit/'.$person->id)  }}" class="btn btn-warning">แก้ไข</a></a></td>   
            <td class="text-center"><a href="<?php echo url('/person-employee/delete') ?>/{{$person->id}}" class="btn btn-danger">ลบ</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      </div>
    </div>
    </div>
    </div>
    </section>
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
  // Datatable
  $(function () {
    $('#example').DataTable()
  })

</script>

@stop
