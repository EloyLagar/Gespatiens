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

        h3{
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

        .area-container{
            margin-top:1cm
        }

        li, p{
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
        <h1 class="report-title">{{__('reports.final_report')}}</h1>
        <div class="user-info">
            <span>{{ __('patients.surnameAndName') }}:</span> <span style="font-weight: 400"></span><br>
            <span>{{ __('patients.birth_date') }}: </span><span style="font-weight: 400"></span>
            <span style="float:right; margin.left: auto; margin-right: 4cm">DNI: <span style="font-weight: 400"></span></span><br>
            <span>{{ __('patients.center') }}: </span><span style="font-weight: 400"></span><br>
            <span>{{ __('patients.request_number') }}: </span><span style="font-weight: 400"></span><br>
            <span>{{ __('patients.entry_date') }}: </span><span style="font-weight: 400"></span>
            <span style="float:right; margin.left: auto; margin-right: 4cm">SIP: <span style="font-weight: 400"></span></span><br>
            <span>{{ __('patients.exit_date') }}: </span><span style="font-weight: 400"></span><br>
            <span>{{ __('patients.exit_reason') }}: </span><span style="font-weight: 400"></span><br>
        </div>

        <div class="area-container">
            <h3>{{ __('reports.social_area') }}</h3>
            <ul>
                <li>{{ __('reports.social_familiar_situation') }}:</li>
                <p></p>
                <li>{{ __('reports.professional_situation') }}:</li>
                <p></p>
                <li>{{ __('reports.jury_situation') }}:</li>
                <p></p>
                <li>{{ __('reports.evo_and_objectives') }}:</li>
                <p></p>
                <li>{{ __('reports.social_diagnosis') }}:</li>
                <p></p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.health_intervention_area') }}</h3>
            <ul>
                <li>{{ __('reports.toxic_summary') }}:</li>
                <p></p>
                <li>{{ __('reports.health_situation_at_entry') }}:</li>
                <p></p>
                <li>{{ __('reports.phisical_health_evo') }}:</li>
                <p></p>
                <li>{{ __('reports.toxic_control_and_analysis') }}:</li>
                <p></p>
                <li>{{ __('reports.other_health_atentions') }}:</li>
                <p></p>
                <li>{{ __('reports.diagnosis_third_axis') }}:</li>
                <p></p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.psycho_area') }}</h3>
            <ul>
                <li>{{ __('reports.start_valoration') }}:</li>
                <p></p>
                <li>{{ __('reports.psycho_valoration') }}:</li>
                <p></p>
                <li>{{ __('reports.diagnosis_first_and_second_axis') }}:</li>
                <p></p>
                <li>{{ __('reports.psycho_intervention_objectives') }}:</li>
                <p></p>
                <li>{{ __('reports.motivation') }}:</li>
                <p></p>
                <li>{{ __('reports.develop_and_therapeutic_outgoings_valoration') }}:</li>
                <p></p>
                <li>{{ __('reports.situation_at_discharge') }}:</li>
                <p></p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.educative_area') }}</h3>
            <ul>
                <li>{{ __('reports.center_adaptation_and_implication') }}:</li>
                <ul>
                    <li>{{ __('reports.at_habits') }}</li>
                    <p></p>
                    <li>{{ __('reports.at_activities') }}</li>
                    <p></p>
                    <li>{{ __('reports.at_regulations') }}</li>
                    <p></p>
                    <li>{{ __('reports.at_workouts_or_formation') }}</li>
                    <p></p>
                    <li>{{ __('reports.at_leisure_and_free_time') }}</li>
                    <p></p>
                </ul>
                <li>{{ __('reports.mates_relation') }}:</li>
                <p></p>
                <li>{{ __('reports.employees_relation') }}:</li>
                <p></p>
                <li>{{ __('reports.develop_and_therapeutic_outgoings_valoration') }}:</li>
                <p></p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.familiar_intervention_area') }}</h3>
            <ul>
                <li>{{ __('reports.reference_familiars_and_impication_degree') }}:</li>
                <p></p>
                <li>{{ __('reports.familiar_relation_and_evo') }}:</li>
                <p></p>
                <li>{{ __('reports.situation_at_discharge') }}:</li>
                <p></p>
            </ul>
        </div>
        <div class="area-container">
            <h3>{{ __('reports.guidance_for_follow_up') }}</h3>
            <ul>
                <li>{{ __('reports.rationale_for_departure') }}:</li>
                <p></p>
                <li>{{ __('reports.intervention_objectives_after_the_end') }}:</li>
                <p></p>
            </ul>
        </div>

        <div class="employees-container">
            <p>{{ __('reports.employees_name_role_signature') }}</p>
            {{-- @foreach ($employees as $employee)
                <p>{{ $employee->name }}, {{ $employee->speciality }}</p><br>
                <img src="{{ asset('/storage/signatures/' . $employee->signature) }}"
                    alt="{{ __('user.signature') }}">
            @endforeach --}}
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
