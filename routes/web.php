<?php

// routes/web.php
use App\Http\Controllers\RegistrationController;

Route::get('/register/{lang}', [RegistrationController::class, 'showRegistrationForm'])->name('register');
Route::post('/register/{lang}', [RegistrationController::class, 'register']);
