<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Models\Announcement;
use App\Models\BarangayPermit;
use App\Models\BHERT;
use App\Models\BusinessPermit;
use App\Models\Certificate;
use App\Models\Clearance;
use App\Models\Indigency;
use App\Models\JobSeeker;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserDashboardComponent extends Component
{
    public function render()
    {
        //View All Announcement
        $announcements = Announcement::all();

        //Getting number of pending request
        $barangay_permits = BarangayPermit::where('user_id', Auth::user()->id)->where('barangayPermitStatus', 'pending');
        // $bherts = BHERT::where('user_id', Auth::user()->id)->where('bhertStatus', 'pending');
        $business_permits = BusinessPermit::where('user_id', Auth::user()->id)->where('businessPermitStatus', 'pending');
        $certificates = Certificate::where('user_id', Auth::user()->id)->where('certificateStatus', 'pending');
        $clearances = Clearance::where('user_id', Auth::user()->id)->where('clearanceStatus', 'pending');
        $indigencies = Indigency::where('user_id', Auth::user()->id)->where('indigencyStatus', 'pending');
        $job_seekers = JobSeeker::where('user_id', Auth::user()->id)->where('jobSeekerStatus', 'pending');

        $barangay_permits_processed = BarangayPermit::where('user_id', Auth::user()->id)->where('barangayPermitStatus', 'processed')->exists();
        // $bherts_processed = BHERT::where('user_id', Auth::user()->id)->where('bhertStatus', 'processed')->exists();
        $business_permits_processed = BusinessPermit::where('user_id', Auth::user()->id)->where('businessPermitStatus', 'processed')->exists();
        $certificates_processed = Certificate::where('user_id', Auth::user()->id)->where('certificateStatus', 'processed')->exists();
        $clearances_processed = Clearance::where('user_id', Auth::user()->id)->where('clearanceStatus', 'processed')->exists();
        $indigencies_processed = Indigency::where('user_id', Auth::user()->id)->where('indigencyStatus', 'processed')->exists();
        $job_seekers_processed = JobSeeker::where('user_id', Auth::user()->id)->where('jobSeekerStatus', 'processed')->exists();

        return view(
            'livewire.user.user-dashboard-component'
        )
            ->with('announcements', $announcements)
            ->with('barangay_permits', $barangay_permits)
            ->with('barangay_permits_processed', $barangay_permits_processed)
            // ->with('bherts', $bherts)
            // ->with('bherts_processed', $bherts_processed)
            ->with('business_permits', $business_permits)
            ->with('business_permits_processed', $business_permits_processed)
            ->with('certificates', $certificates)
            ->with('certificates_processed', $certificates_processed)
            ->with('clearances', $clearances)
            ->with('clearances_processed', $clearances_processed)
            ->with('indigencies', $indigencies)
            ->with('indigencies_processed', $indigencies_processed)
            ->with('job_seekers', $job_seekers)
            ->with('job_seekers_processed', $job_seekers_processed)
            ->layout('layouts.user');
    }
}
