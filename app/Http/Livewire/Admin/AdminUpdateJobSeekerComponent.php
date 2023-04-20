<?php

namespace App\Http\Livewire\Admin;

use App\Models\JobSeeker;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminUpdateJobSeekerComponent extends Component
{
    //Job Seeker Variables
    public $jobSeekerFname, $jobSeekerLname, $jobSeekerMname, $jobSeekerSuffix;
    public $jobSeekerHousenumber, $jobSeekerStreetname;
    public $jobSeekerNationality, $jobSeekerGender, $jobSeekerMaritalstatus;
    public $jobSeekerAge, $jobSeekerResidentstayyears;
    public $job_seeker_id;
    public $formSubmitted = false;

    protected $rules = [
        'jobSeekerFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'jobSeekerLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'jobSeekerMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'jobSeekerSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'jobSeekerHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'jobSeekerStreetname' => 'required',

        'jobSeekerNationality' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'jobSeekerGender' => 'required',
        'jobSeekerMaritalstatus' => 'required',

        'jobSeekerAge' => 'required|date',
        'jobSeekerResidentstayyears' => 'required|date',
    ];

    public function mount($job_seeker_id)
    {
        $this->job_seeker_id  = $job_seeker_id;
        $job_seeker = JobSeeker::where('id', $job_seeker_id)->first();
        $this->jobSeekerFname = $job_seeker->jobSeekerFname;
        $this->jobSeekerLname = $job_seeker->jobSeekerLname;
        $this->jobSeekerMname = $job_seeker->jobSeekerMname;
        $this->jobSeekerSuffix = $job_seeker->jobSeekerSuffix;

        $this->jobSeekerHousenumber = $job_seeker->jobSeekerHousenumber;
        $this->jobSeekerStreetname = $job_seeker->jobSeekerStreetname;

        $this->jobSeekerNationality = $job_seeker->jobSeekerNationality;
        $this->jobSeekerGender = $job_seeker->jobSeekerGender;
        $this->jobSeekerMaritalstatus = $job_seeker->jobSeekerMaritalstatus;
        $this->jobSeekerGender = $job_seeker->jobSeekerGender;
        $this->jobSeekerAge = $job_seeker->jobSeekerResidentstayyears;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'jobSeekerFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'jobSeekerLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'jobSeekerMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'jobSeekerSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'jobSeekerHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'jobSeekerStreetname' => 'required',

            'jobSeekerNationality' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'jobSeekerGender' => 'required',
            'jobSeekerMaritalstatus' => 'required',

            'jobSeekerAge' => 'required|date',
            'jobSeekerResidentstayyears' => 'required|date',
        ]);
    }

    //Update Job Seeker
    public function updateJobSeeker()
    {
        $job_seeker = JobSeeker::findOrFail($this->job_seeker_id);
        $job_seeker->jobSeekerFname = $this->jobSeekerFname;
        $job_seeker->jobSeekerLname = $this->jobSeekerLname;
        $job_seeker->jobSeekerMname = $this->jobSeekerMname;
        $job_seeker->jobSeekerSuffix = $this->jobSeekerSuffix;

        $job_seeker->jobSeekerHousenumber = $this->jobSeekerHousenumber;
        $job_seeker->jobSeekerStreetname = $this->jobSeekerStreetname;

        $job_seeker->jobSeekerNationality = $this->jobSeekerNationality;
        $job_seeker->jobSeekerGender = $this->jobSeekerGender;
        $job_seeker->jobSeekerMaritalstatus = $this->jobSeekerMaritalstatus;

        $job_seeker->jobSeekerAge = $this->jobSeekerAge;
        $job_seeker->jobSeekerResidentstayyears = $this->jobSeekerResidentstayyears;

        $this->formSubmitted = true;

        $job_seeker->save();
        return redirect()->route('admin.admin-job-seeker')
            ->with('message', 'First Time Job Seeker updated sucessfully!');
    }

    public function updateJobSeekerStatus($job_seeker_id, $jobSeekerStatus)
    {
        $job_seeker = JobSeeker::findOrFail($job_seeker_id);
        $job_seeker->jobSeekerStatus = $jobSeekerStatus;

        if ($jobSeekerStatus == 'claimed') {
            $job_seeker->jobSeekerClaimdate = DB::raw('CURRENT_DATE');
        } else if ($jobSeekerStatus == 'canceled') {
            $job_seeker->jobSeekerCanceleddate = DB::raw('CURRENT_DATE');
        }

        $job_seeker->save();
        return redirect()->route('admin.admin-job-seeker')
            ->with('job_seeker_msg', 'First Time Job Seeker Status has been updated successfully! ');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-job-seeker-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
