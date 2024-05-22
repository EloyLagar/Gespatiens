@extends('layouts.app')
@section('content')
    <div class="form-container">
        <form action="{{ route('evaluations.index') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="month-input">{{ __('evaluations.month') }}</label>
                <input type="number" id="month-input" name="mes" class="form-control">
            </div>
            <div class="form-group">
                <label for="year-input">{{ __('evaluations.ano') }}</label>
                <input type="number" id="year-input" name="ano" class="form-control">
            </div>
            <div class="form-group">
                <label for="type-input">{{ __('crud.select') }} {{ __('evaluation.lesson_type.label') }}</label>
                <select name="lesson_type" id="lesson_type_input" class="form-control">
                    @foreach ($enum as $lesson_type)
                        <option value="{{ $lesson_type }}">
                            {{ __('evaluation.lesson_type.' . $lesson_type) }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('crud.submit') }}</button>
        </form>

    </div>
@endsection
