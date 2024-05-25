@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection

@section('content')
<div class="container-fluid pt-3">
    <a href="{{ route('home') }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
    <div class="row justify-content-center" style="height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{ __('crud.update') }} {{ __('notices.singular') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('notices.update', $notice) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="text">{{ __('notices.text') }}:</label>
                            <textarea rows="4" class="form-control" id="text" name="text" required>{{ old('text', $notice->text) }}</textarea>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn mt-2 float-right">{{ __('crud.update') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
