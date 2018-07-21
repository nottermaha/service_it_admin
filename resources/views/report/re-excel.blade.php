
 <?php

 $strExcelFileName="Member-All.xls";
 header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
 header("Content-Disposition: attachment; filename=employee.xls");  //File name extension was wrong
 header("Expires: 0");
 header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

 ?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"xmlns:x="urn:schemas-microsoft-com:office:excel"xmlns="http://www.w3.org/TR/REC-html40">
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br>
<strong><h2></h2></strong>
@foreach($stores as $store)
<img src="{{ asset('image/'.$store->logo) }}" alt="" style="width:100px;height:100px;" disabled>
<br>
<h3> {{ $store->name }}</h3> 
@endforeach
@if($chk==1)
<strong class="text-center"><h2>รายงานพนักงาน : {{$type_name}}</strong></h2><h4>ณ วันที่ {{$current_date}}</h4>

@elseif($chk==2)
<strong class="text-center"><h2>รายงานสมาชิก </strong></h2><h4>ณ วันที่ {{$current_date}}</h4>

@elseif($chk==3)
<strong class="text-center"><h2>รายงานร้าน : {{$type_name}}</strong></h2><h4>ณ วันที่ {{$current_date}}</h4>

@elseif($chk==4)
<strong class="text-center"><h3>รายงานการซ่อม : {{$type_name}} จากวันที่ {{$chk_date_in}}  ถึงวันที่ {{$chk_date_out}}</strong></h3><h4>วันที่ออกรายงาน {{$current_date}}  </h4>

@elseif($chk==5)
<strong class="text-center"><h2>รายงานอะไหล่ : {{$type_name}}</strong></h2><h4>ณ วันที่ {{$current_date}}</h4>
@endif

<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
@if($chk==1 )
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
        <thead >
          <tr>
            <th>#</th>
            <th >ชื่อ-สกุล</th>
            <!-- <th >เลขประชาชน</th> -->
            <th >เพศ</th>
            <th >อีเมล์</th>
            <th >วันเกิด</th>
            <th >เบอร์โทร</th>
            <th >ที่อยู่</th>
            <th >ตำแหน่ง</th>
            <th >เงินเดือน</th>
            <th >เป็นพนักงานเมื่อ</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0 ?>
          @foreach($store_branchs as $store_branchs)
          @if($store_branchs->status==1)
              <tr>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"><b>{{ $store_branchs->name }}</b></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
              </tr>
            @endif
            @foreach ($result as $value)
                @if($store_branchs->id == $value->store_branch_id)
                <tr>
                  <td >{{ $i=$i+1 }}</td>
                  <td >{{ $value->name }}</td>
                  <td >
                  @if($value->gender==1)ชาย
                  @elseif($value->gender==2)หญิง
                  @endif
                  <td >{{ $value->email }}</td>
                  <td >{{ $value->birth_day }}</td>
                  <td >{{ $value->phone }}</td>
                  <td >{{ $value->address }}</td>
                  <td >{{ $value->position }}</td>
                  <td >{{ $value->salary }}</td>
                  <td >{{ $value->date }}</td>
                </tr>
                @endif
            @endforeach
          @endforeach
        </tbody>
  </table>

  @elseif($chk==2)
<table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
        <thead >
          <tr>
            <th>#</th>
            <th >ชื่อ-สกุล</th>
            <!-- <th >เลขประชาชน</th> -->
            <th >เพศ</th>
            <th >อีเมล์</th>
            <th >วันเกิด</th>
            <th >เบอร์โทร</th>
            <th >ที่อยู่</th>
          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($result as $value)
          <tr>
            <td >{{ $i=$i+1 }}</td>
            <td >{{ $value->name }}</td>
            <!-- <td >{{ $value->person_id }}</td> -->
            <td >{{ $value->gender }}</td>
            <td >{{ $value->email }}</td>
            <td >{{ $value->birthday }}</td>
            <td >{{ $value->phone }}</td>
            <td >{{ $value->address }}</td>

          </tr>
          @endforeach
        </tbody>
  </table>

  @elseif($chk==3)
  <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
        <thead >
          <tr>
            <th>#</th>
            <th >ชื่อร้าน</th>
            <th >เบอร์โทร</th>
            <th >อีเมล์</th>
            <th >ติดต่อออนไลน์</th>
            <th >ที่อยู่</th>

          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
          @foreach ($result as $value)
          <tr>
            <td >{{ $i=$i+1 }}</td>
            <td >{{ $value->name }}</td>
            <td >{{ $value->phone }}</td>
            <td >{{ $value->email }}</td>
            <td >{{ $value->contact }}</td>
            <td >{{ $value->address }}</td>
          </tr>
          @endforeach
        </tbody>
  </table>

@elseif($chk==4)
  <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
        <thead >
          <tr>
            <th>#</th>
            <th class="text-center">หมายเลขบิล</th>
            <th class="text-center">สถานะการซ่อม</th>
            <th class="text-center">สถานะการปิดบิล</th>
            <th class="text-center">วันที่รับซ่อม</th>
            <th class="text-center">วันที่ส่งคืน</th>

          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
  <!-- ///////// -->
  @if($chk_print=='4')
    <tr>
        <td style="background-color:#DCDCDC;" ></td>
        <td style="background-color:#DCDCDC;"><b>{{ $store_branch_name }}</b></td>
        <td style="background-color:#DCDCDC;"></td>
        <td style="background-color:#DCDCDC;"></td>
        <td style="background-color:#DCDCDC;"></td>
        <td style="background-color:#DCDCDC;"></td>
      </tr>
          @foreach ($result as $value)
              <tr>
                <td class="text-center">{{ $i=$i+1 }}</td>
                <td ><b style="color:green;"> {{ $value->bin_number }} </b><br>

                  <b style="color:blue;">-</b>{{ $value->list_repair_name }} 
                  <b style="color:blue;">ราคา :</b>{{ $value->list_repair_price }} 
                  <b style="color:blue;">สถานะ :</b>{{ $value->status_list_name }} 
                  <b style="color:blue;">ช่างซ่อม :</b>{{ $value->person_name }}
                  <br> 

                </td>
                <td class="text-center">
                    {{ $value->status_repair_shop_name }}
                </td>
                <td class="text-center">
                @if($value->status_bill==0)
              <b style="color:red;">ยังไม่ปิดบิล</b> 
                @elseif($value->status_bill==1)
                <b style="color:green;">ปิดบิลแล้ว</b> 
                @endif
                </td>
                <td class="text-center">{{ $value->date_in }}</td>
                <td class="text-center">{{ $value->date_out }}</td>
              </tr>
            @endforeach
<!-- ////// -->
  @elseif($chk_print=='5')

  @foreach($store_branchs as $store_branchs)
            @if($store_branchs->status==1)
              <tr>
                <td style="background-color:#DCDCDC;" ></td>
                <td style="background-color:#DCDCDC;"><b>{{ $store_branchs->name }}</b></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
              </tr>
            @endif

              @foreach ($result as $value)
                @if($store_branchs->id == $value->store_branch_id)
                <tr>
                  <td class="text-center">{{ $i=$i+1 }}</td>
                  <td ><b style="color:green;"> {{ $value->bin_number }} ชื่อลูกค้า:{{ $value->member_name }} </b><br>
                  <?php $j=0 ?>
                    @foreach($list_repair as $list_repairs)
                      @if($list_repairs->repair_id == $value->id)
                        <b style="color:blue;">{{ $j=$j+1 }}.</b> {{ $list_repairs->list_name }} 
                        <b style="color:blue;">ราคา :</b>{{ number_format($list_repairs->price, 2) }}บ.
                        <b style="color:blue;">สถานะ :</b>{{ $list_repairs->status_repair_name }} 
                        <br> 
                                @foreach($data_use_parts as $data_use_part)
                                  @if( $list_repairs->list_id==$data_use_part->list_repair_id_chk )
                                      <a>-> {{ $data_use_part->list_parts_name }} {{ $data_use_part->pay_out }} [ ล็อต:{{$data_use_part->lot_name}} ] , </a> 
                                    
                                  @endif      
                                @endforeach  <br>
                      @endif
                    @endforeach
                  </td>
                  <td class="text-center">
                      {{ $value->status_repair_shop_name }}
                  </td>
                  <td class="text-center">
                  @if($value->status_bill==0)
                 <b style="color:red;">ยังไม่ปิดบิล</b> 
                  @elseif($value->status_bill==1)
                  <b style="color:green;">ปิดบิลแล้ว</b> 
                  @endif
                  </td>
                  <td class="text-center">{{ $value->date_in }}</td>
                  <td class="text-center">{{ $value->date_out }}</td>
                </tr>
                @endif
              @endforeach 
              
          @endforeach

  @else
<!-- ////// -->

          @foreach($store_branchs as $store_branchs)
            @if($store_branchs->status==1)
              <tr>
                <td style="background-color:#DCDCDC;" ></td>
                <td style="background-color:#DCDCDC;"><b>{{ $store_branchs->name }}</b></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
              </tr>
            @endif

              @foreach ($result as $value)
                @if($store_branchs->id == $value->store_branch_id)
                <tr>
                  <td class="text-center">{{ $i=$i+1 }}</td>
                  <td ><b style="color:green;"> {{ $value->bin_number }} ชื่อลูกค้า:{{ $value->member_name }} </b><br>
                  <?php $j=0 ?>
                    @foreach($list_repair as $list_repairs)
                      @if($list_repairs->repair_id == $value->id)
                        <b style="color:blue;">{{ $j=$j+1 }}.</b> {{ $list_repairs->list_name }} 
                        <b style="color:blue;">ราคา :</b>{{ number_format($list_repairs->price, 2) }}บ.
                        <b style="color:blue;">สถานะ :</b>{{ $list_repairs->status_repair_name }} 
                        <br> 
                      @endif
                    @endforeach
                  </td>
                  <td class="text-center">
                      {{ $value->status_repair_shop_name }}
                  </td>
                  <td class="text-center">
                  @if($value->status_bill==0)
                 <b style="color:red;">ยังไม่ปิดบิล</b> 
                  @elseif($value->status_bill==1)
                  <b style="color:green;">ปิดบิลแล้ว</b> 
                  @endif
                  </td>
                  <td class="text-center">{{ $value->date_in }}</td>
                  <td class="text-center">{{ $value->date_out }}</td>
                </tr>
                @endif
              @endforeach 
              
          @endforeach
  @endif
         
        </tbody>
  </table>

  @elseif($chk==5)
  <table x:str border=1 cellpadding=0 cellspacing=1 width=100% style="border-collapse:collapse">
        <thead >
          <tr>
            <th>#</th>
            <th >ชื่อล๊อต</th>
            <th >รายการอะไหล่</th>
            <th >รุ่น</th>
            <th >จำนวน</th>
            <th >ราคาขาย</th>

          </tr>
        </thead>
        
        <tbody>
          <?php $i=0 ?>
        @foreach($store_branchs as $store_branchs)
            @if($store_branchs->status==1)
              <tr>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"><b>{{ $store_branchs->name }}</b></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
                <td style="background-color:#DCDCDC;"></td>
              </tr>
            @endif
          @foreach ($result as $value)
            @if($store_branchs->id == $value->store_branch_id)
            <tr>
              <td >{{ $i=$i+1 }}</td>
              <td >{{ $value->lot_name }}</td>
              <td >{{ $value->name }}</td>
              <td >{{ $value->generation }}</td>
                @if($value->number<=5)
                <td style="background-color:#FF7F50;">{{ $value->number }} เหลือน้อย</td>
                @else
                <td>{{ $value->number }}</td>
                @endif
              <td >{{ $value->pay_out }}</td>
            </tr>
            @endif
          @endforeach
        @endforeach
        </tbody>
  </table>
  @endif
</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>


