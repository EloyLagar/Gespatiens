<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 3cm 1.5cm 3cm 3cm;
            font-family: sans-serif
        }

        .header {
            position: fixed;
            top: -3cm;
            text-align: center;
            width: 100%;
        }

        .imgHeader {
            display: inline-block;
            width: 18cm;
            height: auto;
        }

        .content {
            margin-top: 5cm;
        }

        table {
            width: 100%;
            text-align: center;
        }

        .bloque {
            width: 2cm;
            height: 1cm;
            margin: 2cm;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: sans-serif;
            color: #951516;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .user-info{
            border: 1px solid black;
            margin: 0;
            padding: 0 0.2cm;
            font-size: 14px;
            line-height: 30px
        }

        span {
            font-weight: 700;
        }

        .span-info {
            font-family: sans-serif !important;
            font-weight: 500;
        }

        .report-title{
            text-align: center;
            color: black;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="imgHeader">
            <img src="{{ asset('img/headerImg.png') }}" alt="Gespatiens" style="width: 100%; height: auto;">
        </div>
    </div>
    <div class="container">
        <h1 class="report-title">INFORME FINAL DE PROGRAMA</h1>
        <div class="user-info">
            <span>{{__('patients.surnameAndName')}}:</span> <span style="font-weight: 400">{{}}</span><br>
            <span>Nombre: </span><span style="font-weight: 400">Pedro</span><span
                style="float:right; margin.left: auto; margin-right: 4cm">Nombre: <span
                    style="font-weight: 400">Pedro</span></span><br>
            <span>Nombre: </span><span style="font-weight: 400">Pedro</span><br>
            <span>Nombre: </span><span style="font-weight: 400">Pedro</span><br>
            <span>Nombre: </span><span style="font-weight: 400">Pedro</span><span
                style="float:right; margin.left: auto; margin-right: 4cm">Nombre: <span
                    style="font-weight: 400">Pedro</span></span><br>
            <span>Nombre: </span><span style="font-weight: 400">Pedro</span><br>
            <span>Nombre: </span><span style="font-weight: 400">Pedro</span><br>
        </div>
        <p>Versión <b>1</b></p>
        <p>' . $texto . '</p>

        <!-- Resto del contenido -->
    </div>
</body>

</html>
