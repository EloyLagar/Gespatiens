<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LanguageController extends Controller
{
    public function change(Request $request)
    {
        $request->validate([
            'locale' => 'required|in:en,es'
        ]);

        session(['locale' => $request->locale]);

        return redirect()->route('users.edit', Auth::user());
    }
}
