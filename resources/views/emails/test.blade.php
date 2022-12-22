@component('mail::message')


Hello: <strong>{{$data['name']}} </strong><br>
How are you?!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
