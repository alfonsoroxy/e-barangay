<?php

namespace App\Http\Livewire\Admin;

use App\Models\Certificate;
use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPrintCertificateComponent extends Component
{
    public $certificate_id;

    public function mount($certificate_id)
    {
        $this->$certificate_id = $certificate_id;
    }

    public function render()
    {
        $certificate = Certificate::findOrFail($this->certificate_id);
        $barangay_officials = BarangayOfficial::all();

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-print-certificate-component',
                    [
                        'certificate' => $certificate,
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
