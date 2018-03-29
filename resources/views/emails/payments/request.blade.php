@component('mail::message')
# {{ $content['title'] }}

Hi Billing, any Payment Request for :<br />


Invoice Number			    : #{{ $content['invoice_id'] }}<br />
Hospital		            : {{ $content['hospital'] }}<br />
Department		          : {{ $content['department'] }}<br />
Program			            : {{ $content['program'] }}<br />
Total Amount            : $ {{ money_format('%.2n', $content['total_amount'])}}<br />


@component('mail::button', ['url' => 'dev.myworldhealth.com/admin/login'])
Please Check Admin Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealth.com
@endcomponent
