<?php

namespace App\Http\Livewire\User;

use App\Models\Certificate;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserCertificateComponent extends Component
{
    use WithFileUploads;

    //Certificate Variables
    public $certificateFname, $certificateLname, $certificateMname, $certificateSuffix;
    public $certificateHousenumber, $certificateStreetname;
    public $certificatePurpose, $certificateOtherPurpose;
    public $certificateImage;

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

            'certificateImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
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

            'certificateImage' => 'required|image|mimes:jpg,jpeg,png|max:1024',
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

        $imageName = Carbon::now()->timestamp . '.' . $this->certificateImage->extension();
        $this->certificateImage->storeAs('certificates', $imageName);
        $certificate->certificateImage = $imageName;

        $certificate->certificateStatus = 'pending';

        $certificate->save();
        return redirect()->route('user.user-certificate-status')
            ->with(
                'message',
                'Barangay Certificate request successfully! Please wait the notification about your request status.'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {

        return view('livewire.user.user-certificate-component')->layout('layouts.user');
    }
}
