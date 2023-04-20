<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayOfficial;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AdminAddBarangayOfficialComponent extends Component
{
    //Announcement Variables
    public $brgyOfficialFname, $brgyOfficialLname, $brgyOfficialMname, $brgyOfficialSuffix, $brgyOfficialPosition;
    public $brgyOfficialHousenumber, $brgyOfficialStreetname, $brgyOfficialEmail, $brgyOfficialContact;
    public $brgyImage;
    public $formSubmitted = false;

    protected $rules = [
        'brgyOfficialFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'brgyOfficialLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'brgyOfficialMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'brgyOfficialSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'brgyOfficialHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'brgyOfficialStreetname' => 'required',

        'brgyOfficialEmail' => 'email|string',
        'brgyOfficialContact' => 'nullable|string|max:12|regex:/^[-0-9\+]+$/',
        'brgyOfficialPosition' => 'required',

        'brgyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'brgyOfficialFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'brgyOfficialLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'brgyOfficialMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'brgyOfficialSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'brgyOfficialHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'brgyOfficialStreetname' => 'required',

            'brgyOfficialEmail' => 'email|string',
            'brgyOfficialContact' => 'nullable|string|max:12|regex:/^[-0-9\+]+$/',
            'brgyOfficialPosition' => 'required',

            'brgyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
    }

    use WithFileUploads;

    public function addBarangayOfficial()
    {
        $this->validate([
            'brgyOfficialFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'brgyOfficialLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'brgyOfficialMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'brgyOfficialSuffix' => 'nullable|max:11|regex:/^[a-zA-ZÑñ\s]+$/',

            'brgyOfficialHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'brgyOfficialStreetname' => 'required',

            'brgyOfficialEmail' => 'email|string',
            'brgyOfficialContact' => 'nullable|string|max:11|regex:/^[-0-9\+]+$/',
            'brgyOfficialPosition' => 'required',

            'brgyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $barangay_official = new BarangayOfficial();
        $barangay_official->brgyOfficialFname = $this->brgyOfficialFname;
        $barangay_official->brgyOfficialLname = $this->brgyOfficialLname;
        $barangay_official->brgyOfficialMname = $this->brgyOfficialMname;
        $barangay_official->brgyOfficialSuffix = $this->brgyOfficialSuffix;

        $barangay_official->brgyOfficialHousenumber = $this->brgyOfficialHousenumber;
        $barangay_official->brgyOfficialStreetname = $this->brgyOfficialStreetname;

        $barangay_official->brgyOfficialEmail = $this->brgyOfficialEmail;
        $barangay_official->brgyOfficialContact = $this->brgyOfficialContact;
        $barangay_official->brgyOfficialPosition = $this->brgyOfficialPosition;

        if ($this->brgyImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->brgyImage->extension();
            $this->brgyImage->storeAs('barangay-officials', $imageName);
            $barangay_official->brgyImage = $imageName;
        }

        $this->formSubmitted = true;

        $barangay_official->save();
        return redirect()->route('admin.admin-barangay-official')
            ->with('message', 'Barangay Officials has been added sucessfully! ');

        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {
        if (Auth::check()) {
            return view(
                'livewire.admin.admin-add-barangay-official-component'
            )->layout('layouts.admin');
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
