<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/prj', function () {
    return view('pricing');
})->name('price');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');


Route::get(
    '/contact/all/{id}', [ContactController::class,
    'ShowOneMessage']
)->name('contact-data-one');

Route::get(
    '/contact/all/{id}/update', [ContactController::class,
    'UpdateMessage']
)->name('contact-update');

Route::post(
    '/contact/all/{id}/update', [ContactController::class,
    'UpdateMessageSubmit']
)->name('contact-update-submit');

Route::get('/contact/all', [ContactController::class, 'allData'])->name('contact-data');
Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form');