<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class AdminUpdateAnnouncementComponent extends Component
{
    //Announcement Variables
    public $announcement_id, $announcementSubject, $announcementFrom, $announcementMessage;
    public $formSubmitted = false;

    protected $rules = [
        'announcementSubject' => 'required|string',
        'announcementFrom' => 'required|string',
        'announcementMessage' => 'required',
    ];

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
        $announcement = Announcement::findOrFail($this->announcement_id);
        $announcement->announcementSubject = $this->announcementSubject;
        $announcement->announcementFrom = $this->announcementFrom;
        $announcement->announcementMessage = $this->announcementMessage;

        $this->formSubmitted = true;

        $announcement->save();
        return redirect()->route('admin.admin-announcement')
            ->with('message', 'Barangay Announcement has been updated successfully!');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-announcement-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
