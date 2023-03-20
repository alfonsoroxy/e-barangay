<?php

namespace App\Http\Livewire\User;

use App\Models\Announcement;
use Livewire\Component;

class UserAnnoucementComponent extends Component
{
    public function render()
    {
        $announcements = Announcement::all();

        return view(
            'livewire.user.user-annoucement-component'
        )
            ->with('announcements', $announcements)->layout('layouts.user');
    }
}
