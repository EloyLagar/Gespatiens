<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Activity;
use App\Models\Reduction;
use App\Models\Intervenction;

class DiaryController extends Controller
{
    public function diaryForm()
    {
        return view('diary.diaryForm');
    }

    public function showPage(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $morning_shift = Shift::whereDate('date', $request->date)->where('day_part', 'morning')->with('users')->first();
        $afternoon_shift = Shift::whereDate('date', $request->date)->where('day_part', 'afternoon')->with('users')->first();
        $night_shift = Shift::whereDate('date', $request->date)->where('day_part', 'night')->with('users')->first();
        $activities = Activity::with(['assistants', 'reducteds', 'justifieds', 'no_justifieds'])
            ->whereDate('date', $request->date)
            ->get();
        $intervenctions = Intervenction::whereDate('date', $request->date)->get();
        $reductions = Reduction::whereDate('date', $request->date)->get();

        dd($request->date, $morning_shift, $afternoon_shift, $night_shift, $activities, $intervenctions, $reductions);

        $date = \Carbon\Carbon::parse($request->date);

        return view('diary.page', [
            'date' => $date,
            'morning_shift' => $morning_shift,
            'afternoon_shift' => $afternoon_shift,
            'night_shift' => $night_shift,
            'activities' => $activities,
            'interventions' => $intervenctions,
            'reductions' => $reductions,
        ]);
    }

}
