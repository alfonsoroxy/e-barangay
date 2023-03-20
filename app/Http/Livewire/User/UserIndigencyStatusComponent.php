<?php

namespace App\Http\Livewire\User;

use App\Models\Indigency;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserIndigencyStatusComponent extends Component
{
    //Cancel Request
    public function cancelIndigency($indigency_id, $indigencyStatus)
    {
        $indigency = Indigency::find($indigency_id);
        $indigency->indigencyStatus = $indigencyStatus;

        if ($indigencyStatus == 'canceled') {
            $indigency->indigencyCanceleddate = DB::raw('CURRENT_DATE');
        }

        $indigency->save();
        return redirect()->route('user.user-indigency-status')
            ->with('indigency_msg', 'Your Request for Barangay Indigency has been canceled successfully! ');
    }

    public function render()
    {
        $indigencies = Indigency::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.user.user-indigency-status-component')
            ->with('indigencies', $indigencies)
            ->layout('layouts.user');
    }
}
