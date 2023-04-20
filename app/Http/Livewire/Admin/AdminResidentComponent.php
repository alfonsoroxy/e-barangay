<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminResidentComponent extends Component
{
    //Delete Barangay Resident
    public function deleteResident($id)
    {
        $user = User::findOrFail($id);

        Storage::disk('local')->delete('verification/' . $user->image);
        $user->delete();
        return redirect()->route('admin.admin-resident')
            ->with('message', 'Barangay Resident has been deleted successfully! ');
    }

    public function render()
    {
        $users = [];

        User::where('is_admin', '=', 'USR')->chunk(100, function ($chunk) use (&$users) {
            foreach ($chunk as $user) {
                $users[] = $user;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view('livewire.admin.admin-resident-component', [
                    'users' => $users
                ])->layout('layouts.admin');
            } else {
                return view('livewire.user.user-dashboard-component')->with('status', 'You do not have permission to access the page.');
            }
        } else {
            return redirect('/login')->with(['status', 'Please Login First.']);
        }
    }
}
