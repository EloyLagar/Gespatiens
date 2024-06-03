@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex flex-column mb-4">
        <a href="{{ route('diary.showPage', $activity->date) }}" class="goBackBtn btn mr-auto mt-2 float-left"><i
                class='bx bx-left-arrow-alt'></i></a>
        <div class="container col-md-8 col-lg-8 mt-4 ">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <span>{{ __('crud.manage') }} {{ __('activities.attendance') }}</span>
                </div>
                <div class="card-body">
                    <form action="{{ route('activities.updateAttendance', $activity) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            @forelse ($patients as $patient)
                                <div class="col-md-12">
                                    <div class="form-group mb-4">
                                        <label>{{ $patient->number ? $patient->number . ' - ' : '' }}{{ $patient->name }}:</label>
                                        <div class="row">
                                            <div class="col">
                                                <input type="radio" id="assists-{{ $patient->id }}"
                                                    name="patients[{{ $patient->id }}]" value="assists"
                                                    {{ $activity->patients()->where('patient_id', $patient->id)->first()->pivot->assists? 'checked': '' }}>
                                                <label for="assists-{{ $patient->id }}">Assists</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" id="reducted-{{ $patient->id }}"
                                                    name="patients[{{ $patient->id }}]" value="reducted"
                                                    {{ $activity->patients()->where('patient_id', $patient->id)->first()->pivot->reducted? 'checked': '' }}>
                                                <label for="reducted-{{ $patient->id }}">Reducted</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" id="justified-{{ $patient->id }}"
                                                    name="patients[{{ $patient->id }}]" value="justified"
                                                    {{ $activity->patients()->where('patient_id', $patient->id)->first()->pivot->justified? 'checked': '' }}>
                                                <label for="justified-{{ $patient->id }}">Justified</label>
                                            </div>
                                            <div class="col">
                                                <input type="radio" id="no-justified-{{ $patient->id }}"
                                                    name="patients[{{ $patient->id }}]" value="no_justified"
                                                    {{ !$activity->patients()->where('patient_id', $patient->id)->first()->pivot->justified &&!$activity->patients()->where('patient_id', $patient->id)->first()->pivot->assists &&!$activity->patients()->where('patient_id', $patient->id)->first()->pivot->reducted? 'checked': '' }}>
                                                <label for="no-justified-{{ $patient->id }}">No Justified</label>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <button type="submit" class="btn float-right ml-auto mt-2">{{ __('crud.update') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        $(window).on('beforeunload', function() {
            setActivtyStateFalse();
        });

        //·Antes de salir de la página
        $('.goBackBtn').on('click', function(event) {
            event.preventDefault();
            setActivityStateFalse();
            var href = $(this).attr('href');
            setTimeout(function() {
                window.location.href = href;
            }, 1000);
        });
    </script>
@endsection
