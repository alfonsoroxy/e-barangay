<?php

namespace App\Http\Livewire\User;

use App\Models\JobSeeker;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserJobSeekerStatusComponent extends Component
{
    //Cancel Request
    public function cancelJobSeeker($job_seeker_id, $jobSeekerStatus)
    {
        $job_seeker = JobSeeker::findOrFail($job_seeker_id);
        $job_seeker->jobSeekerStatus = $jobSeekerStatus;

        if ($jobSeekerStatus == 'canceled') {
            $job_seeker->jobSeekerCanceleddate = DB::raw('CURRENT_DATE');
        }

        $job_seeker->save();
        return redirect()->route('user.user-job-seeker-status')
            ->with('job_seeker_msg', 'Your Request for First Time Job Seeker has been canceled successfully! ');
    }

    public function render()
    {
        $job_seekers = [];

        JobSeeker::where('user_id', Auth::user()->id)->chunk(100, function ($chunk) use (&$job_seekers) {
            foreach ($chunk as $job_seeker) {
                $job_seekers[] = $job_seeker;
            }
        });

        return view('livewire.user.user-job-seeker-status-component', [
            'job_seekers' => $job_seekers
        ])->layout('layouts.user');
    }
}
