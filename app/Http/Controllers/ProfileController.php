<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Crime;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(): View
    {
        $user = Auth::user();
        $crimes = Crime::where('id', $user->id)->get();
        return view('user.userprofile', compact('user', 'crimes'));
    }

    public function edit(): View
    {
        $user = Auth::user();
        return view('user.userprofileupdate', compact('user'));
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = Auth::user();
    $validatedData = $request->validated();

    // Update email verification flag if email is changed
    if (array_key_exists('email', $validatedData) && $validatedData['email'] !== $user->email) {
        $validatedData['email_verified_at'] = null;
    }

    // Update password if filled
    if ($request->filled('password')) {
        $validatedData['password'] = Hash::make($request->input('password'));
    } else {
        unset($validatedData['password']); // Remove password field from update if empty
    }

    // Handle profile image update
    if ($request->hasFile('profile_image')) {
        // Delete old profile image if exists
        if ($user->profile_image && file_exists(public_path($user->profile_image))) {
            unlink(public_path($user->profile_image));
        }

        $image = $request->file('profile_image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images/profile'), $imageName);
        $validatedData['profile_image'] = 'images/profile/'.$imageName;
    }

    // Update phone and address
    $validatedData['phone'] = $request->input('phone');
    $validatedData['address'] = $request->input('address');

    // Save the updated user
    $user->update($validatedData);

    return Redirect::route('userprofile.show')->with('status', 'Profile updated successfully!');
}
}
