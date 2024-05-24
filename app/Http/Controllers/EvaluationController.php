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
    public function index(Request $request)
    {
        $data = $request->validate([
            'mes_ano' => 'required|date_format:Y-m',
            'lesson_type' => 'required|string',
        ]);

        // Extraer el tipo de lección
        $lesson_type = $request->lesson_type;

        // Extraer el año y el mes del campo mes_ano
        list($ano, $mes) = explode('-', $data['mes_ano']);

        // Crear el primer día del mes y el último día del mes
        $primerDiaMes = Carbon::create($ano, $mes, 1);
        $ultimoDiaMes = Carbon::create($ano, $mes, 1)->endOfMonth();


        //Se obitenen los residentes que en caso de no ser nula la fecha de salida han estado residiendo durante ese mes
        $residents = Patient::where(function ($query) use ($primerDiaMes, $ultimoDiaMes) {
            $query->whereNull('exit_date')
                ->orWhere('exit_date', '>=', $primerDiaMes)
                ->orWhere('exit_date', '<=', $ultimoDiaMes);
        })
            ->with([
                'evaluations' => function ($query) use ($primerDiaMes, $ultimoDiaMes) { //Se recogen los pacientes con las evaluaciones de ese mes.
                    $query->whereBetween('date', [$primerDiaMes, $ultimoDiaMes]);
                }
            ])
            ->select('id', 'name', 'number')
            ->orderBy('number', 'asc')
            ->get();

        // Crear el período con las dos fechas
        $periodo = CarbonPeriod::create($primerDiaMes, $ultimoDiaMes);

        return view('patients.evaluations.index', compact('residents', 'periodo', 'mes', 'ano', 'lesson_type'));
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

    public function indexForm()
    {
        $enum = ['therapeutic_groups', 'life_skills', 'health_education', 'carrer_help', 'occupational_workshop', 'video_forum', 'maintenance'];
        return view('patients.evaluations.indexForm', compact('enum'));
    }


    public function save_evaluation(Request $request)
    {
        $evaluation = new Evaluation();
        $evaluation->patient_id = $request->patient_id;
        $evaluation->mark = $request->mark;
        $evaluation->date = $request->date;
        $evaluation->save();

        return response()->json(['status' => 'success']);
    }

}
