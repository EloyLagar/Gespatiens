<?php

namespace App\Http\Controllers;

use App\Models\Walk;
use App\Models\Activity;
use App\Models\Patient;
use Illuminate\Http\Request;

class WalkController extends Controller
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
        $walk = new Walk();
        $walk->activity_id = $activity->id;
        $walk->save();

        foreach ($residents as $patient) {
            $activity->patients()->attach($patient->id, ['assists' => true]);
        }

        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Walk $walk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Walk $walk)
    {
        return view('walks.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Walk $walk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Walk $walk)
    {
        //
    }
}
