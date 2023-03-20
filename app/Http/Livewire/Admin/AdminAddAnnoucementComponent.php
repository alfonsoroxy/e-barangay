<?php

namespace App\Http\Livewire\Admin;

use App\Models\Announcement;
use Livewire\Component;

class AdminAddAnnoucementComponent extends Component
{
    //Announcement Variables
    public $announcementSubject, $announcementFrom, $announcementMessage;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'announcementSubject' => 'required|string',
            'announcementFrom' => 'required|string',
            'announcementMessage' => 'required',
        ]);
    }

    public function addAnnouncement()
    {
        $this->validate([
            'announcementSubject' => 'required|string',
            'announcementFrom' => 'required|string',
            'announcementMessage' => 'required',
        ]);

        $announcement = new Announcement();
        $announcement->announcementSubject = $this->announcementSubject;
        $announcement->announcementFrom = $this->announcementFrom;
        $announcement->announcementMessage = $this->announcementMessage;

        $announcement->save();
        return redirect()->route('admin.admin-announcement')
            ->with('message', 'Barangay Announcement has been added sucessfully! ');

        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {
        return view('livewire.admin.admin-add-annoucement-component')->layout('layouts.admin');
    }
}
