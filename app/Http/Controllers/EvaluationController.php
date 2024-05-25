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
        $primerDiaMes = Carbon::create($ano, $mes, 1)->startOfDay();
        $ultimoDiaMes = Carbon::create($ano, $mes, 1)->endOfMonth()->endOfDay();

        //Se obitenen los residentes que en caso de no ser nula la fecha de salida han estado residiendo durante ese mes
        $residents = Patient::where(function ($query) use ($primerDiaMes, $ultimoDiaMes) {
            $query->where(function ($q) use ($primerDiaMes, $ultimoDiaMes) {
                $q->whereNull('exit_date')
                    ->orWhereBetween('exit_date', [$primerDiaMes, $ultimoDiaMes]);
            })->where(function ($q) use ($primerDiaMes, $ultimoDiaMes) {
                $q->where('entry_date', '<=', $ultimoDiaMes);
            });
        })
            ->with([
                'evaluations' => function ($query) use ($primerDiaMes, $ultimoDiaMes, $lesson_type) {
                    $query->whereBetween('date', [$primerDiaMes, $ultimoDiaMes])
                        ->where('lesson_type', $lesson_type)
                        ->select('patient_id', 'mark', 'date');
                }
            ])
            ->select('id', 'name', 'number', 'exit_date', 'entry_date')
            ->orderBy('number', 'asc')
            ->get();

        // Mapear las evaluaciones por fecha para cada residente
        $evaluationsMap = [];
        foreach ($residents as $resident) {
            //Formato (Y-m-d H:i:s)
            $evaluationsByDate = $resident->evaluations->groupBy('date')->mapWithKeys(function ($evaluations, $date) {
                return [$date => $evaluations->first()->mark];
            });
            $evaluationsMap[$resident->id] = $evaluationsByDate;
        }

        // Crear el período con las dos fechas
        $periodo = CarbonPeriod::create($primerDiaMes, $ultimoDiaMes);
        // dd($residents->toArray());
        return view('patients.evaluations.index', compact('residents', 'periodo', 'mes', 'ano', 'lesson_type', 'evaluationsMap'));
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


    public function saveEvaluation(Request $request)
    {
        //En caso de exista se recoge una evaluacion
        $evaluation = Evaluation::where('patient_id', $request->patient_id)
            ->where('date', $request->date)
            ->first();

        //Si existe esta evaluación se modifica la nota, sino, se crea una nueva evaluacion
        if ($evaluation) {
            $evaluation->mark = $request->mark;
            $evaluation->save();
        } else {
            $evaluation = new Evaluation();
            $evaluation->patient_id = $request->patient_id;
            $evaluation->mark = $request->mark;
            $evaluation->date = $request->date;
            $evaluation->save();
        }

        return response()->json(['status' => 'success']);
    }


}
