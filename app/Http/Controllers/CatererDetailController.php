<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Package;

class CatererDetailController extends Controller
{
    public function show($id)
    {
        $caterer = User::where('role', 'caterer')
            ->where('approval_status', 'approved')
            ->where('is_active', true)
            ->findOrFail($id);

        $packages = Package::where('caterer_id', $caterer->id)->get();

        $user = auth()->user();
        $initials = $user ? strtoupper(substr($user->name, 0, 1) . (str_contains($user->name, ' ') ? substr($user->name, strpos($user->name, ' ') + 1, 1) : '')) : null;

        return response()
            ->view('caterer.detail', compact(
                'caterer',
                'packages',
                'user',
                'initials'
            ))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }
}
