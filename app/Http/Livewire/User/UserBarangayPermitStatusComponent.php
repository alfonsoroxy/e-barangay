<?php

namespace App\Http\Livewire\User;

use App\Models\BarangayPermit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserBarangayPermitStatusComponent extends Component
{
    public function cancelBarangayPermit($barangay_permit_id, $barangayPermitStatus)
    {
        $barangay_permit = barangayPermit::find($barangay_permit_id);
        $barangay_permit->barangayPermitStatus = $barangayPermitStatus;

        if ($barangayPermitStatus == 'canceled') {
            $barangay_permit->barangayPermitCanceleddate = DB::raw('CURRENT_DATE');
        }

        $barangay_permit->save();
        return redirect()->route('user.user-barangay-permit-status')
            ->with('brgy_permit_msg', 'Your Request for Barangay Permit has been canceled successfully! ');
    }

    public function render()
    {
        $barangay_permits = BarangayPermit::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.user.user-barangay-permit-status-component')
            ->with('barangay_permits', $barangay_permits)
            ->layout('layouts.user');
    }
}
