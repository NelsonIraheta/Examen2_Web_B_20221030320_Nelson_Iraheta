<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'ends_with:@agrovalle.hn'],
            'password' => ['required'],
        ], [
            'email.required' => 'El correo institucional es obligatorio.',
            'email.email' => 'Ingresa un correo electrónico válido.',
            'email.ends_with' => 'El correo debe ser institucional (@agrovalle.hn).',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();   // prevención de fijación de sesión
            return redirect()->intended(route('dashboard'))
                ->with('success', '¡Bienvenido, ' . Auth::user()->name . '!');
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');   // conserva el correo ingresado
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Has cerrado sesión correctamente.');
    }
}
