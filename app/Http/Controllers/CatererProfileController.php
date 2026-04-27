<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatererProfileController extends Controller
{
    public function edit()
    {
        return view('caterer.profile', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'business_name' => ['required', 'string', 'max:255'],
            'barangay'      => ['required', 'string'],
            'phone'         => ['required', 'string'],
            'description'   => ['nullable', 'string'],
            'cuisine'       => ['required', 'string'],
            'price_min'     => ['required', 'string'],
            'price_max'     => ['required', 'string'],
            'min_guest'     => ['required', 'string'],
            'max_guest'     => ['required', 'string'],
            'profile_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $data = $request->only(['business_name', 'barangay', 'phone', 'cuisine', 'description', 'price_min', 'price_max', 'min_guest', 'max_guest']);

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('caterers', 'public');
            $data['profile_image'] = '/storage/' . $path;
        }

        // Set to pending approval when profile is updated
        $data['approval_status'] = 'pending';
        $data['is_verified'] = false;

        $user->update($data);

        return back()->with('success', 'Profile updated! Your details are pending admin approval.');
    }
}
