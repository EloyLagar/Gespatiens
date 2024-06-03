@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper  d-flex flex-column">
        <a href="{{ route('users.index') }}" class="goBackBtn btn mt-2 mr-auto float-left"><i
                class='bx bx-left-arrow-alt'></i></a>
        <div class="container col-md-6">
            <div class="card">
                <div class="card-header">
                    {{ __('crud.create') }} {{ __('diary.reduction.label') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('reductions.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="patient">{{ __('patients.name') }}:</label>
                            <select name="patient_id" id="patient" class="form-control">
                                @foreach ($residents as $resident)
                                    <option value="{{ $resident->id }}">
                                        {{ $resident->number ? $resident->number . ' - ' : '' }}{{ $resident->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-row ml-2 col-12 d-flex justify-content-center text-center align-items-center">
                            <div class="form-group col-md-6 col-sm-10 form-check mt-3 d-flex align-items-center">
                                <label for="total_reduction" class="form-check-label">{{ __('Total Reduction') }}</label>
                                <input type="checkbox" name="total_reduction" id="total_reduction" class="form-check-input"
                                    value="1">
                            </div>
                            <div class="form-group col-md-6 col-sm-12 form-check mt-3 d-flex align-items-center">
                                <label for="sport_reduction" class="form-check-label">{{ __('Sport Reduction') }}</label>
                                <input type="checkbox" name="sport_reduction" id="sport_reduction" class="form-check-input"
                                    value="1">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="partial_reduction">{{ __('Partial Reduction') }}:</label>
                            <textarea name="partial_reduction" id="partial_reduction" class="form-control" rows="3"></textarea>
                        </div>

                        <input type="hidden" name="date" value="{{ $date }}">

                        <div class="errors">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <button class="btn btn-primary float-right" type="submit">{{ __('create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalReduction = document.getElementById('total_reduction');
            const sportReduction = document.getElementById('sport_reduction');
            const partialReduction = document.getElementById('partial_reduction');

            totalReduction.addEventListener('change', function() {
                if (this.checked) {
                    sportReduction.checked = false;
                    partialReduction.value = '';
                    partialReduction.disabled = true;
                } else {
                    partialReduction.disabled = false;
                }
            });

            sportReduction.addEventListener('change', function() {
                if (this.checked) {
                    totalReduction.checked = false;
                    partialReduction.value = '';
                    partialReduction.disabled = true;
                } else {
                    partialReduction.disabled = false;
                }
            });

            partialReduction.addEventListener('input', function() {
                if (this.value) {
                    totalReduction.checked = false;
                    sportReduction.checked = false;
                    totalReduction.disabled = true;
                    sportReduction.disabled = true;
                } else {
                    totalReduction.disabled = false;
                    sportReduction.disabled = false;
                }
            });
        });
    </script>
@endsection
