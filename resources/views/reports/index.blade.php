@extends('layouts.app')
@section('css')
@parent
@endsection
@section('content')
<div class="wrapper d-flex flex-column">
    <h1 class="mt-3 mb-3">{{__('reports.plural')}}</h1>
    @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
    <div class="container">
        <div class="row">
            @forelse ($reports as $report)
            <div class="col-md-4">
                @if(isset($report->finalReport))
                <a href="{{ route('reports.final_report_form', $report->patient_id) }}">
                    @elseif(isset($report->midStayReport))
                    <a href="{{ route('reports.mid_stay_report_form', $report->patient_id) }}">
                        @endif
                        <div class="card report-card mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="report-name"><span>{{ $report->patient->full_name }}</span></div>
                                <div class="report-type">
                                    @if(isset($report->finalReport))
                                    <span>{{ __('reports.final_report') }}</span>
                                    @elseif(isset($report->midStayReport))
                                    <span>{{ __('reports.mid_stay_report') }}</span>
                                    @endif
                                </div>
                                <div class="report-date">
                                    {{$report->created_at->format('d/m/Y')}}
                                </div>
                            </div>
                        </div>
                    </a>
            </div>
            @empty
            <div class="col">
                <span>{{__('reports.no_reports')}}</span>
            </div>
            @endforelse
        </div>
        {{ $reports->links() }}
    </div>
    @endsection
