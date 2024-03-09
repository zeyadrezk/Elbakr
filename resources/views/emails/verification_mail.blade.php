@component('mail::message')
# Welcome to Elbakr
Dear {{$email}},
Please find your OTP for Verifing your email</strong>

<strong>{{$otp}}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
