<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outing;
use App\Models\Patient;

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
        $outing = new Outing();
        $outing->fill($request->all());
        $outing->save();
        $date = $outing->date;
        return redirect()->route('diary.showPage', ['date' => $outing->date])
        ->withMethod('GET');
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
