<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class MyUserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('my-user.profile', compact('user'));
    }

    public function edit(User $my_user)
    {
        Gate::authorize('update', $my_user);
        return view('my-user.edit', compact('my_user'));
    }

    public function update(Request $request, User $my_user)
    {
        Gate::authorize('update', $my_user);

        $data = $request->validate([
            'name' => 'required|min:3|unique:users,name,' . $my_user->id,
            'email' => 'required|email|unique:users,email,' . $my_user->id,
            'password' => 'nullable|min:6',
            'description' => 'nullable|string',
            'role' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $my_user->update($data);

        return redirect()->route('my-user.index')
            ->with('success', 'Your profile was updated!');
    }
}
