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
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    @php
                        $mediasCount = 1;
                    @endphp
                    @foreach ($periodo as $fecha)
                        @if ($fecha->format('w') == 1)
                            <th>{{'M'.$mediasCount }}</th>
                            @php
                                $mediasCount++;
                            @endphp
                        @endif
                        <th>{{ $fecha->day }}</th>
                    @endforeach
                </tr>
                <tr>
                    <td>Usuario</td>
                    @foreach ($periodo as $fecha)
                        @if ($fecha->formatLocalized('%d') == 1)
                            <th></th>
                            @php
                                $mediasCount++;
                            @endphp
                        @endif
                        <th>{{ $fecha->format('l') }}</th>
                    @endforeach
                </tr>
            </thead>
            @foreach ($residents as $resident)
                <tr>
                    <td>{{ $resident }}</td>
                    @foreach ($periodo as $fecha)
                        @if ($fecha->format('w') == 1)
                            <td></td>
                            @php
                                $mediasCount++;
                            @endphp
                        @endif
                        <td>
                            {{ $resident . '_' . $fecha->day . '_' . $mes . '_' . $ano }}
                            {{-- id="{{ $resident. '_' . $fecha->day . '_' . $mes . '_' . $año }}"> --}}
                        </td> <!-- Input para introducir las notas -->
                    @endforeach
                </tr>
            @endforeach
        </table>
    </div>
@endsection

<script>
	$(.clickable).on('click', function (){
		var el_input = $('[data-id='$(this).attr("data-id")+'][data-fecha='$(this).attr("data-fecha")+']');
		$(.notas).hide();
		el_input.show();
	});

</script>
