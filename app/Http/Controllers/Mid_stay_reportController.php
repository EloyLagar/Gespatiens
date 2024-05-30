<?php

namespace App\Http\Controllers;

use App\Models\Mid_stay_report;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use \Barryvdh\DomPDF\Facade\Pdf as PDF;

class Mid_stay_reportController extends Controller
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
    public function show(Mid_stay_report $mid_stay_report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mid_stay_report $mid_stay_report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mid_stay_report_id)
    {
        $midStayReport = Mid_stay_report::find($mid_stay_report_id);
        $report = Report::find($midStayReport->report_id);
        $midStayReport->fill($request->all());
        $midStayReport->update();
        $report->fill($request->all());
        $report->state=false;
        $report->update();

        $employee = auth()->user();
        $employee->reports()->syncWithoutDetaching([$report->id]);//Si no existe la relacion se agrega, en caso de que exista se omite

        return redirect()->route('reports.mid_stay_report_form', $report->patient_id)->with('success', __('crud.updated_report'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mid_stay_report $mid_stay_report)
    {
        //
    }

    public function preview(Mid_stay_report $midStayReport)
    {
        $employees = $midStayReport->report->users()->select('name', 'speciality', 'signature')->get();
        $pdf = PDF::loadView('reports.mid_report', compact('midStayReport', 'employees'));
        return $pdf->stream($midStayReport->report->patient->name . '_' . $midStayReport->report->patient->surname . '-Informe_media_estancia-' . date('d-m-Y'));
    }

    public function download(Mid_stay_report $midStayReport)
    {
        $employees = $midStayReport->report->users()->select('name', 'speciality', 'signature')->get();
        $pdf = PDF::loadView('reports.mid_report', compact('midStayReport', 'employees'));
        return $pdf->download($midStayReport->report->patient->name . '_' . $midStayReport->report->patient->surname . '-Informe_media_estancia-' . date('d-m-Y') . '.pdf');
    }
}
