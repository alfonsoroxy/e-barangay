<?php

namespace App\Http\Livewire\Admin;

use App\Models\Announcement;
use App\Models\User;
use App\Models\BarangayPermit;
use App\Models\BHERT;
use App\Models\BusinessPermit;
use App\Models\Certificate;
use App\Models\Clearance;
use App\Models\Indigency;
use App\Models\JobSeeker;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
        $announcements = Announcement::all();

        //All population
        $users = User::where('is_admin', 'USR');
        //All number of request
        $barangay_permits = BarangayPermit::where('barangayPermitStatus', 'pending')->get();
        // $bherts = BHERT::where('bhertStatus', 'pending')->get();
        $business_permits = BusinessPermit::where('businessPermitStatus', 'pending')->get();
        $certificates = Certificate::where('certificateStatus', 'pending')->get();
        $clearances = Clearance::where('clearanceStatus', 'pending')->get();
        $indigencies = Indigency::where('indigencyStatus', 'pending')->get();
        $job_seekers = JobSeeker::where('jobSeekerStatus', 'pending')->get();

        return view(
            'livewire.admin.admin-dashboard-component'
        )
            ->with('users', $users)
            ->with('announcements', $announcements)
            ->with('barangay_permits', $barangay_permits)
            // ->with('bherts', $bherts)
            ->with('business_permits', $business_permits)
            ->with('certificates', $certificates)
            ->with('clearances', $clearances)
            ->with('indigencies', $indigencies)
            ->with('job_seekers', $job_seekers)
            ->layout('layouts.admin');
    }
}
