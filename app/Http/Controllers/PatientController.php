<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::where('exit_date', '<', now())
            ->whereNull('number')
            ->simplePaginate(15);
        return view('patients.index', compact('patients'));

    }

    /**
     * Display a listing of the resource.
     */
    public function indexResidents()
    {
        $residents = Patient::whereNotNull('number')
            ->orderBy('number', 'asc')
            ->simplePaginate(15);
        return view('patients.residents', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePatientRequest $request)
    {
        $patientsWithNumber = Patient::whereNotNull('number')->get();
        if ($patientsWithNumber->count() < 32) {
            $patient = new Patient();
            $patient->entry_date = now();
            $patient->fill($request->all());
            $assignedNumbers = $patientsWithNumber->pluck('number')->toArray();
            for ($i = 1; $i <= 32; $i++) {
                if (!in_array($i, $assignedNumbers)) {
                    $patient->number = $i;
                    break;
                }
            }
            $patient->save();
            return redirect()->route('indexResidents')->with('success', 'saved');
        } else {
            return redirect()->route('indexResidents')->with('error', 'fullPatients');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        $educators = User::where('speciality', 'educator')->get();
        $psychologists = User::where('speciality', 'psychologist')->get();
        return view('patients.edit', compact('patient', 'educators', 'psychologists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        if ($request->filled('dni')) {
            $patient->dni = $request->dni;
        }

        if ($request->filled('visit_code')) {
            $patient->visit_code = $request->visit_code;
        }

        if ($request->filled('birth_date')) {
            $patient->birth_date = $request->birth_date;
        }

        if ($request->filled('address')) {
            $patient->address = $request->address;
        }

        if ($request->filled('belongings')) {
            $patient->belongings = $request->belongings;
        }

        if ($request->filled('phone_number')) {
            $patient->phone_number = $request->phone_number;
        }

        if ($request->filled('extra_info')) {
            $patient->extra_info = $request->extra_info;
        }

        if ($request->filled('abuse_substances')) {
            $patient->abuse_substances = $request->abuse_substances;
        }

        if ($request->filled('name')) {
            $patient->name = $request->name;
        }

        if ($request->filled('surname')) {
            $patient->surname = $request->surname;
        }

        if ($request->filled('sip')) {
            $patient->sip = $request->sip;
        }

        $patient->update();

        return redirect()->route('patients.edit', $patient)->with('success', 'updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }

    public function unsuscribe(Patient $patient)
    {
        $patient->exit_date = now();
        $patient->number = null;
        $patient->save();
        return redirect()->route('patients.edit', $patient)->with('success', 'unsuscribed');
    }

    public function register(Patient $patient)
    {
        $patientsWithNumber = Patient::whereNotNull('number')->orderBy('number', 'asc')->get();
        if ($patientsWithNumber->count() < 32) {
            $patient->entry_date = now();
            $patient->exit_date = null;
            $assignedNumbers = $patientsWithNumber->pluck('number')->toArray();
            for ($i = 1; $i <= 32; $i++) {
                if (!in_array($i, $assignedNumbers)) {
                    $patient->number = $i;
                    $patient->save();
                    return redirect()->route('patients.edit', $patient)->with('success', 'registered');
                }
            }
            return redirect()->route('patients.edit', $patient)->with('success', 'registered');
        } else {
            return redirect()->route('home')->with('error', 'fullPatients');
        }
    }

    public function updateTutors(Request $request, Patient $patient)
    {
        //Comprobación para que no entre nulo
        $tutors = array_filter([$request->tutor_psycho, $request->tutor_educator]);

        //Crea la relacion y Elimina cualquier relacion anterior
        $patient->is_tutored()->sync($tutors, true);

        return redirect()->route('patients.edit', $patient)->with('success', 'updated');
    }
}
