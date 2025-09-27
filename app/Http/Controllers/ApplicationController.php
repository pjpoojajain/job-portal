<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\All_job;
use App\Models\JobApplication;
use Inertia\Inertia;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $query = All_job::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%");
        }

        $jobs = $query->latest()->paginate(10);

        return Inertia::render('JobSeeker/BrowseJobs', [
            'jobs' => $jobs,
            'filters' => $request->only(['search']),
        ]);
    }
    public function show(All_job $job)
    {
        return Inertia::render('JobSeeker/JobDetails', [
            'job' => $job
        ]);
    }

    public function apply(Request $request, All_job $job)
    {
        $request->validate([
            'cover_letter' => 'nullable|string|max:1000',
        ]);

        // Prevent duplicate applications
        if (JobApplication::where('job_id', $job->id)->where('user_id', Auth::id())->exists()) {
            return back()->with('error', 'You already applied for this job.');
        }

        JobApplication::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'cover_letter' => $request->cover_letter,
        ]);

        return back()->with('success', 'Application submitted successfully!');
    }

}
