<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayPermit;
use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminPrintBarangayPermitComponent extends Component
{
    public $barangay_permit_id;

    public function mount($barangay_permit_id)
    {
        $this->$barangay_permit_id = $barangay_permit_id;
    }

    public function render()
    {

        $barangay_permit = BarangayPermit::find($this->barangay_permit_id);

        $barangay_officials = BarangayOfficial::all();

        return view(
            'livewire.admin.admin-print-barangay-permit-component',
            ['barangay_permit' => $barangay_permit]
        )
            ->layout('layouts.print')
            ->with('barangay_officials', $barangay_officials);
    }
}
