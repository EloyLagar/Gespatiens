@extends('layouts.app')
@section('css')
    @parent
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <h1 class="mt-3 mb-3">{{ __('patients.resident.plural') }}</h1>
        @if (Auth::user()->speciality === 'admin')
            <div class="btn-container mb-3"><a href="{{ route('patients.create') }}" class="btn py-2">Create Patient</a></div>
        @endif
        <div class="container">
            <div class="row">
                @forelse ($residents as $patient)
                    <div class="col-md-4">
                        <a href="{{ route('patients.edit', $patient) }}" class="text-decoration-none">
                            <div class="card patient-card mb-3">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="patient-name"><span>{{ $patient->full_name }}</span></div>
                                    <div class="patient-number"><span> @php
                                        if ($patient->number) {
                                            echo $patient->number;
                                        }
                                    @endphp </span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col">
                        <span>There are no residents</span>
                    </div>
                @endforelse
            </div>
            <div class="pagination ml-auto justify-content-center float-md-right mb-3">
                {{ $residents->links() }}
            </div>
        </div>
    </div>
@endsection
