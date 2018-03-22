@extends('backend/layouts/master')

@section('main-content')
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->

        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE HEADER-->

        <!-- BEGIN BOX ON TOP -->
        <div class="row">
          <!-- TRANSACTION -->
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-green-sharp">
                                <span data-counter="counterup" data-value="{{$total_transaction->total_amount}}">0</span>
                                <small class="font-green-sharp">$</small>
                            </h3>
                            <small>TOTAL TRANSACTION</small>
                        </div>
                        <div class="icon">
                            <i class="icon-pie-chart"></i>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END TRANSACTION -->

            <!-- FEEDBACK -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-red-haze">
                                <span data-counter="counterup" data-value="{{$total_merchant}}">0</span>
                            </h3>
                            <small>TOTAL PARTNER</small>
                        </div>
                        <div class="icon">
                            <i class="icon-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END FEEDBACK -->

            <!-- ORDER -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-blue-sharp">
                                <span data-counter="counterup" data-value="{{$total_order->count_order}}"></span>
                            </h3>
                            <small>TOTAL ORDERS</small>
                        </div>
                        <div class="icon">
                            <i class="icon-basket"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END ORDER -->

            <!-- USER -->
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="dashboard-stat2 ">
                    <div class="display">
                        <div class="number">
                            <h3 class="font-purple-soft">
                                <span data-counter="counterup" data-value="{{$total_user}}"></span>
                            </h3>
                            <small>TOTAL USERS</small>
                        </div>
                        <div class="icon">
                            <i class="icon-user"></i>
                        </div>
                    </div>

                </div>
            </div>
            <!-- END USER -->


        </div>
        <!-- END BOX ON TOP -->
        <div class="row">
          @include('backend/report-overview')
          @include('backend/chart')
        </div>



    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
@endsection
