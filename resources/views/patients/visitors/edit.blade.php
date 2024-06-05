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
                    {{ __('crud.modify') }} {{ __('patients.visitor') }}
                    <div class="float-right ml-auto">
                        <button type="button" class="btn float-right" data-toggle="modal" data-target="#deleteModal">
                            <i class='bx bxs-trash-alt'></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{ __('error.' . session('error'))}}
                    </div>
                    @endif
                    <form action="{{ route('visitors.update', $visitor) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-container">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="name">{{ __('patients.name') }}:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{($visitor->name ?? '')}}">
                                </div>
                                <div class="form-group  col-md-3"><label for="phone-number">{{ __('patients.name') }}:</label>
                                    <input type="text" class="form-control" id="phone-number" name="phone-number" value="{{($visitor->phone_number ?? '')}}""></div>
                                <div class="form-group  col-md-4">
                                    <label for="relationship">{{ __('patients.relationship') }}:</label>
                                    <input type="text" class="form-control" id="relationship" name="relationship"  value="{{($visitor->relationship ?? '')}}">
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="patient_id" value="{{$patient->id}}">
                        <button type="submit" class="btn btn-primary mt-2 float-right">{{ __('crud.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ __('crud.delete') }} {{ __('patients.visitor') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('crud.close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{ __('crud.delete_ask') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('crud.cancel') }}</button>
                <form action="{{ route('visitors.destroy', $visitor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">{{ __('crud.delete') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
