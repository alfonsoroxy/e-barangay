<?php

namespace App\Http\Livewire\Admin;

use App\Models\Certificate;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminCertificateComponent extends Component
{
    use WithFileUploads;

    //Certificate Variables
    public $certificateFname, $certificateLname, $certificateMname, $certificateSuffix;
    public $certificateHousenumber, $certificateStreetname;
    public $certificatePurpose, $certificateOtherPurpose;
    public $certificateImage;
    public $formSubmitted = false;

    protected $rules = [
        'certificateFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'certificateLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'certificateMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'certificateSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'certificateHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'certificateStreetname' => 'required',
        'certificatePurpose' => 'required',

        'certificateImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

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

            'certificateImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
    }

    public function addCertificate()
    {
        $this->validate([
            'certificateFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'certificateLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'certificateMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'certificateSuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'certificateHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'certificateStreetname' => 'required',
            'certificatePurpose' => 'required',

            'certificateImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $certificate = new Certificate();
        $certificate->user_id = Auth::user()->id;
        $certificate->certificateFname = $this->certificateFname;
        $certificate->certificateLname = $this->certificateLname;
        $certificate->certificateMname = $this->certificateMname;
        $certificate->certificateSuffix = $this->certificateSuffix;

        $certificate->certificateHousenumber = $this->certificateHousenumber;
        $certificate->certificateStreetname = $this->certificateStreetname;

        $certificate->certificatePurpose = $this->certificatePurpose;
        $certificate->certificateOtherPurpose = $this->certificateOtherPurpose;

        if ($this->certificateImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->certificateImage->extension();
            $this->certificateImage->storeAs('certificates', $imageName);
            $certificate->certificateImage = $imageName;
        }

        $certificate->certificateStatus = 'approved';

        $this->formSubmitted = true;

        $certificate->save();
        return redirect()->route('admin.admin-certificate')
            ->with(
                'message',
                'Barangay Certificate added successfully!'
            );
    }

    // Update Status
    public function updateCertificateStatus($certificate_id, $certificateStatus)
    {
        $certificate = Certificate::findOrFail($certificate_id);
        $certificate->certificateStatus = $certificateStatus;

        if ($certificateStatus == 'claimed') {
            $certificate->certificateClaimdate = DB::raw('CURRENT_DATE');
        } else if ($certificateStatus == 'processed') {
            $certificate->certificateProcesseddate = DB::raw('CURRENT_DATE');
        } else if ($certificateStatus == 'approved') {
            $certificate->certificateApproveddate = DB::raw('CURRENT_DATE');
        } else if ($certificateStatus == 'denied') {
            $certificate->certificateDenieddate = DB::raw('CURRENT_DATE');
        } else if ($certificateStatus == 'canceled') {
            $certificate->certificateCanceleddate = DB::raw('CURRENT_DATE');
        }

        $certificate->save();
        return redirect()->route('admin.admin-certificate')
            ->with('certificate_msg', 'Certificate Status has been updated successfully! ');
    }

    //Delete Barangay Certificate
    public function deleteCertificate($id)
    {
        $certificate = Certificate::findOrFail($id);

        Storage::disk('local')->delete('certificates/' . $certificate->certificateImage);
        $certificate->delete();
        return redirect()->route('admin.admin-certificate')
            ->with('message', 'Barangay Certificate has been deleted successfully! ');
    }

    public function render()
    {
        $certificates = [];

        Certificate::chunk(100, function ($chunk) use (&$certificates) {
            foreach ($chunk as $certificate) {
                $certificates[] = $certificate;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-certificate-component',
                    [
                        'certificates' => $certificates
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
