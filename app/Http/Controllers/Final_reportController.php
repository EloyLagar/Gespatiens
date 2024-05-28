<?php

namespace App\Http\Controllers;

use App\Models\Final_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Final_reportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Final_report $final_report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Final_report $final_report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Final_report $final_report)
    {


        $patient_id = $final_report->report->patient->id;
        $employee_id = Auth::user()->id;
        $final_report->report->users()->attach($employee_id, ['patient_id' => $patient_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Final_report $final_report)
    {
        //
    }
}
