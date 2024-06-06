@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection

@section('content')
<div class="container-fluid pt-3">
    <a href="{{ route('home') }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="card">
                <div class="card-header">
                    {{ __('crud.create') }} {{ __('notices.singular') }}
                </div>
                <div class="card-body">
                    <form action="{{ route('notices.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="text">{{ __('notices.text') }}:</label>
                            <textarea class="form-control" id="text" name="text" required autofocus></textarea>
                        </div>
                        @error('text')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="btn mt-2 float-right">{{ __('crud.create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
