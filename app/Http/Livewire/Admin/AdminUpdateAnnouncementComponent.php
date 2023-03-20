<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;

class AdminUpdateAnnouncementComponent extends Component
{
    //Announcement Variables
    public $announcement_id, $announcementSubject, $announcementFrom, $announcementMessage;

    public function mount($announcement_id)
    {
        $this->announcement_id  = $announcement_id;
        $announcement = Announcement::where('id', $announcement_id)->first();
        $this->announcementSubject = $announcement->announcementSubject;
        $this->announcementFrom = $announcement->announcementFrom;
        $this->announcementMessage = $announcement->announcementMessage;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'announcementSubject' => 'required|string',
            'announcementFrom' => 'required|string',
            'announcementMessage' => 'required',
        ]);
    }

    //Update Announcement
    public function updateAnnouncement()
    {
        $announcement = Announcement::find($this->announcement_id);
        $announcement->announcementSubject = $this->announcementSubject;
        $announcement->announcementFrom = $this->announcementFrom;
        $announcement->announcementMessage = $this->announcementMessage;

        $announcement->save();
        return redirect()->route('admin.admin-announcement')
            ->with('message', 'Barangay Announcement has been updated successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-update-announcement-component')->layout('layouts.admin');
    }
}
