@component('mail::message')
# Welcome to Seraj Academy
Dear {{$email}},

<strong>{{$message}}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent