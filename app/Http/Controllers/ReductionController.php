<?php

namespace App\Http\Controllers;

use App\Models\Reduction;
use App\Models\Patient;
use Illuminate\Http\Request;

class ReductionController extends Controller
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

        return view('diary.reductions.create', compact('residents', 'date'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reduction = new Reduction();
        $reduction->fill($request->all());
        $reduction->save();
        $date = $reduction->date;
        return redirect()->route('diary.showPage', compact('date'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Reduction $reduction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reduction $reduction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reduction $reduction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reduction $reduction)
    {
        //
    }
}
