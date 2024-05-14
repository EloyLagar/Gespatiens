<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gespatiens - Log in</title>

    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container align-items-center">
        <form class="form-signin" action="{{route ('login')}}" method="post">
            @csrf
            <h1><span id="ges">ges</span><span id="patiens">patiens</span></h1>
            <h2></h2>
            <div class="form-group">
                <label for="inputEmail">Email address:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required
                    autofocus>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button class="btn btn-md btn-block" type="submit">Log in</button>
            </div>
        </form>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap (Opcional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
