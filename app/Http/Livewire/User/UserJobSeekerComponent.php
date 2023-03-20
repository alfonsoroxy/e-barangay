<?php

namespace App\Http\Livewire\User;

use App\Models\JobSeeker;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserJobSeekerComponent extends Component
{
    use WithFileUploads;

    public $jobSeekerFname, $jobSeekerLname, $jobSeekerMname, $jobSeekerSuffix;
    public $jobSeekerHousenumber, $jobSeekerStreetname;
    public $jobSeekerNationality, $jobSeekerGender, $jobSeekerMaritalstatus;
    public $jobSeekerAge, $jobSeekerResidentstayyears;
    public $jobSeekerImage;

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

            'jobSeekerImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    public function addJobSeeker()
    {
        $this->validate([
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

            'jobSeekerImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $job_seeker = new JobSeeker();
        $job_seeker->user_id = Auth::user()->id;
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

        $imageName = Carbon::now()->timestamp . '.' . $this->jobSeekerImage->extension();
        $this->jobSeekerImage->storeAs('job-seekers', $imageName, 'documents');
        $job_seeker->jobSeekerImage = $imageName;

        $job_seeker->jobSeekerStatus = 'pending';

        $job_seeker->save();
        return redirect()->route('user.user-job-seeker-status')
            ->with(
                'message',
                'First Time Job Seeker request successfully! Please wait the notification about your request status.'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {

        return view('livewire.user.user-job-seeker-component')
            ->layout('layouts.user');
    }
}
