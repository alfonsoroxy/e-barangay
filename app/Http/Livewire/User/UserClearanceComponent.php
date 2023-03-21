<?php

namespace App\Http\Livewire\User;

use App\Models\Clearance;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserClearanceComponent extends Component
{
    use WithFileUploads;

    //Clearance Variables
    public $clearanceFname, $clearanceLname, $clearanceMname, $clearanceSuffix;
    public $clearanceHousenumber, $clearanceStreetname;
    public $clearanceNationality, $clearanceGender, $clearanceMaritalstatus;
    public $clearanceImage;
    public $formSubmitted = false;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'clearanceFname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceLname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceSuffix' => 'nullable|max:10/|regex:/^[a-zA-ZÑñ\s]+$/',

            'clearanceHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'clearanceStreetname' => 'required',

            'clearanceNationality' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceGender' => 'required',
            'clearanceMaritalstatus' => 'required',

            'clearanceImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    public function addClearance()
    {
        $this->validate([
            'clearanceFname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceLname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceSuffix' => 'nullable|max:10/|regex:/^[a-zA-ZÑñ\s]+$/',

            'clearanceHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'clearanceStreetname' => 'required',

            'clearanceNationality' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'clearanceGender' => 'required',
            'clearanceMaritalstatus' => 'required',

            'clearanceImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $clearance = new Clearance();
        $clearance->user_id = Auth::user()->id;
        $clearance->clearanceFname = $this->clearanceFname;
        $clearance->clearanceLname = $this->clearanceLname;
        $clearance->clearanceMname = $this->clearanceMname;
        $clearance->clearanceSuffix = $this->clearanceSuffix;
        $clearance->clearanceHousenumber = $this->clearanceHousenumber;
        $clearance->clearanceStreetname = $this->clearanceStreetname;

        $clearance->clearanceNationality = $this->clearanceNationality;
        $clearance->clearanceGender = $this->clearanceGender;
        $clearance->clearanceMaritalstatus = $this->clearanceMaritalstatus;

        if (request()->hasfile('image')) {
            $imageName = time() . '.' . request()->clearanceImage->getClientOriginalExtension();
            request()->clearanceImage->storeAs('clearances', $imageName, 'documents');
        }

        $clearance->clearanceStatus = 'pending';

        $this->formSubmitted = true;

        $clearance->save();
        return redirect()->route('user.user-clearance-status')
            ->with(
                'message',
                'Barangay Clearance request successfully! Please wait the notification about your request status.'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {
        return view('livewire.user.user-clearance-component')->layout('layouts.user');
    }
}
