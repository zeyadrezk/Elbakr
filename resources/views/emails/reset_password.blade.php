@component('mail::message')
# Welcome to Elbakr
Dear {{$email}},
Please find your OTP for reset your email</strong>

<strong>{{$otp}}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
