<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Outing;
use App\Models\Activity;
use App\Models\Reduction;
use App\Models\Intervenction;

class DiaryController extends Controller
{
    public function diaryForm()
    {
        return view('diary.diaryForm');
    }

    public function showPage(Request $request, $date = null)
    {

        //Control por si entra por get
        if ($date) {
            $date = \Carbon\Carbon::parse($date);
            $request->date = $date;
        }

        $outings = Outing::whereDate('exit_date', $request->date)
            ->orWhereDate('return_date', $request->date)
            ->get();

        $morning_shift = Shift::whereDate('date', $request->date)->where('day_part', 'morning')->with('users')->first();
        if (!$morning_shift) {
            $morning_shift = Shift::create([
                'date' => $request->date,
                'day_part' => 'morning',
                'state' => false,
            ]);
        }

        $afternoon_shift = Shift::whereDate('date', $request->date)->where('day_part', 'afternoon')->with('users')->first();
        if (!$afternoon_shift) {
            $afternoon_shift = Shift::create([
                'date' => $request->date,
                'day_part' => 'afternoon',
                'state' => false,
            ]);
        }

        $night_shift = Shift::whereDate('date', $request->date)->where('day_part', 'night')->with('users')->first();
        if (!$night_shift) {
            $night_shift = Shift::create([
                'date' => $request->date,
                'day_part' => 'night',
                'state' => false,
            ]);
        }

        $activities = Activity::with(['assistants', 'reducteds', 'justifieds', 'no_justifieds'])
            ->whereDate('date', $request->date)
            ->get();
        $intervenctions = Intervenction::whereDate('date', $request->date)->get();
        $reductions = Reduction::whereDate('date', $request->date)->get();

        $date = \Carbon\Carbon::parse($request->date);
        return view('diary.page', [
            'date' => $date,
            'outings' => $outings,
            'morning_shift' => $morning_shift,
            'afternoon_shift' => $afternoon_shift,
            'night_shift' => $night_shift,
            'activities' => $activities,
            'interventions' => $intervenctions,
            'reductions' => $reductions,
        ]);
    }

}
