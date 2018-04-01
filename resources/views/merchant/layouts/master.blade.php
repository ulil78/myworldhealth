<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>
           @if(isset($page_title))
               {{ $page_title }}
           @else
              Find Hospital & Treatment in the world | MyWorldHealth.Com
           @endif
       </title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('assets/layouts/layout3/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <!-- begin datatables -->
        <link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <!-- end datatables -->

        <link href="{{asset('css/custom.css')}}" rel="stylesheet" type="text/css" />

        <!-- date timepicker -->
        <link href="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- end date timepicker -->

        <link rel="shortcut icon" href="favicon.ico" />
        {{-- @include('merchant/components/style_custom') --}}

        <!-- begin tinymce -->
         <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
           <script type="text/javascript">

              tinymce.init({
                selector: "textarea",

                    // ===========================================
                    // INCLUDE THE PLUGIN
                    // ===========================================

                    plugins: [
                      "advlist autolink lists link image charmap print preview anchor",
                      "searchreplace visualblocks code fullscreen",
                      "insertdatetime media table contextmenu paste jbimages"
                    ],

                    // ===========================================
                    // PUT PLUGIN'S BUTTON on the toolbar
                    // ===========================================

                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",

                    // ===========================================
                    // SET RELATIVE_URLS to FALSE (This is required for images to display properly)
                    // ===========================================

                    relative_urls: false

                  });

          </script>
          <!-- /TinyMCE -->

    </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid">
        <div class="page-wrapper">
            <div class="page-wrapper-row">
                <div class="page-wrapper-top">
                    <!-- BEGIN HEADER -->
                    <div class="page-header">
                        <!-- BEGIN HEADER TOP -->
                        @include('merchant/components/header_top')
                        <!-- END HEADER TOP -->
                        <!-- BEGIN HEADER MENU -->
                        @include('merchant/components/header_menu')
                        <!-- END HEADER MENU -->
                    </div>
                    <!-- END HEADER -->
                </div>
            </div>
            <div class="page-wrapper-row full-height">
                <div class="page-wrapper-middle">
                    <!-- BEGIN CONTAINER -->
                    <div class="page-container">
                        <!-- BEGIN CONTENT -->
                        <div class="page-content-wrapper">
                            <!-- BEGIN CONTENT BODY -->
                            <!-- BEGIN PAGE HEAD-->
                            {{-- @include('merchant/components/page_head') --}}
                            <!-- END PAGE HEAD-->
                            <!-- BEGIN PAGE CONTENT BODY -->
                            <div class="page-content">
                                <div class="container">
                                    <!-- BEGIN PAGE BREADCRUMBS -->
                                    @include('merchant/components/breadcrumb')
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        @yield('main-content')
                                    </div>
                                    <!-- END PAGE CONTENT INNER -->
                                </div>
                            </div>
                            <!-- END PAGE CONTENT BODY -->
                            <!-- END CONTENT BODY -->
                        </div>
                        <!-- END CONTENT -->
                        <!-- BEGIN QUICK SIDEBAR -->
                        <a href="javascript:;" class="page-quick-sidebar-toggler">
                            <i class="icon-login"></i>
                        </a>
                        @include('merchant/components/quick_sidebar')
                        <!-- END QUICK SIDEBAR -->
                    </div>
                    <!-- END CONTAINER -->
                </div>
            </div>
            @include('merchant/components/footer')
        </div>





                <!-- BEGIN CORE PLUGINS -->

                <script src="{{asset('assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
                <!-- END CORE PLUGINS -->

                <!-- BEGIN PAGE LEVEL PLUGINS -->
                <script src="{{asset('assets/global/plugins/moment.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/morris/raphael-min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/counterup/jquery.waypoints.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/counterup/jquery.counterup.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amcharts/amcharts.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amcharts/serial.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amcharts/pie.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amcharts/radar.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/light.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/patterns.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amcharts/themes/chalk.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/ammap/ammap.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/ammap/maps/js/worldLow.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/amcharts/amstockcharts/amstock.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/flot/jquery.flot.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/flot/jquery.flot.resize.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js')}}" type="text/javascript"></script>
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                <script src="{{asset('assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
                <!-- END THEME GLOBAL SCRIPTS -->
                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                <script src="{{asset('assets/pages/scripts/dashboard.min.js')}}" type="text/javascript"></script>
                <!-- END PAGE LEVEL SCRIPTS -->
                <!-- BEGIN THEME LAYOUT SCRIPTS -->
                <script src="{{asset('assets/layouts/layout3/scripts/layout.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/layouts/layout3/scripts/demo.min.js')}}" type="text/javascript"></script>
                <script src="{{asset('assets/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
                <!-- END THEME LAYOUT SCRIPTS -->

                <!-- BEGIN PAGE LEVEL SCRIPTS  -->
                 <script src="{{asset('assets/pages/scripts/table-datatables-buttons.min.js')}}" type="text/javascript"></script>
                 <!-- END PAGE LEVEL SCRIPTS -->
                  <!-- BEGIN PAGE LEVEL PLUGINS -->
                 <script src="{{asset('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
                 <script src="{{asset('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
                 <script src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
                 <!-- datepicker -->
                 <script src="{{asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
                 <script src="{{asset('assets/global/plugins/fullcalendar/fullcalendar.min.js')}}" type="text/javascript"></script>
                 <!-- end datepicker -->

                 <script src="{{asset('js/chart.js')}}" type="text/javascript"></script>


                <script type="text/javascript">
                    //select Department
                    $("select[name='hospital_department_id']").change(function(){
                          var hospital_department_id = $(this).val();
                          var token = $("input[name='_token']").val();
                          $.ajax({
                              url: "<?php echo route('select-department') ?>",
                              method: 'POST',
                              data: {hospital_department_id:hospital_department_id, _token:token},
                              success: function(data) {
                                console.log('success');
                                $("select[name='hospital_program_id'").html('');
                                $("select[name='hospital_program_id'").html(data.options);
                              }
                          });
                      });

                      //select Department arrival
                      $("select[name='hospital_department_id_arrival']").change(function(){
                            var hospital_department_id_arrival = $(this).val();
                            var token = $("input[name='_token']").val();
                            $.ajax({
                                url: "<?php echo route('select-department-arrival') ?>",
                                method: 'POST',
                                data: {hospital_department_id_arrival:hospital_department_id_arrival, _token:token},
                                success: function(data) {
                                  console.log('success');
                                  $("select[name='hospital_program_id_arrival'").html('');
                                  $("select[name='hospital_program_id_arrival'").html(data.options);
                                }
                            });
                        });


                      //select Program Arrival
                      $("select[name='hospital_program_id_arrival']").change(function(){
                            var hospital_program_id_arrival = $(this).val();
                            var token = $("input[name='_token']").val();
                            $.ajax({
                                url: "<?php echo route('select-program-arrival') ?>",
                                method: 'POST',
                                data: {hospital_program_id_arrival:hospital_program_id_arrival, _token:token},
                                success: function(data) {
                                  console.log('success');
                                  $("select[name='transfer_arrival_id'").html('');
                                  $("select[name='transfer_arrival_id'").html(data.options);
                                }
                            });
                        });

                        //select Department return
                        $("select[name='hospital_department_id_return']").change(function(){
                              var hospital_department_id_return = $(this).val();
                              var token = $("input[name='_token']").val();
                              $.ajax({
                                  url: "<?php echo route('select-department-return') ?>",
                                  method: 'POST',
                                  data: {hospital_department_id_return:hospital_department_id_return, _token:token},
                                  success: function(data) {
                                    console.log('success');
                                    $("select[name='hospital_program_id_return'").html('');
                                    $("select[name='hospital_program_id_return'").html(data.options);
                                  }
                              });
                          });

                          //select Program Return
                          $("select[name='hospital_program_id_return']").change(function(){
                                var hospital_program_id_return = $(this).val();
                                var token = $("input[name='_token']").val();
                                $.ajax({
                                    url: "<?php echo route('select-program-return') ?>",
                                    method: 'POST',
                                    data: {hospital_program_id_return:hospital_program_id_return, _token:token},
                                    success: function(data) {
                                      console.log('success');
                                      $("select[name='transfer_return_id'").html('');
                                      $("select[name='transfer_return_id'").html(data.options);
                                    }
                                });
                            });

                  </script>
            </body>

        </html>
