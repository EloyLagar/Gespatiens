@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/reports.css') }}">
@endsection

@section('content')
<div class="container-fluid pt-3">
    <a href="{{ route('home') }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
    <div class="row justify-content-center">
        <div class="col-10 col-md-8 col-lg-8">

            <div class="card mb-3">
                <div class="card-header">{{__('crud_info')}}
                    <button class="btn-down  float-right" data-toggle="collapse" data-target="#collapse-info-area"
                        aria-expanded="true" aria-controls="collapse-info-area">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-info-area" class="collapse hide">
                    <div class="card-body">
                        <label class="label-title" for="full_name">{{ __('patient.full_name') }}:</label>
                        <p>{{ $patient->full_name ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="birth_date">{{ __('patient.birth_date') }}:</label>
                        <p>{{ $patient->birth_date ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="reference_center">{{ __('patient.reference_center') }}:</label>
                        <p>Comunidad terapéutica Los Vientos</p>

                        <label class="label-title" for="entry_date">{{ __('patient.entry_date') }}:</label>
                        <p>{{ $patient->entry_date ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="exit_date">{{ __('patient.exit_date') }}:</label>
                        <p>{{ $patient->exit_date ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="dni">{{ __('patient.dni') }}:</label>
                        <p>{{ $patient->dni ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="sip">{{ __('patient.sip') }}:</label>
                        <p>{{ $patient->sip ?: __('reports.no_available_data') }}</p>

                        @if(Auth::user()->speciality === 'admin')
                        <form action="{{ route('reports.update', $report) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="request_number">{{ __('reports.request_number')
                                    }}:</label>
                                <textarea class="form-control" id="request_number"
                                    name="request_number">{{ old('request_number', $report->request_number) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exit_reason">{{ __('reports.exit_reason')
                                    }}:</label>
                                <textarea class="form-control" id="exit_reason"
                                    name="exit_reason">{{ old('exit_reason', $report->exit_reason) }}</textarea>
                            </div>
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
                        <form action="{{ route('reports.update', $report) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="social_familiar_situation">{{ __('reports.social_familiar_situation')
                                    }}:</label>
                                <textarea class="form-control" id="social_familiar_situation"
                                    name="social_familiar_situation">{{ old('social_familiar_situation', $report->social_familiar_situation) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="professional_situation">{{ __('reports.professional_situation') }}:</label>
                                <textarea class="form-control" id="professional_situation"
                                    name="professional_situation">{{ old('professional_situation', $report->professional_situation) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jury_situation">{{ __('reports.jury_situation') }}:</label>
                                <textarea class="form-control" id="jury_situation"
                                    name="jury_situation">{{ old('jury_situation', $report->jury_situation) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="evo_and_objectives">{{ __('reports.evo_and_objectives') }}:</label>
                                <textarea class="form-control" id="evo_and_objectives"
                                    name="evo_and_objectives">{{ old('evo_and_objectives', $report->evo_and_objectives) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="social_diagnosis">{{ __('reports.social_diagnosis') }}:</label>
                                <textarea class="form-control" id="social_diagnosis"
                                    name="social_diagnosis">{{ old('social_diagnosis', $report->social_diagnosis) }}</textarea>
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
                            <p>{{ $report->social_familiar_situation ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="professional_situation">{{
                                __('reports.professional_situation') }}:</label>
                            <p>{{ $report->professional_situation ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="jury_situation">{{ __('reports.jury_situation') }}:</label>
                            <p>{{ $report->jury_situation ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="evo_and_objectives">{{ __('reports.evo_and_objectives')
                                }}:</label>
                            <p>{{ $report->evo_and_objectives ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="social_diagnosis">{{ __('reports.social_diagnosis')
                                }}:</label>
                            <p>{{ $report->social_diagnosis ?: __('reports.no_available_data') }}</p>
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
                        <form action="{{ route('reports.update', $report) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="toxic_summary">{{ __('reports.toxic_summary') }}:</label>
                                <textarea class="form-control" id="toxic_summary"
                                    name="toxic_summary">{{ old('toxic_summary', $report->toxic_summary) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="health_situation_at_entry">{{ __('reports.health_situation_at_entry')
                                    }}:</label>
                                <textarea class="form-control" id="health_situation_at_entry"
                                    name="health_situation_at_entry">{{ old('health_situation_at_entry', $report->health_situation_at_entry) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="phisical_health_evo">{{ __('reports.phisical_health_evo') }}:</label>
                                <textarea class="form-control" id="phisical_health_evo"
                                    name="phisical_health_evo">{{ old('phisical_health_evo', $report->phisical_health_evo) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="toxic_control_and_analysis">{{ __('reports.toxic_control_and_analysis')
                                    }}:</label>
                                <textarea class="form-control" id="toxic_control_and_analysis"
                                    name="toxic_control_and_analysis">{{ old('toxic_control_and_analysis', $report->toxic_control_and_analysis) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="analytics">{{__('reports.other_health_atentions')}}</label>
                                <textarea class="form-control" id="analytics"
                                    name="analytics">{{ old('analytics', $report->other_health_atentions) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="diagnosis_third_axis">{{__('reports.diagnosis_third_axis')}}:</label>
                                <textarea class="form-control" id="diagnosis_third_axis"
                                    name="diagnosis_third_axis">{{ old('diagnosis_third_axis', $report->diagnosis_third_axis) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="treatment_at_discharge">{{__('reports.treatment_at_discharge')}}:</label>
                                <textarea class="form-control" id="treatment_at_discharge"
                                    name="treatment_at_discharge">{{ old('treatment_at_discharge', $report->treatment_at_discharge) }}</textarea>
                            </div>
                            <button type="submit" class="btn float-right">{{__('crud.save')}}</button>
                        </form>
                        @else
                        <div>
                            <div class="text-center">
                                <p>{{__('reports.auth_medical')}}.</p>
                            </div>
                            <label class="label-title" for="toxic_summary">{{ __('reports.toxic_summary') }}:</label>
                            <p>{{ $report->toxic_summary ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="health_situation_at_entry">{{
                                __('reports.health_situation_at_entry') }}:</label>
                            <p>{{ $report->health_situation_at_entry ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="phisical_health_evo">{{ __('reports.phisical_health_evo')
                                }}:</label>
                            <p>{{ $report->phisical_health_evo ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="toxic_control_and_analysis">{{
                                __('reports.toxic_control_and_analysis') }}:</label>
                            <p>{{ $report->toxic_control_and_analysis ?: __('reports.no_available_data') }}</p>

                            <label class="label-title" for="analytics">{{__('reports.other_health_atentions')}}</label>
                            <p>{{ $report->other_health_atentions ?: __('reports.no_available_data') }}</p>

                            <label class="label-title"
                                for="diagnosis_third_axis">{{__('reports.diagnosis_third_axis')}}:</label>
                            <p>{{ $report->diagnosis_third_axis ?: __('reports.no_available_data') }}</p>

                            <label class="label-title"
                                for="treatment_at_discharge">{{__('reports.treatment_at_discharge')}}:</label>
                            <p>{{ $report->treatment_at_discharge ?: __('reports.no_available_data') }}</p>
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
                        <form action="{{ route('reports.update', $report) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="start_valoration">{{__('reports.start_valoration')}}:</label>
                                <textarea class="form-control" id="start_valoration"
                                    name="start_valoration">{{ old('start_valoration', $report->start_valoration) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="psycho_valoration">{{__('reports.psycho_valoration')}}:</label>
                                <textarea class="form-control" id="psycho_valoration"
                                    name="psycho_valoration">{{ old('psycho_valoration', $report->psycho_valoration) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label
                                    for="diagnosis_first_and_second_axis">{{__('reports.diagnosis_first_and_second_axis')}}:</label>
                                <textarea class="form-control" id="diagnosis_first_and_second_axis"
                                    name="diagnosis_first_and_second_axis">{{ old('diagnosis_first_and_second_axis', $report->diagnosis_first_and_second_axis) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label
                                    for="psycho_intervention_objectives">{{__('reports.psycho_intervention_objectives')}}:</label>
                                <textarea class="form-control" id="psycho_intervention_objectives"
                                    name="psycho_intervention_objectives">{{ old('psycho_intervention_objectives', $report->psycho_intervention_objectives) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="motivation">{{__('reports.motivation')}}:</label>
                                <textarea class="form-control" id="motivation"
                                    name="motivation">{{ old('motivation', $report->motivation) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="situation_at_discharge">{{__('reports.situation_at_discharge')}}:</label>
                                <textarea class="form-control" id="situation_at_discharge"
                                    name="situation_at_discharge">{{ old('situation_at_discharge', $report->situation_at_discharge) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label
                                    for="individual_intervention_needed">{{__('reports.individual_intervention_needed')}}:</label>
                                <textarea class="form-control" id="individual_intervention_needed"
                                    name="individual_intervention_needed">{{ old('individual_intervention_needed', $report->individual_intervention_needed) }}</textarea>
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
                        <p>{{ $report->start_valoration ?: __('reports.no_available_data') }}</p>
                        <label class="label-title" for="psycho_valoration">{{__('reports.psycho_valoration')}}:</label>
                        <p>{{ $report->psycho_valoration ?: __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="diagnosis_first_and_second_axis">{{__('reports.diagnosis_first_and_second_axis')}}:</label>
                        <p>{{ $report->diagnosis_first_and_second_axis ?: __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="psycho_intervention_objectives">{{__('reports.psycho_intervention_objectives')}}:</label>
                        <p>{{ $report->psycho_intervention_objectives ?: __('reports.no_available_data') }}</p>
                        <label class="label-title" for="motivation">{{__('reports.motivation')}}:</label>
                        <p>{{ $report->motivation ?: __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="situation_at_discharge">{{__('reports.situation_at_discharge')}}:</label>
                        <p>{{ $report->situation_at_discharge ?: __('reports.no_available_data') }}</p>
                        <label class="label-title"
                            for="individual_intervention_needed">{{__('reports.individual_intervention_needed')}}:</label>
                        <p>{{ $report->individual_intervention_needed ?: __('reports.no_available_data') }}</p>

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
                    <form action="{{ route('reports.update', $report) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label
                                for="center_adaptation_and_implication">{{__('reports.center_adaptation_and_implication')}}:</label>
                            <textarea class="form-control" id="center_adaptation_and_implication"
                                name="center_adaptation_and_implication">{{ old('center_adaptation_and_implication', $report->center_adaptation_and_implication) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="at_habits">{{__('reports.at_habits')}}:</label>
                            <textarea class="form-control" id="at_habits"
                                name="at_habits">{{ old('at_habits', $report->at_habits) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="at_activities">{{__('reports.at_activities')}}:</label>
                            <textarea class="form-control" id="at_activities"
                                name="at_activities">{{ old('at_activities', $report->at_activities) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="at_regulations">{{__('reports.at_regulations')}}:</label>
                            <textarea class="form-control" id="at_regulations"
                                name="at_regulations">{{ old('at_regulations', $report->at_regulations) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="at_workouts_or_formation">{{__('reports.at_workouts_or_formation')}}:</label>
                            <textarea class="form-control" id="at_workouts_or_formation"
                                name="at_workouts_or_formation">{{ old('at_workouts_or_formation', $report->at_workouts_or_formation) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="at_leisure_and_free_time">{{__('reports.at_leisure_and_free_time')}}:</label>
                            <textarea class="form-control" id="at_leisure_and_free_time"
                                name="at_leisure_and_free_time">{{ old('at_leisure_and_free_time', $report->at_leisure_and_free_time) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="mates_relation">{{__('reports.mates_relation')}}:</label>
                            <textarea class="form-control" id="mates_relation"
                                name="mates_relation">{{ old('mates_relation', $report->mates_relation) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="employees_relation">{{__('reports.employees_relation')}}:</label>
                            <textarea class="form-control" id="employees_relation"
                                name="employees_relation">{{ old('employees_relation', $report->employees_relation) }}</textarea>
                        </div>
                        <button type="submit" class="btn float-right">{{__('crud.save')}}</button>
                    </form>
                    @else
                    <div>
                        <div class="text-center">
                            <p>{{__('reports.auth_educator')}}.</p>
                        </div>
                        <label class="label-title"
                            for="center_adaptation_and_implication">{{__('reports.center_adaptation_and_implication')}}:</label>
                        <p>{{ $report->center_adaptation_and_implication ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="at_habits">{{__('reports.at_habits')}}:</label>
                        <p>{{ $report->at_habits ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="at_activities">{{__('reports.at_activities')}}:</label>
                        <p>{{ $report->at_activities ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="at_regulations">{{__('reports.at_regulations')}}:</label>
                        <p>{{ $report->at_regulations ?: __('reports.no_available_data') }}</p>

                        <label class="label-title"
                            for="at_workouts_or_formation">{{__('reports.at_workouts_or_formation')}}:</label>
                        <p>{{ $report->at_workouts_or_formation ?: __('reports.no_available_data') }}</p>

                        <label class="label-title"
                            for="at_leisure_and_free_time">{{__('reports.at_leisure_and_free_time')}}:</label>
                        <p>{{ $report->at_leisure_and_free_time ?: __('reports.no_available_data') }}</p>

                        <label class="label-title" for="mates_relation">{{__('reports.mates_relation')}}:</label>
                        <p>{{ $report->mates_relation ?: __('reports.no_available_data') }}</p>

                        <label class="label-title"
                            for="employees_relation">{{__('reports.employees_relation')}}:</label>
                        <p>{{ $report->employees_relation ?: __('reports.no_available_data') }}</p>
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
                    <form action="{{ route('reports.update', $report) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label
                                for="reference_familiars_and_impication_degree">{{__('reports.reference_familiars_and_impication_degree')}}:</label>
                            <textarea class="form-control" id="reference_familiars_and_impication_degree"
                                name="reference_familiars_and_impication_degree">{{ old('reference_familiars_and_impication_degree', $report->reference_familiars_and_impication_degree) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="familiar_relation_and_evo">{{__('reports.familiar_relation_and_evo')}}:</label>
                            <textarea class="form-control" id="familiar_relation_and_evo"
                                name="familiar_relation_and_evo">{{ old('familiar_relation_and_evo', $report->familiar_relation_and_evo) }}</textarea>
                        </div>

                        <button type="submit" class="btn float-right">{{__('crud.save')}}</button>

                    </form>
                    @else
                    <div class="text-center">
                        <p>{{__('reports.auth_worker')}}</p>
                    </div>
                    <label class="label-title"
                        for="reference_familiars_and_impication_degree">{{__('reports.reference_familiars_and_impication_degree')}}:</label>
                    <p>{{ $report->reference_familiars_and_impication_degree ?: 'No hay datos disponibles' }}</p>

                    <label class="label-title"
                        for="familiar_relation_and_evo">{{__('reports.familiar_relation_and_evo')}}:</label>
                    <p>{{ $report->familiar_relation_and_evo ?: 'No hay datos disponibles' }}</p>

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
                    <form action="{{ route('reports.update', $report) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="rationale_for_departure">{{__('reports.rationale_for_departure')}}:</label>
                            <textarea class="form-control" id="rationale_for_departure"
                                name="rationale_for_departure">{{ old('rationale_for_departure', $report->rationale_for_departure) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label
                                for="intervention_objectives_after_the_end">{{__('reports.intervention_objectives_after_the_end')}}:</label>
                            <textarea class="form-control" id="intervention_objectives_after_the_end"
                                name="intervention_objectives_after_the_end">{{ old('intervention_objectives_after_the_end', $report->intervention_objectives_after_the_end) }}</textarea>
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
    </div>

    <script>
        $(document).ready(function() {
                $('[data-toggle="collapse"]').on('click', function() {
                    var target = $(this).data('target');
                    var icon = $(this).find('.collapse-icon');
                    $(target).on('show.bs.collapse', function () {
                        icon.addClass('rotate-180');
                    }).on('hide.bs.collapse', function () {
                        icon.removeClass('rotate-180');
                    });
                });
            });

    </script>
    @endsection
