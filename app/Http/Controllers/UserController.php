<?php

namespace App\Http\Controllers;
use App\Models\User; // или другое пространство имен, если используется.

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function destroy(Request $request)
    {
        $user = Auth::user();
        Auth::logout();

        // Удаляем аккаунт пользователя
        $user->delete();

        // Перенаправляем на главную страницу с сообщением
        return redirect('/')->with('status', 'Ваш аккаунт был успешно удалён.');
    }
}

