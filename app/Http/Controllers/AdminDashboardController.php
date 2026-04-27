<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $user            = auth()->user();
        $totalUsers      = User::where('role', 'client')->count();
        $totalCaterers   = User::where('role', 'caterer')->count();
        $totalBookings   = Booking::count();
        $pendingCaterers = User::where('role', 'caterer')->where('approval_status', 'pending')->get();
        $recentUsers     = User::where('role', 'client')->latest()->take(5)->get();
        $recentBookings  = Booking::with(['user', 'caterer'])->latest()->take(5)->get();

        return response()
            ->view('admin.dashboard', compact(
                'user',
                'totalUsers',
                'totalCaterers',
                'totalBookings',
                'pendingCaterers',
                'recentUsers',
                'recentBookings'
            ))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }

    public function approve(User $user)
    {
        $user->update([
            'approval_status' => 'approved',
            'is_verified'     => true,
            'is_active'       => true,
        ]);

        return back()->with('success', "{$user->business_name} has been approved.");
    }

    public function reject(Request $request, User $user)
    {
        $user->update([
            'approval_status' => 'rejected',
            'is_verified'     => false,
            'is_active'       => false,
        ]);

        return back()->with('success', "{$user->business_name} has been rejected.");
    }
}
