@extends('layouts.app')
@section('css')
    @parent
@endsection
@section('content')
    <div class="wrapper  d-flex flex-column">
        <h1 class="mt-3 mb-3">{{__('activities.plural')}}</h1>
        <div class="btn-container mb-3"><a href="{{ route('activities.create') }}" class="btn py-2">{{__('crud.create')}} {{__('activities.singular')}}</a></div>
        <div class="container">
            <div class="row">
                @forelse ($activities as $activity)
                    <div class="col-md-4">
                        <a href="{{ route('users.edit', $activity) }}" class="text-decoration-none">
                            <div class="card activity-card">
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    <div class="activity-name"><span>{{ $activity->name }}</span></div>
                                    <div class="activity-speciality"><span>{{ $activity->speciality }}</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="pagination ml-auto justify-content-center float-md-right mb-3">
                {{ $activities->links() }}
            </div>
        </div>
    </div>
@endsection
