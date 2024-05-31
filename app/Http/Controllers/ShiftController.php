<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;

class ShiftController extends Controller
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
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shift $shift)
    {
        $educators = User::where('speciality', 'educator')->get();

        //Se recogen los educadores que no estan relacionados con el turno
        $noWorkers = User::where('speciality', 'educator')
            ->whereDoesntHave('shifts', function ($query) use ($shift) {
                $query->where('shift_id', $shift->id);
            })
            ->get();

        return view('diary.shifts.edit', compact('shift', 'educators', 'noWorkers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shift $shift)
    {
        // dd($request->all());
        $shift->interesting_info = $request->interesting_info;
        $shift->save();

        //Se crea la relacion
        $shift->users()->detach();
        $shift->users()->sync($request->educators);


        return redirect()->route('diary.showPage', ['date' => $shift->date])
            ->withMethod('GET');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shift $shift)
    {
        //
    }
}
