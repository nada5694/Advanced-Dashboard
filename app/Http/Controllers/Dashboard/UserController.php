<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = user::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        $users = user::all();
        return view('dashboard.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            $request->validate([
                'name'      => 'required|string|max:255',
                'email'     => 'required|string|email|unique:users',
                'user_type' => 'required|in:admin,moderator',
                'password'  => 'required|string|min:8|confirmed',
            ]);

            $user            = new user();
            $user->name      = $request->name;
            $user->email     = $request->email;
            $user->user_type = $request->user_type;
            $user->password  = $request->password;
            $user->save();
            // Optionally assign roles or perform other actions

            return redirect()->route('users.index')->with('success', "User \"{$user->name}\" has been created successfully.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (auth()->user()->user_type == 'admin') {
            $user = User::findOrFail($id);
            return view('dashboard.users.edit', compact('user'));
        } else {
            return redirect()->route('users.index')->with('error', 'Unauthorized access.');
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users,email,' . $user->id,
            'user_type' => 'required|in:admin,moderator',
        ]);

        $user            = User::findOrFail($id);
        $user->name      = $request->name;
        $user->email     = $request->email;
        $user->user_type = $request->user_type;
        $user->save();
        // Optionally assign roles or perform other actions
        // $user->update($request->all());

        return redirect()->route('users.index')->with('success', "User \"{$user->name}\" has been created successfully.");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        try {
            $user->delete();
            return redirect()->route('users.index')->with('Success', '"'.$user->name .'"\'s User has been deleted successfully.');
        }catch (\Exception $exception) {
            return redirect()->route('users.index')->with('error', 'Something went wrong!');
        }
    }

    public function admins()
    {
        $admins = User::where('user_type', 'admin')->get();
        return view('dashboard.users.admins', compact('admins'));
    }

    public function moderators()
    {
        $moderators = User::where('user_type', 'moderator')->get();
        $admin = User::where('user_type', 'admin')->get();

        return view('dashboard.users.moderators', compact('moderators','admin'));
    }
}
