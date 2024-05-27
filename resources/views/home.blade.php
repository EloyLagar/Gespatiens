@extends('layouts.app')
@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection
@section('content')
    <div class="wrapper d-flex flex-column">
        <h1>{{ __('notices.plural') }}</h1>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        <div class="btn-container"><a href="{{ route('notices.create') }}" class="btn">{{ __('crud.create') }}
                {{ __('notices.singular') }}</a></div>
        <div class="container">
            <div class="notices-container" id="notices-container">
                @php
                    $currentDate = \Carbon\Carbon::now()->format('d-m-Y');
                    $noticeDate = $notices[0]->created_at->format('d-m-Y');
                @endphp
                @forelse ($notices as $notice)
                    @if ($notice->created_at->format('d-m-Y') !== $noticeDate)
                        <div class="date-container">
                            <span class="date-span">
                                @if ($currentDate == $noticeDate)
                                    {{ __('notices.today') }}
                                @else
                                    {{ $noticeDate }}
                                @endif
                            </span>
                        </div>
                        @php
                            $noticeDate = $notice->created_at->format('d-m-Y');
                        @endphp
                    @endif
                    @if ($notice->user_id === Auth::user()->id)
                        <div class="notice notice-internal">
                            <div class="notice-info d-flex justify-content-between">
                                <div class="notice-author">
                                    <span>({{ __('notices.you') }})</span>
                                </div>
                                <div class="notice-date float-right">
                                    {{ $notice->created_at->format('H:i') }}
                                </div>
                                <div class="dropdown">
                                    <a class="btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item"
                                                href="{{ route('notices.edit', $notice) }}">{{ __('crud.edit') }}</a></li>
                                        <li>
                                            <form action="{{ route('notices.destroy', $notice) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="dropdown-item">{{ __('crud.destroy') }}</button>
                                            </form>
                                        </li>
                                    </ul>
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
                                        {{ $notice->created_at->format('H:i') }}
                                    </div>
                                    @if (Auth::user()->speciality === 'admin')
                                        <div class="dropdown">
                                            <a class="btn-link dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <form action="{{ route('notices.destroy', $notice) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="dropdown-item">{{ __('crud.destroy') }}</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
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
                                        {{ $notice->created_at->format('H:i') }}
                                    </div>
                                    @if (Auth::user()->speciality === 'admin')
                                        <div class="dropdown">
                                            <a class="btn-link dropdown-toggle" href="#" role="button"
                                                id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('notices.destroy', $notice) }}">{{ __('crud.destroy') }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    @endif
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
                @if (!empty($notices))
                    <div class="date-container">
                        <span class="date-span">
                            @if ($currentDate == $noticeDate)
                                {{ __('crud.today') }}
                            @else
                                {{ $noticeDate }}
                            @endif
                        </span>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
    @endsection
@endsection
