@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/reports.css') }}">
@endsection

@section('content')
<div class="container-fluid pt-3">
    <a href="{{ route('patients.edit', $patient) }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
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
                                <label class="label-title"
                                    for="reference_center">{{__('reports.reference_center')}}:</label>
                                <p>Comunidad terapéutica Los Vientos</p>
                            </div>
                            <div class="column">
                                <label class="label-title" for="dni">{{ __('patients.dni') }}:</label>
                                <p>{{ $patient->dni ?: __('reports.no_available_data') }}</p>
                            </div>
                        </div>

                        @if(Auth::user()->speciality === 'admin')
                        <form action="{{ route('reports.update', $final_report) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="request_number">{{ __('reports.request_number')
                                    }}:</label>
                                <textarea class="form-control" id="request_number"
                                    name="request_number">{{ old('request_number', $final_report->report->request_number) }}</textarea>
                                @error('request_number')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exit_reason">{{ __('reports.exit_reason')
                                    }}:</label>
                                <textarea class="form-control" id="exit_reason"
                                    name="exit_reason">{{ old('exit_reason', $final_report->report->exit_reason) }}</textarea>
                                @error('exit_reason')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{__('crud.save')}}</button>
                        </form>
                        @else
                        <div>
                            <p>{{__('reports.auth_admin')}}</p>

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
                        @if(Auth::user()->speciality === 'worker')
                        <form action="{{ route('reports.update', $final_report) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="social_familiar_situation">{{ __('reports.social_familiar_situation')
                                    }}:</label>
                                <textarea class="form-control" id="social_familiar_situation"
                                    name="social_familiar_situation">{{ old('social_familiar_situation', $final_report->report->social_familiar_situation) }}</textarea>
                                @error('social_familiar_situation')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="professional_situation">{{ __('reports.professional_situation') }}:</label>
                                <textarea class="form-control" id="professional_situation"
                                    name="laboral_educative_economical_situation">{{ old('laboral_educative_economical_situation', $final_report->report->laboral_educative_economical_situation) }}</textarea>
                                @error('laboral_educative_economical_situation')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jury_situation">{{ __('reports.jury_situation') }}:</label>
                                <textarea class="form-control" id="jury_situation"
                                    name="judicial_situation">{{ old('judicial_situation', $final_report->report->jury_situation) }}</textarea>
                                @error('judicial_situation')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="evo_and_objectives">{{ __('reports.evo_and_objectives') }}:</label>
                                <textarea class="form-control" id="evo_and_objectives"
                                    name="social_evo_and_objectives">{{ old('social_evo_and_objectives', $final_report->report->social_evo_and_objectives) }}</textarea>
                                @error('social_evo_and_objectives')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="social_diagnosis">{{ __('reports.social_diagnosis') }}:</label>
                                <textarea class="form-control" id="social_diagnosis"
                                    name="social_diagnosis">{{ old('social_diagnosis', $final_report->report->social_diagnosis) }}</textarea>
                                @error('social_diagnosis')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{ __('crud.save') }}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{__('reports.auth_worker')}}.</p>
                            </div>
                            <label class="label-title" for="social_familiar_situation">{{
                                __('reports.social_familiar_situation') }}:</label>
                            <p>{{ $final_report->report->social_familiar_situation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="professional_situation">{{
                                __('reports.professional_situation') }}:</label>
                            <p>{{ $final_report->report->professional_situation ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="jury_situation">{{ __('reports.jury_situation') }}:</label>
                            <p>{{ $final_report->report->jury_situation ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="evo_and_objectives">{{ __('reports.evo_and_objectives')
                                }}:</label>
                            <p>{{ $final_report->report->evo_and_objectives ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="social_diagnosis">{{ __('reports.social_diagnosis')
                                }}:</label>
                            <p>{{ $final_report->report->social_diagnosis ?: __('reports.no_available_data') }}</p>
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
                        @if(Auth::user()->speciality === 'medical_staff')
                        <form action="{{ route('reports.update', $final_report) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="toxic_summary">{{ __('reports.toxic_summary') }}:</label>
                                <textarea class="form-control" id="toxic_summary"
                                    name="about_toxicology">{{ old('about_toxicology', $final_report->report->about_toxicology) }}</textarea>
                                @error('about_toxicology')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="health_situation_at_entry">{{ __('reports.health_situation_at_entry')
                                    }}:</label>
                                <textarea class="form-control" id="health_situation_at_entry"
                                    name="health_at_entry">{{ old('health_at_entry', $final_report->report->health_at_entry) }}</textarea>
                                @error('health_at_entry')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phisical_health_evo">{{ __('reports.phisical_health_evo') }}:</label>
                                <textarea class="form-control" id="phisical_health_evo"
                                    name="physical_health_condition">{{ old('physical_health_condition', $final_report->report->physical_health_condition) }}</textarea>
                                @error('health_at_entry')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="toxic_control_and_analysis">{{ __('reports.toxic_control_and_analysis')
                                    }}:</label>
                                <textarea class="form-control" id="toxic_control_and_analysis"
                                    name="toxicological_controls">{{ old('toxicological_controls', $final_report->report->toxicological_controls) }}</textarea>
                                @error('toxicological_controls')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="analytics">{{__('reports.other_health_atentions')}}</label>
                                <textarea class="form-control" id="analytics"
                                    name="other_medical_attention">{{ old('other_medical_attention', $final_report->report->other_medical_attention) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="diagnosis_third_axis">{{__('reports.diagnosis_third_axis')}}:</label>
                                <textarea class="form-control" id="diagnosis_third_axis"
                                    name="health_diagnosis">{{ old('health_diagnosis', $final_report->report->health_diagnosis) }}</textarea>
                                @error('health_diagnosis')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="treatment_at_discharge">{{__('reports.treatment_at_discharge')}}:</label>
                                <textarea class="form-control" id="treatment_at_discharge"
                                    name="health_situation_at_discharge">{{ old('health_situation_at_discharge', $final_report->report->health_situation_at_discharge) }}</textarea>
                                @error('health_situation_at_discharge')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn float-right">{{__('crud.save')}}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{__('reports.auth_medical')}}.</p>
                            </div>
                            <label class="label-title" for="toxic_summary">{{ __('reports.toxic_summary') }}:</label>
                            <p>{{ $final_report->report->about_toxicology ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="health_situation_at_entry">{{
                                __('reports.health_situation_at_entry') }}:</label>
                            <p>{{ $final_report->report->health_at_entry ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="phisical_health_evo">{{ __('reports.phisical_health_evo')
                                }}:</label>
                            <p>{{ $final_report->report->physical_health_condition ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="toxic_control_and_analysis">{{
                                __('reports.toxic_control_and_analysis') }}:</label>
                            <p>{{ $final_report->report->toxicological_controls ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title" for="analytics">{{__('reports.other_health_atentions')}}</label>
                            <p>{{ $final_report->report->other_health_atentions ?: __('reports.no_available_data') }}
                            </p>

                            <label class="label-title"
                                for="diagnosis_third_axis">{{__('reports.diagnosis_third_axis')}}:</label>
                            <p>{{ $final_report->report->health_diagnosis ?: __('reports.no_available_data') }}</p>

                            <label class="label-title"
                                for="treatment_at_discharge">{{__('reports.treatment_at_discharge')}}:</label>
                            <p>{{ $final_report->report->health_situation_at_discharge ?:
                                __('reports.no_available_data') }}</p>
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
                        @if(Auth::user()->speciality === 'psychologist')
                        <form action="{{ route('reports.update', $final_report) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="start_valoration">{{__('reports.start_valoration')}}:</label>
                                <textarea class="form-control" id="start_valoration"
                                    name="psycho_entry_valoration">{{ old('psycho_entry_valoration', $final_report->report->psycho_entry_valoration) }}</textarea>
                                @error('psycho_entry_valoration')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="psycho_valoration">{{__('reports.psycho_valoration')}}:</label>
                                <textarea class="form-control" id="psycho_valoration"
                                    name="psycho_evaluation_with_instruments">{{ old('psycho_evaluation_with_instruments', $final_report->report->psycho_evaluation_with_instruments) }}</textarea>
                                @error('psycho_evaluation_with_instruments')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label
                                    for="diagnosis_first_and_second_axis">{{__('reports.diagnosis_first_and_second_axis')}}:</label>
                                <textarea class="form-control" id="diagnosis_first_and_second_axis"
                                    name="pyscho_diagnosis">{{ old('pyscho_diagnosis', $final_report->report->pyscho_diagnosis) }}</textarea>
                                @error('pyscho_diagnosis')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label
                                    for="psycho_intervention_objectives">{{__('reports.psycho_intervention_objectives')}}:</label>
                                <textarea class="form-control" id="psycho_intervention_objectives"
                                    name="psycho_interventions">{{ old('psycho_interventions', $final_report->report->psycho_interventions) }}</textarea>
                                @error('psycho_interventions')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="motivation">{{__('reports.motivation')}}:</label>
                                <textarea class="form-control" id="motivation"
                                    name="about_motivation">{{ old('about_motivation', $final_report->report->about_motivation) }}</textarea>
                                @error('about_motivation')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="situation_at_discharge">{{__('reports.situation_at_discharge')}}:</label>
                                <textarea class="form-control" id="situation_at_discharge"
                                    name="situation_at_discharge">{{ old('situation_at_discharge', $final_report->report->situation_at_discharge) }}</textarea>
                                @error('situation_at_discharge')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label
                                    for="individual_intervention_needed">{{__('reports.individual_intervention_needed')}}:</label>
                                <textarea class="form-control" id="individual_intervention_needed"
                                    name="psycho_interventions">{{ old('psycho_interventions', $final_report->report->psycho_interventions) }}</textarea>
                                @error('psycho_interventions')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="pyscho_outgoings_value">{{__('reports.pyscho_outgoings_value')}}:</label>
                                <textarea class="form-control" id="pyscho_outgoings_value"
                                    name="pyscho_outgoings_value">{{ old('pyscho_outgoings_value', $final_report->report->pyscho_outgoings_value) }}</textarea>
                                @error('pyscho_outgoings_value')
                                <span class="invalid-feedback" role="alert">
                                    <span>{{ $message }}</span>
                                </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn float-right">{{__('crud.save')}}</button>
                    </div>
                    </form>
                    @else
                    <div>
                        <div class="text-center">
                            <p>{{__('reports.auth_psycho')}}.</p>
                        </div>
                        <label class="label-title" for="start_valoration">{{__('reports.start_valoration')}}:</label>
                        <p>{{ $final_report->report->psycho_entry_valoration ?: __('reports.no_available_data') }}</p>
                        <label class="label-title" for="psycho_valoration">{{__('reports.psycho_valoration')}}:</label>
                        <p>{{ $final_report->report->psycho_evaluation_with_instruments ?:
                            __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="diagnosis_first_and_second_axis">{{__('reports.diagnosis_first_and_second_axis')}}:</label>
                        <p>{{ $final_report->report->pyscho_diagnosis ?: __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="psycho_intervention_objectives">{{__('reports.psycho_intervention_objectives')}}:</label>
                        <p>{{ $final_report->report->psycho_interventions ?: __('reports.no_available_data') }}</p>
                        <label class="label-title" for="motivation">{{__('reports.motivation')}}:</label>
                        <p>{{ $final_report->report->about_motivation ?: __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="situation_at_discharge">{{__('reports.situation_at_discharge')}}:</label>
                        <p>{{ $final_report->report->psycho_situation_at_discharge ?: __('reports.no_available_data') }}
                        </p>
                        <label class="label-title"
                            for="individual_intervention_needed">{{__('reports.individual_intervention_needed')}}:</label>
                        <p>{{ $final_report->report->psycho_interventions ?: __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="pyscho_outgoings_value">{{__('reports.pyscho_outgoings_value')}}:</label>
                        <p>{{ $final_report->report->pyscho_outgoings_value ?: __('reports.no_available_data') }}</p>

                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Área Educativa -->

        <div class="card mb-3">
            <div class="card-header">{{__('reports.educative_area')}}
                <button type class="btn-down float-right" data-toggle="collapse" data-target="#collapse-educative-area"
                    aria-expanded="true" aria-controls="collapse-educative-area">
                    <i class='bx bxs-down-arrow collapse-icon'></i>
                </button>
            </div>
            <div id="collapse-educative-area" class="collapse hide">
                <div class="card-body">
                    @if(Auth::user()->speciality === 'educator')
                    <form action="{{ route('reports.update', $final_report) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="at_habits">{{__('reports.at_habits')}}:</label>
                            <textarea class="form-control" id="at_habits"
                                name="habit_adaptation">{{ old('habit_adaptation', $final_report->report->habit_adaptation) }}</textarea>
                            @error('habit_adaptation')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="at_activities">{{__('reports.at_activities')}}:</label>
                            <textarea class="form-control" id="at_activities"
                                name="activities_adaptation">{{ old('activities_adaptation', $final_report->report->activities_adaptation) }}</textarea>
                            @error('activities_adaptation')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="at_regulations">{{__('reports.at_regulations')}}:</label>
                            <textarea class="form-control" id="at_regulations"
                                name="normativity_adaptation">{{ old('normativity_adaptation', $final_report->report->normativity_adaptation) }}</textarea>
                            @error('normativity_adaptation')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="at_workouts_or_formation">{{__('reports.at_workouts_or_formation')}}:</label>
                            <textarea class="form-control" id="at_workouts_or_formation"
                                name="workout_adaptation">{{ old('workout_adaptation', $final_report->report->workout_adaptation) }}</textarea>
                            @error('workout_adaptation')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="at_leisure_and_free_time">{{__('reports.at_leisure_and_free_time')}}:</label>
                            <textarea class="form-control" id="at_leisure_and_free_time"
                                name="leisure_adaptation">{{ old('leisure_adaptation', $final_report->report->leisure_adaptation) }}</textarea>
                            @error('leisure_adaptation')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mates_relation">{{__('reports.mates_relation')}}:</label>
                            <textarea class="form-control" id="mates_relation"
                                name="partners_relationship">{{ old('partners_relationship', $final_report->report->partners_relationship) }}</textarea>
                            @error('partners_relationship')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="employees_relation">{{__('reports.employees_relation')}}:</label>
                            <textarea class="form-control" id="employees_relation"
                                name="therapeutic_crew_relationship">{{ old('therapeutic_crew_relationship', $final_report->report->therapeutic_crew_relationship) }}</textarea>
                            @error('therapeutic_crew_relationship')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="educative_outgoings_value">{{__('reports.educative_outgoings_value')}}:</label>
                            <textarea class="form-control" id="educative_outgoings_value"
                                name="educative_outgoings_value">{{ old('educative_outgoings_value', $final_report->report->educative_outgoings_value) }}</textarea>
                            @error('educative_outgoings_value')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn float-right">{{__('crud.save')}}</button>
                    </form>
                    @else
                    <div>
                        <div class="text-center">
                            <p>{{__('reports.auth_educator')}}.</p>
                        </div>
                        <label class="label-title" for="at_habits">{{__('reports.at_habits')}}:</label>
                        <p>{{ $final_report->report->habit_adaptation ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="at_activities">{{__('reports.at_activities')}}:</label>
                        <p>{{ $final_report->report->activities_adaptation ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="at_regulations">{{__('reports.at_regulations')}}:</label>
                        <p>{{ $final_report->report->normativity_adaptation ?: __('reports.no_available_data') }}</p>

                        <label class="label-title"
                            for="at_workouts_or_formation">{{__('reports.at_workouts_or_formation')}}:</label>
                        <p>{{ $final_report->report->workout_adaptation ?: __('reports.no_available_data') }}</p>

                        <label class="label-title"
                            for="at_leisure_and_free_time">{{__('reports.at_leisure_and_free_time')}}:</label>
                        <p>{{ $final_report->report->partners_relationship ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="mates_relation">{{__('reports.mates_relation')}}:</label>
                        <p>{{ $final_report->report->partners_relationship ?: __('reports.no_available_data') }}</p>

                        <label class="label-title"
                            for="employees_relation">{{__('reports.employees_relation')}}:</label>
                        <p>{{ $final_report->report->therapeutic_crew_relationship ?: __('reports.no_available_data') }}
                        </p>
                        <label class="label-title"
                            for="educative_outgoings_value">{{__('reports.educative_outgoings_value')}}:</label>
                        <p>{{ $final_report->report->educative_outgoings_value ?: __('reports.no_available_data') }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Área de Intervención Familiar -->
        <div class="card mb-3">
            <div class="card-header">{{__('reports.familiar_intervention_area')}}
                <button type class="btn-down float-right" data-toggle="collapse" data-target="#collapse-familiar-area"
                    aria-expanded="true" aria-controls="collapse-familiar-area">
                    <i class='bx bxs-down-arrow collapse-icon'></i>
                </button>
            </div>
            <div id="collapse-familiar-area" class="collapse hide">
                <div class="card-body">
                    @if(Auth::user()->speciality === 'worker')
                    <form action="{{ route('reports.update', $final_report) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label
                                for="reference_familiars_and_impication_degree">{{__('reports.reference_familiars_and_impication_degree')}}:</label>
                            <textarea class="form-control" id="reference_familiars_and_impication_degree"
                                name="reference_familiars">{{ old('reference_familiars', $final_report->report->reference_familiars) }}</textarea>
                            @error('reference_familiars')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="familiar_relation_and_evo">{{__('reports.familiar_relation_and_evo')}}:</label>
                            <textarea class="form-control" id="familiar_relation_and_evo"
                                name="familiar_evo_and_realtionship">{{ old('familiar_evo_and_realtionship', $final_report->report->familiar_evo_and_realtionship) }}</textarea>
                            @error('familiar_evo_and_realtionship')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn float-right">{{__('crud.save')}}</button>

                    </form>
                    @else
                    <div class="text-center">
                        <p>{{__('reports.auth_worker')}}</p>
                    </div>
                    <label class="label-title"
                        for="reference_familiars_and_impication_degree">{{__('reports.reference_familiars_and_impication_degree')}}:</label>
                    <p>{{ $final_report->report->reference_familiars ?: 'No hay datos disponibles' }}</p>

                    <label class="label-title"
                        for="familiar_relation_and_evo">{{__('reports.familiar_relation_and_evo')}}:</label>
                    <p>{{ $final_report->report->familiar_relation_and_evo ?: 'No hay datos disponibles' }}</p>

                    @endif
                </div>
            </div>
        </div>

        <!-- Orientación de Seguimiento -->
        <div class="card mb-3">
            <div class="card-header">{{__('reports.guidance_for_follow_up')}}
                <button type class="btn-down float-right" data-toggle="collapse" data-target="#collapse-follow-up-area"
                    aria-expanded="true" aria-controls="collapse-social-area">
                    <i class='bx bxs-down-arrow collapse-icon'></i>
                </button>
            </div>
            <div id="collapse-follow-up-area" class="collapse hide">
                <div class="card-body">
                    @if(Auth::user()->speciality === 'admin')
                    <form action="{{ route('reports.update', $final_report) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="rationale_for_departure">{{__('reports.rationale_for_departure')}}:</label>
                            <textarea class="form-control" id="rationale_for_departure"
                                name="discharge_fundamentals">{{ old('discharge_fundamentals', $final_report->report->discharge_fundamentals) }}</textarea>
                            @error('discharge_fundamentals')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label
                                for="intervention_objectives_after_the_end">{{__('reports.intervention_objectives_after_the_end')}}:</label>
                            <textarea class="form-control" id="intervention_objectives_after_the_end"
                                name="after_discharge_objectives">{{ old('after_discharge_objectives', $final_report->report->after_discharge_objectives) }}</textarea>
                            @error('after_discharge_objectives')
                            <span class="invalid-feedback" role="alert">
                                <span>{{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn float-right">{{__('crud.save')}}</button>
                    </form>
                    @else
                    <div>
                        <p>{{__('reports.auth_admin')}}</p>
                        <label class="label-title"
                            for="discharge_fundamentals">{{__('reports.discharge_fundamentals')}}:</label>
                        <p>{{ $final_report->report->discharge_fundamentals ?: 'No hay datos disponibles' }}</p>
                        <label class="label-title"
                            for="after_discharge_objectives">{{__('reports.after_discharge_objectives')}}:</label>
                        <p>{{ $final_report->report->after_discharge_objectives ?: 'No hay datos disponibles' }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

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
            });

    </script>
    @endsection
    +
