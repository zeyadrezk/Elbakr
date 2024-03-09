@component('mail::message')
# Welcome to Seraj Academy
Dear {{$email}},
Please find your OTP for logging into <strong>Seraj</strong>

<strong>{{$otp}}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
