@extends('layouts.app')

@section('css')
@parent
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">
<link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection

@section('content')
<div class="container">
    <a href="{{route('home')}}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
    <div class="card">
        <div class="card-header">
            {{ __('crud.create') }} {{ __('notices.singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route('notices.store') }}" method="POST">
                @csrf
                <div class="form-container">
                    <div class="form-group">
                        <label for="text">{{ __('notices.text') }}:</label>
                        <textarea row="4" class="form-control" id="text" name="text" required></textarea>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                </div>
                <button type="submit" class="btn mt-2 mr-3 float-right">{{ __('crud.create') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
