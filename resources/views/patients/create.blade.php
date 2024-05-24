@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex flex-column ">
        <div class="container col-md-6">
            <a href="{{ route('patients.index') }}" class="goBackBtn btn"><span class="material-symbols-outlined">
                    arrow_back
                </span></a>
            <div class="card mb-2">
                <div class="card-header">
                    {{ __('crud.create') }} {{ __('patients.singular') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf
                        <div class="form-container">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('patients.name') }}</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="surname">{{ __('patients.surname') }}</label>
                                    <input type="text" class="form-control" id="surname" name="surname" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="dni">{{ __('patients.dni') }}</label>
                                    <input type="text" class="form-control" id="dni" name="dni" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="visit_code">{{ __('patients.visit_code') }}</label>
                                    <input type="text" class="form-control" id="visit_code" name="visit_code" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="birth_date">{{ __('patients.birth_date') }}</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number">{{ __('patients.phone_number') }}</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">{{ __('patients.address') }}</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="belongings">{{ __('patients.belongings') }}</label>
                                <input type="text" class="form-control" id="belongings" name="belongings" required>
                            </div>
                            <div class="form-group">
                                <label for="abuse_substances">{{ __('patients.abuse_substances') }}</label>
                                <input type="text" class="form-control" id="abuse_substances" name="abuse_substances">
                            </div>
                            <div class="form-group">
                                <label for="extra_info">{{ __('patients.extra_info') }}</label>
                                <textarea class="form-control" id="extra_info" name="extra_info" rows="2" required></textarea>
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.create') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
