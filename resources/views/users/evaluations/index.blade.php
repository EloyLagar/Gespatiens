@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/common_styles.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('content')
    <h1>Evaluaciones</h1>
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
            @php
                $cont = 0;
            @endphp
            @foreach ($residents as $resident)
                @php
                    $cont++;
                @endphp
                <tr>
                    <td>{{ $resident->full_name }}</td>
                    @foreach ($periodo as $fecha)
                        @if ($fecha->format('w') == 0)
    </div>
    <td title="Pulse para modificar la nota" data-id="{{ $cont }}" data-fecha="{{ $fecha }}"
        class="clickable">
        <div>
            <input type="text" data-id="{{ $cont }}" data-fecha="{{ $fecha }}" class="notas"
                value="{{ $cont . '_' . $fecha->format('j')}}">
    </td>
    <td></td>
    @php
        $mediasCount++;
    @endphp
@else
    <td title="Pulse para modificar la nota" data-id="{{ $cont }}" data-fecha="{{ $fecha }}"
        class="clickable">
        <div>
            <input type="text" data-id="{{ $cont }}" data-fecha="{{ $fecha }}" class="notas"
                value="{{ $cont . '_' . $fecha->format('j') }}">
        </div>
    </td>
    @endif
    @endforeach
    </tr>
    @endforeach
    </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.notas').change(function () {
                var valor = $(this).val();
                console.log('El valor ha cambiado a: ' + valor);//Esto se tendrá que pasar por consola
            });
        });

        $('.clickable').on('click', function() {
            var el_input = $('[data-id="' + $(this).attr("data-id") + '"][data-fecha="' + $(this).attr(
                "data-fecha") + '"]');
            var el_notas = $('span.notas[data-id="' + $(this).attr("data-id") + '"][data-fecha="' + $(this).attr(
                "data-fecha") + '"]');
            el_notas.hide();
            el_input.show();
        });

    </script>
@endsection
