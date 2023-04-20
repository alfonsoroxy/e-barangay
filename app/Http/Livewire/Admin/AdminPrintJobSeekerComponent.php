<?php

namespace App\Http\Livewire\Admin;

use App\Models\JobSeeker;
use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPrintJobSeekerComponent extends Component
{
    public $job_seeker_id;

    public function mount($job_seeker_id)
    {
        $this->$job_seeker_id = $job_seeker_id;
    }

    public function render()
    {
        $job_seeker = JobSeeker::findOrFail($this->job_seeker_id);

        $barangay_officials = BarangayOfficial::all();

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-print-job-seeker-component',
                    [
                        'job_seeker' => $job_seeker,
                        'barangay_officials' => $barangay_officials
                    ]
                )->layout('layouts.print');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
