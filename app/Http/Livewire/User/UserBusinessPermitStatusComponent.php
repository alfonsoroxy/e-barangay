<?php

namespace App\Http\Livewire\User;

use App\Models\BusinessPermit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserBusinessPermitStatusComponent extends Component
{
    //Cancel Request
    public function cancelBusinessPermit($business_permit_id, $businessPermitStatus)
    {
        $business_permit = BusinessPermit::find($business_permit_id);
        $business_permit->businessPermitStatus = $businessPermitStatus;

        if ($businessPermitStatus == 'canceled') {
            $business_permit->businessPermitCanceleddate = DB::raw('CURRENT_DATE');
        }

        $business_permit->save();
        return redirect()->route('user.user-business-permit-status')
            ->with('business_permit_msg', 'Your Request for Barangay Permit has been canceled successfully! ');
    }

    public function render()
    {
        $business_permits = BusinessPermit::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')
            ->get();

        return view(
            'livewire.user.user-business-permit-status-component'
        )
            ->with('business_permits', $business_permits)
            ->layout('layouts.user');
    }
}
