@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="container-fluid pt-3">
        <a href="{{ route('home') }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-10">

                <!-- Area de intervencion social -->
                <form action="{{ route('reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-3">
                        <div class="card-header">Social Intervention Area
                            <button class="btn btn-link float-right" data-toggle="collapse" data-target="#collapse-social-area" aria-expanded="true" aria-controls="collapse-social-area">
                                <i class='bx bxs-down-arrow'></i>
                            </button>
                        </div>
                        <div id="collapse-social-area" class="collapse hide">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="social_intervention_area">Social Intervention Area:</label>
                                    <textarea class="form-control" id="social_intervention_area" name="social_intervention_area">{{ old('social_intervention_area', $report->social_intervention_area) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="social_familiar_situation">Socio-family Situation:</label>
                                    <textarea class="form-control" id="social_familiar_situation" name="social_familiar_situation">{{ old('social_familiar_situation', $report->social_familiar_situation) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="professional_situation">Labor and Training Situation:</label>
                                    <textarea class="form-control" id="professional_situation" name="professional_situation">{{ old('professional_situation', $report->professional_situation) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="jury_situation">Judicial Situation:</label>
                                    <textarea class="form-control" id="jury_situation" name="jury_situation">{{ old('jury_situation', $report->jury_situation) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="evo_and_objectives">Progress and Objectives Achieved:</label>
                                    <textarea class="form-control" id="evo_and_objectives" name="evo_and_objectives">{{ old('evo_and_objectives', $report->evo_and_objectives) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="social_diagnosis">Social Diagnosis (Axis IV in DSM IV-R):</label>
                                    <textarea class="form-control" id="social_diagnosis" name="social_diagnosis">{{ old('social_diagnosis', $report->social_diagnosis) }}</textarea>
                                </div>
                                <button type="submit" class="btn float-right">Update</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Área de salud -->
                <form action="{{ route('reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-3">
                        <div class="card-header">Health Area</div>
                        <div class="collapse-health-area">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="toxic_summary">Summary of Toxicological History:</label>
                                    <textarea class="form-control" id="toxic_summary" name="toxic_summary">{{ old('toxic_summary', $report->toxic_summary) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="health_situation_at_entry">Health Situation at Entry:</label>
                                    <textarea class="form-control" id="health_situation_at_entry" name="health_situation_at_entry">{{ old('health_situation_at_entry', $report->health_situation_at_entry) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phisical_health_evo">Evolution of Physical Health during the
                                        Program:</label>
                                    <textarea class="form-control" id="phisical_health_evo" name="phisical_health_evo">{{ old('phisical_health_evo', $report->phisical_health_evo) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phisical_health_evo_and_valoration">Assessment of the Evolution of Physical
                                        Health. Medical Care:</label>
                                    <textarea class="form-control" id="phisical_health_evo_and_valoration" name="phisical_health_evo_and_valoration">{{ old('phisical_health_evo_and_valoration', $report->phisical_health_evo_and_valoration) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="toxic_control_and_analysis">Toxicological Tests and Controls during the
                                        Program:</label>
                                    <textarea class="form-control" id="toxic_control_and_analysis" name="toxic_control_and_analysis">{{ old('toxic_control_and_analysis', $report->toxic_control_and_analysis) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="analytics">Toxicological Tests and Controls:</label>
                                    <textarea class="form-control" id="analytics" name="analytics">{{ old('analytics', $report->analytics) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="other_health_atentions">Other Medical Care during the Program:</label>
                                    <textarea class="form-control" id="other_health_atentions" name="other_health_atentions">{{ old('other_health_atentions', $report->other_health_atentions) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="toxic_control_and_analysis_at_entry">Toxicological Controls and
                                        Detoxification
                                        Status at Entry:</label>
                                    <textarea class="form-control" id="toxic_control_and_analysis_at_entry" name="toxic_control_and_analysis_at_entry">{{ old('toxic_control_and_analysis_at_entry', $report->toxic_control_and_analysis_at_entry) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="diagnosis_third_axis">Diagnosis (Axis III in DSM IV):</label>
                                    <textarea class="form-control" id="diagnosis_third_axis" name="diagnosis_third_axis">{{ old('diagnosis_third_axis', $report->diagnosis_third_axis) }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="treatment_at_discharge">Situation and Treatment at Discharge:</label>
                                    <textarea class="form-control" id="treatment_at_discharge" name="treatment_at_discharge">{{ old('treatment_at_discharge', $report->treatment_at_discharge) }}</textarea>
                                </div>
                                <button type="submit" class="btn float-right">Update</button>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Área psicológica --}}
                <form action="{{ route('reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-3">
                        <div class="card-header">Psychological Area</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="start_valoration">Initial Assessment:</label>
                                <textarea class="form-control" id="start_valoration" name="start_valoration">{{ old('start_valoration', $report->start_valoration) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="motivation_valoration">Initial Assessment (towards the program, towards
                                    abstinence, and lifestyle change):</label>
                                <textarea class="form-control" id="motivation_valoration" name="motivation_valoration">{{ old('motivation_valoration', $report->motivation_valoration) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="psycho_valoration">Psychological Evaluation: Instruments, Exploratory Tests,
                                    Dual Diagnosis. Evaluation Conclusions:</label>
                                <textarea class="form-control" id="psycho_valoration" name="psycho_valoration">{{ old('psycho_valoration', $report->psycho_valoration) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="diagnosis_first_and_second_axis">Diagnosis (Axis I and II in DSM-IV):</label>
                                <textarea class="form-control" id="diagnosis_first_and_second_axis" name="diagnosis_first_and_second_axis">{{ old('diagnosis_first_and_second_axis', $report->diagnosis_first_and_second_axis) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="psycho_intervention_objectives">Intervention and Objectives: Progress:</label>
                                <textarea class="form-control" id="psycho_intervention_objectives" name="psycho_intervention_objectives">{{ old('psycho_intervention_objectives', $report->psycho_intervention_objectives) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="motivation">Motivation (towards abstinence and lifestyle change):</label>
                                <textarea class="form-control" id="motivation" name="motivation">{{ old('motivation', $report->motivation) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="develop_and_therapeutic_outgoings_valoration">Motivation (towards abstinence
                                    and lifestyle change):</label>
                                <textarea class="form-control" id="develop_and_therapeutic_outgoings_valoration"
                                    name="develop_and_therapeutic_outgoings_valoration">{{ old('develop_and_therapeutic_outgoings_valoration', $report->develop_and_therapeutic_outgoings_valoration) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="situation_at_discharge">Situation at Discharge:</label>
                                <textarea class="form-control" id="situation_at_discharge" name="situation_at_discharge">{{ old('situation_at_discharge', $report->situation_at_discharge) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="individual_intervention_needed">Required Individual Psychological
                                    Intervention:</label>
                                <textarea class="form-control" id="individual_intervention_needed" name="individual_intervention_needed">{{ old('individual_intervention_needed', $report->individual_intervention_needed) }}</textarea>
                            </div>

                            <button type="submit" class="btn float-right">Update</button>

                        </div>
                    </div>
                </form>

                <!-- Área Educativa -->
                <form action="{{ route('reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-3">
                        <div class="card-header">Educational Area</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="center_adaptation_and_implication">Degree of Adaptation to the Center and
                                    Involvement in its Different Components:</label>
                                <textarea class="form-control" id="center_adaptation_and_implication" name="center_adaptation_and_implication">{{ old('center_adaptation_and_implication', $report->center_adaptation_and_implication) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="at_habits">Regarding Habits:</label>
                                <textarea class="form-control" id="at_habits" name="at_habits">{{ old('at_habits', $report->at_habits) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="at_activities">Regarding Activities-Responsibilities:</label>
                                <textarea class="form-control" id="at_activities" name="at_activities">{{ old('at_activities', $report->at_activities) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="at_regulations">Regarding Regulations:</label>
                                <textarea class="form-control" id="at_regulations" name="at_regulations">{{ old('at_regulations', $report->at_regulations) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="at_workouts_or_formation">Regarding Workshops or Training:</label>
                                <textarea class="form-control" id="at_workouts_or_formation" name="at_workouts_or_formation">{{ old('at_workouts_or_formation', $report->at_workouts_or_formation) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="at_leisure_and_free_time">Regarding Leisure and Free Time:</label>
                                <textarea class="form-control" id="at_leisure_and_free_time" name="at_leisure_and_free_time">{{ old('at_leisure_and_free_time', $report->at_leisure_and_free_time) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="mates_relation">Relationship with Peers:</label>
                                <textarea class="form-control" id="mates_relation" name="mates_relation">{{ old('mates_relation', $report->mates_relation) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="employees_relation">Relationship with the Therapeutic Team:</label>
                                <textarea class="form-control" id="employees_relation" name="employees_relation">{{ old('employees_relation', $report->employees_relation) }}</textarea>
                            </div>

                            <button type="submit" class="btn float-right">Update</button>

                        </div>
                    </div>
                </form>

                <!-- Área de Intervención Familiar -->
                <form action="{{ route('reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-3">
                        <div class="card-header">Family Intervention Area</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="reference_familiars_and_impication_degree">Family Members Involved in the
                                    Program and their Level of Involvement:</label>
                                <textarea class="form-control" id="reference_familiars_and_impication_degree"
                                    name="reference_familiars_and_impication_degree">{{ old('reference_familiars_and_impication_degree', $report->reference_familiars_and_impication_degree) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="familiar_relation_and_evo">Relationship with the Family and Evolution:</label>
                                <textarea class="form-control" id="familiar_relation_and_evo" name="familiar_relation_and_evo">{{ old('familiar_relation_and_evo', $report->familiar_relation_and_evo) }}</textarea>
                            </div>

                            <button type="submit" class="btn float-right">Update</button>

                        </div>
                    </div>
                </form>

                <!-- Orientación de Seguimiento -->
                <form action="{{ route('reports.update', $report) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card mb-3">
                        <div class="card-header">Follow-up Guidance</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="guidance_for_follow_up">Follow-up Guidance for the Reference Unit:</label>
                                <textarea class="form-control" id="guidance_for_follow_up" name="guidance_for_follow_up">{{ old('guidance_for_follow_up', $report->guidance_for_follow_up) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="rationale_for_departure">Reasons for Discharge:</label>
                                <textarea class="form-control" id="rationale_for_departure" name="rationale_for_departure">{{ old('rationale_for_departure', $report->rationale_for_departure) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="intervention_objectives_after_the_end">Intervention Objectives after Program
                                    Completion at the Center:</label>
                                <textarea class="form-control" id="intervention_objectives_after_the_end"
                                    name="intervention_objectives_after_the_end">{{ old('intervention_objectives_after_the_end', $report->intervention_objectives_after_the_end) }}</textarea>
                            </div>

                            <button type="submit" class="btn float-right">Update</button>

                        </div>
                    </div>
                </form>

            </div>
        @endsection
