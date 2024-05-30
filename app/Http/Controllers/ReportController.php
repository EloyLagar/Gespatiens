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
        $reports = Report::simplePaginate(15);
        return view('reports.index', compact('reports'));
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
            $finalReport->report_id = $report->id;
            $finalReport->save();
        } elseif ($finalReport->report->state == true) {
            return redirect()->back()->with('error', __('error.already_in_use'));
        }
        $report = $finalReport->report;
        $report->state = true;
        $report->save();

        return view('reports.final_report_form', compact('patient', 'finalReport'));
    }


    public function mid_stay_report_form(Patient $patient)
    {

        $final_report = null;

        $final_report = $patient->getFinalReports()->latest()->first();

        if (!$final_report || $final_report == null) {

            $report = new Report(['patient_id' => $patient->id]);

            $finalReport = new Final_report();
            $finalReport->report_id = $report->id;
            $finalReport->save();
        } elseif (!$final_report->report->state == true) {
            return back()->with('error', __('error.already_in_use'));
        }
        $final_report->report->state = true;

        return view('reports.final_report_form', compact('patient', 'mid_stay_report'));
    }
    public function setStateFalse(Request $request){
        $report = Report::find($request->report_id);

        if ($report) {
            $report->state = false;
            $report->save();
            return response()->json(['success' => true, 'message' => 'Report state false now']);
        }else{
            return response()->json(['success' => false, 'message' => 'No report found']);

        }
    }
}
