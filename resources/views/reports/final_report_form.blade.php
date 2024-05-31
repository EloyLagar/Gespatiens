@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/reports.css') }}">
@endsection

@section('content')
<div class="container-fluid pt-3">
    <div class="pdf-options ml-auto">
        <div class="d-flex flex-column">
            <a class="btn btn-block d-flex align-items-center" target="_blank"
                href="{{ route('reports.finalReport_preview', $finalReport) }}">
                <i class="bx bx-show mr-2"></i> {{ __('crud.preview') }}
            </a>
            <a class="btn btn-block mt-2 d-flex align-items-center"
                href="{{ route('reports.finalReport_download', $finalReport) }}">
                <i class="bx bxs-download mr-2"></i> {{ __('crud.download') }}
            </a>
        </div>
    </div>
    <div class="action-buttons">
        <a href="{{route('patients.edit', $finalReport->report->patient)}}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
    </div>
    <h1 class="text-center mb-3">{{__('reports.final_report')}} - {{ $finalReport->report->patient->name}}</h1>
    <div class="row justify-content-center">
        <div class="col-10 col-md-8 col-lg-8">

            <div class="card mb-3">
                <div class="card-header">{{ __('crud.general_info') }}
                    <button class="btn-down  float-right" data-toggle="collapse" data-target="#collapse-info-area"
                        aria-expanded="true" aria-controls="collapse-info-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-info-area" class="collapse hide">
                    <div class="card-body">
                        <div class="row">
                            <div class="column">
                                <label class="label-title" for="full_name">{{ __('patients.full_name') }}:</label>
                                <p>{{ $patient->full_name ?: __('reports.no_available_data') }}</p>

                                <label class="label-title" for="birth_date">{{ __('patients.birth_date') }}:</label>
                                <p>{{ $patient->birth_date ?: __('reports.no_available_data') }}</p>
                            </div>
                            <div class="column">
                                <label class="label-title" for="sip">{{ __('patients.sip') }}:</label>
                                <p>{{ $patient->sip ?: __('reports.no_available_data') }}</p>
                                <label class="label-title" for="entry_date">{{ __('patients.entry_date') }}:</label>
                                <p>{{ $patient->entry_date ?: __('reports.no_available_data') }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="column">
                                <label class="label-title" for="exit_date">{{ __('patients.exit_date') }}:</label>
                                <p>{{ $patient->exit_date ?: __('reports.no_available_data') }}</p>
                                <label class="label-title" for="reference_center">{{ __('reports.reference_center')
                                    }}:</label>
                                <p>Comunidad terapéutica Los Vientos</p>
                            </div>
                            <div class="column">
                                <label class="label-title" for="dni">{{ __('patients.dni') }}:</label>
                                <p>{{ $patient->dni ?: __('reports.no_available_data') }}</p>
                            </div>
                        </div>

                        @if (Auth::user()->speciality === 'admin')
                        <form action="{{ route('final_reports.update', $finalReport) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="request_number">{{ __('reports.request_number') }}:</label>
                                <textarea class="form-control" id="request_number"
                                    name="request_number">{{ old('request_number', $finalReport->report->request_number) }}</textarea>
                                @error('request_number')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exit_reason">{{ __('reports.exit_reason') }}:</label>
                                <textarea class="form-control" id="exit_reason"
                                    name="discharge_fundamentals">{{ old('discharge_fundamentals', $finalReport->discharge_fundamentals) }}</textarea>
                                @error('exit_reason')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{ __('reports.auth_admin') }}.</p>
                            </div>
                            <label class="label-title" for="discharge_fundamentals">{{ __('reports.exit_reason')
                                }}:</label>
                            <p>{{ $finalReport->discharge_fundamentals ?: 'No hay datos disponibles' }}</p>
                            <label class="label-title" for="request_number">{{ __('reports.request_number') }}:</label>
                            <p>{{ $finalReport->report->request_number ?: 'No hay datos disponibles' }}</p>

                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Area de intervencion social -->

            <div class="card mb-3">
                <div class="card-header">{{ __('reports.social_intervention_area') }}
                    <button class="btn-down  float-right" data-toggle="collapse" data-target="#collapse-social-area"
                        aria-expanded="true" aria-controls="collapse-social-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-social-area" class="collapse hide">
                    <div class="card-body">
                        @if (Auth::user()->speciality === 'admin' || Auth::user()->speciality === 'worker')
                        <form action="{{ route('final_reports.update', $finalReport) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="social_familiar_situation">{{ __('reports.social_familiar_situation')
                                    }}:</label>
                                <textarea class="form-control" id="social_familiar_situation"
                                    name="social_familiar_situation">{{ old('social_familiar_situation', $finalReport->report->social_familiar_situation) }}</textarea>
                                @error('social_familiar_situation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="professional_situation">{{ __('reports.professional_situation') }}:</label>
                                <textarea class="form-control" id="professional_situation"
                                    name="laboral_educative_economical_situation">{{ old('laboral_educative_economical_situation', $finalReport->report->laboral_educative_economical_situation) }}</textarea>
                                @error('laboral_educative_economical_situation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jury_situation">{{ __('reports.jury_situation') }}:</label>
                                <textarea class="form-control" id="jury_situation"
                                    name="judicial_situation">{{ old('judicial_situation', $finalReport->report->judicial_situation) }}</textarea>
                                @error('judicial_situation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="evo_and_objectives">{{ __('reports.evo_and_objectives') }}:</label>
                                <textarea class="form-control" id="evo_and_objectives"
                                    name="social_evo_and_objectives">{{ old('social_evo_and_objectives', $finalReport->report->social_evo_and_objectives) }}</textarea>
                                @error('social_evo_and_objectives')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="social_diagnosis">{{ __('reports.social_diagnosis') }}:</label>
                                <textarea class="form-control" id="social_diagnosis"
                                    name="social_diagnosis">{{ old('social_diagnosis', $finalReport->report->social_diagnosis) }}</textarea>
                                @error('social_diagnosis')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{ __('reports.auth_worker') }}.</p>
                            </div>
                            <label class="label-title" for="social_familiar_situation">{{
                                __('reports.social_familiar_situation') }}:</label>
                            <p>{{ $finalReport->report->social_familiar_situation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="professional_situation">{{
                                __('reports.professional_situation') }}:</label>
                            <p>{{ $finalReport->report->professional_situation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="jury_situation">{{ __('reports.jury_situation') }}:</label>
                            <p>{{ $finalReport->report->judicial_situation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="evo_and_objectives">{{ __('reports.evo_and_objectives')
                                }}:</label>
                            <p>{{ $finalReport->report->evo_and_objectives ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="social_diagnosis">{{ __('reports.social_diagnosis')
                                }}:</label>
                            <p>{{ $finalReport->report->social_diagnosis ?: __('reports.no_available_data') }}</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            <!-- Área de salud -->
            <div class="card mb-3">
                <div class="card-header">{{ __('reports.health_area') }}
                    <button class="btn-down float-right" data-toggle="collapse" data-target="#collapse-health-area"
                        aria-expanded="true" aria-controls="collapse-social-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-health-area" class="collapse hide">
                    <div class="card-body">
                        @if (Auth::user()->speciality === 'admin' || Auth::user()->speciality === 'medical')
                        <form action="{{ route('final_reports.update', $finalReport) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="toxic_summary">{{ __('reports.toxic_summary') }}:</label>
                                <textarea class="form-control" id="toxic_summary"
                                    name="about_toxicology">{{ old('about_toxicology', $finalReport->report->about_toxicology) }}</textarea>
                                @error('about_toxicology')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="health_situation_at_entry">{{ __('reports.health_situation_at_entry')
                                    }}:</label>
                                <textarea class="form-control" id="health_situation_at_entry"
                                    name="health_at_entry">{{ old('health_at_entry', $finalReport->report->health_at_entry) }}</textarea>
                                @error('health_at_entry')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phisical_health_evo">{{ __('reports.phisical_health_evo') }}:</label>
                                <textarea class="form-control" id="phisical_health_evo"
                                    name="physical_health_condition">{{ old('physical_health_condition', $finalReport->report->physical_health_condition) }}</textarea>
                                @error('health_at_entry')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="toxic_control_and_analysis">{{ __('reports.toxic_control_and_analysis')
                                    }}:</label>
                                <textarea class="form-control" id="toxic_control_and_analysis"
                                    name="toxicological_controls">{{ old('toxicological_controls', $finalReport->report->toxicological_controls) }}</textarea>
                                @error('toxicological_controls')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="analytics">{{ __('reports.other_health_atentions') }}</label>
                                <textarea class="form-control" id="analytics"
                                    name="other_medical_attention">{{ old('other_medical_attention', $finalReport->other_medical_attention) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="diagnosis_third_axis">{{ __('reports.diagnosis_third_axis') }}:</label>
                                <textarea class="form-control" id="diagnosis_third_axis"
                                    name="health_diagnosis">{{ old('health_diagnosis', $finalReport->report->health_diagnosis) }}</textarea>
                                @error('health_diagnosis')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="treatment_at_discharge">{{ __('reports.treatment_at_discharge') }}:</label>
                                <textarea class="form-control" id="treatment_at_discharge"
                                    name="health_situation_at_discharge">{{ old('health_situation_at_discharge', $finalReport->health_situation_at_discharge) }}</textarea>
                                @error('health_situation_at_discharge')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{ __('reports.auth_medical') }}.</p>
                            </div>
                            <label class="label-title" for="toxic_summary">{{ __('reports.toxic_summary') }}:</label>
                            <p>{{ $finalReport->report->about_toxicology ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="health_situation_at_entry">{{
                                __('reports.health_situation_at_entry') }}:</label>
                            <p>{{ $finalReport->report->health_at_entry ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="phisical_health_evo">{{ __('reports.phisical_health_evo')
                                }}:</label>
                            <p>{{ $finalReport->report->physical_health_condition ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="toxic_control_and_analysis">{{
                                __('reports.toxic_control_and_analysis') }}:</label>
                            <p>{{ $finalReport->report->toxicological_controls ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="analytics">{{ __('reports.other_health_atentions')
                                }}</label>
                            <p>{{ $finalReport->other_health_atentions ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="diagnosis_third_axis">{{ __('reports.diagnosis_third_axis')
                                }}:</label>
                            <p>{{ $finalReport->report->health_diagnosis ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="treatment_at_discharge">{{
                                __('reports.treatment_at_discharge') }}:</label>
                            <p>{{ $finalReport->health_situation_at_discharge ?: __('reports.no_available_data') }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            {{-- Área psicológica --}}
            <div class="card mb-3">
                <div class="card-header">{{ __('reports.psycho_area') }}
                    <button type class="btn-down float-right" data-toggle="collapse" data-target="#collapse-psycho-area"
                        aria-expanded="true" aria-controls="collapse-psycho-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-psycho-area" class="collapse hide">
                    <div class="card-body">
                        @if (Auth::user()->speciality === 'admin' || Auth::user()->speciality === 'psychologist')
                        <form action="{{ route('final_reports.update', $finalReport) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="start_valoration">{{ __('reports.start_valoration') }}:</label>
                                <textarea class="form-control" id="start_valoration"
                                    name="psycho_entry_valoration">{{ old('psycho_entry_valoration', $finalReport->report->psycho_entry_valoration) }}</textarea>
                                @error('psycho_entry_valoration')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="psycho_valoration">{{ __('reports.psycho_valoration') }}:</label>
                                <textarea class="form-control" id="psycho_valoration"
                                    name="psycho_evaluation_with_instruments">{{ old('psycho_evaluation_with_instruments', $finalReport->report->psycho_evaluation_with_instruments) }}</textarea>
                                @error('psycho_evaluation_with_instruments')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="diagnosis_first_and_second_axis">{{
                                    __('reports.diagnosis_first_and_second_axis') }}:</label>
                                <textarea class="form-control" id="diagnosis_first_and_second_axis"
                                    name="psycho_diagnosis">{{ old('psycho_diagnosis', $finalReport->report->psycho_diagnosis) }}</textarea>
                                @error('psycho_diagnosis')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="psycho_intervention_objectives">{{
                                    __('reports.psycho_intervention_objectives') }}:</label>
                                <textarea class="form-control" id="psycho_intervention_objectives"
                                    name="psycho_interventions">{{ old('psycho_interventions', $finalReport->report->psycho_interventions) }}</textarea>
                                @error('psycho_interventions')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="motivation">{{ __('reports.motivation') }}:</label>
                                <textarea class="form-control" id="motivation"
                                    name="about_motivation">{{ old('about_motivation', $finalReport->report->about_motivation) }}</textarea>
                                @error('about_motivation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="situation_at_discharge">{{ __('reports.situation_at_discharge') }}:</label>
                                <textarea class="form-control" id="situation_at_discharge"
                                    name="psycho_situation_at_discharge">{{ old('psycho_situation_at_discharge', $finalReport->psycho_situation_at_discharge) }}</textarea>
                                @error('situation_at_discharge')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pyscho_outgoings_value">{{ __('reports.pyscho_outgoings_value') }}:</label>
                                <textarea class="form-control" id="pyscho_outgoings_value"
                                    name="psycho_outgoings_value">{{ old('psycho_outgoings_value', $finalReport->psycho_outgoings_value) }}</textarea>
                                @error('psycho_outgoings_value')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>

                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{ __('reports.auth_psycho') }}.</p>
                            </div>
                            <label class="label-title" for="start_valoration">{{ __('reports.start_valoration')
                                }}:</label>
                            <p>{{ $finalReport->report->psycho_entry_valoration ?: __('reports.no_available_data') }}
                            </p>
                            <label class="label-title" for="psycho_valoration">{{ __('reports.psycho_valoration')
                                }}:</label>
                            <p>{{ $finalReport->report->psycho_evaluation_with_instruments ?:
                                __('reports.no_available_data') }}
                            </p>
                            <label class="label-title" for="diagnosis_first_and_second_axis">{{
                                __('reports.diagnosis_first_and_second_axis') }}:</label>
                            <p>{{ $finalReport->report->psycho_diagnosis ?: __('reports.no_available_data') }}</p>
                            <label class="label-title" for="psycho_intervention_objectives">{{
                                __('reports.psycho_intervention_objectives') }}:</label>
                            <p>{{ $finalReport->report->psycho_interventions ?: __('reports.no_available_data') }}
                            </p>
                            <label class="label-title" for="motivation">{{ __('reports.motivation') }}:</label>
                            <p>{{ $finalReport->report->about_motivation ?: __('reports.no_available_data') }}</p>
                            <label class="label-title" for="situation_at_discharge">{{
                                __('reports.situation_at_discharge') }}:</label>
                            <p>{{ $finalReport->psycho_situation_at_discharge ?: __('reports.no_available_data')
                                }}
                            </p>
                            <label class="label-title" for="individual_intervention_needed">{{
                                __('reports.individual_intervention_needed') }}:</label>
                            <p>{{ $finalReport->report->psycho_interventions ?: __('reports.no_available_data') }}
                            </p>
                            <label class="label-title" for="pyscho_outgoings_value">{{
                                __('reports.pyscho_outgoings_value') }}:</label>
                            <p>{{ $finalReport->pyscho_outgoings_value ?: __('reports.no_available_data') }}
                            </p>

                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Área Educativa -->

            <div class="card mb-3">
                <div class="card-header">{{ __('reports.educative_area') }}
                    <button type="button" class="btn-down float-right" data-toggle="collapse"
                        data-target="#collapse-educative-area" aria-expanded="true"
                        aria-controls="collapse-educative-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-educative-area" class="collapse hide">
                    <div class="card-body">
                        @if (Auth::user()->speciality === 'admin' || Auth::user()->speciality === 'educator')
                        <form action="{{ route('final_reports.update', $finalReport) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label>{{__('reports.center_adaptation_and_implication')}}</label >
                            <div class="form-group">
                                <label for="at_habits">{{ __('reports.at_habits') }}:</label>
                                <textarea class="form-control" id="at_habits"
                                    name="habit_adaptation">{{ old('habit_adaptation', $finalReport->report->habit_adaptation) }}</textarea>
                                @error('habit_adaptation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="at_activities">{{ __('reports.at_activities') }}:</label>
                                <textarea class="form-control" id="at_activities"
                                    name="activities_adaptation">{{ old('activities_adaptation', $finalReport->report->activities_adaptation) }}</textarea>
                                @error('activities_adaptation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="at_regulations">{{ __('reports.at_regulations') }}:</label>
                                <textarea class="form-control" id="at_regulations"
                                    name="normativity_adaptation">{{ old('normativity_adaptation', $finalReport->report->normativity_adaptation) }}</textarea>
                                @error('normativity_adaptation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="at_workouts_or_formation">{{ __('reports.at_workouts_or_formation')
                                    }}:</label>
                                <textarea class="form-control" id="at_workouts_or_formation"
                                    name="workout_adaptation">{{ old('workout_adaptation', $finalReport->report->workout_adaptation) }}</textarea>
                                @error('workout_adaptation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="at_leisure_and_free_time">{{ __('reports.at_leisure_and_free_time')
                                    }}:</label>
                                <textarea class="form-control" id="at_leisure_and_free_time"
                                    name="leisure_adaptation">{{ old('leisure_adaptation', $finalReport->report->leisure_adaptation) }}</textarea>
                                @error('leisure_adaptation')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="mates_relation">{{ __('reports.mates_relation') }}:</label>
                                <textarea class="form-control" id="mates_relation"
                                    name="partners_relationship">{{ old('partners_relationship', $finalReport->report->partners_relationship) }}</textarea>
                                @error('partners_relationship')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="employees_relation">{{ __('reports.employees_relation') }}:</label>
                                <textarea class="form-control" id="employees_relation"
                                    name="therapeutic_crew_relationship">{{ old('therapeutic_crew_relationship', $finalReport->report->therapeutic_crew_relationship) }}</textarea>
                                @error('therapeutic_crew_relationship')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="educative_outgoings_value">{{ __('reports.develop_and_therapeutic_outgoings_valoration')
                                    }}:</label>
                                <textarea class="form-control" id="educative_outgoings_value"
                                    name="educative_outgoings_value">{{ old('educative_outgoings_value', $finalReport->educative_outgoings_value) }}</textarea>
                                @error('educative_outgoings_value')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{ __('reports.auth_educator') }}.</p>
                            </div>
                            <p>{{__('reports.center_adaptation_and_implication')}}</p>
                            <label class="label-title" for="at_habits">{{ __('reports.at_habits') }}:</label>
                            <p>{{ $finalReport->report->habit_adaptation ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="at_activities">{{ __('reports.at_activities') }}:</label>
                            <p>{{ $finalReport->report->activities_adaptation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="at_regulations">{{ __('reports.at_regulations') }}:</label>
                            <p>{{ $finalReport->report->normativity_adaptation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="at_workouts_or_formation">{{
                                __('reports.at_workouts_or_formation') }}:</label>
                            <p>{{ $finalReport->report->workout_adaptation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="at_leisure_and_free_time">{{
                                __('reports.at_leisure_and_free_time') }}:</label>
                            <p>{{ $finalReport->report->partners_relationship ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="mates_relation">{{ __('reports.mates_relation') }}:</label>
                            <p>{{ $finalReport->report->partners_relationship ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="employees_relation">{{ __('reports.employees_relation')
                                }}:</label>
                            <p>{{ $finalReport->report->therapeutic_crew_relationship ?: __('reports.no_available_data')
                                }}
                            </p>
                            <label class="label-title" for="educative_outgoings_value">{{
                                __('reports.develop_and_therapeutic_outgoings_valoration') }}:</label>
                            <p>{{ $finalReport->report->educative_outgoings_value ?: __('reports.no_available_data') }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Área de Intervención Familiar -->
            <div class="card mb-3">
                <div class="card-header">{{ __('reports.familiar_intervention_area')}}
                    <button type class="btn-down float-right" data-toggle="collapse"
                        data-target="#collapse-familiar-area" aria-expanded="true"
                        aria-controls="collapse-familiar-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-familiar-area" class="collapse hide">
                    <div class="card-body">
                        @if (Auth::user()->speciality === 'admin'|| Auth::user()->speciality === 'worker')
                        <form action="{{ route('final_reports.update', $finalReport) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="reference_familiars_and_impication_degree">{{
                                    __('reports.reference_familiars_and_impication_degree') }}:</label>
                                <textarea class="form-control" id="reference_familiars_and_impication_degree"
                                    name="reference_familiars">{{ old('reference_familiars', $finalReport->report->reference_familiars) }}</textarea>
                                @error('reference_familiars')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="familiar_relation_and_evo">{{ __('reports.familiar_relation_and_evo')
                                    }}:</label>
                                <textarea class="form-control" id="familiar_relation_and_evo"
                                    name="familiar_evo_and_realtionship">{{ old('familiar_evo_and_realtionship', $finalReport->report->familiar_evo_and_realtionship) }}</textarea>
                                @error('familiar_evo_and_realtionship')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="familiar_situation_at_discharge">{{
                                    __('reports.familiar_situation_at_discharge') }}:</label>
                                <textarea class="form-control" id="familiar_situation_at_discharge"
                                    name="familiar_situation_at_discharge">{{ old('familiar_situation_at_discharge', $finalReport->familiar_situation_at_discharge) }}</textarea>
                                @error('familiar_evo_and_realtionship')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>

                        </form>
                        @else
                        <div class="text-center">
                            <p>{{ __('reports.auth_worker') }}</p>
                        </div>
                        <label class="label-title" for="reference_familiars_and_impication_degree">{{
                            __('reports.reference_familiars_and_impication_degree') }}:</label>
                        <p>{{ $finalReport->report->reference_familiars ?: 'No hay datos disponibles' }}</p>

                        <label class="label-title" for="familiar_relation_and_evo">{{
                            __('reports.familiar_relation_and_evo') }}:</label>
                        <p>{{ $finalReport->report->familiar_relation_and_evo ?: 'No hay datos disponibles' }}</p>

                        <label class="label-title" for="familiar_situation_at_discharge">{{
                            __('reports.familiar_situation_at_discharge') }}:</label>
                        <p>{{ $finalReport->familiar_situation_at_discharge ?: 'No hay datos disponibles' }}</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Orientación de Seguimiento -->
            <div class="card mb-3">
                <div class="card-header">{{ __('reports.guidance_for_follow_up') }}
                    <button type class="btn-down float-right" data-toggle="collapse"
                        data-target="#collapse-follow-up-area" aria-expanded="true"
                        aria-controls="collapse-social-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-follow-up-area" class="collapse hide">
                    <div class="card-body">
                        @if (Auth::user()->speciality === 'admin')
                        <form action="{{ route('final_reports.update', $finalReport) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="rationale_for_departure">{{ __('reports.rationale_for_departure')
                                    }}:</label>
                                <textarea class="form-control" id="rationale_for_departure"
                                    name="discharge_fundamentals">{{ old('discharge_fundamentals', $finalReport->discharge_fundamentals) }}</textarea>
                                @error('discharge_fundamentals')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="intervention_objectives_after_the_end">{{
                                    __('reports.intervention_objectives_after_the_end') }}:</label>
                                <textarea class="form-control" id="intervention_objectives_after_the_end"
                                    name="after_discharge_objectives">{{ old('after_discharge_objectives', $finalReport->after_discharge_objectives) }}</textarea>
                                @error('after_discharge_objectives')
                                <span class="span-error" role="alert">
                                    <span>{{ __('form.' . $message) }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{ __('reports.auth_admin') }}.</p>
                            </div>
                            <label class="label-title" for="discharge_fundamentals">{{
                                __('reports.discharge_fundamentals') }}:</label>
                            <p>{{ $finalReport->report->discharge_fundamentals ?: 'No hay datos disponibles' }}
                            </p>
                            <label class="label-title" for="after_discharge_objectives">{{
                                __('reports.after_discharge_objectives') }}:</label>
                            <p>{{ $finalReport->report->after_discharge_objectives ?: 'No hay datos disponibles' }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <script>
            const reportId = '{{ $finalReport->report->id }}';
            console.log("id del reporte " + reportId);
        </script>

        {{-- Boton collapse --}}
        <script>
            $(document).ready(function() {
                $('[data-toggle="collapse"]').on('click', function() {
                    var target = $(this).data('target');
                    var icon = $(this).find('.collapse-icon');

                    $(target).on('show.bs.collapse', function() {
                        icon.addClass('rotate-180');
                    }).on('hide.bs.collapse', function() {
                        icon.removeClass('rotate-180');
                    });
                });
            });

            //Para que el campo state vuelva a ser false

            function setReportStateFalse() {
                $.ajax({
                    url: '{{ route("report.close") }}',
                    type: 'POST',
                    data: {
                        report_id: reportId,
                        _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
                });
            }

            $(window).on('beforeunload', function() {
                setReportStateFalse();
            });

            //·Antes de salir de la página
            $('.goBackBtn').on('click', function(event) {
                event.preventDefault();
                setReportStateFalse();
                var href = $(this).attr('href');
                setTimeout(function() {
                    window.location.href = href;
                }, 1000);
            });
        </script>
@endsection
