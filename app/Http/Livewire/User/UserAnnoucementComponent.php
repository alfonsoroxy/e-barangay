<?php

namespace App\Http\Livewire\User;

use App\Models\Announcement;
use Livewire\Component;
use Livewire\WithPagination;

class UserAnnoucementComponent extends Component
{
    use WithPagination;

    public function render()
    {
        $announcements = Announcement::paginate(10);

        return view(
            'livewire.user.user-annoucement-component'
        )
            ->with('announcements', $announcements)->layout('layouts.user');
    }
}
