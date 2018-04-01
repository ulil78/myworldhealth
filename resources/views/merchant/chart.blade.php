<div class="col-md-6">
  <!-- Begin: life time stats -->
  <!-- BEGIN PORTLET-->
  <div class="portlet light bordered">
      <div class="portlet-title tabbable-line">
          <div class="caption">
              <i class="icon-globe font-red"></i>
              <span class="caption-subject font-red bold uppercase">Revenue</span>
          </div>
          <ul class="nav nav-tabs">
              <li class="active">
                  <a href="#portlet_ecommerce_tab_1" data-toggle="tab"> Amounts </a>
              </li>
              <li>
                  <a href="#portlet_ecommerce_tab_2" id="statistics_orders_tab" data-toggle="tab"> Orders </a>
              </li>
          </ul>
      </div>
      <div class="portlet-body">
          <div class="tab-content">
              <div class="tab-pane active" id="portlet_ecommerce_tab_1">
                  <div id="statistics_1" class="chart"> </div>
              </div>
              <div class="tab-pane" id="portlet_ecommerce_tab_2">
                  <div id="statistics_2" class="chart"> </div>
              </div>
          </div>
          <div class="well margin-top-20">
              <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                      <span class="label label-success"> Revenue: </span>
                      <h3>Rp.{{ number_format($rev_ytd->total_amount, 0 , ',' , '.' ) }}</h3>
                  </div>

                  <div class="col-md-3 col-sm-3 col-xs-6 text-stat">
                      <span class="label label-warning"> Orders: </span>
                      <h3>{{$order_ytd->invoice_count}}</h3>

                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- End: life time stats -->
</div>
