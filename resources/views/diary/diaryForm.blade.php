@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <div class="container col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ __('diary.form_help') }}
                </div>
                <div class="card-body">
                    <form action="{{route('diary.showPage')}}" method="POST">
                        @csrf
                        <div class="form-row d-flex">
                            <div class="form-group col-md-12">
                                <label for="date-input">{{ __('diary.date') }}</label>
                                <input type="date" id="date-input" max="{{ date('Y-m-d') }}" name="date" class="form-control" required>
                            </div>
                        </div>
                        <button type="submit" class="btn float-right">{{ __('crud.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
