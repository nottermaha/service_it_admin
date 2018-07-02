
@include('form/header-font')

<div class="hero-box hero-box-smaller full-bg-9 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">ตรวจสอบการซ่อมสินค้า</h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">ท่านสามารถตรวจสอบรายละเอียดการซ่อมสินค้าของท่าน</p>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>

<div class="container features-tour-box">
   <div class="row">
        <h4 class="text-center"><I>กรุณากรอก "เลขบิล" ที่ท่านต้องการตรวจสอบ</I></h4><br>
        <div class="col-md-3 col-xs-3">
            <p style="text-align:right;font-size:25px;">เลขบิล</p> 
            <!-- <h3 style="text-align:right;">เลขบิล</h3> -->
        </div>
        <?= Form::open(array('url' => '/font-repair-general-search')) ?>
        <div class="col-md-6 col-xs-6">
            <div class="input-group input-group-lg">
                <!-- <span class="input-group-addon">@</span> -->
                <input type="text" class="form-control" placeholder="B0103062212..." name="bin_number" required>
            </div>
        </div>
        <div class="col-md-1 col-xs-1">
            <input type="hidden" name="chk_num_bill" value="1">
            <button type="submit" class="btn btn-success btn-lg">ตรวจสอบ</button>
        </div>
        {!! Form::close() !!}
    </div><br><br>
    @if($check==2)
        <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="alert alert-warning">
                    <div class="bg-orange alert-icon">
                        <i class="glyph-icon icon-warning"></i>
                    </div>
                    <div class="alert-content">
                        <h4 class="alert-title"><h2><b>ไม่พบรายการดังกล่าว</b> </h2> </h>
                        <p><h4>กรุณาตรวจสอบหมายเลขบิลของท่านให้ถูกต้อง</h4> </p>
                    </div>
                </div>
            </div>
        </div>
      
    @endif
    @if($check==1)
    <div class="col-md-2">
    </div>
    <div class="col-md-8" >
    <div class="panel" >
    <div class="panel-body">
        <h3 class="title-hero">
            <h3 class="modal-title text-center" style="color:gray;"><b>รายละเอียด</b></h3>
        </h3>
        <br>
        <div class="box box-info">
            <div class="box-header">
              <!-- <h3 class="box-title">Color & Time Picker</h3> -->
            </div>
            <div class="box-body">

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          สาขาที่ซ่อม : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$store_branch_name}}</b>
                        </div>
                    </div><hr style="margin-top:5px;margin-bottom:5px;">

                    <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          หมายเลขบิล : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$bin_number}}</b>
                        </div>
                    </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ชื่อลูกค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $name }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                       <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          เบอร์โทร : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{ $phone }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                        
                        <b for="" class="control-label col-md-3"style="text-align:right">
                                อุปกรณ์ที่นำมาซ่อม  </b><br>
                                <?php $i=0; ?>
                            @foreach($repairs as $repair)
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                {{ $i=$i+1 }} </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$repair->list_repair_name}}
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                อาการเสีย: </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$repair->symptom}}
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                รายละเอียด : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$repair->detail}}
                                </b>                                
                                @foreach($status_lists as $value)
                                  @if($value->l_id==$repair->list_repair_id)
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                ราคา : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$value->price}} บาท.
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                ช่างซ่อม : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">
                                {{$value->person_name}}
                                </b>
                                <b for="" class="control-label col-md-3"style="text-align:right">
                                สถานะการซ่อม : </b>
                                <b for="" class="control-label col-md-9" style="color:gray">

                                    @if( $value->status_color==1 )
                                    <button style="width:190px;" type="button" class="btn btn-info">
                                    @elseif( $value->status_color==2 )
                                    <button style="width:190px;" type="button" class="btn btn-btn-blue-alt" >
                                    @elseif( $value->status_color==3 )
                                    <button style="width:190px;" type="button" class="btn btn-success" >
                                    @elseif( $value->status_color==4 )
                                    <button style="width:190px;" type="button" class="btn btn-yellow">
                                    @elseif( $value->status_color==5 )
                                    <button style="width:190px;" type="button" class="btn btn-danger">
                                    @elseif( $value->status_color==6 )
                                    <button style="width:190px;" type="button" class="btn btn-default" >
                                    @elseif( $value->status_color==7 )
                                    <button style="width:190px;" type="button" class="btn btn-black-opacity">
                                    @elseif( $value->status_color==8 )
                                    <button style="width:190px;" type="button" class="btn btn btn-azure" >
                                    @elseif( $value->status_color==9 )
                                    <button style="width:190px;" type="button" class="btn btn-purple" >
                                    @elseif( $value->status_color==10 )
                                    <button style="width:190px;" type="button" class="btn btn-warning" >
                                    @elseif( $value->status_color==11 )
                                    <button style="width:190px;" type="button" class="btn btn-primary" >
                                    @elseif( $value->status_color==12 )
                                    <button style="width:190px;" type="button" class="btn btn btn-black" >
                                    @endif
                                    {{ $value->name }}
                                    </button>
                                    </b>
                                    @endif
   
                                  @endforeach
                                
                            @endforeach 
                          
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          อุปกรณ์ที่ติดมาด้วย : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                         {{ $equipment_follow }}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ราคาประเมิน : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$price}}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <!-- <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          ราคาจริง : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$after_price}}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;"> -->

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่รับเข้าระบบ : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$date_in_repair}}</b>
                        </div>
                      </div><hr style="margin-top:5px;margin-bottom:5px;">

                      <div class="row" >
                        <div class="form-group">
                          <b for="" class="control-label col-md-3"style="text-align:right">
                          วันที่คืนสินค้า : </b>
                          <b for="" class="control-label col-md-9" style="color:gray">
                          {{$date_out_repair}}</b>
                        </div>
                      </div>


            </div>
            <!-- /.box-body -->
          </div>
        </div>
          <!-- /.box -->
        
    </div>
</div>
    </div>
        
    <div class="col-md-2">
    </div>
    @endif
                        
</div>




<br><br>

@include('form/footer-font')