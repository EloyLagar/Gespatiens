@component('mail::message')
# Comunidad Terapéutica Los Vientos

Buenas, ahora eres empleado de nuestra comunidad, por favor cree su propia contraseña para poder acceder.

@component('mail::button', ['url' => route('verify', ['token' => $token])])
Ir a Crear contraseña
@endcomponent

<p style="font-size: 0.7rem">Si no esperabas este mail, ponte en contacto con nosotros lo antes posible,</p>
El equipo de{{ config('app.name') }}

@endcomponent
