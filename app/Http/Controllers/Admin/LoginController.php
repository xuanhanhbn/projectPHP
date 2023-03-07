<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use App\Http\Middleware;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'identifier' => ['required'],
            'password' => ['required'],
        ]);

        if (
            Auth::attempt(['email' => $request->identifier, 'password' => $request->password])
            || Auth::attempt(['phone' => $request->identifier, 'password' => $request->password])
        ) {
            $request->session()->regenerate();
            $user = auth()->user();
            switch ($user->Role->role) {
                case "admin":
                    return redirect()->intended(route("admin_home"));
                case "employee":
                    return redirect()->intended(route("admin_home"));
                default:
                    return redirect()->intended(route("user_home"));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route("login"));
    }
}