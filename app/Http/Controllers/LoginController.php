<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{

    public function signupForm()
    {
        return view('auth.signup');
    }

    public function signup(SignupRequest $request)
    {
        //
    }
    public function loginForm()
    {
        if (Auth::viaRemember()) {
            return 'Bienvenido de nuevo';
        } else if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return view('auth.login');
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            $error = 'login_error';
            return view('auth.login', compact('error'));
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function verify(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            return redirect('/')->withErrors(['message' => 'Token no proporcionado.']);
        }

        $user = User::where('token', $token)->first();

        if (!$user) {
            return redirect('/')->withErrors(['message' => 'Token inválido.']);
        }

        $credentials = [
            'email' => $user->email,
            'password' => $user->name . '.Gespatiens',
        ];

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return view('auth.createPassword');
        } else {
            return redirect('/')->withErrors(['message' => 'Credenciales inválidas.']);
        }
    }

    public function updatePassword(UpdateUserRequest $request)
    {
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('home');
    }
}
