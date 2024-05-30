<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gespatiens</title>

    {{-- Tipografias montserrat y outfit --}}
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #004F84;
            text-align: center;
            color: #fff;
            font-size: 16px
        }

        .error {
            font-family: "Outfit", sans-serif;
        }

        .number {
            font-size: 4em;
            color: #fff;
            font-optical-sizing: auto;
        }

        span{
            font-size: 2em;
            margin-top: 2em;
        }
        #ges {
            color: #33fdd4;
        }

        a{
            margin-top: 2em;
            padding: 0.2em 0.4em;
            border-radius: 2em;
            font-size: 2em;
            color: #fff;
            text-decoration: none;
            border: 4px solid #003f69;
        }

        a:hover{
            background-color: #003f69;
        }

        a:active{
            background-color: #013457
        }

    </style>
</head>

<body>
    <div class="error">
        <span id="ges">ges</span><span id="patiens">patiens</span><br>
        <span class="number">Upsss...  {{__('error.found')}}</span><br><br><br>
        <a href="/">{{__('crud.goBack')}}</a>
    </div>
</body>

</html>
