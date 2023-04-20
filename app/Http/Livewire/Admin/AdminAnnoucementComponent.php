<?php

namespace App\Http\Livewire\Admin;

use App\Models\Announcement;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminAnnoucementComponent extends Component
{
    public function deleteAnnouncement($id)
    {
        $announcement = Announcement::findOrFail($id);

        //Delete Announcement
        $announcement->delete();
        return redirect()->route('admin.admin-announcement')
            ->with('message', 'Announcement has been deleted successfully! ');
    }

    public function render()
    {
        $announcements = [];

        Announcement::chunk(100, function ($chunk) use (&$announcements) {
            foreach ($chunk as $announcement) {
                $announcements[] = $announcement;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-annoucement-component',
                    [
                        'announcements' => $announcements
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
