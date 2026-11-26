<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FindTutorController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/about-us', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])
    ->where('slug', '[a-z0-9-]+')
    ->name('blog.show');
Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');

Route::view('/find-tutor', 'pages.find-tutor')->name('find-tutor');
Route::post('/find-tutor', [FindTutorController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('find-tutor.store');

Route::view('/contact-us', 'pages.contact')->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
