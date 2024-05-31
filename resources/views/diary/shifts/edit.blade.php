@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper  d-flex flex-column">
        <div class="container-fluid  pt-3">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            {{ __('crud.edit') }} {{ __('diary.shift') }}
                        </div>
                        <div class="card-body">
                            <form action="{{ route('shifts.update', $shift) }}" method="POST">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label for="interesting-info">{{ __('diary.interesting_info') }}:</label>
                                    <textarea type="text" class="form-control intervention-text" name="interesting_info">{{ $interesting_info ?? '' }}</textarea>
                                </div>
                                <div class="form-group multiselect-group">
                                    <label for="">{{__('crud.select')}} {{ __('diary.educators') }}:</label>
                                    <select class="form-control" multiple>
                                        @forelse ($educators as $educator)
                                            <option value="{{ $educator->id }}"
                                                @if ($shift && $shift->users->contains($educator->id)) selected @endif>
                                                {{ $educator->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                <button type="submit" class="btn mt-2 float-right">{{ __('crud.edit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
