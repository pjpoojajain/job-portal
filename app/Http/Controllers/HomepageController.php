<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\All_job;
use Inertia\Inertia;

class HomepageController extends Controller
{
    public function index(All_job $job)
    {
        return Inertia::render('JobList', [
            'job' => $job
        ]);
    }
}
