<!-- BEGIN HEADER TOP -->
<div class="page-header-top">
    <div class="container">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/merchant">
                <img src="{{asset('img/myworldhealth-logo-partner-blue-s.png')}}" width="170px" height="40px" alt="logo" class="logo-default"  style="background-color: #444d58;">
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler"></a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <i class="icon-bell"></i>
                        @php
                          $new_order_count = \App\Invoice::where('status', 'confirm')->count();
                        @endphp
                        <span class="badge badge-default">{{$new_order_count}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="external">
                          <h3>
                              <span class="bold">{{$new_order_count}} pending</span> notifications</h3>
                          <a href="{{url('merchant/invoices')}}">view all</a>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                              @php
                                $new_orders = \App\Invoice::where('status', 'confirm')->take(10)->get();
                              @endphp
                              @foreach($new_orders as $new_order)
                                  <li>
                                      <a href="javascript:;">
                                          <span class="time">{{$new_order->order_id}}</span>
                                          <span class="details">
                                              <span class="label label-sm label-icon label-success">
                                                  <i class="fa fa-plus"></i>
                                              </span> {{$new_order->status }} </span>
                                      </a>
                                  </li>
                                @endforeach

                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->

                <li class="dropdown dropdown-user dropdown-dark">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                        <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
                        <span class="username username-hide-mobile">{{Auth::guard('merchant')->user()->name}} </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">
                        <li>
                          @php
                            $merchant_id = \Auth::guard('merchant')->user()->id;
                          @endphp
                            <a href="{{url('merchant/myprofiles/' .$merchant_id. '/edit')}}">
                                <i class="icon-user"></i> My Profile </a>
                        </li>

                        <li>
                          <a href="{{url('merchant/logout')}}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              <i class="icon-key"></i> Logout
                          </a>

                          <form id="logout-form" action="{{url('merchant/logout')}}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
</div>
<!-- END HEADER TOP -->
