@extends('adminlte::page')

@section('title', '')

@section('content_header')
@stop

@section('content')
    <p>Aquí se mostrarán los avisos</p>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common_styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
