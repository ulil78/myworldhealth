@component('mail::message')
# {{ $content['title'] }}

Hi Admin, your partner has created a new Additional Service


Hospital Name			   : {{ $content['hospital_name'] }}<br />
Department Name		   : {{ $content['department'] }}<br />
Program  Name		     : {{ $content['program'] }}<br />
Serive Name		       : {{ $content['service'] }}<br />


@component('mail::button', ['url' => 'dev.myworldhealth.com/admin/login'])
Please Check Admin Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealth.com
@endcomponent
