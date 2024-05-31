@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex flex-column ">
        <a href="{{ route('patients.index') }}" class="goBackBtn btn mr-auto mt-2 float-left"><i
                class='bx bx-left-arrow-alt'></i></a>
        <div class="container col-lg-6">
            <div class="card mb-2">
                <div class="card-header">
                    {{ __('crud.create') }} {{ __('patients.singular') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('patients.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <ul>
                            @forelse ($errors as $error)
                                <li>{{ $error }}</li>
                            @empty
                        </ul>
                        @endforelse
                        <div class="form-container">
                            <div class="form-row">
                                <div class="form-group col-lg-4 col-md-4">
                                    <label for="name">{{ __('patients.name') }}:</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-4">
                                    <label for="surname">{{ __('patients.surname') }}:</label>
                                    <input type="text" class="form-control @error('surname') is-invalid @enderror"
                                        id="surname" name="surname" value="{{ old('surname') }}" required>
                                    @error('surname')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-4">
                                    <label for="dni">{{ __('patients.dni') }}:</label>
                                    <input type="text" class="form-control @error('dni') is-invalid @enderror"
                                        id="dni" name="dni" value="{{ old('dni') }}" required>
                                    @error('dni')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4 col-md-4">
                                    <label for="sip">{{ __('patients.sip') }}:</label>
                                    <input type="text" class="form-control @error('sip') is-invalid @enderror"
                                        id="sip" name="sip" value="{{ old('sip') }}">
                                    @error('sip')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-4">
                                    <label for="birth_date">{{ __('patients.birth_date') }}:</label>
                                    <input type="date" class="form-control @error('birth_date') is-invalid @enderror"
                                        id="birth_date" name="birth_date" max="{{ \Carbon\Carbon::now()->toDateString() }}"
                                        value="{{ old('birth_date') }}" required>
                                    @error('birth_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4 col-md-4">
                                    <label for="phone_number">{{ __('patients.phone_number') }}:</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                        id="phone_number" name="phone_number" value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6 col-md-6">
                                    <label for="address">{{ __('patients.address') }}:</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6 col-md-6">
                                    <label for="visit_code">{{ __('patients.visit_code') }}:</label>
                                    <input type="text" class="form-control @error('visit_code') is-invalid @enderror"
                                        id="visit_code" name="visit_code" value="{{ old('visit_code') }}" required>
                                    @error('visit_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="belongings">{{ __('patients.belongings') }}:</label>
                                <input type="text" class="form-control @error('belongings') is-invalid @enderror"
                                    id="belongings" name="belongings" value="{{ old('belongings') }}" required>
                                @error('belongings')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="abuse_substances">{{ __('patients.abuse_substances') }}:</label>
                                <input type="text" class="form-control @error('abuse_substances') is-invalid @enderror"
                                    id="abuse_substances" name="abuse_substances" value="{{ old('abuse_substances') }}">
                                @error('abuse_substances')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="extra_info">{{ __('patients.extra_info') }}:</label>
                                <textarea class="form-control @error('extra_info') is-invalid @enderror" id="extra_info" name="extra_info"
                                    rows="2" required>{{ old('extra_info') }}</textarea>
                                @error('extra_info')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.create') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
