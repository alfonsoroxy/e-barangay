<?php

namespace App\Http\Livewire\Admin;

use App\Models\Clearance;
use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPrintClearanceComponent extends Component
{
    public $clearance_id;

    public function mount($clearance_id)
    {
        $this->$clearance_id = $clearance_id;
    }

    public function render()
    {
        $clearance = Clearance::findOrFail($this->clearance_id);
        $barangay_officials = BarangayOfficial::all();

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-print-clearance-component',
                    [
                        'clearance' => $clearance,
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
