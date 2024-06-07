<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="{{ asset('favicons/favicon-16x16.png') }}" type="image/png">

</head>

<body>
    <div class="col-12 d-flex flex-column align-items-center justify-content-center">
        <h1 id="title" class="typing-animation">
            <span class="ges">g</span><span class="ges">e</span><span class="ges">s</span><span
                class="patiens">p</span><span class="patiens">a</span><span class="patiens">t</span><span
                class="patiens">i</span><span class="patiens">e</span><span class="patiens">n</span><span
                class="patiens">s</span>
        </h1>
        <div class="container align-items-center">
            <div id="form-container">
                <form id="login-form" class="form-login" action="{{ route('login') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="inputEmail">{{ __('user.email') }}:</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required
                            autofocus>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">{{ __('user.password') }}:</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @isset($error)
                        <div class="alert">{{ __('error.' . $error) }}</div>
                        @endisset
                    </div>
                    <button class="btn flot-right ml-auto btn-block" type="submit">{{ __('crud.login') }}</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        //Animación para el titulo
        document.addEventListener("DOMContentLoaded", function() {
            const spans = document.querySelectorAll('#title span');
            let speed = 90;
            setTimeout(() => {
                spans.forEach((span, index) => {
                    setTimeout(() => {
                        span.classList.add('visible');
                    }, (index + 1) * speed);
                    speed -= 2;
                });
            }, 100);

        });
    </script>

</body>

</html>
