@component('mail::message')
# {{ $content['title'] }}

Hi Admin, your partner has updated a Department


Hospital Name			   : {{ $content['hospital_name'] }}<br />
Deapartment Name		 : {{ $content['department'] }}<br />


@component('mail::button', ['url' => 'dev.myworldhealth.com/admin/login'])
Please Check Admin Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealth.com
@endcomponent
