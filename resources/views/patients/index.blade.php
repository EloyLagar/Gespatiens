@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <h1 class="mt-3 mb-3">{{ __('patients.former_residents') }}</h1>
        @if (Auth::user()->speciality === 'admin')
            <div class="btn-container"><a href="{{ route('patients.create') }}" class="btn py-2">{{__('crud.create' )}} {{__('patients.singular')}}</a></div>
        @endif
        <div class="container">
            <div class="row">
                @forelse ($patients as $patient)
                    <div class="col-md-4">
                        <a href="{{ route('patients.edit', $patient) }}" class="text-decoration-none">
                            <div class="card patient-card mb-3">
                                <div class="card-header justify-content-center align-items-center">
                                    <span>{{ $patient->full_name }}</span>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center">
                                    <span>{{ \Carbon\Carbon::parse($patient->entry_date)->format('d/m/Y') }}&nbsp;{{ __('patients.until') }}&nbsp;{{ \Carbon\Carbon::parse($patient->exit_date)->format('d/m/Y') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="pagination ml-auto justify-content-center float-md-right mb-3">
                {{ $patients->links() }}
            </div>
        </div>
    @endsection
