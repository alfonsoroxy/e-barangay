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
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    public function render()
    {
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

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-dashboard-component',
                    [
                        'users' => $users,
                        // 'announcements' => $announcements,
                        'barangay_permits' => $barangay_permits,
                        // 'bherts' => $bherts,
                        'business_permits' => $business_permits,
                        'certificates' => $certificates,
                        'clearances' => $clearances,
                        'indigencies' => $indigencies,
                        'job_seekers' => $job_seekers
                    ]
                )->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
