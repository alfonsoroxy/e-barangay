<?php

namespace App\Http\Livewire\User;

use App\Models\BarangayPermit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserBarangayPermitComponent extends Component
{
    use WithFileUploads;

    //Barangay Permit Variable
    public $barangayPermitName;
    public $barangayPermitHousenumber, $barangayPermitStreetname;
    public $barangayPermitImage;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'barangayPermitName' => 'required|string|max:255',

            'barangayPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'barangayPermitStreetname' => 'required',

            'barangayPermitImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    public function addBarangayPermit()
    {
        $this->validate([
            'barangayPermitName' => 'required|string|max:255',

            'barangayPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'barangayPermitStreetname' => 'required',

            'barangayPermitImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $barangay_permit = new BarangayPermit();
        $barangay_permit->user_id = Auth::user()->id;
        $barangay_permit->barangayPermitName = $this->barangayPermitName;

        $barangay_permit->barangayPermitHousenumber = $this->barangayPermitHousenumber;
        $barangay_permit->barangayPermitStreetname = $this->barangayPermitStreetname;

        $imageName = Carbon::now()->timestamp . '.' . $this->barangayPermitImage->extension();
        $this->barangayPermitImage->storeAs('barangay-permits', $imageName, 'documents');
        $barangay_permit->barangayPermitImage = $imageName;

        $barangay_permit->barangayPermitStatus = 'pending';

        $barangay_permit->save();
        return redirect()->route('user.user-barangay-permit-status')
            ->with(
                'message',
                'Barangay Permit request successfully! Please wait the notification about your request status.'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {

        return view('livewire.user.user-barangay-permit-component')->layout('layouts.user');
    }
}
