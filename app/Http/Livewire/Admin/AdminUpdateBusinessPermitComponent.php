<?php

namespace App\Http\Livewire\Admin;

use App\Models\BusinessPermit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminUpdateBusinessPermitComponent extends Component
{
    //BusinessPermit Variables
    public $businessPermitFname, $businessPermitLname, $businessPermitMname, $businessPermitSuffix;
    public $businessPermitHousenumber, $businessPermitStreetname;
    public $businessPermitBusinessname, $businessPermitBusinessYearEstablish;
    public $business_permit_id;
    public $formSubmitted = false;

    protected $rules = [
        'businessPermitFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'businessPermitLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'businessPermitMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'businessPermitSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'businessPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'businessPermitStreetname' => 'required',

        'businessPermitBusinessname' => 'required|max:255|string',
        'businessPermitBusinessYearEstablish' => 'required|date',
    ];

    public function mount($business_permit_id)
    {
        $this->business_permit_id  = $business_permit_id;
        $business_permit = BusinessPermit::where('id', $business_permit_id)->first();
        $this->businessPermitFname = $business_permit->businessPermitFname;
        $this->businessPermitLname = $business_permit->businessPermitLname;
        $this->businessPermitMname = $business_permit->businessPermitMname;
        $this->businessPermitSuffix = $business_permit->businessPermitSuffix;

        $this->businessPermitHousenumber = $business_permit->businessPermitHousenumber;
        $this->businessPermitStreetname = $business_permit->businessPermitStreetname;

        $this->businessPermitBusinessname = $business_permit->businessPermitBusinessname;
        $this->businessPermitBusinessYearEstablish = $business_permit->businessPermitBusinessYearEstablish;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'businessPermitFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'businessPermitSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'businessPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'businessPermitStreetname' => 'required',

            'businessPermitBusinessname' => 'required|max:255|string',
            'businessPermitBusinessYearEstablish' => 'required|date',
        ]);
    }

    //Update Business Permit
    public function updateBusinessPermit()
    {
        $business_permit = BusinessPermit::findOrFail($this->business_permit_id);
        $business_permit->businessPermitFname = $this->businessPermitFname;
        $business_permit->businessPermitLname = $this->businessPermitLname;
        $business_permit->businessPermitMname = $this->businessPermitMname;
        $business_permit->businessPermitSuffix = $this->businessPermitSuffix;

        $business_permit->businessPermitHousenumber = $this->businessPermitHousenumber;
        $business_permit->businessPermitStreetname = $this->businessPermitStreetname;

        $business_permit->businessPermitBusinessname = $this->businessPermitBusinessname;
        $business_permit->businessPermitBusinessYearEstablish = $this->businessPermitBusinessYearEstablish;

        $this->formSubmitted = true;

        $business_permit->save();
        return redirect()->route('admin.admin-business-permit')
            ->with('message', 'Business Permit updated sucessfully!');
    }

    public function updateBusinessPermitStatus($business_permit_id, $businessPermitStatus)
    {
        $business_permit = BusinessPermit::findOrFail($business_permit_id);
        $business_permit->businessPermitStatus = $businessPermitStatus;

        if ($businessPermitStatus == 'claimed') {
            $business_permit->businessPermitClaimdate = DB::raw('CURRENT_DATE');
        } else if ($businessPermitStatus == 'canceled') {
            $business_permit->businessPermitCanceleddate = DB::raw('CURRENT_DATE');
        }

        $business_permit->save();
        return redirect()->route('admin.admin-business-permit')
            ->with('business_permit_msg', 'Business Permit Status has been updated successfully! ');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-business-permit-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
