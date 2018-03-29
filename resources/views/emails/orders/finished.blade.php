@component('mail::message')
# {{ $content['title'] }}

Hi {{ $content['customer'] }},, your order has finish

Hospital			   : {{ $content['hospital'] }}<br />
Department			 : {{ $content['department'] }}<br />
Program			     : {{ $content['program'] }}<br />


Thank you, for your trust, I hope you are satisfied with our service
<br />

@component('mail::button', ['url' => 'dev.myworldhealth.com/mytransaction'])
Please Check Status
@endcomponent

Thanks,<br>
Admin, <br />MyWorldhealth.com
@endcomponent
