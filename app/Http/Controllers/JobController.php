<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Mail\JobPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3); //simplePaginate ,paginate,cursorPaginate
        return view(
            'jobs.index',
            [
                'jobs' => $jobs
            ]
        );
    }


    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {

        //validation....
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']


        ]);

        $job=Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);


        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //1-validate
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required']


        ]);
        //2-authorize (on hold...)
        Gate::authorize('update-job',$job);
        //3-update the job //and persist

        $job->update([
            'title' => request('title'),
            'salary' => request('salary')

        ]);

        //4-redirect to the job page

        return redirect('/jobs/' . $job->id);
    }


    public function destory(Job $job)
    {

        //1-authorize(on hold...)
        //2-delete the job

        $job->delete();
        //3-redirect
        return redirect('/jobs');
    }
}
