<?php

namespace App\Http\Livewire\User;

use App\Models\Indigency;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class UserIndigencyComponent extends Component
{
    use WithFileUploads;

    //Certifcate Variables
    public $indigencyFname, $indigencyLname, $indigencyMname, $indigencySuffix;
    public $indigencyHousenumber, $indigencyStreetname;
    public $indigencyPurpose;
    public $indigencyImage;
    public $formSubmitted = false;

    protected $rules = [
        'indigencyFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'indigencyLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
        'indigencyMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'indigencySuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'indigencyHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'indigencyStreetname' => 'required',

        'indigencyPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',

        'indigencyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
    ];

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

            'indigencyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);
    }

    public function addIndigency()
    {
        $this->validate([
            'indigencyFname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'indigencyLname' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',
            'indigencyMname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'indigencySuffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'indigencyHousenumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'indigencyStreetname' => 'required',

            'indigencyPurpose' => 'required|max:255|regex:/^[a-zA-ZÑñ\s]+$/',

            'indigencyImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $indigency = new Indigency();
        $indigency->user_id = Auth::user()->id;
        $indigency->indigencyFname = $this->indigencyFname;
        $indigency->indigencyLname = $this->indigencyLname;
        $indigency->indigencyMname = $this->indigencyMname;
        $indigency->indigencySuffix = $this->indigencySuffix;

        $indigency->indigencyHousenumber = $this->indigencyHousenumber;
        $indigency->indigencyStreetname = $this->indigencyStreetname;

        $indigency->indigencyPurpose = $this->indigencyPurpose;

        if ($this->indigencyImage) {
            $imageName = Carbon::now()->timestamp . '.' . $this->indigencyImage->extension();
            $this->indigencyImage->storeAs('indigencies', $imageName);
            $indigency->indigencyImage = $imageName;
        }

        $indigency->indigencyStatus = 'pending';

        $this->formSubmitted = true;

        $indigency->save();
        return redirect()->route('user.user-indigency-status')
            ->with(
                'message',
                'Barangay Indigency request successfully! Please wait the notification about your request status.'
            );
        // dd($this->contact_name, $this->contact_email, $this->contact_number, $this->contact_message);

    }

    public function render()
    {

        return view('livewire.user.user-indigency-component')
            ->layout('layouts.user');
    }
}
