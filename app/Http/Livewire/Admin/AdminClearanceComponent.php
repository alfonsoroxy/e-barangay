<?php

namespace App\Http\Livewire\Admin;

use App\Models\Clearance;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminClearanceComponent extends Component
{
    use WithFileUploads;

    //Clearance Variables
    public $clearanceFname, $clearanceLname, $clearanceMname, $clearanceSuffix;
    public $clearanceHousenumber, $clearanceStreetname;
    public $clearanceNationality, $clearanceGender, $clearanceMaritalstatus;
    public $clearanceImage;
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

        'clearanceImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

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

            'clearanceImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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

            'clearanceImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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

        if ($this->clearanceImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->clearanceImage->extension();
            $this->clearanceImage->storeAs('clearances', $imageName);
            $clearance->clearanceImage = $imageName;
        }

        $clearance->clearanceStatus = 'approved';

        $this->formSubmitted = true;

        $clearance->save();
        return redirect()->route('admin.admin-clearance')
            ->with(
                'message',
                'Barangay Clearance added successfully!'
            );
    }

    // Update Status
    public function updateClearanceStatus($clearance_id, $clearanceStatus)
    {
        $clearance = Clearance::findOrFail($clearance_id);
        $clearance->clearanceStatus = $clearanceStatus;

        if ($clearanceStatus == 'claimed') {
            $clearance->clearanceClaimdate = DB::raw('CURRENT_DATE');
        } else if ($clearanceStatus == 'processed') {
            $clearance->clearanceProcesseddate = DB::raw('CURRENT_DATE');
        } else if ($clearanceStatus == 'approved') {
            $clearance->clearanceApproveddate = DB::raw('CURRENT_DATE');
        } else if ($clearanceStatus == 'denied') {
            $clearance->clearanceDenieddate = DB::raw('CURRENT_DATE');
        } else if ($clearanceStatus == 'canceled') {
            $clearance->clearanceCanceleddate = DB::raw('CURRENT_DATE');
        }

        $clearance->save();
        return redirect()->route('admin.admin-clearance')
            ->with('clearance_msg', 'Clearance Status has been updated successfully! ');
    }

    //Delete Barangay Clearance
    public function deleteClearance($id)
    {
        $clearance = Clearance::findOrFail($id);

        Storage::disk('local')->delete('clearances/' . $clearance->clearanceImage);
        $clearance->delete();
        return redirect()->route('admin.admin-clearance')
            ->with('message', 'Barangay Clearance has been deleted successfully! ');
    }

    public function render()
    {
        $clearances = [];

        Clearance::chunk(100, function ($chunk) use (&$clearances) {
            foreach ($chunk as $clearance) {
                $clearances[] = $clearance;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-clearance-component',
                    [
                        'clearances' => $clearances
                    ]
                )->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
