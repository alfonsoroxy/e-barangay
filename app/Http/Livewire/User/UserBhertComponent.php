<?php

namespace App\Http\Livewire\User;

use App\Models\BHERT;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserBhertComponent extends Component
{
    use WithFileUploads;

    //BHERT Variables
    public $bhertFname, $bhertLname, $bhertMname, $bhertSuffix;
    public $bhertHousenumber, $bhertStreetname;
    public $bhertPurpose, $bhertAge;
    public $bhertImage;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'bhertFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'bhertHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'bhertStreetname' => 'required',

            'bhertPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertAge' => 'required|numeric|between:18,100',

            'bhertImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    public function addBHERT()
    {
        $this->validate([
            'bhertFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'bhertHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'bhertStreetname' => 'required',

            'bhertPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertAge' => 'required|numeric|between:18,100',

            'bhertImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $bhert = new BHERT();
        $bhert->user_id = Auth::user()->id;
        $bhert->bhertFname = $this->bhertFname;
        $bhert->bhertLname = $this->bhertLname;
        $bhert->bhertMname = $this->bhertMname;
        $bhert->bhertSuffix = $this->bhertSuffix;
        $bhert->bhertHousenumber = $this->bhertHousenumber;
        $bhert->bhertStreetname = $this->bhertStreetname;

        $bhert->bhertPurpose = $this->bhertPurpose;
        $bhert->bhertAge = $this->bhertAge;

        if ($this->bhertImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->bhertImage->extension();
            $this->bhertImage->storeAs('bherts', $imageName);
            $bhert->bhertImage = $imageName;
        }

        $bhert->bhertStatus = 'pending';

        $bhert->save();
        return redirect()->route('user.user-bhert-status')
            ->with(
                'message',
                'Barangay BHERT Certificate request successfully! Please wait the notification about your request status.'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {

        return view('livewire.user.user-bhert-component')->layout('layouts.user');
    }
}
