<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Socialite;
use Exception;

class SocialController extends Controller
{
    public function redirectToProvider(Request $request, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Поиск пользователя по provider_id
            $user = User::where('provider_id', $socialUser->getId())->first();

            // Если пользователь не найден, ищем по email
            if (!$user) {
                $user = User::where('email', $socialUser->getEmail())->first();
                if (!$user) {
                    // Если пользователь не найден по email, создаем нового
                    $user = User::create([
                        'name' => $socialUser->getName(),
                        'email' => $socialUser->getEmail(),
                        'provider_id' => $socialUser->getId(),
                        'password' => bcrypt(Str::random(16)), // Устанавливаем случайный пароль
                        'is_admin' => 0, // Устанавливаем значение по умолчанию
                    ]);
                } else {
                    // Обновляем существующего пользователя
                    $user->update([
                        'name' => $socialUser->getName(),
                        'provider_id' => $socialUser->getId(),
                    ]);
                }
            }

            // Логика после авторизации, например, вход пользователя
            auth()->login($user);
            return redirect()->intended('/home'); // Или другая нужная вам страница

        } catch (Exception $e) {
            // Логируем ошибку
            Log::error('Ошибка при авторизации через ' . $provider . ': ' . $e->getMessage());
            return redirect('/login')->with('error', 'Ошибка при авторизации');
        }
    }
}
