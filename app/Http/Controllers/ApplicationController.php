<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\All_job;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function index()
    {
        $jobs = All_job::get();
        return Inertia::render('JobSeeker/BrowseJobs', [
            'jobs' => $jobs
        ]);
    }
}
