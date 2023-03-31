<?php

namespace App\Http\Livewire\User;

use App\Models\Clearance;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserClearanceStatusComponent extends Component
{
    //Cancel Request
    public function cancelClearance($clearance_id, $clearanceStatus)
    {
        $clearance = Clearance::find($clearance_id);
        $clearance->clearanceStatus = $clearanceStatus;

        if ($clearanceStatus == 'canceled') {
            $clearance->clearanceCanceleddate = DB::raw('CURRENT_DATE');
        }

        $clearance->save();
        return redirect()->route('user.user-clearance-status')
            ->with('clearance_msg', 'Your Request for Barangay Clearance has been canceled successfully! ');
    }

    public function render()
    {
        $clearances = [];

        Clearance::where('user_id', Auth::user()->id)->chunk(100, function ($chunk) use (&$clearances) {
            foreach ($chunk as $clearance) {
                $clearances[] = $clearance;
            }
        });

        return view('livewire.user.user-clearance-status-component', [
            'clearances' => $clearances
        ])->layout('layouts.user');
    }
}
