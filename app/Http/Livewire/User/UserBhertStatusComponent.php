<?php

namespace App\Http\Livewire\User;

use App\Models\BHERT;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;;

class UserBhertStatusComponent extends Component
{
    //Cancel Request
    public function cancelBHERT($bhert_id, $bhertStatus)
    {
        $bhert = BHERT::findOrFail($bhert_id);
        $bhert->bhertStatus = $bhertStatus;

        if ($bhertStatus == 'canceled') {
            $bhert->bhertCanceleddate = DB::raw('CURRENT_DATE');
        }

        $bhert->save();
        return redirect()->route('user.user-bhert-status')
            ->with('bhert_msg', 'Your Request for BHERT Certificate has been canceled successfully! ');
    }

    public function render()
    {
        $bherts = [];

        BHERT::where('user_id', Auth::user()->id)->chunk(100, function ($chunk) use (&$bherts) {
            foreach ($chunk as $bhert) {
                $bherts[] = $bhert;
            }
        });

        return view('livewire.user.user-bhert-status-component', [
            'bherts' => $bherts
        ])->layout('layouts.user');
    }
}
