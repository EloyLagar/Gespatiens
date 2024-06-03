@extends('layouts.app')

@section('css')
    @parent
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
@endsection

@section('content')
{{-- @dd($evaluationsMap[3]) --}}
    <div class="wrapper d-flex flex-column">
        <div class="container">
            <a href="{{ route('evaluations.indexForm') }}" class="goBackBtn btn"><i class='bx bx-left-arrow-alt'></i></a>
            <h1 class="mt-3 mb-3"> {{ __('evaluations.lesson_type.' . $lesson_type) }}</h1>
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
                            <th>MT</th>
                        </tr>
                        <tr>
                            <th>{{ __('patients.singular') }}</th>
                            @foreach ($periodo as $fecha)
                                @if ($fecha->format('w') == 0)
                                    <th>{{ __('days.' . $fecha->format('w')) }}</th>
                                    <th></th>
                                @else
                                    <th>{{ __('days.' . $fecha->format('w')) }}</th>
                                @endif
                            @endforeach
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($residents as $resident)
                            @php
                                $contClases = 0;
                                $weeklyAverage = 0;
                                $totalWeeklyAverage = 0;
                                $weeks = 0;
                            @endphp
                            <tr>
                                <td class="td-name
                            ">
                                    @isset($resident->number)
                                        {{ $resident->number }} -
                                    @endisset
                                    {{ $resident->name }}</td>
                                @foreach ($periodo as $fecha)
                                    @php
                                        $formattedFecha = date('Y-m-d', strtotime($fecha));
                                    @endphp
                                    @if (
                                        ($formattedFecha >= $resident->entry_date && $formattedFecha <= $resident->exit_date) ||
                                            $resident->exit_date == null)
                                        @php
                                            //Del mapa de evaluaciones se saca referenciando al paciente y despues la fecha
                                            $mark = $evaluationsMap[$resident->id][$fecha->format('Y-m-d H:i:s')] ?? '';
                                            if ($mark !== '') {
                                                $contClases++;
                                                $weeklyAverage += $mark;
                                                //Para sacar las medias
                                            }
                                        @endphp
                                        @if ($fecha->format('w') == 0)
                                            <td title="Pulse para modificar la nota" data-id="{{ $resident->id }}"
                                                data-fecha="{{ $fecha }}" class="clickable">
                                                <div>
                                                    <input type="text" data-id="{{ $resident->id }}"
                                                        data-fecha="{{ $fecha }}" class="notas cell-input"
                                                        value="{{ $mark }}">
                                                </div>
                                            </td>
                                            <td class="average">
                                                @if ($contClases !== 0)
                                                    @php
                                                        $totalWeeklyAverage += $weeklyAverage / $contClases;
                                                        $weeks++;
                                                    @endphp
                                                    {{ number_format($weeklyAverage / $contClases, 2) }}
                                                @endif
                                            </td>
                                            @php
                                                $weeklyAverage = 0;
                                                $mediasCount++;
                                            @endphp
                                        @else
                                            <td data-id="{{ $resident->id }}"
                                                data-fecha="{{ $fecha }}" class="clickable">
                                                <div>
                                                    <input type="text" data-id="{{ $resident->id }}"
                                                        data-fecha="{{ $fecha }}" class="notas cell-input"
                                                        value="{{ $mark }}">
                                                </div>
                                            </td>
                                        @endif
                                    @else
                                        @if ($fecha->format('w') == 0)
                                            <td></td>
                                            <td class="average">
                                                @if ($contClases !== 0)
                                                    @php
                                                        $totalWeeklyAverage += $weeklyAverage / $contClases;
                                                        $weeks++;
                                                    @endphp
                                                    {{ number_format($weeklyAverage / $contClases, 2) }}
                                                @endif
                                            </td>
                                            @php
                                                $weeklyAverage = 0;
                                                $mediasCount++;
                                            @endphp
                                        @else
                                            <td></td>
                                        @endif
                                    @endif
                                @endforeach
                                <td class="average total-average">
                                    @if ($weeks !== 0)
                                        {{ number_format($totalWeeklyAverage / $weeks, 2) }}
                                    @endif
                                </td>
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
                valor = valor.replace(/,/g, '.'); //Se cambia por un punto para que no de problemas
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
