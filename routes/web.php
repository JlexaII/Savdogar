<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdvertisementController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;

// Стандартные маршруты для аутентификации
Auth::routes();

// Маршруты для сброса пароля
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Ресурсные маршруты для объявлений (исключая create и store, так как они отдельно определены)
Route::resource('advertisements', AdvertisementController::class)->except(['create', 'store']);

// Админ панель - только для аутентифицированных админов
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::post('/admin/dashboard/{id}/approve', [AdminDashboardController::class, 'approve'])->name('admin.dashboard.approve');
    Route::post('/admin/dashboard/{id}/rework', [AdminDashboardController::class, 'rework'])->name('admin.dashboard.rework'); // Доработать
    Route::delete('/admin/dashboard/{id}', [AdminDashboardController::class, 'destroy'])->name('admin.dashboard.destroy'); // Удалить
});

// Ресурсные маршруты для новостей
Route::resource('news', NewsController::class);

// Маршруты для создания и сохранения объявления
Route::get('categories/{category}/create', [AdvertisementController::class, 'create'])->name('advertisements.create');
Route::post('advertisements', [AdvertisementController::class, 'store'])->name('advertisements.store');

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршруты для категорий
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
// Роуты для категорий и подкатегорий
Route::get('categories/{category}', [AdvertisementController::class, 'showCategory'])->name('categories.show');
Route::get('categories/{category}/subcategories/{subcategory}', [AdvertisementController::class, 'showSubcategory'])->name('categories.subcategory.show');

// Маршрут для пользовательских объявлений - только для аутентифицированных пользователей
Route::middleware('auth')->group(function () {
    Route::get('advertisements/index', [AdvertisementController::class, 'userAdvertisements'])->name('user.advertisements');
});

// Маршруты авторизации через социальные сети
Route::get('auth/{provider}', [SocialController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [SocialController::class, 'handleProviderCallback']);

// Маршруты для входа и регистрации
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Страницы информации
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');
