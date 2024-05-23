@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection
@section('content')
    <h1>{{ __('notices.plural') }}</h1>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <div class="btn-container"><a href="{{ route('notices.create') }}" class="btn">{{ __('crud.create') }}
            {{ __('notices.singular') }}</a></div>
    <div class="container">
        <div class="notices-container">

            @forelse ($notices as $notice)
                @if ($notice->user_id === Auth::user()->id)
                    <div class="notice notice-internal">
                        <div class="notice-info d-flex justify-content-between">
                            <div class="notice-author">
                                <span>({{ __('notices.you') }})</span>
                            </div>
                            <div class="notice-date float-right">
                                {{ $notice->created_at }}
                            </div>
                        </div>
                        <div class="notice-text">
                            {{ $notice->text }}
                        </div>
                    </div>
                @else
                    @if ($notice->user->speciality === 'admin')
                        <div class="notice notice-admin">
                            <div class="notice-info d-flex justify-content-between">
                                <div class="notice-author">
                                    <span>{{ $notice->user->name }}</span>
                                </div>
                                <div class="notice-date float-right">
                                    {{ $notice->created_at }}
                                </div>
                            </div>
                            <div class="notice-text">
                                {{ $notice->text }}
                            </div>
                        </div>
                    @else
                        <div class="notice notice-external">
                            <div class="notice-info d-flex justify-content-between">
                                <div class="notice-author">
                                    <span>{{ $notice->user->name }}</span>
                                </div>
                                <div class="notice-date float-right">
                                    {{ $notice->created_at }}
                                </div>
                            </div>
                            <div class="notice-text">
                                {{ $notice->text }}
                            </div>
                        </div>
                    @endif
                @endif
            @empty
                <h4>{{ __('crud.none') }} {{ __('notices.plural') }}</h4>
            @endforelse
        </div>
    </div>
@endsection
