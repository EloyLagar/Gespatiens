@extends('layouts.app')

@section('css')
    @parent
    <!-- Agrega el enlace al CSS de Bootstrap si aún no está presente -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection

@section('content')
    <div class="container">
        <form action="">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email">
            </div>
            <div class="form-group">
                <label for="specialty">Speciality:</label>
                <select name="specialty" id="specialty" class="form-control">
                    @foreach ($enum as $speciality)
                        <option value="{{ $speciality }}">
                            {{ __('user.speciality.' . $speciality) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="phone">Phone number:</label>
                <input type="text" class="form-control" id="phone">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">{{ __('create') }}</button>
            </div>
        </form>
    </div>
@endsection
