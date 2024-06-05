<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use App\Models\Patient;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Patient $patient)
    {
        return view('patients.visitors.create', compact('patient'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $patient = Patient::findOrFail($request->patient_id);
        $visitor = new Visitor();
        $visitor->fill($request->all());
        $visitor->save();

        return redirect()->route('patients.edit', $patient)->with('success', 'visitor');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visitor $visitor)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitor $visitor)
    {
        $patient = $visitor->patient ;
        return view('patients.visitors.edit', compact('visitor', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitor $visitor)
    {
        $visitor->fill($request->all());
        $visitor->update();
        return redirect()->route('patients.edit', $visitor->patient)->with('success', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitor $visitor)
    {
        $patient = $visitor->patient;
        $visitor->delete();
        return redirect()->route('patients.edit', $patient)->with('success', 'deleted');
    }
}
