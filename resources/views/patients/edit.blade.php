@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex flex-column">
        <div class="d-flex col-12 d-flex flex-column flex-md-row align-items-center">
            <div>
                @if ($patient->number != null)
                    <a href="{{ route('indexResidents') }}" class="goBackBtn btn mt-2 mr-auto float-left"><i
                            class='bx bx-left-arrow-alt'></i></a>
                @else
                    <a href="{{ route('patients.index') }}" class="goBackBtn btn mt-2 mr-auto float-left"><i
                            class='bx bx-left-arrow-alt'></i></a>
                @endif
            </div>
            <div class="float-right d-flex flex-md-row ml-auto mt-2 mb-1 col-sm-12 col-md-6 col-lg-4">

                <a href="{{ route('reports.final_report_form', $patient) }}"
                    class="btn col-md-6 mr-2 col-lg-6">{{ __('reports.final') }}</a>
                <a href="{{ route('reports.mid_stay_report_form', $patient) }}"
                    class="btn col-md-6 col-lg-6">{{ __('reports.mid_stay') }}</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 order-md-1">
                    <div class="card">
                        <div class="card-header  d-flex align-items-center">
                            @if ($patient->number != null)
                                {{ $patient->number }} - {{ $patient->name }}
                                <a class="btn ml-auto float-right d-flex align-items-center"
                                    href="{{ route('patients.unsuscribe', ['patient' => $patient->id]) }}"><i
                                        class='bx bxs-user-minus'></i>&nbsp;{{ __('patients.unsuscribe') }}</a>
                            @else
                                {{ $patient->full_name }}<a class="btn ml-auto float-right d-flex align-items-center"
                                    href="{{ route('patients.register', ['patient' => $patient->id]) }}"><i
                                        class='bx bxs-user-plus'></i>&nbsp;{{ __('patients.register') }}</a>
                            @endif
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
                                    {{ __('success.' . session('success')) }}
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
                                            <label for="name">{{ __('patients.name') }}:</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="{{ $patient->name }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="surname">{{ __('patients.surname') }}:</label>
                                            <input type="text" class="form-control" id="surname" name="surname"
                                                value="{{ $patient->surname }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="dni">{{ __('patients.dni') }}:</label>
                                            <input type="text" class="form-control" id="dni" name="dni"
                                                value="{{ $patient->dni }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="visit_code">{{ __('patients.visit_code') }}:</label>
                                            <input type="text" class="form-control" id="visit_code" name="visit_code"
                                                value="{{ $patient->visit_code }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="phone_number">{{ __('patients.phone_number') }}:</label>
                                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                                value="{{ $patient->phone_number }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="birth_date">{{ __('patients.birth_date') }}:</label>
                                            <input type="date" class="form-control" id="birth_date" name="birth_date"
                                                value="{{ $patient->birth_date }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">{{ __('patients.address') }}:</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ $patient->address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="belongings">{{ __('patients.belongings') }}:</label>
                                        <textarea class="form-control" id="belongings" name="belongings">{{ $patient->belongings }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="extra_info">{{ __('patients.extra_info') }}:</label>
                                        <textarea class="form-control" id="extra_info" name="extra_info">{{ $patient->extra_info }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="abuse_substances">{{ __('patients.abuse_substances') }}:</label>
                                        <input type="text" class="form-control" id="abuse_substances"
                                            name="abuse_substances" value="{{ $patient->abuse_substances }}">
                                    </div>
                                    <button type="submit" class="btn float-right">{{ __('crud.update') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">{{ __('patients.tutors') }}</div>
                        <div class="card-body">
                            <form action="{{ route('patients.updateTutors', $patient) }}" method="post">
                                @csrf
                                @method('POST')

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="tutor_educator">{{ __('user.speciality.educator') }}:</label>
                                        <select class="form-control" name="tutor_educator" id="tutor_educator">
                                            <option value="" disabled selected>{{ __('crud.select_a') }} {{__('user.speciality.educator')}}</option>
                                            @forelse ($educators as $educator)
                                                <option value="{{ $educator->id }}" {{ $patient->is_tutored->contains($educator->id) ? 'selected' : '' }}>{{ $educator->name }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tutor_psycho">{{ __('user.speciality.psychologist') }}:</label>
                                        <select class="form-control " name="tutor_psycho" id="tutor_psycho">
                                            <option value="" disabled selected>{{ __('crud.select_a') }} {{__('user.speciality.psychologist')}}</option>
                                            @forelse ($psychologists as $psychologist)
                                                <option value="{{ $psychologist->id }}" {{ $patient->is_tutored->contains($psychologist->id) ? 'selected' : '' }}>{{ $psychologist->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn float-right">{{ __('crud.update') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
