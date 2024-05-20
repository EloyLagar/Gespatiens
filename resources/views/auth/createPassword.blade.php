<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gespatiens - Log in</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container align-items-center">
        <form class="form-signin" action="{{ route('updatePassword') }}" method="post">
            @csrf
            <h1><span id="ges">ges</span><span id="patiens">patiens</span></h1>
            <h6 class="form-info">{{__('crud.create_own')}} {{__('user.password')}} {{Auth::user()->name}}</h6>
            @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <span class="span-error">{{__('form.'. $error)}}</span><br>
                    @endforeach
            @endif
            <div class="form-group">
                <label for="password">{{__('user.password')}}:</label>
                <input type="password" name="password" id="password" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label for="password_confirmation">{{__('crud.repeat')}} {{__('user.password')}}:</label>
                <input type="password" class="form-control" required id="password_confirmation" name="password_confirmation" value="">
            </div>
            <div class="form-group d-flex justify-content-center">
                <button class="btn btn-md btn-block" type="submit">Save password</button>
            </div>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
