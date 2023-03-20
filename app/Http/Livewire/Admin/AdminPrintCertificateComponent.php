<?php

namespace App\Http\Livewire\Admin;

use App\Models\Certificate;
use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminPrintCertificateComponent extends Component
{
    public $certificate_id;

    public function mount($certificate_id)
    {
        $this->$certificate_id = $certificate_id;
    }

    public function render()
    {
        $certificate = Certificate::find($this->certificate_id);

        $barangay_officials = BarangayOfficial::all();

        return view(
            'livewire.admin.admin-print-certificate-component',
            ['certificate' => $certificate]
        )
            ->layout('layouts.print')
            ->with('barangay_officials', $barangay_officials);
    }
}
