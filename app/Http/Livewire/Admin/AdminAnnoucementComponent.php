<?php

namespace App\Http\Livewire\Admin;

use App\Models\Announcement;
use Livewire\Component;

class AdminAnnoucementComponent extends Component
{
    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::find($id);

        //Delete Announcement
        $announcement->delete();
        return redirect()->route('admin.admin-announcement')
            ->with('message', 'Announcement has been deleted successfully! ');
    }

    public function render()
    {
        $announcements = Announcement::all();

        return view(
            'livewire.admin.admin-annoucement-component'
        )
            ->with('announcements', $announcements)
            ->layout('layouts.admin');
    }
}
