
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
@if($chk==1 || $chk==2)
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
            @if($chk==1)
            <th >ตำแหน่ง</th>
            <th >เงินเดือน</th>
            <th >เป็นพนักงานเมื่อ</th>
            @endif
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
            @if($chk==1)
            <td >{{ $value->position }}</td>
            <td >{{ $value->salary }}</td>
            <td >{{ $value->date_in }}</td>
            @endif
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
  @endif
</div>
<script>
window.onbeforeunload = function(){return false;};
setTimeout(function(){window.close();}, 10000);
</script>
</body>
</html>


