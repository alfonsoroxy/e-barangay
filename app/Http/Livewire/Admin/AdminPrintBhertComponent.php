<?php

namespace App\Http\Livewire\Admin;

use App\Models\BHERT;
use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPrintBhertComponent extends Component
{
    public $bhert_id;

    public function mount($bhert_id)
    {
        $this->$bhert_id = $bhert_id;
    }

    public function render()
    {
        $bhert = BHERT::findOrFail($this->bhert_id);
        $barangay_officials = BarangayOfficial::all();

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-print-bhert-component',
                    [
                        'bhert,' => $bhert,
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
