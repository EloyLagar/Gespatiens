<?php

namespace App\Http\Controllers;

use App\Models\Therapeutic_group;
use App\Models\Activity;
use Illuminate\Http\Request;

class Therapeutic_groupController extends Controller
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
        $activity = new Activity(['date' => $request->date]);
        $activity->fill($request->all());
        $activity->save();
        $therapeutic_group = new Therapeutic_group();
        $therapeutic_group->fill($request->all());
        $therapeutic_group->activity_id = $activity->id;
        $therapeutic_group->save();

        return redirect()->route('activities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Therapeutic_group $therapeutic_group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Therapeutic_group $therapeutic_group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Therapeutic_group $therapeutic_group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Therapeutic_group $therapeutic_group)
    {
        //
    }
}
