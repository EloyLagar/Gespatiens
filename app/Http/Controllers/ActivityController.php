<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::orderByDesc('date')->simplePaginate(15);
        return view('diary.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $psychologists = User::where('speciality', 'psychologist')->get();
        $lesson_types = ['life_skills', 'health_education', 'carrer_help', 'occupational_workshop', 'video_forum', 'maintenance'];
        return view('diary.activities.create', compact('lesson_types', 'psychologists'));
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
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        if ($activity->state == true) {
            return redirect()->back()->with('error', __('error.already_in_use'));
        }
        $activity->state = true;
        $activity->update();
        return view('diary.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $activity->fill($request->all());
        $activity->state = false;
        $activity->update();
        return redirect()->route('activities.index')->with('success', 'updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }

    public function edit_attendance(Activity $activity)
    {
        if ($activity->state == true) {
            return redirect()->back()->with('error', __('error.already_in_use'));
        }
            $activity->state = true;
            $activity->update();
            $patients = $activity->patients()->orderBy('number', 'asc')->get();
            return view('diary.activities.attendance', compact('patients', 'activity'));
    }

    public function updateAttendance(Request $request, Activity $activity)
    {
        $patientsData = $request->input('patients');

        $syncData = [];
        foreach ($patientsData as $patientId => $status) {
            if ($status == 'reducted') {
                $syncData[$patientId] = [
                    'activity_id' => $activity->id,
                    'reducted' => true,
                    'assists' => false,
                    'justified' => false,
                ];
            } elseif ($status == 'assists') {
                $syncData[$patientId] = [
                    'activity_id' => $activity->id,
                    'reducted' => false,
                    'assists' => true,
                    'justified' => false,
                ];
            } elseif ($status == 'justified') {
                $syncData[$patientId] = [
                    'activity_id' => $activity->id,
                    'reducted' => false,
                    'assists' => false,
                    'justified' => true,
                ];
            }else{
                $syncData[$patientId] = [
                    'activity_id' => $activity->id,
                    'reducted' => false,
                    'assists' => false,
                    'justified' => false,
                ];
            }

        }

        $activity->patients()->sync($syncData);
        $activity->state = false;
        $activity->update();

        return redirect()->route('diary.showPage', ['date' => $activity->date])
        ->withMethod('GET')
        ->with('success', 'attendance');    }

    public function setStateFalse(Request $request){
        $Activity = Activity::find($request->activity_id);
        if ($Activity) {
            $Activity->state = false;
            $Activity->save();
            return response()->json(['success' => true, 'message' => 'Activity state false now']);
        }else{
            return response()->json(['success' => false, 'message' => 'No Activity found']);

        }
    }
}
