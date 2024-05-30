@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/edit.css') }}">
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <h1 class="mt-3 mb-3">{{ __('diary.diary_page') }} ({{ $date->format('d/m/Y') }})</h1>
        <div class="container">
            <div class="card">
                <div class="card-header">
                    {{ __('diary.dayparts.morning') }}
                </div>
                <div class="card-body">
                    <div class="shift-container">
                        <div class="educators-container">
                            <label for="">{{ __('diary.educators') }}:</label><br>
                            @if ($morning_shift != null)
                                @forelse ($morning_shift->users() as $employee)
                                    <p class="card-text">{{ $employee->name }}</p>
                                @empty
                                @endforelse
                            @endif
                        </div>
                        <div class="interseting-info">
                            <label>{{ __('diary.interesting_info') }}:</label><br>
                            <p class="card-text">{{ $morning_shift->interesting_info ?? '' }}</p>
                        </div>
                    </div>
                </div>
            </div>


            {{-- Actividades --}}
            <div class="card">
                <div class="card-header">{{ __('diary.activities.label') }}</div>
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

            {{-- Rebajas --}}
            <div class="card">
                <div class="card-header">{{ __('diary.reductions') }}</div>
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

            {{-- Intervenciones --}}
            <div class="card">
                <div class="card-header">{{ __('diary.interventions') }}</div>
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

            {{-- Tarde --}}
            <div class="card">
                <div class="card-header">{{ __('diary.dayparts.afternoon') }}</div>
                <div class="card-body">
                    <div class="shift-container">
                        <div class="educators-container">
                            @if ($afternoon_shift != null)
                                @forelse ($afternoon_shift->users() as $employee)
                                    {{ $employee->name }}
                                @empty
                                @endforelse
                            @endif
                        </div>
                        <div class="interseting-info">
                            {{ $afternoon_shift->interseting_info ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Noche --}}
            <div class="card">
                <div class="card-header">{{ __('diary.dayparts.night') }}</div>
                <div class="card-body">
                    <div class="shift-container">
                        <div class="educators-container">
                            @if ($night_shift != null)
                                @forelse ($night_shift->users() as $employee)
                                    {{ $employee->name }}
                                @empty
                                @endforelse
                            @endif
                        </div>
                        <div class="interseting-info">
                            {{ $night_shift->interseting_info ?? '' }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
