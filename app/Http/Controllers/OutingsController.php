<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outing;
use App\Models\Patient;
use \Carbon\Carbon;

class OutingsController extends Controller
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
    public function create($date)
    {
        $residents = Patient::where(function ($query) use ($date) {
            $query->where('entry_date', '<=', $date)
                ->where(function ($q) use ($date) {
                    $q->where('exit_date', '>=', $date)
                        ->orWhereNull('exit_date');
                });
        })
            ->orWhere(function ($query) use ($date) {
                $query->where('entry_date', '<=', $date)
                    ->whereNull('exit_date');
            })
            ->get();

        return view('diary.outings.create', compact('residents', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ]);
        if (!$request->exit_time && !$request->return_time) {
            return redirect()->back()->with('error', 'no_values');
        }else{
            $outing = new Outing();
            if ($request->exit_time) {
                $exit_datetime = Carbon::createFromFormat('d/m/Y H:i', $request->date . ' ' . $request->exit_time);
                $outing->exit_date = $exit_datetime;
            }

            if ($request->return_time) {
                $return_datetime = Carbon::createFromFormat('d/m/Y H:i', $request->date . ' ' . $request->return_time);
                $outing->return_date = $return_datetime;
            }

            if ($request->return_time && $request->exit_time && $return_datetime <= $exit_datetime) {
                return redirect()->back()->with('error', 'date_invalid');
            }

            $outing->patient_id = $request->patient_id;
            $date = Carbon::createFromFormat('d/m/Y', $request->date);
            $outing->save();
            return redirect()->route('diary.showPage', ['date' => $date])
            ->withMethod('GET')
            ->with('success', 'outing');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Outing $outing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outing $outing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outing $outing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outing $outing)
    {
        //
    }
}
