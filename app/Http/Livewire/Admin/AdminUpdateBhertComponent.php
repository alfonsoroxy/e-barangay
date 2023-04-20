<?php

namespace App\Http\Livewire\Admin;

use App\Models\BHERT;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminUpdateBhertComponent extends Component
{
    //BHERT Variables
    public $bhertFname, $bhertLname, $bhertMname, $bhertSuffix;
    public $bhertHousenumber, $bhertStreetname;
    public $bhertPurpose, $bhertAge;
    public $bhert_id;
    public $formSubmitted = false;

    protected $rules = [
        'bhertFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'bhertLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'bhertMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'bhertSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'bhertHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'bhertStreetname' => 'required',

        'bhertPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'bhertAge' => 'required|numeric|between:13,100',
    ];

    public function mount($bhert_id)
    {
        $this->bhert_id  = $bhert_id;
        $bhert = BHERT::where('id', $bhert_id)->first();
        $this->bhertFname = $bhert->bhertFname;
        $this->bhertLname = $bhert->bhertLname;
        $this->bhertMname = $bhert->bhertMname;
        $this->bhertSuffix = $bhert->bhertSuffix;

        $this->bhertHousenumber = $bhert->bhertHousenumber;
        $this->bhertStreetname = $bhert->bhertStreetname;

        $this->bhertPurpose = $bhert->bhertPurpose;
        $this->bhertAge = $bhert->bhertAge;
    }

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
            'bhertAge' => 'required|numeric|between:13,100',
        ]);
    }


    //Update BHERT
    public function updateBHERT()
    {
        $bhert = BHERT::findOrFail($this->bhert_id);
        $bhert->bhertFname = $this->bhertFname;
        $bhert->bhertLname = $this->bhertLname;
        $bhert->bhertMname = $this->bhertMname;
        $bhert->bhertSuffix = $this->bhertSuffix;

        $bhert->bhertHousenumber = $this->bhertHousenumber;
        $bhert->bhertStreetname = $this->bhertStreetname;

        $bhert->bhertPurpose = $this->bhertPurpose;
        $bhert->bhertAge = $this->bhertAge;

        $this->formSubmitted = true;

        $bhert->save();
        return redirect()->route('admin.admin-bhert')
            ->with('message', 'Barangay BHERT Certificate updated sucessfully!');
    }

    public function updateBHERTStatus($bhert_id, $bhertStatus)
    {
        $bhert = BHERT::findOrFail($bhert_id);
        $bhert->bhertStatus = $bhertStatus;

        if ($bhertStatus == 'claimed') {
            $bhert->bhertClaimdate = DB::raw('CURRENT_DATE');
        } else if ($bhertStatus == 'canceled') {
            $bhert->bhertCanceleddate = DB::raw('CURRENT_DATE');
        }

        $bhert->save();
        return redirect()->route('admin.admin-bhert')
            ->with('bhert_msg', 'BHERT Certificate Status has been updated successfully! ');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-bhert-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
