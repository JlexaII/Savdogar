<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\SubscriptionController;

// Статические страницы
Route::view('/', 'home')->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::view('/prj', 'pricing')->name('price');
Route::view('/blog', 'blog')->name('blog');

// Контактные маршруты
Route::prefix('contact')->group(function () {
    Route::get('/all', [ContactController::class, 'allData'])->name('contact-data');
    Route::post('/submit', [ContactController::class, 'submit'])->name('contact-form');

    Route::get('/all/{id}', [ContactController::class, 'ShowOneMessage'])->name('contact-data-one');
    Route::get('/alls/{id}/update', [ContactController::class, 'UpdateMessage'])->name('contact-update');
    Route::post('/all/{id}/update', [ContactController::class, 'UpdateMessageSubmit'])->name('contact-update-submit');
});

// Маршруты авторизации через социальные сети
Route::prefix('auth')->group(function () {
    Route::get('{provider}', [SocialController::class, 'redirectToProvider']);
    Route::get('{provider}/callback', [SocialController::class, 'handleProviderCallback']);
});

// Подписка
Route::post('/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
