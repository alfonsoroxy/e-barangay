<?php

namespace App\Http\Livewire\Admin;

use App\Models\JobSeeker;
use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminPrintJobSeekerComponent extends Component
{
    public $job_seeker_id;

    public function mount($job_seeker_id)
    {
        $this->$job_seeker_id = $job_seeker_id;
    }

    public function render()
    {
        $job_seeker = JobSeeker::find($this->job_seeker_id);

        $barangay_officials = BarangayOfficial::all();

        return view(
            'livewire.admin.admin-print-job-seeker-component',
            ['job_seeker' => $job_seeker]
        )
            ->layout('layouts.print')
            ->with('barangay_officials', $barangay_officials);
    }
}
