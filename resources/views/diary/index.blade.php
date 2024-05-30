@extends('layouts.app')
@section('css')
    @parent
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <h1 class="mt-3 mb-3">{{ __('diary.diary_page') }} - {{ $date }}</h1>
        <div class="container">
            {{-- Mañana --}}
            <h5>{{ __('diary.dayparts.morning')}}</h5>
            <div class="shift-container">
                <div class="educators-container">

                </div>
                <div class="interseting-info">

                </div>
            </div>

            {{-- Actividades --}}
            <h5>{{ __('diary.activities.label')}}</h5>
            <div class="activities-container">
                @if (!empty($acitivities))
                    <table class="table table-striped">
                        <thead>
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
            {{-- Intervenciones --}}
            <h5>{{ __('diary.interventions')}}</h5>
            @if (!empty($interventions))
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('patient.singular') }}</th>
                            <th>{{ __('patient.tutors') }}</th>
                            <th>{{ __('diary.intervention') }}</th>
                        </tr>
                    </thead>
            @endif
            @forelse ($interventions as $intervention)
                    <td>{{$intervention->patient->number ?? ''}} {{$intervention->patient->name}}</td>
                    <td>{{$intervention->patient->tutors() ?? ''}}</td>
                    <td>{{$intervention->intervention}}</td>
            @empty
                {{ __('diary.no_interventions') }}
            @endforelse
            @if (!empty($interventions))
                </table>
            @endif
            {{-- Tarde --}}
            <h5>{{ __('diary.dayparts.afternoon')}}</h5>
            <div class="shift-container">
                <div class="educators-container">

                </div>
                <div class="interseting-info">

                </div>
            </div>
            {{-- Noche --}}
            <h5>{{ __('diary.dayparts.night')}}</h5>
            <div class="shift-container">
                <div class="educators-container">

                </div>
                <div class="interseting-info">

                </div>
            </div>
        </div>
    </div>
@endsection
