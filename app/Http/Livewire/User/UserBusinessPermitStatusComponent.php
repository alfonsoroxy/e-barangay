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
        $business_permit = BusinessPermit::findOrFail($business_permit_id);
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
        $business_permits = [];

        BusinessPermit::where('user_id', Auth::user()->id)->chunk(100, function ($chunk) use (&$business_permits) {
            foreach ($chunk as $business_permit) {
                $business_permits[] = $business_permit;
            }
        });

        return view('livewire.user.user-business-permit-status-component', [
            'business_permits' => $business_permits
        ])->layout('layouts.user');
    }
}
