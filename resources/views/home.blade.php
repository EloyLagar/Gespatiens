@extends('layouts.app')
@section('css')
    @parent
        <link rel="stylesheet" href="{{ asset('css/notices.css') }}">
@endsection
@section('content')
    <h1>Avisos</h1>
    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
    @endforeach
    <div class="btn-container"><a href="#" class="btn">Crear aviso</a></div>
    <div class="container">
        <div class="notice notice-external">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-internal">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Tú</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-admin">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-external">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-internal">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Tú</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-admin">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-external">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-internal">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Tú</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-admin">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-external">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-internal">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Tú</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
        <div class="notice notice-admin">
            <div class="notice-info">
                <div class="notice-author">
                    <span>Paco</span>
                </div>
                <div class="notice-date">
                    21-02-2024
                </div>
            </div>
            <div class="notice-text">
                Se ha escapado un paciente
            </div>
        </div>
    </div>
@endsection
