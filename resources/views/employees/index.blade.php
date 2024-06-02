@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('/css/index.css') }}">
@endsection
@section('content')
    <div class="wrapper  d-flex flex-column">
        <h1 class="mt-3 mb-3">{{ __('user.plural') }}</h1>
        <div class="btn-container mb-3"><a href="{{ route('users.create') }}" class="btn py-2">{{ __('crud.create') }}
                {{ __('user.singular') }}</a></div>
        <div class="container">
            <div class="row">
                @forelse ($users as $user)
                    <div class="col-md-4">
                        <a href="{{ route('users.edit', $user) }}" class="text-decoration-none">
                            <div class="card employee-card">
                                <div class="card-header d-flex justify-content-center align-items-center">
                                    <span>{{ $user->name }} ({{$user->speciality}})</span>
                                </div>
                                <div class="card-body d-flex flex-row justify-content-center align-items-center">
                                    <div class="employee-speciality"><span>{{ $user->email }}</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="pagination ml-auto justify-content-center float-md-right mb-3">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
