<?php

namespace App\Http\Livewire\Admin;

use App\Models\BusinessPermit;
use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminPrintBusinessPermitComponent extends Component
{
    public $business_permit_id;

    public function mount($business_permit_id)
    {
        $this->$business_permit_id = $business_permit_id;
    }

    public function render()
    {
        $business_permit = BusinessPermit::find($this->business_permit_id);

        $barangay_officials = BarangayOfficial::all();

        return view(
            'livewire.admin.admin-print-business-permit-component',
            ['business_permit' => $business_permit]
        )
            ->layout('layouts.print')
            ->with('barangay_officials', $barangay_officials);
    }
}
