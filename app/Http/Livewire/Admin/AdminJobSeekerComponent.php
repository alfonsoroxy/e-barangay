<?php

namespace App\Http\Livewire\Admin;

use App\Models\JobSeeker;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminJobSeekerComponent extends Component
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

            'jobSeekerImage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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

            'jobSeekerImage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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

        if ($this->jobSeekerImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->jobSeekerImage->extension();
            $this->jobSeekerImage->storeAs('job-seekers', $imageName);
            $job_seeker->jobSeekerImage = $imageName;
        }

        $job_seeker->jobSeekerStatus = 'approved';

        $job_seeker->save();
        return redirect()->route('admin.admin-job-seeker')
            ->with(
                'message',
                'First Time Job Seeker added successfully!'
            );
    }

    // Update Status
    public function updateJobSeekerStatus($job_seeker_id, $jobSeekerStatus)
    {
        $job_seeker = JobSeeker::find($job_seeker_id);
        $job_seeker->jobSeekerStatus = $jobSeekerStatus;

        if ($jobSeekerStatus == 'claimed') {
            $job_seeker->jobSeekerClaimdate = DB::raw('CURRENT_DATE');
        } else if ($jobSeekerStatus == 'processed') {
            $job_seeker->jobSeekerProcesseddate = DB::raw('CURRENT_DATE');
        } else if ($jobSeekerStatus == 'approved') {
            $job_seeker->jobSeekerApproveddate = DB::raw('CURRENT_DATE');
        } else if ($jobSeekerStatus == 'denied') {
            $job_seeker->jobSeekerDenieddate = DB::raw('CURRENT_DATE');
        } else if ($jobSeekerStatus == 'canceled') {
            $job_seeker->jobSeekerCanceleddate = DB::raw('CURRENT_DATE');
        }

        $job_seeker->save();
        return redirect()->route('admin.admin-job-seeker')
            ->with('job_seeker_msg', 'First Time Job Seeker Status has been updated successfully! ');
    }

    //Delete First Time Job Seeker
    public function deleteJobSeeker($id)
    {
        $job_seeker = JobSeeker::find($id);

        Storage::disk('local')->delete('job-seekers/' . $job_seeker->jobSeekerImage);
        $job_seeker->delete();
        return redirect()->route('admin.admin-job-seeker')
            ->with('message', 'First Time Job Seeker has been deleted successfully! ');
    }

    public function render()
    {
        $job_seekers = [];

        JobSeeker::chunk(100, function ($chunk) use (&$job_seekers) {
            foreach ($chunk as $job_seeker) {
                $job_seekers[] = $job_seeker;
            }
        });

        return view('livewire.admin.admin-job-seeker-component', [
            'job_seekers' => $job_seekers
        ])->layout('layouts.admin');
    }
}
