@component('mail::message')
{{-- # {{ $content['title'] }} --}}

Hi Partner, we have received reservations for


{{-- Order Number			   : {{ $content['order_number'] }}<br />
Program			         : {{ $content['program'] }}<br /> --}}


@component('mail::button', ['url' => 'www.myworldhealth.com/merchant/login'])
Pleade Chek Partner Center
@endcomponent

Thanks,<br>
Admin, MyWorldhealt.com
@endcomponent
