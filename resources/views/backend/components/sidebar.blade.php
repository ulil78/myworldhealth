<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            @if(Request::is('admin'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="{{url('admin')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    @if(Request::is('admin'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow open"></span>
                </a>
            </li>
            @if(Request::is('admin/*-categories') || Request::is('admin/countries') || Request::is('cities')|| Request::is('admin/preferences'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">Setup</span>
                    @if(Request::is('admin/*-categories') || Request::is('admin/countries') || Request::is('cities')|| Request::is('admin/preferences'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="#" class="nav-link ">
                            <i class="icon-list"></i>
                            <span class="title">Categories</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                          <li class="nav-item  ">
                              <a href="{{url('admin/first-categories')}}" class="nav-link ">
                                  <span class="title">First Catgeories</span>
                              </a>
                          </li>
                          <li class="nav-item  ">
                              <a href="{{url('admin/second-categories')}}" class="nav-link ">
                                  <span class="title">Second Catgeories</span>
                              </a>
                          </li>
                          <li class="nav-item  ">
                              <a href="{{url('admin/thrid-categories')}}" class="nav-link ">
                                  <span class="title">Thrid Catgeories</span>
                              </a>
                          </li>
                          <li class="nav-item  ">
                              <a href="{{url('admin/fourth-categories')}}" class="nav-link ">
                                  <span class="title">Fourth Catgeories</span>
                              </a>
                          </li>
                        </ul>

                    </li>

                    <li class="nav-item  ">
                        <a href="#" class="nav-link ">
                            <i class="icon-compass"></i>
                            <span class="title">Location</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                          <li class="nav-item">
                              <a href="{{url('admin/countries')}}" class="nav-link ">
                                  <span class="title">Countries</span>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{url('admin/cities')}}" class="nav-link ">
                                  <span class="title">Cities</span>
                              </a>
                          </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/preferences')}}" class="nav-link ">
                            <i class="icon-key"></i>
                            <span class="title">Preferences</span>
                        </a>
                    </li>

                </ul>
            </li>

            @if(Request::is('admin/booking*'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">Booking Order</span>
                    @if(Request::is('admin/booking*'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item  ">
                      <a href="#" class="nav-link ">
                          <i class="icon-control-play"></i>
                          <span class="title">Booking New</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="#" class="nav-link ">
                          <i class="icon-credit-card"></i>
                          <span class="title">Paid</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="#" class="nav-link ">
                          <i class="icon-bell"></i>
                          <span class="title">Confirm</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="#" class="nav-link ">
                          <i class="icon-check"></i>
                          <span class="title">Finish</span>
                      </a>
                  </li>
                </ul>
            </li>

            @if(Request::is('admin/banners') || Request::is('admin/sliders') || Request::is('admin/vaouchers') || Request::is('admin/discounts'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-trophy"></i>
                    <span class="title">Promo</span>
                    @if(Request::is('admin/banners') || Request::is('admin/sliders') || Request::is('admin/vaouchers') || Request::is('admin/discounts'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item  ">
                      <a href="#" class="nav-link ">
                          <i class="icon-picture"></i>
                          <span class="title">Banners</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="#" class="nav-link ">
                          <i class="icon-film"></i>
                          <span class="title">Sliders</span>
                      </a>
                  </li>
                    <li class="nav-item  ">
                        <a href="#" class="nav-link ">
                            <i class="icon-envelope"></i>
                            <span class="title">Voucher</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="#" class="nav-link ">
                            <i class="icon-star"></i>
                            <span class="title">Discount</span>
                        </a>
                    </li>
                </ul>
            </li>



            @if(Request::is('admin/hospital*') || Request::is('admin/additional-services'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Hospital</span>
                    @if(Request::is('admin/hospital*') || Request::is('admin/additional-services'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{url('admin/hospitals')}}" class="nav-link ">
                            <i class="icon-drawer"></i>
                            <span class="title">Hospitals</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/hospital-departments')}}" class="nav-link ">
                            <i class="icon-book-open"></i>
                            <span class="title">Hospital Departments</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/hospital-programs')}}" class="nav-link ">
                            <i class="icon-briefcase"></i>
                            <span class="title">Hospital Programs</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/additional-services')}}" class="nav-link ">
                            <i class="icon-folder"></i>
                            <span class="title">Additional Services</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(Request::is('admin/patients*'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-doc"></i>
                    <span class="title">Patient</span>
                    @if(Request::is('admin/patients*'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item  ">
                      <a href="{{url('admin/patients')}}" class="nav-link ">
                          <i class="icon-doc"></i>
                          <span class="title">Patient Data</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="{{url('patient-transactions')}}" class="nav-link ">
                          <i class="icon-equalizer"></i>
                          <span class="title">Patient Transaction</span>
                      </a>
                  </li>
                </ul>
            </li>




            @if(Request::is('admin/abouts') || Request::is('admin/how-it-works') || Request::is('admin/our-teams') || Request::is('admin/quality*') || Request::is('admin/why-bookins') || Request::is('admin/faqs'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">General</span>
                    @if(Request::is('admin/abouts') || Request::is('admin/how-it-works') || Request::is('admin/our-teams') || Request::is('admin/quality*') || Request::is('admin/why-bookins') || Request::is('admin/faqs'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{url('admin/abouts/1/edit')}}" class="nav-link ">
                            <i class="icon-info"></i>
                            <span class="title">About</span>
                        </a>
                    </li>

                    <li class="nav-item  ">
                        <a href="{{url('admin/how-it-works/1/edit')}}" class="nav-link nav-toggle">
                            <i class="icon-info"></i>
                            <span class="title">How it Work</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/our-teams')}}" class="nav-link nav-toggle">
                            <i class="icon-present"></i>
                            <span class="title">Our Teams</span>

                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/quality-standards/1/edit')}}" class="nav-link nav-toggle">
                            <i class="icon-info"></i>
                            <span class="title">Quality Standard</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/why-bookings/1/edit')}}" class="nav-link nav-toggle">
                            <i class="icon-question"></i>
                            <span class="title">Why Booking</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/faqs')}}" class="nav-link nav-toggle">
                            <i class="icon-question"></i>
                            <span class="title">FAQ</span>
                        </a>
                    </li>
                </ul>
            </li>
            @if(Request::is('admin/users') || Request::is('admin/admins') || Request::is('admin/merchants'))
                <li class="nav-item start active open">
            @else
                <li class="nav-item">
            @endif
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Tools</span>
                    @if(Request::is('admin/users') || Request::is('admin/admins') || Request::is('admin/merchants'))
                      <span class="selected"></span>
                    @endif
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{url('admin/users')}}" class="nav-link ">
                            <i class="icon-user"></i>
                            <span class="title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/admins')}}" class="nav-link ">
                            <i class="icon-energy"></i>
                            <span class="title">Admin</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/merchants')}}" class="nav-link " target="_blank">
                            <i class="icon-user-follow"></i>
                            <span class="title">Merchant</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
