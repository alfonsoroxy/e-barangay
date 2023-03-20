<?php

namespace App\Http\Livewire\Admin;

use App\Models\BHERT;
use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminPrintBhertComponent extends Component
{
    public $bhert_id;

    public function mount($bhert_id)
    {
        $this->$bhert_id = $bhert_id;
    }

    public function render()
    {
        $bhert = BHERT::find($this->bhert_id);

        $barangay_officials = BarangayOfficial::all();

        return view('livewire.admin.admin-print-bhert-component', ['bhert' => $bhert])
            ->layout('layouts.print')
            ->with('barangay_officials', $barangay_officials);
    }
}
