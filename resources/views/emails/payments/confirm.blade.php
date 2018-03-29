@component('mail::message')
# {{ $content['title'] }}

Hi Partner, we have received reservations for:<br />


Order Number			   : #{{ $content['order_number'] }}<br />
Program			         : {{ $content['program'] }}<br />


@component('mail::button', ['url' => 'dev.myworldhealth.com/merchant/login'])
Please Check Partner Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealth.com
@endcomponent
