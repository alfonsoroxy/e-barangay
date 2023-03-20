<?php

namespace App\Http\Livewire\Admin;

use App\Models\Indigency;
use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminPrintIndigencyComponent extends Component
{
    public $indigency_id;

    public function mount($indigency_id)
    {
        $this->$indigency_id = $indigency_id;
    }

    public function render()
    {
        $indigency = Indigency::find($this->indigency_id);

        $barangay_officials = BarangayOfficial::all();

        return view(
            'livewire.admin.admin-print-indigency-component',
            ['indigency' => $indigency]
        )
            ->layout('layouts.print')
            ->with('barangay_officials', $barangay_officials);
    }
}
