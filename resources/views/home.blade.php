@extends('layouts.app')
@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection
@section('content')
<div class="wrapper d-flex flex-column">
    <h1 class="mt-3">{{ __('notices.plural') }}</h1>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <div class="btn-container"><a href="{{ route('notices.create') }}" class="btn py-2">{{ __('crud.create') }}
            {{ __('notices.singular') }}</a></div>
    <div class="container">
        <div class="notices-container" id="notices-container">
            @php
            $currentDate = \Carbon\Carbon::now()->format('d-m-Y');
            $noticeDate = null;

            if (isset($notices) && !empty($notices) && isset($notices[0])) {
            $noticeDate = $notices[0]->created_at->format('d-m-Y');
            }
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
                            <li><a class="dropdown-item" href="{{ route('notices.edit', $notice) }}">{{ __('crud.edit')
                                    }}</a></li>
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-url="{{ route('notices.destroy', $notice) }}">{{
                                    __('crud.destroy') }}</a>
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
                        <a class="btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-url="{{ route('notices.destroy', $notice) }}">{{
                                    __('crud.destroy') }}</a>
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
                        <a class="btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                    data-url="{{ route('notices.destroy', $notice) }}">{{ __('crud.destroy') }}</a>
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
            @endforelse
            @if (!empty($notices))
            @if ($currentDate == $noticeDate)
            <div class="date-container">
                <span class="date-span">
                    {{ __('notices.today') }}
                </span>
            </div>
            @else
            @if ($noticeDate !== null)
            <div class="date-container">
                <span class="date-span">
                    {{ $noticeDate }}
                </span>
            </div>
            @endif
            @endif
            @endif
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{ __('crud.delete') }} {{__('notices.singular')}}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                {{ __('crud.delete_ask') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal">{{ __('crud.cancel') }}</button>
                <form id="deleteForm" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn">{{ __('crud.destroy') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var url = button.getAttribute('data-url');
        var form = deleteModal.querySelector('#deleteForm');
        form.action = url;
    });
</script>
@endsection
@endsection
