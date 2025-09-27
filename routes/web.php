<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\HomepageController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/all-listed-jobs', [HomepageController::class, 'index'])
        ->name('index');
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
        Route::post('/employer/jobs/create', [JobController::class, 'store'])
            ->name('employer.jobs.store');
        Route::get('/employer/jobs', [JobController::class, 'index'])
            ->name('employer.jobs.index');
        Route::get('/employer/jobs/{job}/edit', [JobController::class, 'edit'])
            ->name('employer.jobs.edit');
        Route::put('/employer/jobs/{job}', [JobController::class, 'update'])
            ->name('employer.jobs.update');  
        Route::delete('/employer/jobs/{id}', [JobController::class, 'destroy'])
            ->name('employer.jobs.destroy');  
    });

    Route::middleware(['auth', 'role:jobseeker'])->group(function () {
        Route::get('/jobseeker/all-jobs', [ApplicationController::class, 'index'])
        ->name('jobseeker.index');
        Route::get('/jobseeker/show/{job}', [ApplicationController::class, 'show'])
        ->name('jobseeker.show');
        Route::post('/jobseeker/{job}/apply', [ApplicationController::class, 'apply'])
            ->name('jobseeker.apply');
    });