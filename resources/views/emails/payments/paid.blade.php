@component('mail::message')
# {{ $content['title'] }}

Hi Partner, we already made payment for :<br />


Invoice Number			    : #{{ $content['invoice_number'] }}<br />
Program			            : {{ $content['program'] }}<br />

Total Amount            : $ {{ money_format('%.2n', $content['total_amount'])}}<br />


@component('mail::button', ['url' => 'dev.myworldhealth.com/merchant/login'])
Please Check Partner Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealth.com
@endcomponent
