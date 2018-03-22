<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="/admin">
                <img src="{{asset('images/mwh_logo.png')}}" alt="logo" class="logo-default"/> </a>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

        <!-- BEGIN PAGE TOP -->
        <div class="page-top">

            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            @php
                              $new_order_count = \App\Invoice::where('status', 'paid')->count();
                            @endphp
                            <span class="badge badge-default"> {{$new_order_count}} </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">{{$new_order_count}} pending</span> notifications</h3>
                                <a href="{{url('admin/invoices')}}">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                  @php
                                    $new_orders = \App\Invoice::whereIn('status', ['paid', 'new'])->take(10)->get();
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
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    @php
                      $count_message = \App\Message::where('status', 'unread')->count();
                    @endphp
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default"> {{$count_message}} </span>
                        </a>

                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">{{$count_message }} New</span> Messages</h3>
                                <a href="{{url('admin/messages')}}">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                  @php
                                    $messages = \App\Message::where('status', 'unread')->take(10)->get();
                                  @endphp
                                  @foreach ($messages as $message)
                                    <li>
                                        <a href="{{url('admin/messages/' .$message->id)}}">
                                            <span class="subject">
                                                <span class="from"> {{$message->name}} </span>
                                                <span class="time">{{Carbon\Carbon::parse($message->created_at)->format('m/d/Y m:s')}}</span>
                                            </span>
                                            <span class="message"> {{$message->subject}} </span>
                                        </a>
                                    </li>
                                  @endforeach


                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{asset('assets/layouts/layout2/img/avatar3_small.jpg')}}" />
                            <span class="username username-hide-on-mobile"> {{Auth::guard('admin')->user()->name}} </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="page_user_profile_1.html">
                                    <i class="icon-user"></i> My Profile </a>
                            </li>

                            <li>
                              <a href="{{url('admin/logout')}}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  <i class="icon-key"></i> Logout
                              </a>

                              <form id="logout-form" action="{{url('admin/logout')}}" method="POST" style="display: none;">
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
        <!-- END PAGE TOP -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
