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
                <h6>
                    @if ($patient->number != null)
                        {{ $patient->number . ' - ' }}
                    @endif{{ $patient->full_name }}
                </h6>
                <div class="model-info">
                    <p>{{ __('patients.full_name') }}: {{ $patient->full_name }}</p>
                    <p>{{ __('patients.dni') }}: {{ $patient->dni }}</p>
                    <p>{{ __('patients.visit_code') }}: {{ $patient->visit_code }}</p>
                    <p>{{ __('patients.birth_date') }}: {{ $patient->birth_date }}</p>
                    <p>{{ __('patients.address') }}: {{ $patient->address }}</p>
                    <p>{{ __('patients.belongings') }}: {{ $patient->belongings }}</p>
                    <p>{{ __('patients.phone_number') }}: {{ $patient->phone_number }}</p>
                    <p>{{ __('patients.extra_info') }}: {{ $patient->extra_info }}</p>
                    <p>{{ __('patients.abuse_substances') }}: {{ $patient->abuse_substances }}</p>
                    <p>{{ __('patients.exit_date') }}: {{ $patient->exit_date }}</p>
                    <p>{{ __('patients.entry_date') }}: {{ $patient->entry_date }}</p>
                    <p>{{ __('patients.authorized_visitors') }}:</p>

                    <ul>
                        @forelse ($patient->visitors as $visitor)
                        @empty
                            <span clas="visitors">{{ __('patients.noAuthPersons') }}</span>
                        @endforelse
                    </ul>
                    <div class="patient-administration">
                        <a href="patients.adminAuth" class="btn">{{ __('patients.adminAuth') }}</a>
                        <a href="" class="btn">{{ __('patients.reports') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        {{ __('crud.edit') }} {{ __('crud.info') }}
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <form action="{{ route('patients.update', $patient) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-container">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name">{{ __('patients.name') }}</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $patient->name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="surname">{{ __('patients.surname') }}</label>
                                        <input type="text" class="form-control" id="surname" name="surname"
                                            value="{{ $patient->surname }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="dni">{{ __('patients.dni') }}</label>
                                        <input type="text" class="form-control" id="dni" name="dni"
                                            value="{{ $patient->dni }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="visit_code">{{ __('patients.visit_code') }}</label>
                                        <input type="text" class="form-control" id="visit_code" name="visit_code"
                                            value="{{ $patient->visit_code }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone_number">{{ __('patients.phone_number') }}</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $patient->phone_number }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="birth_date">{{ __('patients.birth_date') }}</label>
                                        <input type="date" class="form-control" id="birth_date" name="birth_date"
                                            value="{{ $patient->birth_date }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">{{ __('patients.address') }}</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $patient->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="belongings">{{ __('patients.belongings') }}</label>
                                    <textarea class="form-control" id="belongings" name="belongings">{{ $patient->belongings }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="extra_info">{{ __('patients.extra_info') }}</label>
                                    <textarea class="form-control" id="extra_info" name="extra_info">{{ $patient->extra_info }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="abuse_substances">{{ __('patients.abuse_substances') }}</label>
                                    <input type="text" class="form-control" id="abuse_substances" name="abuse_substances"
                                        value="{{ $patient->abuse_substances }}">
                                </div>
                                <button type="submit" class="btn float-right">{{ __('crud.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
