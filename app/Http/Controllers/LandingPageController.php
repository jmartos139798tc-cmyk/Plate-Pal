<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    /**
     * Display the landing page or redirect to the appropriate dashboard.
     */
    public function index()
    {
        $caterers = [
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
            [
                'name'     => 'Bahay Kubo Kitchen',
                'location' => 'Mankilam',
                'cuisine'  => 'Organic Farm-to-Table Dishes',
                'rating'   => '4.6',
                'reviews'  => 73,
                'price'    => '₱380-520/head',
                'image'    => '/assets/kubo.png',
            ],
            [
                'name'     => 'Sarap Pinoy Express',
                'location' => 'New Balamban',
                'cuisine'  => 'Quick Service Party Trays',
                'rating'   => '4.5',
                'reviews'  => 89,
                'price'    => '₱250-450/head',
                'image'    => '/assets/Pinoy_Exp.png',
            ],
            [
                'name'     => 'DeliciaHaus Catering',
                'location' => 'Pagsabangan',
                'cuisine'  => 'Premium Seafood Feasts',
                'rating'   => '4.9',
                'reviews'  => 112,
                'price'    => '₱500-800/head',
                'image'    => 'https://images.unsplash.com/photo-1559847844-5315695dadae?w=600&q=80',
            ],
        ];

        return view('landingpage.home', compact('caterers'));
    }
}
