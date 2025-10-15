<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class MyUserController extends Controller
{
    public function profile()
    {
        return view('my-user.profile');
    }

    public function update(Request $request, User $user)
    {
        Gate::authorize('update', $user);

        $data = $request->validate([
            'name' => 'required|min:3|unique:users,name,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|'
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('my-user.profile')
            ->with('success', 'Your profile was updated!');
    }

}
