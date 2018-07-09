<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* Loading Spinner */
        .spinner{margin:0;width:70px;height:18px;margin:-35px 0 0 -9px;position:absolute;top:50%;left:50%;text-align:center}.spinner > div{width:18px;height:18px;background-color:#333;border-radius:100%;display:inline-block;-webkit-animation:bouncedelay 1.4s infinite ease-in-out;animation:bouncedelay 1.4s infinite ease-in-out;-webkit-animation-fill-mode:both;animation-fill-mode:both}.spinner .bounce1{-webkit-animation-delay:-.32s;animation-delay:-.32s}.spinner .bounce2{-webkit-animation-delay:-.16s;animation-delay:-.16s}@-webkit-keyframes bouncedelay{0%,80%,100%{-webkit-transform:scale(0.0)}40%{-webkit-transform:scale(1.0)}}@keyframes bouncedelay{0%,80%,100%{transform:scale(0.0);-webkit-transform:scale(0.0)}40%{transform:scale(1.0);-webkit-transform:scale(1.0)}}
    </style>
    <meta charset="UTF-8">
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<title> Header fixed | Monarch </title>
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- //////////////////nav-bar notter/////////////////////// -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- //////////////////////////////////////////// -->
<!-- Favicons -->

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/icons/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/icons/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/icons/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/icons/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/icons/favicon.png">



    <!-- HELPERS -->

<link rel="stylesheet" type="text/css" href="assets/helpers/animate.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/backgrounds.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/boilerplate.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/border-radius.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/grid.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/page-transitions.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/spacing.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/typography.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/utils.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/colors.css">

<!-- ELEMENTS -->

<link rel="stylesheet" type="text/css" href="assets/elements/badges.css">
<link rel="stylesheet" type="text/css" href="assets/elements/buttons.css">
<link rel="stylesheet" type="text/css" href="assets/elements/content-box.css">
<link rel="stylesheet" type="text/css" href="assets/elements/dashboard-box.css">
<link rel="stylesheet" type="text/css" href="assets/elements/forms.css">
<link rel="stylesheet" type="text/css" href="assets/elements/images.css">
<link rel="stylesheet" type="text/css" href="assets/elements/info-box.css">
<link rel="stylesheet" type="text/css" href="assets/elements/invoice.css">
<link rel="stylesheet" type="text/css" href="assets/elements/loading-indicators.css">
<link rel="stylesheet" type="text/css" href="assets/elements/menus.css">
<link rel="stylesheet" type="text/css" href="assets/elements/panel-box.css">
<link rel="stylesheet" type="text/css" href="assets/elements/response-messages.css">
<link rel="stylesheet" type="text/css" href="assets/elements/responsive-tables.css">
<link rel="stylesheet" type="text/css" href="assets/elements/ribbon.css">
<link rel="stylesheet" type="text/css" href="assets/elements/social-box.css">
<link rel="stylesheet" type="text/css" href="assets/elements/tables.css">
<link rel="stylesheet" type="text/css" href="assets/elements/tile-box.css">
<link rel="stylesheet" type="text/css" href="assets/elements/timeline.css">

<!-- FRONTEND ELEMENTS -->

<link rel="stylesheet" type="text/css" href="assets/frontend-elements/blog.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/cta-box.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/feature-box.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/footer.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/hero-box.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/icon-box.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/portfolio-navigation.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/pricing-table.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/sliders.css">
<link rel="stylesheet" type="text/css" href="assets/frontend-elements/testimonial-box.css">

<!-- ICONS -->

<link rel="stylesheet" type="text/css" href="assets/icons/fontawesome/fontawesome.css">
<link rel="stylesheet" type="text/css" href="assets/icons/linecons/linecons.css">
<link rel="stylesheet" type="text/css" href="assets/icons/spinnericon/spinnericon.css">

<!-- WIDGETS -->

<link rel="stylesheet" type="text/css" href="assets/widgets/accordion-ui/accordion.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/calendar/calendar.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/carousel/carousel.css">

<link rel="stylesheet" type="text/css" href="assets/widgets/charts/justgage/justgage.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/charts/morris/morris.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/charts/piegage/piegage.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/charts/xcharts/xcharts.css">

<link rel="stylesheet" type="text/css" href="assets/widgets/chosen/chosen.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/colorpicker/colorpicker.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/datatable/datatable.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/datepicker/datepicker.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/datepicker-ui/datepicker.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/daterangepicker/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/dialog/dialog.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/dropdown/dropdown.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/dropzone/dropzone.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/file-input/fileinput.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/input-switch/inputswitch.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/input-switch/inputswitch-alt.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/ionrangeslider/ionrangeslider.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/jcrop/jcrop.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/jgrowl-notifications/jgrowl.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/loading-bar/loadingbar.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/maps/vector-maps/vectormaps.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/markdown/markdown.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/modal/modal.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/multi-select/multiselect.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/multi-upload/fileupload.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/nestable/nestable.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/noty-notifications/noty.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/popover/popover.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/pretty-photo/prettyphoto.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/progressbar/progressbar.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/range-slider/rangeslider.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/slider-ui/slider.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/tabs-ui/tabs.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/theme-switcher/themeswitcher.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/timepicker/timepicker.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/tocify/tocify.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/tooltip/tooltip.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/touchspin/touchspin.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/uniform/uniform.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/wizard/wizard.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/xeditable/xeditable.css">

<!-- FRONTEND WIDGETS -->

<link rel="stylesheet" type="text/css" href="assets/widgets/layerslider/layerslider.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/owlcarousel/owlcarousel.css">
<link rel="stylesheet" type="text/css" href="assets/widgets/fullpage/fullpage.css">

<!-- SNIPPETS -->

<link rel="stylesheet" type="text/css" href="assets/snippets/chat.css">
<link rel="stylesheet" type="text/css" href="assets/snippets/files-box.css">
<link rel="stylesheet" type="text/css" href="assets/snippets/login-box.css">
<link rel="stylesheet" type="text/css" href="assets/snippets/notification-box.css">
<link rel="stylesheet" type="text/css" href="assets/snippets/progress-box.css">
<link rel="stylesheet" type="text/css" href="assets/snippets/todo.css">
<link rel="stylesheet" type="text/css" href="assets/snippets/user-profile.css">
<link rel="stylesheet" type="text/css" href="assets/snippets/mobile-navigation.css">

<!-- Frontend theme -->

<link rel="stylesheet" type="text/css" href="assets/themes/frontend/layout.css">
<link rel="stylesheet" type="text/css" href="assets/themes/frontend/color-schemes/default.css">

<!-- Components theme -->

<link rel="stylesheet" type="text/css" href="assets/themes/components/default.css">
<link rel="stylesheet" type="text/css" href="assets/themes/components/border-radius.css">

<!-- Frontend responsive -->

<link rel="stylesheet" type="text/css" href="assets/helpers/responsive-elements.css">
<link rel="stylesheet" type="text/css" href="assets/helpers/frontend-responsive.css">

    <!-- JS Core -->

    <script type="text/javascript" src="assets/js-core/jquery-core.js"></script>
    <script type="text/javascript" src="assets/js-core/jquery-ui-core.js"></script>
    <script type="text/javascript" src="assets/js-core/jquery-ui-widget.js"></script>
    <script type="text/javascript" src="assets/js-core/jquery-ui-mouse.js"></script>
    <script type="text/javascript" src="assets/js-core/jquery-ui-position.js"></script>
    <script type="text/javascript" src="assets/js-core/transition.js"></script>
    <script type="text/javascript" src="assets/js-core/modernizr.js"></script>
    <script type="text/javascript" src="assets/js-core/jquery-cookie.js"></script>



<script type="text/javascript">
    $(window).load(function(){
        setTimeout(function() {
            $('#loading').fadeOut( 400, "linear" );
        }, 300);
    });
</script>

</head>

<body class="main-header-fixed">

<!-- Layerslider -->

<script type="text/javascript" src="assets/js-core/greensock.js"></script>
<script type="text/javascript" src="assets/widgets/layerslider/layerslider.js"></script>
<script type="text/javascript" src="assets/widgets/layerslider/layerslider-transitions.js"></script>
<script type="text/javascript" src="assets/widgets/layerslider/layerslider-demo.js"></script>
<!-- /////////////////////////////////////////////////////// -->
<script src="  https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

<!-- Data tables -->

<!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/datatable/datatable.css">-->
<script type="text/javascript" src="assets/widgets/datatable/datatable.js"></script>
<script type="text/javascript" src="assets/widgets/datatable/datatable-bootstrap.js"></script>
<script type="text/javascript" src="assets/widgets/datatable/datatable-tabletools.js"></script>


<script type="text/javascript">

    /* Datatables basic */

    $(document).ready(function() {
        $('#datatable-example').dataTable();
    });


    /* Datatable row highlight */

    $(document).ready(function() {
        var table = $('#datatable-row-highlight').DataTable();

        $('#datatable-row-highlight tbody').on( 'click', 'tr', function () {
            $(this).toggleClass('tr-selected');
        } );
    });



    $(document).ready(function() {
        $('.dataTables_filter input').attr("placeholder", "Search...");
    });

</script>
<!-- ///////////////////////////////////////////////////////// -->
<div id="loading">
    <div class="spinner">
        <div class="bounce1"></div>
        <div class="bounce2"></div>
        <div class="bounce3"></div>
    </div>
</div>
<div id="theme-options">
    <a href="#" class="btn btn-primary theme-switcher tooltip-button" data-placement="left" title="Color schemes and layout options">
        <i class="glyph-icon icon-linecons-cog icon-spin"></i>
    </a>
    <div id="theme-switcher-wrapper">
        <div class="scroll-switcher">
            <h5 class="header">Layout options</h5>
            <ul class="reset-ul">
                <li>
                    <label for="boxed-layout">Boxed layout</label>
                    <input type="checkbox" data-toggletarget="boxed-layout" id="boxed-layout" class="input-switch-alt">
                </li>
            </ul>
            <div class="boxed-bg-wrapper hide">
                <h5 class="header">
                    Boxed Page Background
                    <a class="set-background-style" data-header-bg="" title="Remove all styles" href="#">Clear</a>
                </h5>
                <div class="theme-color-wrapper clearfix">
                    <h5>Patterns</h5>
                    <a class="tooltip-button set-background-style pattern-bg-3" data-header-bg="pattern-bg-3" title="Pattern 3" href="#">Pattern 3</a>
                    <a class="tooltip-button set-background-style pattern-bg-4" data-header-bg="pattern-bg-4" title="Pattern 4" href="#">Pattern 4</a>
                    <a class="tooltip-button set-background-style pattern-bg-5" data-header-bg="pattern-bg-5" title="Pattern 5" href="#">Pattern 5</a>
                    <a class="tooltip-button set-background-style pattern-bg-6" data-header-bg="pattern-bg-6" title="Pattern 6" href="#">Pattern 6</a>
                    <a class="tooltip-button set-background-style pattern-bg-7" data-header-bg="pattern-bg-7" title="Pattern 7" href="#">Pattern 7</a>
                    <a class="tooltip-button set-background-style pattern-bg-8" data-header-bg="pattern-bg-8" title="Pattern 8" href="#">Pattern 8</a>
                    <a class="tooltip-button set-background-style pattern-bg-9" data-header-bg="pattern-bg-9" title="Pattern 9" href="#">Pattern 9</a>
                    <a class="tooltip-button set-background-style pattern-bg-10" data-header-bg="pattern-bg-10" title="Pattern 10" href="#">Pattern 10</a>

                    <div class="clear"></div>

                    <h5 class="mrg15T">Solids &amp;Images</h5>
                    <a class="tooltip-button set-background-style bg-black" data-header-bg="bg-black" title="Black" href="#">Black</a>
                    <a class="tooltip-button set-background-style bg-gray mrg10R" data-header-bg="bg-gray" title="Gray" href="#">Gray</a>

                    <a class="tooltip-button set-background-style full-bg-1" data-header-bg="full-bg-1 fixed-bg" title="Image 1" href="#">Image 1</a>
                    <a class="tooltip-button set-background-style full-bg-2" data-header-bg="full-bg-2 fixed-bg" title="Image 2" href="#">Image 2</a>
                    <a class="tooltip-button set-background-style full-bg-3" data-header-bg="full-bg-3 fixed-bg" title="Image 3" href="#">Image 3</a>
                    <a class="tooltip-button set-background-style full-bg-4" data-header-bg="full-bg-4 fixed-bg" title="Image 4" href="#">Image 4</a>
                    <a class="tooltip-button set-background-style full-bg-5" data-header-bg="full-bg-5 fixed-bg" title="Image 5" href="#">Image 5</a>
                    <a class="tooltip-button set-background-style full-bg-6" data-header-bg="full-bg-6 fixed-bg" title="Image 6" href="#">Image 6</a>

                </div>
            </div>
            <h5 class="header">
                Top Menu Style
                <a class="set-topmenu-style" data-header-bg="" title="Remove all styles" href="#">Clear</a>
            </h5>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-topmenu-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="#">Primary</a>
                <a class="tooltip-button set-topmenu-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="#">Green</a>
                <a class="tooltip-button set-topmenu-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="#">Red</a>
                <a class="tooltip-button set-topmenu-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="#">Blue</a>
                <a class="tooltip-button set-topmenu-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="#">Warning</a>
                <a class="tooltip-button set-topmenu-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="#">Purple</a>
                <a class="tooltip-button set-topmenu-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="#">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-topmenu-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="#">Gradient 1</a>
                <a class="tooltip-button set-topmenu-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="#">Gradient 2</a>
                <a class="tooltip-button set-topmenu-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="#">Gradient 3</a>
                <a class="tooltip-button set-topmenu-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="#">Gradient 4</a>
                <a class="tooltip-button set-topmenu-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="#">Gradient 5</a>
                <a class="tooltip-button set-topmenu-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="#">Gradient 6</a>
                <a class="tooltip-button set-topmenu-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="#">Gradient 7</a>
                <a class="tooltip-button set-topmenu-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="#">Gradient 8</a>
            </div>
            <h5 class="header">
                Header Style
                <a class="set-header-style" data-header-bg="bg-header" title="Remove all styles" href="#">Clear</a>
            </h5>
            <div class="theme-color-wrapper clearfix">
                <h5>Solids</h5>
                <a class="tooltip-button set-header-style bg-primary" data-header-bg="bg-primary font-inverse" title="Primary" href="#">Primary</a>
                <a class="tooltip-button set-header-style bg-green" data-header-bg="bg-green font-inverse" title="Green" href="#">Green</a>
                <a class="tooltip-button set-header-style bg-red" data-header-bg="bg-red font-inverse" title="Red" href="#">Red</a>
                <a class="tooltip-button set-header-style bg-blue" data-header-bg="bg-blue font-inverse" title="Blue" href="#">Blue</a>
                <a class="tooltip-button set-header-style bg-warning" data-header-bg="bg-warning font-inverse" title="Warning" href="#">Warning</a>
                <a class="tooltip-button set-header-style bg-purple" data-header-bg="bg-purple font-inverse" title="Purple" href="#">Purple</a>
                <a class="tooltip-button set-header-style bg-black" data-header-bg="bg-black font-inverse" title="Black" href="#">Black</a>

                <div class="clear"></div>

                <h5 class="mrg15T">Gradients</h5>
                <a class="tooltip-button set-header-style bg-gradient-1" data-header-bg="bg-gradient-1 font-inverse" title="Gradient 1" href="#">Gradient 1</a>
                <a class="tooltip-button set-header-style bg-gradient-2" data-header-bg="bg-gradient-2 font-inverse" title="Gradient 2" href="#">Gradient 2</a>
                <a class="tooltip-button set-header-style bg-gradient-3" data-header-bg="bg-gradient-3 font-inverse" title="Gradient 3" href="#">Gradient 3</a>
                <a class="tooltip-button set-header-style bg-gradient-4" data-header-bg="bg-gradient-4 font-inverse" title="Gradient 4" href="#">Gradient 4</a>
                <a class="tooltip-button set-header-style bg-gradient-5" data-header-bg="bg-gradient-5 font-inverse" title="Gradient 5" href="#">Gradient 5</a>
                <a class="tooltip-button set-header-style bg-gradient-6" data-header-bg="bg-gradient-6 font-inverse" title="Gradient 6" href="#">Gradient 6</a>
                <a class="tooltip-button set-header-style bg-gradient-7" data-header-bg="bg-gradient-7 font-inverse" title="Gradient 7" href="#">Gradient 7</a>
                <a class="tooltip-button set-header-style bg-gradient-8" data-header-bg="bg-gradient-8 font-inverse" title="Gradient 8" href="#">Gradient 8</a>
            </div>
        </div>
    </div>
</div>
<div id="page-wrapper">
<div class="top-bar bg-topbar">
    <div class="container">
        <div class="float-left">
            <!-- <a href="#" class="btn btn-sm bg-facebook tooltip-button" data-placement="bottom" title="Follow us on Facebook">
                <i class="glyph-icon icon-facebook"></i>
            </a>
            <a href="#" class="btn btn-sm bg-google tooltip-button" data-placement="bottom" title="Follow us on Google+">
                <i class="glyph-icon icon-google-plus"></i>
            </a>
            <a href="#" class="btn btn-sm bg-twitter tooltip-button" data-placement="bottom" title="Follow us on Twitter">
                <i class="glyph-icon icon-twitter"></i>
            </a> -->
            <?php 
            $s_type='' ; $s_type=session('s_type','default');
            $s_name='' ; $s_name=session('s_name','default'); 
            ?>
        @if($s_type!='4' ) 
            <button title="MonarchUI Admin Template" class="btn btn-sm float-left btn-alt btn-hover mrg10R btn-default">
                <span data-toggle="modal" data-target="#modal-login">เข้าสู่ระบบ</span>
                <i class="glyph-icon icon-lock"></i>
            </button>
            
            <button title="MonarchUI Admin Template" class="btn btn-sm float-left btn-alt btn-hover mrg10R btn-default">
            <a href="{{ url('/font-register')  }}" title="Homepage example 1"><span>สมัครสมาชิก</span></a>
                <i class="glyph-icon icon-user"></i>
            </button>
        @elseif($s_type=='4' )
    
            <div id="header-nav-left">
                <!-- <div class="user-account-btn dropdown"> -->
                    <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
                        <img width="28" src="assets/image-resources/gravatar.jpg" alt="Profile image">
                        <span><?php echo $s_name; ?></span>
                        <i class="glyph-icon icon-angle-down"></i>
                    </a>
                    <div class="dropdown-menu float-left">
                        <div class="box-sm">
                            <div class="login-box clearfix">
                                <div class="user-img">
                                    <a href="#" title="" class="change-img">Change photo</a>
                                    <img src="assets/image-resources/gravatar.jpg" alt="">
                                </div>
                                <!-- <div class="user-info">
                                    <span>
                                        <?php echo $s_name; ?>
                                        <i>UX/UI developer</i>
                                    </span>
                                    <a href="#" title="Edit profile">Edit profile</a>
                                    <a href="#" title="View notifications">View notifications</a>
                                </div> -->
                            </div>
                            <div class="divider"></div>
                            <ul class="reset-ul mrg5B">
                                <li>
                                    <a href="{{ url('/font-profile') }}">
                                        <i class="glyph-icon float-right icon-caret-right"></i>
                                        โปรไฟล์
                                    </a>
                                </li>
                            </ul>
                            <div class="pad5A button-pane button-pane-alt text-center">
                                <!-- <a href="#" class="btn display-block font-normal btn-danger">
                                    <i class="glyph-icon icon-power-off"></i>
                                    ออกจากระบบ
                                </a> -->
                                <?= Form::open(array('url' => '/logout')) ?>
                                    <button type="submit" class="btn display-block font-normal btn-danger" style="width:312px;"><i class="glyph-icon icon-power-off"></i>&nbsp; ออกจากระบบ</button>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
            <!-- #header-nav-left -->
        @endif 
        </div>
                
        <div class="float-right user-account-btn dropdown">
            <a href="#" class="btn btn-top btn-sm" title="Give us a call">
              <h2>  <i class="glyph-icon icon-home"></i>
               Mac Service</h2>
            </a>
            
<ul class="header-nav collapse">

        </div>
        
    </div><!-- .container -->
</div><!-- .top-bar -->

       <!-- //////////////////////////////modal-login//////////////////////////////// -->
        <div class="modal fade " id="modal-login">
        
        <div class="modal-dialog ">
        <div class="modal-content ">
          <div class="modal-header " >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title text-center"><b style="color:gray;">เข้าสู่ระบบ</b> </h3>
          </div>  
          {!!  Form::open(['url'=>'/test_login','class'=>'form','files'=>true])   !!}
                      <div id="login-form" class="content-box">
                <div class="content-box-wrapper pad20A">
                @if (session()->has('status_login_fail'))
                    <!-- ///check fail is show modal/// -->
                        <script type="text/javascript">
                            $(window).on('load',function(){
                                $('#modal-login').modal('show');
                            });
                        </script>
                    <!-- ///end//// -->
                    <!-- ///message fail/// -->
                        <div class="alert alert-danger">
                            <div class="bg-red alert-icon">
                                <i class="glyph-icon icon-times"></i>
                            </div>
                            <div class="alert-content">
                                <h4 class="alert-title"><h3> การเข้าสู่ระบบล้มเหลว</h3></h4>
                                <p>กรุณาตรวจสอบชื่อผู้ใช้ และ รหัสผ่าน ให้ถูกต้อง</p>
                            </div>
                        </div>
                    <!-- ///end//// -->
                    @endif
                    <br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">ชื่อผู้ใช้:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-user"></i>
                            </span>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="ชื่อผู้ใช้..." name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">รหัสผ่าน:</label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon addon-inside bg-white font-primary">
                                <i class="glyph-icon icon-unlock-alt"></i>
                            </span>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="รหัสผ่าน..." name="password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="checkbox-primary col-md-6" style="height: 20px;">

                        </div>
                        <div class="text-right col-md-6">
                            <a href="{{ url('/font-register')  }}">สมัครสมาชิก</a>

                        </div>
                    </div>
                </div>
                <div class="button-pane">
                <button type="submit" class="btn btn-block btn-primary">เข้าสู่ระบบ</button>
                <!-- <a href="{{ url('/dashboard')  }}" class="btn btn-block btn-primary">เข้าสู่ระบบ</a> -->
                    <!-- <button type="submit" class="btn btn-block btn-primary">ล็อกอิน</button> -->
                </div>
            </div>      
            {!! Form::close() !!}
        </div>
      </div>          
    </div>
    <!-- //////////////////////////////End modal-login//////////////////////////////// -->

<!-- ///////////////////////////////////////////////////////// -->

<!-- <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Page 1-1</a></li>
            <li><a href="#">Page 1-2</a></li>
            <li><a href="#">Page 1-3</a></li>
          </ul>
        </li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav> -->




<!-- /////////////////////////////////////////////////////////////// -->

<div class="main-header bg-header wow fadeInDown">
    <div class="container">
    <?php $s_logo=session('s_logo','default'); ?>
    <img src="{{ asset('image/'.$s_logo) }}" style="width:70px;height:70px;"alt="">
    <!-- <a href="index.html" class="header-logo" title="Monarch - Create perfect presentation websites"></a> -->
    <!-- .header-logo -->
    <div class="right-header-btn">
        <div id="mobile-navigation">
            <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target=".header-nav"><span></span></button>
        </div>
    </div><!-- .header-logo -->
    <ul class="header-nav collapse">
        <li>
            <a href="#" title="Homepages" style="font-size:20px;">
                หน้าแรก 
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ url('/')  }}" title="Homepage example 1"><span>หน้าแรก</span></a></li>
            </ul>
        </li>
        <li>
            <a href="#" title="Homepages" style="font-size:20px;">
            ซ่อมสินค้า
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ url('/font-repair')  }}" title="Homepage example 1"><span>ตรวจสอบการซ่อมสินค้า</span></a></li>
            </ul>
        </li>
        <li>
            <a href="#" title="Homepages" style="font-size:20px;">
            ฟีดข่าว
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ url('/font-new')  }}" title="Homepage example 1"><span>ฟีดข่าว</span></a></li>
            </ul>
        </li>
        <!-- <li>
            <a href="#" title="Homepages" style="font-size:20px;">
            โปรโมชั่น
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <li><a href="" title="Homepage example 1"><span>โปรโมชั่น</span></a></li>
            </ul>
        </li> -->

        <li>
            <a href="#" title="Homepages" style="font-size:20px;">
            เกี่ยวกับเรา
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ url('/font-contact')  }}" title="Homepage example 1"><span>เกี่ยวกับเรา</span></a></li>
            </ul>
        </li>

        <li>
            <a href="#" title="Homepages"style="font-size:20px;">
            การรับประกัน
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ url('/font-guarantee')  }}" title="Homepage example 1"><span>การรับประกัน</span></a></li>
            </ul>
        </li>

                <li>
            <a href="#" title="Homepages" style="font-size:20px;">
            กระทู้ถามตอบ
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <!-- <li><a href="{{ url('/font-board-question')  }}" title="Homepage example 1"><span>กระทู้ถามตอบ</span></a></li> -->
                {!!  Form::open(['url'=>'/font-board-question','class'=>'form','id'=>'myForm','files'=>true])   !!}
                    <!-- <li onclick="myForm.submit();">Click me</li> -->
                    <input type="hidden" name="chk_get" value="all">
                    <li class="active" onclick="myForm.submit();"><a ><i class="fa fa-circle-o"></i>กระทู้ถาม-ตอบ</a></li>
                {!! Form::close() !!}
            </ul>
        </li>

        <li>
            <a href="#" title="Homepages" style="font-size:20px;">
            <!-- โปรไฟล์
                <i class="glyph-icon icon-angle-down"></i>
            </a> -->
            <ul>
                <li><a href="{{ url('/font-profile')  }}" title="Homepage example 1"><span>โปรไฟล์</span></a></li>
            </ul>
        </li>

        <!-- <li>
            <a href="#" title="Homepages">
            สมัครสมาชิก
                <i class="glyph-icon icon-angle-down"></i>
            </a>
            <ul>
                <li><a href="{{ url('/font-register')  }}" title="Homepage example 1"><span>สมัครสมาชิก</span></a></li>
            </ul>
        </li> -->
        <li>
            <a href="#" title="Homepages">
            <!-- ออกจากระบบ
                <i class="glyph-icon icon-angle-down"></i> -->
            </a>
            <ul>
                <!-- <li><a href="{{ url('/logout')  }}" title="Homepage example 1"><span>ออกจากระบบ</span></a></li> -->
                <?= Form::open(array('url' => '/logout')) ?>
                <button type="submit" class="btn"><i class="fa  fa-plus-circle fa-lg"></i>&nbsp; ออกจากระบบ</button>
                {!! Form::close() !!}
            </ul>
        </li>

    </ul><!-- .header-nav -->
</div><!-- .container -->
</div><!-- .main-header -->

