<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayPermit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminUpdateBarangayPermitComponent extends Component
{
    //Certifcate Variables
    public $barangayPermitName;
    public $barangayPermitHousenumber, $barangayPermitStreetname;
    public $barangay_permit_id;

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
        $barangay_permit = BarangayPermit::find($this->barangay_permit_id);
        $barangay_permit->barangayPermitName = $this->barangayPermitName;

        $barangay_permit->barangayPermitHousenumber = $this->barangayPermitHousenumber;
        $barangay_permit->barangayPermitStreetname = $this->barangayPermitStreetname;

        $barangay_permit->save();
        return redirect()->route('admin.admin-barangay-permit')
            ->with('message', 'Barangay Permit updated sucessfully!');
    }

    public function updateBarangayPermitStatus($barangay_permit_id, $barangayPermitStatus)
    {
        $barangay_permit = BarangayPermit::find($barangay_permit_id);
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

        return view('livewire.admin.admin-update-barangay-permit-component')->layout('layouts.admin');
    }
}
