<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function diaryForm()
    {
        return view('diary.diaryForm');
    }
}
