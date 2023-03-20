<?php

namespace App\Http\Livewire\Admin;

use App\Models\Certificate;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AdminUpdateCertificateComponent extends Component
{
    //Certifcate Variables
    public $certificateFname, $certificateLname, $certificateMname, $certificateSuffix;
    public $certificateHousenumber, $certificateStreetname;
    public $certificatePurpose, $certificateOtherPurpose;
    public $certificate_id;

    public function mount($certificate_id)
    {
        $this->certificate_id  = $certificate_id;
        $certificate = Certificate::where('id', $certificate_id)->first();
        $this->certificateFname = $certificate->certificateFname;
        $this->certificateLname = $certificate->certificateLname;
        $this->certificateMname = $certificate->certificateMname;
        $this->certificateSuffix = $certificate->certificateSuffix;

        $this->certificateHousenumber = $certificate->certificateHousenumber;
        $this->certificateStreetname = $certificate->certificateStreetname;

        $this->certificatePurpose = $certificate->certificatePurpose;
        $this->certificateOtherPurpose = $certificate->certificateOtherPurpose;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'certificateFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'certificateLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'certificateMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'certificateSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'certificateHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'certificateStreetname' => 'required',
            'certificatePurpose' => 'required',
        ]);
    }

    //Update Certificate
    public function updateCertificate()
    {
        $certificate = Certificate::find($this->certificate_id);
        $certificate->certificateFname = $this->certificateFname;
        $certificate->certificateLname = $this->certificateLname;
        $certificate->certificateMname = $this->certificateMname;
        $certificate->certificateSuffix = $this->certificateSuffix;

        $certificate->certificateHousenumber = $this->certificateHousenumber;
        $certificate->certificateStreetname = $this->certificateStreetname;

        $certificate->certificatePurpose = $this->certificatePurpose;
        $certificate->certificateOtherPurpose = $this->certificateOtherPurpose;

        $certificate->save();
        return redirect()->route('admin.admin-certificate')
            ->with('message', 'Barangay Certificate updated sucessfully!');
    }

    public function updateCerificateStatus($certificate_id, $certificateStatus)
    {
        $certificate = Certificate::find($certificate_id);
        $certificate->certificateStatus = $certificateStatus;

        if ($certificateStatus == 'claimed') {
            $certificate->certificateClaimdate = DB::raw('CURRENT_DATE');
        } else if ($certificateStatus == 'canceled') {
            $certificate->certificateCanceleddate = DB::raw('CURRENT_DATE');
        }

        $certificate->save();
        return redirect()->route('admin.admin-certificate')
            ->with('certificate_msg', 'Certificate Status has been updated successfully! ');
    }

    public function render()
    {

        return view('livewire.admin.admin-update-certificate-component')->layout('layouts.admin');
    }
}
