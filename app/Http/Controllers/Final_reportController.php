<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFinalReportRequest;
use App\Models\Final_report;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Barryvdh\DomPDF\Facade\Pdf as PDF;


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
    public function update(UpdateFinalReportRequest $request, $final_report_id)
    {
        $finalReport = Final_report::find($final_report_id);
        $report = Report::find($finalReport->report_id);
        $finalReport->fill($request->all());
        $finalReport->update();
        $report->fill($request->all());
        $report->state=false;
        $report->update();

        $employee = auth()->user();
        $employee->reports()->syncWithoutDetaching([$report->id]);//Si no existe la relacion se agrega, en caso de que exista se omite

        return redirect()->route('reports.final_report_form', $report->patient_id)->with('success', __('crud.updated_report'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Final_report $final_report)
    {
        //
    }

    public function preview(Final_report $finalReport)
    {
        $pdf = PDF::loadView('reports.final_report', compact('finalReport'));
        return $pdf->stream($finalReport->report->patient->name . '_' . $finalReport->report->patient->surname . '-Informe_final_estancia-' . date('d-m-Y'));
    }

    public function download(Final_report $finalReport)
    {
        $pdf = PDF::loadView('reports.final_report', compact('finalReport'));
        return $pdf->download($finalReport->report->patient->name . '_' . $finalReport->report->patient->surname . '-Informe_final_-' . date('d-m-Y') . '.pdf');
    }
}
