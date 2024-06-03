<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Sport;
use App\Models\Patient;
use Illuminate\Http\Request;

class SportController extends Controller
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
        $residents = Patient::where(function ($query) use ($request) {
            $query->where('entry_date', '<=', $request->date)
                  ->where(function ($q) use ($request) {
                      $q->where('exit_date', '>=', $request->date)
                        ->orWhereNull('exit_date');
                  });
        })
        ->orWhere(function ($query) use ($request) {
            $query->where('entry_date', '<=', $request->date)
                  ->whereNull('exit_date');
        })
        ->get();

        $activity = new Activity(['date' => $request->date]);
        $activity->fill($request->all());
        $activity->save();
        $sport = new Sport();
        $sport->activity_id = $activity->id;
        $sport->save();

        foreach ($residents as $patient) {
            $activity->patients()->attach($patient->id, ['assists' => true]);
        }

        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sport $sport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sport $sport)
    {
        return view('sports.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sport $sport)
    {
        $sport->fill($request->all());
        $sport->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sport $sport)
    {
        //
    }
}
