@component('mail::message')
# {{__('register.welcome')}}

{{__('register.link')}}

@component('mail::button', ['url' => route('verify', ['token' => $token])])
{{__('register.login')}}
@endcomponent

{{__('register.thanks')}},<br>
{{ config('app.name') }}
<br><br>
{{__('register.error')}},<br>
@endcomponent

