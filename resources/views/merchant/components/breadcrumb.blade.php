<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{url('merchant')}}">Home</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
      @if(Request::is('merchant/hospitals*'))
          <span>Hospital</span>
      @elseif(Request::is('merchant/hospital-departments*'))
          <span>Hospital Department</span>
      @elseif(Request::is('merchant/hospital-programs*'))
          <span>Hospital Program</span>
      @elseif(Request::is('merchant/additional-services'))
          <span>Additional Service</span>
      @elseif(Request::is('merchant/transfer-arrival*'))
          <span>Transfer Arrival</span>
      @elseif(Request::is('merchant/transfer-return*'))
          <span>Transfer Return</span>
      @elseif(Request::is('merchant/invoice*'))
          <span>Booking Order</span>
      @elseif(Request::is('merchant/payable*'))
          <span>Order Payable</span>
      @elseif(Request::is('merchant/report-transactions'))
          <span>Report Transaction</span>
      @elseif(Request::is('merchant/report-payables'))
          <span>Report Payable</span>
      @elseif(Request::is('merchant/myprofile'))
          <span>My Profile</span>
      @elseif(Request::is('merchant/change-password'))
          <span>Change Password</span>
      @else
          <span>Dashboard</span>
      @endif
    </li>
</ul>
