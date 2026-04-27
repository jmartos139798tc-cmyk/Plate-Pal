<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class CatererDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalBookings    = Booking::where('caterer_id', $user->id)->count();
        $pendingBookings  = Booking::where('caterer_id', $user->id)->where('status', 'pending')->count();
        $unreadMessages   = Message::where('caterer_id', $user->id)->where('is_read', false)->where('sender', 'client')->count();
        $avgRating        = $user->rating ?? 0;

        $upcomingBookings = Booking::with('user')
            ->where('caterer_id', $user->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('event_date')
            ->take(3)
            ->get();

        $recentMessages   = Message::with('user')
            ->where('caterer_id', $user->id)
            ->latest()
            ->take(3)
            ->get();

// Monthly bookings for current and previous month by week
        $currentMonth  = now()->month;
        $currentYear   = now()->year;
        $prevMonth     = now()->subMonth()->month;
        $prevYear      = now()->subMonth()->year;

        $currentMonthTotal  = Booking::where('caterer_id', $user->id)
            ->whereMonth('event_date', $currentMonth)
            ->whereYear('event_date', $currentYear)
            ->count();

        $previousMonthTotal = Booking::where('caterer_id', $user->id)
            ->whereMonth('event_date', $prevMonth)
            ->whereYear('event_date', $prevYear)
            ->count();

        $growth = $previousMonthTotal > 0
            ? round((($currentMonthTotal - $previousMonthTotal) / $previousMonthTotal) * 100, 1)
            : ($currentMonthTotal > 0 ? 100 : 0);

// Weekly breakdown for chart (4 weeks)
        $currentWeekly  = $this->weeklyBookings($user->id, $currentMonth, $currentYear);
        $previousWeekly = $this->weeklyBookings($user->id, $prevMonth, $prevYear);

        return response()
            ->view('caterer.dashboard', compact(
                'user',
                'totalBookings',
                'pendingBookings',
                'unreadMessages',
                'avgRating',
                'upcomingBookings',
                'recentMessages',
                'currentMonthTotal',
                'previousMonthTotal',
                'growth',
                'currentWeekly',
                'previousWeekly'
            ))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }

    private function weeklyBookings($catererId, $month, $year): array
    {
        $weeks = [0, 0, 0, 0];
        $bookings = Booking::where('caterer_id', $catererId)
            ->whereMonth('event_date', $month)
            ->whereYear('event_date', $year)
            ->get();

        foreach ($bookings as $booking) {
            $week = min((int) ceil($booking->event_date->day / 7), 4) - 1;
            $weeks[$week]++;
        }

        return $weeks;
    }
}
