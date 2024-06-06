@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
<div class="wrapper d-flex flex-column">
    <a href="{{ route('activities.index') }}" class="goBackBtn btn mr-auto mt-2 float-left"><i
            class='bx bx-left-arrow-alt'></i></a>
    <div class="container col-md-8 col-lg-6 mt-4">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <span>{{ __('crud.update') }} {{ __('activities.singular') }}</span>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-7 mb-3">
                        <label>{{ __('activities.type') }}:</label>
                        <span>{{ __('activities.labels.' . $activity->type) }}</span>
                        @if ($activity->type == 'lesson')
                        <span>({{ __('activities.lesson_type.' . $activity->lesson->type) }})</span>
                        @endif
                    </div>
                    <div class="col-12 col-md-5 mb-3 text-md-right">
                        <label>{{ __('activities.date') }}:</label>
                        <span>{{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}</span>
                    </div>
                </div>
                <form action="{{ route('activities.update', $activity) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-5 col-lg-6 d-flex align-items-center">
                            <label for="satisfaction" class="mr-2">{{ __('activities.satisfaction') }}:</label>
                            <input type="number" class="form-control" id="satisfaction" name="satisfaction" max="10"
                                min="0" value="{{ $activity->satisfaction ?? '' }}">
                        </div>
                        <div class="form-group col-12 col-md-5 col-lg-6 d-flex align-items-center">
                            <label for="utility" class="mr-2">{{ __('activities.utility') }}:</label>
                            <input type="number" class="form-control" id="utility" name="utility" max="10" min="0"
                                value="{{ $activity->utility ?? '' }}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right mt-3">{{ __('crud.update') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const activityId = '{{ $activity->id }}';
</script>

<script>
    function setActivityStateFalse() {
            $.ajax({
                url: '{{ route("activity.close") }}',
                type: 'POST',
                data: {
                    activity_id: activityId,
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {},
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }

        $(window).on('beforeunload', function() {
            setActivityStateFalse();
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
