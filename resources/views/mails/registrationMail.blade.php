@extends('mail::message')
@section('content')
<h4>{{__('register.welcome')}}</h4>

<span>{{__('register.link')}}</span>

@component('mail::button', ['url' => route('verify', ['token' => $token])])
{{__('register.login')}}
@endcomponent

{{__('register.thanks')}},<br>
{{ config('app.name') }}
<br><br>
{{__('register.error')}},<br>
@endsection

