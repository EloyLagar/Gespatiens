<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(5);
        return view('patients.index', compact('patients'));
    }

    /**
     * Display a listing of the resource.
     */
    public function indexResidents()
    {
        $residents = Patient::whereNotNull('number')
            ->orderBy('number')
            ->get();
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
    public function store(Request $request)
    {
        //
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
        return view('patients.edit', compact('patient'));
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

        $patient->update();

        return redirect()->route('patients.edit', $patient)->with('success', 'User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
