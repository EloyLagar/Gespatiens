@extends('layouts.app')

@section('content')
<h1>{{ __('crud.create') }} {{ __('user.plural') }}</h1>
<div class="container justify-content-center align-items-center">
    <form action="{{ route('users.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="specialty">Speciality:</label>
            <select name="speciality" id="specialty" class="form-control">
                @foreach ($enum as $speciality)
                <option value="{{ $speciality }}">
                    {{ __('user.speciality.' . $speciality) }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="phone">Phone number:</label>
            <input type="text" name="phone_number" class="form-control" id="phone" value="{{ old('phone_number') }}">
        </div>
        <div class="errors">
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <div class="form-group">
            <button class="btn" type="submit">{{ __('create') }}</button>
        </div>
    </form>
</div>
@endsection
