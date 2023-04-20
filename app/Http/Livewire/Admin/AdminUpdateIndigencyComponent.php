<?php

namespace App\Http\Livewire\Admin;

use App\Models\Indigency;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminUpdateIndigencyComponent extends Component
{
    //Certifcate Variables
    public $indigencyFname, $indigencyLname, $indigencyMname, $indigencySuffix;
    public $indigencyHousenumber, $indigencyStreetname;
    public $indigencyPurpose;
    public $indigency_id;
    public $formSubmitted = false;

    protected $rules = [
        'indigencyFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'indigencyLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'indigencyMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'indigencySuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'indigencyHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'indigencyStreetname' => 'required',

        'indigencyPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
    ];

    public function mount($indigency_id)
    {
        $this->indigency_id = $indigency_id;
        $indigency = Indigency::where('id', $indigency_id)->first();
        $this->indigencyFname = $indigency->indigencyFname;
        $this->indigencyLname = $indigency->indigencyLname;
        $this->indigencyMname = $indigency->indigencyMname;
        $this->indigencySuffix = $indigency->indigencySuffix;

        $this->indigencyHousenumber = $indigency->indigencyHousenumber;
        $this->indigencyStreetname = $indigency->indigencyStreetname;

        $this->indigencyPurpose = $indigency->indigencyPurpose;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'indigencyFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'indigencyLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'indigencyMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'indigencySuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'indigencyHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'indigencyStreetname' => 'required',

            'indigencyPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        ]);
    }


    //Update Indigency
    public function updateIndigency()
    {
        $indigency = Indigency::findOrFail($this->indigency_id);
        $indigency->indigencyFname = $this->indigencyFname;
        $indigency->indigencyLname = $this->indigencyLname;
        $indigency->indigencyMname = $this->indigencyMname;
        $indigency->indigencySuffix = $this->indigencySuffix;

        $indigency->indigencyHousenumber = $this->indigencyHousenumber;
        $indigency->indigencyStreetname = $this->indigencyStreetname;

        $indigency->indigencyPurpose = $this->indigencyPurpose;

        $this->formSubmitted = true;

        $indigency->save();
        return redirect()->route('admin.admin-indigency')
            ->with('message', 'Barangay Indigency updated sucessfully!');
    }

    public function updateIndigencyStatus($indigency_id, $indigencyStatus)
    {
        $indigency = Indigency::findOrFail($indigency_id);
        $indigency->indigencyStatus = $indigencyStatus;

        if ($indigencyStatus == 'claimed') {
            $indigency->indigencyClaimdate = DB::raw('CURRENT_DATE');
        } else if ($indigencyStatus == 'canceled') {
            $indigency->indigencyCanceleddate = DB::raw('CURRENT_DATE');
        }

        $indigency->save();
        return redirect()->route('admin.admin-indigency')
            ->with('indigency_msg', 'Indigency Status has been updated successfully! ');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-indigency-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
