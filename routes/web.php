<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/about-us', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/find-tutor', 'pages.find-tutor')->name('find-tutor');
Route::view('/privacy-policy', 'pages.privacy-policy')->name('privacy-policy');

Route::view('/contact-us', 'pages.contact')->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');
