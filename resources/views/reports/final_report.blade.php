<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @page {
            margin: 3cm 1.5cm 3cm 3cm;
            font-family: sans-serif
        }

        .header {
            position: fixed;
            top: -3cm;
            text-align: center;
            width: 100%;
        }

        .imgHeader {
            display: inline-block;
            width: 18cm;
            height: auto;
        }

        .content {
            margin-top: 5cm;
        }

        table {
            width: 100%;
            text-align: center;
        }

        .bloque {
            width: 2cm;
            height: 1cm;
            margin: 2cm;
        }

        h1,
        h3,
        {
        font-family: sans-serif;
        color: #951516;
        text-transform: uppercase;
        text-decoration: underline;
        }

        h3 {
            margin-left: 1cm
        }

        .user-info {
            border: 1px solid black;
            margin: 0;
            padding: 0 0.2cm;
            font-size: 14px;
            line-height: 30px
        }

        span {
            font-weight: 700;
        }

        .span-info {
            font-family: sans-serif !important;
            font-weight: 500;
        }

        .report-title {
            text-align: center;
            color: black;
            font-size: 24px;
        }

        .area-container {
            margin-top: 1cm
        }

        li,
        p {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="imgHeader">
            <img src="{{ asset('img/headerImg.png') }}" alt="Gespatiens" style="width: 100%; height: auto;">
        </div>
    </div>
    <div class="container">
        <h1 class="report-title">{{ __('reports.final_report') }}</h1>
        <div class="user-info">
            <span>{{ __('patients.surnameAndName') }}:</span> <span
                style="font-weight: 400">{{ $finalReport->report->patient->full_name ?? '' }}</span><br>
            <span>{{ __('patients.birth_date') }}: </span><span
                style="font-weight: 400">{{ $finalReport->report->patient->birth_date ?? '' }}</span>
            <span style="float:right; margin.left: auto; margin-right: 4cm">DNI: <span
                    style="font-weight: 400">{{ $finalReport->report->patient->dni }}</span></span><br>
            <span>{{ __('patients.center') }}: </span><span style="font-weight: 400">Comunidad Terapéutica Los
                Vientos</span><br>
            <span>{{ __('reports.request_number') }}: </span><span
                style="font-weight: 400">{{ $finalReport->request_number ?? '' }}</span><br>
            <span>{{ __('patients.entry_date') }}: </span><span
                style="font-weight: 400">{{ $finalReport->report->patient->entry_date ?? '' }}</span>
            <span style="float:right; margin.left: auto; margin-right: 4cm">SIP: <span
                    style="font-weight: 400">{{ $finalReport->report->patient->sip ?? '' }}</span></span><br>
            <span>{{ __('patients.exit_date') }}: </span><span
                style="font-weight: 400">{{ $finalReport->report->patient->exit_date ?? '' }}</span><br>
            <span>{{ __('patients.exit_reason') }}: </span><span
                style="font-weight: 400">{{ $finalReport->discharge_fundamentals ?? '' }}</span><br>
        </div>

        <div class="area-container">
            <h3>{{ __('reports.social_area') }}</h3>
            <ul>
                <li>{{ __('reports.social_familiar_situation') }}:</li>
                <p>{{ $finalReport->report->social_familiar_situations }}</p>
                <li>{{ __('reports.professional_situation') }}:</li>
                <p>{{ $finalReport->report->laboral_educative_economical_situation ?? '' }}</p>
                <li>{{ __('reports.jury_situation') }}:</li>
                <p>{{ $finalReport->report->judicial_situation ?? '' }}</p>
                <li>{{ __('reports.evo_and_objectives') }}:</li>
                <p>{{ $finalReport->report->social_evo_and_objectives ?? '' }}</p>
                <li>{{ __('reports.social_diagnosis') }}:</li>
                <p>{{ $finalReport->report->social_diagnosis ?? '' }}</p>
            </ul>
        </div>

        <div class="area-container">
            <h3>{{ __('reports.health_intervention_area') }}</h3>
            <ul>
                <li>{{ __('reports.toxic_summary') }}:</li>
                <p>{{ $finalReport->report->about_toxicology ?? '' }}</p>
                <li>{{ __('reports.health_situation_at_entry') }}:</li>
                <p>{{ $finalReport->report->health_at_entry }}</p>
                <li>{{ __('reports.phisical_health_evo') }}:</li>
                <p>{{ $finalReport->report->physical_health_condition ?? '' }}</p>
                <li>{{ __('reports.toxic_control_and_analysis') }}:</li>
                <p>{{ $finalReport->report->toxicological_controls ?? '' }}</p>
                <li>{{ __('reports.other_health_atentions') }}:</li>
                <p>{{ $finalReport->other_medical_attention ?? '' }}</p>
                <li>{{ __('reports.diagnosis_third_axis') }}:</li>
                <p>{{ $finalReport->report->health_diagnosis ?? '' }}</p>
                <li>{{ __('reports.health_situation_at_discharge') }}:</li>
                <p>{{ $finalReport->health_situation_at_discharge ?? '' }}</p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.psycho_area') }}</h3>
            <ul>
                <li>{{ __('reports.start_valoration') }}:</li>
                <p>{{ $finalReport->report->psycho_entry_valoration ?? '' }}</p>
                <li>{{ __('reports.psycho_valoration') }}:</li>
                <p>{{ $finalReport->report->psycho_evaluation_with_instruments ?? '' }}</p>
                <li>{{ __('reports.diagnosis_first_and_second_axis') }}:</li>
                <p>{{ $finalReport->report->psycho_diagnosis ?? '' }}</p>
                <li>{{ __('reports.psycho_intervention_objectives') }}:</li>
                <p>{{ $finalReport->report->psycho_interventions ?? '' }}</p>
                <li>{{ __('reports.motivation') }}:</li>
                <p>{{ $finalReport->report->about_motivation ?? '' }}</p>
                <li>{{ __('reports.develop_and_therapeutic_outgoings_valoration') }}:</li>
                <p>{{ $finalReport->$finalReport->psycho_outgoings_value ?? '' }}</p>
                <li>{{ __('reports.situation_at_discharge') }}:</li>
                <p>{{ $finalReport->report->psycho_situation_at_discharge ?? '' }}</p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.educative_area') }}</h3>
            <ul>
                <li>{{ __('reports.center_adaptation_and_implication') }}:</li>
                <ul>
                    <li>{{ __('reports.at_habits') }}</li>
                    <p>{{ $finalReport->report->habit_adaptation ?? '' }}</p>
                    <li>{{ __('reports.at_activities') }}</li>
                    <p>{{ $finalReport->report->activities_adaptation ?? '' }}</p>
                    <li>{{ __('reports.at_regulations') }}</li>
                    <p>{{ $finalReport->report->normativity_adaptation ?? '' }}</p>
                    <li>{{ __('reports.at_workouts_or_formation') }}</li>
                    <p>{{ $finalReport->report->workout_adaptation ?? '' }}</p>
                    <li>{{ __('reports.at_leisure_and_free_time') }}</li>
                    <p>{{ $finalReport->report->leisure_adaptation ?? '' }}</p>
                </ul>
                <li>{{ __('reports.mates_relation') }}:</li>
                <p>{{ $finalReport->report->partners_relationship ?? '' }}</p>
                <li>{{ __('reports.employees_relation') }}:</li>
                <p>{{ $finalReport->report->therapeutic_crew_relationship ?? '' }}</p>
                <li>{{ __('reports.develop_and_therapeutic_outgoings_valoration') }}:</li>
                <p>{{ $finalReport->report->educative_outgoings_value ?? '' }}</p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.familiar_intervention_area') }}</h3>
            <ul>
                <li>{{ __('reports.reference_familiars_and_impication_degree') }}:</li>
                <p>{{ $finalReport->report->reference_familiars ?? '' }}</p>
                <li>{{ __('reports.familiar_relation_and_evo') }}:</li>
                <p>{{ $finalReport->report->familiar_evo_and_realtionship ?? '' }}</p>
                <li>{{ __('reports.familiar_situation_at_discharge') }}:</li>
                <p>{{ $finalReport->familiar_situation_at_discharge ?? '' }}</p>

            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.guidance_for_follow_up') }}</h3>
            <ul>
                <li>{{ __('reports.rationale_for_departure') }}:</li>
                <p>{{ $finalReport->discharge_fundamentals ?? '' }}</p>
                <li>{{ __('reports.intervention_objectives_after_the_end') }}:</li>
                <p>{{ $finalReport->familiar_situation_at_discharge ?? '' }}</p>
            </ul>
        </div>

        <div class="employees-container">
            <p>{{ __('reports.employees_name_role_signature') }}</p>
            @forelse ($employees as $employee)

            <p>- {{ $employee->name }}, {{ __('user.speciality.' .$employee->speciality) }}</p><br>
            <img src="{{ public_path('/storage/signatures/' . $employee->signature) }}"
                alt="{{ __('user.signature') }}">

            @empty

            @endforelse
        </div>
        <div class="direction-container">
            <p>{{ __('reports.direction_date_signature') }}</p>
        </div>
    </div>
    <script type="text/php">
        if(isset($pdf)){
            $pdf->page_script('
                $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
                $pdf->text(300, 800, "$PAGE_NUM de $PAGE_COUNT", $font, 10);
            ');
        }
    </script>
</body>

</html>
