<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        $user = auth()->user();

        if ($user->hasRole('employer')) {
            return Inertia::render('Employer');
        } elseif ($user->hasRole('jobseeker')) {
            return Inertia::render('Jobseeker');
        } else {
            return Inertia::render('Dashboard');
        }
    })->name('dashboard');
});