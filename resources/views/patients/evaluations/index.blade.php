@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('content')
    <div class="wrapper d-flex flex-column">
        <div class="container">
            <a href="{{ route('evaluations.indexForm') }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
            <h1 class="mt-3 mb-3">{{ __('evaluations.plural') }} {{ $lesson_type }}</h1>
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
                            <td>{{ __('patients.singular') }}</td>
                            @foreach ($periodo as $fecha)
                                @if ($fecha->format('w') == 0)
                                    <th>{{ __('days.' . $fecha->format('w')) }}</th>
                                    <th></th>
                                @else
                                    <th>{{ __('days.' . $fecha->format('w')) }}</th>
                                @endif
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($residents as $resident)
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
                                        $residentId = $resident->id; // Obtener el ID del residente actual
                                        $evaluationsByDate = $evaluationsMap[$residentId]; // Obtener el mapa de evaluaciones del residente
                                        $mark = $evaluationsByDate[$fecha->format('Y-m-d H:i:s')] ?? ' '; // Obtener la nota para la fecha actual
                                    @endphp
                                    @if ($fecha->format('w') == 0)
                                        <td title="Pulse para modificar la nota" data-id="{{ $resident->id }}"
                                            data-fecha="{{ $mark }}" class="clickable">
                                            <div>
                                                <input type="text" data-id="{{ $resident->id }}"
                                                    data-fecha="{{ $fecha }}" class="notas cell-input"
                                                    value="{{ $mark }}">
                                            </div>
                                        </td>
                                        <td></td>
                                        @php
                                            $mediasCount++;
                                        @endphp
                                    @else
                                        <td title="Pulse para modificar la nota" data-id="{{ $resident->id }}"
                                            data-fecha="{{ $fecha }}" class="clickable">
                                            <div>
                                                <input type="text" data-id="{{ $resident->id }}"
                                                    data-fecha="{{ $fecha }}" class="notas cell-input"
                                                    value="{{ $mark }}">
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
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        let lesson_type = @json($lesson_type);
        $(document).ready(function() {
            $('.notas').change(function() {
                let valor = $(this).val();
                if (valor >= 0 && valor <= 10) {
                    valor = parseFloat(valor);
                    let id = $(this).data('id');
                    let fecha = $(this).data('fecha');
                    console.log(fecha);
                    console.log(id);
                    console.log('El valor ha cambiado a: ' + valor); //Esto se tendrá que pasar por ajax
                    $.ajax({
                        url: '/evaluations/save_mark',
                        type: 'POST',
                        data: {
                            patient_id: id,
                            lesson_type: lesson_type,
                            date: fecha,
                            mark: valor,
                            _token: $('meta[name="csrf-token"]').attr('content') // CSRF

                        },
                        success: function(response) {
                            console.log('Nota guardada');
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error en la solicitud');
                            console.log(xhr);
                            console.log(status);
                            console.log(error);
                        }
                    })
                }


            });
        });

        $('.clickable').on('click', function() {
            var el_input = $('[data-id="' + $(this).data("id") + '"][data-fecha="' + $(this).data("fecha") +
                '"] input');
            var el_notas = $('span.notas[data-id="' + $(this).data("id") + '"][data-fecha="' + $(this).data(
                "fecha") + '"]');

            el_notas.hide();
            el_input.show();
            el_input.focus();
            el_input.select();
            el_input.on('input', function() {
                var valor = parseInt($(this).val());
                if (isNaN(valor) || valor < 0 || valor > 10) { //isNotANumber(valor)
                    $(this).val('');
                }
            });
        });
    </script>
@endsection
