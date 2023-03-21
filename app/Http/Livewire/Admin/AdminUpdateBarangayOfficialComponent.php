<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayOfficial;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Livewire\Component;

class AdminUpdateBarangayOfficialComponent extends Component
{
    //Barangay Officials Variables
    public $brgyOfficialFname, $brgyOfficialLname, $brgyOfficialMname, $brgyOfficialSuffix;
    public $brgyOfficialHousenumber, $brgyOfficialStreetname;
    public $brgyOfficialEmail, $brgyOfficialContact, $brgyOfficialPosition;
    public $brgyImage, $brgyNewImage;
    public $barangay_official_id;

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

            'brgyImage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
    }

    use WithFileUploads;
    //Update Barangay Officials
    public function updateBarangayOfficial()
    {
        $barangay_official = BarangayOfficial::find($this->barangay_official_id);
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
            unlink(public_path('assets/dist/img/barangay-officials/' . $barangay_official->brgyImage));
            $imageName = Carbon::now()->timestamp . '.' . $this->brgyNewImage->extension();
            $this->brgyNewImage->storeAs('barangay-officials', $imageName);
            $barangay_official->brgyImage = $imageName;
        }

        $barangay_official->save();
        return redirect()->route('admin.admin-barangay-official')
            ->with('message', 'Barangay Official updated sucessfully!');
    }

    public function render()
    {

        return view('livewire.admin.admin-update-barangay-official-component')->layout('layouts.admin');
    }
}
