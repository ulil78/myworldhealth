@component('mail::message')
# {{ $content['title'] }}

Hi Partner, we already made payment for :


Invoice Number			    : {{ $content['invoice_number'] }}<br />
Program			            : {{ $content['program'] }}<br />
Total Amount            : $ {{ $content['total_amount']}}<br />


@component('mail::button', ['url' => 'dev.myworldhealth.com/merchant/login'])
Pleade Check Partner Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealth.com
@endcomponent
