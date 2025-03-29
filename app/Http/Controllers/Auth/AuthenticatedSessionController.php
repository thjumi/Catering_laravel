<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Muestra la vista de login.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Maneja una solicitud de autenticación.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Obtener el usuario autenticado
            $user = Auth::user();

            // Redirección basada en el rol
            if (trim(strtolower($user->role)) === 'empleado') {
                return redirect()->route('dashboard.empleado');
            } elseif (trim(strtolower($user->role)) === 'administrador stock') {
                return redirect()->route('dashboard.stock');
            } elseif (trim(strtolower($user->role)) === 'administrador') {
                return redirect()->route('dashboard.admin');
            }

            // Redirección por defecto en caso de rol desconocido
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Destruye una sesión autenticada.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
