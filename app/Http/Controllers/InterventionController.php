<?php

namespace App\Http\Controllers;

use App\Models\Intervenction;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;

class InterventionController extends Controller
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
        $user_id = Auth::user()->id;

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

        $residents->load('is_tutored');
        $residents = $residents->filter(function ($resident) use ($user_id) {
            return $resident->is_tutored->contains('id', $user_id);
        });


        return view('diary.interventions.create', compact('residents', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $intervention = new Intervenction();
        $intervention->fill($request->all());
        $date = Carbon::createFromFormat('d/m/Y', $request->date);
        $formatted_date = $date->format('Y-m-d');
        $intervention->date = $formatted_date;
        $intervention->user_id = $request->user_id;
        $intervention->save();
        return redirect()->route('diary.showPage', ['date' => $date])
            ->withMethod('GET')
            ->with('success', 'outing');
    }

    /**
     * Display the specified resource.
     */
    public function show(Intervenction $intervenction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intervenction $intervenction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Intervenction $intervenction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intervenction $intervenction)
    {
        //
    }
}
