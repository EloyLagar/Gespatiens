@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common_styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('evaluations.indexForm') }}" class="goBackBtn btn">{{ __('crud.goBack') }}</a>
        <h6>Evaluaciones</h6>
        <div class="table-container">
            <table class="table marks-table">
                <thead class="thead-dark">
                    <tr>
                        <th></th>
                        @php
                            $mediasCount = 1;
                        @endphp
                        @foreach ($periodo as $fecha)
                            @if ($fecha->format('w') == 0)
                                <th>{{ $fecha->format('j') }}</th>
                                <th>{{ 'M' . $mediasCount }}</th>
                                @php
                                    $mediasCount++;
                                @endphp
                            @else
                                <th>{{ $fecha->format('j') }}</th>
                            @endif
                        @endforeach
                    </tr>
                    <tr>
                        <td>Usuario</td>
                        @foreach ($periodo as $fecha)
                            @if ($fecha->format('w') == 0)
                                <th>{{ $fecha->format('D') }}</th>
                                <th></th>
                            @else
                                <th>{{ $fecha->format('D') }}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @php
                        $cont = 0;
                    @endphp
                    @foreach ($residents as $resident)
                        @php
                            $cont++;
                        @endphp
                        <tr>
                            <td
                                class="td-name
                            @if (!isset($resident->number)) no-resident @endif
                            ">
                                @isset($resident->number)
                                    {{ $resident->number }} -
                                @endisset
                                {{ $resident->name }}</td>
                            @foreach ($periodo as $fecha)
                                @php
                                    $nota = 0; // Inicializamos la nota como 0 por defecto
                                    // Buscamos si hay una evaluación para este residente en esta fecha
                                    $evaluation = $resident->evaluations->firstWhere('date', $fecha->format('Y-m-d'));
                                    if ($evaluation) {
                                        $nota = $evaluation->nota; // Si hay una evaluación, obtenemos su nota
                                    }
                                @endphp
                                @if ($fecha->format('w') == 0)
                                    <td title="Pulse para modificar la nota" data-id="{{ $cont }}"
                                        data-fecha="{{ $fecha }}" class="clickable">
                                        <div>
                                            <input type="text" data-id="{{ $cont }}"
                                                data-fecha="{{ $fecha }}" class="notas"
                                                value="{{ $nota }}">
                                        </div>
                                    </td>
                                    <td></td>
                                    @php
                                        $mediasCount++;
                                    @endphp
                                @else
                                    <td title="Pulse para modificar la nota" data-id="{{ $cont }}"
                                        data-fecha="{{ $fecha }}" class="clickable">
                                        <div>
                                            <input type="text" data-id="{{ $cont }}"
                                                data-fecha="{{ $fecha }}" class="notas"
                                                value="{{ $nota }}">
                                        </div>
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.notas').change(function() {
                let valor = $(this).val();
                if (valor >= 0 && valor <= 10){
                    let id = $(this).data('id');
                let fecha = $(this).data('fecha');
                console.log(fecha);
                console.log(id);
                console.log('El valor ha cambiado a: ' + valor); //Esto se tendrá que pasar por ajax
                }


            });
        });

        $('.clickable').on('click', function() {
            var el_input = $('[data-id="' + $(this).data("id") + '"][data-fecha="' + $(this).data("fecha") + '"] input');
            var el_notas = $('span.notas[data-id="' + $(this).data("id") + '"][data-fecha="' + $(this).data("fecha") + '"]');

            el_notas.hide();
            el_input.show();

            el_input.on('input', function() {
                var valor = parseInt($(this).val());
                if (isNaN(valor) || valor < 0 || valor > 10) {//isNotANumber(valor)
                    $(this).val('');
                }
            });
        });
    </script>
@endsection