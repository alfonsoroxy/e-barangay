<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayOfficial;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminUpdateBarangayOfficialComponent extends Component
{
    //Barangay Officials Variables
    public $brgyOfficialFname, $brgyOfficialLname, $brgyOfficialMname, $brgyOfficialSuffix;
    public $brgyOfficialHousenumber, $brgyOfficialStreetname;
    public $brgyOfficialEmail, $brgyOfficialContact, $brgyOfficialPosition;
    public $brgyImage, $brgyNewImage;
    public $barangay_official_id;
    public $formSubmitted = false;

    protected $rules = [
        'brgyOfficialFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'brgyOfficialLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'brgyOfficialMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'brgyOfficialSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'brgyOfficialHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'brgyOfficialStreetname' => 'required',

        'brgyOfficialEmail' => 'email|string',
        'brgyOfficialContact' => 'nullable|string|max:11|regex:/^[-0-9\+]+$/',
        'brgyOfficialPosition' => 'required',

        'brgyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

    public function mount($barangay_official_id)
    {
        $this->barangay_official_id  = $barangay_official_id;
        $barangay_official = BarangayOfficial::where('id', $barangay_official_id)->first();
        $this->brgyOfficialFname = $barangay_official->brgyOfficialFname;
        $this->brgyOfficialLname = $barangay_official->brgyOfficialLname;
        $this->brgyOfficialMname = $barangay_official->brgyOfficialMname;
        $this->brgyOfficialSuffix = $barangay_official->brgyOfficialSuffix;

        $this->brgyOfficialHousenumber = $barangay_official->brgyOfficialHousenumber;
        $this->brgyOfficialStreetname = $barangay_official->brgyOfficialStreetname;

        $this->brgyOfficialEmail = $barangay_official->brgyOfficialEmail;
        $this->brgyOfficialContact = $barangay_official->brgyOfficialContact;
        $this->brgyOfficialPosition = $barangay_official->brgyOfficialPosition;
        $this->brgyImage = $barangay_official->brgyImage;
    }

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
            'brgyOfficialContact' => 'nullable|string|max:11|regex:/^[-0-9\+]+$/',
            'brgyOfficialPosition' => 'required',

            'brgyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
    }

    use WithFileUploads;
    //Update Barangay Officials
    public function updateBarangayOfficial()
    {
        $barangay_official = BarangayOfficial::findOrFail($this->barangay_official_id);
        $barangay_official->brgyOfficialFname = $this->brgyOfficialFname;
        $barangay_official->brgyOfficialLname = $this->brgyOfficialLname;
        $barangay_official->brgyOfficialMname = $this->brgyOfficialMname;
        $barangay_official->brgyOfficialSuffix = $this->brgyOfficialSuffix;

        $barangay_official->brgyOfficialHousenumber = $this->brgyOfficialHousenumber;
        $barangay_official->brgyOfficialStreetname = $this->brgyOfficialStreetname;

        $barangay_official->brgyOfficialEmail = $this->brgyOfficialEmail;
        $barangay_official->brgyOfficialContact = $this->brgyOfficialContact;
        $barangay_official->brgyOfficialPosition = $this->brgyOfficialPosition;

        if ($this->brgyNewImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->brgyNewImage->extension();
            $this->brgyNewImage->storeAs('barangay-officials', $imageName);
            $barangay_official->brgyImage = $imageName;
        }

        $this->formSubmitted = true;

        $barangay_official->save();
        return redirect()->route('admin.admin-barangay-official')
            ->with('message', 'Barangay Official updated sucessfully!');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-barangay-official-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
