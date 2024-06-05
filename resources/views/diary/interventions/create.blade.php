@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection

@section('content')
@php
$dateTime = new DateTime($date);
$formattedDate = $dateTime->format('d/m/Y');
@endphp
<div class="container-fluid pt-3">
    <a href="{{ route('diary.showPage', $date) }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{ __('crud.create') }} {{ __('diary.intervention') }}
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ __('error.' . session('error'))}}
                    </div>
                    @endif
                    <form action="{{ route('interventions.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="patient-select">{{ __('diary.tutored') }}:</label>
                            <select class="form-control" name="patient_id" id="patient-select">
                                @foreach ($residents as $resident)
                                <option value="{{ $resident->id }}">
                                    {{$resident->number ? $resident->number . ' - ': ''}}{{ $resident->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="intervention-textarea">{{ __('diary.intervention') }}:</label>
                            <div class="input-group">
                                <textarea class="form-control" id="intervention-textarea" name="intervention"></textarea>
                            </div>
                        </div>

                        @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="hidden" name="date" value="{{ $formattedDate }}">
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn btn-primary mt-2 float-right">{{ __('crud.create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
