@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" href="{{ asset('/css/reports.css') }}">
<link rel="stylesheet" href="{{ asset('/css/edit.css') }}">
@endsection
@section('content')
<div class="wrapper d-flex flex-column">
    <a href="{{ route('diary.diaryForm') }}" class="goBackBtn btn mr-auto mt-3 float-left"><i
            class='bx bx-left-arrow-alt'></i></a>
    <h1 class="mt-3 mb-3 text-center">{{ __('diary.diary_page') }} ({{ $date->format('d/m/Y') }})</h1>
    <div class="container">
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ __('success.' . session('success')) }}
        </div>
    @endif
        {{-- Mañana --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ __('diary.dayparts.morning') }}</span>
                <div class="ml-auto">
                    <a href="{{ route('shifts.edit', $morning_shift) }}" class="btn"><i class='bx bx-pencil'></i>
                        <span class="modify-button">{{ __('crud.modify') }}</span></a>
                </div>
                <button class="btn-down  float-right" data-toggle="collapse" data-target="#collapse-morning"
                    aria-expanded="true" aria-controls="collapse-morning">
                    <i class='bx bxs-down-arrow collapse-icon'></i>
                </button>
            </div>
            <div id="collapse-morning" class="collapse hide">
                <div class="card-body">
                    <div class="shift-container">
                        <div class="educators-container mb-2">
                            <label for="">{{ __('diary.educators') }}:</label><br>
                            @if ($morning_shift && $morning_shift->users())
                            <ul class="list-group">
                                @forelse ($morning_shift->users as $employee)
                                <li class="list-group-item">{{ $employee->name ?? '' }}</li>
                                @empty
                                @endforelse
                                @endif
                            </ul>
                        </div>
                        <div class="interseting-info">
                            <label>{{ __('diary.interesting_info') }}:</label><br>
                            <p class="card-text">{{ $morning_shift->interesting_info ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- Actividades --}}
        <div class="card">
            <div class="card-header  d-flex justify-content-between align-items-center">
                {{ __('diary.activities.label') }} <button class="btn-down ml-auto float-right" data-toggle="collapse"
                    data-target="#collapse-activities" aria-expanded="true" aria-controls="collapse-activities">
                    <i class='bx bxs-down-arrow collapse-icon'></i>
                </button></div>

            <div id="collapse-activities" class="collapse">
                <div class="card-body">
                    <div class="activities-container">
                        @if (!empty($activities))
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('activities.type') }}</th>
                                        <th>{{ __('activities.assistants') }}</th>
                                        <th>{{ __('activities.reducted') }}</th>
                                        <th>{{ __('activities.justified') }}</th>
                                        <th>{{ __('activities.no_justified') }}</th>
                                        <th class="text-center">{{ __('crud.manage') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($activities as $activity)
                                    <tr>
                                        <td>{{ __('activities.labels.' . $activity->type) }}
                                            @if ($activity->type == 'lesson')
                                            ({{ __('activities.lesson_type.' . $activity->lesson->type) }})
                                            @endif
                                            @if ($activity->type == 'therapeutic_group')
                                            ({{ $activity->therapeuticGroup->group }})
                                            @endif
                                        </td>
                                        <td class="patients-cell">
                                            @foreach ($activity->assistants as $assistant)
                                            {{ $assistant->number ?? $assistant->name }},
                                            @endforeach
                                        </td>
                                        <td class="patients-cell">
                                            @foreach ($activity->reducteds as $reducted)
                                            {{ $reducted->number ?? $reducted->name }},
                                            @endforeach
                                        </td>
                                        <td class="patients-cell">
                                            @foreach ($activity->justifieds as $justified)
                                            {{ $justified->number ?? $justified->name }},
                                            @endforeach
                                        </td>
                                        <td class="patients-cell">
                                            @foreach ($activity->no_justifieds as $unjustified)
                                            {{ $unjustified->number ?? $unjustified->name }},
                                            @endforeach
                                        </td>
                                        <td class="text-center"><a class="btn col-8"
                                                href="{{ route('activities.edit_attendance', $activity) }}"><i class='bx bx-pencil'></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">{{ __('diary.no_activities') }}</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        {{-- Rebajas --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                {{ __('diary.reductions') }}
                <div class="ml-auto">
                    @if (Auth::user()->speciality == 'admin' || Auth::user()->speciality == 'medical')
                    <a href="{{ route('reductions.create', $date) }}" class="btn"><i class='bx bx-band-aid'></i>
                        <span class="modify-button">{{ __('crud.add') }}</span></a>
                    @endif
                    <button class="btn-down ml-auto float-right" data-toggle="collapse"
                        data-target="#collapse-reductions" aria-expanded="true" aria-controls="collapse-reductions">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
            </div>
            <div id="collapse-reductions" class="collapse hide">
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('patients.singular') }}</th>
                                    <th>{{ __('diary.reduction.total') }}</th>
                                    <th>{{ __('diary.reduction.partial') }}</th>
                                    <th>{{ __('diary.reduction.sport') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($reductions as $reduction)
                                <tr>
                                    <td>{{ $reduction->patient->number ? $reduction->patient->number . ' - ' : '' }}
                                        {{ $reduction->patient->name }}</td>
                                    <td>
                                        @if ($reduction->total_reduction)
                                        {{ __('crud.yes') }}
                                        @else
                                        {{ __('crud.no') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($reduction->partial_reduction)
                                        {{ $reduction->partial_reduction }}
                                        @else
                                        {{ __('crud.no') }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($reduction->sport_reduction)
                                        {{ __('crud.yes') }}
                                        @else
                                        {{ __('crud.no') }}
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">{{ __('diary.no_reductions') }}</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{-- Intervenciones --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ __('diary.interventions') }}</span>
                <div class="ml-auto">
                    @if (Auth::user()->speciality == 'admin' || Auth::user()->speciality == 'psychologist' ||
                    Auth::user()->speciality == 'educator' )
                    <a href="{{ route('home', $morning_shift) }}" class="btn"><i class='bx bx-message-alt-add'></i>
                        <span class="modify-button">{{ __('crud.add') }}</span></a>
                    @endif
                    <button class="btn-down ml-auto float-right" data-toggle="collapse"
                        data-target="#collapse-interventions" aria-expanded="true"
                        aria-controls="collapse-interventions">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
            </div>
            <div id="collapse-interventions" class="collapse hide">
                <div class="card-body">
                    @if (!empty($interventions))
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{ __('patients.singular') }}</th>
                                <th>{{ __('patients.tutors') }}</th>
                                <th>{{ __('diary.intervention') }}</th>
                            </tr>
                        </thead>
                        @endif
                        @forelse ($interventions as $intervention)
                        <td>{{ $intervention->patient->number ?? '' }} {{ $intervention->patient->name }}</td>
                        <td>{{ $intervention->patient->tutors() ?? '' }}</td>
                        <td>{{ $intervention->intervention }}</td>
                        @empty
                        @endforelse
                        @if (!empty($interventions))
                    </table>
                    @endif
                </div>
            </div>
        </div>

        {{-- Salidas y llegadas --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ __('diary.outings_and_arrives') }}</span>
                <div class="ml-auto">
                    <a href="{{ route('outings.create', $date) }}" class="btn"><i class='bx bxs-plane-alt'></i>
                        <span class="modify-button">{{ __('crud.add') }}</span></a>
                    <button class="btn-down ml-auto float-right" data-toggle="collapse" data-target="#collapse-outings"
                        aria-expanded="true" aria-controls="collapse-outings">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
            </div>
            <div id="collapse-outings" class="collapse hide">
                <div class="card-body">
                    @if (!empty($outings))
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>{{ __('patients.singular') }}</th>
                                <th>{{ __('diary.outing_time') }}</th>
                                <th>{{ __('diary.return_time') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($outings as $outing)
                            <tr>
                                <td>{{ $outing->patient->number ?? '' }} {{ $outing->patient->name }}</td>
                                <td>{{ Carbon\Carbon::parse($outing->exit_date)->format('d-m-Y H:i') ?? '' }}</td>
                                <td>{{ Carbon\Carbon::parse($outing->return_date)->format('d-m-Y H:i') ?? ''}}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="2">No hay salidas registradas</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>

        </div>


        {{-- Tarde --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ __('diary.dayparts.afternoon') }}</span>
                <div class="ml-auto">
                    <a href="{{ route('shifts.edit', $afternoon_shift) }}" class="btn"><i class='bx bx-pencil'></i>
                        <span class="modify-button">{{ __('crud.modify') }}</span></a>
                    <button class="btn-down ml-auto float-right" data-toggle="collapse"
                        data-target="#collapse-afternoon" aria-expanded="true" aria-controls="collapse-afternoon">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
            </div>
            <div id="collapse-afternoon" class="collapse hide">
                <div class="card-body">
                    <div class="shift-container">
                        <div class="educators-container">
                            <div class="educators-container">
                                <label for="">{{ __('diary.educators') }}:</label><br>
                                @if ($afternoon_shift && $afternoon_shift->users()->count() > 0)
                                @forelse ($afternoon_shift->users as $employee)
                                {{ $employee->name ?? '' }}
                                @empty
                                @endforelse
                                @endif
                            </div>
                            <div class="interseting-info">
                                <label>{{ __('diary.interesting_info') }}:</label><br>
                                <p class="card-text">{{ $afternoon_shift->interesting_info ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Noche --}}
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>{{ __('diary.dayparts.night') }}</span>
                <div class="ml-auto">
                    <a href="{{ route('shifts.edit', $night_shift) }}" class="btn"><i class='bx bx-pencil'></i>
                        <span class="modify-button">{{ __('crud.modify') }}</span></a>
                    <button class="btn-down ml-auto float-right" data-toggle="collapse" data-target="#collapse-night"
                        aria-expanded="true" aria-controls="collapse-night">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
            </div>
            <div id="collapse-night" class="collapse hide">
                <div class="card-body">
                    <div class="shift-container">

                        <div class="educators-container">
                            <label for="">{{ __('diary.educators') }}:</label><br>
                            @if ($night_shift && $night_shift->users->count() > 0)
                            <p>
                                @forelse ($night_shift->users() as $employee)
                                {{ $employee->name ?? '' }}
                                @empty
                                @endforelse
                            </p>
                            @endif
                        </div>
                        <div class="interseting-info">
                            <label>{{ __('diary.interesting_info') }}:</label><br>
                            <p class="card-text">{{ $night_shift->interesting_info ?? '' }}</p>
                        </div>
                    </div>
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
    </script>
    @endsection
