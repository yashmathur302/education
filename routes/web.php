<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/about-us', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/blog', 'pages.blog')->name('blog');
Route::view('/contact-us', 'pages.contact')->name('contact');
Route::view('/find-tutor', 'pages.find-tutor')->name('find-tutor');
