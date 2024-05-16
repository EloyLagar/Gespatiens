<?php

namespace App\Http\Controllers;

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
            $error = 'Los datos introducidos no son correctos, vuelva a intentarlo.';
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
        return redirect()->route('home');
    } else {
        dd($user->password);
        return redirect('/')->withErrors(['message' => 'Credenciales inválidas.']);
    }
}

}
