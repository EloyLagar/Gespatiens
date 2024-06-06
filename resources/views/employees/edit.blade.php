@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex justify-content-center flex-column">
        <a href="{{ route('users.index') }}" class="goBackBtn btn btn-secondary mr-auto mt-2"><i
                class='bx bx-left-arrow-alt'></i></a>
        @if (Auth::user()->id !== $employee->id && Auth::user()->speciality != 'admin')
            @include('employees.show')
        @else
            <div class="container mb-0">
                <div class="row">
                    <div class="col-md-4 pb-0 mb-0">
                        <div class="card mb-3">
                            <div class="card-header">
                                {{ $employee->name }}
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="">{{ __('user.name') }}:</label>
                                    <p>{{ $employee->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="">{{ __('user.email') }}:</label>
                                    <p>{{ $employee->email }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="">{{ __('user.phone') }}:</label>
                                    <p>{{ $employee->phone_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="">{{ __('user.speciality.label') }}:</label>
                                    <p>{{ $employee->speciality }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="">{{ __('user.signature') }}:</label>
                                    <div class="signature-img d-flex justify-content-center align-items-center">
                                        <img src="{{ asset('/storage/signatures/' . $employee->signature) }}"
                                            alt="{{ __('user.signature') }}">
                                    </div>
                                </div>
                                @if ($employee->id === Auth::user()->id)
                                    <form action="{{ route('language.change') }}" method="POST">
                                        @csrf
                                        <div class="form-group d-flex align-items-center">
                                            <select name="locale" class="form-control" onchange="this.form.submit()">
                                                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>
                                                    English</option>
                                                <option value="es" {{ app()->getLocale() == 'es' ? 'selected' : '' }}>
                                                    Español</option>
                                            </select>
                                            <img src="{{ asset('/img/flag-' . app()->getLocale() . '.png') }}"
                                                class="flag ml-2" alt="">
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
                                {{ __('crud.edit') }} {{ __('crud.info') }}
                                @if (Auth::user()->speciality === 'admin')
                                <button type="button" class="btn float-right ml-auto" data-toggle="modal" data-target="#deleteModal">
                                    <i class='bx bxs-trash-alt'></i>
                                </button>
                                @endif
                            </div>
                            <div class="card-body">
                                <form action="{{ route('users.update', $employee->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">{{ __('user.name') }}:</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $employee->name }}">
                                    </div>
                                    @if (Auth::user()->id === $employee->id)
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="password">{{ __('user.password') }}:</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="password_confirmation">{{ __('crud.repeat') }}
                                                    {{ __('user.password') }}:</label>
                                                <input type="password" class="form-control" id="password_confirmation"
                                                    name="password_confirmation">
                                            </div>
                                        </div>
                                    @endif
                                    @if (Auth::user()->speciality == 'admin')
                                        <div class="form-group">
                                            <label for="speciality">{{ __('user.speciality.label') }}:</label>
                                            <select name="speciality" id="speciality" class="form-control">
                                                <option value="none">{{ __('crud.select') }}</option>
                                                @foreach ($enum as $speciality)
                                                    <option value="{{ $speciality }}">
                                                        {{ __('user.speciality.' . $speciality) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    @if (Auth::user()->id === $employee->id)
                                        <div class="form-group">
                                            <label for="signature">{{ __('user.signature') }}:</label>
                                            <input type="file" class="form-control-file" id="signature" name="signature">
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="phone_number">{{ __('user.phone') }}:</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            value="{{ $employee->phone_number }}">
                                    </div>
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">{{ __('error.' . $error) }}</div>
                                    @endforeach
                                    <button type="submit" class="btn float-right">{{ __('crud.update') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">{{ __('crud.delete') }} {{$employee->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('crud.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{ __('crud.delete_ask') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">{{ __('crud.cancel') }}</button>
                    <form action="{{ route('users.destroy', $employee->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">{{ __('crud.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
