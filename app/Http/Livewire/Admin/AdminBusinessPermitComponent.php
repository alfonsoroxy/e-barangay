<?php

namespace App\Http\Livewire\Admin;

use App\Models\BusinessPermit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminBusinessPermitComponent extends Component
{
    use WithFileUploads;

    //Business Permit Variables
    public $businessPermitFname, $businessPermitLname, $businessPermitMname, $businessPermitSuffix;
    public $businessPermitHousenumber, $businessPermitStreetname;
    public $businessPermitBusinessname, $businessPermitBusinessYearEstablish;
    public $businessPermitImage;
    public $formSubmitted = false;

    protected $rules = [
        'businessPermitFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'businessPermitLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'businessPermitMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'businessPermitSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'businessPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'businessPermitStreetname' => 'required|',

        'businessPermitBusinessname' => 'required|max:255|string',
        'businessPermitBusinessYearEstablish' => 'required|date',

        'businessPermitImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

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

            'businessPermitImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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

            'businessPermitImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
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

        if ($this->businessPermitImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->businessPermitImage->extension();
            $this->businessPermitImage->storeAs('business-permits', $imageName);
            $business_permit->businessPermitImage = $imageName;
        }

        $business_permit->businessPermitStatus = 'approved';

        $this->formSubmitted = true;

        $business_permit->save();
        return redirect()->route('admin.admin-business-permit')
            ->with(
                'message',
                'Business Permit added successfully!'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    // Update Status
    public function updateBusinessPermitStatus($business_permit_id, $businessPermitStatus)
    {
        $business_permit = BusinessPermit::findOrFail($business_permit_id);
        $business_permit->businessPermitStatus = $businessPermitStatus;

        if ($businessPermitStatus == 'claimed') {
            $business_permit->businessPermitClaimdate = DB::raw('CURRENT_DATE');
        } else if ($businessPermitStatus == 'processed') {
            $business_permit->businessPermitProcesseddate = DB::raw('CURRENT_DATE');
        } else if ($businessPermitStatus == 'approved') {
            $business_permit->businessPermitApproveddate = DB::raw('CURRENT_DATE');
        } else if ($businessPermitStatus == 'denied') {
            $business_permit->businessPermitDenieddate = DB::raw('CURRENT_DATE');
        } else if ($businessPermitStatus == 'canceled') {
            $business_permit->businessPermitCanceleddate = DB::raw('CURRENT_DATE');
        }

        $business_permit->save();
        return redirect()->route('admin.admin-business-permit')
            ->with('business_permit_msg', 'Business Permit Status has been updated successfully! ');
    }

    //Delete Business Permit
    public function deleteBusinessPermit($id)
    {
        $business_permit = BusinessPermit::findOrFail($id);

        Storage::disk('local')->delete('business-permits/' . $business_permit->businessPermitImage);
        $business_permit->delete();
        return redirect()->route('admin.admin-business-permit')
            ->with('message', 'Business Permit has been deleted successfully! ');
    }

    public function render()
    {
        $business_permits = [];

        BusinessPermit::chunk(100, function ($chunk) use (&$business_permits) {
            foreach ($chunk as $business_permit) {
                $business_permits[] = $business_permit;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-business-permit-component',
                    [
                        'business_permits' => $business_permits
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
