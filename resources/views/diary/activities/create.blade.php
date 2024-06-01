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
                            <a class="nav-link active" href="#lesson" data-toggle="tab">{{__('activities.labels.lesson')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#ther-groups" data-toggle="tab">{{__('activities.labels.ther_groups')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sport" data-toggle="tab">{{__('activities.labels.sport')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#walk" data-toggle="tab">{{__('activities.labels.walk')}}</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="lesson">
                            <form action="{{ route('activities.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
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
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="lesson_utility">{{ __('activities.utility') }}:</label>
                                        <input type="number" class="form-control" id="lesson_utility" name="utility"
                                            max="10" min="0">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lesson_satisfaction">{{ __('activities.satisfaction') }}:</label>
                                        <input type="number" class="form-control" id="lesson_satisfaction"
                                            name="satisfaction" max="10" min="0">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn float-right">{{ __('crud.create') }}</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="ther-groups">

                            <form action="{{ route('activities.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="therGroupsTitle">Title:</label>
                                    <input type="text" class="form-control" id="therGroupsTitle" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="therGroupsDescription">Description:</label>
                                    <textarea class="form-control" id="therGroupsDescription" name="description" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn float-right">{{ __('crud.create') }}</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="sport">

                            <form action="{{ route('activities.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="sportTitle">Title:</label>
                                    <input type="text" class="form-control" id="sportTitle" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="sportDescription">Description:</label>
                                    <textarea class="form-control" id="sportDescription" name="description" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn float-right">{{ __('crud.create') }}</button>
                            </form>
                        </div>
                        <div class="tab-pane" id="walk">

                            <form action="{{ route('activities.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="walkTitle">Title:</label>
                                    <input type="text" class="form-control" id="walkTitle" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="walkDescription">Description:</label>
                                    <textarea class="form-control" id="walkDescription" name="description" rows="3" required></textarea>
                                </div>
                                <button type="submit" class="btn btn float-right">{{ __('crud.create') }}</button>
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
