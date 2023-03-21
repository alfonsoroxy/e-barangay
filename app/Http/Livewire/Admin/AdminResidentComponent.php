<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class AdminResidentComponent extends Component
{
    //Delete Barangay Resident
    public function deleteResident($id)
    {
        $user = User::find($id);

        unlink(public_path('assets/dist/img/verification/' . $user->image));
        $user->delete();
        return redirect()->route('admin.admin-resident')
            ->with('message', 'Barangay Resident has been deleted successfully! ');
    }

    public function render()
    {
        $users = User::where('is_admin', '=', 'USR')->get();

        return view(
            'livewire.admin.admin-resident-component'
        )->with('users', $users)->layout('layouts.admin');
    }
}
