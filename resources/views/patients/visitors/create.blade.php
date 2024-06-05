@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection

@section('content')
<div class="container-fluid pt-3">
    <a href="{{ route('patients.edit', $patient) }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{ __('crud.add') }} {{ __('patients.visitor') }}
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ __('error.' . session('error'))}}
                    </div>
                    @endif
                    <form action="{{ route('visitors.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-container">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="name">{{ __('patients.name') }}:</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                                <div class="form-group  col-md-4"><label for="phone-number">{{ __('user.phone') }}:</label>
                                    <input type="text" class="form-control" id="phone-number" name="phone_number"></div>
                                <div class="form-group  col-md-4">
                                    <label for="relationship">{{ __('patients.relationship') }}:</label>
                                    <input type="text" class="form-control" id="relationship" name="relationship">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                        <button type="submit" class="btn btn-primary mt-2 float-right">{{ __('crud.create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
