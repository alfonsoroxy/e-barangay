<?php

namespace App\Http\Livewire\Admin;

use App\Models\BarangayPermit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class AdminBarangayPermitComponent extends Component
{
    use WithFileUploads;

    //Barangay Permit Variable
    public $barangayPermitName;
    public $barangayPermitHousenumber, $barangayPermitStreetname;
    public $barangayPermitImage;
    public $formSubmitted = false;

    protected $rules = [
        'barangayPermitName' => 'required|string|max:255',

        'barangayPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'barangayPermitStreetname' => 'required',

        'barangayPermitImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'barangayPermitName' => 'required|string|max:255',

            'barangayPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'barangayPermitStreetname' => 'required',

            'barangayPermitImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
    }

    public function addBarangayPermit()
    {
        $this->validate([
            'barangayPermitName' => 'required|string|max:255',

            'barangayPermitHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'barangayPermitStreetname' => 'required',

            'barangayPermitImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $barangay_permit = new BarangayPermit();
        $barangay_permit->user_id = Auth::user()->id;
        $barangay_permit->barangayPermitName = $this->barangayPermitName;

        $barangay_permit->barangayPermitHousenumber = $this->barangayPermitHousenumber;
        $barangay_permit->barangayPermitStreetname = $this->barangayPermitStreetname;

        if ($this->barangayPermitImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->barangayPermitImage->extension();
            // $this->barangayPermitImage->Storage::disk('local')->storeAs('barangay-permits', $imageName);
            $this->barangayPermitImage->storeAs('barangay-permits', $imageName);
            $barangay_permit->barangayPermitImage = $imageName;
        }

        $barangay_permit->barangayPermitStatus = 'approved';

        $barangay_permit->save();
        return redirect()->route('admin.admin-barangay-permit')
            ->with(
                'message',
                'Barangay Permit added successfully!'
            );

        $this->formSubmitted = true;
    }

    public function updateBarangayPermitStatus($barangay_permit_id, $barangayPermitStatus)
    {
        $barangay_permit = BarangayPermit::find($barangay_permit_id);
        $barangay_permit->barangayPermitStatus = $barangayPermitStatus;

        if ($barangayPermitStatus == 'claimed') {
            $barangay_permit->barangayPermitClaimdate = DB::raw('CURRENT_DATE');
        } else if ($barangayPermitStatus == 'processed') {
            $barangay_permit->barangayPermitProcesseddate = DB::raw('CURRENT_DATE');
        } else if ($barangayPermitStatus == 'approved') {
            $barangay_permit->barangayPermitApproveddate = DB::raw('CURRENT_DATE');
        } else if ($barangayPermitStatus == 'denied') {
            $barangay_permit->barangayPermitDenieddate = DB::raw('CURRENT_DATE');
        } else if ($barangayPermitStatus == 'canceled') {
            $barangay_permit->barangayPermitCanceleddate = DB::raw('CURRENT_DATE');
        }

        $barangay_permit->save();
        return redirect()->route('admin.admin-barangay-permit')
            ->with('brgy_permit_msg', 'Barangay Permit Status has been updated successfully! ');
    }

    //Delete Barangay Permit
    public function deleteBarangayPermit($id)
    {
        $barangay_permit = BarangayPermit::find($id);

        Storage::disk('local')->delete('barangay-permits/' . $barangay_permit->barangayPermitImage);
        $barangay_permit->delete();
        return redirect()->route('admin.admin-barangay-permit')
            ->with('message', 'Barangay Permit has been deleted successfully! ');
    }

    public function render()
    {
        $barangay_permits = [];

        BarangayPermit::chunk(100, function ($chunk) use (&$barangay_permits) {
            foreach ($chunk as $barangay_permit) {
                $barangay_permits[] = $barangay_permit;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-barangay-permit-component',
                    [
                        'barangay_permits' => $barangay_permits
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
