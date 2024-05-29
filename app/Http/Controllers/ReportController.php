<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Patient;
use App\Models\Final_report;
use Illuminate\Http\Request;

class ReportController extends Controller
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
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

    public function final_report_form(Patient $patient)
    {
        $finalReport = $patient->getFinalReports()->latest()->first();

        if (!$finalReport) {

            $report = new Report();
            $report->patient_id = $patient->id;
            $report->save();

            $finalReport = new Final_report();
            $finalReport->report()->associate($report);
            $finalReport->save();
        } elseif (!$finalReport->report->state == true) {
            return back()->with('error', __('error.already_in_use'));
        }

        $report = $finalReport->report;

        $report->state = true;

        return view('reports.final_report_form', compact('patient', 'finalReport', 'report'));
    }
}
