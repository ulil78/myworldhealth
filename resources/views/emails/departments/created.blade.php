@component('mail::message')
# {{ $content['title'] }}

Hi Admin, your partner has created a new Department


Hospital Name			   : {{ $content['hospital_name'] }}<br />
Department Name		 : {{ $content['department'] }}<br />


@component('mail::button', ['url' => 'dev.myworldhealth.com/admin/login'])
Please Check Admin Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealth.com
@endcomponent
