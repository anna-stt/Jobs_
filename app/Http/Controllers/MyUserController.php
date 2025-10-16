<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class MyUserController extends Controller
{
    public function index()
    {
        $my_user = auth()->user();
        return view('my-user.profile', compact('my_user'));
    }

    public function edit(User $my_user)
    {
         $my_user = auth()->user();
        return view('my-user.edit', compact('my_user'));
    }

    public function update(Request $request, User $my_user)
    {
         $my_user = auth()->user();

        $data = $request->validate([
            'description' => 'nullable|string',
            'role' => 'nullable|string',
            'cv' => 'nullable|file|mimes:pdf|max:2048',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $path = $file->store('userCv', 'local');
            $data['cv'] = $path;
        }
        if ($request->hasFile('profile_picture')) {
            $file = $request->image('profile_picture');
            $path = $file->store('ProfilePictures', 'local');
            $data['profile_picture'] = $path;
        }

        if (empty($data['password'])) {
            unset($data['password']);
        }
        $my_user->update(['cv' => $path]);

        $my_user->update($data);

        return redirect()->route('my-user.index')
            ->with('success', 'Your profile was updated!');
    }
}
