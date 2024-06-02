@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
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
                                <div class="card-header justify-content-center align-items-center">
                                    <span>{{ $patient->number }} - {{ $patient->name }}</span>
                                </div>
                                <div class="card-body d-flex align-items-center">
                                    <span class="float-left mr-auto">{{ $patient->full_name }}</span>
                                    <span class="float-right ml-auto">
                                        {{__('patients.visit_code')}}: {{$patient->visit_code}}
                                    </span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="pagination ml-auto justify-content-center float-md-right mb-3">
                {{ $residents->links() }}
            </div>
        </div>
    </div>
@endsection
