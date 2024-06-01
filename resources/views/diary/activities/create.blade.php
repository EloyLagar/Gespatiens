@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex flex-column">
        <a href="{{ route('activities.index') }}" class="goBackBtn btn mr-auto mt-2 float-left"><i
                class='bx bx-left-arrow-alt'></i></a>
        <div class="container col-lg-6 mt-4">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <span>{{ __('crud.create') }}</span>
                    <ul class="nav nav-tabs card-header-tabs ml-auto" id="activityTabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="#lesson"
                                data-toggle="tab">{{ __('activities.labels.lesson') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ther-groups"
                                data-toggle="tab">{{ __('activities.labels.ther_groups') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sport" data-toggle="tab">{{ __('activities.labels.sport') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#walk" data-toggle="tab">{{ __('activities.labels.walk') }}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="lesson">
                            <form action="{{ route('lessons.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="type">{{ __('activities.lesson_type.label') }}:</label>
                                        <select name="type" class="form-control" id="lesson_type">
                                            <option disabled selected value="">{{ __('crud.select_a') }}
                                                {{ __('activities.lesson_type.label') }}</option>
                                            @forelse ($lesson_types as $lesson_type)
                                                <option value="{{ $lesson_type }}">
                                                    {{ __('activities.lesson_type.' . $lesson_type) }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="date">{{ __('activities.date') }}:</label>
                                        <input type="date" class="form-control" id="lesson_utility" name="utility">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="lesson_utility">{{ __('activities.utility') }}:</label>
                                        <input type="number" class="form-control" id="lesson_utility" name="utility"
                                            max="10" min="0">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="lesson_satisfaction">{{ __('activities.satisfaction') }}:</label>
                                        <input type="number" class="form-control" id="lesson_satisfaction"
                                            name="satisfaction" max="10" min="0">
                                    </div>
                                </div>
                                <button type="submit" class="btn float-right">{{ __('crud.create') }}</button>
                            </form>
                        </div>
                        {{-- Grupos Tera. --}}
                        <div class="tab-pane" id="ther-groups">
                            <form action="{{ route('activities.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="group">{{ __('activities.group') }}:</label>
                                        <select name="group" class="form-control" id="group">
                                            <option disabled selected value="">{{ __('crud.select_a') }}
                                                {{ __('user.speciality.psychologist') }}</option>
                                            @forelse ($psychologists as $psychologist)
                                                <option value="{{ $psychologist->name }}">{{ $psychologist->name }}
                                                </option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="date">{{ __('activities.date') }}:</label>
                                        <input type="date" class="form-control" id="lesson_utility" name="utility">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="therapeutic_group_utility">{{ __('activities.utility') }}:</label>
                                        <input type="number" class="form-control" id="therapeutic_group_utility"
                                            name="utility" max="10" min="0">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label
                                            for="therapeutic_group_satisfaction">{{ __('activities.satisfaction') }}:</label>
                                        <input type="number" class="form-control" id="therapeutic_group_satisfaction"
                                            name="satisfaction" max="10" min="0">
                                    </div>
                                </div>
                                <button type="submit" class="btn float-right">{{ __('crud.create') }}</button>
                            </form>
                        </div>

                        {{-- Deporte --}}
                        <div class="tab-pane" id="sport">
                            <form action="{{ route('activities.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="date">{{ __('activities.date') }}:</label>
                                        <input type="date" class="form-control" id="lesson_utility" name="utility">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="therapeutic_group_utility">{{ __('activities.utility') }}:</label>
                                        <input type="number" class="form-control" id="therapeutic_group_utility"
                                            name="utility" max="10" min="0">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label
                                            for="therapeutic_group_satisfaction">{{ __('activities.satisfaction') }}:</label>
                                        <input type="number" class="form-control" id="therapeutic_group_satisfaction"
                                            name="satisfaction" max="10" min="0">
                                    </div>
                                </div>
                                <button type="submit" class="btn float-right">{{ __('crud.create') }}</button>
                            </form>
                        </div>
                        {{-- Paseos --}}
                        <div class="tab-pane" id="walk">
                            <form action="{{ route('activities.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="date">{{ __('activities.date') }}:</label>
                                        <input type="date" class="form-control" id="lesson_utility" name="utility">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="therapeutic_group_utility">{{ __('activities.utility') }}:</label>
                                        <input type="number" class="form-control" id="therapeutic_group_utility"
                                            name="utility" max="10" min="0">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label
                                            for="therapeutic_group_satisfaction">{{ __('activities.satisfaction') }}:</label>
                                        <input type="number" class="form-control" id="therapeutic_group_satisfaction"
                                            name="satisfaction" max="10" min="0">
                                    </div>
                                </div>
                                <button type="submit" class="btn float-right">{{ __('crud.create') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        //Cambio de formulario en click
        $(document).ready(function() {
            $('#formsModes a').on('click', function(e) {
                e.preventDefault()
                $(this).tab('show')
            })
        });
    </script>
@endsection
