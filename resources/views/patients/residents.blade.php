@extends('layouts.app')
@section('css')
    @parent
@endsection
@section('content')
    <h1>Residents</h1>
    <div class="btn-container"><a href="{{ route('patients.create') }}" class="btn">Create Patient</a></div>
    <div class="container">
        <div class="row">
            @forelse ($residents as $patient)
                <div class="col-md-4">
                    <a href="{{ route('patients.edit', $patient) }}" class="text-decoration-none">
                        <div class="card patient-card mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="patient-name"><span>{{ $patient->full_name }}</span></div>
                                <div class="patient-number"><span> @php if($patient->number) echo $patient->number @endphp </span></div>
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
@endsection
