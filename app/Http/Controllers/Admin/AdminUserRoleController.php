<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserRoleController extends Controller
{
    public function index()
    {
        $users = [];

        User::chunk(100, function ($chunk) use (&$users) {
            foreach ($chunk as $user) {
                $users[] = $user;
            }
        });

        return view('admin.user-role.user-role', [
            'users' => $users
        ]);
    }

    public function edit($user_id)
    {
        //Send Find Specific User
        $user = User::find($user_id);


        return view('admin.user-role.edit-user-role', compact('user'));
    }

    public function update(Request $request, $user_id)
    {
        //Send Find Specific User
        $user = User::find($user_id);
        if ($user) {
            $user->is_admin = $request->is_admin;
            $user->update();
            return redirect('admin/users')->with('message', 'User Role updated successfully!');
        }
    }
}
