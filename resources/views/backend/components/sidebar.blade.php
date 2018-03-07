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
            <li class="nav-item start active open">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-basket"></i>
                    <span class="title">Booking Order</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Booking New</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Paid</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Confirm</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Finish</span>
                      </a>
                  </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-trophy"></i>
                    <span class="title">Promo</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Banners</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Sliders</span>
                      </a>
                  </li>
                    <li class="nav-item  ">
                        <a href="table_static_basic.html" class="nav-link ">
                            <span class="title">Voucher</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="table_static_responsive.html" class="nav-link ">
                            <span class="title">Discount</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-puzzle"></i>
                    <span class="title">Setup</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Catgories</span>
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
                        <a href="ui_general.html" class="nav-link ">
                            <span class="title">Location</span>
                        </a>
                        <ul class="sub-menu">
                          <li class="nav-item  ">
                              <a href="ui_buttons.html" class="nav-link ">
                              <a href="{{url('admin/countries')}}" class="nav-link ">
                                  <span class="title">Countries</span>
                              </a>
                          </li>
                          <li class="nav-item  ">
                              <a href="ui_buttons.html" class="nav-link ">
                              <a href="{{url('admin/cities')}}" class="nav-link ">
                                  <span class="title">Cities</span>
                              </a>
                          </li>
                        </ul>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{url('admin/preferences')}}" class="nav-link ">
                            <span class="title">Preferences</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-list"></i>
                    <span class="title">Hospital</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="ui_colors.html" class="nav-link ">
                            <span class="title">Hospitals</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_buttons.html" class="nav-link ">
                            <span class="title">Hospital Images</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_general.html" class="nav-link ">
                            <span class="title">Hospital Departments</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_buttons.html" class="nav-link ">
                            <span class="title">Hospital Programs</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="ui_buttons.html" class="nav-link ">
                            <span class="title">Additional Services</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-doc"></i>
                    <span class="title">Patient</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Patient Data</span>
                      </a>
                  </li>
                  <li class="nav-item  ">
                      <a href="table_static_basic.html" class="nav-link ">
                          <span class="title">Patient Transaction</span>
                      </a>
                  </li>
                </ul>
            </li>




            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-social-dribbble"></i>
                    <span class="title">General</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="page_general_about.html" class="nav-link ">
                            <i class="icon-info"></i>
                            <span class="title">About</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="page_general_contact.html" class="nav-link ">
                            <i class="icon-call-end"></i>
                            <span class="title">Contact</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-notebook"></i>
                            <span class="title">How it Work</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-notebook"></i>
                            <span class="title">Our Teams</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-notebook"></i>
                            <span class="title">Quality Standard</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-notebook"></i>
                            <span class="title">Why Booking</span>
                            <span class="arrow"></span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Tools</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="page_cookie_consent_1.html" class="nav-link ">
                            <span class="title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="page_cookie_consent_2.html" class="nav-link ">
                            <span class="title">Admin</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="page_system_coming_soon.html" class="nav-link " target="_blank">
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
