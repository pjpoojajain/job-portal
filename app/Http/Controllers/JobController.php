<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\All_job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'skill_set' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
        ]);

        $job = All_job::create([
            'employer_id' => Auth::id(),
            'title' => $request->title,
            'company' => $request->company,
            'skill_set' => $request->skill_set,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'experience' => $request->experience,
            'job_type' => $request->job_type,
            'total_openings' => $request->total_openings,
        ]);

        return redirect()->route('employer.jobs.index')->with('success', 'Job posted successfully!');
    }
    public function index()
    {
         $jobs = All_job::where('employer_id', Auth::id())->get();
        return Inertia::render('Employer/EmployerJobs', [
            'jobs' => $jobs
        ]);
    }
    public function edit(All_job $job)
    {
        // Ensure only owner can edit
        $this->authorize('update', $job);

        return Inertia::render('Employer/EditJob', [
            'job' => $job,
        ]);
    }

     public function update(Request $request, All_job $job)
    {
        $this->authorize('update', $job);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'salary' => 'nullable|numeric',
        ]);

        $job->update($validated);

        return redirect()->route('dashboard')->with('success', 'Job updated successfully!');
    }

     public function destroy($id)
    {
        $job = All_job::findOrFail($id);

        // Optional: only allow the employer who created it to delete
        $this->authorize('delete', $job);

        $job->delete();

        return redirect()->route('dashboard')
                        ->with('success', 'Job deleted successfully.');
    }

}
