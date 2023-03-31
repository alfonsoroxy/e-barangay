<?php

namespace App\Http\Livewire;

use App\Models\BarangayOfficial;
use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;

class HomeComponent extends Component
{

    use WithPagination;

    public function render()
    {
        $barangay_officials = BarangayOfficial::all();
        $announcements = Announcement::paginate(10);

        return view('livewire.home-component', [
            'announcements' => $announcements,
            'barangay_officials' => $barangay_officials,
        ])->layout('layouts.home');
    }
}
