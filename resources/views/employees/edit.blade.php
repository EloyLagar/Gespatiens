@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="" class="goBackBtn btn">{{ __('crud.goBack') }}</a>
                <h6>{{ $employee->name }}</h6>
                <div class="model-info">
                    <p>{{ __('user.name') }}: {{ $employee->name }}</p>
                    <p>{{ __('user.email') }}: {{ $employee->email }}</p>
                    <p>{{ __('user.phone') }}: {{ $employee->phone_number }}</p>
                    <p>{{ __('user.speciality.label') }}: {{ $employee->speciality }}</p>
                    <p>{{ __('user.signature') }}:</p>
                    <img src="{{asset('/storage/signatures/'. $employee->signature)}}" alt="{{__('user.signature')}}">
                </div>
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
                                    <label for="email">{{ __('user.email') }}</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $employee->email }}">
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
                                <div class="form-group">
                                    <label for="speciality">{{ __('user.speciality.label') }}</label>
                                    <select name="speciality" id="specialty" class="form-control">
                                        <option value="">{{__('crud.select')}}</option>
                                        @foreach ($enum as $speciality)
                                            <option value="{{ $speciality }}">
                                                {{ __('user.speciality.' . $speciality) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
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
