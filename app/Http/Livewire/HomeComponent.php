<?php

namespace App\Http\Livewire;

use App\Models\BarangayOfficial;
use App\Models\Announcement;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $barangay_officials = BarangayOfficial::all();
        $announcements = Announcement::all();

        return view('livewire.home-component')->layout('layouts.home')
            ->with('barangay_officials', $barangay_officials)
            ->with('announcements', $announcements);
    }
}
