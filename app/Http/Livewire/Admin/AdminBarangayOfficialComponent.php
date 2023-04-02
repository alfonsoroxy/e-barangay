<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AdminBarangayOfficialComponent extends Component
{
    public function deleteBarangayOfficial($id)
    {
        $barangay_official = BarangayOfficial::find($id);

        Storage::disk('public')->delete('barangay-officials/' . $barangay_official->brgyImage);
        $barangay_official->delete();

        return redirect()->route('admin.admin-barangay-official')
            ->with('message', 'Barangay Official has been deleted successfully! ');
    }

    public function render()
    {
        $barangay_officials = [];

        BarangayOfficial::chunk(100, function ($chunk) use (&$barangay_officials) {
            foreach ($chunk as $barangay_official) {
                $barangay_officials[] = $barangay_official;
            }
        });

        return view('livewire.admin.admin-barangay-official-component', [
            'barangay_officials' => $barangay_officials
        ])->layout('layouts.admin');
    }
}
