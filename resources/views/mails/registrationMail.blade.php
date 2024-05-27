@component('mail::message')
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
<div class="logo" style="padding: 0.4em 0; width: 100%; text-align:center;">
    <span style=" color: #00cba3;
    font-size: 32px;
    font-weight: 500;
    font-family: 'Outfit', sans-serif;
    font-optical-sizing: auto;">ges</span><span style=" color: #004F84;
    font-size: 32px;
    font-weight: 500;
    font-family: 'Outfit', sans-serif;
    font-optical-sizing: auto;">patiens</span>
</div>

# Comunidad Terapéutica Los Vientos

Buenas, ahora eres empleado de nuestra comunidad, por favor cree su propia contraseña para poder acceder.

@component('mail::button', ['url' => route('verify', ['token' => $token])])
Ir a Crear contraseña
@endcomponent

<p style="font-size: 0.7rem">Si no esperabas este mail, ponte en contacto con nosotros lo antes posible,</p>
El equipo de {{ config('app.name') }}

@endcomponent
