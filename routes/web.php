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
            return Inertia::render('Employer/Employer');
        } elseif ($user->hasRole('jobseeker')) {
            return Inertia::render('JobSeeker/Jobseeker');
        } else {
            return Inertia::render('Dashboard');
        }
    })->name('dashboard');
});

    Route::middleware(['auth', 'role:employer'])->group(function () {
        Route::get('/employer/post-job', function () {
            return Inertia::render('Employer/EmployerPostJob');
        })->name('employer.postJob');
        Route::post('/employer/jobs/create', [\App\Http\Controllers\JobController::class, 'store'])
            ->name('employer.jobs.store');
        Route::get('/employer/jobs', [\App\Http\Controllers\JobController::class, 'index'])
            ->name('employer.jobs.index');
    });

    Route::middleware(['auth', 'role:jobseeker'])->group(function () {
        Route::get('/jobseeker/all-jobs', [\App\Http\Controllers\ApplicationController::class, 'index'])
        ->name('jobseeker.browsejob');
        
    });