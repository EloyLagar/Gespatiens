@extends('layouts.app')

@section('css')
    @parent
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
                    <p>Nombre: {{ $patient->full_name }}</p>
                    <p>DNI: {{ $patient->dni }}</p>
                    <p>Código de Visita: {{ $patient->visit_code }}</p>
                    <p>Fecha de Nacimiento: {{ $patient->birth_date }}</p>
                    <p>Dirección: {{ $patient->address }}</p>
                    <p>Pertenencias: {{ $patient->belongings }}</p>
                    <p>Número de Teléfono: {{ $patient->phone_number }}</p>
                    <p>Información Extra: {{ $patient->extra_info }}</p>
                    <p>Abuso de Sustancias: {{ $patient->abuse_substances }}</p>
                    <p>Fecha de Salida: {{ $patient->exit_date }}</p>
                    <p>Fecha de Entrada: {{ $patient->entry_date }}</p>
                    <p>Autorizados para visita:</p>
                    <ul>
                        @forelse ($patient->visitors as $visitor)

                        @empty
                        <span>No tiene visitantes autorizados</span>
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
                        Editar Información del Paciente
                    </div>
                    <div class="card-body">
                        <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-container">
                                <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="text" class="form-control" id="dni" name="dni"
                                        value="{{ $patient->dni }}">
                                </div>
                                <div class="form-group">
                                    <label for="visit_code">Código de Visita</label>
                                    <input type="text" class="form-control" id="visit_code" name="visit_code"
                                        value="{{ $patient->visit_code }}">
                                </div>
                                <div class="form-group">
                                    <label for="number">Número</label>
                                    <input type="text" class="form-control" id="number" name="number"
                                        value="{{ $patient->number }}">
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date"
                                        value="{{ $patient->birth_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Dirección</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $patient->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="belongings">Pertenencias</label>
                                    <input type="text" class="form-control" id="belongings" name="belongings"
                                        value="{{ $patient->belongings }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone_number">Número de Teléfono</label>
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ $patient->phone_number }}">
                                </div>
                                <div class="form-group">
                                    <label for="extra_info">Información Extra</label>
                                    <textarea class="form-control" id="extra_info" name="extra_info">{{ $patient->extra_info }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="abuse_substances">Abuso de Sustancias</label>
                                    <input type="text" class="form-control" id="abuse_substances" name="abuse_substances"
                                        value="{{ $patient->abuse_substances }}">
                                </div>
                                <div class="form-group">
                                    <label for="exit_date">Fecha de Salida</label>
                                    <input type="date" class="form-control" id="exit_date" name="exit_date"
                                        value="{{ $patient->exit_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="entry_date">Fecha de Entrada</label>
                                    <input type="date" class="form-control" id="entry_date" name="entry_date"
                                        value="{{ $patient->entry_date }}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ $patient->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="surname">Apellido</label>
                                    <input type="text" class="form-control" id="surname" name="surname"
                                        value="{{ $patient->surname }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
