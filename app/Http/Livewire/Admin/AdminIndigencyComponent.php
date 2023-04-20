<?php

namespace App\Http\Livewire\Admin;

use App\Models\Indigency;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class AdminIndigencyComponent extends Component
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

        $indigency->indigencyStatus = 'approved';

        $this->formSubmitted = true;

        $indigency->save();
        return redirect()->route('admin.admin-indigency')
            ->with(
                'message',
                'Barangay Indigency added successfully!'
            );
    }

    // Update Status
    public function updateIndigencyStatus($indigency_id, $indigencyStatus)
    {
        $indigency = Indigency::findOrFail($indigency_id);
        $indigency->indigencyStatus = $indigencyStatus;

        if ($indigencyStatus == 'claimed') {
            $indigency->indigencyClaimdate = DB::raw('CURRENT_DATE');
        } else if ($indigencyStatus == 'processed') {
            $indigency->indigencyProcesseddate = DB::raw('CURRENT_DATE');
        } else if ($indigencyStatus == 'approved') {
            $indigency->indigencyApproveddate = DB::raw('CURRENT_DATE');
        } else if ($indigencyStatus == 'denied') {
            $indigency->indigencyDenieddate = DB::raw('CURRENT_DATE');
        } else if ($indigencyStatus == 'canceled') {
            $indigency->indigencyCanceleddate = DB::raw('CURRENT_DATE');
        }

        $indigency->save();
        return redirect()->route('admin.admin-indigency')
            ->with('indigency_msg', 'Indigency Status has been updated successfully! ');
    }

    //Delete Barangay Indigency
    public function deleteIndigency($id)
    {
        $indigency = Indigency::findOrFail($id);

        Storage::disk('local')->delete('indigencies/' . $indigency->indigencyImage);
        $indigency->delete();
        return redirect()->route('admin.admin-indigency')
            ->with('message', 'Barangay Indigency has been deleted successfully! ');
    }

    public function render()
    {
        $indigencies = [];

        Indigency::chunk(100, function ($chunk) use (&$indigencies) {
            foreach ($chunk as $indigency) {
                $indigencies[] = $indigency;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-indigency-component',
                    [
                        'indigencies' => $indigencies
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
