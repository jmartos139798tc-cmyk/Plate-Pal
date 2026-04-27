<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Message;
use App\Models\User;

class ClientDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $activeBookings    = Booking::where('user_id', $user->id)->whereIn('status', ['pending', 'confirmed'])->count();
        $completedEvents   = Booking::where('user_id', $user->id)->where('status', 'completed')->count();
        $unreadMessages    = Message::where('user_id', $user->id)->where('is_read', false)->where('sender', 'caterer')->count();

        $upcomingBookings  = Booking::with('caterer')
            ->where('user_id', $user->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('event_date')
            ->take(3)
            ->get();

        $recentMessages    = Message::with('caterer')
            ->where('user_id', $user->id)
            ->latest()
            ->take(3)
            ->get();

        $featuredCaterers = [
            [
                'name'     => "Lola Maria's Kitchen",
                'location' => 'Magugpo Poblacion',
                'cuisine'  => 'Authentic Tagum Native Chicken',
                'rating'   => '4.8',
                'reviews'  => 127,
                'price'    => '₱300-500/head',
                'image'    => '/assets/Pusit.png',
            ],
            [
                'name'     => 'Kusina ni Aling Nena',
                'location' => 'Apokon',
                'cuisine'  => 'Mindanao Fusion Cuisine',
                'rating'   => '4.9',
                'reviews'  => 98,
                'price'    => '₱400-600/head',
                'image'    => '/assets/nena.png',
            ],
            [
                'name'     => 'TasteBuds Catering',
                'location' => 'Visayan Village',
                'cuisine'  => 'Party Packages & Event Buffets',
                'rating'   => '4.7',
                'reviews'  => 156,
                'price'    => '₱350-550/head',
                'image'    => '/assets/buds.png',
            ],
        ];

        return response()
            ->view('client.dashboard', compact(
                'user',
                'activeBookings',
                'completedEvents',
                'unreadMessages',
                'upcomingBookings',
                'recentMessages',
                'featuredCaterers'
            ))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }

    public function browse()
    {
        $user = auth()->user();
        $initials = strtoupper(substr($user->name, 0, 1) . (str_contains($user->name, ' ') ? substr($user->name, strpos($user->name, ' ') + 1, 1) : ''));

        $caterers = User::where('role', 'caterer')
            ->where('approval_status', 'approved')
            ->where('is_active', true)
            ->orderByDesc('rating')
            ->paginate(12);

        return response()
            ->view('client.browse', compact(
                'user',
                'initials',
                'caterers'
            ))
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate');
    }
}
