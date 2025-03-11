<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended($request->input('redirect', '/questiion'))->withErrors([
                'success' => 'Вы успешно вошли в систему',
            ]);
        }
        return back()->withErrors([
            'error' => 'Данные об аккаунте с таким именем и паролем не найдены. Попробуйте еще раз',
        ])->onlyInput('email', 'password');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/question')->withErrors([
            'success' => 'Вы успешно вышли из системы',
        ]);
    }
}
