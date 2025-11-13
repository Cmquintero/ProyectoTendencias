<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    public function showResetForm($token)
{
    return view('Login.reset-password', ['token' => $token]);
}

    public function showLoginForm()
    {
        return view('Login.login');
    }

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Verificamos si el usuario existe
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        // ✅ Si no existe, mandamos un mensaje a la vista (sin redirección extra)
        return back()->with('not_registered', 'Regístrate primero, mi broder 😎');
    }

    // Intentamos autenticar
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('horarios.index')->with('success', 'Bienvenido al sistema 👋');
    }

    // Si el usuario existe pero la contraseña no coincide
    return back()->withErrors([
        'password' => 'Contraseña incorrecta, intenta de nuevo.',
    ]);
}
public function resetPassword(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:6',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        }
    );

    return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('success', 'Contraseña restablecida correctamente.')
        : back()->withErrors(['email' => __($status)]);
}



    public function showRegister()
    {
        return view('Login.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Cuenta creada correctamente.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function showForgot()
    {
        return view('Login.forgot');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }
}
