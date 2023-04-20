<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminUpdateResidentComponent extends Component
{
    //User Variables
    public $first_name, $mname, $last_name, $suffix;
    public $houseNumber, $streetName;
    public $birthday, $gender, $nationality, $maritalStatus;
    public $contact;
    public $user_id;
    public $formSubmitted = false;

    public function mount($user_id)
    {
        $this->user_id  = $user_id;
        $user = User::where('id', $user_id)->first();
        $this->first_name = $user->first_name;
        $this->mname = $user->mname;
        $this->last_name = $user->last_name;
        $this->suffix = $user->suffix;

        $this->houseNumber = $user->houseNumber;
        $this->streetName = $user->streetName;

        $this->birthday = $user->birthday;
        $this->gender = $user->gender;
        $this->nationality = $user->nationality;
        $this->maritalStatus = $user->maritalStatus;

        $this->contact = $user->contact;
    }

    protected $rules = [
        'first_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
        'last_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
        'mname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
        'suffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

        'houseNumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
        'streetName' => 'required',

        'birthday' => 'required',
        'nationality' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
        'gender' => 'required',
        'maritalStatus' => 'required',

        'contact' => 'nullable|string|max:11|regex:/^[-0-9\+]+$/',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'last_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'mname' => 'nullable|max:1|regex:/^[a-zA-ZÑñ\s]+$/',
            'suffix' => 'nullable|max:10|regex:/^[a-zA-ZÑñ\s]+$/',

            'houseNumber' => 'required|numeric|regex:/^[-0-9\+]+$/',
            'streetName' => 'required',

            'birthday' => 'required',
            'nationality' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'gender' => 'required',
            'maritalStatus' => 'required',

            'contact' => 'nullable|string|max:11|regex:/^[-0-9\+]+$/',
        ]);
    }


    //Update Resident
    public function updateResident()
    {
        $user = User::findOrFail($this->user_id);
        $user->first_name = $this->first_name;
        $user->mname = $this->mname;
        $user->last_name = $this->last_name;
        $user->suffix = $this->suffix;

        $user->houseNumber = $this->houseNumber;
        $user->streetName = $this->streetName;

        $user->birthday = $this->birthday;
        $user->nationality = $this->nationality;
        $user->gender = $this->gender;
        $user->maritalStatus = $this->maritalStatus;

        $user->contact = $this->contact;

        $this->formSubmitted = true;

        $user->save();
        return redirect()->route('admin.admin-resident')
            ->with('message', 'Barangay Resident updated sucessfully!');
    }

    public function render()
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-update-resident-component')->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
