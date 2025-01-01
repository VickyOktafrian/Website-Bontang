<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; // For getting the authenticated user
use App\Models\User;

class ProfilController extends \Illuminate\Routing\Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // This ensures authentication is handled at the controller level
    }

    // Display the profile data
    public function show()
    {
        $user = Auth::user(); // Get the authenticated user
        return view('user.profil', compact('user'))->with('title','Profil'); // Pass user data to the view
    }

    // Update the profile data
    public function update(Request $request)
{
    $user = Auth::user(); // Get the authenticated user

    // Validate the request
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username,' . $user->id,
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Optional profile picture
    ]);

    // Update the user data
    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;

    // Handle profile picture upload if exists
    if ($request->hasFile('foto_profil')) {
        $imagePath = $request->file('foto_profil')->store('profile_pictures', 'public');
        $user->foto_profil = $imagePath;
    }

    // Save the updated user data
    $user->save();


    // Redirect back with success message
    return redirect()->route('profil.edit')->with('success', 'Profile updated successfully!');
}


}
