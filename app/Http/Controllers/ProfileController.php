<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import your User model

class ProfileController extends Controller
{
    public function edit()
    {
    $user = User::find(auth()->user()->id);
    return view('profile.edit', compact('user')); // Replace 'profile.edit' with your view name
    }

    public function update(Request $request)
    {
        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,' . auth()->user()->id, // Exclude current user's email
            // 'password' => 'nullable|string|min:8|confirmed', // Optional password update
        ]);

        // Update user information
        $user = User::find(auth()->user()->id);
        $user->update($validatedData);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully!');
    }
}
