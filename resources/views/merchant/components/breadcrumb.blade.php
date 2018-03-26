<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="index.html">Home</a>
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
      @else
          <span>Dashboard</span>
      @endif
    </li>
</ul>
