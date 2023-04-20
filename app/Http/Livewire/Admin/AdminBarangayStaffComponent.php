<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AdminBarangayStaffComponent extends Component
{
    //Delete Barangay Staff
    public function deleteStaff($id)
    {
        $user = User::findOrFail($id);

        Storage::disk('local')->delete('verification/' . $user->image);
        $user->delete();
        return redirect()->route('admin.admin-barangay-staff')
            ->with('message', 'Barangay Staff has been deleted successfully! ');
    }

    public function render()
    {
        $users = [];

        User::where('is_admin', '=', 'ADM')->chunk(100, function ($chunk) use (&$users) {
            foreach ($chunk as $user) {
                $users[] = $user;
            }
        });

        if (Auth::check()) {
            if (Auth::user()->is_admin === 'ADM') {
                return view(
                    'livewire.admin.admin-barangay-staff-component',
                    [
                        'users' => $users
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
