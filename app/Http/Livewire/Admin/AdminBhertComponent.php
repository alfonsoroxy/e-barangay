<?php

namespace App\Http\Livewire\Admin;

use App\Models\BHERT;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminBhertComponent extends Component
{
    use WithFileUploads;

    //BHERT Variables
    public $bhertFname, $bhertLname, $bhertMname, $bhertSuffix;
    public $bhertHousenumber, $bhertStreetname;
    public $bhertPurpose, $bhertAge;
    public $bhertImage;

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
            'bhertAge' => 'required|numeric|between:18,100',

            'bhertImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);
    }

    public function addBHERT()
    {
        $this->validate([
            'bhertFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'bhertHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'bhertStreetname' => 'required',

            'bhertPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'bhertAge' => 'required|numeric|between:18,100',

            'bhertImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        $bhert = new BHERT();
        $bhert->user_id = Auth::user()->id;
        $bhert->bhertFname = $this->bhertFname;
        $bhert->bhertLname = $this->bhertLname;
        $bhert->bhertMname = $this->bhertMname;
        $bhert->bhertSuffix = $this->bhertSuffix;
        $bhert->bhertHousenumber = $this->bhertHousenumber;
        $bhert->bhertStreetname = $this->bhertStreetname;

        $bhert->bhertPurpose = $this->bhertPurpose;
        $bhert->bhertAge = $this->bhertAge;

        $imageName = Carbon::now()->timestamp . '.' . $this->bhertImage->extension();
        $this->bhertImage->storeAs('bherts', $imageName, 'documents');
        $bhert->bhertImage = $imageName;

        $bhert->bhertStatus = 'approved';

        $bhert->save();
        return redirect()->route('admin.admin-bhert')
            ->with(
                'message',
                'Barangay BHERT Certificate added successfully!'
            );
    }

    // Update Status
    public function updateBHERTStatus($bhert_id, $bhertStatus)
    {
        $bhert = BHERT::find($bhert_id);
        $bhert->bhertStatus = $bhertStatus;

        if ($bhertStatus == 'claimed') {
            $bhert->bhertClaimdate = DB::raw('CURRENT_DATE');
        } else if ($bhertStatus == 'processed') {
            $bhert->bhertProcesseddate = DB::raw('CURRENT_DATE');
        } else if ($bhertStatus == 'approved') {
            $bhert->bhertApproveddate = DB::raw('CURRENT_DATE');
        } else if ($bhertStatus == 'denied') {
            $bhert->bhertDenieddate = DB::raw('CURRENT_DATE');
        } else if ($bhertStatus == 'canceled') {
            $bhert->bhertCanceleddate = DB::raw('CURRENT_DATE');
        }

        $bhert->save();
        return redirect()->route('admin.admin-bhert')
            ->with('bhert_msg', 'BHERT Certificate Status has been updated successfully! ');
    }

    //Delete BHERT Certificate
    public function deleteBHERT($id)
    {
        $bhert = BHERT::find($id);

        unlink('assets/dist/img/bherts/' . $bhert->bhertImage);
        $bhert->delete();
        return redirect()->route('admin.admin-bhert')
            ->with('message', 'BHERT Certificate has been deleted successfully! ');
    }

    public function render()
    {
        $bherts = BHERT::all();

        return view('livewire.admin.admin-bhert-component')
            ->with('bherts', $bherts)
            ->layout('layouts.admin');
    }
}
