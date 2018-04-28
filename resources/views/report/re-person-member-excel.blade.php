<?php
// header("Content-type: application/vnd.ms-excel");
// header('Content-type: application/csv'); //*** CSV ***//
// header("Content-Disposition: attachment; filename=testing.xls");
// echo '<br>';

// header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
// header("Content-Disposition: attachment;filename=\"filename.xlsx\"");
// header("Cache-Control: max-age=0");

// $filename ="excelreport.xls";
// $contents = "testdata1 \t testdata2 \t testdata3 \t \n";
// header('Content-type: application/ms-excel');
// header('Content-Disposition: attachment; filename='.$filename);
// echo $contents;

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=abc.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
echo "Some Text"; //no ending ; here



?>
      <table >
        <thead >
          <tr>
            <th>ชื่อ</th>
            <th>สถานะ</th>
          </tr>
        </thead>
        
        <tbody>
          @foreach ($persons as $person)
          <tr>
            <td>{{ $person->name }}</td>
            <td class="text-center">{{ $person->status_name }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>