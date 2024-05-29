@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <div class="container col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('evaluations.form_help') }}
                </div>
                <div class="card-body">
                    <form action="#" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="date-input">{{ __('diary.date') }}</label>
                                <input type="date" id="date-input" name="date" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn float-right">{{ __('crud.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
