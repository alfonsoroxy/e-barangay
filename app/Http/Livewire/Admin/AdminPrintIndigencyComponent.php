<?php

namespace App\Http\Livewire\Admin;

use App\Models\Indigency;
use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPrintIndigencyComponent extends Component
{
    public $indigency_id;

    public function mount($indigency_id)
    {
        $this->$indigency_id = $indigency_id;
    }

    public function render()
    {
        $indigency = Indigency::findOrFail($this->indigency_id);
        $barangay_officials = BarangayOfficial::all();

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-print-indigency-component',
                    [
                        'indigency' => $indigency,
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
