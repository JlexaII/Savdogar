<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Показать форму входа
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Попытка авторизации
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Перенаправление после успешного входа
            return redirect()->intended('/');
        }

        // Возврат с ошибкой, если авторизация не удалась
        return redirect()->back()->withErrors(['email' => 'Неверные учетные данные.']);
    }

    // Выход
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home'); // Переход на главную страницу после выхода
    }
}
