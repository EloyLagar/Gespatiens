<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = [
            'Juan', 'María', 'Pedro', 'Ana', 'Luis', 'Laura', 'Carlos', 'Sofía', 'Miguel', 'Lucía',
            'Alejandro', 'Elena', 'Diego', 'Paula', 'Javier', 'Martina', 'Antonio', 'Emma', 'Gabriel', 'Valentina',
            'José', 'Isabella', 'Fernando', 'Natalia', 'Adrián', 'Valeria', 'Raúl', 'Camila', 'Pablo', 'Daniela',
            'Manuel', 'Julia'
        ];
        // Establecer el mes y el año
        $ano = 2024;
        $mes = 4; // Abril

        // Crear el primer día del mes y el último día del mes
        $primerDiaMes = Carbon::create($ano, $mes, 1);
        $ultimoDiaMes = Carbon::create($ano, $mes, 1)->endOfMonth();
        // dd($primerDiaMes, $ultimoDiaMes);

        // Crear el período de tiempo
        $periodo = CarbonPeriod::create($primerDiaMes, $ultimoDiaMes);

        return view('users.evaluations.index', compact('residents', 'periodo', 'mes', 'ano'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
