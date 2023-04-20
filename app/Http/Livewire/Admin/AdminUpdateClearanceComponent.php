<?php

namespace App\Http\Livewire\Admin;

use App\Models\Clearance;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminUpdateClearanceComponent extends Component
{
    //Clearance Variables
    public $clearanceFname, $clearanceLname, $clearanceMname, $clearanceSuffix;
    public $clearanceHousenumber, $clearanceStreetname;
    public $clearanceNationality, $clearanceGender, $clearanceMaritalstatus;
    public $clearance_id;
    public $formSubmitted = false;

    protected $rules = [
        'clearanceFname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
        'clearanceLname' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
        'clearanceMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'clearanceSuffix' => 'nullable|max:10/|regex:/^[a-zA-ZÑñ\s]+$/',

        'clearanceHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'clearanceStreetname' => 'required',

        'clearanceNationality' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
        'clearanceGender' => 'required',
        'clearanceMaritalstatus' => 'required',
    ];

    public function mount($clearance_id)
    {
        $this->clearance_id  = $clearance_id;
        $clearance = Clearance::where('id', $clearance_id)->first();
        $this->clearanceFname = $clearance->clearanceFname;
        $this->clearanceLname = $clearance->clearanceLname;
        $this->clearanceMname = $clearance->clearanceMname;
        $this->clearanceSuffix = $clearance->clearanceSuffix;

        $this->clearanceHousenumber = $clearance->clearanceHousenumber;
        $this->clearanceStreetname = $clearance->clearanceStreetname;

        $this->clearanceNationality = $clearance->clearanceNationality;
        $this->clearanceGender = $clearance->clearanceGender;
        $this->clearanceMaritalstatus = $clearance->clearanceMaritalstatus;
    }

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
        ]);
    }


    //Update Clearance
    public function updateClearance()
    {
        $clearance = Clearance::findOrFail($this->clearance_id);
        $clearance->clearanceFname = $this->clearanceFname;
        $clearance->clearanceLname = $this->clearanceLname;
        $clearance->clearanceMname = $this->clearanceMname;
        $clearance->clearanceSuffix = $this->clearanceSuffix;

        $clearance->clearanceHousenumber = $this->clearanceHousenumber;
        $clearance->clearanceStreetname = $this->clearanceStreetname;

        $clearance->clearanceNationality = $this->clearanceNationality;
        $clearance->clearanceGender = $this->clearanceGender;
        $clearance->clearanceMaritalstatus = $this->clearanceMaritalstatus;

        $this->formSubmitted = true;

        $clearance->save();
        return redirect()->route('admin.admin-clearance')
            ->with('message', 'Barangay Clearance updated sucessfully!');
    }

    public function updateClearanceStatus($clearance_id, $clearanceStatus)
    {
        $clearance = Clearance::findOrFail($clearance_id);
        $clearance->clearanceStatus = $clearanceStatus;

        if ($clearanceStatus == 'claimed') {
            $clearance->clearanceClaimdate = DB::raw('CURRENT_DATE');
        } else if ($clearanceStatus == 'canceled') {
            $clearance->clearanceCanceleddate = DB::raw('CURRENT_DATE');
        }

        $clearance->save();
        return redirect()->route('admin.admin-clearance')
            ->with('clearance_msg', 'Clearance Status has been updated successfully! ');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-clearance-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
