@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="post">
            @csrf
            <div class="form-group">
                <label for="">Name:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label for="">Speciality:</label>
                <select name="specialty" id="speciaity">
                    @foreach ($enum as $speciality)
                    <option value="{{$speciality}}">{{__('speciality'. {{$speciality}})}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Phone number:</label>
                <input type="text">
            </div>
            <div class="form-group">
                <label for=""></label>
                <input type="text">
            </div>
        </form>
    </div>
@endsection
