<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        $isEmployer = Auth::check() && Auth::user()->role === 'employer';
        return view('welcome', ['jobs' => $jobs,  'isEmployer' => $isEmployer]);
    }

    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role === 'employer') {
            $job = Job::find($id);
            return view('Jobs/edit', ['job' => $job]);
        }
        abort(403);
    }

    public function update(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role === 'employer') {
            $validatedData = $request->validate([
                'title' => ['required', 'min:3'],
                'salary' => ['required'],
            ]);

            $job = Job::findOrFail($id);
            $job->title = $validatedData['title'];
            $job->salary = $validatedData['salary'];
            $job->save();

            return redirect()->route('jobs.index');
        }
        abort(403);
    }

    public function destroy($id)
    {
        if (Auth::check() && Auth::user()->role === 'employer') {
            $job = Job::findOrFail($id);
            $job->delete();
            return redirect()->route('jobs.index');
        }
        abort(403);
    }

    public function create()
    {
        if (Auth::check() && Auth::user()->role === 'employer') {
            return view('Jobs/create');
        }
        abort(403);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);

        try {
            Job::create([
                'title' => $validatedData['title'],
                'salary' => $validatedData['salary'],
                'created_by' => Auth::user()->id
            ]);

            return redirect()->route('jobs.index');
        } catch (\Exception $e) {
            return back()->with('error', 'Job creation failed: ' . $e->getMessage());
        }
    }
}
