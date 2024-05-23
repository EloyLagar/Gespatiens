@component('mail::message')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
<span style=" color: var(--ges-color);
font-size: 24px;
font-family: 'Outfit', sans-serif;
font-optical-sizing: auto;">ges</span><span style=" color: var(--accent-color);
font-size: 24px;
font-family: 'Outfit', sans-serif;
font-optical-sizing: auto;">patiens</span>

# Comunidad Terapéutica Los Vientos

Buenas, ahora eres empleado de nuestra comunidad, por favor cree su propia contraseña para poder acceder.

@component('mail::button', ['url' => route('verify', ['token' => $token])])
Ir a Crear contraseña
@endcomponent

<p style="font-size: 0.7rem">Si no esperabas este mail, ponte en contacto con nosotros lo antes posible,</p>
El equipo de{{ config('app.name') }}

@endcomponent
