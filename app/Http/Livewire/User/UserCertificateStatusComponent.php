<?php

namespace App\Http\Livewire\User;

use App\Models\Certificate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserCertificateStatusComponent extends Component
{
    //Cancel Request
    public function cancelCertificate($certificate_id, $certificateStatus)
    {
        $certificate = Certificate::find($certificate_id);
        $certificate->certificateStatus = $certificateStatus;

        if ($certificateStatus == 'canceled') {
            $certificate->certificateCanceleddate = DB::raw('CURRENT_DATE');
        }

        $certificate->save();
        return redirect()->route('user.user-certificate-status')
            ->with('certificate_msg', 'Your Request for Barangay Certificate has been canceled successfully! ');
    }

    public function render()
    {
        $certificates = Certificate::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.user.user-certificate-status-component')
            ->with('certificates', $certificates)->layout('layouts.user');
    }
}
