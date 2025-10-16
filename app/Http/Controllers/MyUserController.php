<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
            'description' => 'nullable|string',
            'role' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $my_user->update($data);

        return redirect()->route('my-user.index')
            ->with('success', 'Your profile was updated!');
    }
}
