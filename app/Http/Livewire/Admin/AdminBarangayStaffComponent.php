<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AdminBarangayStaffComponent extends Component
{
    //Delete Barangay Staff
    public function deleteStaff($id)
    {
        $user = User::find($id);

        Storage::disk('public')->delete('verification/' . $user->image);
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

        return view('livewire.admin.admin-barangay-staff-component', [
            'users' => $users
        ])->layout('layouts.admin');
    }
}
