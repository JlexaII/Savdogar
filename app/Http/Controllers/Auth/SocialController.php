<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\DB;

class SocialController extends Controller
{
    public function redirectToProvider(Request $request, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback(Request $request, $provider)
    {
        try {
            // Получаем данные пользователя из социального провайдера
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // Начинаем транзакцию базы данных
            DB::beginTransaction();

            // Попытка найти пользователя по provider_id
            $user = User::where('provider_id', $socialUser->getId())->first();

            if (!$user) {
                // Если пользователь не найден по provider_id, ищем по email
                $user = User::where('email', $socialUser->getEmail())->first();

                if (!$user) {
                    // Если пользователь не найден, создаем нового
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
                        'provider_id' => $socialUser->getId(),
                    ]);
                }
            } else {
                // Если пользователь найден по provider_id, обновляем его данные
                $user->update([
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                ]);
            }

            // Завершаем транзакцию
            DB::commit();

            // Логика после авторизации, например, вход пользователя
            auth()->login($user);
            return redirect()->intended('/'); // Или другая нужная вам страница

        } catch (Exception $e) {
            // Откатываем транзакцию в случае ошибки
            DB::rollBack();

            // Логируем ошибку
            Log::error('Ошибка при авторизации через ' . $provider . ': ' . $e->getMessage());
            return redirect('/login')->with('error', 'Ошибка при авторизации');
        }
    }
}
