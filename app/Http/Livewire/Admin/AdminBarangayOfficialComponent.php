<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayOfficial;
use Livewire\Component;

class AdminBarangayOfficialComponent extends Component
{
    public function deleteBarangayOfficial($id)
    {
        $barangay_official = BarangayOfficial::find($id);

        unlink(public_path('assets/dist/img/barangay-officials/' . $barangay_official->brgyImage));
        $barangay_official->delete();

        return redirect()->route('admin.admin-barangay-official')
            ->with('message', 'Barangay Official has been deleted successfully! ');
    }

    public function render()
    {
        $barangay_officials = BarangayOfficial::all();

        return view(
            'livewire.admin.admin-barangay-official-component',
            ['barangay_officials' => $barangay_officials]
        )
            ->layout('layouts.admin');
    }
}
