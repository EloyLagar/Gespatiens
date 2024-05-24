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
                    <form action="{{ route('evaluations.index') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="month-input">{{ __('evaluations.month') }}</label>
                                <input type="month" id="month-input" name="mes_ano" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="type-input">{{ __('crud.select') }}
                                    {{ __('evaluations.lesson_type.label') }}</label>
                                <select name="lesson_type" id="lesson_type_input" class="form-control" required>
                                    @foreach ($enum as $lesson_type)
                                        <option value="{{ $lesson_type }}">
                                            {{ __('evaluations.lesson_type.' . $lesson_type) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn float-right">{{ __('crud.submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
