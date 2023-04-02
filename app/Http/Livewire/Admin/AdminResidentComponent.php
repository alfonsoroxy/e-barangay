<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class AdminResidentComponent extends Component
{
    //Delete Barangay Resident
    public function deleteResident($id)
    {
        $user = User::find($id);

        Storage::disk('public')->delete('verification/' . $user->image);
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

        return view('livewire.admin.admin-resident-component', [
            'users' => $users
        ])->layout('layouts.admin');
    }
}
