@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex flex-column">
        <a href="{{ route('patients.index') }}" class="goBackBtn btn mt-2 mr-auto float-left"><i
                class='bx bx-left-arrow-alt'></i></a>
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-1">
                    <div class="card">
                        <div class="card-header">
                            @if ($patient->number != null)
                                {{ $patient->number . ' - ' }}
                            @endif{{ $patient->full_name }}
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="">{{ __('patients.full_name') }}:</label>
                                <p>{{ $patient->full_name }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.dni') }}:</label>
                                <p>{{ $patient->dni }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.visit_code') }}:</label>
                                <p>{{ $patient->visit_code }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.birth_date') }}:</label>
                                <p>{{ $patient->birth_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.address') }}:</label>
                                <p>{{ $patient->address }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.belongings') }}:</label>
                                <p>{{ $patient->belongings }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.phone_number') }}:</label>
                                <p>{{ $patient->phone_number }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.extra_info') }}:</label>
                                <p>{{ $patient->extra_info }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.abuse_substances') }}:</label>
                                <p>{{ $patient->abuse_substances }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.exit_date') }}:</label>
                                <p>{{ $patient->exit_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.entry_date') }}:</label>
                                <p>{{ $patient->entry_date }}</p>
                            </div>
                            <div class="mb-3">
                                <label for="">{{ __('patients.authorized_visitors') }}:</label>
                                <ul>
                                    @forelse ($patient->visitors as $visitor)
                                        <li>{{ $visitor->name }}</li>
                                    @empty
                                        <span class="visitors info-span">{{ __('patients.noAuthPersons') }}</span>
                                    @endforelse
                                </ul>
                            </div>
                            <a href="{{ route('reports.final_report_form', $patient) }}"
                                class="btn float-left mr-auto mb-1">{{ __('reports.final_report') }}</a>
                            <a href="{{ route('reports.mid_stay_report_form', $patient) }}"
                                class="btn float-right ml-auto mb-1">{{ __('reports.mid_stay_report') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 order-md-0 order-md-1">
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    {{ $errors->first() }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
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
                                        <div class="form-group col-md-4">
                                            <label for="name">{{ __('patients.name') }}</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $patient->name }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="surname">{{ __('patients.surname') }}</label>
                                            <input type="text" class="form-control" id="surname" name="surname"
                                                value="{{ $patient->surname }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="dni">{{ __('patients.dni') }}</label>
                                            <input type="text" class="form-control" id="dni" name="dni"
                                                value="{{ $patient->dni }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="visit_code">{{ __('patients.visit_code') }}</label>
                                            <input type="text" class="form-control" id="visit_code" name="visit_code"
                                                value="{{ $patient->visit_code }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone_number">{{ __('patients.phone_number') }}</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                                value="{{ $patient->phone_number }}">
                                        </div>
                                        <div class="form-group col-md-4">
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
