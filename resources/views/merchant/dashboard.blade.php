@extends('merchant.layouts.master')

@section('main-content')
<div class="mt-content-body">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span class="caption-subject font-green-steel uppercase bold">Order Summary</span>
                        <span class="caption-helper hide">weekly stats...</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent btn-no-border blue-oleo btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Today</label>
                            <label class="btn btn-transparent btn-no-border blue-oleo btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Week</label>
                            <label class="btn btn-transparent btn-no-border blue-oleo btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Month</label>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row list-separated">
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="font-grey-mint font-sm"> Total Sales </div>
                            <div class="uppercase font-hg font-red-flamingo"> 13,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="font-grey-mint font-sm"> Revenue </div>
                            <div class="uppercase font-hg theme-font"> 4,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="font-grey-mint font-sm"> Expenses </div>
                            <div class="uppercase font-hg font-purple"> 11,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="font-grey-mint font-sm"> Growth </div>
                            <div class="uppercase font-hg font-blue-sharp"> 9,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </div>
                    </div>
                    <ul class="list-separated list-inline-xs hide">
                        <li>
                            <div class="font-grey-mint font-sm"> Total Sales </div>
                            <div class="uppercase font-hg font-red-flamingo"> 13,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </li>
                        <li> </li>
                        <li class="border">
                            <div class="font-grey-mint font-sm"> Revenue </div>
                            <div class="uppercase font-hg theme-font"> 4,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <div class="font-grey-mint font-sm"> Expenses </div>
                            <div class="uppercase font-hg font-purple"> 11,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <div class="font-grey-mint font-sm"> Growth </div>
                            <div class="uppercase font-hg font-blue-sharp"> 9,760
                                <span class="font-lg font-grey-mint">$</span>
                            </div>
                        </li>
                    </ul>
                    <div id="sales_statistics" class="portlet-body-morris-fit morris-chart" style="height: 267px"> </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6 col-sm-6">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span class="caption-subject font-green-steel bold uppercase">Member Activity</span>
                        <span class="caption-helper">weekly stats...</span>
                    </div>
                    <div class="actions">
                        <div class="btn-group btn-group-devided" data-toggle="buttons">
                            <label class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" class="toggle" id="option1">Today</label>
                            <label class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Week</label>
                            <label class="btn btn-transparent blue-oleo btn-no-border btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" class="toggle" id="option2">Month</label>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="row number-stats margin-bottom-30">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="stat-left">
                                <div class="stat-chart">
                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                    <div id="sparkline_bar"></div>
                                </div>
                                <div class="stat-number">
                                    <div class="title"> Total </div>
                                    <div class="number"> 2460 </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="stat-right">
                                <div class="stat-chart">
                                    <!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
                                    <div id="sparkline_bar2"></div>
                                </div>
                                <div class="stat-number">
                                    <div class="title"> New </div>
                                    <div class="number"> 719 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-scrollable table-scrollable-borderless">
                        <table class="table table-hover table-light">
                            <thead>
                                <tr class="uppercase">
                                    <th colspan="2"> MEMBER </th>
                                    <th> Earnings </th>
                                    <th> CASES </th>
                                    <th> CLOSED </th>
                                    <th> RATE </th>
                                </tr>
                            </thead>
                            <tr>
                                <td class="fit">
                                    <img class="user-pic rounded" src="../assets/pages/media/users/avatar4.jpg"> </td>
                                <td>
                                    <a href="javascript:;" class="primary-link">Brain</a>
                                </td>
                                <td> $345 </td>
                                <td> 45 </td>
                                <td> 124 </td>
                                <td>
                                    <span class="bold theme-font">80%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fit">
                                    <img class="user-pic rounded" src="../assets/pages/media/users/avatar5.jpg"> </td>
                                <td>
                                    <a href="javascript:;" class="primary-link">Nick</a>
                                </td>
                                <td> $560 </td>
                                <td> 12 </td>
                                <td> 24 </td>
                                <td>
                                    <span class="bold theme-font">67%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fit">
                                    <img class="user-pic rounded" src="../assets/pages/media/users/avatar6.jpg"> </td>
                                <td>
                                    <a href="javascript:;" class="primary-link">Tim</a>
                                </td>
                                <td> $1,345 </td>
                                <td> 450 </td>
                                <td> 46 </td>
                                <td>
                                    <span class="bold theme-font">98%</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="fit">
                                    <img class="user-pic rounded" src="../assets/pages/media/users/avatar7.jpg"> </td>
                                <td>
                                    <a href="javascript:;" class="primary-link">Tom</a>
                                </td>
                                <td> $645 </td>
                                <td> 50 </td>
                                <td> 89 </td>
                                <td>
                                    <span class="bold theme-font">58%</span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption caption-md">
                        <i class="icon-bar-chart font-dark hide"></i>
                        <span class="caption-subject font-green-steel bold uppercase">Customer Support</span>
                        <span class="caption-helper">45 pending</span>
                    </div>
                    <div class="inputs">
                        <div class="portlet-input input-inline input-small ">
                            <div class="input-icon right">
                                <i class="icon-magnifier"></i>
                                <input type="text" class="form-control form-control-solid input-circle" placeholder="search..."> </div>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="scroller" style="height: 338px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
                        <div class="general-item-list">
                            <div class="item">
                                <div class="item-head">
                                    <div class="item-details">
                                        <img class="item-pic rounded" src="../assets/pages/media/users/avatar4.jpg">
                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                        <span class="item-label">3 hrs ago</span>
                                    </div>
                                    <span class="item-status">
                                        <span class="badge badge-empty badge-success"></span> Open</span>
                                </div>
                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                            </div>
                            <div class="item">
                                <div class="item-head">
                                    <div class="item-details">
                                        <img class="item-pic rounded" src="../assets/pages/media/users/avatar3.jpg">
                                        <a href="" class="item-name primary-link">Mark</a>
                                        <span class="item-label">5 hrs ago</span>
                                    </div>
                                    <span class="item-status">
                                        <span class="badge badge-empty badge-warning"></span> Pending</span>
                                </div>
                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet. </div>
                            </div>
                            <div class="item">
                                <div class="item-head">
                                    <div class="item-details">
                                        <img class="item-pic rounded" src="../assets/pages/media/users/avatar6.jpg">
                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                        <span class="item-label">8 hrs ago</span>
                                    </div>
                                    <span class="item-status">
                                        <span class="badge badge-empty badge-primary"></span> Closed</span>
                                </div>
                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh. </div>
                            </div>
                            <div class="item">
                                <div class="item-head">
                                    <div class="item-details">
                                        <img class="item-pic rounded" src="../assets/pages/media/users/avatar7.jpg">
                                        <a href="" class="item-name primary-link">Nick Larson</a>
                                        <span class="item-label">12 hrs ago</span>
                                    </div>
                                    <span class="item-status">
                                        <span class="badge badge-empty badge-danger"></span> Pending</span>
                                </div>
                                <div class="item-body"> Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                            </div>
                            <div class="item">
                                <div class="item-head">
                                    <div class="item-details">
                                        <img class="item-pic rounded" src="../assets/pages/media/users/avatar9.jpg">
                                        <a href="" class="item-name primary-link">Richard Stone</a>
                                        <span class="item-label">2 days ago</span>
                                    </div>
                                    <span class="item-status">
                                        <span class="badge badge-empty badge-danger"></span> Open</span>
                                </div>
                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat. </div>
                            </div>
                            <div class="item">
                                <div class="item-head">
                                    <div class="item-details">
                                        <img class="item-pic rounded" src="../assets/pages/media/users/avatar8.jpg">
                                        <a href="" class="item-name primary-link">Dan</a>
                                        <span class="item-label">3 days ago</span>
                                    </div>
                                    <span class="item-status">
                                        <span class="badge badge-empty badge-warning"></span> Pending</span>
                                </div>
                                <div class="item-body"> Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                            </div>
                            <div class="item">
                                <div class="item-head">
                                    <div class="item-details">
                                        <img class="item-pic rounded" src="../assets/pages/media/users/avatar2.jpg">
                                        <a href="" class="item-name primary-link">Larry</a>
                                        <span class="item-label">4 hrs ago</span>
                                    </div>
                                    <span class="item-status">
                                        <span class="badge badge-empty badge-success"></span> Open</span>
                                </div>
                                <div class="item-body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <!-- BEGIN REGIONAL STATS PORTLET-->
            <div class="portlet light ">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-share font-dark hide"></i>
                        <span class="caption-subject font-green-steel bold uppercase">Regional Stats</span>
                    </div>
                    <div class="actions">
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-cloud-upload"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-wrench"></i>
                        </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" data-container="false" data-placement="bottom" href="javascript:;"> </a>
                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                            <i class="icon-trash"></i>
                        </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="region_statistics_loading">
                        <img src="../assets/global/img/loading.gif" alt="loading" /> </div>
                    <div id="region_statistics_content" class="display-none">
                        <div class="btn-toolbar margin-bottom-10">
                            <div class="btn-group btn-group-circle" data-toggle="buttons">
                                <a href="" class="btn grey-salsa btn-sm active"> Users </a>
                                <a href="" class="btn grey-salsa btn-sm"> Orders </a>
                            </div>
                            <div class="btn-group pull-right">
                                <a href="" class="btn btn-circle grey-salsa btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Select Region
                                    <span class="fa fa-angle-down"> </span>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="javascript:;" id="regional_stat_world"> World </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" id="regional_stat_usa"> USA </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" id="regional_stat_europe"> Europe </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" id="regional_stat_russia"> Russia </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;" id="regional_stat_germany"> Germany </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="vmap_world" class="vmaps display-none"> </div>
                        <div id="vmap_usa" class="vmaps display-none"> </div>
                        <div id="vmap_europe" class="vmaps display-none"> </div>
                        <div id="vmap_russia" class="vmaps display-none"> </div>
                        <div id="vmap_germany" class="vmaps display-none"> </div>
                    </div>
                </div>
            </div>
            <!-- END REGIONAL STATS PORTLET-->
        </div>
    </div>
</div>
@endsection
