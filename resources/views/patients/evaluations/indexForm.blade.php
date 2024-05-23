@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection
@section('content')

    <div class="container">
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
                            <input type="number" id="month-input" name="mes" class="form-control" min="1" max="12" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="year-input">{{ __('evaluations.ano') }}</label>
                            <input type="number" id="year-input" name="ano" class="form-control" max="{{ date('Y') + 1 }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type-input">{{ __('crud.select') }} {{ __('evaluations.lesson_type.label') }}</label>
                        <select name="lesson_type" id="lesson_type_input" class="form-control" required>
                            @foreach ($enum as $lesson_type)
                            <option value="{{ $lesson_type }}">
                                {{ __('evaluations.lesson_type.' . $lesson_type) }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn float-right">{{ __('crud.submit') }}</button>
                </form>
            </div>
        </div>
    </div>


</div>
@endsection
