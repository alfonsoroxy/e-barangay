<?php

namespace App\Http\Livewire\User;

use App\Models\BusinessPermit;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserBusinessPermitComponent extends Component
{
    use WithFileUploads;

    //Business Permit Variables
    public $businessPermitFname, $businessPermitLname, $businessPermitMname, $businessPermitSuffix;
    public $businessPermitHousenumber, $businessPermitStreetname;
    public $businessPermitBusinessname, $businessPermitBusinessYearEstablish;
    public $businessPermitImage;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'businessPermitFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'businessPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'businessPermitStreetname' => 'required|',

            'businessPermitBusinessname' => 'required|max:255|string',
            'businessPermitBusinessYearEstablish' => 'required|date',

            'businessPermitImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    public function addBusinessPermit()
    {
        $this->validate([
            'businessPermitFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'businessPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'businessPermitStreetname' => 'required',

            'businessPermitBusinessname' => 'required|max:255|string',
            'businessPermitBusinessYearEstablish' => 'required|date',

            'businessPermitImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $business_permit = new BusinessPermit();
        $business_permit->user_id = Auth::user()->id;
        $business_permit->businessPermitFname = $this->businessPermitFname;
        $business_permit->businessPermitLname = $this->businessPermitLname;
        $business_permit->businessPermitMname = $this->businessPermitMname;
        $business_permit->businessPermitSuffix = $this->businessPermitSuffix;

        $business_permit->businessPermitHousenumber = $this->businessPermitHousenumber;
        $business_permit->businessPermitStreetname = $this->businessPermitStreetname;

        $business_permit->businessPermitBusinessname = $this->businessPermitBusinessname;
        $business_permit->businessPermitBusinessYearEstablish = $this->businessPermitBusinessYearEstablish;

        $business_permit->businessPermitStatus = 'pending';

        if (request()->hasfile('image')) {
            $imageName = time() . '.' . request()->businessPermitImage->getClientOriginalExtension();
            request()->businessPermitImage->storeAs('business-permits', $imageName, 'documents');
        }

        $business_permit->save();
        return redirect()->route('user.user-business-permit-status')
            ->with(
                'message',
                'Business Permit request successfully! Please wait the notification about your request status.'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {

        return view('livewire.user.user-business-permit-component')
            ->layout('layouts.user');
    }
}
