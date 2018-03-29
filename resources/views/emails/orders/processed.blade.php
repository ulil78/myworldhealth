@component('mail::message')
# {{ $content['title'] }}

Hi {{ $content['customer'] }}, your order has processed

Hospital			   : {{ $content['hospital'] }}<br />
Department			 : {{ $content['department'] }}<br />
Program			     : {{ $content['program'] }}<br />


get ready for yourself, and come on schedule<br />

@component('mail::button', ['url' => 'dev.myworldhealth.com/mytransaction'])
Please Check Status
@endcomponent

Thanks,<br>
Admin, <br />MyWorldhealth.com
@endcomponent
