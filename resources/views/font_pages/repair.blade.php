
@include('form/header-font')

<div class="hero-box hero-box-smaller full-bg-9 font-inverse" data-top-bottom="background-position: 50% 0px;" data-bottom-top="background-position: 50% -600px;">
    <div class="container">
        <h1 class="hero-heading wow fadeInDown" data-wow-duration="0.6s">ตรวจสอบการเคลมสินค้า</h1>
        <p class="hero-text wow bounceInUp" data-wow-duration="0.9s" data-wow-delay="0.2s">Create features tours using the examples below.</p>
    </div>
    <div class="hero-overlay bg-black"></div>
</div>

<div class="container features-tour-box">
   <div class="row">
        <h1 class="text-center">ตรวจสอบสถานะการเคลมสินค้า</h1><br>
        <div class="col-md-4">
            <h3 style="text-align:right;">เลขบิลใบเคลมสินค้า</h3>
        </div>
        <?= Form::open(array('url' => '/font-repair-general-search')) ?>
        <div class="col-md-6">
            <div class="input-group input-group-lg">
                <!-- <span class="input-group-addon">@</span> -->
                <input type="text" class="form-control" placeholder="B0103062212..." name="bin_number" required>
            </div>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-success btn-lg">ตรวจสอบ</button>
        </div>
        {!! Form::close() !!}
    </div><br><br>
    @if($check==1)
    <div class="col-md-2">
    </div>
    <div class="col-md-8" >
    <div class="panel" >
    <div class="panel-body">
        <h3 class="title-hero">
            <!-- Input groups -->
        </h3>
    <div class="row">
                <div class="example-box-wrapper">
                <a class=text-center><b><h2>สถานะงานซ่อม</h2></b></a>
                    <form class="form-horizontal bordered-row">

                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right"><h4>เลขที่บิล <b>:</b>  </h4></label>
                                <label class="col-sm-8 control-label text-left"><h4>{{$bin_number}}</h4></label>                               
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="row">
                            @foreach($repairs as $repair)
                                <label class="col-sm-3 control-label text-right"><h4>งานซ่อม <b>:</b>  </h4></label>
                                <label class="col-sm-4 control-label text-left"><h4>
                                {{$repair->list_repair_name}}</h4></label>
                                <label class="col-sm-2 control-label text-right"><h4>สถานะการซ่อม <b>:</b>  </h4></label>
                                <label class="col-sm-3 control-label text-left"><h4>
                                {{$repair->status_list_repair}}</h4></label>       
                             @endforeach                       
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right"><h4>ชื่อลูกค้า <b>:</b>  </h4></label>
                                <label class="col-sm-8 control-label text-left"><h4>{{$name}}</h4></label>                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right"><h4>วันที่ซ่อม <b>:</b>  </h4></label>
                                <label class="col-sm-8 control-label text-left"><h4>042543543</h4></label>                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right"><h4>ราคา <b>:</b>  </h4></label>
                                <label class="col-sm-8 control-label text-left"><h4>{{$after_price}}</h4></label>                               
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label class="col-sm-3 control-label text-right"><h4>ช่างผู้ซ่อม <b>:</b>  </h4></label>
                                <label class="col-sm-8 control-label text-left"><h4>{{$persons_name}}</h4></label>                               
                            </div>
                        </div>

                    </form>
                </div>
        </div>


        
    </div>
</div>
    </div>
        
    <div class="col-md-2">
    </div>
    @endif
                        
</div>




<br><br>

@include('form/footer-font')