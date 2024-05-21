@extends('layouts.app')

@section('css')
@parent
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="" class="goBackBtn btn">{{ __('crud.goBack') }}</a>
            <h6>{{ $employee->name }}</h6>
            <div class="model-info">
                <p>{{'user.name'}}: {{ $employee->name }}</p>
                <p>{{('user.email')}} {{ $employee->email }}</p>
                <p>{{__('user.phone')}}: {{ $employee->phone_number}}</p>
                <p>{{__('user.speciality.label')}}{{ $employee->speciality }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    {{__('crud.edit')}} {{__('crud.info')}}
                </div>
                <div class="card-body">
                    <form action="{{ route('users.update', $employee->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-container">
                            <div class="form-group">
                                <label for="name">{{__('user.name')}}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $employee->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email">{{__('user.email')}}</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{ $employee->email }}">
                            </div>
                            <div class="form-group">
                                <label for="password">{{__('user.password')}}</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="speciality">{{__('user.label')}}</label>
                                <input type="text" class="form-control" id="speciality" name="speciality"
                                    value="{{ $employee->speciality }}">
                            </div>
                            <div class="form-group">
                                <label for="signature">{{__('user.signature')}}</label>
                                <input type="file" class="form-control-file" id="signature" name="signature">
                            </div>
                            <div class="form-group">
                                <label for="phone_number">{{__('user.phone')}}</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    value="{{ $employee->phone_number }}">
                            </div>
                            <button type="submit" class="btn btn-primary">{{__('crud.update')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
