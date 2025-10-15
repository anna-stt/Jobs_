<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function create()
    {
        Gate::authorize('create', User::class);
        return view('user.create');
    }

    public function store(Request $request)
    {

        User::create(
            $request->validate([
                'name' => 'required|min:3|unique:users,name',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|'
            ])
        );

        return redirect()->route('auth.create')
            ->with('success', 'Your user account was created!');
    }

}
