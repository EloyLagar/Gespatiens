@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{asset('/css/index.css')}}">
@endsection
@section('content')
    <div class="wrapper  d-flex flex-column">
        <h1 class="mt-3 mb-3">{{__('activities.plural')}}</h1>
        <div class="btn-container mb-3"><a href="{{ route('activities.create') }}" class="btn py-2">{{__('crud.create')}} {{__('activities.singular')}}</a></div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="container">
            <div class="row">
                @forelse ($activities as $activity)
                    <div class="col-md-4">
                        <a href="{{ route('activities.edit', $activity) }}" class="text-decoration-none">
                            <div class="card activity-card">
                                <div class="card-header">
                                    <span class="mr-auto float-left">{{ __('activities.labels.' .$activity->type) }}</span>
                                    <span class="ml-auto float-right">{{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}</span>
                                </div>
                                <div class="card-body d-flex flex-row justify-content-center align-items-center">
                                    <div class="row col-10">
                                        <span class="mr-auto float-left">{{__('activities.satisfaction')}}: {{$activity->satisfaction}}</span>
                                        <span class="ml-auto float-right">{{__('activities.utility')}}: {{$activity->utility}}</span>
                                    </div>
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
