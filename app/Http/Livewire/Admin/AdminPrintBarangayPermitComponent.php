<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayPermit;
use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPrintBarangayPermitComponent extends Component
{
    public $barangay_permit_id;

    public function mount($barangay_permit_id)
    {
        $this->$barangay_permit_id = $barangay_permit_id;
    }

    public function render()
    {
        $barangay_permit = BarangayPermit::findOrFail($this->barangay_permit_id);
        $barangay_officials = BarangayOfficial::all();

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-print-barangay-permit-component',
                    [
                        'barangay_permit' => $barangay_permit,
                        'barangay_officials', $barangay_officials
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
