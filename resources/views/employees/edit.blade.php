@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="{{route('users.index')}}" class="goBackBtn btn">{{ __('crud.goBack') }}</a>
                <h6>{{ $employee->name }}</h6>
                <div class="model-info">
                    <p>{{ __('user.name') }}: {{ $employee->name }}</p>
                    <p>{{ __('user.email') }}: {{ $employee->email }}</p>
                    <p>{{ __('user.phone') }}: {{ $employee->phone_number }}</p>
                    <p>{{ __('user.speciality.label') }}: {{ $employee->speciality }}</p>
                    <p>{{ __('user.signature') }}:</p>
                    <div class="signature-img d-flex justify-content-center align-items-center">
                        <img src="{{ asset('/storage/signatures/' . $employee->signature) }}"
                            alt="{{ __('user.signature') }}">
                    </div>
                </div>
                @if($employee->id === Auth::user()->id)
                    <div class="card">
                        <div class="card-header">
                            {{ __('crud.change') }} {{ __('user.language') }}
                        </div>
                        <div class="card-body">
                            <div class="form-container">
                                <form action="{{ route('language.change') }}" method="POST">
                                    @csrf
                                    <div class="flags-form form-group">
                                        <select name="locale" class="form-control col-9" onchange="this.form.submit()">
                                            <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                                                English
                                            </option>
                                            <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>
                                                Español
                                            </option>
                                        </select>
                                        <img src="{{asset('/img/flag-' . app()->getLocale() . '.png')}}" class="flag col-2" alt="">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ __('crud.edit') }} {{ __('crud.info') }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $employee->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-container">
                                <div class="form-group">
                                    <label for="name">{{ __('user.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $employee->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('user.password') }}</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">{{ __('crud.repeat') }}
                                        {{ __('user.password') }}:</label>
                                    <input type="password" class="form-control" id="password_confirmation"
                                        name="password_confirmation" value="">
                                </div>
                                @if (Auth::user()->speciality == 'admin')
                                    <div class="form-group">
                                        <label for="speciality">{{ __('user.speciality.label') }}</label>
                                        <select name="speciality" id="specialty" class="form-control">
                                            <option value="none">{{ __('crud.select') }}</option>
                                            @foreach ($enum as $speciality)
                                                <option value="{{ $speciality }}">
                                                    {{ __('user.speciality.' . $speciality) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="signature">{{ __('user.signature') }}</label>
                                    <input type="file" class="form-control-file" id="signature" name="signature">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">{{ __('user.phone') }}</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ $employee->phone_number }}">
                                </div>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="submit" class="btn btn-primary">{{ __('crud.update') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
