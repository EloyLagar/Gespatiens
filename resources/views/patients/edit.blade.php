@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="wrapper d-flex flex-column">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-1">
                <a href="{{ route('patients.index') }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
                <h6>
                    @if ($patient->number != null)
                    {{ $patient->number . ' - ' }}
                    @endif{{ $patient->full_name }}
                </h6>
                <div class="model-info">
                    <p><span class="heavy-span">{{ __('patients.full_name') }}</span>: <span class="info-span">{{
                            $patient->full_name }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.dni') }}</span>: <span class="info-span">{{
                            $patient->dni }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.visit_code') }}</span>: <span class="info-span">{{
                            $patient->visit_code }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.birth_date') }}</span>: <span class="info-span">{{
                            $patient->birth_date }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.address') }}</span>: <span class="info-span">{{
                            $patient->address }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.belongings') }}</span>: <span class="info-span">{{
                            $patient->belongings }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.phone_number') }}</span>: <span class="info-span">{{
                            $patient->phone_number }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.extra_info') }}</span>: <span class="info-span">{{
                            $patient->extra_info }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.abuse_substances') }}</span>: <span class="info-span">{{
                            $patient->abuse_substances }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.exit_date') }}</span>: <span class="info-span">{{
                            $patient->exit_date }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.entry_date') }}</span>: <span class="info-span">{{
                            $patient->entry_date }}</span></p>
                    <p><span class="heavy-span">{{ __('patients.authorized_visitors') }}</span>:</p>

                    <ul>
                        @forelse ($patient->visitors as $visitor)
                        @empty
                        <span clas="visitors info-span">{{ __('patients.noAuthPersons') }}</span>
                        <span clas="visitors info-span">{{ __('patients.noAuthPersons') }}</span>
                        <span clas="visitors info-span">{{ __('patients.noAuthPersons') }}</span>
                        <span clas="visitors info-span">{{ __('patients.noAuthPersons') }}</span>
                        <span clas="visitors info-span">{{ __('patients.noAuthPersons') }}</span>
                        @endforelse
                    </ul>
                </div>
                <div class="patient-administration">
                    <a href="patients.adminAuth" class="btn">{{ __('patients.adminAuth') }}</a>
                    <a href="{{ route('reports.final_report_form', $patient) }}" class="btn">{{
                        __('reports.final_report') }}</a>
                    <a href="{{ route('reports.mid_stay_report_form', $patient) }}" class="btn mb-3">{{
                        __('reports.mid_stay_report') }}</a>
                </div>
            </div>
            <div class="col-md-6 order-md-0 order-md-1">
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
                                    <textarea class="form-control" id="belongings"
                                        name="belongings">{{ $patient->belongings }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="extra_info">{{ __('patients.extra_info') }}</label>
                                    <textarea class="form-control" id="extra_info"
                                        name="extra_info">{{ $patient->extra_info }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="abuse_substances">{{ __('patients.abuse_substances') }}</label>
                                    <input type="text" class="form-control" id="abuse_substances"
                                        name="abuse_substances" value="{{ $patient->abuse_substances }}">
                                </div>
                                <button type="submit" class="btn float-right">{{ __('crud.update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
