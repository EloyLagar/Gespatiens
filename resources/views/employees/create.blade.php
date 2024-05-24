@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('content')
    <div class="wrapper  d-flex flex-column">
        <div class="container col-md-6">
            <a href="{{ route('users.index') }}" class="goBackBtn btn"><span class="material-symbols-outlined">
                    arrow_back
                </span></a>
            <div class="card">
                <div class="card-header">
                    {{ __('crud.create') }} {{ __('user.singular') }}
                </div>

                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        @method('POST')

                        <div class="form-group ">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ old('name') }}">
                        </div>
                        <div class="form-group ">
                            <label for="email">Email:</label>
                            <input type="text" name="email" class="form-control" id="email"
                                value="{{ old('email') }}">
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="specialty">Speciality:</label>
                                <select name="speciality" id="specialty" class="form-control">
                                    @foreach ($enum as $speciality)
                                        <option value="{{ $speciality }}">
                                            {{ __('user.speciality.' . $speciality) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone number:</label>
                                <input type="text" name="phone_number" class="form-control" id="phone"
                                    value="{{ old('phone_number') }}">
                            </div>
                        </div>

                        <div class="errors">
                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <button class="btn float-right " type="submit">{{ __('create') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
