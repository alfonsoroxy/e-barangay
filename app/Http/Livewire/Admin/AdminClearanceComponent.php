<?php

namespace App\Http\Livewire\Admin;

use App\Models\Clearance;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminClearanceComponent extends Component
{
    use WithFileUploads;

    //Clearance Variables
    public $clearanceFname, $clearanceLname, $clearanceMname, $clearanceSuffix;
    public $clearanceHousenumber, $clearanceStreetname;
    public $clearanceNationality, $clearanceGender, $clearanceMaritalstatus;
    public $clearanceImage;

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

            'clearanceImage' => 'required|image|mimes:jpg,jpeg,png|max:2048',
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

            'clearanceImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
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

        $imageName = Carbon::now()->timestamp . '.' . $this->clearanceImage->extension();
        $this->clearanceImage->storeAs('clearances', $imageName);
        $clearance->clearanceImage = $imageName;

        $clearance->clearanceStatus = 'approved';

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
        $clearance = Clearance::find($clearance_id);
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
        $clearance = Clearance::find($id);

        unlink(public_path('assets/dist/img/clearances/' . $clearance->clearanceImage));
        $clearance->delete();
        return redirect()->route('admin.admin-clearance')
            ->with('message', 'Barangay Clearance has been deleted successfully! ');
    }

    public function render()
    {
        $clearances = Clearance::all();

        return view('livewire.admin.admin-clearance-component')
            ->with('clearances', $clearances)
            ->layout('layouts.admin');
    }
}
