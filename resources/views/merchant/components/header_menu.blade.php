<!-- BEGIN HEADER MENU -->
<div class="page-header-menu" {{-- style="background:#3399ff!important;" --}}>
    <div class="container">
        <!-- BEGIN HEADER SEARCH BOX -->
        <form class="search-form" action="page_general_search.html" method="GET">
            <div class="input-group" {{-- style="background:#fff!important;" --}}>
                <input type="text" class="form-control"
                        {{-- style="background:#fff!important;color: #cecece!important;" --}} placeholder="Search" name="query">
                <span class="input-group-btn">
                    <a href="javascript:;" class="btn submit">
                        <i class="icon-magnifier"></i>
                    </a>
                </span>
            </div>
        </form>
        <!-- END HEADER SEARCH BOX -->
        <!-- BEGIN MEGA MENU -->
        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
        <div class="hor-menu  ">
            <ul class="nav navbar-nav">
                <li class="menu-dropdown classic-menu-dropdown active">
                    <a href="javascript:;"> Program Setup
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li class=" active">
                            <a href="{{url('merchant/hospitals')}}" class="nav-link  active">
                                <i class="icon-drawer"></i> Hospital

                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/hospital-departments')}}" class="nav-link  ">
                                <i class="icon-book-open"></i> Hospital Department </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/hospital-programs')}}" class="nav-link  ">
                                <i class="icon-briefcase"></i> Hospital Program

                            </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/additional-services')}}" class="nav-link  ">
                                <i class="icon-briefcase"></i> Additional Service
                            </a>
                        </li>

                        <li class="dropdown-submenu ">
                            <a href="javascript:;" class="nav-link nav-toggle ">
                                <i class="icon-list"></i> Transfer Arrival
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class=" ">
                                    <a href="{{url('merchant/transfer-arrival-types')}}" class="nav-link ">Type</a>
                                </li>
                                <li class=" ">
                                    <a href="{{url('merchant/transfer-arrivals')}}" class="nav-link ">Arrival</a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown-submenu ">
                            <a href="javascript:;" class="nav-link nav-toggle ">
                                <i class="icon-list"></i> Transfer Return
                                <span class="arrow"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class=" ">
                                    <a href="{{url('merchant/transfer-return-types')}}" class="nav-link ">Type</a>
                                </li>
                                <li class=" ">
                                    <a href="{{url('merchant/transfer-returns')}}" class="nav-link ">Return</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </li>

                <li class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> Booking Order
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li class=" ">
                            <a href="{{url('merchant/invices')}}" class="nav-link  "> <i class="icon-control-play"></i> Order New </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/invoice/prosess')}}" class="nav-link  "> <i class="icon-loop"></i> Running Process </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/invoice/finish')}}" class="nav-link  "> <i class="icon-check"></i> Finish </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/incoice/cancel')}}" class="nav-link  "> <i class="icon-magnifier-remove"></i> Cancel </a>
                        </li>

                    </ul>
                </li>
                <li class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> Order Payable
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li class=" ">
                            <a href="{{url('merchant/payables')}}" class="nav-link  "> <i class="icon-wallet"></i> Payable Available </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/payable/request')}}" class="nav-link  "> <i class="icon-credit-card"></i>Request Payable </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/payable/paid')}}" class="nav-link  "> <i class="icon-diamond"></i>Paid </a>
                        </li>


                    </ul>
                </li>
                <li class="menu-dropdown classic-menu-dropdown ">
                    <a href="javascript:;"> Report
                        <span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                        <li class=" ">
                            <a href="{{url('merchant/report-transactions')}}" class="nav-link  "> <i class="icon-graph"></i>Report Transaction </a>
                        </li>
                        <li class=" ">
                            <a href="{{url('merchant/report-payables')}}" class="nav-link  "> <i class="icon-equalizer"></i>Report Payable </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- END MEGA MENU -->
    </div>
</div>
<!-- END HEADER MENU -->
