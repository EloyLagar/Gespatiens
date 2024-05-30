@extends('layouts.app')
@section('css')
@parent
@endsection
@section('content')
<div class="wrapper d-flex flex-column">
    <h1 class="mt-3 mb-3">{{__('reports.plural')}}</h1>
    <div class="container">
        <div class="row">
            @forelse ($reports as $report)
            <div class="col-md-4">
                <a href="{{ route('reports.edit', $report) }}" class="text-decoration-none">
                    <div class="card report-card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div class="report-name"><span>{{ $report->patient->full_name }}</span></div>
                            <div class="report-type">
                                @if(isset($report->finalReport))
                                <span>{{ __('reports.final_report') }}</span>
                                @elseif(isset($report->midStayReport))
                                <span>{{ __('reports.mid_stay_reports') }}</span>
                                @endif
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
