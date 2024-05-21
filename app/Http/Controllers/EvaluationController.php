<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Patient;
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
        $residents = Patient::select('id', 'name', 'number')
            ->whereNotNull('number')
            ->get();

        //Prueba con fechas
        $ano = 2024;
        $mes = 5;

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
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }
}
