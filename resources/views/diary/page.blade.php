@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/reports.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/edit.css') }}">
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <h1 class="mt-3 mb-3 text-center">{{ __('diary.diary_page') }} ({{ $date->format('d/m/Y') }})</h1>
        <div class="container">

            {{-- Mañana --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('diary.dayparts.morning') }}</span>
                    <div class="ml-auto">
                        <a href="{{ route('shifts.edit', $morning_shift) }}" class="btn"><i class='bx bx-pencil'></i> <span
                                class="modify-button">{{ __('crud.modify') }}</span></a>
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
                                        <li class="list-group-item">{{ $employee->name ?? ''}}</li>
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

                <div id="collapse-activities" class="collapse hide">
                    <div class="card-body">
                        <div class="activities-container">
                            @if (!empty($acitivities))
                                <table class="table table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>{{ __('diary.type') }}</th>
                                            <th>{{ __('diary.assistants') }}</th>
                                            <th>{{ __('diary.reducted') }}</th>
                                            <th>{{ __('diary.justified') }}</th>
                                            <th>{{ __('diary.no_justified') }}</th>
                                            <th>{{ __('crud.edit') }}</th>
                                        </tr>
                                    </thead>
                            @endif
                            @forelse ($activities as $activity)
                                <td>{{ $activity->type }}</td>
                                <td>
                                    @foreach ($assistants as $assitant)
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($reducteds as $reducted)
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($justifieds as $justified)
                                    @endforeach
                                </td>
                                <td>
                                    @foreach ($no_justifieds as $unjustified)
                                    @endforeach
                                </td>
                            @empty
                                {{ __('diary.no_activities') }}
                            @endforelse
                            @if (!empty($activities))
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Rebajas --}}
            <div class="card">
                <div class="card-header  d-flex justify-content-between align-items-center">{{ __('diary.reductions') }}
                    <button class="btn-down ml-auto float-right" data-toggle="collapse" data-target="#collapse-reductions"
                        aria-expanded="true" aria-controls="collapse-reductions">
                        <i class='bx bxs-down-arrow collapse-icon'></i>
                    </button>
                </div>
                <div id="collapse-reductions" class="collapse hide">
                    <div class="card-body">
                        @if (!empty($reductions))
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ __('patients.singular') }}</th>
                                        <th>{{ __('diary.reduction.total') }}</th>
                                        <th>{{ __('diary.reduction.partial') }}</th>
                                        <th>{{ __('diary.reduction.sport') }}</th>
                                    </tr>
                                </thead>
                        @endif
                        @forelse ($reductions as $intervention)
                            <td>{{ $intervention->patient->number ?? '' }} {{ $intervention->patient->name }}</td>
                            <td>{{ $intervention->patient->tutors() ?? '' }}</td>
                            <td>{{ $intervention->intervention }}</td>
                        @empty
                        @endforelse
                        @if (!empty($reductions))
                            </table>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Intervenciones --}}
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ __('diary.interventions') }}</span>
                    <div class="ml-auto">
                        <a href="{{ route('home', $morning_shift) }}" class="btn"><i class='bx bx-message-alt-add'></i>
                            <span class="modify-button">{{ __('crud.add') }}</span></a>
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
                            <table class="table table-striped">
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
                            {{ __('diary.no_interventions') }}
                        @endforelse
                        @if (!empty($interventions))
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
                        <a href="{{ route('shifts.edit', $afternoon_shift) }}" class="btn"><i class='bx bx-pencil'></i> <span
                                class="modify-button">{{ __('crud.modify') }}</span></a>
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
                                            {{ $employee->name ?? ''}}
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
                        <a href="{{ route('shifts.edit', $night_shift) }}" class="btn"><i class='bx bx-pencil'></i> <span
                                class="modify-button">{{ __('crud.modify') }}</span></a>
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
                                            {{ $employee->name ?? ''}}
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
