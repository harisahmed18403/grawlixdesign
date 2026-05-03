<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'))->name('home');
Route::get('/contact', fn() => view('contact'))->name('contact');
Route::get('/fun', fn() => view('fun'))->name('fun');
