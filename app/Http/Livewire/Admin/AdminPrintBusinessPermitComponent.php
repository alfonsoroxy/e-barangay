<?php

namespace App\Http\Livewire\Admin;

use App\Models\BusinessPermit;
use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPrintBusinessPermitComponent extends Component
{
    public $business_permit_id;

    public function mount($business_permit_id)
    {
        $this->$business_permit_id = $business_permit_id;
    }

    public function render()
    {
        $business_permit = BusinessPermit::findOrFail($this->business_permit_id);
        $barangay_officials = BarangayOfficial::all();

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-print-business-permit-component',
                    [
                        'business_permit' => $business_permit,
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
