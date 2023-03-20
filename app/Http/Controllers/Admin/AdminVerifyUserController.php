<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminVerifyUserController extends Controller
{
    public function index()
    {
        //Send Users Tables to View
        $users = User::all();

        return view('admin.verify-user.verify-user', compact('users'));
    }

    public function edit($user_id)
    {
        //Send Find Specific User
        $user = User::find($user_id);

        return view('admin.verify-user.edit-verify-user', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        //Send Find Specific User
        $user = User::find($user_id);
        if ($user) {
            $user->is_resident = $request->is_resident;
            $user->update();
            return redirect('admin/verify')->with('message', 'Account Verification updated successfully!');
        }
    }
}
