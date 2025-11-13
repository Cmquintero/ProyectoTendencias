<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class LoginController extends Controller
{
    /* =============================
       🔹 Mostrar formularios
    ============================== */

    public function showLoginForm()
    {
        return view('Login.login');
    }

    public function showRegister()
    {
        return view('Login.register');
    }

    public function showForgot()
    {
        return view('Login.forgot');
    }

    public function showResetForm($token)
    {
        return view('Login.reset-password', ['token' => $token]);
    }

    /* =============================
       🔹 Registro
    ============================== */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:50',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role'     => 'required|in:plan_estudios,docente,estudiante',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Cuenta creada correctamente ✅');
    }

    /* =============================
       🔹 Inicio de sesión
    ============================== */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('not_registered', '⚠️ Usuario no registrado. Regístrate primero.');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 🔸 Redirección según el rol
            switch ($user->role) {
                case 'plan_estudios':
                    return redirect()->route('asignaturas.index')->with('success', 'Bienvenido plan de estudios 📘');
                case 'docente':
                    return redirect()->route('docentes.index')->with('success', 'Bienvenido docente 👨‍🏫');
                case 'estudiante':
                    return redirect()->route('estudiantes.index')->with('success', 'Bienvenido estudiante 🎓');
                default:
                    return redirect()->route('welcome');
            }
        }

        return back()->withErrors(['password' => 'Contraseña incorrecta ❌']);
    }

    /* =============================
       🔹 Cerrar sesión
    ============================== */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente 👋');
    }

    /* =============================
       🔹 Recuperación de contraseña
    ============================== */
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:6',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Contraseña restablecida correctamente 🔐')
            : back()->withErrors(['email' => __($status)]);
    }
}
