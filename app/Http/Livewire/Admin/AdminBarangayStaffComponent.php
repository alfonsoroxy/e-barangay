<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminBarangayStaffComponent extends Component
{
    //Delete Barangay Staff
    public function deleteStaff($id)
    {
        $user = User::find($id);

        unlink(public_path('assets/dist/img/verification/' . $user->image));
        $user->delete();
        return redirect()->route('admin.admin-barangay-staff')
            ->with('message', 'Barangay Staff has been deleted successfully! ');
    }

    public function render()
    {
        $users = User::where('is_admin', '=', 'ADM')->get();

        return view('livewire.admin.admin-barangay-staff-component')
            ->with('users', $users)->layout('layouts.admin');
    }
}
