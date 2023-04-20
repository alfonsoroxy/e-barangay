<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayPermit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminUpdateBarangayPermitComponent extends Component
{
    //Certifcate Variables
    public $barangayPermitName;
    public $barangayPermitHousenumber, $barangayPermitStreetname;
    public $barangay_permit_id;
    public $formSubmitted = false;

    protected $rules = [
        'barangayPermitName' => 'required|string|max:255',

        'barangayPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'barangayPermitStreetname' => 'required',
    ];

    public function mount($barangay_permit_id)
    {
        $this->barangay_permit_id = $barangay_permit_id;
        $barangay_permit = BarangayPermit::where('id', $barangay_permit_id)->first();
        $this->barangayPermitName = $barangay_permit->barangayPermitName;

        $this->barangayPermitHousenumber = $barangay_permit->barangayPermitHousenumber;
        $this->barangayPermitStreetname = $barangay_permit->barangayPermitStreetname;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'barangayPermitName' => 'required|string|max:255',

            'barangayPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'barangayPermitStreetname' => 'required',
        ]);
    }

    //Update Permit
    public function updateBarangayPermit()
    {
        $barangay_permit = BarangayPermit::findOrFail($this->barangay_permit_id);
        $barangay_permit->barangayPermitName = $this->barangayPermitName;

        $barangay_permit->barangayPermitHousenumber = $this->barangayPermitHousenumber;
        $barangay_permit->barangayPermitStreetname = $this->barangayPermitStreetname;

        $this->formSubmitted = true;

        $barangay_permit->save();
        return redirect()->route('admin.admin-barangay-permit')
            ->with('message', 'Barangay Permit updated sucessfully!');
    }

    public function updateBarangayPermitStatus($barangay_permit_id, $barangayPermitStatus)
    {
        $barangay_permit = BarangayPermit::findOrFail($barangay_permit_id);
        $barangay_permit->barangayPermitStatus = $barangayPermitStatus;

        if ($barangayPermitStatus == 'claimed') {
            $barangay_permit->barangayPermitClaimdate = DB::raw('CURRENT_DATE');
        } else if ($barangayPermitStatus == 'canceled') {
            $barangay_permit->barangayPermitCanceleddate = DB::raw('CURRENT_DATE');
        }

        $barangay_permit->save();
        return redirect()->route('admin.admin-barangay-permit-status')
            ->with('brgy_permit_msg', 'Barangay Permit Status has been updated successfully! ');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-barangay-permit-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
