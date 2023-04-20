<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayOfficial;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminBarangayOfficialComponent extends Component
{
    public function deleteBarangayOfficial($id)
    {
        $barangay_official = BarangayOfficial::findOrFail($id);

        Storage::disk('local')->delete('barangay-officials/' . $barangay_official->brgyImage);
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

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-barangay-official-component',
                    [
                        'barangay_officials' => $barangay_officials
                    ]
                )->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
