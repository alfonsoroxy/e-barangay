<?php

namespace App\Http\Livewire\Admin;

use App\Models\Clearance;
use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminPrintClearanceComponent extends Component
{
    public $clearance_id;

    public function mount($clearance_id)
    {
        $this->$clearance_id = $clearance_id;
    }

    public function render()
    {
        $clearance = Clearance::find($this->clearance_id);

        $barangay_officials = BarangayOfficial::all();

        return view(
            'livewire.admin.admin-print-clearance-component',
            ['clearance' => $clearance]
        )
            ->layout('layouts.print')
            ->with('barangay_officials', $barangay_officials);
    }
}
