<?php

namespace App\Http\Livewire\Admin;

use App\Models\Announcement;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminAddAnnoucementComponent extends Component
{
    //Announcement Variables
    public $announcementSubject, $announcementFrom, $announcementMessage;
    public $formSubmitted = false;

    protected $rules = [
        'announcementSubject' => 'required|string',
        'announcementFrom' => 'required|string',
        'announcementMessage' => 'required',
    ];

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

        $this->formSubmitted = true;

        $announcement->save();
        return redirect()->route('admin.admin-announcement')
            ->with('message', 'Barangay Announcement has been added sucessfully! ');

        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-add-annoucement-component')->layout('layouts.admin')->middleware('is_admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
