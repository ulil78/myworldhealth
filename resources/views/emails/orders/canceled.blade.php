@component('mail::message')
# {{ $content['title'] }}

Hi {{ $content['customer'] }},, your order has finish

Hospital			   : {{ $content['hospital'] }}<br />
Department			 : {{ $content['department'] }}<br />
Program			     : {{ $content['program'] }}<br />



I apologise for the inconvenience, at this time we can not process your order
<br />

@component('mail::button', ['url' => 'dev.myworldhealth.com/mytransaction'])
Please Check Status
@endcomponent

Thanks,<br>
Admin, <br />MyWorldhealth.com
@endcomponent
