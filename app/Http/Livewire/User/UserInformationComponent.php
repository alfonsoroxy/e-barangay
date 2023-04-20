<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserInformationComponent extends Component
{
    public function render()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('livewire.user.user-information-component', ['user' => $user])
            ->layout('layouts.user');
    }
}
